@extends('layouts.main')

@section('content')
@can('administrador')
    <div class="d-flex justify-content-between align-items-start">
        <span class="h1">Ideas</span>
        <a href="{{ route('ideas.create') }}" class="btn btn-secondary">
            <i class="fa-solid fa-circle-plus me-1"></i>
            Nueva idea
        </a>
    </div>
@endcan

    @if ( Session::has( 'mensaje' )) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get( 'mensaje' ) }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-3"></div>
    <hr>
    <div class="py-3"></div>
    @livewire('idea-table')
@endsection