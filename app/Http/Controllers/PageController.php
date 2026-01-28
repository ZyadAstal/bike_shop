<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show About page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show Services page.
     */
    public function services()
    {
        return view('pages.services');
    }

    /**
     * Show FAQ page.
     */
    public function faq()
    {
        return view('pages.faq');
    }
}
