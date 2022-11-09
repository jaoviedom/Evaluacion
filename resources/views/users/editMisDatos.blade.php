@extends('layouts.main')

@section('content')
    <div class="container">

        <form action="{{ route('usuarios.updateMisDatos', $usuario) }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            <h1 class="fw-titulo-conf py-5">Editar mis datos</h1>

@if ( count( $errors ) > 0 )
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-floating mb-3">
    <input type="hidden" class="form-control" placeholder="a" name="id" id="id" value="{{ isset( $usuario->id ) ? $usuario->id : old('id') }}" required readonly>
    <label for="nombre">ID</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="name" id="name" value="{{ isset( $usuario->name ) ? $usuario->name : old('name') }}" required >
    <label for="correo">Nombre</label>
</div>

<div class="form-floating mb-3">
    <input type="email" class="form-control" placeholder="a" name="email" id="email" value="{{ isset( $usuario->email ) ? $usuario->email : old('email') }}" required>
    <label for="email">Correo electrónico</label>
</div>

<label class="fw-bold">Roles:</label>
@foreach ($roles as $item)
<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="chk" @if ($usuario->roles->pluck('id')->contains($item->id)) checked @endif disabled>
    <label class="form-check-label" for="flexCheckDefault">
        {{ $item->nombre }}
    </label>
</div>
@endforeach
  

<input type="submit" class="btn btn-primary" value="Guardar">
<a href="{{ route('verUsuarios') }}" class="btn btn-primary">Volver</a>

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
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
        </form>
    </div>
@endsection