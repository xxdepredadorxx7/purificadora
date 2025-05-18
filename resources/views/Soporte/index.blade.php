@extends('layouts.app')

@section('title', 'Soporte')

@section('content_header')
    <h1>Soporte</h1>
@stop

@section('content')
<div class="container contenido-ajustado">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <p class="mb-4 text-center">
                        Si necesitas ayuda, por favor contáctanos a través de los siguientes medios:
                    </p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-envelope mr-2 text-primary"></i>
                            <span class="ml-2">soporte@purificadora.com</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-phone mr-2 text-success"></i>
                            <span class="ml-2">+52 123 456 7890</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="mailto:soporte@purificadora.com" class="btn btn-primary btn-block mb-2">
                            <i class="fas fa-paper-plane"></i> Enviar correo
                        </a>
                        <a href="tel:+521234567890" class="btn btn-success btn-block">
                            <i class="fas fa-phone-alt"></i> Llamar ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    @media (max-width: 576px) {
        .card {
            margin-top: 1rem;
        }
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .card-body {
            padding: 1.2rem;
        }
        .list-group-item {
            font-size: 1.05rem;
        }
        .btn {
            font-size: 1.1rem;
        }
    }
</style>
@endsection
