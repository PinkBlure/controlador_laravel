@extends('layouts.app')

@section('title', 'Login')

@section('subtitle', 'Iniciar sesión')

@section('content')
  <div class="container d-flex justify-content-center align-items-center" style="height: 60vh;">
    <div class="card" style="max-width: 400px; width: 100%;">
      <div class="card-header bg-primary text-white text-center">
        <h4>Iniciar sesión</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          
          <!-- Mensaje de error (si existe) -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
        </form>
      </div>
      <div class="card-footer text-center">
        <p class="mb-0">¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
      </div>
    </div>
  </div>
@endsection
