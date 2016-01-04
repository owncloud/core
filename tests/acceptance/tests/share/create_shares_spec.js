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

describe('Create shares', function() {
  var params = browser.params;
  var userPage;
  var filesPage;

  beforeEach(function() {
    isAngularSite(false);
    userPage = new UserPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
  });

  it('setup', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'password');
    userPage.createNewUser('demo2', 'password');
    userPage.createNewUser('demo3', 'password');
    userPage.createNewUser('demo4', 'password');
    userPage.get();
    userPage.renameDisplayName('demo2', ' display2');
    userPage.renameDisplayName('demo3', ' display3');
    userPage.renameDisplayName('demo4', ' display4');
    expect(userPage.listUser()).toContain('demo', 'demo2', 'demo3', 'demo4');
  });


  it('should share a folder with another user by username', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createFolder('toShare_1');
    browser.sleep(500);
    filesPage.shareFile('toShare_1', 'demo');

    filesPage.getAsUser('demo', 'password');
    expect(filesPage.listFiles()).toContain('toShare_1');
  });

  it('should share a folder including special characters', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createFolder('sP€c!@L');
    browser.sleep(500);
    filesPage.shareFile('sP€c!@L', 'demo');

    filesPage.getAsUser('demo', 'password');
    expect(filesPage.listFiles()).toContain('sP€c!@L');
  });

  it('should share a folder with 3 another user by display name', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createFolder('toShare_2');
    browser.sleep(500);
    filesPage.shareFile('toShare_2', 'display2');

    filesPage.shareWithForm.sendKeys(protractor.Key.DELETE);
    filesPage.shareWithForm.sendKeys('display3');
    browser.wait(function(){
      return filesPage.sharedWithDropdown.isDisplayed();
    }, 3000);
    filesPage.shareWithForm.sendKeys(protractor.Key.ENTER);

    filesPage.shareWithForm.sendKeys(protractor.Key.DELETE);
    filesPage.shareWithForm.sendKeys('display4');
    browser.wait(function(){
      return filesPage.sharedWithDropdown.isDisplayed();
    }, 3000);
    filesPage.shareWithForm.sendKeys(protractor.Key.ENTER);

    filesPage.getAsUser('demo4', 'password');
    expect(filesPage.listFiles()).toContain('toShare_2');

    filesPage.getAsUser('demo3', 'password');
    expect(filesPage.listFiles()).toContain('toShare_2');

    filesPage.getAsUser('demo2', 'password');
    expect(filesPage.listFiles()).toContain('toShare_2');
  });

  it('clean up', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFolder('sP€c!@L').then(function(){
      filesPage.deleteFolder('toShare_1').then(function(){
        filesPage.deleteFolder('toShare_2');  
      });      
    });

    filesPage.get();
    expect(filesPage.listFiles()).not.toContain('toShare_2');

    userPage.get();
    userPage.deleteUser('demo');
    userPage.deleteUser('demo2');
    userPage.deleteUser('demo3');
    userPage.deleteUser('demo4');
    userPage.get(); // delete last user 
    expect(userPage.listUser()).not.toContain('demo', 'demo2', 'demo3', 'demo4');
  });
});