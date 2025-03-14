<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_type_id',
        'material',
        'production_time',
        'complexity',
        'sustainability',
        'unique_properties',
        'price',
        'review_id',
        'image',
    ];

    public function productType()
    {
        return $this->belongsTo(Product_Type::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}