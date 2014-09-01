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
var ShareApi = require('../pages/share_api.page.js');
var flow = protractor.promise.controlFlow();

// ============================ RESTORE FOLDERS ====================================================== //
// =================================================================================================== //

describe('Restore Folders', function() {
  var params = browser.params;
  var filesPage;
  
  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    filesPage.getAsUser(params.login.user, params.login.password);
  });


  it('should restore a emtpy folder that has been deleted', function() {
    filesPage.createFolder('Empty');
    filesPage.deleteFolder('Empty');
    filesPage.openTrashbin();
    filesPage.restoreFolder(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('Empty');
    filesPage.deleteFolder('Empty');
  });
  
  it('should restore a folder including special characters', function() {
    filesPage.createFolder('Sp€c!@l FölD€r');
    filesPage.deleteFolder('Sp€c!@l FölD€r');
    filesPage.openTrashbin();
    filesPage.restoreFolder(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('Sp€c!@l FölD€r');
    filesPage.deleteFolder('Sp€c!@l FölD€r');
  });

it('should restore a non empty folder that has been deleted', function() {
    filesPage.createFolder('nonEmpty');
    filesPage.createSubFolder('nonEmpty', 'Subfolder');
    filesPage.createTxtFile('TextFile');
    filesPage.get();
    filesPage.deleteFolder('nonEmpty');
    filesPage.openTrashbin();
    filesPage.restoreFolder(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('nonEmpty');
  });

  it('should restore a folder with a name, that is currently in use', function() {
    
    // create and delete non empty folder
    filesPage.createFolder('sameFolderName');
    filesPage.deleteFolder('sameFolderName');
    filesPage.createFolder('sameFolderName');
    filesPage.openTrashbin();
    filesPage.restoreFolder(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('sameFolderName (Wiederhergestellt)'); //for german ownclouds
    filesPage.deleteFolder('sameFolderName');
    filesPage.deleteFolder('sameFolderName (Wiederhergestellt)');
  });

  it('should restore a sub folder when the root folder has been deleted separately', function() {
    filesPage.getSubFolder('nonEmpty', 'Subfolder');
    filesPage.createTxtFile('IsInSub');
    filesPage.getFolder('nonEmpty');
    filesPage.deleteFolder('Subfolder');
    filesPage.get()
    filesPage.deleteFolder('nonEmpty');
    filesPage.openTrashbin();
    filesPage.restoreFolder(1);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('Subfolder');
    filesPage.deleteFolder('Subfolder');
  });
});


// ============================ RESTORE FILES ======================================================== //
// =================================================================================================== //

describe('Restore Files', function() {
  var params = browser.params;
  var filesPage;
  var shareApi;
  
  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    shareApi = new ShareApi(params.baseUrl);
    filesPage.getAsUser(params.login.user, params.login.password);
  });

  it('should restore a file thas has been deleted', function() {
    filesPage.createTxtFile('restoreMe');
    filesPage.deleteFile('restoreMe.txt');
    filesPage.openTrashbin();
    filesPage.restoreFile(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('restoreMe');
    filesPage.deleteFile('restoreMe.txt');
  });

  it('should restore a file including special characters', function() {
    filesPage.createTxtFile('Sp€c!@L RésTör€');
    filesPage.deleteFile('Sp€c!@L RésTör€.txt');
    filesPage.openTrashbin();
    filesPage.restoreFile(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('Sp€c!@L RésTör€');
    filesPage.deleteFile('Sp€c!@L RésTör€.txt');
  });

  it('should restore a file whose name is currently in use', function() {
    filesPage.createTxtFile('sameFileName');
    filesPage.deleteFile('sameFileName.txt');
    filesPage.createTxtFile('sameFileName');
    filesPage.openTrashbin();
    filesPage.restoreFile(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('sameFileName (Wiederhergestellt)'); //for german ownclouds
    filesPage.deleteFile('sameFileName.txt');
    filesPage.deleteFile('sameFileName (Wiederhergestellt).txt');
  });

  it('should restore a shared file and it stays shared', function() {
    var createFile = function() {
      filesPage.createTxtFile('restoredShared');
    };

    var createShare = function() {
      shareApi.create('restoredShared.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    filesPage.deleteFile('restoredShared.txt');
    browser.sleep(800);
    filesPage.openTrashbin();
    filesPage.restoreFile(0);
    filesPage.get();
    expect(filesPage.listFiles()).toContain('restoredShared');
    filesPage.deleteFile('restoredShared.txt');
  });
});