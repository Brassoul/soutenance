@extends('layoutes.layout')
@section('contenu')
<form action="{{ route('commandes.update', $commande->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="date_commande" class="form-label">Date de Commande</label>
        <input type="date" class="form-control" id="date_commande" name="date_commande" value="{{ old('date_commande', $commande->date_commande ? \Carbon\Carbon::parse($commande->date_commande)->format('Y-m-d') : '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="montant_commande" class="form-label">Montant de Commande</label>
        <input type="number" step="0.01" class="form-control" id="montant_commande" name="montant_commande" value="{{ old('montant_commande', $commande->montant_commande) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="status" class="form-label">Statut</label>
        <select class="form-select" id="status" name="status" required>
            <option value="En Attente" @selected(old('status', $commande->status) == 'pending')>En Attente</option>
            <option value="valider" @selected(old('status', $commande->status) == 'completed')>valider</option>
            <option value="Annulé" @selected(old('status', $commande->status) == 'canceled')>Annulé</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
        
@endsection