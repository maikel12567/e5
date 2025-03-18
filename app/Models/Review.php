<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'score',
        'product_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}