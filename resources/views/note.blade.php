<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
        ]);
    
        // Retrieve size input from the request
    
        // Create the order
        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->zipcode = $request->input('zipcode');
        $order->save();
    
        // Add order details
        if(Session::has('cart')) {
            foreach(Session::get('cart') as $id => $details) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->name = $details['name'];
                $orderDetail->price = $details['price'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->image = $details['image'];
                $orderDetail->size = $details['size']; // Store the selected size
                $orderDetail->total = $details['price'] * $details['quantity'];
                $orderDetail->save();
            }
    
            // Clear the cart after the order is placed
            Session::forget('cart');
        }
    
        // Redirect or return a response as needed
        return view('Success');
    }
    public function index()
    {
        // Fetch orders with pagination
        $orders = Order::paginate(3); // Paginate with 10 orders per page
    
        // Return the view with the paginated orders data
        return view('orderstable', compact('orders'));
    }
    }


