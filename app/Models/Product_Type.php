<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'product_types';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
