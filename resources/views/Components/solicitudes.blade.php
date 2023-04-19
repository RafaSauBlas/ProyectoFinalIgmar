
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
                                              <a class="btn btn-sm btn-success" href="/prueba?id={{$row->id}}&respuesta=acepta&utilidad{{$row->accion}}">
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

@endsection

<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/_collaborators.scss', 'resources/js/app.js'])
    @vite(['resources/scss/_menu.scss'])
    <link href="https://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">
    <title>Colaboradores</title>

</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>

    <div class="grid_Two">
        <div class="space">

        </div>
        <div class="tab">
            <div class="table-container">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th hidden></th>
                            <th class="name" scope="col">Usuario</th>
                            <th class="accion" scope="col">Acción</th>
                            <th class="fecha" scope="col">Fecha de la solicitud</th>
                            <th class="edt-eli" scope="col"></th>
                            <th class="edt-eli" scope="col"></th>
                            
                        </tr>
                    </thead>
                    <div class="TBody">
                        <tbody>

                            @if (count($solicitudes) <= 0)
                                <tr>
                                    <th>No hay resultados</th>
                                </tr>
                            @endif

                            @foreach ($solicitudes as $row)
                                <tr>
                                    <th hidden></th>
                                    <th hidden class="id">{{$row->id}}</th>
                                    <td class="name">{{ $row->name }}</td>
                                    <td class="accion">{{ $row->accion }}</td>
                                    <td class="fecha">{{ $row->fechasolicita }}</td>
                                    <td class="btns">

                                        
                                        <a class="btn btn-primary" href="/prueba?id={{$row->id}}&respuesta=acepta&utilidad{{$row->accion}}">
                                          <button type="button" id="btnE" class="btnE" data-toggle="modal">
                                            <img src="/Image/IconEditar.png" class="btnE">
                                          </button>
                                        </a>

                                        <a class="btn btn-primary" href="/prueba?id={{$row->id}}&respuesta=rechaza&utilidad={{$row->accion}}">
                                          <button type="button" id="btnE" class="btnE" data-toggle="modal">
                                            <img src="/Image/IconEliminar.png" class="btnE">
                                          </button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>

            </div>
            <div class="Search">
                <form  method="GET">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar...">
                </form>
            </div>

        </div>
    </div>
</div>


</body>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'BADREQUEST')
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Datos no validos',
    })
</script>
@endif

@if (session('msg') == 'OK')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Registrado correctamente',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if (session('msg') == 'UPDATE')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Actualizado correctamente',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if (session('msg') == 'DELETE')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Eliminado correctamente',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

</html> -->