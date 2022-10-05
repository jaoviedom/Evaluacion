@extends('layouts.main')

@section('content')
    
    <div class="d-flex justify-content-between align-items-start">
        <span class="h1">Estado de evaluación de idea</span>
    </div>

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Evaluador</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluadoresIdea as $evaluador)
                <tr>
                    <td>{{ $evaluador->name }}</td>
                    <td>
                        @if ($evaluador->evaluada == 0)
                            Por evaluar
                        @else
                            Evaluada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('evaluacion.show', $evaluador->idDetalle) }}" class="btn btn-orange">Ver evaluación</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection