@extends('layouts.main')

@section('content')


<div class="container">
    <h1>Elenco paste</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th colspan="3" scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pastas as $pasta)
                <tr>
                    <th scope="row">{{ $pasta->id }}</th>
                    <td>{{ $pasta->title }}</td>
                    <td>{{ $pasta->type }}</td>
                    <td><a href="{{ route('pastas.show', $pasta) }}" class="btn btn-success">SHOW</a></td>
                    <td><a href="#" class="btn btn-primary">EDIT</a></td>
                    <td><a href="#" class="btn btn-danger">DELETE</a></td>
                </tr>
            @endforeach


        </tbody>
      </table>
</div>
<div class="container">
    {{ $pastas->links() }}
</div>

@endsection
