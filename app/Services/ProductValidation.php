<?php

namespace App\Services;

use App\Models\Product;

class ProductValidation
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function requestHandler($request, $meth = 'update')
    {
        // 
        if (config('products.role') == 'admin' || $meth == 'store') {
            $validated = $request->validate([
                'article' => 'string|required|unique:products|regex:/^[a-zA-Z0-9 ]+$/|max:255',
                'name' => 'string|required|min:10|max:255',
                'status' => 'string|required|max:255',
            ]);
        }

        if (config('products.role') == 'guest' && $meth == 'update') {
            $validated = $request->validate([
                'name' => 'string|required|min:10|max:255',
                'status' => 'string|required|max:255',
            ]);
        }

        $validatedJson = $request->validate([
            'plus_name.*' => 'string|max:255',
            'plus_value.*' => 'string|max:255',
        ]);

        return [
            'validated' => $validated,
            'validatedJson' => $validatedJson
        ];
    }


    public function update($id, $request)
    {
        // 
        $validate = $this->requestHandler($request);
        $validated = $validate['validated'];
        $validatedJson = $validate['validatedJson'];

        $product = Product::find($id);

        if (config('products.role' == 'admin')) {
            $product->article = $validated['article'];
        }

        $product->name = $validated['name'];
        $product->status = $validated['status'];
        $product->data = $validatedJson;

        $product->save();
    }

    public function store($request)
    {
        // 
        $validate = $this->requestHandler($request, 'store');
        $validated = $validate['validated'];
        $validatedJson = $validate['validatedJson'];

        $product = Product::create($validated);

        // now update json column
        $product->data = $validatedJson;
        $product->save();
    }
}
