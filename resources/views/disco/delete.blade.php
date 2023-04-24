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
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><img width=250 height=250 src="{{$disco->archivo}}"></div>
                        <div class="col-md-5"></div>
                      </div>
                      <br>
                      <br>

                      <form method="POST" action="{{ route('eliminarDisco',$disco->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" value="{{$disco->nombre}}" name="nombre" id="nombre" class="form-control" disabled>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="categoria">Genero</label>
                            <input value="{{$disco->categoria}}" name="categoria" id="categoria" class="form-control" disabled>
                          </div>
                          <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-3"></div>
                            <div class="form-group col-md-3">
                              <label for="cantante">Cantante</label>
                              <input type="text"  value="{{$disco->cantante}}" name="cantante" id="cantante" class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="precio">Precio</label>
                              <input type="number" class="form-control" value="{{$disco->precio}}" name="precio" id="precio" disabled>
                            </div>
                          <div class="col-md-4"></div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-md-3"></div>
                          @if (Auth::user()->area < 3)
                                <div class="form-group col-md -4">
                                  <label for="codigoS">Codigo de seguridad</label>
                                  <input type="number" value="" name="codigoS" id="codigoS" class="form-control" required>
                                  <a href="/solicitud?accion=ELIMINAR"> Solicitar codigo de utilidad... </a>
                                </div>
                          @endif
                            <div class="form-group col-md-2">
                            <br>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                          <div class="col-md-4"></div>
                        </div>

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
