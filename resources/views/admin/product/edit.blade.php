@extends('layouts.admin')

@section('content')
<h1>Editar Producto</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Nombre del Producto:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
  </div>

  <div class="form-group">
    <label for="price">Precio:</label>
    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
  </div>

  <div class="form-group">
    <label for="description">Descripción:</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
  </div>

  <div class="form-group">
    <label for="image">Imagen del Producto:</label>
    <input type="file" name="image" id="image" class="form-control">
    @if($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>

@endsection
