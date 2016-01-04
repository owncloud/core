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

// ============================ SEARCH =============================================================== //
// =================================================================================================== //

describe('Search', function() {
  var params = browser.params;
  var filesPage;
  
  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    filesPage.getAsUser(params.login.user, params.login.password);
  });

  it('setup', function() {
    filesPage.createTxtFile('searchFile');
    filesPage.createFolder('searchFolder');

    expect(filesPage.listFiles()).toContain('searchFile', 'searchFolder');
  });

  it('should search files by name', function() {
    filesPage.searchInput.click();
    filesPage.searchInput.sendKeys('search');
    expect(filesPage.listSelctedFiles()).toContain('searchFile', 'searchFolder');
  });
  
  it('clean up', function() {
    filesPage.deleteFile('searchFile.txt');
    filesPage.deleteFolder('searchFolder');
    expect(filesPage.listFiles()).not.toContain('searchFile', 'searchFolder');
  });
});