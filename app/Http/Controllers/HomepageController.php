<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request){
        $categories = ProductCategories::all();
        $productsQuery = Products::query();

        if ($request->has('category_id')) {
            $category_id = $request->input('category_id');
            $productsQuery->where('category_id', $category_id);
        }

        $products = $productsQuery->get();

        return view('homepage', compact('categories', 'products'));
    }
}
