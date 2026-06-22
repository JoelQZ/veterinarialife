@extends('layouts.app')
@section('content')
<h1>Nueva Mascota</h1>
<a href="/pets" class="btn btn-secondary mb-3">
    ← Volver al listado
</a>
@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card p-4">
    <h5 class="mb-3">Formulario de registro</h5>
    <form action="/pets" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-label fw-bold">Nombre</label>
        <input type="text" name="name" placeholder="Nombre de la mascota" class="form-control mb-3" value="{{ old('name') }}">
        <label class="form-label fw-bold">Especie</label>
        <input type="text" name="species" placeholder="Ej: Perro, Gato, Ave, etc." class="form-control mb-3" value="{{ old('species') }}">
        <label class="form-label fw-bold">Raza</label>
        <input type="text" name="breed" placeholder="Raza de la mascota" class="form-control mb-3" value="{{ old('breed') }}">
        <label class="form-label fw-bold">Edad</label>
        <input type="number" name="age" placeholder="Edad en años" class="form-control mb-3" value="{{ old('age') }}">
        <label class="form-label fw-bold">Foto de la Mascota</label>
        <input type="file" name="image" class="form-control mb-3" accept="image/*">
        <div class="d-flex gap-2 mt-2">
            <button class="btn btn-success">Guardar Mascota</button>
            <a href="/pets" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection