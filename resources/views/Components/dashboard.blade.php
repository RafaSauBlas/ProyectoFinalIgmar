<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/_dashboard.scss'])
    @vite(['resources/scss/_menu.scss'])
    <link href="https://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">

    <title>Menú</title>
</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <div class="body">

        <div class="modulos">
            <div class="moduloIzq">
                <a href="/profile">
                    <button class="BtnIzq"> <img class="ImgBtn" src="/Image/IconUsuario.png" width="40"
                            height="40" />
                        <p>Mi Perfil</p>
                    </button>
                </a>
                <a href="/calendar">
                    <button class="BtnIzq"><img class="ImgBtn" src="/Image/IconCalendario.png" width="40"
                            height="40" />
                        <p>Calendario</p>
                    </button>
                </a>
                <button class="BtnIzq"><img class="ImgBtn" src="/Image/IconRutas.png" width="40" height="40" />
                    <p>Rutas</p>
                </button>
                <a href="/customers">
                    <button class="BtnIzq"><img class="ImgBtn" src="/Image/IconClientes.png" width="40"
                            height="40" />
                        <p>Clientes</p>
                    </button>
                </a>
                <button class="BtnIzq"><img class="ImgBtn" src="/Image/IconRequisiciones.png" width="40"
                        height="40" />
                    <p>Requisiciones</p>
                </button>
            </div>

            <div class="moduloDer">
                <button class="BtnDer"><img class="ImgBtn" src="/Image/IconInventario.png" width="40"
                        height="40" />
                    <p>Almacen</p>
                </button>
                <button class="BtnDer"><img class="ImgBtn" src="/Image/IconAdministrativo.png" width="40"
                        height="40" />
                    <p>Administrativo</p>
                </button>
                <a href="/collaborators"><button class="BtnDer"><img class="ImgBtn" src="/Image/IconColaboradores.png"
                            width="40" height="40" />
                        <p>Colaboradores</p>
                    </button></a>

                <button class="BtnDer"><img class="ImgBtn" src="/Image/IconQuimicos.png" width="40"
                        height="40" />
                    <p>Químicos</p>
                </button>
                <a href="/quotes">
                    <button class="BtnDer"><img class="ImgBtn" src="/Image/IconCotizaciones.png" width="40"
                            height="40" />
                        <p>Cotizaciones</p>
                    </button>
                </a>
                <a href="/solicita">
                  <button class="BtnDer"> <img class="ImgBtn" src="/Image/IconUsuario.png" width="40" height="40" />
                    <p>Panel de solicitudes</p>
                  </button>
                </a>
            </div>
        </div>

        <div class="info">
            <div class="ranking">
                <div class="rankingTitulo">
                    <p class="TitulosModulos">Ranking</p>
                </div>
            </div>
            <div class="metas">
                <div class="rankingTitulo">
                    <p class="TitulosModulos">Metas</p>
                </div>
            </div>
        </div>

        <div class="tareas">
            <div class="rankingTitulo">
                <p class="TitulosModulos">Tareas</p>
            </div>
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'OK')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Bienvenido',
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
            title: 'Cambia tu contraseña en el apartado de perfil',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif


</html>
