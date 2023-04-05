// Obtener los elementos del DOM necesarios
const calendarContainer = document.querySelector('.calendar-container');
const prevButton = calendarContainer.querySelector('.prev-button');
const nextButton = calendarContainer.querySelector('.next-button');
const monthYear = calendarContainer.querySelector('.month-year');
const calendarBody = calendarContainer.querySelector('.calendar-body');

// Inicializar el calendario para el mes actual
let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();
let selectedDate;

// Generar el calendario para el mes actual
generateCalendar(currentYear, currentMonth);

// Agregar listeners para los botones de navegación
prevButton.addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar(currentYear, currentMonth);
});

nextButton.addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar(currentYear, currentMonth);
});

// Función para generar el calendario para un mes y año dados
function generateCalendar(year, month) {
    // Actualizar el mes y año en el encabezado del calendario
    monthYear.textContent = new Date(year, month).toLocaleDateString(undefined, {
        month: 'long',
        year: 'numeric',
    });
    // Obtener el número de días en el mes
    const numDays = new Date(year, month + 1, 0).getDate();

    // Crear una matriz de días para el mes actual
    const days = [];
    for (let i = 1; i <= numDays; i++) {
        days.push(new Date(year, month, i));
    }

    // Determinar el día de la semana en que comienza el mes
    const firstDayOfMonth = new Date(year, month, 1).getDay();

    // Crear filas y celdas para el calendario
    let html = '';
    let dayCount = 1;
    for (let i = 0; i < 6; i++) {
        html += '<tr>';
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDayOfMonth) {
                html += '<td></td>';
            } else if (dayCount > numDays) {
                html += '<td></td>';
            } else {
                const date = days[dayCount - 1];
                const dateString = date.toISOString().split('T')[0];
                let classes = 'date';
                if (dateString === new Date().toISOString().split('T')[0]) {
                    classes += ' today';
                }
                if (dateString === selectedDate) {
                    classes += ' selected';
                }
                html += `<td class="${classes}" data-date="${dateString}">${dayCount}</td>`;
                dayCount++;
            }
        }
        html += '</tr>';
    }
    calendarBody.innerHTML = html;

    // Agregar listeners para los días del calendario
    const dates = calendarBody.querySelectorAll('.date');
    dates.forEach((date) => {
        date.addEventListener('click', () => {
            selectedDate = date.getAttribute('data-date');
            generateCalendar(year, month);
        });
        date.addEventListener('mouseenter', () => {
            date.classList.add('hover');
        });
        date.addEventListener('mouseleave', () => {
            date.classList.remove('hover');
        });
    });
}