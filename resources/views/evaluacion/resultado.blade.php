@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('evaluacion.final-store') }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <h1 class="text-center my-3">Evaluación de ideas de base tecnológica</h1>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="a" placeholder="a" name="comite">
                        <label for="floatingPassword">Comité N°</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="a" required>
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
                    <div class="form-floating">
                        <select class="form-select" id="a" name="estado">
                            <option  value=1 @if(isset($idea->estado) && $idea->estado == "Convocado") selected @endif>Convocado</option>
                            <option  value=1 @if(isset($idea->estado) && $idea->estado == "Asignado") selected @endif>Asignado</option>
                            <option  value=1 @if(isset($idea->estado) && $idea->estado == "Evaluado") selected @endif>Evaluado</option>
                            <option  value=1 @if(isset($idea->estado) && $idea->estado == "Viable") selected @endif>Viable</option>
                            <option  value=1 @if(isset($idea->estado) && $idea->estado == "No viable") selected @endif>No viable</option>
                        </select>
                        <label for="floatingSelect">Estado</label>
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
                                <td>Formulación de la idea</td>
                                <td>38</td>
                                <td>Descripción clara y concisa del problema, necesidad u oportunidad a atender con la idea</td>
                                <td>5</td>
                                @foreach ($detallesEvaluacion as $item)
                                    <td class="text-center">{{ $item->criterio1 }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
        </form>
    </div>
@endsection