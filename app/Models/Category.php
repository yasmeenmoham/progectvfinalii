<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
     // Add _token field to fillable array
    ];
    public function beverages()
    {
        return $this->hasMany(Beverage::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
