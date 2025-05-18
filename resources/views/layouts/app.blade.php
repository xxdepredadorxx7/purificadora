{{-- filepath: c:\laragon\www\purificadora\resources\views\layouts\app.blade.php --}}
@extends('adminlte::page')

{{-- Meta viewport para responsividad --}}
@section('meta_tags')
    <meta name="viewport" content="width=device-width, initial-scale=1">
@show

{{-- Título del navegador --}}
@section('title')
    {{ config('adminlte.title', 'Dashboard') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Encabezado del contenido --}}
@section('content_header')
    @hasSection('content_header_title')
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <h1 class="text-muted mb-2 mb-md-0" style="font-size: 1.5rem;">
                @yield('content_header_title')

                @hasSection('content_header_subtitle')
                    <small class="text-dark d-block d-md-inline">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                        @yield('content_header_subtitle')
                    </small>
                @endif
            </h1>

            {{-- Botón de acción opcional --}}
            @hasSection('action_button')
                <div class="mb-2 mb-md-0">
                    @yield('action_button')
                </div>
            @endif
        </div>
    @endif
@stop

{{-- Contenido principal --}}
@section('content')
    <div class="container-fluid px-2 px-md-4">
        @yield('content_body')
    </div>
@stop

{{-- Pie de página común --}}
@section('footer')
    <footer class="text-center py-3 mt-4">
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
    /* Encabezado responsivo */
    .content-header h1 {
        font-size: 1.3rem;
        font-weight: 600;
        word-break: break-word;
    }

    @media (max-width: 576px) {
        .content-header h1 {
            font-size: 1.1rem;
        }
        .container-fluid {
            padding: 10px !important;
        }
        footer {
            font-size: 0.95rem;
        }
    }

    /* Personalización del pie de página */
    footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }
</style>
@endpush
