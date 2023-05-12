<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carts = Cart::where('user_id',Auth::user()->id)
        ->get();
        return view('cart',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function add(Product $product)
    {

    /* verifie l'existence du produit dans le panier
    SELECTED * FROM CART WHERE USER_ID =? AND PRODUCT_ID=$PRODUCT->ID->LIMIT */
        $cart = Cart::where('user_id',Auth::user()->id)
                    ->where('product_id',$product->id)
                    ->first();

                    
    //verification pour savoir si le produit est deja existant
                if (isset($cart) ) {
                    
                //modification de la quantité deja enregistrer en base
                //UPDATE CART SET QUANTITY=? WHERE ID=?
                    Cart::where('id',$cart->id)
                    ->update([
                        'quantity'=> $cart->quantity +1, 
                    ]);


                } else {
                 // ajout produit non existant en base
                Cart::create(['user_id'=>Auth::user()->id,
                'product_id'=>$product->id,
                'quantity'=> 1,
                'price'=>$product->price,
            ]);
            
                }
                


                return redirect (route('cart'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
