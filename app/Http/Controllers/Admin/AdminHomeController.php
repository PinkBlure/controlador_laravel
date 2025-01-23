<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  // Asegúrate de importar la fachada Auth

class AdminHomeController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      if (Auth::user()->role !== 'admin') {
        return redirect('/');
      } else {
        return view('admin.home.index');
      }
    }
  }
}
