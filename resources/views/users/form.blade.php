<h1 class="fw-titulo-conf py-5">{{ $modo }} Usuario</h1>

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
    <input type="text" class="form-control" placeholder="a" name="id" id="id" value="{{ isset( $usuario->id ) ? $usuario->id : old('id') }}" required @if($modo == "Ver") readonly @endif>
    <label for="nombre">ID</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="name" id="name" value="{{ isset( $usuario->name ) ? $usuario->name : old('name') }}" required @if($modo == "Ver") readonly @endif>
    <label for="correo">Nombre</label>
</div>

<div class="form-floating mb-3">
    <input type="email" class="form-control" placeholder="a" name="email" id="email" value="{{ isset( $usuario->email ) ? $usuario->email : old('email') }}" required @if($modo == "Ver") readonly @endif>
    <label for="email">Correo electrónico</label>
</div>

<label class="fw-bold">Roles:</label>
@foreach ($roles as $item)
<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="chk" name="rol[]" @if ($usuario->roles->pluck('id')->contains($item->id)) checked @endif @if($modo == "Ver") disabled @endif>
    <label class="form-check-label" for="flexCheckDefault">
        {{ $item->nombre }}
    </label>
</div>
@endforeach
  

{{-- <div class="form-floating mb-3">
    <select class="form-select" name="rol" id="rol" aria-label="Floating label select example" required @if($modo == "Ver") disabled @endif>
        <option value="" selected>Seleccione...</option>
        @foreach ($roles as $item)
            <option value="{{ $item->id }}"" @if(isset($usuario->rol) && $usuario->rol == $item->nombre) selected @endif>{{ $item->nombre }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Rol</label>
</div> --}}

@if($modo != "Ver") 
    <input type="submit" class="btn btn-primary" value="{{ $modo }} usuario">
@else
    <a href="{{ route('verUsuarios') }}" class="btn btn-primary">Volver</a>
@endif

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