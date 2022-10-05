@extends('layouts.main')

@section('content')
    
    <div class="d-flex justify-content-between align-items-start">
        <span class="h1">Editar evaluación de idea</span>
    </div>

    @if ( Session::has( 'mensaje' )) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get( 'mensaje' ) }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('evaluacion.update', $idea->id) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        @include('evaluacion.form', [ 'modo' => 'Editar' ])
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