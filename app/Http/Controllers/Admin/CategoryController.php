<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Support\Facades\Mail; 
use App\Mail\TestMail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =Category::All();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
    
        $category = new Category();
      
        $category->name = strip_tags($request->input('name'));
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Product create successfully');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
      $products = $category->products()->get();  
      return view('category.show', compact('category' , 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit')->with('category', $category); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    { //$request->validated();
        $category =Category::find($id);
      
        $category->name = strip_tags($request->input('name'));
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Product create successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
          //return redirect()->route('products.index')->with('success', 'Product create successfully');
          return back()->with('successdelete','You have successfully deleted an article.');
    }
     public function email() 
 { 
     return view('email'); 
 } 
 
 public function sendEmail(Request $request) 
 { 
     $data = [ 
         'recipient_email' => $request->input('recipient_email'), 
         'subject' => $request->input('subject'), 
         'message' => $request->input('message'), 
     ]; 
 
     // Envoyer l'e-mail en utilisant la classe Mailable 
     Mail::to($data['recipient_email'])->send(new TestMail($data)); 
 
     return back()->with('success','Email sent successfully!'); 
 }

}
