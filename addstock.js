// script.js

function toggleFields() {
    var stockRadio = document.getElementById("stock_radio");
    var stockFields = document.getElementById("stock_fields");
    var foRadio = document.getElementById("fo_radio");
    var foFields = document.getElementById("fo_fields");
    var nameInput = document.getElementById("name");
    var idInput = document.getElementById("id");

    if (stockRadio.checked) {
        stockFields.style.display = "block";
        foFields.style.display = "none";
        nameInput.required = true;
        idInput.required = true;
    } else if (foRadio.checked) {
        stockFields.style.display = "block";
        foFields.style.display = "block";
        nameInput.required = true;
        idInput.required = true;
    }
}
