<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $featuredProducts = Product::where('is_featured', true)->take(6)->get();
        $testimonials = Testimonial::latest()->take(5)->get();

        return view('pages.home', compact('categories', 'featuredProducts', 'testimonials'));
    }
}
