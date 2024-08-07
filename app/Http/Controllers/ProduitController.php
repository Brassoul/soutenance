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