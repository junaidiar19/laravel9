<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'title', 'qty', 'price', 'cover', 'category_id', 'published'];
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Defining an Accessor
    public function getGetPriceAttribute()
    {
        $price = $this->attributes['price'];
        return ($price > 0) ? 'Rp. ' . number_format($price) : 'Free';
    }
}
