<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'success')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'pending')->count(),
            'rejected' => Transaction::where('transaction_status', 'rejected')->count(),
            'success' => Transaction::where('transaction_status', 'success')->count(),
        ];

        return view('pages.dashboard', compact(
            'income',
            'sales',
            'items',
            'pie'
        ));
    }
}
