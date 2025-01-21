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

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="name">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="image">Image:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="image" id="image" type="file" class="form-control" accept="image/*" value="{{ old('image') }}" required>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="price">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" id="price" type="number" class="form-control" value="{{ old('price') }}">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label" for="stock">Stock:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="stock" id="stock" type="number" class="form-control" value="{{ old('stock') }}">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
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
          <th scope="col">Imagen</th>
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
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 300px;">
          </td>
          <td>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-link p-0" style="pointer-events: auto; opacity: 1;">Editar</a>
          </td>
          <td>
            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" style="display: inline;"
              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link p-0" style="pointer-events: auto; opacity: 1;">
                Eliminar
              </button>
            </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
