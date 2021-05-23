$(function () {
    $('[data-toggle="popover"]').popover()
})



$("#payment-button").click(function (e) {


    var form = document.getElementById("metodoPago");

    var cvv = $('#cvv').val();
    var regCVV = /^[0-9]{3,4}$/;
    var CardNo = $('#idTarjetas').val();
    var regCardNo = /^[0-9]{12,16}$/;
    var date = $('#fechaVencimineto').val().split('/');
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^20|21|22|23|24|25|26|27|28|29|30|31$/;

    if (form[0].checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
    }
    else {
        if (!regCardNo.test(CardNo)) {

            $("#idTarjetas").addClass('required');
            $("#idTarjetas").focus();
            alert(" Enter a valid 12 to 16 card number");
            return false;
        }
        else if (!regCVV.test(cvv)) {

            $("#cvv").addClass('required');
            $("#cvv").focus();
            alert(" Enter a valid CVV");
            return false;
        }
        else if (!regMonth.test(date[0]) && !regMonth.test(date[1])) {

            $("#fechaVencimineto").addClass('required');
            $("#fechaVencimineto").focus();
            alert(" Enter a valid exp date");
            return false;
        }



        form.submit();
    }

    form.addClass('was-validated');
});