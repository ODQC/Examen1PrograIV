
jQuery(document).ready(function () {
    jQuery(".payment-button").click(function () {
        console.log('The function is hooked up');
        jQuery.ajax({
            type: "POST",
            url: "../Back-end/procesos/crearTarjetas.php",
            data: {
                action: 'mark_message_as_read',
                // add your parameters here
                message_id: $('.your-selector').val()
            },
            success: function (output) {
                console.log(output);
            }
        });
    });
});
