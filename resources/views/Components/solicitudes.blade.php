
@extends('layouts.app')

@section('template_title')
    Disco
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><center><h1>Listado de solicitudes</h1></center></div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
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
										<th>SOLICITANTE</th>
										<th>ACCIÓN</th>
										<th>FECHA SOLICITA</th>
										<th>OPCIONES</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudes as $row)
                                        <tr>
                                            <td hidden>{{$row->id}} </td>
											<td>{{ $row->name }}</td>
											<td>{{ $row->accion }}</td>
											<td>{{ $row->fechasolicita }}</td>

                                            <td>
                                              <a class="btn btn-sm btn-success" href="/prueba?id={{$row->id}}&respuesta=acepta&utilidad={{$row->accion}}">
                                                ACEPTAR
                                              </a>
                                              <a class="btn btn-danger btn-sm" href="/prueba?id={{$row->id}}&respuesta=rechaza&utilidad={{$row->accion}}">
                                                RECHAZAR
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'OK')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se ha respondido a la solicitud correctamtente',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('msg') == 'NO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Al parecer no pudimos enviar el correo, por favor intentelo mas tarde.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@endsection