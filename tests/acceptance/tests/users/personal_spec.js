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
var UserPage = require('../pages/user.page.js');
var FilesPage = require('../pages/files.page.js');
var PersonalPage = require('../pages/personal.page.js');
var protrac = protractor.getInstance();

describe('Personal', function() {
  var params = browser.params;
  var userPage;
  var filesPage;
  var personalPage;

  beforeEach(function() {
    isAngularSite(false);
    filesPage = new FilesPage(params.baseUrl);
    userPage = new UserPage(params.baseUrl);
    personalPage = new PersonalPage(params.baseUrl);
  });

  it('setup',function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo1', 'pass').then(function() {
      browser.sleep(500);
      expect(userPage.listUser()).toContain('demo1');
    });
  });

  it('should have access to personal page', function() {
    personalPage.getAsUser('demo1', 'pass');
    protrac.getCurrentUrl().then(function(url) {
      expect(personalPage.url).toEqual(url);
    });

  });

  it('should change a user password in the personal page', function() {
    personalPage.getAsUser('demo1', 'pass');
    personalPage.changePassword('pass', 'password')

    filesPage.getAsUser('demo1', 'password');
    element(Page.displayNameId()).getText().then(function(displayName) {
      expect(displayName).toEqual('demo1');
    })
  });

  it('should change display name', function() {
    personalPage.getAsUser('demo1', 'password');
    personalPage.changeDisplayName('Sam Sample');
    personalPage.get();

    element(Page.displayNameId()).getText().then(function(displayName) {
      expect(displayName).toEqual('Sam Sample');
    })
  });

  it('clean up',function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.deleteUser('demo1');
    userPage.get();
    expect(userPage.listUser()).not.toContain('demo1');
  });
});