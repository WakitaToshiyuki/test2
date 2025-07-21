<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index(){
        $products = Product::Paginate(6);
        return view('index', compact('products'));

        // return view('index');
    }

    public function products(){
        return view('products');
    }

    public function register(){
        return view('register');
    }

    public function store(ProductRequest $request){
        $imagePath = $request->file('image')->store('public/images');
        $product = $request->input('Product'); // ['name' => ...]
        $product['price'] = $request->input('price');
        $product['description'] = $request->input('description');
        $product['image'] = basename($imagePath);
        Product::create($product);
        $season = $request->input('Season'); // ['name' => ...]
        Season::create($season);
        return view('products',compact('product', 'season'));
    }
}
