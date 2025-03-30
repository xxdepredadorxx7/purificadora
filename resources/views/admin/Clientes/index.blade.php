@extends('layouts.app')

@section('title', 'Clientes')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->role }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    <script> console.log("Vista de clientes cargada."); </script>
@stop
