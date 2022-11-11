require('./bootstrap');

import * as $ from 'jquery';
window.$ = window.jQuery = $;

require('datatables.net-bs4');

import Swal from 'sweetalert2'
// import 'sweetalert2/src/sweetalert2.scss'
window.Swal = Swal;

import select2 from 'select2'
import 'select2/dist/css/select2.min.css'
window.select2 = select2;

require('./car');
require('./officer');
require('./user');
require('./roster');