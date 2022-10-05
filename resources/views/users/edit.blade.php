@extends('layouts.main')

@section('content')
    <div class="container">

        <form action="{{ route('usuarios.update', $usuario) }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            @include('users.form', [ 'modo' => 'Editar' ])
        </form>
    </div>
@endsection