@extends('layouts.app')

@section('title', 'Registro')

@section('subtitle', 'Crear una nueva cuenta')

@section('content')
  <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card" style="max-width: 400px; width: 100%;">
      <div class="card-header bg-primary text-white text-center">
        <h4>Registro</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('register') }}" method="POST">
          @csrf
          
          <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
      </div>
      <div class="card-footer text-center">
        <p class="mb-0">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
      </div>
    </div>
  </div>
@endsection
