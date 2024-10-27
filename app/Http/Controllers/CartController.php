<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart');
    
        // Check if the cart is empty
        if (empty($cart)) {
            return redirect()->route('Shop')->with('info', 'Your cart is empty. Please add products to your cart.');
        }
    
        return view('cart');
    }
     
    public function add(Request $request, $id, $size)
    {
        $product = Product::find($id);
    
        $cart = session()->get('cart');
    
        // Create a unique key for the product based on its ID and size
        $key = $id . '_' . $size;
    
        // If cart is empty, initialize it with the new product
        if (!$cart) {
            $cart = [
                $key => [
                    "product_id" => $id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                    "image2" => $product->image2,
                    "size" => $size // Store the selected size
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Added to cart successfully!');
        }
    
        // If the product with the same size is already in the cart, increase the quantity
        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    
        // Otherwise, add the new product with the specified size to the cart
        $cart[$key] = [
            "product_id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
            "image2" => $product->image2,
            "size" => $size // Store the selected size
        ];
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    public function updatec(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
            }
        }
    }

    // delete or remove product of choose in cart
    public function removec(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
