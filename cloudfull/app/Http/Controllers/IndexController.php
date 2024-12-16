<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class IndexController extends Controller
{
    public function index()
    {
        $deposits = Payment::where('payment_type', 'deposit')->where('status', 'paid')->latest()->take(3)->get();
        $withdrawals = Payment::where('payment_type', 'withdrawal')->where('status', 'paid')->latest()->take(3)->get();

        $payments = $deposits->merge($withdrawals)->shuffle();

        return view('home', compact('payments'));
    }
}
