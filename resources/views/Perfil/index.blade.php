@extends('layouts.app')

@section('title', 'Perfil')

@section('content_header')
    <h1>Hola, {{ Auth::user()->name }}</h1>
@stop

@section('content')
<div class="container contenido-ajustado">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm rounded">
                <div class="card-header text-center text-md-left">Perfil de Usuario</div>
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
                    <a href="{{ route('perfil.edit') }}" class="btn btn-primary btn-block mt-3">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .card-header, .card-body {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .btn {
            font-size: 1.1rem;
        }
    }
</style>
@endsection
