<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\AddRequest;
use App\Mail\TestingMail;
use Illuminate\Support\facades\Mail;



class UserController extends Controller
{
    //----------------------------------AdminSpace----------------------------
    
    // AddProduct:
    public function AddP()
    {
        return view('Admin.AddProduct');
    }

    public function store(AddRequest $request)
    {
        $validated = $request->validated();

        // Retrieve the values from the form
        $name = $request->input('name');
        $price = $request->input('price');
        $category = $request->input('category');
        $image = $request->file('image')->getClientOriginalName();
        $image2 = $request->file('image2')->getClientOriginalName();

        // Create a new Product instance
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->category = $category;
        $product->image = $image;
        $product->image2 = $image2;
        $product->solde = 0;

        // Save the product to the database
        $product->save();

        // Move the uploaded images to the public directory
        $request->file('image')->move(public_path('imgs'), $image);
        $request->file('image2')->move(public_path('imgs'), $image2);

        return back()->with('success', 'You have successfully added a new Product.');
    }

    // Modify+Delete:
    public function AdminSpace()
    {
        $products = Product::paginate(3);
        return view('Admin.AdminSpace', ['products' => $products]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit')->with('product', $product);
    }

    public function update(AddRequest $request, $id)
    {
        $validated = $request->validated();

        // Retrieve the new values from the form
        $name = $request->input('name');
        $price = $request->input('price');
        $category = $request->input('category');

        // Retrieve the Product instance
        $product = Product::find($id);

        // Update the product fields
        $product->name = $name;
        $product->price = $price;
        $product->category = $category;

        // Handling image upload if needed
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $product->image = $image;
            $request->file('image')->move(public_path('imgs'), $image);
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->getClientOriginalName();
            $product->image2 = $image2;
            $request->file('image2')->move(public_path('imgs'), $image2);
        }

        $product->save();

        return back()->with('successupdate', 'You have successfully updated a product.');
    }

    //Delete:
    
    public function destroy(string $id)
    {
        \Log::info('Entering destroy method'); // Log entry
        $product = Product::findOrFail($id);
    
        \Log::info('Product found: ' . $product->name); // Log product details
    
        $product->delete();
    
        \Log::info('Product deleted'); // Log deletion confirmation
    
        return back()->with('successdelete', 'You have successfully deleted a product.');
    }


    //Emailing:
    public function email(){
        return View('Admin.email');
    }
            
    public function sendEmail(Request $request)
{
    $data = [
        'recipient_email' => $request->input('recipient_email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ];

    // Envoyer l'e-mail en utilisant la classe Mailable
    Mail::to($data['recipient_email'])->send(new TestingMail($data));

    return back()->with('success','Email sent successfully!');
}


    //----------------------------ClientSpace--------------------------------------

    public function ClientSpace()
    {
        return view('ClientSpace');
    }

    public function cataloguepdf()
    {
        $products = Product::where('solde', 1)->get();

        $data = [
            'products' => $products,
        ];

        $pdf = Pdf::loadView('catalogue', $data);

        return $pdf->stream();
    }
}
