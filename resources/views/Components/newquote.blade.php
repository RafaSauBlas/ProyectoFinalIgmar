<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/_newquotes.scss'])
    @vite(['resources/scss/_menu.scss'])
    @vite(['resources/scss/_btnBack.scss'])
    <title>Document</title>
</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <a href="/quotes" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>
    <form action="" method="post" enctype="multipart/form-data">

        @csrf
        <div class="contentclient1">
            <div>
                <h3 class="h3uno">Cotización</h3>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">#Cotización</label>
                    <input type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Cliente</label>
                    <input name="name" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Direcciónes Disponibles</label>
                    <input name="lastname" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Datos de Contacto</label>
                    <input name="lastname" type="text">
                </div>
            </div>
            <div class="formclient2">
                <div class="marginsforms">
                    <label for="">Asesor</label>
                    <input name="phone" type="text" maxlength="10">
                </div>
                <div class="marginsforms">
                    <label for="">Tipo de Requisición</label>
                    <input name="email" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Tipo de Envío</label>
                    <input name="phone" type="text" maxlength="10">
                </div>
                <div class="marginsforms">
                    <label for="">Notas Extras</label>
                    <input name="email" type="text">
                </div>
            </div>
        </div>

        <div class="contentclient2">
            <div>
                <h3 class="h3dos">Agregar Productos</h3>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">Cantidad</label>
                    <input name="alias" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Artículo</label>
                    <select name="" id="">
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                    </select>
                </div>
                <div class="marginsforms">
                    <label for="">Aroma</label>
                    <select name="" id="">
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                    </select>
                </div>
                <div class="marginsforms">
                    <label for="">Precio</label>
                    <input name="tax_situation" type="file" class="inputFile">
                </div>
            </div>
            <div class="formclient">
                <div class="marginsforms">
                    <label for="">Descuento</label>
                    <input name="source" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Total</label>
                    <input name="sale_commission" type="text">
                </div>
                <div class="marginsforms">
                    <label for="">Notas</label>
                    <input name="rent_commission" type="text">
                </div>
                <div class="marginsforms">
                    <label for="" id="iidetected">Base</label>
                    <select name="" id="">
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                        <option value="">Base</option>
                    </select>
                </div>
            </div>
            <div class="contentclient4">
                <button class="btnsaveclient" type="submit">Agregar articulo</button>
            </div>
        </div>
    
        <div class="contentclient3">

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Artículo</th>
                            <th>Aroma</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Total</th>
                            <th>Notas</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Caja de Marmol</td>
                            <td>B4 + TB7</td>
                            <td>1650</td>
                            <td>0</td>
                            <td>1650</td>
                            <td>Lorem ipsum dolor sit ame</td>
                        </tr>
                        <tr>
                            <td>Caja de Marmol</td>
                            <td>B4 + TB7</td>
                            <td>1650</td>
                            <td>0</td>
                            <td>1650</td>
                            <td>Lorem ipsum dolor sit ame</td>
                        </tr>
                        <tr>
                            <td>Caja de Marmol</td>
                            <td>B4 + TB7</td>
                            <td>1650</td>
                            <td>0</td>
                            <td>1650</td>
                            <td>Lorem ipsum dolor sit ame</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="contentclient4">
                <button class="btnsaveclient" type="submit">Guardar</button>
            </div>
        </div>


    </form>
</body>

</html>
