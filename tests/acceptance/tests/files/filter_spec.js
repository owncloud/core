/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

var Page = require('../helper/page.js');
var LoginPage = require('../pages/login.page.js');
var FilesPage = require('../pages/files.page.js');
var UserPage = require('../pages/user.page.js');
var ShareApi = require('../pages/share_api.page.js');
var flow = protractor.promise.controlFlow();

//================ FILTERS =============================================================//
//======================================================================================//

describe('Filter', function() {
  var params = browser.params;
  var logninPage;
  var filesPage;
  var userPage;
  var shareApi;
  
  beforeEach(function() {
    isAngularSite(false);
    loginPage = new LoginPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
    userPage = new UserPage(params.baseUrl);
    shareApi = new ShareApi(params.baseUrl);
  });

  it('setup', function() {
    userPage.getAsUser(params.login.user, params.login.password, userPage.url);
    userPage.createNewUser('demo', 'password');

    filesPage.get();

    var create = function() {
      filesPage.createFolder('sharedFolder');
      filesPage.createTxtFile('sharedFile');
      filesPage.createTxtFile('sharedFile2');
    };

    var share = function() {
      shareApi.create('sharedFolder', 'demo', 0);
      shareApi.create('sharedFile.txt', 'demo', 0);
      shareApi.create('sharedFile2.txt', 'demo', 0);
    };
    
    flow.execute(create);
    flow.execute(share);

    expect(filesPage.listFiles()).toContain('sharedFolder', 'sharedFile', 'sharedFile2');
    loginPage.logout(); 
  });

  it('should show files shared with you', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.filterSharedWhithYou.click();
    browser.wait(function() {
      return filesPage.listFiles();
    });
    expect(filesPage.listFiles()).toContain('sharedFolder', 'sharedFile', 'sharedFile2');
    loginPage.logout();
  });

  it('should show files shared with others', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.filterSharedWhithOthers.click();
    expect(filesPage.listFiles()).toContain('sharedFolder', 'sharedFile', 'sharedFile2');
  });

  it('should show all files', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.filterAllFiles.click();
    expect(filesPage.listFiles()).toContain('sharedFolder', 'sharedFile', 'sharedFile2');
  });

  it('clean up', function() {
    userPage.getAsUser(params.login.user, params.login.password)
    userPage.deleteUser('demo');
    expect(userPage.listUser()).not.toContain('demo');
    
    filesPage.getAsUser(params.login.user, params.login.password).then(function() {
      filesPage.deleteFile('sharedFile.txt').then(function(){
        filesPage.deleteFile('sharedFile2.txt').then(function(){
          filesPage.deleteFolder('sharedFolder');          
        });
      });
    });
  });
});