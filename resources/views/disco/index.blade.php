@extends('layouts.app')

@section('template_title')
    Disco
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Discos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('discos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Categoria</th>
										<th>Cantante</th>
										<th>Precio</th>
										<th>Archivos</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($discos as $disco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $disco->nombre }}</td>
											<td>{{ $disco->categoria }}</td>
											<td>{{ $disco->cantante }}</td>
											<td>{{ $disco->precio }}</td>
                                            <td>{{ $disco->archivo }}</td>
                                            <td>
                                                <form action="{{ route('discos.destroy',$disco->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('discos.edit',$disco->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $discos->links() !!}
            </div>
        </div>
    </div>

@endsection
