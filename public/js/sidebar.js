"use strict";

var check = document.querySelector("#check");
var sidebar = document.querySelector("#nav-sidebar");
var arrowBack = document.querySelector(".arrow-back");

check.addEventListener("change", validaCheckbox, false);
/* arrowBack.addEventListener("click", validaCheckbox, false); */

$(".arrow-back").click(function () {
    //Esto es hace lo mismo que lo de arriba pero con JQuery
    validaCheckbox();
});

function validaCheckbox() {
    if (check.checked) {
        sidebar.classList.toggle("show-sidebar");
    } else if (!check.checked) {
        sidebar.classList.toggle("show-sidebar");
    }
}
