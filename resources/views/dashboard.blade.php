@extends('layouts.app')
@section('content')
@if(Auth::user()->role == 'admin')
<h1 class="mb-4">Panel de Control</h1>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">🐾</span>
            </div>
            <h2 class="h3 mb-3">Mascotas</h2>
            <p class="text-muted mb-3">Gestión completa de mascotas registradas en la clínica.</p>
            <a href="/pets" class="btn btn-primary mt-2">
                Administrar Mascotas →
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">👤</span>
            </div>
            <h2 class="h3 mb-3">Dueños</h2>
            <p class="text-muted mb-3">Administración de dueños y sus datos de contacto.</p>
            <a href="/owners" class="btn btn-success mt-2">
                Administrar Dueños →
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">📅</span>
            </div>
            <h2 class="h3 mb-3">Citas</h2>
            <p class="text-muted mb-3">Control y seguimiento de citas veterinarias.</p>
            <a href="/appointments" class="btn btn-warning mt-2">
                Administrar Citas →
            </a>
        </div>
    </div>
</div>
@else
<h1 class="mb-4">Panel de Control</h1>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">🐾</span>
            </div>
            <h2 class="h3 mb-3">Mascotas</h2>
            <p class="text-muted mb-3">Gestión completa de mascotas registradas en la clínica.</p>
            <a href="/pets" class="btn btn-primary mt-2">
                Registrar Mascota
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">👤</span>
            </div>
            <h2 class="h3 mb-3">Dueños</h2>
            <p class="text-muted mb-3">Administración de dueños y sus datos de contacto.</p>
            <a href="/owners" class="btn btn-success mt-2">
                Registrar Dueño
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-center h-100 shadow-sm">
            <div class="mb-3">
                <span style="font-size: 3rem;">📅</span>
            </div>
            <h2 class="h3 mb-3">Citas</h2>
            <p class="text-muted mb-3">Control y seguimiento de citas veterinarias.</p>
            <a href="/appointments" class="btn btn-warning mt-2">
                Agendar Citas
            </a>
        </div>
    </div>
</div>
@endif
<div class="row mt-5">
    <div class="col-12">
        <div class="card p-4 bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Bienvenido a VeterinariaLife</h4>
                    <p class="text-muted mb-0">Sistema integral de gestión para tu clínica veterinaria</p>
                </div>
                <div class="text-end">
                    <small class="text-muted">
                        <strong>Fecha:</strong> {{ date('d/m/Y') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection