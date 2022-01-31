@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Modifica di: {{ $pasta->title }}</h1>


                <form action="{{ route('pastas.update', $pasta) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        {{-- old() accetta 2 parametri: il primo è il varore in sessione e, se non esiste, stampa il secondo parametro --}}
                        <input type="text" value="{{ old('title', $pasta->title) }}"
                        class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Nome pasta">
                        @error('title')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" value="{{ old('type', $pasta->type )}}"
                        class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Tipo di pasta">
                        @error('type')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" value="{{ old('image', $pasta->image) }}"
                        class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="URL immagine">
                        @error('image')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="coocking_time" class="form-label">Tempo di cottura</label>
                        <input  value="{{ old('coocking_time', $pasta->coocking_time)}}" type="number"
                        class="form-control @error('coocking_time') is-invalid @enderror" name="coocking_time" id="coocking_time" >
                        @error('coocking_time')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descizione</label>
                        <textarea type="number" class="form-control" name="description" id="description" >{{ old('description', $pasta->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Invia</button>
                    <button type="reset" class="btn btn-secondary" >Reset</button>


                </form>





            </div>
    </div>


</div>

@endsection
