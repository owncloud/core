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
  var request = require('request');
  var parseString = require('xml2js').parseString;
  process.env.NODE_TLS_REJECT_UNAUTHORIZED = "0" // Avoids DEPTH_ZERO_SELF_SIGNED_CERT error for self-signed certs

  var ShareApi = function(baseUrl) {
    this.baseUrl = baseUrl;
    this.path = 'ocs/v1.php/apps/files_sharing/api/v1/shares';
    this.url = baseUrl + this.path;
  };

//================ GET ALL SHARES ======================================================//
//======================================================================================//

  /**
  * gets all shares
  */

  ShareApi.prototype.get = function () {
    var url = this.url;

    var defer = protractor.promise.defer();

    request({
      method: "GET",
      uri: url,
      followRedirect: true,
      auth: {
        user: "admin", 
        password: "password",
      }
    },
    function(error, response) {
      if (error || response.statusCode >= 400) {
          defer.reject({
              error : error,
              response : response
          });
      } else {
          defer.fulfill(response);
      }
    });
    return defer.promise;
  };

//================ CREATE A SHARE ======================================================//
//======================================================================================//

  /**
  * creates a new share
  *
  * @param {String} path file's or folder's path from owncloud's filespage root 
  * @param {String} shareWith username file or folder wil be shared with
  * @param {Interger} shareType share type: 0 = user, 1 = group, 3 = Public link
  */

  ShareApi.prototype.create = function (path, shareWith, shareType) {
    var url = this.url;

    var defer = protractor.promise.defer();

    // defining http request
    request({
      method: "POST",
      uri: url,
      followRedirect: true,
      // setting data to right format
      form: {
        path: path,
        shareWith: shareWith,
        shareType: shareType
      },
      // setting authentfication
      auth: {
        user: "admin", 
        password: "password",
      }
    },
    function(error, response) {
      if (error || response.statusCode >= 400) {
          defer.reject({
              error : error,
              response : response
          });
      } else {
          defer.fulfill(response);
      }
    });
    return defer.promise;
  };
  module.exports = ShareApi;
})();