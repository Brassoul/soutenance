<?php

namespace App\Http\Controllers;


use App\Models\Produit;

use Illuminate\Http\Request;


class CartController extends Controller
{
    //
    public function cart()
    {
      $Subtotal=  \Cart::getSubTotal();
       $total= \Cart::getTotal();
        $items = \Cart::getContent();
        return view('site.cart',compact('items','total','Subtotal'));
    }

    public function AddCart($ProduitID)
{
    // Trouver le produit par ID
    $produit = Produit::findOrFail($ProduitID);

    // Vérifier si le produit existe et est en stock (ajouter votre logique ici)
    if ($produit) {
        // Ajouter le produit au panier
        \Cart::add(array(
            'id' => $produit->id,
            'name' => $produit->libelle,
            'price' => $produit->prix,
            'quantity' => 1,
            'attributes' => array(
                'image' => asset('storage/' . $produit->chemin)
            )
        ));

        // Redirection vers la vue du panier
        return redirect()->route('site.cart')->with('success', 'Produit ajouté au panier');
    }

    // Gestion de l'erreur si le produit n'existe pas
    return redirect()->back()->with('error', 'Produit non trouvé ou indisponible');
}

public function Addquantity($ProduitID)
{
    // Trouver le produit par ID
    $produit = Produit::findOrFail($ProduitID);

    // Vérifier si le produit existe et est en stock (ajouter votre logique ici)
    if ($produit) {
        // Ajouter le produit au panier
        \Cart::Update($ProduitID,[

        'quantity' => +1,
        ]
       
                
        );

        // Redirection vers la vue du panier
        return redirect()->route('site.cart')->with('success', 'Quantite ajouté au panier');
    }

    // Gestion de l'erreur si le produit n'existe pas
    return redirect()->back()->with('error', 'quantite demander indisponible');
}

public function decreasequantity($ProduitID)
{
    // Trouver le produit par ID
    $produit = Produit::findOrFail($ProduitID);

    // Vérifier si le produit existe et est en stock (ajouter votre logique ici)
    if ($produit) {
        // Ajouter le produit au panier
        \Cart::Update($ProduitID,[

        'quantity' =>-1,
        ]
       
                
        );

        // Redirection vers la vue du panier
        return redirect()->route('site.cart')->with('success', 'Quantite diminuer au panier');
    }

    // Gestion de l'erreur si le produit n'existe pas
    return redirect()->back()->with('error', 'quantite demander indisponible');
}

public function remove($ProduitID){
    \Cart::remove($ProduitID);
    return back()->with('success', 'Produit Supprimer avec success');

}

public function clearCart(){
    \Cart::Clear();
    return back()->with('success', 'panier Supprimer avec success');
}
}
