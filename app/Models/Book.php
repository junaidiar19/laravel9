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

    // Scope for Filtering
    public function scopeFilter($query, $params)
    {
        // if(@$params['search']) {
        //     $query->where('title', 'LIKE', "%{$params['search']}%")
        //         ->orWhere('kode', 'LIKE', "%{$params['search']}%");
        // }

        $query->where(function($query) use ($params) {
            if(@$params['search']) {
                $query->where('title', 'LIKE', "%{$params['search']}%")
                    ->orWhere('kode', 'LIKE', "%{$params['search']}%");
            }
        });

        if(@$params['category']) {
            $query->where('category_id', $params['category']);
        }
    }

    // Defining an Accessor
    public function getGetPriceAttribute()
    {
        $price = $this->attributes['price'];
        return ($price > 0) ? 'Rp. ' . number_format($price) : 'Free';
    }

    public function getGetCoverAttribute()
    {
        return ($this->attributes['cover']) ? asset('storage/' . $this->attributes['cover']) : asset('images/default.jpg');
    }
}
