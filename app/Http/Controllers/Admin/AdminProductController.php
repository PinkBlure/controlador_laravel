<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
      'description' => 'required',
      'price' => 'required|numeric|gt:0',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->image = 'image.jpg';
    $product->stock = 0;
    $product->save();

    return redirect()->route('admin.product.index')->with('success', 'Producto creado exitosamente.');
  }
}
