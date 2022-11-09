@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('evaluacion.final-store') }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <h1 class="text-center my-3">Evaluación de ideas de base tecnológica</h1>
            <div class="d-flex justify-content-end py-3">
                <a href="{{ route('informes.convertirEvaluacionPDF', $idea->id) }}" class="link-secondary">
                    <i class="fa-solid fa-print fa-2xl"></i>
                </a>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" name="comite" required value="{{ $numComite }}" @if($idea->estado == "Viable" || $idea->estado == "No viable") readonly @endif>
                        <label for="floatingPassword">Comité N°</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="a" required value="{{ $fecha }}" @if($idea->estado == "Viable" || $idea->estado == "No viable") readonly @endif>
                        <label for="">Fecha</label>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">1. Información de la idea</h5>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->titulo }}" readonly>
                        <label for="floatingPassword">Título de la idea</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->codigo }}" readonly>
                        <label for="floatingInput">Código de la idea</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->talento }}" readonly>
                        <label for="floatingPassword">Nombre de quien presenta la idea</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->profesion }}" readonly>
                        <label for="floatingPassword">Profesión / Ocupación</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->tipoActor }}" readonly>
                        <label for="floatingPassword">Tipo de actor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->email }}" readonly>
                        <label for="floatingPassword">Correo electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->celular }}" readonly>
                        <label for="floatingPassword">Número de teléfono celular</label>
                    </div>                    
                    <input type="hidden" name="idea" value="{{ $idea->id}}">
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">2. Evaluación de viabilidad del acompañamiento de la idea</h5>
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr class="text-center align-middle">
                                <th>Conjunto de criterios</th>
                                <th>%</th>
                                <th>Criterio</th>
                                <th>%</th>
                                @foreach ($detallesEvaluacion as $i => $item)
                                    <th>Evaluador {{ $i + 1 }}</th>
                                @endforeach
                                <th>Promedio de cada criterio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="6">Formulación de la idea</td>
                                <td rowspan="6">38</td>
                                <td>Descripción clara y concisa del problema, necesidad u oportunidad a atender con la idea</td>
                                <td>5</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio1 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio1;
                                        }
                                        $prom1 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio1" value=' . $prom1 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>Suficiente conocimiento sobre otros resultados que dan solución al problema, necesidad u oportunidad</td>
                                <td>7</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio2 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio2;
                                        }
                                        $prom2 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio2" value=' . $prom2 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>Los objetivos de la idea contribuyen a la solución del problema, necesidad u oportunidad</td>
                                <td>6</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio3 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio3;
                                        }
                                        $prom3 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio3" value=' . $prom3 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>Los resultados propuestos corresponden a los objetivos</td>
                                <td>7</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio4 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio4;
                                        }
                                        $prom4 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio4" value=' . $prom4 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>El alcance de la propuesta está delimitado a los objetivos</td>
                                <td>6</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio5 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio5;
                                        }
                                        $prom5 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio5" value=' . $prom5 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>El proponente tiene claridad conceptual, técnica y metodológica de cómo obtener los resultados</td>
                                <td>7</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio6 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio6;
                                        }
                                        $prom6 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio6" value=' . $prom6 . '>';
                                    @endphp
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="2">Innovación de la idea</td>
                                <td rowspan="2">32</td>
                                <td>El resultado propuesto por la idea presenta funcionalidades novedosas que generen cambio o ventaja con respecto a las soluciones que se encuentran en el entorno</td>
                                <td>17</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio7 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio7;
                                        }
                                        $prom7 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio7" value=' . $prom7 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>El resultado propuesto por la idea tiene características que generan valor agregado a los productos, procesos y servicios, y contribuyen a la mejora de la productividad y competitividad de las personas o las organizaciones</td>
                                <td>15</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio8 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio8;
                                        }
                                        $prom8 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio8" value=' . $prom8 . '>';
                                    @endphp
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="2">Viabilidad de la idea en el mercado</td>
                                <td rowspan="2">30</td>
                                <td>El resultado propuesto tiene identificados usuario(s) consumidor(es), cliente(s) y mercados potenciales</td>
                                <td>15</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio9 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio9;
                                        }
                                        $prom9 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio9" value=' . $prom9 . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>Están definidos posibles canales de comercialización o de explotación del resultado propuestos</td>
                                <td>15</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio10 }}</td>
                                @endforeach
                                <td class="text-center">
                                    @php
                                        $suma = 0;
                                        foreach($detallesEvaluacion as $item)
                                        {
                                            $suma += $item->criterio10;
                                        }
                                        $prom10 = round($suma / count($detallesEvaluacion), 1);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="pCriterio10" value=' . $prom10 . '>';
                                    @endphp
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Viabilidad del acompañamiento de la idea</th>
                                <th class="text-center">Promedio</th>
                                <th class="text-center">Promedio de la calificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Formulación de la idea</td>
                                <td class="text-center">
                                    @php
                                        $suma = $prom1 * 5 + $prom2 * 7 + $prom3 * 6 + $prom4 * 7 + $prom5 * 6 + $prom6 * 7;
                                        $viabFormulacion = round($suma / 38);

                                        $suma = $prom7 * 17 + $prom8 * 15;
                                        $viabInnovacion = round($suma / 32);

                                        $suma = $prom9 * 15 + $prom10 * 15;
                                        $viabMercado = round($suma / 30);

                                        $suma = $viabFormulacion * 38 + $viabInnovacion * 32 + $viabMercado * 30;
                                        $viabPromedio = round($suma / 100);
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="viabFormulacion" value=' . $viabFormulacion . '>';
                                    @endphp
                                </td>
                                <td rowspan="3" class="text-center fw-bold">
                                    @php
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="viabPromedio" value=' . $viabPromedio . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>2. Innovación de la idea</td>
                                <td class="text-center">
                                    @php
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="viabInnovacion" value=' . $viabInnovacion . '>';
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>3. Viabilidad de la idea en el mercado</td>
                                <td class="text-center">
                                    @php
                                        echo '<input type="text" readonly class="form-control-plaintext text-center" name="viabMercado" value=' . $viabMercado . '>';
                                    @endphp
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @if ($viabPromedio >= 7)
                        <div class="alert alert-success text-center mt-4" role="alert">
                            Si es viable acompañar la idea
                        </div>
                    @else
                        <div class="alert alert-danger text-center mt-4" role="alert">
                            No es viable acompañar la idea
                        </div>                          
                    @endif
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">3. Evaluación de factibilidad del acompañamiento de la idea</h5>
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr class="text-center align-middle">
                                <th>Conjunto de criterios</th>
                                <th>Criterio</th>
                                @foreach ($detallesEvaluacion as $i => $item)
                                    <th>Evaluador {{ $i + 1 }}</th>
                                @endforeach
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="4">Capacidad de acompañamiento de tecnoparque</td>
                                <td>La idea puede ser acompañada técnica y metodológicamente por el Nodo del Tecnoparque</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capAcomp1 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capAcomp1 }}</td>
                            </tr>
                            <tr>
                                <td>El Nodo del Tecnoparque dispone profesionales con experticia para el acompañamiento de la idea</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capAcomp2 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capAcomp2 }}</td>
                            </tr>
                            <tr>
                                <td>El Tecnoparque dispone de los materiales (insumos), equipos, servicios, para el acompañamiento de la idea</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capAcomp3 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capAcomp3 }}</td>
                            </tr>
                            <tr>
                                <td>El resultado propuesto está enmarcado en el contexto institucional SENA, y en la normativa técnica y jurídica colombiana</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capAcomp4 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capAcomp4 }}</td>
                            </tr>

                            <tr>
                                <td rowspan="4">Capacidad de ejecución del proponente o posible telento</td>
                                <td>El usuario dispone del talento humano con las competencias técnicas y disponibilidad para la ejecución de la idea</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capEjec1 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capEjec1 }}</td>
                            </tr>
                            <tr>
                                <td>El usuario manifiesta el compromiso de suministrar  materiales (insumos) y servicios, con que no cuenta el Nodo de Tecnoparque, para la obtención de los resultados</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->capEjec2 }}</td>
                                @endforeach
                                <td class="text-center">{{ $capEjec2 }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if ($resultado == "Es factible acompañar la idea")
                        <div class="alert alert-success text-center mt-4" role="alert">
                            {{ $resultado }}
                        </div>
                    @else
                        <div class="alert alert-danger text-center mt-4" role="alert">
                            {{ $resultado }}
                        </div>                          
                    @endif
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">4. Observaciones de los evaluadores <span class="fs-6 text-muted">(¿Por qué es viable y/o factible, o no, acompañar el proyecto?)</span></h5>
                    @foreach ($detallesEvaluacion as $i => $item)
                        <div class="row">
                            <div class="col-2">
                                <span class="fw-bold">Evaluador {{ $i + 1 }}:</span>
                            </div>
                            <div class="col">
                                {{ $item->observaciones }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">5. Recomendaciones del comité </h5>
                    <p class="fs-6 text-muted lh-0">Además de las recomendaciones generales, debe especificarse si:</p>
                    <p class="fs-6 text-muted lh-0">i. El proyecto presenta alguna condicionalidad en recursos, tiempo, actividades para su acompañamiento, y</p> 
                    <p class="fs-6 text-muted lh-0">ii. El (los) responsable(s) deben subsanar esta situación.</p>
                    <label for="floatingTextarea">Recomendaciones</label>
                    <textarea class="form-control" placeholder="Indique las recomendaciones del comité..." name="recomendaciones" rows="5" >{{ $evaluacion->recomendaciones }}</textarea>
                </div>
            </div>
            @if ($viabPromedio >= 7 && $resultado == "Es factible acompañar la idea")
                <div class="alert alert-success text-center fs-2" role="alert">
                    El proyecto es VIABLE
                </div>
                <input type="hidden" name="estado" value="Viable">
            @else
                <div class="alert alert-danger text-center fs-2" role="alert">
                    El proyecto NO es VIABLE
                </div>
                <input type="hidden" name="estado" value="No viable">
            @endif
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
</script>
@endsection