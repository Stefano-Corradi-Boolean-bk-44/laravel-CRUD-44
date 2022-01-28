@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Nuovo tipo di pasta</h1>


                <form action="{{ route('pastas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Nome pasta">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipo di pasta">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="URL immagine">
                    </div>
                    <div class="mb-3">
                        <label for="coocking_time" class="form-label">Tempo di cottura</label>
                        <input type="number" class="form-control" name="coocking_time" id="coocking_time" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descizione</label>
                        <textarea type="number" class="form-control" name="description" id="description" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Invia</button>
                    <button type="reset" class="btn btn-secondary" >Reset</button>


                </form>





            </div>
    </div>


</div>

@endsection
