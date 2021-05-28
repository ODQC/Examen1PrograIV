
function nuevoTicket(idTicket,idEspacio, idBus, idHorario, idruta,idUsuario, Emision,fechSalida,) {
    var ticket = {

        idtiquete: idTicket,
        espacio: idEspacio,
        bus: idBus,
        horario: idHorario,
        ruta: idruta,
        cedula: idUsuario,
        emision : Emision,
        salida: fechSalida

    };
    alert(ticket);
}
