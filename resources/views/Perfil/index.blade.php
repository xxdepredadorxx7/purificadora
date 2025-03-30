@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de Usuario</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nombre:</strong> {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
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
