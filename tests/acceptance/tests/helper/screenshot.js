/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */
 
(function() {

  var fs = require('fs');
  
  var Screenshot = function(data, filename) {
    this.screenshotPath = __dirname + '/../../screenshots/';
    
    display.log('Created screenshot: ' + filename);
    var stream = fs.createWriteStream(this.screenshotPath + filename);

    stream.write(new Buffer(data, 'base64'));
    stream.end();
  };

  module.exports = Screenshot;
})();