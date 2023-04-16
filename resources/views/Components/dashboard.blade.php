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
               
               
            </div>

            <div class="moduloDer">
                <a href="/collaborators"><button class="BtnDer"><img class="ImgBtn" src="/Image/IconColaboradores.png"
                            width="40" height="40" />
                        <p>Trabajadores</p>
                    </button></a>
                    <a href="/calendar"><button class="BtnDer"><img class="ImgBtn" src="/Image/vinilo.png"
                            width="40" height="40" />
                        <p>Discos</p>
                    </button></a>

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
