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
  var LoginPage = require('../pages/login.page.js');
  var params = browser.params;

	var Page = function() {

	};

	Page.prototype.moveMouseTo = function(locator) {
		var ele = element(locator);
		return browser.actions().mouseMove(ele).perform();
	};

	Page.toggleAppsMenu = function() {
		var el = element(this.appsMenuId());
		return el.click();
	};

	Page.logout = function() {
		element(Page.settingsMenuId()).click();
		element(by.id('logout')).click();
		browser.sleep(300);
	};

	//================ LOCATOR FUNCTIONS ====================================//
	Page.appsMenuId = function() {
		return by.css('#header .menutoggle');
	};

	Page.appMenuEntryId = function(appId) {
		return by.css('nav #apps [data-id=\'' + appId + '\']');
	};

	Page.settingsMenuId = function() {
		return by.css('#header #settings');
	};

	//================ UTILITY FUNCTIONS ====================================//

	/**
	 * Sets the selection of a multiselect element
	 *
	 * @param el select element of the multiselect
	 * @param {Array} id of the values to select
	 */
  Page.multiSelectSetSelection = function(el, selection) {
    var d = protractor.promise.defer();
    var dropDownEl = element(by.css('.multiselectoptions.down'));

    el.click();

    function processEntry(entry) {
      entry.isSelected().then(function(selected) {
        entry.getAttribute('id').then(function(inputId) {
          // format is "ms0-option-theid", we extract that id
          var dataId = inputId.split('-')[2];
          var mustBeSelected = selection.indexOf(dataId) >= 0;
          // if state doesn't match what we want, toggle

          if (selected !== mustBeSelected) {
            // need to click on the label, not input
            entry.element(by.xpath('following-sibling::label')).click();
            // confirm that the checkbox was set
            browser.wait(function() {
              return entry.isSelected().then(function(newSelection) {
                return newSelection === mustBeSelected;
              });
            });
          }
        });
      });
    }

    browser.wait(function() {
      return dropDownEl.isPresent();
    }, 1000).then(function() {
      dropDownEl.all(by.css('[type=checkbox]')).then(function(entries) {
        for (var i = 0; i < entries.length; i++) {
          processEntry(entries[i]);
        }
        // give it some time to save changes
        browser.sleep(300).then(function() {
          d.fulfill(true);
        });
      });
    });

    return d.promise;
  };


//================ LOCATOR FUNCTIONS ===================================================//
//======================================================================================//

  // topbar
  Page.displayNameId = function() {
   return by.id("expandDisplayName");
  } 
  
  Page.userActionDropdownId = function() {
   return by.id('expanddiv');
  } 
  
  // Page.settingUsersId = function() {
  //  return by.css("a[href='" +  params.baseUrl + "settings/users']");
  // } 

  // Page.settingPersonalId = function() {
  //  return by.css("a[href='" +  params.baseUrl + "settings/personal']");
  // } 

//================ PAGE NAVIGATION =====================================================//
//======================================================================================//

  
  /**
  * checks if user is logged in, 
  * if yes, returns name of user is currently logged in 
  * if not, returns false,
  *
  */

  Page.isLoggedIn = function() {
    displayName = element(this.displayNameId());

    return displayName.isPresent().then(function(isLoggedIn) {
      if(isLoggedIn) {
        return displayName.getText().then(function(text){
          return text
        });
      } else {
        return false
      }
    });
  }

  /**
  * checks if specific user is logged in, 
  * if not logs out and logs in with specific user and gets specific page
  * is used in pages to build specific *page.getAsUser functions 
  *
  * @param {String} userName username
  * @param {String} pass user's password
  * @param {String} [url] default filespage / page's url to get 
  */

  Page.getAsUser = function(userName, pass, url) { 
    if(url == undefined) {
      url = params.baseUrl;
    };

    return this.isLoggedIn().then(function(isLoggedIn) {
      var loginPage = new LoginPage(params.baseUrl);

      if( isLoggedIn !== userName) {
        if(isLoggedIn !== false) {
          loginPage.logout(); 
        };
        return loginPage.get().then(function() {
          return loginPage.login(userName, pass).then(function() {
            return browser.get(url);
          });
        });
      } else {
        return browser.get(url);
      };
    });
  };

//================ MOUSE ACTIONS =======================================================//
//======================================================================================//

  /**
  * mouves mouse to a specific page element
  *
  * @param {String} locator element's locator mouse is mouved to
  */

  Page.moveMouseTo = function(locator) {
    var elem = element(locator);
    browser.actions().mouseMove(elem).perform();
    return browser.wait(function() {
      // works just for td elements at the moment
      return element(by.css('td:hover')).isDisplayed();
    });
  };

  /**
  * drags and drops an page element on an other element 
  *
  * @param {String} locator1 element's locator gets draged
  * @param {String} locator2 element's locator gets droped on
  */

  Page.dragAndDrop = function (locator1, locator2) {
    this.moveMouseTo(locator1);
    browser.actions().mouseDown().perform();
    // can't use mouveMouseTo function cause element the draged element get's droped on don't hover
    var elem = element(locator2);
    browser.actions().mouseMove(elem).perform(); 
    browser.actions().mouseUp().perform();
  };

	module.exports = Page;
})();
