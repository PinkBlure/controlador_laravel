<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    // Validar las credenciales
    $credentials = $request->only('email', 'password');

    // Intentar autenticar al usuario
    if (Auth::attempt($credentials)) {
      // Verificar si el usuario tiene el rol 'admin'
      if (Auth::user()->role === 'admin') {
        // Si es admin, redirigir a /admin
        return redirect()->intended('/admin');
      }

      // Si no es admin, redirigir a la página principal o lo que sea adecuado
      return redirect()->intended('/');
    }

    // Si las credenciales son incorrectas, puedes hacer algo, como redirigir con error
    return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
  }

  public function logout(Request $request)
  {
    session()->forget('header_color');
    Auth::logout();
    return redirect()->route('login');
  }
}
