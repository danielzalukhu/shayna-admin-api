<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; 

    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'type',
        'slug',
        'description',
        'price',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
