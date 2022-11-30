<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'number', 'city', 'state', 'complement', 'user_id']; 

    public function address()
    {
        return $this->hasOne(User::class);
    }
}
