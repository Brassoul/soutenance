<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utulisateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Avieclients(): HasMany
    {
        return $this->hasMany(Avieclient::class, 'utulisateur_id');
    }
    /**
     * Get all of the comments for the Utulisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'utulisateur_id');
    }
    /**
     * Get all of the comments for the Utulisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Commandes(): HasMany
    {
        return $this->hasMany(Commande::class, 'utulisateur_id');
    }


}
