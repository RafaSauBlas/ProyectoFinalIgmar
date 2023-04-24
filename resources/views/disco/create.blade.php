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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
