<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PDFController extends Controller
{
    public function generateDiscountedPricesPDF()
    {
        $products = []; // Replace this with your actual data
        $products = Product::all();
        // Modify prices to apply a 20% discount
        foreach ($products as &$product) {
            $product['discounted_price'] = $product['price'] * 0.8;
        }

        $pdf = PDF::loadView('catalogue', ['products' => $products]);

        return $pdf->stream('discounted-prices.pdf');
    }
}
