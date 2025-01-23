<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function show()
  {
    $headerColor = session('header_color', '#1abc9c');
    $fontFamily = session('font_family', 'Arial');

    return view('settings', compact('headerColor', 'fontFamily'));
  }

  public function update(Request $request)
  {
    $request->validate([
      'header_color' => 'required|string',
      'font_family' => 'required|string',
    ]);

    session(['header_color' => $request->header_color]);
    session(['font_family' => $request->font_family]);

    return redirect()->route('settings.show')->with('success', 'Configuración actualizada');
  }
}
