<?php

namespace App\Http\Controllers;

use App\Models\Cathegorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function shop()
    //  {
    //      // Récupérer toutes les catégories
    //      $cathegories = Cathegorie::all();
     
    //      // Créer un tableau pour stocker le nombre de produits par catégorie
    //      $cathegorieCounts = [];
     
    //      // Pour chaque catégorie, compter le nombre de produits
    //      foreach ($cathegories as $cathegorie) {
    //          // Calculer le nombre de produits dans chaque catégorie
    //          $cathegorieCounts[$cathegorie->id] = $cathegorie->produits()->count();
    //      }
     
    //      // Récupérer tous les produits
    //      $produits = Produit::all();
     
    //      // Passer les données à la vue
    //      return view('site.shop', compact('produits', 'cathegories', 'cathegorieCounts'));
    //  }
    public function shop(Request $request)
    {
               // Récupérer toutes les catégories
            //    dd($request->all());
               $produits = Produit::query();

               if ($request->has('search')) {
                   $produits->where('libelle', 'like', '%' . $request->input('search') . '%');
               }
       
               if ($request->has('sort_by')) {
                   switch ($request->input('sort_by')) {
                       case 'popularity':
                           $produits->withCount('avieclients')->orderBy('avieclients_count', 'desc');
                           break;
                       case 'average_rating':
                           $produits->withAvg('avieclients', 'note')->orderBy('avieclients_avg_note', 'desc');
                           break;
                       case 'availability':
                           $produits->orderBy('quantite', 'desc');
                           break;
                       case 'newest':
                           $produits->orderBy('created_at', 'desc');
                           break;
                   }
               }
       
            //    if ($request->has('category')) {
            //     $categoryId = $request->input('category');
            //     $produits = Produit::where('cathegorie_id', $categoryId)->paginate(12);

            //     // $result = $produits->get(); // Exécute la requête et récupère les résultats
            //     // dd( $produits,$categoryId);
            //     }


                if ($request->has('category')) {
                    $categoryId = $request->input('category');
                    $produits = $produits->where('cathegorie_id', $categoryId);
                }
            
                // Ajout d'un appel à get() ou paginate() pour finaliser la requête
                // $produits = $produits->get(); // Pour déboguer sans pagination
            

       
               if ($request->has('price_range')) {
                   $produits->where('prix', '<=', $request->input('price_range'));
               }
       
               if ($request->has('extra_filter')) {
                   // Ajoutez des filtres supplémentaires ici selon votre logique métier
               }
          // Créer un tableau pour stocker le nombre de produits par catégorie     
            $cathegories = Cathegorie::all();
             $cathegorieCounts = [];
     
         // Pour chaque catégorie, compter le nombre de produits
         foreach ($cathegories as $cathegorie) {
             // Calculer le nombre de produits dans chaque catégorie
             $cathegorieCounts[$cathegorie->id] = $cathegorie->produits()->count();
         }
        // $produits = $query->get();
        $cathegories = Cathegorie::all();
        // $produits = Produit::paginate(12); // Exemple avec 12 produits par page
        $produits = $produits->orderBy('id', 'desc')-> paginate(12); // Si la pagination est nécessaire

        return view('site.shop', compact('produits', 'cathegories','cathegorieCounts'));
    }
      

    public function index()
    {
         $cathegories =Cathegorie::all();
        $produits =Produit::all();
        return view('produits.index', compact('produits','cathegories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $cathegories =Cathegorie::all();


        return view('produits.create', compact('cathegories')); //
    }

    /** $cathegories =Cathegorie::all();
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required',
            'chemin' => 'image|nullable',
            'prix' => 'required',
            'quantite' => 'required',
            'description' => 'required',
            'cathegorie_id' => 'required',
        ]);
    
        if ($request->hasFile('chemin')) {
            $chemin = $request->file('chemin')->store('photos');
            $validatedData['chemin'] = $chemin;
        }
    
        Produit::create($validatedData);
    
        return redirect()->route('produits.index')->with("addSuccess", "Le Produit a été ajouté avec succès");
    }
    
    public function shop_detail(string $id)
    {
        //
        $produit = Produit::find($id);
        $cathegories = Cathegorie::all();
        $cathegorieCounts = [];

    // Pour chaque catégorie, compter le nombre de produits
    foreach ($cathegories as $cathegorie) {
        // Calculer le nombre de produits dans chaque catégorie
        $cathegorieCounts[$cathegorie->id] = $cathegorie->produits()->count();
    }
   // $produits = $query->get();
   $cathegories = Cathegorie::all();
        return view('site.shop_detail', compact('produit','cathegories','cathegorieCounts'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produit = Produit::find($id);
        $cathegories =Cathegorie::all();
        return view('produits.edit', compact('produit','cathegories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'libelle' => 'required',
            'chemin' => 'image|nullable',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'description' => 'required',
            'cathegorie_id' => 'required',
        ]);
    
        // Trouver le produit par son ID
        $produit = Produit::findOrFail($id);
    
        // Vérifier si un fichier a été téléchargé et le stocker
        if ($request->hasFile('chemin')) {
            // Supprimer l'ancien fichier d'image s'il existe
            if ($produit->chemin && Storage::exists($produit->chemin)) {
                Storage::delete($produit->chemin);
            }
            
            // Stocker le nouveau fichier d'image
            $chemin = $request->file('chemin')->store('photos');
            $validatedData['chemin'] = $chemin;
        }
    
        // Mettre à jour le produit avec les données validées
        $produit->update($validatedData);
    
        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('produits.index')->with('updateSuccess', 'Le Produit a été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produit = Produit::findOrFail($id);

    // Supprimer le fichier d'image s'il existe
    if ($produit->chemin && Storage::exists($produit->chemin)) {
        Storage::delete($produit->chemin);
    }

    // Supprimer le produit
    $produit->delete();

    return redirect()->route('produits.index')->with('deleteSuccess', 'Le produit a été supprimé avec succès');
}}