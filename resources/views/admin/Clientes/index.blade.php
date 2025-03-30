@extends('layouts.app')

@section('title', 'Clientes')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Lista de Clientes</h1>
    </div>
@stop

@section('content')
    {{-- Mensajes de éxito o error --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tabla de clientes --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
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
                        <td>
                            <span class="badge badge-{{ $cliente->role == 'admin' ? 'primary' : 'secondary' }}">
                                {{ ucfirst($cliente->role) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay clientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $clientes->links() }}
    </div>
@stop

@section('css')
    {{-- Agregar estilos personalizados si es necesario --}}
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Vista de clientes cargada.");
    </script>
@stop
