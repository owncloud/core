var LoginPage = require('../pages/login.page.js');
var FilesPage = require('../pages/files.page.js');
var Uploader = require('../helper/uploader.js');

describe('Upload', function() {
  var params = browser.params;
  var filesPage;
  var uploader;

  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    uploader = new Uploader();
    filesPage.getAsUser(params.login.user, params.login.password);
  });

  it('should upload a file', function() {
    // TODO: Upload not working 
    uploader.upload('test.txt');

    // filesPage.uploadButton.sendKeys('aaa');

    // filesPage.uploadButton.sendKeys();
  });

});