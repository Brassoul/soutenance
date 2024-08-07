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
                    <div class="card">
                        <div class="card-body">
                          <table>
                            <thead>
                                <tr>
                                    <th>libelle</th>
                                    <th>prix</th>
                                    <th>quantite</th>
                                    <th>description</th>
                                    <th>chemin</th>
                                    <th>cathegorie</th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>
                                    {{ $produit->libelle}}  
                                   
                                </td>
                                <td>
                                    {{ $produit->prix}}  
                                  
                                </td>
                                <td>
                                    {{ $produit->quantite}}  
               
                                </td>
                                <td>
                                    {{ $produit->description}}  
                                    
                                
                                </td>
                                <td>
                                    {{ $produit->cathegorie->cathegorie}} 
                                </td>
                            </tbody>
                        </table>                       
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>