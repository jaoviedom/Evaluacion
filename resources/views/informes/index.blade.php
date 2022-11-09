@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Informes</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="{{ asset('images/consolidado.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="{{ route('informes.consolidado') }}" class="btn btn-primary btn-lg rounded-pill">Consolidado</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="{{ asset('images/categorias.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="{{ route('informes.linea') }}" class="btn btn-primary btn-lg rounded-pill">Por líneas</a>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection