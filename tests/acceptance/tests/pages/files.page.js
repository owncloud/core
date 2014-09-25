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

  var FilesPage = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.path = 'index.php/apps/files/';
    this.url = baseUrl + this.path;

    var url = this.url
    this.folderUrl = function(folder) {
      return url + '?dir=%2F' + folder
    }

//================ ELEMENTS ============================================================//
//======================================================================================//

    // filelist
    this.selectedFileListId = by.css('tr.searchresult td.filename .innernametext');
    this.firstListElem = element(by.css('#fileList tr:first-child'));
    this.emptyContent = element(by.id('emptycontent'))

    // new Button and dropdownlist elements
    this.newButton = element(by.css('#new a'));
    this.newTextButton = element(by.css('li.icon-filetype-text.svg'));
    this.newFolderButton = element(by.css('li.icon-filetype-folder.svg'));
    this.newTextnameForm = element(by.css('li.icon-filetype-text form input'));
    this.newFoldernameForm = element(by.css('li.icon-filetype-folder form input'));

    // alert
    this.alertWarning = element(by.css('.tipsy-inner'));

    // trashbin
    this.trashbinButton = element(by.css('#app-navigation li.nav-trashbin a'));

    // sort arrows
    this.nameSortArrow = element(by.css('a.name.sort'));
    this.sizeSortArrow = element(by.css('a.size.sort'));
    this.modifiedSortArrow = element(by.id('modified'));

    this.searchInput = element(by.id('searchbox'));
    
    // share
    this.shareWithForm = element(by.id('shareWith'));
    this.sharedWithDropdown = element(by.id('ui-id-1'));
    this.shareLinkCheckBox = element(by.id('linkCheckbox'));
    this.shareLinkText = element(by.id('linkText'));
    this.shareLinkPassText = element(by.id('linkPassText'));

    //  edit txt file
    this.textAreaId = by.css('.ace_text-input');
    this.textLineId = by.css('.ace_line');
    this.saveButtonId = by.id('editor_save');

    // upload
    this.uploadButton = element(by.id('file_upload_start'));

    // filter
    this.filterAllFiles = element(by.css('.nav-files'));
    this.filterSharedWhithYou = element(by.css('.nav-sharingin'));
    this.filterSharedWhithOthers = element(by.css('.nav-sharingout'));
  };

//================ LOCATOR FUNCTIONS ===================================================//
//======================================================================================//

  FilesPage.prototype.fileListId = function() {
    return by.css('td.filename .innernametext');
  }

  FilesPage.prototype.fileListElemId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "']");
  };

  FilesPage.prototype.fileListElemNameId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "'] span.innernametext");
  };

  FilesPage.prototype.restoreListElemId = function(id) {
    return (by.css("#fileList tr[data-id='" + id + "']"));
  };

  FilesPage.prototype.restoreButtonId = function(id) {
    return (by.css("#fileList tr[data-id='" + id + "'] .action.action-restore"));
  };

  FilesPage.prototype.renameButtonId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "'] .action.action-rename");
  };

  FilesPage.prototype.renameFormId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "'] form input");
  };

  FilesPage.prototype.shareButtonId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "'] .action.action-share");
  };

  FilesPage.prototype.permanentShareButtonId = function(fileName) {
    return by.css("tr[data-file='" + fileName + "'] .action.action-share.permanent");
  };

  FilesPage.prototype.disableReshareButtonId = function(userName) {
    return by.css("li[title='" + userName + "'] label input[name='share']");
  };

  FilesPage.prototype.disableEditButtonId = function(userName) {
    return by.css("li[title='" + userName + "'] label input[name='edit']");
  };

  FilesPage.prototype.deleteButtonId = function(fileName) {
    return by.css("tr[data-file='" + fileName +  "'] .action.delete.delete-icon");
  };

//================ NAVIGATION ==========================================================//
//======================================================================================//

  /**
  * logs in as User and loads filespage.
  *
  * @param {String} userName username
  * @param {String} pass user's password
  */

  FilesPage.prototype.getAsUser = function(userName, pass) { 
    var Page = require('../helper/page.js')

    // general function
    Page.getAsUser(userName, pass, this.url);

    var button = this.newButton;
    return browser.wait(function() {
      return button.isDisplayed();
    }, 5000, 'load files content');
  };

  /**
  * loads the filespage.
  */

  FilesPage.prototype.get = function() { 
    browser.get(this.url);

    var button = this.newButton;
    browser.wait(function() {
      return button.isDisplayed();
    }, 5000, 'load files content');
  };

  /**
  * loads folder content via url
  *
  * @param {String} folderName foldername
  */

  FilesPage.prototype.getFolder = function(folderName) {
    folderUrl = this.folderUrl(folderName);
    browser.get(folderUrl);
    var button = this.newButton;
    return browser.wait(function() {
      return button.isDisplayed();
    }, 5000, 'load files content');
  };

  /**
  * loads folder contet via hover and click
  *
  * @param {String} folderName foldername
  */

  FilesPage.prototype.goInToFolder = function(folderName) {
    Page.moveMouseTo(this.fileListElemId(folderName));
    element(this.fileListElemNameId(folderName)).click();
    var button = this.newButton;
    browser.wait(function() {
      return button.isDisplayed();
    }, 5000, 'load files content');
  };

  /**
  * loads subfolder content via url from root
  *
  * @param {String} folderName folder subfolder is in
  * @param {String} subFolderName folder you want go to
  */

  FilesPage.prototype.getSubFolder = function(folderName, subFolderName) {
    folderUrl = this.folderUrl(folderName) + '%2F' + subFolderName;
    browser.get(folderUrl);
    var button = this.newButton;
    browser.wait(function() {
      return button.isDisplayed();
    }, 5000, 'load files content');
  };

//================ FILELIST ============================================================//
//======================================================================================//

  /**
  * returns an array of foldernames and filenames without subfixes
  */

  FilesPage.prototype.listFiles = function() {
    // TODO: waiting to avoid "index out of bound error" 
    browser.sleep(800);
    return element.all(this.fileListId()).map(function(filename) {
      return filename.getText();
    });
  };

  /**
  * lists all selected files and folders, returns an array of names without subfixes
  */

  FilesPage.prototype.listSelctedFiles = function() {
    return element.all(this.selectedFileListId).map(function(filename) {
      return filename.getText();
    });
  };

//================ RENAMING ============================================================//
//======================================================================================//

  /**
  * opens file's renamingform, used in renameFile function
  *
  * @param {String} filerName filename
  */

  FilesPage.prototype.openRenameForm = function(fileName) {
    var renameButton = element(this.renameButtonId(fileName));

    return Page.moveMouseTo(this.fileListElemId(fileName)).then(function() {
      return renameButton.click();
    })
  };

  /**
  * renames a file
  *
  * @param {String} fileName filename
  * @param {String} newFilerName new filename
  */

  FilesPage.prototype.renameFile = function(fileName, newFileName) {
    var renameForm = element(this.renameFormId(fileName));

    return this.openRenameForm(fileName).then(function() {
      for(var i=0; i<5; i++) {
        renameForm.sendKeys(protractor.Key.DELETE)
      };
      renameForm
        .sendKeys(newFileName)
        .sendKeys(protractor.Key.ENTER)
    });
  };

  /**
  * renames a folder
  *
  * @param {String} folderName foldername
  * @param {String} newFolderrName new foldername
  */

  FilesPage.prototype.renameFolder = function(folderName, newFolderName) {
    return this.renameFile(folderName, newFolderName);
  };

//================ DELETE ==============================================================//
//======================================================================================//
  
  /**
  * deletes a file
  *
  * @param {String} fileName filename
  * @param {String} newFilerName new filename
  */

  FilesPage.prototype.deleteFile = function(fileName) {
    var Page = require('../helper/page.js');
    var deleteButton = this.deleteButtonId(fileName);
    return Page.moveMouseTo(this.fileListElemId(fileName)).then(function(){
      return element(deleteButton).click();
    });
  };

  /**
  * deletes a folder
  *
  * @param {String} folderName foldername
  * @param {String} newFolderrName new foldername
  */

  FilesPage.prototype.deleteFolder = function(folderName) {
    return this.deleteFile(folderName);
  };

//================ SHARE ===============================================================//
//======================================================================================//


  /**
  * opens file's sharingform, used in shareFile function
  *
  * @param {String} filerName filename or foldername
  */
  
  FilesPage.prototype.openShareForm = function(fileName) {
    Page.moveMouseTo(this.fileListElemId(fileName));
    return element(this.shareButtonId(fileName)).click();
  };
  
  /**
  * shares a file
  *
  * @param {String} fileName filename
  * @param {String} username user file is shared with
  */

  FilesPage.prototype.shareFile = function(fileName, userName) {
    this.openShareForm(fileName);
    this.shareWithForm.sendKeys(userName);
    var dropdown = this.sharedWithDropdown
    browser.wait(function(){
      return dropdown.isDisplayed();
    }, 3000);
    this.shareWithForm.sendKeys(protractor.Key.ENTER);
  }
  
  /**
  * shares a folder
  *
  * @param {String} folderName foldername
  * @param {String} username user folder is shared with
  */

  FilesPage.prototype.shareFolder = function(folderName, userName) {
    this.shareFile(folderName);
  }
  
  /**
  * disables reshare option
  *
  * @param {String} fileName filename or foldername
  * @param {String} username user who can't reshare the file or folder anymore
  */

  FilesPage.prototype.disableReshare = function(fileName, userName) {
    var disableReshareButton = element(this.disableReshareButtonId(userName));
    var dropdown = this.sharedWithDropdown

    return this.openShareForm(fileName).then(function() {
      return disableReshareButton.click();
    });
  };

  /**
  * checks if user ether can or can't reshare a file or folder
  *
  * @param {String} fileName filename or foldername
  */

  FilesPage.prototype.checkReshareability = function(fileName) {
    var shareButtonLocator = this.shareButtonId(fileName);

    return Page.moveMouseTo(this.fileListElemId(fileName)).then(function() {        
      return element(shareButtonLocator).isPresent();
    });
  };
  
  /**
  * disables edit option
  *
  * @param {String} fileName filename or foldername
  * @param {String} username user who can't edit the file or folder anymore
  */

  FilesPage.prototype.disableEdit = function(fileName, userName) {
    var disableEditButton = element(this.disableEditButtonId(userName));
    var dropdown = this.sharedWithDropdown

    return this.openShareForm(fileName).then(function() {
      return disableEditButton.click();
    });
  };

