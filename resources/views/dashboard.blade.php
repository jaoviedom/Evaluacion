@extends('layouts.main')

@section('content')
    
    <h1 class="text-center">Evaluación de proyectos</h1>

    @if ( $mensaje = Session::get( 'exito' ) ) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            {{$mensaje}} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection