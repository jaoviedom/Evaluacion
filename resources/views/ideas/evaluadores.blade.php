@extends('layouts.main', [
    'registrarIdea' => true,
])

@section('content')
    <div class="container">

        <form action="{{ route('ideas.guardar-evaluadores', $idea) }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            <h1 class="fw-titulo-conf py-5">Asignar evaluadores</h1>

            @if ( count( $errors ) > 0 )
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="idea_id" value="{{ $idea->id }}">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="a" name="titulo" id="titulo" value="{{ $idea->titulo}}" readonly>
                <label for="nombre">Título </label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="a" name="codigo" id="codigo" value="{{ $idea->codigo }}" readonly>
                <label for="codigo">Código</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="a" name="talento" id="talento" value="{{ $idea->talento }}" readonly>
                <label for="correo">Talento</label>
            </div>
            
            <hr>
            <h5>Evaluadores</h5>
            @foreach ($evaluadores as $item)
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="evaluadores[]"
                    @foreach ($evaluadoresIdea as $eI)
                        @if ($eI->id == $item->id)
                            checked
                        @endif
                    @endforeach
                    >
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $item->name }}
                    </label>
                </div>
            @endforeach
            
            <input type="submit" class="btn btn-orange" value="Asignar evaluadores">

        </form>
    </div>
@endsection