$(function () {

    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(today.getDate()+1);

    $('#datetimepicker1').datetimepicker({
        showClear: true,
        showClose: true,
        format: 'l',
        locale: 'hr',
        defaultDate: tomorrow
    });
    $('#datetimepicker2').datetimepicker({
        showClear: true,
        showClose: true,
        format: 'l',
        locale: 'hr'
    });

    // Initialize date for tomorrow
    $('#datetimepicker1').data("DateTimePicker").minDate(tomorrow);
    $('#datetimepicker2').data("DateTimePicker").minDate(tomorrow);

    scope.reservation.pickupDate = $('#datetimepicker1').data("date");
    scope.reservation.returnDate = $('#datetimepicker2').data("date");


    $("#datetimepicker1").on("dp.change", function (e) {

        $('#datetimepicker2').data("DateTimePicker").minDate(e.date);

        scope.reservation.pickupDate = $('#datetimepicker1').data("date");
        scope.reservation.returnDate = $('#datetimepicker2').data("date");

        scope.timeDateChange();
    });

    $("#datetimepicker2").on("dp.change", function (e) {
        scope.reservation.returnDate = $('#datetimepicker2').data("date");
        scope.timeDateChange();

    });
});