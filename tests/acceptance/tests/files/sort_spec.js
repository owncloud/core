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
var FilesPage = require('../pages/files.page.js');

// ============================ SORT ================================================================= //
// =================================================================================================== //

describe('Sort', function() {
  var params = browser.params;
  var filesPage;
  
  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    filesPage.getAsUser(params.login.user, params.login.password);
  });

  it('setup', function() {
    filesPage.createFolder('0A_start');
    filesPage.createTxtFile('ZZ_end');
  });

  it('should sort files by name', function() {
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("0A_start"))).toBeTruthy;
    filesPage.nameSortArrow.click();
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("ZZ_end.txt"))).toBeTruthy;
  });

  it('should sort files by size', function() {
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("0A_start"))).toBeTruthy;
    filesPage.sizeSortArrow.click();
    //TODO: when uplaod is possible a larg file should be uploaded and should replace music folder in this test
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("music"))).toBeTruthy;
  });

  it('should sort files by modified date', function() {
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("0A_start"))).toBeTruthy;
    filesPage.createTxtFile('newText');
    filesPage.modifiedSortArrow.click();
    expect(filesPage.firstListElem == element(filesPage.fileListElemId("newText.txt"))).toBeTruthy;
  });

  it('clean up', function() {
    filesPage.deleteFolder('0A_start').then(function(){
      filesPage.deleteFile('ZZ_end.txt').then(function(){
        filesPage.deleteFile('newText.txt');  
      });      
    });
    
    filesPage.get();
    expect(filesPage.listFiles()).not.toContain('newText');
    
  });
});