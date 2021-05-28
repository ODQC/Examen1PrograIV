$(document).ready(function () {
    var current = 1,
        current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }

});
function getEspacios(id) {
    $('#idEspacio').html('');
    // $('#city').html('<option>Select City</option>');
    var horario = document.getElementById("idhorario").value;

    alert(Number(horario));
    $.ajax({
        type: 'post',
        url: 'buscarEspacio.php',
        data: {
            country_id: Number(horario)
        },
        success: function (data) {
            $('#state').html(data);
        }

    })


}