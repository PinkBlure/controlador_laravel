<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function showRegistrationForm()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    try {
      $request->validate([ 
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password, // Laravel aplicará el hash automáticamente
      ]);

      Auth::login($user);

      return redirect()->route('home');
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }
}
