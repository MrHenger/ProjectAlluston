"use strict";

$(document).ready(function () {
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
});
