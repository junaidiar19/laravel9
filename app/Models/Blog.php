<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // foreign key dari user_id
    }
}