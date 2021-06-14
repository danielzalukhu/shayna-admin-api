<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes; 

    protected $table = 'product_galleries';
    
    protected $fillable = [
        'product_id',
        'image_url',
        'is_default',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getImageUrlAttribute($value) 
    {
        // php artisan storage:link
        return url('storage/'. $value);
    }
}
