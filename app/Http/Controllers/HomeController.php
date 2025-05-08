<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function index()
    {   
        $categories = Category::orderBy('name')->get();
        $slides = Slide::where('status', 1)->get()->take(4);
        return view('index', compact('slides','categories'));
    }
}
