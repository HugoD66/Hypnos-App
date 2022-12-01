import './styles/app.scss';
import './bootstrap';

const $ = require('jquery');
require('bootstrap');

require('bootstrap-datepicker/js/bootstrap-datepicker')
require('bootstrap-datepicker/js/locales/bootstrap-datepicker.fr')
require('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')


/*
$(document).ready(function() {
// you may need to change this code if you are not using Bootstrap Datepicker
$('.js-datepicker').datepicker({
    format: 'yyyy-mm-dd'
});
});
 */


$(function () {
    $('#datetimepicker5').datetimepicker({
        defaultDate: "11/1/2013",
        disabledDates: [
            moment("12/25/2013"),
            new Date(2013, 11 - 1, 21),
            "11/22/2013 00:53"
        ]
    });
});

