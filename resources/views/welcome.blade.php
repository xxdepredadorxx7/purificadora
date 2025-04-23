@extends('layouts.app')

@section('title', 'Inicio')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Bienvenido a {{ config('app.name') }}</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Clientes Satisfechos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>70<sup style="font-size: 20px">%</sup></h3>
                        <p>Pureza Garantizada</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>1</h3>
                        <p>Sucursal Activa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>24/7</h3>
                        <p>Atención al Cliente</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Nuestros Servicios -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-tint mr-1"></i>
                            Nuestros Servicios
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box mb-3 bg-gradient-info">
                                    <span class="info-box-icon"><i class="fas fa-water"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Purificación</span>
                                        <span class="info-box-number">Proceso de 5 etapas</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mb-3 bg-gradient-success">
                                    <span class="info-box-icon"><i class="fas fa-truck"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Entrega a Domicilio</span>
                                        <span class="info-box-number">Servicio Express</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- PRODUCT LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos Destacados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('imagenes/garrafon.png') }}" alt="Garrafón 20L" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Garrafón 20L
                                        <span class="badge badge-warning float-right">$35.00</span></a>
                                    <span class="product-description">
                                        Agua purificada en garrafón de 20 litros
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('imagenes/garrafon.png') }}" alt="Relleno de Garrafón" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Relleno de Garrafón
                                        <span class="badge badge-success float-right">$15.00</span></a>
                                    <span class="product-description">
                                        Servicio de relleno de garrafón con agua purificada
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            console.log('Página de Purificadora de Agua cargada');
        });
    </script>
@stop
