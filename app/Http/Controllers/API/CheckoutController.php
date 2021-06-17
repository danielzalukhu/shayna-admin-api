<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Requests\API\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');        
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data);

        foreach($request->transaction_details as $product) 
        {
            $details[] = new TransactionDetail([
                'transaction_id' => 2,
                'product_id' => $product["product_id"],
                'qty' => $product["qty"],   
                'sub_total' => $product["subtotal"]
            ]);
            
            Product::find($product["product_id"])->decrement('quantity', $product["qty"]);
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction, 'Transaksi berhasil dibuat');
    }
}
