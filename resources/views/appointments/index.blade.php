@extends('layouts.app')
@section('content')
<h1>Citas</h1>
<a href="/appointments/create" class="btn btn-primary mb-3">Nueva Cita</a>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Dueño</th>
                <th>Fecha</th>
                <th>Motivo</th>
                @if(Auth::user()->role == 'admin')
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $c)
            <tr>
                <td>{{$c->pet}}</td>
                <td>{{$c->owner}}</td>
                <td>{{ date('Y-m-d', strtotime($c->date)) }}</td>
                <td>{{$c->reason}}</td>
                
                @if(Auth::user()->role == 'admin')
                <td>
                    <a href="/appointments/{{$c->id}}/edit" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/appointments/{{$c->id}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection