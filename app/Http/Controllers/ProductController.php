<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    $title = 'Listado de Productos';
    $subtitle = 'Productos de mi tienda';
    return view('product.index', compact('products', 'title', 'subtitle'));
  }


  public function show($id)
  {
    $product = Product::findOrFail($id);
    return view('product.show', compact('product'));
  }
}
