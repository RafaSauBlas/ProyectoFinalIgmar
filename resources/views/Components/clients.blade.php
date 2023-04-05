<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/Login.js"></script>
    @vite(['resources/scss/_clients.scss', 'resources/js/app.js'])
    @vite(['resources/scss/_menu.scss'])
    @vite(['resources/scss/_btnBack.scss'])
    <link href="https://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">
    <title>Clientes</title>
</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <a href="/dashboard" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>
    <div class="formSub">
        <a href="/addcustomers">
            <div class="addContainer">
                <button class="addCustomer" type="submit">Agregar Cliente</button>
            </div>
        </a>
        <div class="Search">
            <form id="buscador" method="GET" action="{{ url('customers') }}">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar...">
            </form>
        </div>

        <div class="tabCustomer">
            <div class="table-container">
                @if (count($customer) > 0)
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" hidden>Id</th>
                                <th class="info" scope="col">Info</th>
                                <th class="estatus" scope="col">Estatus</th>
                                <th class="asesor" scope="col">Asesor</th>
                                <th class="nombreCliente" scope="col">Nombre del Cliente</th>
                                <th class="Ciudad" scope="col">Ciudad</th>
                                <th class="Estado" scope="col">Estado</th>
                                <th class="Cantidad" scope="col">Cantidad</th>
                                <th class="edt-eli" scope="col"></th>
                            </tr>
                        </thead>
                        <div class="TBody">
                            <tbody>
                                @foreach ($customer as $row)
                                    <tr>
                                        <th hidden></th>
                                        <td>
                                            <button type="button" class="btnE" data-toggle="modal"
                                                data-target="#myModal1-{{ $row->id }}">
                                                <img src="/Image/IconoAgregar.png" class="btnE">
                                            </button>
                                            @include('Components.modals.modalClient')
                                        </td>
                                        @if ($row->status == true)
                                            <td class="estatus">ACTIVO</td>
                                        @else
                                            <td class="estatus">INACTIVO</td>
                                        @endif
                                        <td class="asesor">{{ $row->UserName }}</td>
                                        <td class="nombreCliente">{{ $row->name }}</td>
                                        <td class="Ciudad">{{ $row->city }}</td>
                                        <td class="Estado">{{ $row->state }}</td>
                                        <td class="Cantidad">{{ $row->sale_commission + $row->rent_commission }}</td>
                                        <td class="edt-eli">
                                            <a href="/addaddress/{{$row->id}}">
                                                <button type="button" class="btnE" data-toggle="modal">
                                                    <img src="/Image/IconAgregarAzul.png" class="btnE">
                                                </button>
                                            </a>
                                            <button type="button" class="btnE" data-toggle="modal"
                                                data-target="#myModal2-{{ $row->id }}">
                                                <img src="/Image/IconEditar.png" class="btnE">
                                            </button>
                                            @include('Components.modals.modalEditClient')

                                                <button type="button" (click)="borrarEmpleados(empleado.EmpleID)"
                                                    class="btnB" data-toggle="modal"
                                                    data-target="#myModal3-{{ $row->id }} ">
                                                    <img class="btnB" src="/Image/IconEliminar.png">
                                                </button>

                                            <div id="myModal3-{{ $row->id }}" class="modal modal2">
                                                <div class="modal-content2">
                                                    <span class="close">&times;</span>
                                                    <img src="/Image/IconEliminar.png" alt="">
                                                    <p class="textModal2">Estas seguro de eliminar</p>
                                                    <form method="POST" action="{{url('client/changeStatus', [$row])}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btns" type="submit">Confirmar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                @else
                    <p>No se encontraron resultados.</p>
                @endif
            </div>
        </div>
    </div>
    <script>
        var btnsEditar = document.querySelectorAll(".btnE");
        var btnsBorrar = document.querySelectorAll(".btnB");

        btnsEditar.forEach(function(btnEditar) {
            btnEditar.addEventListener("click", function() {
                var modalId = this.getAttribute("data-target");
                var modal = document.querySelector(modalId);
                modal.style.display = "block";
            });
        });

        btnsBorrar.forEach(function(btnBorrar) {
            btnBorrar.addEventListener("click", function() {
                var modalId = this.getAttribute("data-target");
                var modal = document.querySelector(modalId);
                modal.style.display = "block";
            });
        });


        var closeButtons = document.querySelectorAll(".close");
        closeButtons.forEach(function(closeButton) {
            closeButton.onclick = function() {
                var modal = this.parentElement.parentElement;
                modal.style.display = "none";
            }
        });
    </script>

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

@if (session('msg') == 'ADDRESSOK')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'dirección añadida correctamente',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if (session('msg') == 'STATUS')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'cliente inactivo',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif


</body>

</html>
