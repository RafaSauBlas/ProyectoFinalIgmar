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
                <form class="form">
                    <img src="/Image/Xent logo.png" alt="">
                    <div class="email">
                       <center><h4 class="mt-6 text-xl text-gray-900 dark:text-white">SU CODIGO PARA {{$utilidad}} ES</h4></center>
                       <br>
                       <center><b><h1 class="underline mt-12 text-xl font-bold text-gray-900 dark:text-white"> {{ $codigo }} </h1></b></center>
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