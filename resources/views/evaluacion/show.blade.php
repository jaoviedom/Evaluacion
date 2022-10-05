@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('evaluacion.store') }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @include('evaluacion.form', [ 'modo' => 'Ver' ])
        </form>
    </div>
@endsection