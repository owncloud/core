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

  var UserPage = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.path = 'index.php/settings/users';
    this.url = baseUrl + this.path;

//================ ELEMENTS ============================================================//
//======================================================================================//
    
    // new user
    this.newUserNameInput = element(by.id('newusername'));
    this.newUserPasswordInput = element(by.id('newuserpassword'));
    this.createNewUserButton = element(by.css('#newuser input[type="submit"]')); 

    // new group
    this.newGroupButton = element(by.css('#newgroup-init a'));
    this.newGroupNameInput = element(by.css('#newgroup-form input#newgroupname'));

    // filter
    this.userFilter = element(by.css('.userFilter'));

    // warning
    this.warningDialog = element(by.css('.oc-dialog'));
  };

// ================ LOCATORS ==================================================================== //
// ============================================================================================== //

  UserPage.prototype.renameDisplayNameButtonId = function(userName) {
    return by.css("tr[data-uid='" + userName + "'] td.displayName");
  };

  UserPage.prototype.renameDisplayNameFormId = function(userName) {
    return by.css("tr[data-uid='" + userName + "'] td.displayName input");
  };

  UserPage.prototype.userPassButtonId = function(userName) {
    return by.css('#userlist tr[data-uid="' + userName + '"] td.password');
  };

  UserPage.prototype.userPassFormId = function(userName) {
    return by.css('#userlist tr[data-uid="' + userName + '"] td.password input');
  };
  
  UserPage.prototype.removeUserButtonId = function(userName) {
    return by.css('#userlist tr[data-uid="' + userName + '"] td.remove a');
  };

// ================ NAVIGATIONS ================================================================= //
// ============================================================================================== //
  
  /**
  * logs in as User and loads userpage.
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  UserPage.prototype.getAsUser = function(userName, pass) { 
    var Page = require('../helper/page.js')
    var filter = this.userFilter;
    
    Page.getAsUser(userName, pass, this.url);
    
    return browser.wait(function() {
      return filter.isDisplayed();
    }, browser.params.wait, 'load files content');
  };

  /**
  * loads userpage.
  */  

  UserPage.prototype.get = function() {
    browser.get(this.url);
  };

  /**
  * checks if current page is userpage
  */ 
  
  UserPage.prototype.isUserPage = function() {
    return browser.driver.getCurrentUrl() == this.url;
  };

// ================ NEW USER ==================================================================== //
// ============================================================================================== //
  
  /**
  * fills out new user input, used in createNewUser function
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  UserPage.prototype.fillNewUserInput = function(userName, pass) {
    var userPassInput = this.newUserPasswordInput;
    return this.newUserNameInput.sendKeys(userName).then(function() {
      return userPassInput.sendKeys(pass);
    });
  };
    
  /**
  * creates new user
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  UserPage.prototype.createNewUser = function(userName, pass) {
    var button = this.createNewUserButton;
    return this.fillNewUserInput(userName, pass).then(function() {
      return button.click();
    });
  };

// ================ DELETE ====================================================================== //
// ============================================================================================== //
  
  /**
  * deletes a user
  *
  * @param {String} userName username
  */

  UserPage.prototype.deleteUser = function(userName) {
    var deleteButton = element(this.removeUserButtonId(userName));

    Page.moveMouseTo(this.removeUserButtonId(userName));
    deleteButton.click();
  };

// ================ UPADTE USER ================================================================= //
// ============================================================================================== //
    
  /**
  * change users password
  *
  * @param {String} userName username
  * @param {String} pass user's new password
  */

  UserPage.prototype.changeUserPass = function(userName, pass) {
    var passForm = element(this.userPassFormId(userName));

    element(this.userPassButtonId(userName)).click().then(function() {
      passForm.sendKeys(pass);
      passForm.sendKeys(protractor.Key.ENTER);
    });
  }
    
  /**
  * renames a user's displayname
  *
  * @param {String} userName username
  * @param {String} newDisplayName new displayname
  */

  UserPage.prototype.renameDisplayName = function(userName, newDisplayName) {
    var renameDisplayNameButton = element(this.renameDisplayNameButtonId(userName));
    renameDisplayNameButton.click();
    var renameDisplayNameForm = element(this.renameDisplayNameFormId(userName));
    // TODO: Workaround, fixme
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);
    renameDisplayNameForm.sendKeys(protractor.Key.DELETE);

    renameDisplayNameForm.sendKeys(newDisplayName);
    renameDisplayNameForm.sendKeys(protractor.Key.ENTER);
  };

//================ USERSLIST ===========================================================//
//======================================================================================//

  /**
  * returns an array of usernames
  */

  UserPage.prototype.listUser = function() {
    // Scroll down one time. TODO: as long as needed to load the users needed

    var scrollIntoView = function () {
      var el = document.getElementById(arguments[0]);
      if (el)
        el.scrollIntoView();
    }
    browser.executeScript(scrollIntoView, '.loading');

    return element.all(by.css('td.displayName')).map(function(user) {
      return user.getText();
    });
  };
  
// ================ NEW GROUP =================================================================== //
// ============================================================================================== //
    
  /**
  * creates a new usergroup
  *
  * @param {String} groupName groupname
  */

  UserPage.prototype.createNewGroup = function(groupName) {
    this.newGroupButton.click();
    var newGroupNameInput = this.newGroupNameInput;
    browser.wait(function() {
      return newGroupNameInput.isDisplayed();
    }, 3000);
    this.newGroupNameInput.sendKeys(groupName);
    this.newGroupNameInput.sendKeys(protractor.Key.ENTER);
  };

      
  /**
  * sets user to a group
  *
  * @param {String} userName username
  * @param {String} groupName groupname
  */

  // TODO: solve problem: click on checkbox reseives an other element

  // UserPage.prototype.setUserGroup = function(userName, groupName) {
  //   var renameDisplayNameButton = element(by.css("tr[data-uid='" + userName + "'] td.groups .multiselect.button"));
  //   renameDisplayNameButton.click();

  //   var a = 'tr[data-uid="' + userName + '"] ul.multiselectoptions.down';

  //   var dropdown = element(by.css(a));
  //   browser.wait(function() {
  //     return dropdown.isDisplayed();
  //   }, 3000);
  //   browser.pause();
  //   var checkboxId = by.css('tr[data-uid="' + userName + '"] ul.multiselectoptions.down label');
  //   element.all(checkboxId).each(function(checkbox) {
  //     checkbox.getText().then(function(text) {
  //       console.log(checkboxId);
  //       console.log(text);
  //       if(text == groupName) {
  //         return checkbox.click();
  //       }
  //     })
  //   });
  // };

  module.exports = UserPage;
})();