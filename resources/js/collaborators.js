var btnsEditar = document.querySelectorAll(".btnE");
var btnsBorrar = document.querySelectorAll(".btnB");

btnsEditar.forEach(function (btnEditar) {
    btnEditar.addEventListener("click", function () {
        var modalId = this.getAttribute("data-target");
        var modal = document.querySelector(modalId);
        modal.style.display = "block";
    });
});

btnsBorrar.forEach(function (btnBorrar) {
    btnBorrar.addEventListener("click", function () {
        var modalId = this.getAttribute("data-target");
        var modal = document.querySelector(modalId);
        modal.style.display = "block";
    });
});

var closeButtons = document.querySelectorAll(".close");
closeButtons.forEach(function (closeButton) {
    closeButton.onclick = function () {
        var modal = this.parentElement.parentElement;
        modal.style.display = "none";
    }
});

//buscador en tiempo real
var input = document.getElementById("myInput");
input.addEventListener("input", myFunction);
function myFunction() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Ocultar el mensaje de "No se encontraron resultados" si se muestra
    var noResultsRow = document.getElementById("no-results-row");
    if (noResultsRow) {
        noResultsRow.style.display = "none";
    }

    var found = false;
    for (i = 1; i < tr.length; i++) {
        found = false;
        for (j = 1; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }

    }
    if (!found) {
        var tbody = table.querySelector("tbody");
        var noResultsRowHtml =
         "<tr id='no-results-row'><td colspan='" + tr[0].cells.length + "'>No se encontraron resultados</td></tr>";
         
        tbody.insertAdjacentHTML('beforeend', noResultsRowHtml);
    }

}



