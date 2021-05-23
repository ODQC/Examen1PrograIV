
function addCard() {
    $.ajax({
        url: "../Back-end/procesos/crearTarjetas.php", //the page containing php script
        type: "POST", //request type
        success: function (result) {
            alert(result);
        }
    });
}