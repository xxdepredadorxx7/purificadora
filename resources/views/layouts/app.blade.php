@extends('adminlte::page')

{{-- Título del navegador --}}
@section('title')
    {{ config('adminlte.title', 'Dashboard') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Encabezado del contenido --}}
@section('content_header')
    @hasSection('content_header_title')
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-muted">
                @yield('content_header_title')

                @hasSection('content_header_subtitle')
                    <small class="text-dark">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                        @yield('content_header_subtitle')
                    </small>
                @endif
            </h1>

            {{-- Botón de acción opcional --}}
            @hasSection('action_button')
                <div>
                    @yield('action_button')
                </div>
            @endif
        </div>
    @endif
@stop

{{-- Contenido principal --}}
@section('content')
    <div class="container-fluid">
        @yield('content_body')
    </div>
@stop

{{-- Pie de página común --}}
@section('footer')
    <footer class="text-center py-3">
        <div>
            <strong>
                <a href="{{ config('app.company_url', '#') }}">
                    {{ config('app.company_name', 'Mi Empresa') }}
                </a>
            </strong>
            &copy; {{ date('Y') }}. Todos los derechos reservados.
        </div>
        <div class="text-muted">
            Versión: {{ config('app.version', '1.0.0') }}
        </div>
    </footer>
@stop

{{-- Scripts comunes --}}
@push('js')
<script>
    $(document).ready(function() {
        console.log("Plantilla cargada correctamente.");
    });
</script>
@endpush

{{-- Estilos personalizados --}}
@push('css')
<style>
    /* Personalización del encabezado */
    .content-header h1 {
        font-size: 1.8rem;
        font-weight: 600;
    }

    /* Personalización del pie de página */
    footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }

    /* Ajustes generales */
    .container-fluid {
        padding: 20px;
    }
</style>
@endpush
