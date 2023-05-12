<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($categorie=0)
    {
        //
        //Listing produits
        $products = Product::orderBy('created_at','desc')->paginate(10);
        
        //Listing produits par categorie
        if ($categorie!=0) {
        
            $products = Product::where('category_id',$categorie)->orderBy('created_at','desc')->paginate(10);
        }
    

        //Listing categories
        $categories = Category::orderBy('name')->get();

        return view ('welcome',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     * afficher le detail du produit et les produits similaires
     */
    public function detail(Product $product)
    {
         //selctionner les produits qui ont la meme categorie
             $products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        
        
        return view('detail',compact('product','products'));
       
    }

    /**
     * Store a newly created resource in storage.
     * ajouter dans le caddie 
     * controle l'existence du produit dans le caddie
     * si il existe il met a jour la quantité
     
     */
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


