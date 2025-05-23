<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    //database relationship
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
