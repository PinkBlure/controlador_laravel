<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
  public function index()
  {
    $products = Product::all();

    return view('admin.product.index', [
      'title' => 'Listado de Productos',
      'products' => $products
    ]);
  }
}
