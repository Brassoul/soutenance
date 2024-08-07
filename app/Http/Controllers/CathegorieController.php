<?php

namespace App\Http\Controllers;

use App\Models\Cathegorie;
use Illuminate\Http\Request;

class CathegorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cathegories = Cathegorie::all();
        return view('cathegories.index', compact('cathegories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cathegories.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $cathegorie= Cathegorie::create($request->all());
        //
        // $validated = $request->validate(
        //     [
        //         "cathegorie" => ['unique:cathegories', 'max:255', 'required']
        //     ]
        // );
        // $data = $request->all();
        // Cathegorie::create($data);
        return  redirect()->route('cathegories.index')->with("addSuccess", "Le cathegorie a été ajouté avec succés");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cathegorie = cathegorie::find($id);
        return view('cathegories.show', compact('cathegorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cathegorie = cathegorie::find($id);

        return view('cathegories.edit', compact('cathegorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    $datavalidation= $request->validate(
       [ 'cathegorie'=>'required'],
    );

        $cathegorie = cathegorie::find($id);

         $cathegorie->update($datavalidation) ;
        return  redirect()->route('cathegories.index')->with("addSuccess", "Le cathegorie a été modofier avec succés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cathegorie = Cathegorie::findOrFail($id);

        // Supprimer la catégorie
        $cathegorie->delete();
    
        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('cathegories.index')->with('deleteSuccess', 'La catégorie a été supprimée avec succès');
    }
}
