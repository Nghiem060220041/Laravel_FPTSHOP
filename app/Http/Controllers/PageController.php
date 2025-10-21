<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function career()
    {
        return view('pages.career');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
