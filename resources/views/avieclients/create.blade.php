<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('avieclients.store') }}" method="POST">
                    @csrf
                    <div class="mb-3" hidden>
                        <label for="mail" class="form-label">Nom Utilisateur : </label>
                        <input required type="text" class="form-control" id="mail" name="mail"
                            value="{{ Auth::user()->name }}" >
                    </div>
                    <div class="mb-3">
                        <label for="avieclient" class="form-label">avieclient : </label>
                        <textarea required type="text" class="form-control" id="avieclient" name="avieclient"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="produits_id" class="form-label">Produit : </label>
                        {{-- <input required type="text" class="form-control" id="produits_id" name="produits_id"> --}}
                        <select class="form-select" aria-label="Default select example" name="produits_id">
                            <option selected>Open this select menu</option>
                            @foreach ($produit as $p)
                                <option value="{{ $p->id }}"
                                    @if ($p->id == $productSelect->id) @selected(true) @endif>{{ $p->libelle }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="users_id" class="form-label">users_id : </label>
                        <input type="text" name="users_id" id="users_id" class="form-control" value="{{Auth::user()->id}}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-sm btn-primary">Ajouter</button>
                    </div>
                      </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>