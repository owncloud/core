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
  var LoginPage = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.url = baseUrl;

//================ ELEMENTS ============================================================//
//======================================================================================//
    
    this.loginForm = element(by.name('login'));
    this.userInput = this.loginForm.element(by.id('user'));
    this.passwordInput = this.loginForm.element(by.id('password'));
    this.loginButton = element(by.id('submit')); 
    
    // On Page when logged in     
    this.menuButton = element(by.id('expand'));
    this.logoutButton = element(by.id('logout'));
    this.newButton = element(by.id('expandDisplayName'));
  };
  
//================ NAVIGATION ==========================================================//
//======================================================================================//

  /**
  * loads loginpage.
  */

  LoginPage.prototype.get = function() {
    return browser.get(this.url);
  };
  
  /**
  * checks if current page is loginpage.
  */

  LoginPage.prototype.isCurrentPage = function() {
    return this.loginForm.isPresent();
  };
    
//================ NAVIGATION ==========================================================//
//======================================================================================//
  
  /**
  * fills out lgin form
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  LoginPage.prototype.fillUserCredentilas = function(userName, pass) {
    this.userInput.sendKeys(userName);
    this.passwordInput.sendKeys(pass);
  };
    
  /**
  * logs in a user
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  LoginPage.prototype.login = function(userName, pass) {
    this.fillUserCredentilas(userName, pass);
    this.loginButton.click();
    var button = this.newButton;
    return browser.wait(function() {
      return button.isPresent();
    }, browser.params.wait, 'login wait expired - try to raise timeout with params.wait ');
  };
      
  /**
  * logs out current user
  */

  LoginPage.prototype.logout = function() {
    this.menuButton.click();
    this.logoutButton.click();
  };
  
  module.exports = LoginPage;
})();