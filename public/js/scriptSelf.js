"use strict";

ellipsisEffect(".card-link");

function ellipsisEffect(selector) {
    var component = $(selector);
    var arrayComponent = [].slice.call(component);

    for (var i in arrayComponent) {
        var text = arrayComponent[i];

        while (text.innerText.length > 40) {
            var change = text.innerText;
            text.innerText = change.replace(/\W*\s(\S)*$/, "...");
        }
    }
}

/***********SISTEMA DE BUSQUEDA**************/
$("#search").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "http://alluston.test/search",
            dataType: "json",
            data: {
                term: request.term,
            },
            success: function (data) {
                response(data);
            },
        });
    },
});
