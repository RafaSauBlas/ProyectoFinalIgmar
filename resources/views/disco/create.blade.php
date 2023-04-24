@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Disco
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Ingresar nuevo') }} disco</span>
                    </div>
                    <div class="card-body">

                    <form method="POST" action="{{ route('store') }}"  role="form" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
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
                          <div class="col-md-8"></div>
                            <div class="form-group col-md-3">
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                          <div class="col-md-2"></div>
                        </div>

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- <form method="POST" action="{{ route('store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="box box-info padding-1">
                                <div class="box-body"> 
                                        <label for="nombre">
                                            Nombre
                                        </label>
                                        <input type="text" value="{{$disco->nombre}}" name="nombre" id="nombre" required>
                                        <label for="categoria">
                                            Categoria
                                        </label>
                                        <input type="text" value="{{$disco->categoria}}" name="categoria" id="categoria" required>
                                        <label for="cantante">
                                            Cantante
                                        </label>
                                        <input type="text" value="{{$disco->cantante}}" name="cantante" id="cantante" required>
                                        <label for="precio">
                                            Precio
                                        </label>
                                        <input type="text" value="{{$disco->precio}}" name="precio" id="precio" required>
                                        <label for="archivo">
                                            Archivo
                                        </label>
                                        <input type="file" value="{{$disco->archivo}}" name="image" id="image" required>
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </form> -->
@endsection
