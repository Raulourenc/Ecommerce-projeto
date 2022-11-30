<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
        $categories = Category::all();
        $providers = Provider::all();

          
        session_start();
        $check = User::all()->where('admin', true);
        $checked = $check->pluck('email');

        foreach($checked as $mail){

            if(isset($_SESSION['email']) == $mail){
                $_SESSION['prod'] = true;

                return view('product', compact('categories', 'providers'));
               
            }
        }

        $_SESSION['prod'] = false;
        
       
        return view('product', compact('categories', 'providers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        session_start();
        $image = $request->file('image');
        $image_urn = $image->store('public');

        $product =  new Products;
        $product->name = $request->name; 
        $product->price = $request->price; 
        $product->image = $image_urn; 
        $product->description = $request->description; 
        $product->quantity = $request->quantity; 
        $product->category_id = $request->category_id; 
        $product->provider_id = $request->provider_id; 

        $product->save();

        return redirect()->back()->with('msg', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        session_start();
        $_SESSION['rota'] = Route('index');
        $_SESSION['prod'] = false;

        if(auth::check()){
            $_SESSION['rota'] = Route('welcome');
            $_SESSION['prod'] = true;
        }
      
        $search = $request->input('search_');
        if($search != ""){
            $products = Products::where('name', 'LIKE', "%$search%")->paginate(8);
        } else {
            $products = Products::paginate(8);
        }
    
        $product = Products::where('id', $id)->first()->getAttributes();
        $providers = Provider::where('id', $product['provider_id'])->first()->getAttributes();
       
        return view('specific_product', compact('products', 'product', 'providers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
