<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier Commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
