@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Disco
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Disco</span>
                    </div>
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><img width=250 height=250 src="{{$disco->archivo}}"></div>
                        <div class="col-md-5"></div>
                      </div>
                      <br>
                      <br>
                      <form  method="POST" action="{{ route('discos.update', $disco->id) }}"  enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" value="{{$disco->nombre}}" name="nombre" id="nombre" class="form-control" required>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="categoria">Genero</label>
                            <input value="{{$disco->categoria}}" name="categoria" id="categoria" class="form-control" required>
                          </div>
                          <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-3"></div>
                            <div class="form-group col-md-3">
                              <label for="cantante">Cantante</label>
                              <input type="text"  value="{{$disco->cantante}}" name="cantante" id="cantante" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="precio">Precio</label>
                              <input type="number" class="form-control" value="{{$disco->precio}}" name="precio" id="precio" step="any" required>
                            </div>
                          <div class="col-md-4"></div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="form-group col-md -4">
                            <label for="image">Portada</label>
                            <input type="file" value="{{$disco->archivo}}" name="image" id="image" class="form-control" accept="image/*" required>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-md-3"></div>
                             @if (Auth::user()->area == 1)
                                <div class="form-group col-md -4">
                                  <label for="codigoS">Codigo de seguridad</label>
                                  <input type="number" value="" name="codigoS" id="codigoS" class="form-control" required>
                                  <a href="/solicitud?accion=EDITAR"> Solicitar codigo de utilidad... </a>
                                </div>
                          @endif
                            <div class="form-group col-md-2">
                            <br>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                          <div class="col-md-4"></div>
                        </div>

                      </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <form method="POST" action="{{ route('discos.update', $disco->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box box-info padding-1">
                                <div class="box-body"> 
                                        <label for="nombre">
                                            Nombre
                                        </label>
                                        <input type="text" value="{{$disco->nombre}}" name="nombre" id="nombre">
                                        <label for="categoria">
                                            Categoria
                                        </label>
                                        <input type="text" value="{{$disco->categoria}}" name="categoria" id="categoria">
                                        <label for="cantante">
                                            Cantante
                                        </label>
                                        <input type="text" value="{{$disco->cantante}}" name="cantante" id="cantante">
                                        <label for="precio">
                                            Precio
                                        </label>
                                        <input type="text" value="{{$disco->precio}}" name="precio" id="precio">
                                        <label for="archivo">
                                            Archivo
                                        </label>
                                        <input type="file" value="{{$disco->archivo}}" name="image" id="image">


                                        @if (Auth::user()->area == 1)
                                           <label for="archivo">
                                              Codigo De seguridad
                                           </label>
                                           <input type="hidden" value="ELIMINAR" name="accion" codigo="accion">
                                           <input type="number" value="" name="codigoS" id="codigoS" required>
                                           <a href="/solicitud?accion=EDITAR"> Solicitar codigo de utilidad... </a>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form> -->

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

@if (session('msg') == 'NOVALIDO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'El codigo que ingresó no es valido, por favor valide el dato e intentelo nuevamente.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@endsection
