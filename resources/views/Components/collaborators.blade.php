<!DOCTYPE html>
<html lang="en">

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
        <div class="padre">
            <div class="titleCollaborators">
                <p class="AgregarTitulo">Agregar Colaborador</p>
            </div>
            <form class="form" method="POST" action="{{ url('users/signup') }}">
                @csrf
                <div class="Nombre">
                    <p class="Text">Nombre</p>
                    <input Class="Empresa" type="text" name="name" placeholder="Colaborador..." required>
                </div>
                <div class="Apellidos">
                    <p class="Text">Apellidos</p>
                    <input Class="Empresa" type="text" name="lastname" placeholder="Apellidos..." required>
                </div>
                <div class="Correo">
                    <p class="Text">Correo</p>
                    <input Class="Empresa" type="email" name="email" placeholder="Correo..." required>
                </div>
                <div class="Contraseña">
                    <p class="Text">Contraseña</p>
                    <input Class="Empresa" type="password" name="password" placeholder="Contraseña..." required>
                </div>
                <div class="Sucursal">
                    <p class="Text" for="Sucursal">Sucursal</p>
                    <select class="Seleccionar" id="Sucursal" name="branchoffice" required>
                        <option value="Oficinas XENT">Oficinas XENT</option>
                        <option value="Monterrey">Monterrey</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Cancún">Cancún</option>
                    </select>
                </div>
                <p class="Text" for="Area">Área</p>
                <select class="Seleccionar" id="Area" name='area' required>
                    @foreach ($roles as $row)
                        <option value="{{ $row->id }}">{{ $row->area }}</option>
                    @endforeach
                </select>

                <div>
                    <button id="btn" class="Form" type="submit">Guardar</button>
                </div>

            </form>
        </div>

        <div class="space">

        </div>
        <div class="tab">
            <div class="table-container">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" hidden>Id</th>
                            <th class="name" scope="col">Nombre</th>
                            <th class="apellido" scope="col">Apellidos</th>
                            <th class="sucursal" scope="col">Sucursal</th>
                            <th class="area" scope="col">Área</th>
                            <th class="edt-eli" scope="col"></th>
                        </tr>
                    </thead>
                    <div class="TBody">
                        <tbody>

                            @if (count($callaborators) <= 0)
                                <tr>
                                    <th>No hay resultados</th>
                                </tr>
                            @endif

                            @foreach ($callaborators as $row)
                                <tr>
                                    <th hidden></th>
                                    <td class="name">{{ $row->name }}</td>
                                    <td class="apellido">{{ $row->lastname }}</td>
                                    <td class="sucursal">{{ $row->branchoffice }}</td>
                                    <td class="area">{{ $row->area }}</td>
                                    <td class="btns">

                                        <button type="button" id="btnE" class="btnE" data-toggle="modal"
                                            data-target="#myModal1-{{ $row->id }}">
                                            <img src="/Image/IconEditar.png" class="btnE">
                                        </button>
                                        @include('Components.modals.modalCollaborators')

                                        <button type="button" id="btnB"
                                            class="btnB" data-toggle="modal"
                                            data-target="#myModal2-{{ $row->id }}">
                                            <img class="btnB" src="/Image/IconEliminar.png">
                                        </button>
                                    </td>
                                    <td>
                                        <div id="myModal2-{{ $row->id }}" class="modal">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <img src="/Image/IconEliminar.png" alt="">
                                                <p class="textModal">Estas seguro de eliminar</p>
                                                <form method="POST" action="{{ url('collaborators/deleteColl', [$row]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btns" type="submit">Si</button>
                                                </form>

                                            </div>
                                        </div>
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

</html>
