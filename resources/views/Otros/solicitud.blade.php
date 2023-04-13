<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Login.css">
    <script src="/js/Login.js"></script>
    <title>Xent</title>
</head>
<body>
    <div class="padre">
        <div class="bodyL">
             <div class="box">
             <form class="form" method="POST" action="{{route('respondersolicitud')}}">
                    @csrf
                    <img src="/Image/Xent logo.png" alt="">
                    <div class="email">
                         <center>El usuario <b>{{$username}}</b> está solicitando un codigo para <b>{{$utilidad}}</b> un registro</center>
                         <br>
                         <input type="hidden" name="usuario" value="{{$username}}">
                         <input type="hidden" name="funcion" value="{{$utilidad}}">
                         <center><input type="radio" id="acepta" name="valor" value="acepta" checked>
                            <label for="acepta">Aceptar</label>
                           <input type="radio" id="rechaza" name="valor" value="rechaza">
                            <label for="rechaza">Rechazar</label></center>
                    </div>
                    <div class="button">
                       <button class="BtnR" type="submit">Validar codigo</button>
                    </div>
                </form>
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
    text: 'credenciales no validas',
    })
</script>
@endif

@if (session('msg') == 'STATUSFALSE')
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Usuario deshabilitado ',
    })
</script>
@endif

@if (session('msg') == 'singOut')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Adios',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif


</html>