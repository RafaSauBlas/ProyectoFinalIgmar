<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/_addaddress.scss', 'resources/js/app.js'])
    @vite(['resources/scss/_menu.scss'])
    @vite(['resources/scss/_btnBack.scss'])
    <title>Adress</title>
</head>
<body>
    <header class="header">
        <x-nav-bar />
    </header>

    <a href="/customers" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>

    <form method="post" action="{{url('client/addAdress',[$customer])}}">
        @csrf
        @foreach ($address as $row)
        <div class="contentclient1">
            <div>
                <h3 class="h3uno">Cliente</h3>
            </div>
            <div action="" class="formclient">
                <div class="marginsforms">
                    <label for="">Nombre del cliente</label>
                    <input value="{{$row->name}}" name="name" type="text" readonly>
                </div>
                <div class="marginsforms">
                    <label for="">Apellido</label>
                    <input type="text" value="{{$row->lastname}}" name="lastname" readonly>
                </div>
            </div>
        </div>

        <div class="contentclient3">
            <div>
                <h3 class="h3three">Direccion</h3>
            </div>
            <div>

                <div class="formdirection1">
                    <div class="marginsforms">
                        <label for="">Alias</label>
                        <input type="text" name="alias">
                    </div>
                    <div class="marginsforms">
                        <label for="">Calle</label>
                        <input type="text" name="street">
                    </div>
                    <div class="formdirectionCityState">
                        <div class="marginsforms">
                            <label for="">No. Exterior</label>
                            <input type="text" class="inputCityState" name="outdoor_number">
                        </div>
                        <div class="marginsforms">
                            <label for="">No. Interior</label>
                            <input type="text" class="inputCityState" name="interior_number">
                        </div>
                    </div>
                </div>


                <div class="formdirection2">
                    <div class="marginsforms">
                        <label for="">Ciudad</label>
                        <input type="text" name="city">
                    </div>
                    <div class="marginsforms">
                        <label for="">Colonia</label>
                        <input type="text" name="cologne">
                    </div>
                    <div class="marginsforms">
                        <label for="">Estado</label>
                        <input type="text" name="state">
                    </div>
                </div>
                <div class="formdirection3">
                    <div class="marginsforms">
                        <label for="">C.P</label>
                        <input type="text" name="postal_code">
                    </div>
                    <div class="marginsforms">
                        <label for="">Referencia</label>
                        <input type="text" name="reference">
                    </div>

                </div>

            </div>
        </div>
        @endforeach
        <div class="contentclient4">
            <button class="btnsaveclient" type="submit">Guardar</button>
        </div>

    </form>
</body>
</html>
