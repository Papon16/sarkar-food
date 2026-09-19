<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Food belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}