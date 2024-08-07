<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lignecommande extends Model
{
    use HasFactory;
    protected $fillable= ['libelle','prix','quantite','commande_id','produit_id'];
    /**
     * Get the cathegorie that owns the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commandes(): BelongsTo
    {
        return $this->belongsTo(commande::class, 'commande_id');
    }
/**
     * Get all of the comments for the produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'lignecommande_id');
    }


}
