@extends('layouts.app')
@section('content')
<div class="container">
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('logeocodigo') }}">
                        @csrf
                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2Fa%2Faf%2FSquare_Enix_logo.svg%2F2560px-Square_Enix_logo.svg.png&f=1&nofb=1&ipt=510f7cb67c4dbb07eaf36e2169a4d10423cefad55131305750c7b13e6158e341&ipo=images"
                                 alt="" style="height:256; width:256px"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>
                        <center><h2>Para continuar, por favor escanea este codigo desde tu APP...</h2></center>
                         <br>
                        <div class="row mb-3">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                               <div class="visible-print text-center">
                                   {!! QrCode::size(250)->generate("$codigo"); !!}
                               </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="row mb-3"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('44285c892edabb7d1cdf', {
        cluster: 'us2'
        });

        var channel = pusher.subscribe('home');
        channel.bind('my-event', function(data) {
        let message = JSON.stringify(data);

        window.location.href = "{{route('home')}}";
        
        });

</script>

@endsection
<!-- <!DOCTYPE html>
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
                <form class="form" method="POST" action="{{route('logeocodigo')}}">
                    @csrf
                    <img src="/Image/Xent logo.png" alt="">
                    <div class="email">
                         <center><h2>Codigo de seguridad</h2></center>
                         <br>
                         <input class="Correo" type="number" name="codigo" id="codigo" placeholder="Ingrese su codigo de seguridad" required="required">
                         @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="button">
                       <button class="BtnR" type="submit">Validar codigo</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</body> -->