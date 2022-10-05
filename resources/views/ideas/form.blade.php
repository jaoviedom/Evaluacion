@if (isset($asignarGestor) && $asignarGestor)
<h1 class="fw-titulo-conf py-5">Asignar gestor a  Idea</h1>
@else
<h1 class="fw-titulo-conf py-5">{{ $modo }} Idea</h1>
@endif

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
    <input type="text" class="form-control" placeholder="a" name="titulo" id="titulo" value="{{ isset( $idea->titulo ) ? $idea->titulo : old('titulo') }}" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="nombre">Título </label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="codigo" id="codigo" value="{{ isset( $idea->codigo ) ? $idea->codigo : old('codigo') }}" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="codigo">Código</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="talento" id="talento" value="{{ isset( $idea->talento ) ? $idea->talento : old('talento') }}" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="correo">Talento</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="profesion" id="profesion" value="{{ isset( $idea->profesion ) ? $idea->profesion : old('profesion') }}" required  @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="cv">Profesión</label>
</div>

<div class="form-floating mb-3">
    <select class="form-select" name="tipoActor" id="tipoActor" aria-label="Floating label select example" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) disabled @endif>
      <option selected value="Persona natural" @if(isset($idea->tipoActor) && $idea->tipoActor == "Persona natural") selected @endif>Persona natural</option>
      <option value="Persona jurídica" @if(isset($idea->tipoActor) && $idea->tipoActor == "Persona jurídica") selected @endif>Persona jurídica</option>
    </select>
    <label for="floatingSelect">Tipo de actor</label>
</div>

<div class="form-floating mb-3">
    <input type="email" class="form-control" placeholder="a" name="email" id="email" value="{{ isset( $idea->email ) ? $idea->email : old('email') }}" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="correo">Email</label>
</div>

<div class="form-floating mb-3">
    <input type="tel" class="form-control" placeholder="a" name="celular" id="celular" value="{{ isset( $idea->celular ) ? $idea->celular : old('celular') }}" required @if($modo == "Ver" || isset($asignarGestor) && $asignarGestor) readonly @endif>
    <label for="correo">Celular</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="a" name="estado" id="estado" value="{{ isset( $idea->estado ) ? $idea->estado : old('estado') }}" readonly>
    <label for="correo">Estado</label>
</div>

    <hr>
    <div class="form-floating mb-3">
        <select class="form-select" name="gestor" id="gestor" @if($modo == "Ver" || !$asignarGestor) disabled @endif>
            <option value="" selected>Seleccione...</option>
            @foreach ($gestores as $item)
                <option value="{{ $item->id }}" @if(isset($idea->gestor) && $idea->gestor == $item->id) selected @endif>{{ $item->name }}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Gestor</label>
    </div>
    <input type="hidden" name="estado" value="Asignado">

@if($modo != "Ver") 
    @if (isset($asignarGestor) && $asignarGestor)
    <input type="submit" class="btn btn-primary" value="Asignar gestor">
    @else
    <input type="submit" class="btn btn-primary" value="{{ $modo }} idea">
    @endif
@else
    <a href="{{ route('ideas.index') }}" class="btn btn-primary">Volver</a>
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