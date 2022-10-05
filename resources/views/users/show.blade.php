@extends('layouts.main')

@section('content')
    <div class="container">

        <form action="#" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @include('users.form', [ 'modo' => 'Ver' ])
        </form>
    </div>
@endsection