@extends('layouts.main')

@section('content')

    @if ( Session::has( 'mensaje' )) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get( 'mensaje' ) }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-3"></div>
    <hr>
    <div class="py-3"></div>
    @livewire('user-table')
@endsection