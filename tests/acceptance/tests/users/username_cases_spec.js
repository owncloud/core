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

describe('Username Cases', function() {
  var params = browser.params;
  var userPage;
  var filesPage;
  
  beforeEach(function() {
    isAngularSite(false);
    userPage = new UserPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
  });
  
  it('setup ', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo1', 'demo');
    userPage.createNewUser('Demo2', 'demo');
    userPage.createNewUser('DEMO3', 'demo').then(function() {
      browser.sleep(500);  
      expect(userPage.listUser()).toContain('demo1', 'Demo2', 'DEMO3');
    });
  });
  
  it('should login lowercase username with test user in lowercase', function() {    
    filesPage.getAsUser('demo1', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login camelcase username with test user in lowercase', function() {    
    filesPage.getAsUser('demo2', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login uppercase username with test user in lowercase', function() {    
    filesPage.getAsUser('demo3', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with lowercase username in camelcase', function() {    
    filesPage.getAsUser('Demo1', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with camelcase username in camelcase', function() {    
    filesPage.getAsUser('Demo2', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with uppercase username in camelcase', function() {  
    filesPage.getAsUser('Demo3', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with lowercase username in uppercase', function() {    
    filesPage.getAsUser('DEMO1', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with lowercase username in uppercase', function() {   
    filesPage.getAsUser('DEMO2', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login with lowercase username in uppercase', function() {   
    filesPage.getAsUser('DEMO3', 'demo');
    expect(browser.getCurrentUrl()).toContain('index.php/apps/files/');
  });
  
  it('should login as admin and delete test user', function() {    
    // Cleanup prev tests
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.deleteUser('demo1');
    userPage.deleteUser('Demo2');
    userPage.deleteUser('DEMO3');
    userPage.get(); // delete last user 
    expect(userPage.listUser()).not.toContain('demo1');
    expect(userPage.listUser()).not.toContain('Demo2');
    expect(userPage.listUser()).not.toContain('DEMO3' );
  });
});