@extends('layouts.admin')

@section('content')
<h1>{{ $title }}</h1>
<div class="card mb-4">
  <div class="card-header">
    Crear productos
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="****** RUTA *****">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="name">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="price">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" type="number" class="form-control" value="{{ old('price') }}">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="description">Descripción</label>
        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Panel de control de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>
            <a href="#" class="disabled" style="pointer-events: none; opacity: 0.5;">Editar</a>
          </td>
          <td>
            <a href="#" class="disabled" style="pointer-events: none; opacity: 0.5;">Eliminar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
