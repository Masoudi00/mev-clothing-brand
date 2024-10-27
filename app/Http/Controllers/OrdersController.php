<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\OrderDetail;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'Address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
        ]);

        // Check if cart is empty
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Create a new order
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->Address;
        $order->zipcode = $request->zipcode;
        $order->total = array_reduce($cart, function($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $order->save();

        // Save order items and calculate total price
        foreach ($cart as $key => $details) {
            // Separate product ID and size from the key
            list($product_id, $size) = explode('_', $key);

            $totalPrice = $details['price'] * $details['quantity'];
            // Create a new order_detail and associate it with the current order
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $product_id;
            $orderDetail->order_id = $order->id; // Set the order_id
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->price = $details['price'];
            $orderDetail->size = $details['size'];
            $orderDetail->image = $details['image'];
            $orderDetail->image2 = $details['image2'] ?? null;
            $orderDetail->name = $details['name'];
            $orderDetail->save();
        }

        // Clear the cart
        Session::forget('cart');

        return view('Success');
    }

    public function index()
    {
        // Fetch orders with pagination
        $orders = Order::paginate(1); // Paginate with 10 orders per page
    
        // Return the view with the paginated orders data
        return view('orderstable', compact('orders'));
    }

    public function destroy(Order $order)
    {
        // Delete the order along with its order details
        $order->orderDetails()->delete(); // Assuming you have defined the relationship in the Order model
        $order->delete();

        // Return a JSON response
        return response()->json(['success' => true]);
    }

    public function generatePDF(Order $order)
    {
        $pdf = PDF::loadView('orders.pdf', compact('order'));
        return $pdf->download('order_' . $order->id . '.pdf');
    }
}
