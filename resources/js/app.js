require('bootstrap');
require('./script');


window.$=window.jQuery=require('jquery');

document.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;
require ('./adImages');