import './styles/app.scss';
import './bootstrap';

const $ = require('jquery');
require('bootstrap');


$(document).ready(function() {
// you may need to change this code if you are not using Bootstrap Datepicker
$('.js-datepicker').datepicker({
    format: 'yyyy-mm-dd'
});
});
