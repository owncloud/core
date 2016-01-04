/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

var Page = require('../helper/page.js')
var LoginPage = require('../pages/login.page.js');
var FilesPage = require('../pages/files.page.js');
var UserPage = require('../pages/user.page.js');
var Screenshot = require('../helper/screenshot.js');

// ============================ TXT FILES ============================================================ //
// =================================================================================================== //

describe('Txt Files', function() {
  var params = browser.params;
  var filesPage;
  var loginPage;
  
  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    loginPage = new LoginPage(params.baseUrl);
  });

  it('should create a new txt file', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('testText');
    expect(filesPage.listFiles()).toContain('testText');
  });

  it('should not create new file if filename already exists', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('testText');
    expect(filesPage.alertWarning.isDisplayed()).toBeTruthy();
  });

  it('should delete a txt file', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFile('testText.txt');
    expect(filesPage.listFiles()).not.toContain('testText')
  });

  it('should delete a shared file only form user', function() {
    var userPage = new UserPage(params.baseUrl);
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'password');

    filesPage.get();
    filesPage.createTxtFile('toDeleteByUser');
    filesPage.shareFile('toDeleteByUser.txt', 'demo');

    loginPage.logout();
    filesPage.getAsUser('demo', 'password');
    filesPage.deleteFile('toDeleteByUser.txt');
    browser.sleep(800);
    expect(filesPage.listFiles()).not.toContain('toDeleteByUser');

    loginPage.logout();
    filesPage.getAsUser(params.login.user, params.login.password).then(function() {
      expect(filesPage.listFiles()).toContain('toDeleteByUser');
      filesPage.deleteFile('toDeleteByUser.txt');
    });
  });

  it('should edit a txt file', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('new');
    filesPage.editTxtFile('new.txt', 'It works');
    expect(filesPage.getTextContent()).toEqual('It works');
    filesPage.get();
    filesPage.deleteFile('new.txt');
  });

});