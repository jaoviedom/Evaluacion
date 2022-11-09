<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Idea;
use App\Models\User;
use App\Models\Evaluacion;
use App\Models\IdeaEvaluador;
use App\Models\DetalleEvaluacion;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('menu-link.ideas', compact('ideasMenu', 'usuariosMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariosMenu = false;
        $ideasMenu = true;
        $asignarGestor = false;
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        return view('ideas.insert', compact('ideasMenu', 'usuariosMenu', 'asignarGestor', 'gestores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idea = new Idea();
        $idea->titulo = $request->titulo;
        $idea->codigo = $request->codigo;
        $idea->talento = $request->talento;
        $idea->profesion = $request->profesion;
        $idea->tipoActor = $request->tipoActor;
        $idea->email = $request->email;
        $idea->celular = $request->celular;
        $idea->estado = "Convocado";
        $idea->save();
        return redirect('ideas')->with('mensaje', 'Se han guardado los datos exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.show', compact('idea', 'ideasMenu', 'usuariosMenu', 'gestores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        $usuariosMenu = false;
        $ideasMenu = true;
        $asignarGestor = false;
        return view('ideas.edit', compact('idea', 'ideasMenu', 'usuariosMenu', 'gestores', 'asignarGestor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update($request->all());
        return redirect()->route('ideas.index')->with('mensaje',  '¡Se han modificado los datos exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }

    public function asignarGestor($id)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $idea = Idea::findOrFail($id);
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        // 
        $usuariosMenu = false;
        $ideasMenu = true;
        $asignarGestor = true;
        return view('ideas.gestor', compact('idea', 'gestores', 'ideasMenu', 'usuariosMenu', 'asignarGestor'));
    }
    
    public function asignarEvaluadores($id)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $idea = Idea::findOrFail($id);
        $evaluadores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Evaluador")
                            ->select('users.*')
                            ->get();
        //
        $evaluadoresIdea = IdeaEvaluador::join('users', 'idea_evaluadors.user_id', 'users.id')
                                        ->join('ideas', 'idea_evaluadors.idea_id', 'ideas.id')
                                        ->where('ideas.id', $id)
                                        ->select('users.*')
                                        ->get();
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.evaluadores', compact('idea', 'evaluadores', 'ideasMenu', 'usuariosMenu', 'evaluadoresIdea'));
    }

    public function guardarEvaluadores(Request $request, Idea $idea)
    {
        $evaluadoresAsignados = IdeaEvaluador::where('idea_evaluadors.idea_id', $request->idea_id)->get();

        $yaAsignados = [];
        foreach($evaluadoresAsignados as $ea)
        {
            $yaAsignados[] = $ea->user_id;
        }

        $aAsignar = $request->evaluadores;
        
        // Si el evaluador a asignar no está en la lista agregarlo   
        foreach($aAsignar as $asignar)
        {
            $estaAsignado = False;
            foreach($yaAsignados as $asignado)
            {
                if($asignar == $asignado)
                    $estaAsignado = True;
            }
            if(!$estaAsignado)
            {
                // Guardar
                $ideaEvaluador = new IdeaEvaluador();
                $ideaEvaluador->idea_id = $request->idea_id;
                $ideaEvaluador->user_id = $asignar;
                $ideaEvaluador->save();
            }
        }
        
        $estaAsignado = False;
        for($i = 0; $i < count($yaAsignados); $i++)
        {
            $yaAsignado = False;
            $estaAsignado = False;
            $asignado = $yaAsignados[$i];
            echo "Asignado: $asignado <br>";
            $haEvaluado = IdeaEvaluador::where('user_id', $asignado)
                                        ->where('idea_id', $request->idea_id)
                                        ->select('evaluada')
                                        ->first()->evaluada;
            // 
            echo "Ha evaluado: $haEvaluado <br>";
            if(!$haEvaluado)
            {
                for($j = 0;$j < count($aAsignar); $j++)
                {
                    $asignar = $aAsignar[$j];
                    echo "A asignar: $asignar <br>";
                    if($asignado == $asignar)
                        $estaAsignado = True;
                }
            }
            
            
            echo "Está asignado: $estaAsignado <br>";
            if(!$estaAsignado && !$haEvaluado)
            {
                // Borrar
                $borrar = IdeaEvaluador::where('user_id', $asignado)->first();
                echo "A borrar: $borrar->id <br>";
                $borrar->delete();
            }
        }

        // Si dentro de la lista

        return redirect('ideas')->with('mensaje', 'Se han asigando los evaluadores exitosamente. Recuerde que si un evaluador ya ha registrado una evaluación no se podrá eliminar del listado.');
    }

    public function estadoEvaluacion($id)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $evaluacion = Evaluacion::where('idea_id', $id)->first();

        $evaluadoresIdea = DetalleEvaluacion::join('users', 'detalle_evaluacions.user_id', 'users.id')
                                            ->join('idea_evaluadors', 'users.id', 'idea_evaluadors.user_id')
                                            ->where('idea_id', $evaluacion->id)
                                            ->select('users.name', 'idea_evaluadors.evaluada', 'detalle_evaluacions.id as idDetalle')
                                            ->get();
        $ideasMenu = true;
        return view('evaluacion.estado', compact('evaluadoresIdea', 'ideasMenu'));
    }

    public function resultadosEvaluacion($id)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }

        $evaluacion = Evaluacion::where('idea_id', $id)->first();
        $detallesEvaluacion = DetalleEvaluacion::where('evaluacion_id', $evaluacion->id)->get();
        $idea = Idea::findOrFail($evaluacion->idea_id);

        // Obtener número comité automático
        if($idea->estado != "Viable" && $idea->estado != "No Viable")
        {
            $numComite = Evaluacion::orderBy('id', 'desc')->first()->comite;
            $numComite++;
            $numComite = str_pad($numComite, 4, "0", STR_PAD_LEFT);
            $fecha = now();
            $fecha = $fecha->format('Y-m-d');
        }
        else {
            $numComite = $evaluacion->comite;
            $fecha = $evaluacion->fecha;
        }

        $nCapAcomp1 = 0;
        $nCapAcomp2 = 0;
        $nCapAcomp3 = 0;
        $nCapAcomp4 = 0;
        $nCapEjec1 = 0;
        $nCapEjec2 = 0;
        $capAcomp1 = "";
        $capAcomp2 = "";
        $capAcomp3 = "";
        $capAcomp4 = "";
        $capEjec1 = "";
        $capEjec2 = "";
        $resultado = "Es factible acompañar la idea";
        foreach($detallesEvaluacion as $item)
        {
            if($item->capAcomp1 == "No")
                $nCapAcomp1++;
            if($item->capAcomp2 == "No")
                $nCapAcomp2++;
            if($item->capAcomp3 == "No")
                $nCapAcomp3++;
            if($item->capAcomp4 == "No")
                $nCapAcomp4++;
            if($item->capEjec1 == "No")
                $nCapEjec1++;
            if($item->capEjec2 == "No")
                $nCapEjec2++;
        }
        
        if($nCapAcomp1 == 0)
            $capAcomp1 = "Es factible";
        else if($nCapAcomp1 > 1)
            $capAcomp1 = "No es factible";
        else
            $capAcomp2 = "Se discute";

        if($nCapAcomp2 == 0)
            $capAcomp2 = "Es factible";
        else if($nCapAcomp2 > 1)
            $capAcomp2 = "No es factible";
        else
            $capAcomp2 = "Se discute";

        if($nCapAcomp3 == 0)
            $capAcomp3 = "Es factible";
        else if($nCapAcomp3 > 1)
            $capAcomp3 = "No es factible";
        else
            $capAcomp3 = "Se discute";

        if($nCapAcomp4 == 0)
            $capAcomp4 = "Es factible";
        else if($nCapAcomp4 > 1)
            $capAcomp4 = "No es factible";
        else
            $capAcomp4 = "Se discute";

        if($nCapEjec1 == 0)
            $capEjec1 = "Es factible";
        else if($nCapEjec1 > 1)
            $capEjec1 = "No es factible";
        else
            $capEjec1 = "Se discute";

        if($nCapEjec2 == 0)
            $capEjec2 = "Es factible";
        else if($nCapEjec2 > 1)
            $capEjec2 = "No es factible";
        else
            $capEjec2 = "Se discute";
    
        if($nCapAcomp1 > 1 || $nCapAcomp2 > 1 || $nCapAcomp3 > 1 || $nCapAcomp4 > 1 || $nCapEjec1 > 1 || $nCapEjec2 > 1)
        {
            $resultado = "No es factible acompañar la idea";
        }
        return view('evaluacion.resultado', compact('evaluacion', 'idea', 'detallesEvaluacion', 'capAcomp1', 'capAcomp2', 
                    'capAcomp3', 'capAcomp4', 'capEjec1', 'capEjec2', 'resultado', 'numComite', 'fecha'));
    }

}
