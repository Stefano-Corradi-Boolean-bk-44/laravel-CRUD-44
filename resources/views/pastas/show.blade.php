@extends('layouts.main')


@section('content')

<div class="container">
    <h1>{{ $pasta->title }} <a href="{{ route('pastas.edit', $pasta) }}" class="btn btn-primary">EDIT</a></h1>
    <div>
        <span class="badge bg-primary">{{ $pasta->type }}</span>
        <span>
            Tempo di cottura: <strong>  {{ $pasta->coocking_time }} minuti</strong>
        </span>
    </div>

    <div class="row py-3">
        <div class="col-6">
            <img class="img-fluid" src="{{ $pasta->image }}" alt="{{ $pasta->title }}">
        </div>
        <div class="col-6">
            <p>
                {{-- sintassi per stampare entità HTML --}}
                {!! $pasta->description !!}
            </p>
        </div>
    </div>



</div>

<div class="container">
    <a href="{{ route('pastas.index') }}"><< torna all'elenco</a>
</div>

@endsection
