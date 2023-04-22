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
                            <button type="submit" class="btn btn-primary">Eliminar Disco</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
