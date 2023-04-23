@extends('layouts.app')

@section('template_title')
    {{ $disco->name ?? "{{ __('Show') Disco" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Disco</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $disco->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $disco->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Cantante:</strong>
                            {{ $disco->cantante }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $disco->precio }}
                        </div>
                        <form method="POST" action="{{ route('eliminarDisco',$disco->id) }}">
                            @csrf
                            @method('DELETE')

                            @if (Auth::user()->area < 3)
                                <label for="archivo">
                                   Codigo De seguridad
                                </label>
                                <input type="hidden" value="ELIMINAR" name="accion" codigo="accion">
                                <input type="number" value="" name="codigoS" id="codigoS" required>
                                <a href="/solicitud?accion=ELIMINAR"> Solicitar codigo de utilidad... </a>
                            @endif
                            <button type="submit" class="btn btn-primary">Eliminar Disco</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'OK')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Solicitud enviada, espera la respuesta de su administrador.',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('msg') == 'OTROUSU')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Parece que estas intentado usar un codigo que no te pertenece, si necesitas un codigo solicita uno a tu administrador.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@if (session('msg') == 'CADUCADO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Este codigo ya expiró, solicita otro codigo e intenta nuevamente.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif
@endsection
