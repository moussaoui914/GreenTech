<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Produit::class, 'favorites', 'user_id', 'produit_id')
                    ->withTimestamps();
    }

    public function isFavorite($produitId): bool
    {
        return $this->favoriteProducts()->where('produit_id', $produitId)->exists();
    }


    public function toggleFavorite($produitId): bool
    {
        if ($this->isFavorite($produitId)) {
            $this->favoriteProducts()->detach($produitId);
            return false;
        } else {
            $this->favoriteProducts()->attach($produitId);
            return true;
        }
    }
}