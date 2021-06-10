<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes; 
    
    protected $table = 'transactions';
    
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'number',
        'address',
        'transaction_total',
        'transaction_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
