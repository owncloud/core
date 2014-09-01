/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {  
  var FirstRunWizardPage = function(baseUrl) {    
    this.firstRunWizardId = by.id('firstrunwizard');
    this.firstRunWizard = element(this.firstRunWizardId);      
    this.closeLink = element(by.id('cboxOverlay'));
  };
  
  FirstRunWizardPage.prototype.waitForDisplay = function() {
    browser.wait(function() {
      console.log(by.id('closeWizard'));
      return by.id('closeWizard');
      // return by.id('firstrunwizard');
    }, browser.params.wait);
  };
  
  FirstRunWizardPage.prototype.isFirstRunWizardPage = function() {
    this.waitForDisplay();
    return !!this.firstRunWizardId;
  };
  
  FirstRunWizardPage.prototype.waitForClose = function() {
    browser.wait(function () {
      return element(by.id('cboxOverlay')).isDisplayed().then(function(displayed) {
        return !displayed; // Do a little Promise/Boolean dance here, since wait will resolve promises.
      });
    }, browser.params.wait, 'firstrunwizard should dissappear');
  }
  
  FirstRunWizardPage.prototype.close = function() {
    browser.executeScript('$("#closeWizard").click();');
    browser.executeScript('$("#cboxOverlay").click();');
    this.waitForClose();
  };
  
  module.exports = FirstRunWizardPage;
})();