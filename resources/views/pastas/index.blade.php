@extends('layouts.main')

@section('content')






<div class="container">

    {{-- verifico la presenza della variabile di sessione 'deleted' --}}
    @if (session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

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
                    <td><a href="{{ route('pastas.edit', $pasta) }}" class="btn btn-primary">EDIT</a></td>
                    <td>
                        {{-- devo usare il form con metodo DELETE perché con un bototne normale invierei in GET --}}
                        <form onsubmit="return confirm('Confermi eliminazione di: {{$pasta->title}}')" action="{{ route('pastas.destroy', $pasta) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">DELETE</button></td>
                        </form>
                </tr>
            @endforeach


        </tbody>
      </table>
</div>
<div class="container">
    {{ $pastas->links() }}
</div>

@endsection
