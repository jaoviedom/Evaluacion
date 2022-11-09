@extends('layouts.main')

@section('content')
<h1 class="text-center">Generar informe de consolidado de proyectos</h1>
    <form action="{{ route('informes.generarConsolidado') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <p>
            Ingrese los datos para generar el informe consolidado de proyectos
        </p>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fIn" name="fIn" placeholder="a" required>
            <label for="fIn">Fecha de inicio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fFin" name="fFin" placeholder="a" required>
            <label for="fIn">Fecha de fin</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Generar</button>
    </form>
@endsection

@section('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
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