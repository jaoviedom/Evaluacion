@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('ideas.store') }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @include('ideas.form', [ 'modo' => 'Crear', 'estado' => 'Convocado' ])
        </form>
    </div>
@endsection