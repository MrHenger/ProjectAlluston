'use strict'


var check = document.querySelector('#check');
var sidebar = document.querySelector('#nav-sidebar');


check.addEventListener("change", validaCheckbox, false);
function validaCheckbox()
{
  
    if(check.checked){
        sidebar.classList.toggle('show-sidebar');
    }else if(!check.checked){
        sidebar.classList.toggle('show-sidebar');
    }  
}