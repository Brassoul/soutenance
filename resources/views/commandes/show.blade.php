<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails de la Commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
