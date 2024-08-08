@extends('layoutes.layout')
@section('contenu')
<form action="{{ route('cathegories.update',$cathegorie->id) }}" method="POST">
    @method('PUT') 
@csrf
    <div class="mb-3">

      <label for="cathegorie" class="form-label">cathegorie</label>
      <input type="text"  value="{{ old('cathegorie', $cathegorie->cathegorie) }}" class="form-control" id="cathegorie" aria-describedby="cathegorie" name="cathegorie">
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>
        
@endsection