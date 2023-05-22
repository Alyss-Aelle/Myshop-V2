<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
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
        
        //listing de toutes les categories
        $categories = Category::all();

        //listing de toutes les produits du panier d'un utilisateur
        $carts = Cart::where('user_id',Auth::user()->id)
        ->get();


        //incrementation de la quantité de produits dans le panier
        

        $sommeTotal = 0;

       foreach ($carts as $itemCart) {
            
        

        //calcul du prix total de tous les articles
        $sommeTotal = ($itemCart->quantity * $itemCart->price) + $sommeTotal;
        
        }
        return view('cart',compact('carts','sommeTotal','categories'));
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



    //incrementation de la quantité
            $quantity = 1;

            if (isset($_GET['quantity'])) {
            $quantity = $_GET['quantity'];
            };
                //dd($_GET);

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
                        'quantity'=> $quantity, 
                    ]);


                } else {
     // ajout produit non existant en base
                Cart::create(['user_id'=>Auth::user()->id,
                'product_id'=>$product->id,
                'quantity'=> $quantity,
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
        //verifier que ça existe
       /* $cart = Cart::findOrFail($id);
        
                            
                        
        $newQuantity = $cart->quantity;
        $newQuantity = $newQuantity;
        dd($cart->quantity);
        return 'ok';
        */
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
        
        //recuperation d'un produit par son identifiant
        $cart = Cart::findOrFail($id) ;

        
         //suppression du produit a partir de l'identifiant
         $cart->delete();
         return back();
    }
}
