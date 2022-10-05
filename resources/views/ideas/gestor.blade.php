@extends('layouts.main')

@section('content')
    <div class="container">

        <form action="{{ route('ideas.update', $idea) }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            @include('ideas.form', [ 'modo' => 'Editar' ])
        </form>
    </div>
@endsection