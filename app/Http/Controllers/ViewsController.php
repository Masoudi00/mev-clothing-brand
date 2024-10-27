<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ViewsController extends Controller
{
    public function Home() {
        return View('Home');
    }

    public function Shop(){
        $products=Product::paginate(3);
        return view('shop', ['products' => $products ]);
    
    }

    public function ShopCategory(Request $rq){
    
    
        $cat=$rq->route('category');
        
            $products = Product::where('category', '=', $cat)->get();
        
            return view('ShopCategory', [
               'products' => $products,
               'category' => $cat
               ]);
        
        }
    

        public function productDetails($id)
        {
            $product = Product::find($id);
            return view('productDetails', compact('product'));
        }
    
     

        public function NewCart() 
        {
            return view('NewCart');
        }
        
        
        public function CartForm() 
        {
            return view('CartForm');
        }

        public function NewOrdersTable(){
        // Fetch orders with pagination
        $orders = Order::paginate(1); // Paginate with 10 orders per page
    
        // Return the view with the paginated orders data
        return view('NewOrdersTable', compact('orders'));
        }

}
