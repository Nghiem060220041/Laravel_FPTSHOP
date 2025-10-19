<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(8)->get();
        $featuredProducts = Product::inRandomOrder()->take(4)->get();
        
        return view('home', compact('latestProducts', 'featuredProducts'));
    }
}
