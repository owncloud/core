
var UserPage = require('../pages/user.page.js');
var FilesPage = require('../pages/files.page.js');
var AdminPage = require('../pages/admin.page.js');
var Page = require('../helper/page.js');

var ShareApi = require('../pages/share_api.page.js');
var parseXml = require('xml2js').parseString;
var flow = protractor.promise.controlFlow();
var protrac = protractor.getInstance();

describe('Share options', function() {
  var params = browser.params;
  var userPage;
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

  it('should not be possible to reshare a folder, if the "re-share" option is removed', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.createFolder('noReshare');
    filesPage.shareFile('noReshare', 'demo');
    filesPage.disableReshare('noReshare', 'demo');
  
    filesPage.getAsUser('demo', 'password');

    expect(filesPage.checkReshareability('noReshare')).toBeFalsy();
  });

  it('should not be possible to modify a file shared without edit privileges', function() {
    filesPage.getAsUser(params.login.user, params.login.password);

    var createFile = function() {
      filesPage.createTxtFile('noEdits')
    };
    var createShare = function() {
      return shareApi.create('noEdits.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);
    filesPage.disableEdit('noEdits.txt', 'demo');
    filesPage.editTxtFile('noEdits.txt', 'No Edits by User!');

    filesPage.getAsUser('demo', 'password');
    filesPage.openFile('noEdits.txt');
    expect(element(filesPage.saveButtonId).toBeDisplayed).toBeFalsy();
  });

  it('should change file, when user (not the owner) with privileges edits it', function() {
    filesPage.getAsUser(params.login.user, params.login.password);

    var createFile = function() {
      filesPage.createTxtFile('userEdits')
    };
    var createShare = function() {
      return shareApi.create('userEdits.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    filesPage.editTxtFile('userEdits.txt', 'User made edits!');
    
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.openFile('userEdits.txt');    
    expect(filesPage.getTextContent()).toEqual('User made edits!')
    filesPage.get();
    filesPage.deleteFile('userEdits.txt');
  });

  it('should change file for all users, when owner edits shared file', function() {
    filesPage.getAsUser(params.login.user, params.login.password);

    var createFile = function() {
      filesPage.createTxtFile('ownerEdits')
    };
    var createShare = function() {
      return shareApi.create('ownerEdits.txt', 'demo', 0);
    };

    flow.execute(createFile);
    flow.execute(createShare);
    filesPage.editTxtFile('ownerEdits.txt', 'Owner made edits!');

    filesPage.getAsUser('demo', 'password');
    filesPage.openFile('ownerEdits.txt');    
    expect(filesPage.getTextContent()).toEqual('Owner made edits!')
  });

  it('should not be possible to share via link, if admin disabled this option', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    adminPage.get();
    adminPage.disableOption(adminPage.allowLinksCheckBox);
    filesPage.get();
    filesPage.openShareForm('ownerEdits.txt');
    expect(filesPage.shareLinkCheckBox.isPresent()).toBeFalsy();

    adminPage.get();
    adminPage.activateOption(adminPage.allowLinksCheckBox);
  });

  it('should show the shared icon on all files and Folders within a shared directory', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    var createFiles = function() {
      filesPage.createFolder('sharedFolder');
      filesPage.getFolder('sharedFolder');
      filesPage.createTxtFile('sharedFile');
      filesPage.createTxtFile('otherSharedFile');
      filesPage.createFolder('folderInSharedFolder');
      filesPage.createFolder('otherFolderInSharedFolder');
    };

    var createShare = function() {
      shareApi.create('sharedFolder', 'demo', 0);
    };
   
    flow.execute(createFiles);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('sharedFolder').then(function() {
      var sharedFile = element(filesPage.permanentShareButtonId('sharedFile.txt'));
      browser.sleep(800);
      var otherSharedFile = element(filesPage.permanentShareButtonId('otherSharedFile.txt'));
      var folderInSharedFolder = element(filesPage.permanentShareButtonId('folderInSharedFolder'));
      var otherFolderInSharedFolder = element(filesPage.permanentShareButtonId('otherFolderInSharedFolder'));
      expect(sharedFile.isDisplayed()).toBeTruthy();
      expect(otherSharedFile.isDisplayed()).toBeTruthy();
      expect(folderInSharedFolder.isDisplayed()).toBeTruthy();
      expect(otherFolderInSharedFolder.isDisplayed()).toBeTruthy();
    })
  });

  it('should rename a shared folder and the folder stays shared', function() {
    filesPage.getAsUser(params.login.user, params.login.password); 
    var createFolder = function() {
    filesPage.createFolder('sharedFolder3');
    };

    var createShare = function() {
      shareApi.create('sharedFolder3', 'demo', 0);
    };

    flow.execute(createFolder);
    flow.execute(createShare);

    filesPage.getAsUser('demo', 'password');
    filesPage.renameFile('sharedFolder3', 'renamedSharedFolder');
    browser.sleep(500);
    expect(element(filesPage.permanentShareButtonId('renamedSharedFolder')).isDisplayed()).toBeTruthy();
  });

  it('should share a file, if it is moved in a shared folder', function() {
    filesPage.getAsUser(params.login.user, params.login.password); 
    var createFolder = function() {
    filesPage.createFolder('moveItIn');
    filesPage.createTxtFile('moveMeIn');
    };

    var createShare = function() {
      shareApi.create('moveItIn', 'demo', 0);
    };

    flow.execute(createFolder);
    flow.execute(createShare);

    Page.dragAndDrop(filesPage.fileListElemId('moveMeIn.txt'), filesPage.fileListElemId('moveItIn'));
    filesPage.getAsUser('demo', 'password');
    filesPage.getFolder('moveItIn');
    expect(filesPage.listFiles()).toContain('moveMeIn');
  });

  it('should have access to a shared subfolder', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    var protrac = protractor.getInstance();
    var createFolder = function() {
      filesPage.createFolder('sharedFolder4');
      filesPage.getFolder('sharedFolder4');
      filesPage.createFolder('subFolder');
    };
    var createShare = function() {
      shareApi.create('sharedFolder4', 'demo', 0);
    };

    flow.execute(createFolder);
    flow.execute(createShare);
    filesPage.getAsUser('demo', 'password');
    filesPage.getSubFolder('sharedFolder4', 'subFolder');

    var expectedUrl = filesPage.folderUrl('sharedFolder4' + '%2F' + 'subFolder');

    protrac.getCurrentUrl().then(function(url) {
      expect(expectedUrl).toEqual(url);
    });
  });

  it('clean up', function() {
    filesPage.getAsUser(params.login.user, params.login.password);
    filesPage.deleteFolder('noReshare');
    filesPage.deleteFolder('sharedFolder');
    filesPage.deleteFolder('sharedFolder3');
    filesPage.deleteFolder('sharedFolder4');
    filesPage.deleteFolder('moveItIn');
    filesPage.deleteFile('noEdits.txt');
    filesPage.deleteFile('ownerEdits.txt');
  
    userPage.get();
    userPage.deleteUser('demo');
    userPage.get(); // delete last user 
    expect(userPage.listUser()).not.toContain('demo');
  });
});
