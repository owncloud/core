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
  var FilesPage = require('../pages/files.page.js');
  var path = require('path');
  
  var Uploader = function() {

  };

  Uploader.prototype.upload = function(pathToFile) {
    var filesPage = new FilesPage();
    var fileToUpload = 'upload_folder/' + pathToFile; // path to file you want to upload
    var absolutePath = path.resolve(__dirname, fileToUpload);

    console.log(absolutePath);
    filesPage.uploadButton.sendKeys(absolutePath);
    browser.sleep(3000);
  };

  module.exports = Uploader;
})();
