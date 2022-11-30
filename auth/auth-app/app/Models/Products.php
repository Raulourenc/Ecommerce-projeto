<?php

namespace App\Models;
use App\Model\Provider;
use App\Model\Acategory;
use App\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'weight', 'quantity', 'categorie_id', 'provider_id', 'image']; 

    public function client()
    {
        return $this->hasMany(User::class);
    }

    public function provider()
    {
        return $this->hasMany(Provider::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Acategory::class);
    }
}
