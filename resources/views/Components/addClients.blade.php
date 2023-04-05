<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/Login.js"></script>
    @vite(['resources/scss/_addClients.scss', 'resources/js/app.js'])
    @vite(['resources/scss/_menu.scss'])
    @vite(['resources/scss/_btnBack.scss'])
    <link href="https://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">
    <title>Clientes</title>
</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <a href="/customers" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>

    <form action="{{url('client/storeclient')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="contentclient1">
            <div>
                <h3 class="h3uno">Cliente</h3>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">Asesor</label>
                    @if (Auth::user()->area == 2)
                    <select name="user_id" id="Select">
                        @foreach ($user as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select><br>
                    @else
                    <input type="text" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}" readonly>
                    <input type="text" name="user_id" hidden= "true" value="{{Auth::user()->id}}" placeholder="{{Auth::user()->name}}" readonly>
                    @endif
                    @error('user_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Nombre</label>
                    <input name="name" type="text">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Apellido</label>
                    <input name="lastname" type="text">
                    @error('lastname')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="formclient2">
                <div class="marginsforms">
                    <label for="">Telefóno</label>
                    <input name="phone" type="text"  maxlength="10">
                    @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Correo</label>
                    <input name="email" type="text">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="contentclient2">
            <div>
                <h3 class="h3dos">Datos Generales</h3>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">Alias</label>
                    <input name="alias" type="text">
                    @error('alias')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Razón Social</label>
                    <input name="social_reason" type="text">
                    @error('social_reason')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Situación Fiscal</label>
                    <input name="tax_situation" type="file" class="inputFile">
                    @error('tax_situation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">Fuente</label>
                    <input name="source" type="text">
                    @error('source')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Comisión por venta</label>
                    <input name="sale_commission" type="text">
                    @error('sale_commission')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="marginsforms">
                    <label for="">Comisión por renta</label>
                    <input name="rent_commission" type="text">
                    @error('rent_commission')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="contentclient3">
            <div>
                <h3 class="h3three">Dirección</h3>
            </div>
            <div>

                <div class="formdirection1">
                    <div class="marginsforms">
                        <label for="">Calle</label>
                        <input name="street" type="text">
                        @error('street')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="marginsforms">
                        <label for="">Colonia</label>
                        <input name="cologne" type="text">
                        @error('cologne')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="formdirectionCityState">
                        <div class="marginsforms">
                            <label for="">No. Exterior</label>
                            <input name="outdoor_number" type="text" class="inputCityState">
                            @error('outdoor_number')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="marginsforms">
                            <label for="">No. Interior</label>
                            <input name="interior_number" type="text" class="inputCityState">
                            @error('interior_number')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="formdirection2">
                    <div class="marginsforms">
                        <label for="">Ciudad</label>
                        <input name="city" type="text">
                        @error('city')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="marginsforms">
                        <label for="">Estado</label>
                        <input name="state" type="text">
                        @error('state')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="marginsforms">
                        <label for="">Contacto</label>
                        <input name="contact" type="text">
                        @error('contact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="formdirection3">
                    <div class="marginsforms">
                        <label for="">C.P</label>
                        <input name="postal_code" type="text">
                        @error('postal_code')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="marginsforms">
                        <label for="">Referencia</label>
                        <input name="reference" type="text">
                        @error('reference')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="marginsforms">
                        <label for="">Tel. Contacto</label>
                        <input name="phone_contact" type="text"  maxlength="10">
                        @error('phone_contact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="contentclient4">
            <button class="btnsaveclient" type="submit">Guardar</button>
        </div>


    </form>
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
            title: 'Registrado correctamente',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

</html>
