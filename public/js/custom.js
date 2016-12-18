$(function () {

    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(today.getDate()+1);
    tomorrow.setHours(00);
    tomorrow.setMinutes(00);
    tomorrow.setSeconds(00);

    // Access everything in Angular
    var scope = angular.element("#scope").scope();

    $(document).ready(function(){
        
    });

    $('#datetimepicker1').datetimepicker({
        minDate: moment(today).add(1, 'days').startOf('day'),
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
    
    var removeActiveClass = function () {
        $("#tabs ul li").each(function () {
            $(this).removeClass("active");
        });
    };

    // First step button Forward
    $('#time-place a').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(1)").addClass('active');
    });

    
    // Second step button Back
    $('#car a:eq(0)').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(0)").addClass('active');
    });

    // Second step button Forward
    $('#car a:eq(1)').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(2)").addClass('active');
    });


    // Third step button Back
    $('#extras a.btn-back').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(1)").addClass('active');
    });

    // Third step button Forward
    $('#extras a.btn-forward').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(3)").addClass('active');
    });

    // Third step button Back
    $('#client-data a.btn-back').click(function(){
        removeActiveClass();
        $("#tabs ul li:eq(2)").addClass('active');
    });


});