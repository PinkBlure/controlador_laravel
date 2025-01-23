@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Configuración de la tienda</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="header_color">Color del encabezado</label>
                <input type="color" id="header_color" name="header_color" value="{{ old('header_color', $headerColor) }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="font_family">Tipo de letra</label>
                <select id="font_family" name="font_family" class="form-control">
                    <option value="Arial" {{ old('font_family', $fontFamily) == 'Arial' ? 'selected' : '' }}>Arial</option>
                    <option value="Courier New" {{ old('font_family', $fontFamily) == 'Courier New' ? 'selected' : '' }}>Courier New</option>
                    <option value="Times New Roman" {{ old('font_family', $fontFamily) == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
