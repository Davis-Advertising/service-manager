import * as moment from "moment";
import flatpickr from "flatpickr";

(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut
})(jQuery);

jQuery(document).ready(function($) {

    flatpickr( $( ".datepicker" ), {
        enableTime: false,
        //minDate: "today",
        /*dateFormat: ,*/
        /*altFormat: "m-d-Y h:i K",*/
        dateFormat: "Y-m-d",
        altFormat: "F j, Y",
        altInput: true,

    });

    $('.flatpickr-calendar').on("click.bs.dropdown", function (e) {
        e.stopPropagation();
        e.preventDefault();
    });


    $('.renew-30-days').click(function() {

        var value = $(this).parent().find('.datepicker.flatpickr-input').val();
        var SetThreeMonths = moment( value ).add(90, 'days').format("YYYY-MM-DD");
        var id = $(this).parent().find('.flatpickr-input').attr('id');
        const fp = document.querySelector( '#' + id)._flatpickr;

        $(this).closest('.flatpickr-input').val( SetThreeMonths );
        fp.setDate( SetThreeMonths );
    });

    $('.renew-1-year').click(function() {

        var value = $(this).parent().find('.datepicker.flatpickr-input').val();
        var SetOneYear = moment( value ).add(1, 'year').format("YYYY-MM-DD");
        var id = $(this).parent().find('.flatpickr-input').attr('id');
        const fp = document.querySelector( '#' + id)._flatpickr;

        $(this).closest('.flatpickr-input').val( SetOneYear );
        fp.setDate( SetOneYear );
    });

    $('.renew-2-years').click(function() {

        var value = $(this).parent().find('.datepicker.flatpickr-input').val();
        var SetTwoYears = moment( value ).add(2, 'years').format("YYYY-MM-DD");
        var id = $(this).parent().find('.flatpickr-input').attr('id');
        const fp = document.querySelector( '#' + id)._flatpickr;

        $(this).closest('.flatpickr-input').val( SetTwoYears );
        fp.setDate( SetTwoYears );
    });

});