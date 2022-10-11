<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create () {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateProduct = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'detail' => 'nullable|max:255'
        ]);

        if ($validateProduct->fails()) {
            return redirect()->route('products.create')->with('error', $validateProduct->errors());
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'detail' => $request->detail
        ]);

        return redirect()->route('products.index')->with('success', 'Product hass been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function edit (Product $product) {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateProduct = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'detail' => 'nullable|max:255'
        ]);

        if ($validateProduct->fails()) {
            return redirect()->route('products.create')->with('error', $validateProduct->errors());
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->detail = $request->detail;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
