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
                        <form method="POST" action="{{ route('discos.update', $disco->id) }}"  enctype="multipart/form-data">
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
                                        <input type="file" value="{{$disco->archivo}}" name="archivo" id="archivo">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
