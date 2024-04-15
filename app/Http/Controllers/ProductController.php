<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductValidation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //
        $products = Product::all()->sortByDesc('id');
        return view('welcome', compact('products'));
    }

    public function available()
    {
        //
        $products = Product::where('status', 'available')->orderBy('id', 'desc')->get();
        return view('welcome', compact('products'));
    }

    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('products-card', compact('product'));
    }

    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('product-edit', compact('product'));
    }

    public function create()
    {
        //
        return view('products-create');
    }

    public function store(Request $request)
    {
        //
        $validateAction = new ProductValidation();
        $validateAction->store($request);

        return redirect()->route('products.index');
    }

    public function update($id, Request $request)
    {
        //
        $validateAction = new ProductValidation();
        $validateAction->update($id, $request);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
