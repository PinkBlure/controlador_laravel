<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public static $products = [
    [
      'id' => 1,
      'name' => 'Producto 1',
      'description' => 'Descripción 1',
      'image' => '/img/product1.jpg',
      'price' => 100.00
    ],
    [
      'id' => 2,
      'name' => 'Producto 2',
      'description' => 'Descripción 2',
      'image' => '/img/product2.jpg',
      'price' => 200.00
    ],
    [
      'id' => 3,
      'name' => 'Producto 3',
      'description' => 'Descripción 3',
      'image' => '/img/product3.jpg',
      'price' => 300.00
    ],
    [
      'id' => 4,
      'name' => 'Producto 4',
      'description' => 'Descripción 4',
      'image' => '/img/product4.jpg',
      'price' => 400.00
    ],
  ];

  public function index()
  {
    $data = [
      'title' => 'Listado de productos',
      'subtitle' => 'Productos de la tienda',
      'products' => self::$products
    ];

    return view('product.index', $data);
  }
}
