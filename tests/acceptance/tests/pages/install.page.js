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
  var InstallPage = function(baseUrl) {
    this.baseUrl = baseUrl;

//================ ELEMENTS ============================================================//
//======================================================================================//
    
    this.installField = element(by.name('install'));
    this.warningField = element(by.css('.warning'));
    
    this.adminAccount = element(by.id('adminaccount'));
    this.adminInput = this.adminAccount.element(by.id('adminlogin'));
    this.passwordInput = this.adminAccount.element(by.id('adminpass'));
    this.installButton = element(by.css('form .buttons input[type="submit"]'));
  
    this.advancedConfigLink = element(by.id('showAdvanced'));
    this.dataDirectoryConfig = element(by.id('datadirContent'));
    this.dbConfig = element(by.id('databaseBackend'));
  }; 

//================ NAVIGATION ==========================================================//
//======================================================================================//

  InstallPage.prototype.get = function() {
    browser.get(this.baseUrl);
  };
  
  InstallPage.prototype.isInstallPage = function() {
    return !!this.installField;
  };
    
//================ INSTALL =============================================================//
//======================================================================================//
  
  /**
  * fills out admin acount 
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  InstallPage.prototype.fillAdminAccount = function(userName, pass) {
    this.adminInput.sendKeys(userName);
    this.passwordInput.sendKeys(pass);
  };  

  /**
  * checks if advanced config is open 
  */
  
  InstallPage.prototype.isAdvancedConfigOpen = function() {
    return this.databaseBackend.isDisplayed() && this.dbConfig.isDisplayed();
  };
  
  /**
  * opens advanced config if closed
  */

  InstallPage.prototype.openAdvancedConfig = function() {
    if (! this.isAdvancedConfigOpen()) {
      this.advancedConfigLink.click();
    }
  };
  
  /**
  * closes advanced config if open
  */

  InstallPage.prototype.closeAdvancedConfig = function() {
    if (this.isAdvancedConfigOpen()) {
      this.advancedConfigLink.click();
    }
  };
  
  module.exports = InstallPage;
})();