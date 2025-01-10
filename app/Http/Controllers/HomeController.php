<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function about()
  {
    $data = [
      'title' => 'Acerca de nosotros',
      'subtitle' => 'Información de la empresa',
      'description' => 'Somos una empresa dedicada a brindar soluciones innovadoras.',
      'author' => 'Aileen'
    ];
    

    return view('home.about', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'Página principal'
    ];

    return view('home.index', $data);
  }
}
