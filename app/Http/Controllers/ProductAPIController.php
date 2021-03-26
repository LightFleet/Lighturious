<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{

    public function index()
    {
        return Product::all();
    }
    public function show(Product $product)
    {
        return $product;

    }
    public function related()
    {

    }
}
