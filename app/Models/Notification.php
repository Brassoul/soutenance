<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    protected $fillable= ['commentaire', 'utulisateur_id'];

    
    

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
