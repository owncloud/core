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
var UserPage = require('../pages/user.page.js');
var protrac = protractor.getInstance();

describe('Users', function() {
  var params = browser.params;
  var filesPage;
  var userPage;

  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    userPage = new UserPage(params.baseUrl);    
    userPage.getAsUser(params.login.user, params.login.password);
  });

  it('should access settings > users ', function() {
    // TODO: find a locatorfunction for Page.userActionDropdown.isDisplayed()
    // Page.displayName.click();
    // browser.wait(function() {
    //   return page.userActionDropdown.isDisplayed();
    // })
    // page.settingUsers.click();

    protrac.getCurrentUrl().then(function(url) {
      expect(userPage.url).toEqual(url);
    });
  });

  it('should login as admin and create a new user ', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'demo');
    userPage.get();
    expect(userPage.listUser()).toContain('demo');
  });
  
  it('should login with a new user', function() {    
    filesPage.getAsUser('demo', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login as admin and delete new user', function() {    
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.deleteUser('demo');
    userPage.get();
    expect(userPage.listUser()).not.toContain('demo');
  });

  it('should create 15 users with password', function() {
    userPage.createNewUser('demo01', 'password');
    userPage.createNewUser('demo02', 'password');
    userPage.createNewUser('demo03', 'password');
    userPage.createNewUser('demo04', 'password');
    userPage.createNewUser('demo05', 'password');
    userPage.createNewUser('demo06', 'password');
    userPage.createNewUser('demo07', 'password');
    userPage.createNewUser('demo08', 'password');
    userPage.createNewUser('demo09', 'password');
    userPage.createNewUser('demo10', 'password');
    userPage.createNewUser('demo11', 'password');
    userPage.createNewUser('demo12', 'password');
    userPage.createNewUser('demo13', 'password');
    userPage.createNewUser('demo14', 'password');
    userPage.createNewUser('demo15', 'password');

    expect(userPage.listUser()).toContain(
      'demo01', 'demo02', 'demo03', 'demo04', 'demo05', 
      'demo06', 'demo07', 'demo08', 'demo09', 'demo10',
      'demo11', 'demo12', 'demo13', 'demo14', 'demo15'
    );

    userPage.get();
    userPage.deleteUser('demo04');
    userPage.deleteUser('demo05');
    userPage.deleteUser('demo06');
    userPage.deleteUser('demo07');
    userPage.deleteUser('demo08');
    userPage.deleteUser('demo09');
    userPage.deleteUser('demo10');
    userPage.deleteUser('demo11');
    userPage.deleteUser('demo12');
    userPage.deleteUser('demo13');
    userPage.deleteUser('demo14');
    userPage.deleteUser('demo15');

    userPage.get();
    expect(userPage.listUser()).not.toContain(
      'demo04', 'demo05', 
      'demo06', 'demo07', 'demo08', 'demo09', 'demo10',
      'demo11', 'demo12', 'demo13', 'demo14', 'demo15'
    );
  }); 

  it('should change displayname', function() {
    userPage.renameDisplayName('demo01', 'Cevin Clever');
    filesPage.getAsUser('demo01', 'password');
    element(Page.displayNameId()).getText().then(function(displayName) {
      expect(displayName).toEqual('Cevin Clever');
    });
  });

  it('should filter users', function() {
    userPage.userFilter.sendKeys('lev');
    browser.sleep(1000);
    expect(userPage.listUser()).toContain('Cevin Clever');  
  });

  it('should show warning, if create a user that allready exists', function() {
    userPage.createNewUser('demo01', 'password');
    browser.wait(function() {
      return userPage.warningDialog.isPresent();
    });
    expect(userPage.warningDialog.isDisplayed()).toBeTruthy();
  });

  it('should change password for users as admin', function() {
    userPage.changeUserPass('demo01', 'changedPass');
    filesPage.getAsUser('demo01', 'changedPass');
    protrac.getCurrentUrl().then(function(url) {
      expect(filesPage.url).toEqual(url);
    });
  });

  it('clean up', function() {
    userPage.deleteUser('demo01');
    userPage.deleteUser('demo02');
    userPage.deleteUser('demo03');
    userPage.get(); // nessesary to delete last user
  });
});