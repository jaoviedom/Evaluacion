<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Models\Idea;
use App\Models\User;
use App\Models\IdeaEvaluador;
use App\Models\Evaluacion;
use App\Models\DetalleEvaluacion;
use Auth;
use PDF;

class EvaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexEvaluar()
    {
        $evaluarMenu = true;
        return view('menu-link.evaluar', compact('evaluarMenu'));
    }

    public function irEvaluar($id)
    {
        $idea = Idea::find($id);
        $user = Auth::user();
        return view('evaluacion.evaluar', compact('idea', 'user'));
    }

    public function irEditarEvaluacion($id)
    {
        $idea = Idea::find($id);
        $user = Auth::user();
        $evaluacion = DetalleEvaluacion::where('evaluacion_id',$id)->where('user_id', $user->id)->first();
        return view('evaluacion.editar', compact('idea', 'evaluacion', 'user'));
    }

    public function store(Request $request)
    {
        $evaluacion = Evaluacion::find($request->idea);
        if($evaluacion == null){
            $evaluacion = new Evaluacion();
            $evaluacion->idea_id = $request->idea;
            $evaluacion->save();
        }

        $detalle = new DetalleEvaluacion();
        $detalle->criterio1 = $request->criterio1;
        $detalle->criterio2 = $request->criterio2;
        $detalle->criterio3 = $request->criterio3;
        $detalle->criterio4 = $request->criterio4;
        $detalle->criterio5 = $request->criterio5;
        $detalle->criterio6 = $request->criterio6;
        $detalle->criterio7 = $request->criterio7;
        $detalle->criterio8 = $request->criterio8;
        $detalle->criterio9 = $request->criterio9;
        $detalle->criterio10 = $request->criterio10;

        $detalle->capAcomp1 = $request->capAcomp1;
        $detalle->capAcomp2 = $request->capAcomp2;
        $detalle->capAcomp3 = $request->capAcomp3;
        $detalle->capAcomp4 = $request->capAcomp4;

        $detalle->capEjec1 = $request->capEjec1;
        $detalle->capEjec2 = $request->capEjec2;
        
        $detalle->observaciones = $request->observaciones;
        $detalle->evaluacion_id = $evaluacion->id;
        $detalle->user_id = $request->user_id;
        
        $detalle->save();

        $ideaEvaluador = IdeaEvaluador::where('idea_id', $request->idea)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
        $ideaEvaluador->evaluada = 1;
        $ideaEvaluador->save();

        // Verificar si todos los evaluadores asignados han evaluado para cambiar el estado de la idea a evaluado

        return redirect()->route('evaluar.index')->with('mensaje', 'Se han guardado los datos exitosamente');

    }

    public function update(Request $request)
    {
        $evaluacion = Evaluacion::find($request->idea);

        $detalle = DetalleEvaluacion::where('evaluacion_id', $request->idea)->where('user_id', Auth::user()->id)->first();
        // dd($request);
        $detalle->criterio1 = $request->criterio1;
        $detalle->criterio2 = $request->criterio2;
        $detalle->criterio3 = $request->criterio3;
        $detalle->criterio4 = $request->criterio4;
        $detalle->criterio5 = $request->criterio5;
        $detalle->criterio6 = $request->criterio6;
        $detalle->criterio7 = $request->criterio7;
        $detalle->criterio8 = $request->criterio8;
        $detalle->criterio9 = $request->criterio9;
        $detalle->criterio10 = $request->criterio10;

        $detalle->capAcomp1 = $request->capAcomp1;
        $detalle->capAcomp2 = $request->capAcomp2;
        $detalle->capAcomp3 = $request->capAcomp3;
        $detalle->capAcomp4 = $request->capAcomp4;

        $detalle->capEjec1 = $request->capEjec1;
        $detalle->capEjec2 = $request->capEjec2;
        
        $detalle->observaciones = $request->observaciones;
        $detalle->evaluacion_id = $evaluacion->id;
        $detalle->save();

        $ideaEvaluador = IdeaEvaluador::where('idea_id', $request->idea)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
        $ideaEvaluador->evaluada = 1;
        $ideaEvaluador->save();

        // Verificar si todos los evaluadores asignados han evaluado para cambiar el estado de la idea a evaluado

        return redirect()->route('evaluar.index')->with('mensaje', 'Se han actualizado los datos exitosamente');

    }

    public function show($id)
    {
        $evaluacion = DetalleEvaluacion::find($id);
        $e = Evaluacion::find($evaluacion->evaluacion_id);
        $idea = Idea::find($e->idea_id);
        $usuariosMenu = false;
        $ideasMenu = true;
        $user = Auth::user();
        return view('evaluacion.show', compact('evaluacion', 'idea', 'ideasMenu', 'usuariosMenu', 'user'));
    }

    public function finalStore(Request $request)
    {
        $evaluacion = Evaluacion::where('idea_id',$request->idea)
                                ->first();
        $evaluacion->update($request->all());
        $idea = Idea::findOrFail($request->idea);
        $idea->estado = $request->estado;
        $idea->save();
        return redirect()->route('ideas.index')->with('mensaje', 'Se han guardado la evaluacion exitosamente');
    }

}
