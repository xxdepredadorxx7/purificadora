@extends('layouts.app')

@section('title', 'Administrador')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Bienvenido a la vista Administrador</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

