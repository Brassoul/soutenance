@extends('layoutes.layout')
@section('contenu')
<form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="date_commande" class="form-label">Date de la Commande</label>
        <input type="date" class="form-control" id="date_commande" name="date_commande" value="{{ old('date_commande') }}">
        @error('date_commande')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="montant_commande" class="form-label">Montant de la Commande</label>
        <input type="number" step="0.01" class="form-control" id="montant_commande" name="montant_commande" value="{{ old('montant_commande') }}" min="0">
        @error('montant_commande')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Statut de la Commande</label>
        <select class="form-select" id="status" name="status">
            <option value="" disabled selected>Choisissez un statut</option>
            <option value="En attente" {{ old('status') == 'En attente' ? 'selected' : '' }}>En attente</option>
            <option value="En cours" {{ old('status') == 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Terminé" {{ old('status') == 'Terminé' ? 'selected' : '' }}>Terminé</option>
        </select>
        @error('status')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="utulisateur_id" class="form-label">Utulisateurs</label>
        <select class="form-select" id="utulisateur_id" name="utulisateur_id">
            <option value="" disabled selected>Choisissez un utulisateur</option>
            @foreach ($utulisateurs as $item)
            <option value="{{$item->id}}" >{{$item->nom}}</option>

            @endforeach
          
        </select>
        @error('utulisateur_id')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection