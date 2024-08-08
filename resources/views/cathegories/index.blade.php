@extends('layoutes.layout')
@section('button')
<a class="btn btn-primary"   href="{{ route('cathegories.create') }}"> Nouveau Cathegorie</a>

@endsection
@section('contenu')

<table id="datatablesSimple">
    <thead>
        <tr>
            <th>#</th>
            <th>Libelle</th>
             <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Libelle</th>
             <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($cathegories as $item )
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->cathegorie}}</td>

            <td>
                <div class="d-grid gap-2 d-md-block">
                    <a href="{{ route('cathegories.edit', $item->id) }}" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="{{ route('cathegories.show', $item->id) }}" class="btn btn-primary">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <form action="{{ route('cathegories.delete', $item->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?');">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach



    </tbody>
</table>
@endsection