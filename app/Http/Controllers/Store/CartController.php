<?php

namespace App\Http\Controllers\Store;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()  
    {
        return view('store.cart');  
    }
    public function addToCart($id){

        $product = Product::find($id);

        if(!$product) {
   
            abort(404);
   
        }

        $cart = session()->get('cart'); 

        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];
   
            session()->put('cart', $cart, []);
            // Retrieve the current cart count
            $cartCount = count($cart);

            // Store the cart count in the session
            session()->put('cartCount', $cartCount);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); // this code put product of choose in cart
           
                        
            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        // Retrieve the current cart count
        $cartCount = count($cart);

        // Store the cart count in the session
        session()->put('cartCount', $cartCount);

        session()->put('cart', $cart); // this code put product of choose in cart
            

        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }
    // update product of choose in cart
    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
    // delete or remove product of choose in cart
    public function removeCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
    
                // Recalculate the cart count after removing the product
                $cartCount = count($cart);
                session()->put('cartCount', $cartCount);
    
                session()->flash('success', 'Product removed successfully');
            }
        }
    }
    public function clearCart() {
        
        session()->forget('cart');

        session()->forget('cartCount'); // Clear the cart count as well, if applicable
    
        session()->flash('success', 'Cart cleared successfully');
    
        return redirect()->route('index'); // or any other route you want to redirect to after clearing the cart
    }
}