//================ RESTORE =============================================================//
//======================================================================================//

  FilesPage.prototype.openTrashbin = function() {
    this.trashbinButton.click();
    var restoreButton = element(this.restoreButtonId(0))
    browser.wait(function() {
      return restoreButton.isPresent()
    }, 3000);
    browser.sleep(500);
  };

  /**
  * restores a file
  *
  * @param {Integer} [id] list element id, default is the first element, so the last that has be deleted
  */

  FilesPage.prototype.restoreFile = function(id) {

    // set default id 
    if(! id) {
      id = 0;
    }

    var restoreButton = element(this.restoreButtonId(id))

    return Page.moveMouseTo(this.restoreListElemId(id)).then(function() {
      return restoreButton.click();
    });
  };

  /**
  * restores a folder
  *
  * @param {Integer} [id] list element id, default is the first element, so the last that has be deleted
  */

  FilesPage.prototype.restoreFolder = function(id) {
    return this.restoreFile(id);
  };

//================ CREATE ==============================================================//
//======================================================================================//

  /**
  * creates a .txt file
  *
  * @param {String} fileName filename with subfix (.txt) // example: "filename.txt"
  */

  FilesPage.prototype.createTxtFile = function(fileName) {
    this.newButton.click();
    this.newTextButton.click();
    this.newTextnameForm.sendKeys(fileName); 
    this.newTextnameForm.sendKeys(protractor.Key.ENTER);
    
    // TODO: find correct wait trigger
    // browser.wait(function() {
    //  // return 
    // });

    // TODO: Timing Workaround
    browser.sleep(800);
  };

  /**
  * creates a folder
  *
  * @param {String} folderName foldername
  */

  FilesPage.prototype.createFolder = function(folderName) {
    this.newButton.click()
    this.newFolderButton.click();
    this.newFoldernameForm.sendKeys(folderName); 
    this.newFoldernameForm.sendKeys(protractor.Key.ENTER);

    // TODO: find correct wait trigger
    // browser.wait(function() {
    //  // return 
    // });

    // TODO: Timing Workaround
    browser.sleep(800);
  };

  /**
  * creates a subfolder from root
  *
  * @param {String} folderName folder subfolder will be in
  * @param {String} subFolderName folder wich will be created
  */

  FilesPage.prototype.createSubFolder = function(folderName, subFolderName) {
    this.goInToFolder(folderName);
    this.createFolder(subFolderName);
  };

//================ EDIT TXT ============================================================//
//======================================================================================//

  /**
  * opens a file, used in editTxtFile function
  *
  * @param {String} fileName filename with subfix (.txt)
  */

  FilesPage.prototype.openFile = function(fileName) {
    element(this.fileListElemNameId(fileName)).click();
    browser.sleep(800);
  };

  /**
  * writes in a .txt file, used in editTxtFile function
  *
  * @param {String} text text written in .txt file
  */

  FilesPage.prototype.writeInFile = function(text) {
    var textArea = element(this.textAreaId);
    textArea.sendKeys(text);
  };

  /**
  * saves a .txt file, used in editTxtFile function
  */

  FilesPage.prototype.saveFile = function() {
    saveButton = element(this.saveButtonId);
    saveButton.click();
  };

  /**
  * edits a .txt file
  *
  * @param {String} fileName filename with subfix (.txt)
  * @param {String} text text written in .txt file
  */

  FilesPage.prototype.editTxtFile = function(fileName, text) {
    this.openFile(fileName);
    this.writeInFile(text);
    this.saveFile();
  };

  /**
  * returns text written in a .txt file
  */

  FilesPage.prototype.getTextContent = function() {
    return element(this.textLineId).getText().then( function(text) {
      return text
    });
  }

  module.exports = FilesPage;
})();