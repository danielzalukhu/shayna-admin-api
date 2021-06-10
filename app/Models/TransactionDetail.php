<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes; 
    
    protected $table = 'transaction_details';
    
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'sub_total',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
