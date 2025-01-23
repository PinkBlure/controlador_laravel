<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function show()
  {
    // Obtener los valores actuales del color y la fuente desde la sesión
    $headerColor = session('header_color', '#000000'); // Color por defecto negro
    $fontFamily = session('font_family', 'Arial'); // Tipo de letra por defecto

    return view('settings', compact('headerColor', 'fontFamily'));
  }

  public function update(Request $request)
  {
    // Validar la entrada del usuario
    $request->validate([
      'header_color' => 'required|string',
      'font_family' => 'required|string',
    ]);

    // Guardar los valores en la sesión
    session(['header_color' => $request->header_color]);
    session(['font_family' => $request->font_family]);

    return redirect()->route('settings.show')->with('success', 'Configuración actualizada');
  }
}
