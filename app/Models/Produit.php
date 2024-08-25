<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable= ['libelle','prix','quantite','description','chemin','cathegorie_id'];
    /**
     * Get the cathegorie that owns the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cathegorie(): BelongsTo
    {
        return $this->belongsTo(cathegorie::class, 'cathegorie_id');
    }

    /**
     * Get all of the comments for the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Avieclients(): HasMany
    {
        return $this->hasMany(Avieclient::class, 'produits_id');
    }
    /**
     * Get all of the comments for the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Lignecommandes(): HasMany
    {
        return $this->hasMany(Lignecommande::class, 'produits_id');
    }

//     // Filtrer par prix
//     public function filterByPrice($minPrice, $maxPrice)
// {
//     $produits = Produit::whereBetween('prix', [$minPrice, $maxPrice])->get();
//     return view('site.shop', compact('produits'));
// }


// // Filtrer par popularité (basé sur les ventes)
// public function filterByPopularity()
// {
//     $produits = Produit::withCount('Lignecommandes')
//                        ->orderBy('lignecommandes_count', 'desc')
//                        ->get();
//     return view('site.shop', compact('produits'));
// }
// // Filtrer par catégorie
// public function filterByCategory($categoryId)
// {
//     $produits = Produit::where('cathegorie_id', $categoryId)->get();
//     return view('site.shop', compact('produits'));
// }
// // Filtrer par les produits les plus récents
// public function filterByNewest()
// {
//     $produits = Produit::orderBy('created_at', 'desc')->get();
//     return view('site.shop', compact('produits'));
// }
// // Filtrer par note moyenne des avis clients
// public function filterByAverageRating()
// {
//     $produits = Produit::with(['Avieclients' => function ($query) {
//         $query->selectRaw('produits_id, AVG(note) as average_rating')
//               ->groupBy('produits_id');
//     }])->orderBy('average_rating', 'desc')->get();

//     return view('site.shop', compact('produits'));
// }
// // Filtrer par disponibilité (quantité en stock)
// public function filterByAvailability()
// {
//     $produits = Produit::where('quantite', '>', 0)->get();
//     return view('site.shop', compact('produits'));
// }
// // Trier par prix (ascendant/descendant)
// public function sortByPrice($order = 'asc')
// {
//     $produits = Produit::orderBy('prix', $order)->get();
//     return view('site.shop', compact('produits'));
// }
// // Filtrer par nom (recherche)
// public function searchByName($searchTerm)
// {
//     $produits = Produit::where('libelle', 'like', '%' . $searchTerm . '%')
//                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
//                        ->get();
//     return view('site.shop', compact('produits'));
// }

}
