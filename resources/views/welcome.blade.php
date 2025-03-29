@extends('adminlte::page')

@section('title', 'Purificadora')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Purificadora.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')@extends('adminlte::page')

@section('title', 'Purificadora de Agua Pura')

@section('content_header')
    <div class="hero">
        <h1 class="display-4">Agua Purificada de la Mejor Calidad</h1>
        <p class="lead">Garantizamos tu salud con nuestro proceso de purificación certificado</p>
        <a {{-- href="{{ route('productos') }}" --}} class="btn btn-primary btn-lg">Ver Productos</a>
    </div>
@stop

@section('content')
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-tint fa-3x text-primary mb-3"></i>
                    <h3>Proceso de Purificación</h3>
                    <p>Sistema de 6 etapas con ósmosis inversa y luz ultravioleta</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-certificate fa-3x text-success mb-3"></i>
                    <h3>Calidad Certificada</h3>
                    <p>Cumplimos con los estándares de calidad NOM-201-SSA1-2015</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-truck fa-3x text-info mb-3"></i>
                    <h3>Entrega a Domicilio</h3>
                    <p>Servicio de entrega gratuito en zona metropolitana</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2>Nuestros Servicios</h2>
            <ul class="list-group">
                <li class="list-group-item">Venta de garrafones</li>
                <li class="list-group-item">Mantenimiento de equipos</li>
                <li class="list-group-item">Venta de dispensadores</li>
                <li class="list-group-item">Suscripciones mensuales</li>
            </ul>
        </div>

        <div class="col-md-6">
            <h2>Horario de Atención</h2>
            <div class="card">
                <div class="card-body">
                    <p>Lunes a Viernes: 8:00 AM - 7:00 PM</p>
                    <p>Sábados: 8:00 AM - 2:00 PM</p>
                    <p>Domingos: Cerrado</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h2>Contáctanos</h2>
            <p><i class="fas fa-phone"></i> Tel: 555-123-4567</p>
            <p><i class="fas fa-map-marker-alt"></i> Av. Purificación #123, Col. Agua Pura</p>
        </div>
    </div>
@stop

@section('css')
    <style>
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                       url('https://images.unsplash.com/photo-1580743875016-966276fe8569') center/cover;
            color: white;
            padding: 100px 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .list-group-item {
            border: none;
            padding: 15px;
        }
    </style>
@stop

@section('js')
    <script>
        // Puedes agregar interactividad aquí si es necesario
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                // Acción al hacer clic en las tarjetas
            });
        });
    </script>
@stop

    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
