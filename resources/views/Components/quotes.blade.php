<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/_quotes.scss'])
    @vite(['resources/scss/_menu.scss'])
    <title>Document</title>
</head>

<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <a href="/dashboard" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>
    <div>
        <div class="quotesSubmenu">
            <a href="" id="activate">Cotizaciones</a>
            <a href="/newquotes">Nueva Cotizacion</a>
        </div>

        <div class="quotesOptions">
            <input type="date">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Filtrar por Asesor</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="#about">About</a>
                    <a href="#base">Base</a>
                    <a href="#blog">Blog</a>
                    <a href="#contact">Contact</a>
                    <a href="#custom">Custom</a>
                    <a href="#support">Support</a>
                    <a href="#tools">Tools</a>
                </div>
            </div>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Número de Cotización</th>
                        <th>Tipo</th>
                        <th>Fecha Registro</th>
                        <th>Asesor</th>
                        <th>Cliente</th>
                        <th>Fecha Ejecución</th>
                        <th>Fecha Expiración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                    </tr>
                    <tr>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                    </tr>
                    <tr>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                    </tr>
                    <tr>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                        <td>dsdsd</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        document.addEventListener("click", function(event) {
            var input = document.getElementById("myInput");
            if (event.target.closest("#myDropdown")) {
                input.value = event.target.textContent;
            }
        });
    </script>
</body>

</html>
