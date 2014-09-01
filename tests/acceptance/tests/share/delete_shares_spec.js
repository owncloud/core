/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

var UserPage = require('../pages/user.page.js');
var FilesPage = require('../pages/files.page.js');
var AdminPage = require('../pages/admin.page.js');
var Page = require('../helper/page.js');

var ShareApi = require('../pages/share_api.page.js');
var parseXml = require('xml2js').parseString;
var flow = protractor.promise.controlFlow();
var protrac = protractor.getInstance();


describe('Delete shared files and folders', function() {
  var params = browser.params;
  var userPage;
  var filesPage;
  var adminPage;
  var shareApi;

  beforeEach(function() {
    isAngularSite(false);
    userPage = new UserPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
    adminPage = new AdminPage(params.baseUrl);
    shareApi = new ShareApi(params.baseUrl);
  });

  it('setup', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'password');
    browser.sleep(500);
    expect(userPage.listUser()).toContain('demo');
  });

  it('should delete the root folder shared with a user account by another user', function() {
    filesPage.getAsUser(params.login.user, params.login.password);

    var createFile = function() {
      filesPage.createTxtFile('toShare')
    };
    var createShare = function() {
      return shareApi.create('toShare.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    filesPage.deleteFile('toShare.txt');
    browser.sleep(800);
    expect(filesPage.listFiles()).not.toContain('toShare');

    filesPage.getAsUser(params.login.user, params.login.password);
    expect(filesPage.listFiles()).toContain('toShare');
    filesPage.deleteFile('toShare.txt');
  });

  it('should delete a file shared with a user, only form user if user deletes it', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('toDeleteByUser');
    filesPage.shareFile('toDeleteByUser.txt', 'demo');

    filesPage.getAsUser('demo', 'password');
    filesPage.deleteFile('toDeleteByUser.txt');
    browser.sleep(800);
    expect(filesPage.listFiles()).not.toContain('inSharedBySecond');

    filesPage.getAsUser(params.login.user, params.login.password);
    expect(filesPage.listFiles()).toContain('toDeleteByUser');
    filesPage.deleteFile('toDeleteByUser.txt');
  });

  it('should delete a file in a shared folder, from all', function() {
    filesPage.getAsUser(params.login.user, params.login.password);

    var createFile = function() {
      filesPage.createFolder('sharedFolder')    
      filesPage.getFolder('sharedFolder');
      filesPage.createTxtFile('toDeleteFromAll');
    };
    var createShare = function() {
      return shareApi.create('sharedFolder', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.deleteFile('toDeleteFromAll.txt');
    browser.sleep(800);
    expect(filesPage.listFiles()).not.toContain('toDeleteFormAll');

    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.getFolder('sharedFolder');
    expect(filesPage.listFiles()).not.toContain('toDeleteFromAll');
    filesPage.get();
    filesPage.deleteFolder('sharedFolder');
  });

  it('should delete a file shared with a user, form all if owner deletes it', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('toDeleteByOwner');
    filesPage.shareFile('toDeleteByOwner.txt', 'demo');

    filesPage.getAsUser('demo', 'password');
    expect(filesPage.listFiles()).toContain('toDeleteByOwner');

    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFile('toDeleteByOwner.txt');
  
    filesPage.getAsUser('demo', 'password');
    expect(filesPage.listFiles()).not.toContain('toDeleteByOwner');
  });

  it('clean up', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.deleteUser('demo');
    userPage.get(); // delete last user 
    expect(userPage.listUser()).not.toContain('demo');
  });
});