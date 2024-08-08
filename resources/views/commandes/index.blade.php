@extends('layoutes.layout')
@section('button')
<a class="btn btn-primary"   href="{{ route('commandes.create') }}"> Nouveau Commande</a>

@endsection
@section('contenu')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date de Commande</th>
            <th scope="col">Montant</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->date_commande }}</td>
            <td>{{ number_format($commande->montant_commande, 2, ',', ' ') }} €</td>
            <td>{{ ucfirst($commande->status) }}</td>
            <td>
                <div class="d-grid gap-2 d-md-block">
                    <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('commandes.delete', $commande->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
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