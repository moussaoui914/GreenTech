<?php

namespace App\Models;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function produit(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
}
