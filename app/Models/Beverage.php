<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    use HasFactory;

    protected $table = 'beverages2';

    protected $fillable = [
        'category_id',
        'beverage_date',
        'title',
        'price',
        'published',
        'special',
        'image',
        'content',
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
