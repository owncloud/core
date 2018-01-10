var $ = require('jquery');
window.jQuery = $;
window.$ = $;

require("jquery-ui");
require("jquery-migrate");

var _ = require('underscore');
window._ = _;

var handlebars = require('handlebars/dist/handlebars');
window.Handlebars = handlebars;

var backbone = require('backbone');
window.Backbone = backbone;

require('select2');

var moment = require('moment');
window.moment = moment;

var snap = require('snapjs/dist/latest/snap');
window.Snap = snap.Snap;

require('davclient.js/lib/client');
window.dav = dav;

var md5 = require('blueimp-md5');
window.md5 = md5;

require('bootstrap/js/tooltip');
require('strengthify/jquery.strengthify');

var jstz = require('jstimezonedetect');
window.jstz = jstz;

require('jcrop');
var clipboard = require('clipboard');
window.Clipboard = clipboard;

require('es6-promise/dist/es6-promise.auto');

var bowser = require('bowser');
window.bowser = bowser;
