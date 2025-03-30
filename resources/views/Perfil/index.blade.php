@extends('layouts.app')

@section('title', 'Perfil')

@section('content_header')
    <h1>Hola, {{ Auth::user()->name }}</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de Usuario</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Nombre:</strong> {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Dirección:</strong> {{ $user->direccion ?? 'No especificada' }}
                    </div>
                    <div class="mb-3">
                        <strong>Teléfono:</strong> {{ $user->telefono ?? 'No especificado' }}
                    </div>
                    <div class="mb-3">
                        <strong>Fecha de Registro:</strong> {{ $user->created_at->format('d/m/Y') }}
                    </div>
                    <a href="{{ route('perfil.edit') }}" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
