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
var ShareApi = require('../pages/share_api.page.js');
var flow = protractor.promise.controlFlow();
var protrac = protractor.getInstance();

describe('CRUD rights in shared folders', function() {
  var params = browser.params;
  var userPage;
  var filesPage;
  var shareApi;

  beforeEach(function() {
    isAngularSite(false);
    userPage = new UserPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
    shareApi = new ShareApi(params.baseUrl);
  });

  it('setup', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'password');
    userPage.createNewUser('demo2', 'password');
    userPage.get();
    expect(userPage.listUser()).toContain('demo', 'demo2');

    filesPage.get();
    var createFile = function() {
      filesPage.createFolder('sharedFolder')
    };
    var createShare = function() {
      return shareApi.create('sharedFolder', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    expect(filesPage.listFiles()).toContain('sharedFolder');
  });

  it('should have access to shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    protrac.getCurrentUrl().then(function(url) {
      expect(filesPage.folderUrl('sharedFolder')).toEqual(url);
    });
  });

  it('should create file in shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.createTxtFile('inSharedBySecond');
    filesPage.createTxtFile('toBeDeleted');
    expect(filesPage.listFiles()).toContain('inSharedBySecond' ,'toBeDeleted');
  });

  it('should delete file in shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.deleteFile('toBeDeleted.txt');
    browser.sleep(800);
    expect(filesPage.listFiles()).not.toContain('toBeDeleted');
  });

  it('should share file in shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.shareFile('inSharedBySecond.txt', 'demo2');
    filesPage.getAsUser('demo2', 'password');
    expect(filesPage.listFiles()).toContain('inSharedBySecond');
  });

  it('should rename file in shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.renameFile('inSharedBySecond.txt', 'renamedBySecond.txt')
    expect(filesPage.listFiles()).toContain('renamedBySecond');
  });

  it('should edit file in shared folder', function() {
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder');
    filesPage.editTxtFile('renamedBySecond.txt', 'I am an edit of a shared file')
    expect(filesPage.getTextContent()).toEqual('I am an edit of a shared file');
  });

  it('clean up', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFolder('sharedFolder');
    userPage.get();
    userPage.deleteUser('demo');
    userPage.deleteUser('demo2');
    userPage.get(); // delete last user 
    expect(userPage.listUser()).not.toContain('demo', 'demo2');
  });
});