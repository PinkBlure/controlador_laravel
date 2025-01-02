<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        $title = 'Acerca de nosotros';
        $subtitle = 'Información de la empresa';
        $description = 'Somos una empresa dedicada a brindar soluciones innovadoras.';
        $author = 'Aileen';

        return view('home.about', compact('title', 'subtitle', 'description', 'author'));
    }
}
