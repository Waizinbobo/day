<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titel',
        'category_id',
        'description',
        'cover'
    ];

    public function category() {
    return $this->belongsTo(Categories::class);
    }
}



