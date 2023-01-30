<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function artiste()
    {
        return $this->hasOne(Artiste::class);
    }

    public function categorie()
    {
        return $this->hasOne(Categorie::class);
    }

    public function panier()
    {
        return $this->belongsToMany(Panier::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date',
        'price',
        'cover',
        'categorie_id',
        'artiste_id',
        'taille_id',
        'collection_id'
    ];
}
