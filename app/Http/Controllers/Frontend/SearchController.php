<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
    {
       $query = $request->search_text;
       $search_results = Product::where('product_name', 'LIKE', '%'.$query.'%')->where('enabled', '=', '1')->get();
       return view('frontend.search.index', compact('search_results'));

    }
}
