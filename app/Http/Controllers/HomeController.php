<?php

namespace App\Http\Controllers;

use App\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $categories = Category::all();
        return view('pages.home', compact('products', 'categories'));
    }

    public function notFound()
    {
        return view('404');
    }
}
