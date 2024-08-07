<?php

namespace App\Http\Controllers;

use App\Models\Avieclient;
use App\Models\Produit;
use Illuminate\Http\Request;

class avieclientcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( string $id)
    {
        //
        $produit = produit::all();
        $avieclient = Avieclient::all();
        $productSelect = produit::find($id);
        $avieclients = $avieclient::orderBy('created_at', 'desc')->paginate(6);
        return view('commentaire.index', compact('commentaires', 'commentaire', 'produit', "productSelect"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( string $id)
    {
        $produit = produit::all();
        $avieclient = Avieclient::all();
        $productSelect = Produit::find($id);

        return view('avieclient.create', compact('avieclient', 'produit', "productSelect"));
    } //

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
