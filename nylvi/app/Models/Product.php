<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Artiste()
    {
        return $this->belongsTo(Artiste::class);
    }

    public function Categorie()
    {
        return $this->hasMany(Categorie::class);
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
        'size',
        'categorie_id',
        'artiste_id'
    ];
}
