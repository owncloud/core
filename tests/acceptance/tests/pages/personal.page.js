/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global module, protractor, element, by, browser, require */
(function() {  
  var PersonalPage = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.path = 'index.php/settings/personal';
    this.url = baseUrl + this.path;

//================ ELEMENTS ============================================================//
//======================================================================================//
    
    // password form
    this.passwordForm = element(by.css('form#passwordform'));
    this.oldPasswordInput = element(by.id('pass1'));
    this.newPasswordInput = element(by.id('pass2'));
    this.newPasswordButton = element(by.id('passwordbutton'));

    // alerts
    this.passwordChanged = element(by.id('passwordchanged'));
    this.passwordError = element(by.id('passworderror'));

    // displayname form
    this.displaynameForm = element(by.id('displaynameform'));
    this.displaynameInput = this.displaynameForm.element(by.id('displayName'));
  };

//================ NAVIGATION ==========================================================//
//======================================================================================//

  /**
  * logs in as User and loads the personal settings.
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  PersonalPage.prototype.getAsUser = function(userName, pass) {
    var Page = require('../helper/page.js')
    var form = this.passwordForm;
    
    // general function
    Page.getAsUser(userName, pass, this.url);
    
    return browser.wait(function() {
      return form.isDisplayed();
    }, 5000, 'load files content');
  };

  /**
  * loads personal settings page.
  */

  PersonalPage.prototype.get = function() {
    browser.get(this.url);
    var form = this.passwordForm;
    return browser.wait(function() {
      return form.isDisplayed();
    }, 5000, 'load files content');
  };

//================ SETTINGS ============================================================//
//======================================================================================//

  /**
  * chages userpassword
  *
  * @param {String} oldPass old password
  * @param {String} newPass new password
  */

  PersonalPage.prototype.changePassword = function(oldPass, newPass) {
    this.oldPasswordInput.sendKeys(oldPass);
    this.newPasswordInput.sendKeys(newPass);
    this.newPasswordButton.click();

    // result need some time to display
    var changed = this.passwordChanged;
    var error = this.passwordError;   
    var ready = false;
    browser.wait(function () {
      changed.isDisplayed().then(function(c) {
        error.isDisplayed().then(function(e) {
          ready = c || e;
        });
      });
      return ready;
    }, 8000, 'personal password change result not displayed');
  };

  /**
  * chages user's displayname
  *
  * @param {String} newDisplayName new displayname
  */

  PersonalPage.prototype.changeDisplayName = function(newDisplayName) {
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(protractor.Key.BACK_SPACE);
    this.displaynameInput.sendKeys(newDisplayName);
    this.displaynameInput.sendKeys(protractor.Key.ENTER);
  };
  
  module.exports = PersonalPage;
})();