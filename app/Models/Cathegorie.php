<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cathegorie extends Model
{
    use HasFactory;
    protected $fillable= ['cathegorie'];

    /**
     * Get all of the comments for the cathegorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'cathegorie_id');
    }
}
