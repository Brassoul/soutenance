<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avieclient extends Model
{
    use HasFactory;
    protected $fillable= ['mail','commentaire','produits_id', 'utulisateur_id'];

    public function produits(): BelongsTo
    {
        return $this->belongsTo(produit::class, 'produits_id');
    }

    /**
     * Get the user that owns the commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utulisateurs(): BelongsTo
    {
        return $this->belongsTo(Utulisateur::class, 'utulisateur_id');

    }
}


