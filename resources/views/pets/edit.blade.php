@extends('layouts.app')
@section('content')
<h1>Editar Mascota</h1>
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
    <h5 class="mb-3">Formulario de edición</h5>
    <form action="/pets/{{$pet->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="form-label fw-bold">Nombre</label>
        <input type="text" name="name" value="{{$pet->name}}" class="form-control mb-3" placeholder="Nombre de la mascota">
        <label class="form-label fw-bold">Especie</label>
        <input type="text" name="species" value="{{$pet->species}}" class="form-control mb-3" placeholder="Ej: Perro, Gato, Ave, etc.">
        <label class="form-label fw-bold">Raza</label>
        <input type="text" name="breed" value="{{$pet->breed}}" class="form-control mb-3" placeholder="Raza de la mascota">
        <label class="form-label fw-bold">Edad</label>
        <input type="number" name="age" value="{{$pet->age}}" class="form-control mb-3" placeholder="Edad en años">
        <label class="form-label fw-bold">Foto de la Mascota</label>
        <input type="file" name="image" class="form-control mb-3" accept="image/*">
        <div class="d-flex gap-2 mt-2">
            <button class="btn btn-primary">Actualizar Mascota</button>
            <a href="/pets" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection