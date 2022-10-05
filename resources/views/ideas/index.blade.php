@extends('layouts.main')

@section('content')
    
    <div class="d-flex justify-content-between align-items-start">
        <span class="h1">Ideas</span>
        <a href="{{ route('ideas.create') }}" class="btn btn-secondary">
            <i class="fa-solid fa-circle-plus me-1"></i>
            Nueva idea
        </a>
    </div>

    @if ( Session::has( 'mensaje' )) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get( 'mensaje' ) }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Código del proyecto</th>
                <th>Título</th>
                <th>Autor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ideas as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->autor }}</td>
                    <td>{{ $item->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection