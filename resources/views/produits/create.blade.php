@extends('layoutes.layout')
@section('contenu')
<h3 class="text-center text-primary my-1">Nouveau Produit </h3>
                    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libelle</label>
                            <input type="text" name="libelle" class="form-control" id="libelle" value="{{ old('libelle') }}">
                            @error('libelle')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" name="prix" class="form-control" id="prix" value="{{ old('prix') }}">
                            @error('prix')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantite" class="form-label">Quantité</label>
                            <input type="text" name="quantite" class="form-control" id="quantite" value="{{ old('quantite') }}">
                            @error('quantite')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cathegorie_id" class="form-label">Catégorie</label>
                            <select name="cathegorie_id" class="form-control" id="cathegorie_id">
                                <option value="">Sélectionner une catégorie</option>
                               @foreach ($cathegories as $item )
                                   <option value="{{$item->id}}">{{$item->cathegorie}}</option>
                               @endforeach
                            </select>
                            @error('cathegorie_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="chemin" class="form-label">Chemin</label>
                            <input type="file" name="chemin" class="form-control" id="chemin">
                            @error('chemin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
@endsection