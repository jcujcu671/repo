<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function faq()
    {
        return view('pages.faq');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function affiliate()
    {
        return view('pages.affiliate');
    }

    public function about()
    {
        return view('pages.about');
    }
}
