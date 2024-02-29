<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::query()->with('category')->paginate(4);
        return view('product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $categories = Category::All();
    //     $products = Product::All();
    //     // $product = new Product();
    //     return view('product.form', compact('products','categories'));
    // }
    public function create()
{
    $categories = Category::all();
    $products = Product::all();
    // $product = new Product();
    return view('product.create', compact('products', 'categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $categories =Category::All();
    $imageName = '';

    // Handle file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
    }

    $product = new Product();
  
    $product->name = strip_tags($request->input('name'));
    $product->description = strip_tags($request->input('description'));
    $product->quntity= strip_tags($request->input('quntity'));
    $product->category_id= strip_tags($request->input('category_id'));
    $product->category_id= strip_tags($request->input('category_id'));
  
    

    $product->image = $imageName;
    $product->price= strip_tags($request->input('price'));
    $product->save();
    $request->file('image')->move(public_path('images'), $imageName);
  

    return redirect()->route('index')->with('success', 'Product create successfully');
}

/**
 * Display the specified resource.
 */




    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
        $product=Product::find($id);
        $categories =Category::All();
       // return view('product.edit')->with('product', $product);     
       return view('product.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request,  $id)
    { 
        $request->validated();
        $product = Product::find($id);
        $category =Category::find($id); 
        // Check if a new image is being uploaded
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
    
            // Move the uploaded image to a directory and update the computer's image attribute
           
            // $computer->image = $imageName;
        }
    
        // Update other attributes if they're present in the request
        $product->name = strip_tags($request->input('name'));
        $product->description = strip_tags($request->input('description'));
        $product->quntity= strip_tags($request->input('quntity'));
        if($imageName != '')
            $product->image = $imageName;
        $product->category_id= strip_tags($request->input('category_id'));
        $product->price= strip_tags($request->input('price'));
    
        $product->save(); // Save the changes to the database
        if($imageName != '')
            $image->move(public_path('images'), $imageName);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $product = Product::find($id);
        $product->delete();
        //return redirect()->route('products.index')->with('success', 'Product create successfully');
        return back()->with('successdelete','You have successfully deleted an article.');
    }

    public function cart()
    {


         return view('cart');

    }

    public function addToCart($id)
    {


        $product = Product::find($id);


        $cart = session()->get('cart');
       // $cart=['id'=>["name"=> $product->name, "quantity"=> 1, "price"=> $product->price, "photo" => $product->image], 'id2'=>[],'id3'=>[].....];

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

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
            "photo" => $product->image
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');



    }


     // update product of choose in cart
 public function updatec(Request $request)
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
 public function removec(Request $request)
 {
     if($request->id) {

         $cart = session()->get('cart');

         if(isset($cart[$request->id])) {

             unset($cart[$request->id]);

             session()->put('cart', $cart);
         }

         session()->flash('success', 'Product removed successfully');
     }

 }


}


    

