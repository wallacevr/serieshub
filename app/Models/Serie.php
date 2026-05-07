<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'cover',
        'release_year'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}