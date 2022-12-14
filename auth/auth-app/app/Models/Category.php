<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['categorie']; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
