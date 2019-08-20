<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;

use Store\Http\Requests\Products\UpdateProductRequest;
use Store\Http\Requests\Products\CreateProductsRequest;
use Store\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
          'products'=> Product::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
        auth()->user()->products()->create([
          'name' => $request->name,
          'retail_price' => $request->retail_price,
          'wholesale_price' => $request->wholesale_price
        ]);

        session()->flash('success', 'Product created');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->only(['name', 'retail_price', 'wholesale_price']);

        $product->update($data);

        session()->flash('success', 'Update successful');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $product)
    {

        $product->delete();

        session()->flash('success', 'Product deleted.');

        return redirect(route('products.index'));
    }
    public function search(Product $product)
    {
      // $search = $request->get('searh');
      // $product = DB::table('products')->where('name', '%'.$search.'%');
      return view('products.index', ['products' => $product]);
    }
}
