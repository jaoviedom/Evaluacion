@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('ideas.update', $idea) }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            @include('ideas.form', [ 'modo' => 'Editar', "asignarGestor" => false ])
        </form>
    </div>
@endsection