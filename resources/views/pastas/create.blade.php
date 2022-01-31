@extends('layouts.main')


@section('content')

<div class="container">



    <div class="row">




        <div class="col-8 offset-2">
            {{-- $errors viene generato da $request->validate()
                $errors->any() restituisce true o false
                $errors->all() restituisce un arrai associativo con tutti i messagi di errore
                --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1>Nuovo tipo di pasta</h1>


                <form action="{{ route('pastas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        <input type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        name="title" id="title" placeholder="Nome pasta">
                        @error('title')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text"
                        class="form-control @error('type') is-invalid @enderror"
                        value="{{ old('type') }}"
                        name="type" id="type" placeholder="Tipo di pasta">
                        @error('type')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text"
                        class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image') }}"
                        name="image" id="image" placeholder="URL immagine">
                        @error('image')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="coocking_time" class="form-label">Tempo di cottura</label>
                        <input type="number"
                        class="form-control @error('coocking_time') is-invalid @enderror"
                        value="{{ old('coocking_time') }}"
                        name="coocking_time" id="coocking_time" >
                        @error('coocking_time')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descizione</label>
                        <textarea type="number" class="form-control" name="description" id="description" >{{old('description')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Invia</button>
                    <button type="reset" class="btn btn-secondary" >Reset</button>


                </form>





            </div>
    </div>


</div>

@endsection
