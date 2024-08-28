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
    
}
