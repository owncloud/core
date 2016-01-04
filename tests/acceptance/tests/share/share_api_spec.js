/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

var Page = require('../helper/page.js');
var ShareApi = require('../pages/share_api.page.js');
var UserPage = require('../pages/user.page.js');
var FilesPage = require('../pages/files.page.js');
var parseXml = require('xml2js').parseString;

var flow = protractor.promise.controlFlow();

describe('Share Api', function() {
  var params = browser.params;
  var shareApi;
  var userPage;
  var filesPage;

  beforeEach(function() {
    isAngularSite(false);
    shareApi = new ShareApi(params.baseUrl);
    userPage = new UserPage(params.baseUrl);
    filesPage = new FilesPage(params.baseUrl);
  });

  it('setup', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.createNewUser('demo', 'password');
    userPage.createNewUser('demo2', 'password');
    expect(userPage.listUser()).toContain('demo', 'demo2');
    filesPage.get();
    filesPage.createFolder('testFolder');
    expect(filesPage.listFiles()).toContain('testFolder');
  });

  it('should get all shares', function() {
    var get = function () {
      return shareApi.get();
    };

    flow.execute(get).then(function(res){
      parseXml(res.body, function (err, result) {
        // console.dir(result.ocs.data); // array of all shares
      });
      expect(res.statusCode).toEqual(200);
    });
  });

  it('should create a new share', function() {
    var create = function () {
      return shareApi.create('testFolder', 'demo2', 0);
    };

    flow.execute(create).then(function(res){
      parseXml(res.body, function (err, result) {
        // console.log(result.ocs.data, result.ocs.meta); // information about created share
        expect(result.ocs.meta[0].statuscode[0]).toEqual('100');
      });
    });
  });

  it('clean up', function() {
    userPage.getAsUser(params.login.user, params.login.password);
    userPage.deleteUser('demo');
    userPage.deleteUser('demo2');
    expect(userPage.listUser()).not.toContain('demo', 'demo2');
    filesPage.get();
    filesPage.deleteFolder('testFolder');
    expect(filesPage.listFiles()).not.toContain('testFolder');
  });
});