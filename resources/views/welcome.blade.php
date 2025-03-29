@extends('adminlte::page')

@section('title', 'Bienvenida')

@section('content_header')
    <h1>Bienvenida</h1>
@stop

@section('content')
    <p>Bienvenido a la vista publica</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
