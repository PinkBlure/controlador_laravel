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

  public function edit($id)
  {
    $product = Product::findOrFail($id);
    return view('admin.product.edit', compact('product'));
  }

  public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];
    $product->description = $validatedData['description'];

    if ($request->hasFile('image')) {
        try {

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $image = $request->file('image');
            $imageName = $product->id . '.' . $image->getClientOriginalExtension();
            $image->storeAs($imageName);
            $product->image = $imageName;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['image' => 'Error al procesar la imagen: ' . $e->getMessage()]);
        }
    }

    $product->save();

    return redirect()->route('admin.products.edit', $id)->with('success', 'Producto actualizado correctamente.');
}
}
