@extends('layoutes.layout')
@section('contenu')
<div class="card-body">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage'.$produit->chemin) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$produit->libelle}}</h5>
          <h5 class="card-title">{{$produit->prix}}</h5>
          <h5 class="card-title">{{$produit->quantite}}</h5>
          <p class="card-text">{{$produit->description}}</p>
          <h5 class="card-title">{{$produit->cathegorie->cathegorie}}</h5>
        </div>
      </div>
                     
  </div>
</div>
        
@endsection