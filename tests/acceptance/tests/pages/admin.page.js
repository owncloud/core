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
  var Page = require('../helper/page.js');
  var LoginPage = require('../pages/login.page.js');

  var AdminPage = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.path = 'index.php/settings/admin';
    this.url = baseUrl + this.path;

//================ ELEMENTS ============================================================//
//======================================================================================//

    this.submitFilesSettings = element(by.id('submitFilesAdminSettings'));
    this.shareAPIEnabledCheckBox = element(by.id('shareAPIEnabled'));
    this.allowLinksCheckBox = element(by.id('allowLinks'));
    this.allowResharingCheckBox = element(by.id('allowResharing'));
    this.enforceLinkPasswordCheckBox = element(by.id('enforceLinkPassword'));
  };


//================ NAVAGATION ==========================================================//
//======================================================================================//

  /**
  * logs in as User and loads the admin settings.
  *
  * @param {String} userName username (must have admin rights)
  * @param {String} pass user's password
  */

  AdminPage.prototype.getAsUser = function(userName, pass) {
    var Page = require('../helper/page.js')
    var submit = this.submitFilesSettings;
    
    // general function
    Page.getAsUser(userName, pass, this.url);
    
    // wait for adminpage to load
    return browser.wait(function() {
      return submit.isDisplayed();
    }, 5000, 'load admin content');
  };

  /**
  * loads the adminpage
  */

  AdminPage.prototype.get = function() {
    browser.get(this.url);

    var submit = this.submitFilesSettings;
    browser.wait(function() {
      return submit.isDisplayed();
    }, 5000, 'load admin content');
  };

//================ ACTIVATE / DISABLE OPTIONS ==========================================//
//======================================================================================//

  /**
  * activates a admin option.
  *
  * @param {Oject} checkbox prtractor element instance of a checkbox
  */

  AdminPage.prototype.activateOption = function(checkbox) {
    var checkbox = checkbox;

    checkbox.getAttribute('checked').then(function(checked) {
      if(checked == null) {
        checkbox.click();
      };
    });
  };

  /**
  * disables a admin option.
  *
  * @param {Oject} checkbox prtractor element instance of a checkbox
  */

  AdminPage.prototype.disableOption = function(checkbox) {
    var checkbox = checkbox
    
    checkbox.getAttribute('checked').then(function(checked) {
      if(checked == "true") {
        checkbox.click();
      };
    });
  };

  module.exports = AdminPage;
})();