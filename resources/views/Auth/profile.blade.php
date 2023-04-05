<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="/js/Login.js"></script>
    @vite(['resources/scss/_app.scss', 'resources/js/app.js'])
    @vite(['resources/scss/_menu.scss'])
    <link href="https://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">
    <title>Profile</title>
</head>

<body>

    <header class="header">
        <x-nav-bar />
    </header>

    <div id="FormProfile1">
        <div class="profileForm">
            <img src="" alt="" onclick="history.go(-1)">
            <div class="imagenProfile">
                <img id="imagen" src="https://img.icons8.com/ios/50/null/gender-neutral-user--v1.png" />
            </div>
            <form class="form" method="POST" action="">
                @foreach ($profile as $row)
                    <div class="Nombre">
                        <p class="Text">Nombre</p>
                        <input Class="Empresa" value="{{ $row->name }}" type="text" name="name"
                            placeholder="Nombre del colaborador" required readonly>
                    </div>
                    <div class="Puesto">
                        <p class="Text">Area</p>
                        <input Class="Empresa" value="{{ $row->area }}" type="text" name="puesto"
                            placeholder="area" required readonly>
                    </div>
                    <div class="Sucursal">
                        <p class="Text">Sucursal</p>
                        <input Class="Empresa" value="{{ $row->branchoffice }}" type="text" name="sucursal"
                            placeholder="Sucursal" required readonly>
                    </div>
                    <div class="Email">
                        <p class="Text">Correo</p>
                        <input Class="Empresa" value="{{ $row->email }}" type="email" name="email"
                            placeholder="Correo" required readonly>
                    </div>
                @endforeach
            </form>
        </div>

        <div class="space">

        </div>

        <div class="profileEdit">
            <form method="POST" action="{{ url('users/updateuser') }}">
                @method('PUT')
                @csrf
                @foreach ($profile as $user)
                    <div>
                        <h4>Cambiar informacion</h4>
                    </div>
                    <div class="Nombre">
                        <p class="Text">Nombre</p>
                        <input Class="Empresa" value="{{ $user->name }}" type="text" name="name"
                            placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="Puesto">
                        <p class="Text">Area</p>
                        <select id="Puesto" name="area" disabled>
                            <option>{{ $user->area }}</option>
                        </select>
                    </div>
                    <div class="Sucursal">
                        <p class="Text">Sucursal</p>
                        <select id="Sucursal" name="branchoffice" disabled>
                            <option>{{ $user->branchoffice }}</option>
                        </select>
                    </div>
                    <div class="Email">
                        <p class="Text">Correo</p>
                        <input Class="Empresa" value="{{ $user->email }}" type="email" name="email"
                            placeholder="Ingrese su correo" required>
                    </div>

                    <div class="Contraseña">
                        <p class="Text">Contraseña</p>
                        <input Class="Empresa" type="password" name="password" placeholder="Ingrese la nueva contraseña"
                            required>
                    </div>
                @endforeach

                <button class="button" type="submit">Guardar</button>
            </form>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

</html>
