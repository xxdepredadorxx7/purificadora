@extends('layouts.app')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<div class="container contenido-ajustado">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm rounded">
                <div class="card-header text-center text-md-left">Editar Perfil</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $user->direccion) }}">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña (opcional)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success mb-2 mb-md-0 me-md-2 w-100 w-md-auto">Guardar Cambios</button>
                            <a href="{{ route('perfil.index') }}" class="btn btn-secondary w-100 w-md-auto">Cancelar</a>
                        </div>
                    </form>
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
        .form-label {
            font-size: 1rem;
        }
        .form-control {
            font-size: 1rem;
        }
        .btn {
            font-size: 1.1rem;
        }
        .d-grid {
            gap: 0.5rem;
        }
    }
</style>
@endsection
