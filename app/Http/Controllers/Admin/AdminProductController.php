<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = 0;

    if ($request->hasFile('image')) {
      $product->save();
      $image = $request->file('image');
      $imageName = $product->id . '.' . $image->getClientOriginalExtension();
      $image->storeAs($imageName);
      $product->image = $imageName;
      $product->save();
    } else {
      $product->save();
    }


    return redirect()->route('admin.product.index')->with('success', 'Producto creado exitosamente.');
  }

  public function delete($id)
  {
    $product = Product::findOrFail($id);

    if ($product->image) {
      Storage::delete($product->image);
    }

    $product->delete();
    return redirect()->route('admin.product.index')->with('success', 'Producto eliminado con éxito.');
  }
}
