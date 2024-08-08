@extends('layoutes.layout')
@section('contenu')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Commande #{{ $commande->id }}</h5>
        <p class="card-text"><strong>Date de Commande:</strong> {{ $commande->date_commande }}</p>
        <p class="card-text"><strong>Montant de Commande:</strong> {{ number_format($commande->montant_commande, 2, ',', ' ') }} €</p>
        <p class="card-text"><strong>Statut:</strong> {{ ucfirst($commande->status) }}</p>
        <a href="{{ route('commandes.index') }}" class="btn btn-primary">Retour à la Liste</a>
        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-success">Modifier</a>
        <form action="{{ route('commandes.delete', $commande->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                Supprimer
            </button>
        </form>
    </div>
</div>
        
@endsection