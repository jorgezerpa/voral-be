<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','price', 'image', 'categorie_id', 'size'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
