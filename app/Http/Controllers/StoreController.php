<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;
use PDF;

class StoreController extends Controller
{
    public function index()
    {
        $products =Product::paginate(6);
        $categories =Category::All();
        $category = null;
        
      //  return view('index', compact('products'));
return view('index',['products' => $products , 'categories'=>$categories ,'category'=>$category]);
    }


    public function espaceclient(){



        return view('espaceclient');
    
    }

    //     // }



    public function espaceadmin(){


        $products=Produit::All();
        return view('espaceadmin',compact('products'));
    
    }

    public function getProdByCat(Request $rq) {

     $catName = $rq->route('cat');

     // Assuming you want to display all products if no category is selected
     $category = $catName ? Category::where('name', $catName)->first() : null;

     // Fetch products based on the selected category (or all products if no category is selected)
     $products = $category ? $category->products()->paginate(3) : Product::paginate(3);

     return view('index', [
         'products' => $products,
         'categories' => Category::all(),
         'category' => $category ? $catName : null,
     ]);
     }


   
}

