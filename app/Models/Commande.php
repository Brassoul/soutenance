<?php

namespace App\Models;

use App\Models\Utulisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $fillable= ['date_commande','montant_commande','status', 'utulisateur_id'];

   

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
