@extends('layoutes.layout')
@section('contenu')
<form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="libelle" class="form-label">Libelle : </label>
        <input required type="text" value="{{ old('libelle', $produit->libelle) }}" class="form-control" id="libelle" name="libelle">
        @error('libelle')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix : </label>
        <input required type="number" value="{{ old('prix', $produit->prix) }}" min="1" class="form-control" id="prix" name="prix">
        @error('prix')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite : </label>
        <input required type="number" value="{{ old('quantite', $produit->quantite) }}" min="1" class="form-control" id="quantite" name="quantite">
        @error('quantite')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description : </label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $produit->description) }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="chemin" class="form-label">Image : </label>
        <input type="file" class="form-control" id="chemin" name="chemin">
        @error('chemin')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cathegorie" class="form-label">Cathegorie : </label>
        <select class="form-select bg-black text-light" aria-label="Default select example" name="cathegorie_id">
            <option>Open this select menu</option>
            @foreach ($cathegories as $c)
                <option value="{{ $c->id }}" @class(['text-light', 'font-bold' => true]) @if ($c->id == $produit->cathegorie_id) @selected(true) @endif>
                    {{ $c->cathegorie }}
                </option>
            @endforeach
        </select>
        @error('categorie_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Modifier</button>
    </div>
</form>
        
@endsection