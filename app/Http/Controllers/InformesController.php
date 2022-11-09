<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use App\Models\Idea;
use App\Models\User;
use App\Models\Evaluacion;
use App\Models\IdeaEvaluador;
use App\Models\DetalleEvaluacion;

class InformesController extends Controller
{
    public function index()
    {
        return view('informes.index');
    }

    public function convertirEvaluacionPDF($id)
    {
        // return Pdf::loadFile(public_path() . "/ideas/evaluacion/resultados/$id")->save('/storage/informe.pdf')->stream('resultado-evaluación.pdf');
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

        $pdf = Pdf::loadView('evaluacion.resultado-pdf', [
                                                            'evaluacion' => $evaluacion, 
                                                            'idea' => $idea, 
                                                            'detallesEvaluacion' => $detallesEvaluacion, 
                                                            'capAcomp1' => $capAcomp1, 
                                                            'capAcomp2' => $capAcomp2, 
                                                            'capAcomp3' => $capAcomp3, 
                                                            'capAcomp4' => $capAcomp4, 
                                                            'capEjec1' => $capEjec1,
                                                            'capEjec2' => $capEjec2, 
                                                            'resultado' => $resultado, 
                                                            'numComite' => $numComite, 
                                                            'fecha' => $fecha]);
        return $pdf->download('Evaluación');
    }

    public function consolidado()
    {
        return view('informes.consolidado');
    }

    public function generarConsolidado(Request $request)
    {
        // 
        $ideas = Idea::whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->get();

        $viable = Idea::selectRaw('count(estado) as conteo')
                        ->where('estado', 'Viable')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('estado')
                        ->pluck('conteo');
        $noViable = Idea::selectRaw('count(estado) as conteo')
                        ->where('estado', 'No viable')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('estado')
                        ->pluck('conteo');
        $reprogramados = Idea::selectRaw('count(estado) as conteo')
                        ->where('estado', 'Reprogramados')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('estado')
                        ->pluck('conteo');
        // dd($ideas);
        $datos = array();
        if (count($viable))
            $datos[] = $viable;
        else
            $datos[] = array(0 => 0);

        if (count($noViable))
            $datos[] = $noViable;
        else
            $datos[] = array(0 => 0);
        
        if (count($reprogramados))
            $datos[] = $reprogramados;
        else
            $datos[] = array(0 => 0);

        // dd($datos[2][0]);
        return view('informes.consolidado-generado', compact('datos', 'ideas'));
    }

    public function linea()
    {
        return view('informes.linea');
    }

    public function generarLinea(Request $request)
    {
        // 
        $ideas = Idea::whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->get();

        $linea1 = Idea::selectRaw('count(estado) as conteo')
                        ->where('linea', 'Tecnologías virtuales')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('linea')
                        ->pluck('conteo');
        $linea2 = Idea::selectRaw('count(estado) as conteo')
                        ->where('linea', 'Electrónica y telecomunicaciones')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('linea')
                        ->pluck('conteo');
        $linea3 = Idea::selectRaw('count(estado) as conteo')
                        ->where('linea', 'Bio y nanotecnología')
                        ->whereBetween('updated_at', [$request->fIn, $request->fFin])
                        ->groupBy('linea')
                        ->pluck('conteo');
        
        $datos = array();

        if (count($linea1))
            $datos[] = $linea1;
        else
            $datos[] = array(0 => 0);
        if (count($linea2))
            $datos[] = $linea2;
        else
            $datos[] = array(0 => 0);
        if (count($linea3))
            $datos[] = $linea3;
        else
            $datos[] = array(0 => 0);
        // dd($datos[0][0]);
        return view('informes.lineas-generado', compact('datos', 'ideas'));
    }


}
