@extends('layouts.app')

@section('content')

<h1>Editar Cita</h1>

<a href="/appointments" class="btn btn-secondary mb-3">
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

    <form action="/appointments/{{$appointment->id}}" method="POST">

        @csrf
        @method('PUT')

        <label class="form-label fw-bold">Mascota</label>
        <select name="pet" class="form-select mb-3" required>
            <option value="">-- Selecciona una mascota --</option>
            @foreach($pets as $pet)
                <option value="{{ $pet->name }}" {{ old('pet', $appointment->pet) == $pet->name ? 'selected' : '' }}>
                    {{ $pet->name }}
                </option>
            @endforeach
        </select>

        <label class="form-label fw-bold">Dueño</label>
        <select name="owner" class="form-select mb-3" required>
            <option value="">-- Selecciona un dueño --</option>
            @foreach($owners as $owner)
                <option value="{{ $owner->name }}" {{ old('owner', $appointment->owner) == $owner->name ? 'selected' : '' }}>
                    {{ $owner->name }}
                </option>
            @endforeach
        </select>

        <label class="form-label fw-bold">Fecha de la Cita</label>
        @php
            $currentDay   = $appointment->date ? date('d', strtotime($appointment->date)) : '';
            $currentMonth = $appointment->date ? date('m', strtotime($appointment->date)) : '';
            $currentYear  = $appointment->date ? date('Y', strtotime($appointment->date)) : '';
        @endphp
        <div class="row g-2 mb-3">
            <div class="col-4">
                <select name="appointment_day" class="form-select" required>
                    <option value="">Día</option>
                    @for ($i = 1; $i <= 31; $i++)
                        @php $val = sprintf('%02d', $i); @endphp
                        <option value="{{ $val }}" {{ old('appointment_day', $currentDay) == $val ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-4">
                <select name="appointment_month" class="form-select" required>
                    <option value="">Mes</option>
                    @foreach(['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'] as $num => $name)
                        <option value="{{ $num }}" {{ old('appointment_month', $currentMonth) == $num ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <input type="number" name="appointment_year" value="{{ old('appointment_year', $currentYear) }}" class="form-control" placeholder="Año (Ej: 2015)" min="1900" max="2100" required>
            </div>
        </div>

        <label class="form-label fw-bold">Motivo</label>
        <input type="text" name="reason" value="{{ old('reason', $appointment->reason) }}" class="form-control mb-3" placeholder="Motivo de la cita">

        <div class="d-flex gap-2 mt-2">
            <button class="btn btn-primary">Actualizar</button>
            <a href="/appointments" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>

@endsection