<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function deposit()
    {
        return view('dashboard.deposit');
    }

    public function bonuses()
    {
        return view('dashboard.bonuses');
    }

    public function referrals()
    {
        return view('dashboard.referrals');
    }

    public function telegram()
    {
        return view('dashboard.telegram');
    }
}
