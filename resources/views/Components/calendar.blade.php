<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/_calendar.scss', 'resources/js/calendar.js'])
    @vite(['resources/scss/_menu.scss'])
    @vite(['resources/scss/_btnBack.scss'])
    <title>Document</title>
</head>
<body>
    <header class="header">
        <x-nav-bar />
    </header>
    <a href="/dashboard" class="backindex">
        <img src="/Image/IconVolverAtras.png" alt="Botón">
    </a>

    <div id="contentCalendar">
        <div>
            <form>
                <div>
                    <label for="">Nombre de actividad</label>
                    <input type="text">
                </div>
                <div>
                    <div>
                        <label for="">Fecha</label>
                        <select name="" id="">
                            <option value="">option1</option>
                            <option value="">option2</option>
                            <option value="">option3</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Hora</label>
                        <select name="" id="">
                            <option value="">option1</option>
                            <option value="">option2</option>
                            <option value="">option3</option>
                        </select>
                    </div>
                    <div>
                        <label for=""></label>
                        <select name="" id="">
                            <option value="">option1</option>
                            <option value="">option2</option>
                            <option value="">option3</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div id="selectedDayofCalendar">
            <div id="calendar1">
                <h2>Day</h2>
            </div>
            <div id="calendar2">
                <h1>18</h1>
            </div>
            <div id="calendar3">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, ut.</p>
            </div>
        </div>
        <div class="calendar-container">
            <div class="calendar-header">
              <button class="prev-button">&lt;</button>
              <h2 class="month-year"></h2>
              <button class="next-button">&gt;</button>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Do.</th>
                  <th>Lu.</th>
                  <th>Ma.</th>
                  <th>Mi.</th>
                  <th>Ju.</th>
                  <th>Vi</th>
                  <th>Sa.</th>
                </tr>
              </thead>
              <tbody class="calendar-body">

              </tbody>
            </table>
          </div>
    </div>
</body>
</html>
