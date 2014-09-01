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

describe('Admin configs Share', function() {
  var params = browser.params;
  var userPage
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

  it('should not be possible to share via link, if admin disabled this option', function() {
    adminPage.getAsUser(params.login.user, params.login.password);
    adminPage.disableOption(adminPage.allowLinksCheckBox);
    filesPage.get();
    filesPage.createTxtFile('noLinks');
    filesPage.openShareForm('noLinks.txt');
    expect(filesPage.shareLinkCheckBox.isPresent()).toBeFalsy();
    filesPage.deleteFile('noLinks.txt');
    adminPage.get();
    adminPage.activateOption(adminPage.allowLinksCheckBox);
  });

  it('should not be possible to reshare, if admin disabled this option', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    
    var createFile = function() {
      filesPage.createTxtFile('disabledReshare');
    };

    var createShare = function() {
      shareApi.create('disabledReshare.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    adminPage.getAsUser(params.login.user, params.login.password);
    adminPage.disableOption(adminPage.allowResharingCheckBox);

    filesPage.getAsUser('demo', 'password');
    expect(filesPage.checkReshareability('disabledReshare.txt')).toBeFalsy();
    adminPage.getAsUser(params.login.user, params.login.password);
    adminPage.activateOption(adminPage.allowResharingCheckBox);
  });

  // test fails in owncloud 7 
  it('should show "can share" option, when admin disabled reshare option', function() {
    // filesPage.getAsUser(params.login.user, params.login.password);
    // filesPage.openShareForm('disabledReshare.txt');
    //
    // element(filesPage.disableReshareButtonId('demo')).isPresent().then(function(pres){
    //   console.log("present: ", pres);
    // });
    // element(filesPage.disableReshareButtonId('demo')).isDisplayed().then(function(pres){
    //   console.log("displayed: ", pres);
    // });
    //
    // expect(element(filesPage.disableReshareButtonId('demo')).isPresent()).toBeFalsy();
  });

  it('should enforce a password, when sharing a file via link, if admin wishes', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    
    filesPage.createTxtFile('enforceLinkPass');

    adminPage.get();
    adminPage.activateOption(adminPage.enforceLinkPasswordCheckBox);
    filesPage.get();
    filesPage.openShareForm('enforceLinkPass.txt');
    filesPage.shareLinkCheckBox.click();
    browser.sleep(500);
    expect(filesPage.shareLinkPassText.isDisplayed()).toBeTruthy();

    adminPage.get();
    adminPage.disableOption(adminPage.enforceLinkPasswordCheckBox);
  });

  it('should disable all share options, if admin turned off sharing', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createTxtFile('noSharesAtAll')

    adminPage.get();
    adminPage.disableOption(adminPage.shareAPIEnabledCheckBox);

    filesPage.get();
    Page.moveMouseTo(filesPage.fileListElemId('noSharesAtAll.txt'));

    expect(element(filesPage.shareButtonId('noSharesAtAll.txt')).isPresent()).toBeFalsy();

    adminPage.get();
    adminPage.activateOption(adminPage.shareAPIEnabledCheckBox);
  });

  it('clean up', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFile('disabledReshare.txt').then(function(){
      filesPage.deleteFile('enforceLinkPass.txt').then(function(){
        filesPage.deleteFile('noSharesAtAll.txt');      
      });      
    });

    filesPage.get();
    expect(filesPage.listFiles()).not.toContain('noSharesAtAll');

    userPage.get();
    userPage.deleteUser('demo');
    userPage.get(); // nessesary to delete last user 
    expect(userPage.listUser()).not.toContain('demo');
  });
});