/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

/**
 * A webDAV client library for JavaScript
 * @author Niek Bosch
 */

// Create the namespace if that's not done yet
if (nl === undefined) {
  /** @namespace */
  var nl = {};
}
if (nl.sara === undefined) {
  /** @namespace */
  nl.sara = {};
}
if (nl.sara.webdav === undefined) {
  /** @namespace The entire library is in this namespace. */
  nl.sara.webdav = {};
}
if (nl.sara.webdav.codec === undefined) {
  /** @namespace Holds all the standard codecs for converting properties */
  nl.sara.webdav.codec = {};
}

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Exception is already defined, we have a namespace clash!
if (nl.sara.webdav.Exception !== undefined) {
  throw 'Class name nl.sara.webdav.Exception already taken, could not load JavaScript library for WebDAV connectivity.';
}

/**
 * @class An exception
 * @param  {String}  [message]  Optional; A human readable message
 * @param  {Number}  [code]     Optional; The error code. It is best to use the class constants to set this.
 * @property  {String}  message  The exception message
 * @property  {Number}  code     The exception code
 */
nl.sara.webdav.Exception = function(message, code) {
  // First define public attributes
  Object.defineProperty(this, 'message', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'code', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if (message !== undefined) {
    this.message = message;
  }
  if (code !== undefined) {
    this.code = code;
  }
};

/**#@+
 * Declaration of the error code constants
 */
nl.sara.webdav.Exception.WRONG_TYPE = 1;
nl.sara.webdav.Exception.NAMESPACE_TAKEN = 2;
nl.sara.webdav.Exception.UNEXISTING_PROPERTY = 3;
nl.sara.webdav.Exception.WRONG_XML = 4;
nl.sara.webdav.Exception.WRONG_VALUE = 5;
nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER = 6;
nl.sara.webdav.Exception.AJAX_ERROR = 7;
nl.sara.webdav.Exception.NOT_IMPLEMENTED = 8;
/**#@-*/

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Overloads the default toString() method so it returns the message of this exception
 *
 * @returns  {String}  A string representation of this property
 */
nl.sara.webdav.Exception.prototype.toString = function() {
  return this.message;
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Ie is already defined, we have a namespace clash!
if (nl.sara.webdav.Ie !== undefined) {
  throw 'Class name nl.sara.webdav.Ie already taken, could not load JavaScript library for WebDAV connectivity.';
}

/**
 * @class This class holds all IE hacks
 */
nl.sara.webdav.Ie = {};

/**
 * Although this library has no intent to work in IE older than versions 9, it should work in IE and sometimes requires some special attention for this wonderful browser
 *
 * @var  Boolean  True if the current browser is IE
 */
nl.sara.webdav.Ie.isIE = false;
/*@cc_on
nl.sara.webdav.Ie.isIE = true;
@*/

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Returns the localName of a DOM Node object
 *
 * @param    {Node}    node  The node to determine the localname for
 * @returns  {String}        The local name
 */
nl.sara.webdav.Ie.getLocalName = function(node) {
  if (nl.sara.webdav.Ie.isIE && node.baseName) {
    return node.baseName;
  }else{
    return node.localName;
  }
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Client is already defined, we have a namespace clash!
if (nl.sara.webdav.Client !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Client already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Connection to a WebDAV server
 *
 * @param  {Array}  [config]  A configuration object. It can contain the following fields:
 *                            - host; String containing the hostname to connect to (default: current host)
 *                            - useHTTPS; If set to (boolean) false, a regular HTTP connection will be used, any other value (even 0 or '' which evaluate to false) and HTTPS will be used instead. Is ignored if host is not set. (default: true)
 *                            - port; Integer with the port number to use. Is ignored if host is not set. (default: 443 for HTTPS and 80 for HTTP)
 *                            - defaultHeaders; An array containing default headers to use for each request. Header names should be the keys. (default: {} i.e. no default headers)
 *                            - username; A string with the username to use for authentication. (default: the current username if any)
 *                            - password; A string with the password to use for authentication. This is only used if a username is supplied. (default: the current password if any)
 *                            For backwards compatibility reasons, it is also
 *                            possible to specify the 'host', 'useHTTPS', 'port'
 *                            and 'defaultHeaders' as regular parameters (in
 *                            that order). Note that useHTTPS works differently
 *                            in that case; any other value than boolean True
 *                            will result in regular HTTP. If you want to supply
 *                            a username and password, you will have to use the
 *                            config array, you cannot pass them as extra normal
 *                            parameters.
 */
nl.sara.webdav.Client = function(config, useHTTPS, port, defaultHeaders) {
  // First define private attributes
  Object.defineProperty(this, '_baseUrl', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_username', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_password', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_headers', {
    'value': {},
    'enumerable': false,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if ( config !== undefined ) {
    var host;
    if ( typeof( config ) !== 'string' ) {
      host = config['host'];
      useHTTPS = ( config['useHTTPS'] !== false );
      port = config['port'];
      defaultHeaders = config['defaultHeaders'];
      
      if ( config['username'] !== undefined ) {
        this._username = config['username'];
        if ( config['password'] !== undefined ) {
          this._password = config['password'];
        }else{
          this._password = '';
        }
      }
    }else{
      host = config;
    }
    
    if ( host !== undefined ) {
      // if the configuration item is a string, then we have to work in compatibility mode; first parameter is the host, second, the protocol, third the port and fourth aditional headers
      var protocol = (useHTTPS === true) ? 'https' : 'http';
      port = (port !== undefined) ? port : ((protocol === 'https') ? 443 : 80);
      this._baseUrl = protocol + '://' + host + ((((protocol === 'http') && (port === 80)) || ((protocol === 'https') && (port === 443))) ? '' : ':' + port);
    }
  }
  
  if (defaultHeaders !== undefined) {
    this._headers = defaultHeaders;
  }
};

/**#@+
 * Class constant
 */
nl.sara.webdav.Client.PROPNAME = 1;
nl.sara.webdav.Client.ALLPROP = 2;
nl.sara.webdav.Client.INFINITY = 'infinity';
nl.sara.webdav.Client.FAIL_ON_OVERWRITE = 3;
nl.sara.webdav.Client.TRUNCATE_ON_OVERWRITE = 4;
nl.sara.webdav.Client.SILENT_OVERWRITE = 5;
/**#@-*/

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Converts a path to the full url (i.e. appends the protocol and host part)
 *
 * @param   {String}  path  The path on the server
 * @returns {String}        The full url to the path
 */
nl.sara.webdav.Client.prototype.getUrl = function(path) {
  if (path.substring(0,1) !== '/') {
    path = '/' + path;
  }
  if (this._baseUrl !== null) {
    return this._baseUrl + path;
  }else{
    return path;
  }
};

/**
 * Perform a WebDAV PROPFIND request
 *
 * @param    {String}                         path             The path get a PROPFIND for
 * @param    {Function(status,body,headers)}  callback         Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         [depth=0]        Optional; Value for the 'depth' header, should be either '0', '1' or the class constant INFINITY. When omitted, '0' is used. See RFC 4918.
 * @param    {mixed}                          [props=ALLPROP]  Optional; The properties to fetch. Should be either one of the class constants PROPNAME or ALLPROP or an array with Property objects. When omitted, ALLPROP is assumed. See RFC 4918.
 * @param    {nl.sara.webdav.Property[]}      [include]        Optional; An array with Property objects used for the <include> element. This is only used for ALLPROP requests. When omitted, no <include> element is send. See RFC 4918.
 * @param    {Array}                          headers          Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                           The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.propfind = function(path, callback, depth, props, include, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('PROPFIND requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (!(typeof path === "string")) {
    throw new nl.sara.webdav.Exception('PROPFIND parameter; path should be a string', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // Check the depth header
  if (depth === undefined) { // We default depth to 0, not to infinity as this is not supported by all servers
    depth = 0;
  }
  var depthHeader = null;
  switch (depth) {
    case 0:
    case 1:
      depthHeader = depth;
      break;
    case nl.sara.webdav.Client.INFINITY:
      depthHeader = 'infinity';
      break;
    default:
      throw new nl.sara.webdav.Exception("Depth header should be '0', '1' or nl.sara.webdav.Client.INFINITY", nl.sara.webdav.Exception.WRONG_VALUE);
    break;
  }

  // Create the request XML
  if (props === undefined) {
    props = nl.sara.webdav.Client.ALLPROP;
  }
  var propsBody = document.implementation.createDocument("DAV:", "propfind", null);
  switch (props) { // Find out what the request is for
    case nl.sara.webdav.Client.PROPNAME: // User wants all property names
      propsBody.documentElement.appendChild(propsBody.createElementNS('DAV:', 'propname'));
      break;
    case nl.sara.webdav.Client.ALLPROP: // User wants all properties
      propsBody.documentElement.appendChild(propsBody.createElementNS('DAV:', 'allprop'));
      if (include !== undefined) { // There is content for the <DAV: include> tags, so parse it
        if (!(include instanceof Array)) {
          throw new nl.sara.webdav.Exception('Propfind parameter; include should be an array', nl.sara.webdav.Exception.WRONG_TYPE);
        }
        var includeBody = propsBody.createElementNS('DAV:', 'include');
        for (var i = 0; i < include.length; i++) {
          var item = include[i];
          if (!nl.sara.webdav.Ie.isIE && !(item instanceof nl.sara.webdav.Property)) {
            continue;
          }
          includeBody.appendChild(propsBody.createElementNS(item.namespace, item.tagname));
        }
        if (includeBody.hasChildNodes()) { // But only really add the <include> tag if there is valid content
          propsBody.documentElement.appendChild(includeBody);
        }
      }
      break;
    default: // The default is to expect an array with Property objects; the user wants the values of these properties
      if (!(props instanceof Array)) {
        throw new nl.sara.webdav.Exception('Props parameter should be nl.sara.webdav.Client.PROPNAME, nl.sara.webdav.Client.ALLPROP or an array with Property objects', nl.sara.webdav.Exception.WRONG_VALUE);
      }
      var propertyBody = propsBody.createElementNS('DAV:', 'prop');
      for (var i = 0; i < props.length; i++) { // Cycle through the array
        var prop = props[i];
        if (!nl.sara.webdav.Ie.isIE && !(prop instanceof nl.sara.webdav.Property)) {
          continue;
        }
        propertyBody.appendChild(propsBody.createElementNS(prop.namespace, prop.tagname));
      }
      if (!propertyBody.hasChildNodes()) { // But if no properties are found, then the array didn't have Property objects in it
        throw new nl.sara.webdav.Exception("Propfind parameter; if props is an array, it should be an array of Properties", nl.sara.webdav.Exception.WRONG_TYPE);
      }
      propsBody.documentElement.appendChild(propertyBody);
    break;
  }
  var serializer = new XMLSerializer();
  var body = '<?xml version="1.0" encoding="utf-8" ?>' + serializer.serializeToString(propsBody);

  // And then send the request
  var ajax = this.getAjax("PROPFIND", url, callback, headers);
  ajax.setRequestHeader('Depth', depthHeader);
  ajax.setRequestHeader('Content-Type', 'application/xml; charset="utf-8"');
  ajax.send(body);

  return this;
};

/**
 * Perform a WebDAV PROPPATCH request
 *
 * @param    {String}                         path        The path do a PROPPATCH on
 * @param    {Function(status,body,headers)}  callback    Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {nl.sara.webdav.Property[]}      [setProps]  Optional; The properties to set. If not set, delProps should be set. Can be omitted with 'undefined'.
 * @param    {nl.sara.webdav.Property[]}      [delProps]  Optional; The properties to delete. If not set, setProps should be set.
 * @param    {Array}                          headers     Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                      The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.proppatch = function(path, callback, setProps, delProps, headers) {
  if ((path === undefined) || (callback === undefined) || ((setProps === undefined) && (delProps === undefined))) {
    throw new nl.sara.webdav.Exception('PROPPATCH requires the parameters path, callback and at least one of setProps or delProps', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (!(typeof path === "string") || ((setProps !== undefined) && !(setProps instanceof Array)) || ((delProps !== undefined) && !(delProps instanceof Array))) {
    throw new nl.sara.webdav.Exception('PROPPATCH parameter; path should be a string, setProps and delProps should be arrays', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // Create the request XML
  var propsBody = document.implementation.createDocument("DAV:", "propertyupdate", null);
  if (setProps !== undefined) {
    var props = propsBody.createElementNS('DAV:', 'prop');
    for (var i = 0; i < setProps.length; i++) { // Cycle through the array
      var prop = setProps[i];
      if (!nl.sara.webdav.Ie.isIE && !(prop instanceof nl.sara.webdav.Property)) {
        continue;
      }
      var element = propsBody.createElementNS(prop.namespace, prop.tagname);
      for (var j = 0; j < prop.xmlvalue.length; j++) {
        var nodeCopy = propsBody.importNode(prop.xmlvalue.item(j), true);
        element.appendChild(nodeCopy);
      }
      props.appendChild(element);
    }
    if (!props.hasChildNodes()) { // But if no properties are found, then the array didn't have Property objects in it
      throw new nl.sara.webdav.Exception("Proppatch parameter; setProps should be an array of Properties", nl.sara.webdav.Exception.WRONG_TYPE);
    }
    var set = propsBody.createElementNS('DAV:', 'set');
    set.appendChild(props);
    propsBody.documentElement.appendChild(set);
  }
  if (delProps !== undefined) {
    var props = propsBody.createElementNS('DAV:', 'prop');
    for (var i = 0; i < delProps.length; i++) { // Cycle through the array
      var prop = delProps[i];
      if (!nl.sara.webdav.Ie.isIE && !(prop instanceof nl.sara.webdav.Property)) {
        continue;
      }
      var element = propsBody.createElementNS(prop.namespace, prop.tagname);
      props.appendChild(element);
    }
    if (!props.hasChildNodes()) { // But if no properties are found, then the array didn't have Property objects in it
      throw new nl.sara.webdav.Exception("Proppatch parameter; delProps should be an array of Properties", nl.sara.webdav.Exception.WRONG_TYPE);
    }
    var remove = propsBody.createElementNS('DAV:', 'remove');
    remove.appendChild(props);
    propsBody.documentElement.appendChild(remove);
  }
  var serializer = new XMLSerializer();
  var body = '<?xml version="1.0" encoding="utf-8" ?>' + serializer.serializeToString(propsBody);

  // And then send the request
  var ajax = this.getAjax("PROPPATCH", url, callback, headers);
  ajax.setRequestHeader('Content-Type', 'application/xml; charset="utf-8"');
  ajax.send(body);

  return this;
};

/**
 * Perform a WebDAV MKCOL request
 *
 * @param    {String}                         path                                              The path to perform MKCOL on
 * @param    {Function(status,body,headers)}  callback                                          Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         [body]                                            Optional; a body to include in the MKCOL request.
 * @param    {String}                         [contenttype='application/xml; charset="utf-8"']  Optional; the content type of the body (i.e. value for the Content-Type header). If omitted, but body is specified, then 'application/xml; charset="utf-8"' is assumed
 * @param    {Array}                          headers                                           Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                                                            The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.mkcol = function(path, callback, body, contenttype, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('MKCOL requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || ((contenttype !== undefined) && (typeof contenttype !== 'string'))) {
    throw new nl.sara.webdav.Exception('MKCOL parameter; path and contenttype should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = this.getAjax("MKCOL", url, callback, headers);
  if (body !== undefined) {
    if (contenttype !== undefined) {
      ajax.setRequestHeader('Content-Type', contenttype);
    }
    ajax.send(body);
  }else{
    ajax.send();
  }

  return this;
};

/**
 * Perform a WebDAV DELETE request
 *
 * Because 'delete' is an operator in JavaScript, I had to name this method
 * 'remove'. However, performs a regular DELETE request as described in
 * RFC 4918
 *
 * @param    {String}                         path      The path to perform DELETE on
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Array}                          headers   Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                    The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.remove = function(path, callback, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('DELETE requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (typeof path !== "string"){
    throw new nl.sara.webdav.Exception('DELETE parameter; path should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = this.getAjax("DELETE", url, callback, headers);
  ajax.send();

  return this;
};

/**
 * Perform a WebDAV GET request
 *
 * @param    {String}                    path      The path to GET
 * @param    {Function(status,content)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Array}                     headers   Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}               The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.get = function(path, callback, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('GET requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (typeof path !== "string"){
    throw new nl.sara.webdav.Exception('GET parameter; path should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("GET", url, callback, headers);
  ajax.send();

  return this;
};

/**
 * Perform a WebDAV HEAD request
 *
 * @param    {String}                         path      The path to perform HEAD on
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Array}                          headers   Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                    The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.head = function(path, callback, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('HEAD requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (typeof path !== "string"){
    throw new nl.sara.webdav.Exception('HEAD parameter; path should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("HEAD", url, callback, headers);
  ajax.send();

  return this;
};

/**
 * Perform a WebDAV PUT request
 *
 * @param    {String}                         path           The path to perform PUT on
 * @param    {Function(status,body,headers)}  callback       Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         body           The content to include in the PUT request.
 * @param    {String}                         [contenttype]  Optional; the content type of the body (i.e. value for the Content-Type header).
 * @param    {Array}                          headers        Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                         The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.put = function(path, callback, body, contenttype, headers) {
  if ((path === undefined) || (callback === undefined) || (body === undefined)) {
    throw new nl.sara.webdav.Exception('PUT requires the parameters path, callback and body', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || ((contenttype !== undefined) && (typeof contenttype !== 'string'))) {
    throw new nl.sara.webdav.Exception('PUT parameter; path and contenttype should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("PUT", url, callback, headers);
  if (contenttype !== undefined) {
    ajax.setRequestHeader('Content-Type', contenttype);
  }
  ajax.send(body);

  return this;
};

/**
 * Perform a WebDAV OPTIONS request
 *
 * @param    {String}                         path                                               The path to perform OPTIONS on
 * @param    {Function(status,body,headers)}  callback                                           Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         [body]                                             Optional; a body to include in the OPTIONS request.
 * @param    {String}                         [contenttype='application/x-www-form-urlencoded']  Optional; the content type of the body (i.e. value for the Content-Type header). If omitted, but body is specified, then 'application/x-www-form-urlencoded' is assumed
 * @param    {Array}                          headers                                            Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                                                             The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.options = function(path, callback, body, contenttype, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('OPTIONS requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || ((body !== undefined) && (typeof body !== 'string')) || ((contenttype !== undefined) && (typeof contenttype !== 'string'))) {
    throw new nl.sara.webdav.Exception('OPTIONS parameter; path, body and contenttype should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("OPTIONS", url, callback, headers);
  if ( body !== undefined ) {
    if (contenttype !== undefined) {
      ajax.setRequestHeader('Content-Type', contenttype);
    }else{
      ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    ajax.send(body);
  }else{
    ajax.send();
  }

  return this;
};

/**
 * Perform a WebDAV POST request
 *
 * @param    {String}                         path                                               The path to perform POST on
 * @param    {Function(status,body,headers)}  callback                                           Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         [body]                                             Optional; a body to include in the POST request.
 * @param    {String}                         [contenttype='application/x-www-form-urlencoded']  Optional; the content type of the body (i.e. value for the Content-Type header). If omitted, but body is specified, then 'application/x-www-form-urlencoded' is assumed
 * @param    {Array}                          headers                                            Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                                                             The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.post = function(path, callback, body, contenttype, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('POST requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || ((body !== undefined) && (typeof body !== 'string')) || ((contenttype !== undefined) && (typeof contenttype !== 'string'))) {
    throw new nl.sara.webdav.Exception('POST parameter; path, body and contenttype should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("POST", url, callback, headers);
  if ( body !== undefined ) {
    if (contenttype !== undefined) {
      ajax.setRequestHeader('Content-Type', contenttype);
    }else{
      ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    ajax.send(body);
  }else{
    ajax.send();
  }

  return this;
};

/**
 * Perform a WebDAV COPY request
 *
 * @param    {String}                         path                              The path to perform COPY on
 * @param    {Function(status,body,headers)}  callback                          Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         destination                       The destination to copy to. Should be either a full URL or a path from the root on this server (i.e. it should start with a /)
 * @param    {Integer}                        [overwriteMode=SILENT_OVERWRITE]  Optional; Specify what to do when destination resource already exists. Should be either FAIL_ON_OVERWRITE or SILENT_OVERWRITE. The default is SILENT_OVERWRITE.
 * @param    {String}                         [depth]                           Optional; Should be '0' or 'infinity'. This is used in case of a collection; 0 means only copy the collection itself, infinity means copy also everything contained in the collection
 * @param    {Array}                          headers                           Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                                            The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.copy = function(path, callback, destination, overwriteMode, depth, headers) {
  if ((path === undefined) || (callback === undefined) || (destination === undefined)) {
    throw new nl.sara.webdav.Exception('COPY requires the parameters path, callback and destination', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || (typeof destination !== "string")){
    throw new nl.sara.webdav.Exception('COPY parameter; path and destination should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // If the destination starts with a / it is a absolute url on the same host, so prepare a complete URL
  if (destination.substr(0,1) === '/') {
    destination = this.getUrl(destination);
  } // Else I assume it is a complete URL already

  // And then send the request
  var ajax = this.getAjax("COPY", url, callback, headers);
  ajax.setRequestHeader('Destination', destination);
  if (depth !== undefined) {
    if ((depth !== 0) && (depth !== 'infinity')) {
      throw new nl.sara.webdav.Exception("COPY parameter; depth should be '0' or 'infinity'", nl.sara.webdav.Exception.WRONG_VALUE);
    }
    ajax.setRequestHeader('Depth', depth);
  }
  if (overwriteMode === nl.sara.webdav.Client.FAIL_ON_OVERWRITE) {
    ajax.setRequestHeader('Overwrite', 'F');
  }
  ajax.send();

  return this;
};

/**
 * Perform a WebDAV MOVE request
 *
 * @param    {String}                         path                              The path to perform MOVE on
 * @param    {Function(status,body,headers)}  callback                          Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         destination                       The destination to move to. Should be either a full URL or a path from the root on this server (i.e. it should start with a /)
 * @param    {Number}                         [overwriteMode=SILENT_OVERWRITE]  Optional; Specify what to do when destination resource already exists. Should be either FAIL_ON_OVERWRITE, TRUNCATE_ON_OVERWRITE or SILENT_OVERWRITE. The default is SILENT_OVERWRITE.
 * @param    {Array}                          headers                           Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                                            The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.move = function(path, callback, destination, overwriteMode, headers) {
  if ((path === undefined) || (callback === undefined) || (destination === undefined)) {
    throw new nl.sara.webdav.Exception('MOVE requires the parameters path, callback and destination', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || (typeof destination !== "string")){
    throw new nl.sara.webdav.Exception('MOVE parameter; path and destination should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // If the destination starts with a / it is a absolute url on the same host, so prepare a complete URL
  if (destination.substr(0,1) === '/') {
    destination = this.getUrl(destination);
  } // Else I assume it is a complete URL already

  // And then send the request
  var ajax = this.getAjax("MOVE", url, callback, headers);
  ajax.setRequestHeader('Destination', destination);
  if (overwriteMode === nl.sara.webdav.Client.FAIL_ON_OVERWRITE) {
    ajax.setRequestHeader('Overwrite', 'F');
  }else if (overwriteMode === nl.sara.webdav.Client.TRUNCATE_ON_OVERWRITE) {
    ajax.setRequestHeader('Overwrite', 'T');
  }
  ajax.send();

  return this;
};

/**
 * Perform a WebDAV LOCK request
 *
 * @param    {String}                         path      The path to perform LOCK on
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Document}                       body      Optional; The (XML DOM) document to parse and send as the request body
 * @param    {Array}                          headers   Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                    The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.lock = function(path, callback, body, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('LOCK requires the parameters path and callback', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || (!nl.sara.webdav.Ie.isIE && (body !== undefined) && !(body instanceof Document))) {
    throw new nl.sara.webdav.Exception('LOCK parameter; path should be a string, body should be an instance of Document', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // Parse the body
  var serializer = new XMLSerializer();
  var body = '<?xml version="1.0" encoding="utf-8" ?>' + serializer.serializeToString(body);

  // And then send the request
  var ajax = null;
  ajax = this.getAjax("LOCK", url, callback, headers);
  if (body !== undefined) {
    ajax.setRequestHeader('Content-Type', 'application/xml; charset="utf-8"');
    ajax.send(body);
  }else{
    ajax.send();
  }

  return this;
};

/**
 * Perform a WebDAV UNLOCK request
 *
 * @param    {String}                         path       The path to perform UNLOCK on
 * @param    {Function(status,body,headers)}  callback   Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {String}                         lockToken  The lock token to unlock
 * @param    {Array}                          headers    Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                     The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.unlock = function(path, callback, lockToken, headers) {
  if ((path === undefined) || (callback === undefined) || (lockToken === undefined)) {
    throw new nl.sara.webdav.Exception('UNLOCK requires the parameters path, callback and lockToken', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ( (typeof path !== "string") || (typeof lockToken !== "string") ){
    throw new nl.sara.webdav.Exception('UNLOCK parameter; path and lockToken should be strings', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // And then send the request
  headers['Lock-Token'] = lockToken;
  var ajax = null;
  ajax = this.getAjax("UNLOCK", url, callback, headers);
  ajax.send();

  return this;
};

/**
 * Prepares a XMLHttpRequest object to be used for an AJAX request
 *
 * @static
 * @param    {String}                         method    The HTTP/webDAV method to use (e.g. GET, POST, PROPFIND)
 * @param    {String}                         url       The url to connect to
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Array}                          headers   Additional headers to set
 * @returns  {XMLHttpRequest}                           A prepared XMLHttpRequest
 */
nl.sara.webdav.Client.prototype.getAjax = function(method, url, callback, headers) {
  var /** @type XMLHttpRequest */ ajax = ( ( ( typeof Components !== 'undefined' ) && ( typeof Components.classes !== 'undefined' ) ) ? Components.classes["@mozilla.org/xmlextras/xmlhttprequest;1"].createInstance(Components.interfaces.nsIXMLHttpRequest) : new XMLHttpRequest());
  if ( this._username !== null ) {
    ajax.open( method, url, true, this._username, this._password );
  }else{
    ajax.open( method, url, true );
  }
  ajax.onreadystatechange = function() {
    nl.sara.webdav.Client.ajaxHandler( ajax, callback );
  };
  
  if (headers === undefined) {
    headers = {};
  }
  for (var header in this._headers) {
    if (headers[header] === undefined) {
      ajax.setRequestHeader(header, this._headers[header]);
    }
  }
  for (var header in headers) {
    ajax.setRequestHeader(header, headers[header]);
  }
  return ajax;
};

/**
 * AJAX request handler. Parses Multistatus (if available) and call a user specified callback function
 *
 * @static
 * @param    {XMLHttpRequest}                 ajax      The XMLHttpRequest object which performed the request
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @returns  {void}
 */
nl.sara.webdav.Client.ajaxHandler = function(ajax, callback) {
  if (ajax.readyState === 4){ //if request has completed
    var body = ajax.responseText;
    if (ajax.status === 207) {
      // Parse the response to a Multistatus object
      for (var counter = 0; counter < ajax.responseXML.childNodes.length; counter++) {
        if (nl.sara.webdav.Ie.getLocalName(ajax.responseXML.childNodes.item(counter)) === 'multistatus') {
          body = new nl.sara.webdav.Multistatus(ajax.responseXML.childNodes.item(counter));
          break;
        }
      }
    }
    callback(ajax.status, body, ajax.getAllResponseHeaders());
  }
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Codec is already defined, we have a namespace clash!
if (nl.sara.webdav.Codec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace name nl.sara.webdav.Codec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class A codec transcodes the xml to a custom Javascript object
 *
 * @param  {String}                    [namespace]  Optional; The namespace of the property to transcode
 * @param  {String}                    [tagname]    Optional; The tag name of the property to transcode
 * @param  {function(mixed[,xmlDoc])}  [toXML]      Optional; Function which should return a Document with the NodeList of the documentElement as the value of this property
 * @param  {function(NodeList)}        [fromXML]    Optional; Functions which should return a representation of xmlvalue
 * @property  {String}                    namespace  The namespace of the property to transcode
 * @property  {String}                    tagname    The tag name of the property to transcode
 * @property  {function(mixed[,xmlDoc])}  toXML      Function which should return a Document with the NodeList of the documentElement as the value of this property
 * @property  {function(NodeList)}        fromXML    Functions which should return a representation of xmlvalue
 */
nl.sara.webdav.Codec = function(namespace, tagname, toXML, fromXML) {
  // First define public attributes
  Object.defineProperty(this, 'namespace', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'tagname', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'toXML', {
    'value': undefined,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  // Second define public attributes
  Object.defineProperty(this, 'fromXML', {
    'value': undefined,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if (namespace !== undefined) {
    this.namespace = namespace;
  }
  if (tagname !== undefined) {
    this.tagname = tagname;
  }
  if (toXML !== undefined) {
    this.toXML = toXML;
  }
  if (fromXML !== undefined) {
    this.fromXML = fromXML;
  }
};

// End of file

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Multistatus is already defined, we have a namespace clash!
if (nl.sara.webdav.Multistatus !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Multistatus already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class WebDAV Multistatus response body
 *
 * @param  {Node}  [xmlNode]  Optional; the xmlNode describing the multistatus object (should be compliant with RFC 4918)
 * @property  {String}  responsedescription  The response description
 */
nl.sara.webdav.Multistatus = function(xmlNode) {
  // First define private attributes
  Object.defineProperty(this, '_responses', {
    'value': {},
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  // Second define public attributes
  Object.defineProperty(this, 'responsedescription', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if (typeof xmlNode !== 'undefined') {
    if ((xmlNode.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(xmlNode) !== 'multistatus')) {
      throw new nl.sara.webdav.Exception('Node is not of type DAV:multistatus', nl.sara.webdav.Exception.WRONG_XML);
    }
    var data = xmlNode.childNodes;
    for (var i = 0; i < data.length; i++) {
      var child = data.item(i);
      if ((child.namespaceURI === null) || (child.namespaceURI !== 'DAV:')) { // Skip if not from the right namespace
        continue;
      }
      switch (nl.sara.webdav.Ie.getLocalName(child)) {
        case 'responsedescription': // responsedescription is always CDATA, so just take the text
          this.responsedescription = child.childNodes.item(0).nodeValue;
          break;
        case 'response': // response node should be parsed further
          var response = new nl.sara.webdav.Response(child);
          var responseChilds = child.childNodes;
          var hrefs = [];
          for (var j = 0; j < responseChilds.length; j++) {
            var responseChild = responseChilds.item(j);
            if ((nl.sara.webdav.Ie.getLocalName(responseChild) === 'href') && (responseChild.namespaceURI !== null) && (responseChild.namespaceURI === 'DAV:')) { // For each HREF element we create a separate response object
              hrefs.push(responseChild.childNodes.item(0).nodeValue);
            }
          }
          if (hrefs.length > 1) { // Multiple HREFs = start copying the response (this makes sure it is not parsed over and over again). No deep copying needed; there can't be a propstat
            for (var k = 0; k < hrefs.length; k++) {
              var copyResponse = new nl.sara.webdav.Response();
              copyResponse.href = hrefs[k];
              copyResponse.status = response.status;
              copyResponse.error = response.error;
              copyResponse.responsedescription = response.responsedescription;
              copyResponse.location = response.location;
              this.addResponse(copyResponse);
            }
          }else{
            this.addResponse(response);
          }
        break;
      }
    }
  }
};

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Adds a Response
 *
 * @param    {nl.sara.webdav.Response}     response  The response
 * @returns  {nl.sara.webdav.Multistatus}            The multistatus itself for chaining methods
 */
nl.sara.webdav.Multistatus.prototype.addResponse = function(response) {
  if (!nl.sara.webdav.Ie.isIE && !(response instanceof nl.sara.webdav.Response)) {
    throw new nl.sara.webdav.Exception('Response should be instance of Response', nl.sara.webdav.Exception.WRONG_TYPE);
  }
  var name = response.href;
  this._responses[name] = response;
  return this;
};

/**
 * Gets a Response
 *
 * @param    {String}    name           The name of the response to get
 * @returns  {nl.sara.webdav.Response}  The value of the WebDAV property or undefined if the WebDAV property doesn't exist
 */
nl.sara.webdav.Multistatus.prototype.getResponse = function(name) {
  return this._responses[name];
};

/**
 * Gets the response names
 *
 * @returns  {String[]}  The names of the different responses
 */
nl.sara.webdav.Multistatus.prototype.getResponseNames = function() {
  return Object.keys(this._responses);
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Property is already defined, we have a namespace clash!
if (nl.sara.webdav.Property !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace name nl.sara.webdav.Property already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class a WebDAV property
 *
 * @param  {Node}      [xmlNode]              Optional; The xmlNode describing the propstat object (should be compliant with RFC 4918)
 * @param  {Number}    [status]               Optional; The (HTTP) status code
 * @param  {String}    [responsedescription]  Optional; The response description
 * @param  {String[]}  [errors]               Optional; An array of errors
 * @property  {String}    namespace            The namespace
 * @property  {String}    tagname              The tag name
 * @property  {NodeList}  xmlvalue             A NodeList with the value of this property
 * @property  {Number}    status               The (HTTP) status code
 * @property  {String}    responsedescription  The response description
 */
nl.sara.webdav.Property = function(xmlNode, status, responsedescription, errors) {
  // First define private attributes
  Object.defineProperty(this, '_xmlvalue', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_errors', {
    'value': [],
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  // Second define public attributes
  Object.defineProperty(this, 'namespace', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'tagname', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'status', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'responsedescription', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if ((typeof xmlNode !== 'undefined') && (xmlNode.nodeType === 1)) {
    this.namespace = xmlNode.namespaceURI;
    this.tagname = nl.sara.webdav.Ie.getLocalName(xmlNode);
    this.xmlvalue = xmlNode.childNodes;
  }
  if (status !== undefined) {
    this.status = status;
  }
  if (responsedescription !== undefined) {
    this.responsedescription = responsedescription;
  }
  if (errors instanceof Array) {
    for (var i = 0; i < errors.length; i++) {
      this.addError(errors[i]);
    }
  }
};

//######################### DEFINE PUBLIC ATTRIBUTES ###########################
(function() {
  // This creates a (private) static variable. It will contain all codecs
  var codecNamespaces = {};

  Object.defineProperty(nl.sara.webdav.Property.prototype, 'xmlvalue', {
    'set': function(value) {
      if (value === null) {
        this._xmlvalue = null;
        return;
      }
      if (!nl.sara.webdav.Ie.isIE && !(value instanceof NodeList)) {
        throw new nl.sara.webdav.Exception('xmlvalue must be an instance of NodeList', nl.sara.webdav.Exception.WRONG_TYPE);
      }
      this._xmlvalue = value;
    },
    'get': function() {
      return this._xmlvalue;
    }
  });

//########################## DEFINE PUBLIC METHODS #############################
  /**
   * Adds functions to encode or decode properties
   *
   * This allows exact control in how Property.xmlvalue is parsed when
   * getParsedValue() is called or how it is rebuild when
   * setValueAndRebuildXml() is called. You can specify two functions: 'fromXML'
   * and 'toXML'. These should be complementary. That is, toXML should be able
   * to create a NodeList based on the output of fromXML. For example:
   * A == toXML(fromXML(A)) &&
   * B == fromXML(toXML(B))
   *
   * @param    {nl.sara.webdav.Codec}  codec  The codec to add
   * @returns  {void}
   */
  nl.sara.webdav.Property.addCodec = function(codec) {
    if (typeof codec.namespace !== 'string') {
      throw new nl.sara.webdav.Exception('addCodec: codec.namespace must be a String', nl.sara.webdav.Exception.WRONG_TYPE);
    }
    if (typeof codec.tagname !== 'string') {
      throw new nl.sara.webdav.Exception('addCodec: codec.tagname must be a String', nl.sara.webdav.Exception.WRONG_TYPE);
    }
    if (codecNamespaces[codec.namespace] === undefined) {
      codecNamespaces[codec.namespace] = {};
    }
    codecNamespaces[codec.namespace][codec.tagname] = {
      'fromXML': (codec.fromXML ? codec.fromXML : undefined),
      'toXML': (codec.toXML ? codec.toXML : undefined)
    };
  };

  /**
   * Sets a new value and rebuilds xmlvalue
   *
   * If a codec for this property is specified, it will use this codec to
   * rebuild xmlvallue. Else it will attempt to create one CDATA element with
   * the string value of whatever was fiven as parameter.
   *
   * @param   {mixed}  value  The object to base the xmlvalue on
   * @return  {void}
   */
  nl.sara.webdav.Property.prototype.setValueAndRebuildXml = function(value) {
    // Call codec to automatically create correct 'xmlvalue'
    var xmlDoc = document.implementation.createDocument(this.namespace, this.tagname, null);
    if ((codecNamespaces[this.namespace] === undefined) ||
        (codecNamespaces[this.namespace][this.tagname] === undefined) ||
        (codecNamespaces[this.namespace][this.tagname]['toXML'] === undefined)) {
      // No 'toXML' function set, so create a NodeList with just one CDATA node
      if (value !== null) { // If the value is NULL, then we should add anything to the NodeList
        var cdata = xmlDoc.createCDATASection(value);
        xmlDoc.documentElement.appendChild(cdata);
      }
      this._xmlvalue = xmlDoc.documentElement.childNodes;
    }else{
      this._xmlvalue = codecNamespaces[this.namespace][this.tagname]['toXML'](value, xmlDoc).documentElement.childNodes;
    }
  };

  /**
   * Parses the xmlvalue
   *
   * If a codec for this property is specified, it will use this codec to parse
   * the XML nodes. Else it will attempt to parse it as text or CDATA elements.
   *
   * @return  {mixed}  If a codec is specified, the return type depends on that
   * codec. If no codec is specified and at least one node in xmlvalue is not a
   * text or CDATA node, it will return undefined. If xmlvalue is empty, it will
   * return null.
   */
  nl.sara.webdav.Property.prototype.getParsedValue = function() {
    // Call codec to automatically create correct 'value'
    if (this._xmlvalue.length > 0) {
      if ((codecNamespaces[this.namespace] === undefined) ||
          (codecNamespaces[this.namespace][this.tagname] === undefined) ||
          (codecNamespaces[this.namespace][this.tagname]['fromXML'] === undefined)) {
        // No 'fromXML' function set, so try to create a text value based on TextNodes and CDATA nodes. If other nodes are present, set 'value' to null
        var parsedValue = '';
        for (var i = 0; i < this._xmlvalue.length; i++) {
          var node = this._xmlvalue.item(i);
          if ((node.nodeType === 3) || (node.nodeType === 4)) { // Make sure text and CDATA content is stored
            parsedValue += node.nodeValue;
          }else{ // If even one of the nodes is not text or CDATA, then we don't parse a text value at all
            parsedValue = undefined;
            break;
          }
        }
        return parsedValue;
      }else{
        return codecNamespaces[this.namespace][this.tagname]['fromXML'](this._xmlvalue);
      }
    }
    return null;
  };
})(); // Ends the static scope

/**
* Adds an error to this property
*
* @param    {Node}      error  The Node which represents the error
* @returns  {Property}         Itself for chaining multiple methods
*/
nl.sara.webdav.Property.prototype.addError = function(error) {
  if (!nl.sara.webdav.Ie.isIE && !(error instanceof Node)) {
    throw new nl.sara.webdav.Exception('Error must be an instance of Node', nl.sara.webdav.Exception.WRONG_TYPE);
  }
  this._errors.push(error);
  return this;
};

/**
* Returns all errors
*
* @returns {array} An array of Node representing the error
*/
nl.sara.webdav.Property.prototype.getErrors = function() {
  return this._errors;
};

/**
 * Overloads the default toString() method so it returns the value of this property
 *
 * @returns  {String}  A string representation of this property
 */
nl.sara.webdav.Property.prototype.toString = function() {
  return this.getParsedValue();
};

// End of Property

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Response is already defined, we have a namespace clash!
if (nl.sara.webdav.Response !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Response already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class a WebDAV response
 *
 * @param  {Node}  [xmlNode]  Optional; the xmlNode describing the response object (should be compliant with RFC 4918)
 * @property  {String}  href                 The path of the resource
 * @property  {String}  status               The (HTTP) status code
 * @property  {String}  error                The error text
 * @property  {String}  responsedescription  The response description
 * @property  {String}  location             In case of a 3XX response, the value that would normally be in the 'Location' header
 */
nl.sara.webdav.Response = function(xmlNode) {
  // First define private attributes
  Object.defineProperty(this, '_namespaces', {
    'value': {},
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  // Second define public attributes
  Object.defineProperty(this, 'href', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'status', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'error', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'responsedescription', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'location', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if (typeof xmlNode !== 'undefined') {
    if ((xmlNode.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(xmlNode) !== 'response')) {
      throw new nl.sara.webdav.Exception('Node is not of type DAV:response', nl.sara.webdav.Exception.WRONG_XML);
    }
    var data = xmlNode.childNodes;
    for (var i = 0; i < data.length; i++) {
      var child = data.item(i);
      if ((child.namespaceURI === null) || (child.namespaceURI !== 'DAV:')) { // Skip if not from the right namespace
        continue;
      }
      switch (nl.sara.webdav.Ie.getLocalName(child)) {
        case 'href':
        case 'status':
        case 'error':
        case 'responsedescription':
          // always CDATA, so just take the text
          this[nl.sara.webdav.Ie.getLocalName(child)] = child.childNodes.item(0).nodeValue;
          break;
        case 'location':
          this[nl.sara.webdav.Ie.getLocalName(child)] = child.childNodes.item(0).childNodes.item(0).nodeValue;
          break;
        case 'propstat': // propstat node should be parsed further
          var propstatChilds = child.childNodes;
          // First find status, error, responsedescription and props (as Node objects, not yet as Property objects)
          var status = null;
          var errors = [];
          var responsedescription = null;
          var props = [];
          for (var j = 0; j < propstatChilds.length; j++) { // Parse the child nodes of the propstat element
            var propstatChild = propstatChilds.item(j);
            if ((propstatChild.nodeType !== 1) || (propstatChild.namespaceURI !== 'DAV:')) {
              continue;
            }
            switch (nl.sara.webdav.Ie.getLocalName(propstatChild)) {
              case 'prop':
                for (var k = 0; k < propstatChild.childNodes.length; k++) {
                  props.push(propstatChild.childNodes.item(k));
                }
                break;
              case 'error':
                for (k = 0; k < propstatChild.childNodes.length; k++) {
                  errors.push(propstatChild.childNodes.item(k));
                }
                break;
                break;
              case 'status': // always CDATA, so just take the text
                status = propstatChild.childNodes.item(0).nodeValue;
                status = parseInt(status.substr(status.indexOf(' ') + 1, 3));
                break;
              case 'responsedescription': // always CDATA, so just take the text
                responsedescription = propstatChild.childNodes.item(0).nodeValue;
              break;
            }
          }

          // Then create and add a new property for each element found in DAV:prop
          for (j = 0; j < props.length; j++) {
            if (props[j].nodeType === 1) {
              var property = new nl.sara.webdav.Property(props[j], status, responsedescription, errors);
              this.addProperty(property);
            }
          }
        break;
      }
    }
  }
};

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Adds a WebDAV property
 *
 * @param    {nl.sara.webdav.Property}  property  The property
 * @returns  {nl.sara.webdav.Response}            The response itself for chaining methods
 */
nl.sara.webdav.Response.prototype.addProperty = function(property) {
  if (!nl.sara.webdav.Ie.isIE && !(property instanceof nl.sara.webdav.Property)) {
    throw new nl.sara.webdav.Exception('Response property should be instance of Property', nl.sara.webdav.Exception.WRONG_TYPE);
  }
  var namespace = property.namespace;
  if (typeof namespace !== 'string') {
    namespace = '';
  }
  if (this._namespaces[namespace] === undefined) {
    this._namespaces[namespace] = {};
  }

  this._namespaces[namespace][property.tagname] = property;
  return this;
};

/**
 * Gets a WebDAV property
 *
 * @param    {String}                   namespace  The namespace of the WebDAV property
 * @param    {String}                   prop       The WebDAV property to get
 * @returns  {nl.sara.webdav.Property}             The value of the WebDAV property or undefined if the WebDAV property doesn't exist
 */
nl.sara.webdav.Response.prototype.getProperty = function(namespace, prop) {
  if ((this._namespaces[namespace] === undefined) || (this._namespaces[namespace][prop] === undefined)) {
    return undefined;
  }
  return this._namespaces[namespace][prop];
};

/**
 * Gets the namespace names
 *
 * @returns  {String[]}  The names of the different namespaces
 */
nl.sara.webdav.Response.prototype.getNamespaceNames = function() {
  return Object.keys(this._namespaces);
};

/**
 * Gets the property names of a namespace
 *
 * @param    {String}    namespace  The namespace of the WebDAV property
 * @returns  {String[]}             The names of the different properties of a namespace
 */
nl.sara.webdav.Response.prototype.getPropertyNames = function(namespace) {
  if (this._namespaces[namespace] === undefined) {
    return new Array();
  }
  return Object.keys(this._namespaces[namespace]);
};

// End of library

/*
 * Copyright ©2014 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.Principal_collection_setCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.Principal_collection_setCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.Principal_collection_setCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: principal-collection-setCodec to an array with the uri's object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.Principal_collection_setCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.Principal_collection_setCodec.namespace = 'DAV:';
nl.sara.webdav.codec.Principal_collection_setCodec.tagname = 'principal-collection-set';

nl.sara.webdav.codec.Principal_collection_setCodec.fromXML = function(nodelist) {
  var collections = [];
  for ( var key = 0; key < nodelist.length; key++ ) {
    var node = nodelist.item( key );
    if ( ( node.nodeType === 1 ) && ( node.localName === 'href' ) && ( node.namespaceURI === 'DAV:' ) ) { // Only extract data from DAV: href nodes
      var href = '';
      for ( var subkey = 0; subkey < node.childNodes.length; subkey++ ) {
        var childNode = node.childNodes.item( subkey );
        if ( ( childNode.nodeType === 3 ) || ( childNode.nodeType === 4 ) ) { // Make sure text and CDATA content is stored
          href += childNode.nodeValue;
        }
      }
      collections.push( href );
    }
  }
  return collections;
};

nl.sara.webdav.codec.Principal_collection_setCodec.toXML = function(value, xmlDoc){
  for ( var key in value ) {
    var href = xmlDoc.createElementNS( 'DAV:', 'href' );
    href.appendChild( xmlDoc.createCDATASection( value[ key ] ) );
    xmlDoc.documentElement.appendChild( href );
  }
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.Principal_collection_setCodec);

// End of file
/*
 * Copyright ©2014 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.Inherited_acl_setCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.Inherited_acl_setCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.Inherited_acl_setCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: inherited-acl-set to an array with the uri's object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.Inherited_acl_setCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.Inherited_acl_setCodec.namespace = 'DAV:';
nl.sara.webdav.codec.Inherited_acl_setCodec.tagname = 'inherited-acl-set';

nl.sara.webdav.codec.Inherited_acl_setCodec.fromXML = nl.sara.webdav.codec.Principal_collection_setCodec.fromXML;
nl.sara.webdav.codec.Inherited_acl_setCodec.toXML = nl.sara.webdav.codec.Principal_collection_setCodec.toXML;

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.Inherited_acl_setCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Ace is already defined, we have a namespace clash!
if (nl.sara.webdav.Ace !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Ace already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class WebDAV property
 *
 * @param  {Node}  [xmlNode]  Optional; the xmlNode describing the ace object (should be compliant with RFC 3744)
 * @property  {mixed}    principal        The principal. Is one of the class constants ALL, AUTHENTICATED, UNAUTHENTICATED or SELF or a String with the path to the principal or a property. See RFC 3744 for more information on this.
 * @property  {Boolean}  invertprincipal  Whether to invert the principal; true means 'all principals except the one specified'. Default is false.
 * @property  {Boolean}  isprotected      Whether this ACE is protected. Default is false.
 * @property  {Number}   grantdeny        Grant or deny ACE? Is one of the class constants GRANT or DENY.
 * @property  {mixed}    inherited        False if the ACE is not inherited, else a String with the path to the parent collection from which this ACE is inherited.
 */
nl.sara.webdav.Ace = function(xmlNode) {
  // First define private attributes
  Object.defineProperty(this, '_namespaces', {
    'value': {},
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_principal', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_invertprincipal', {
    'value': false,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_grantdeny', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_isprotected', {
    'value': false,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, '_inherited', {
    'value': false,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  function parsePrincipal(object, child) {
    if (!nl.sara.webdav.Ie.isIE && !(child instanceof Node)) {
      throw new nl.sara.webdav.Exception('Principal XML node not recognized!', nl.sara.webdav.Exception.WRONG_XML);
    }
    for (var j = 0; j < child.childNodes.length; j++) {
      var principal = child.childNodes.item(j);
      if ((principal.nodeType !== 1) || (principal.namespaceURI === null) || (principal.namespaceURI !== 'DAV:')) { // Skip if not from the right namespace
        continue;
      }
      switch (nl.sara.webdav.Ie.getLocalName(principal)) {
        case 'href':
          object.principal = principal.childNodes.item(0).nodeValue;
          break;
        case 'all':
          object.principal = nl.sara.webdav.Ace.ALL;
          break;
        case 'authenticated':
          object.principal = nl.sara.webdav.Ace.AUTHENTICATED;
          break;
        case 'unauthenticated':
          object.principal = nl.sara.webdav.Ace.UNAUTHENTICATED;
          break;
        case 'property':
          for (var k = 0; k < principal.childNodes.length; k++) {
            var element = principal.childNodes.item(k);
            if (element.nodeType !== 1) {
              continue;
            }
            var prop = new nl.sara.webdav.Property(element);
            object.principal = prop;
            break;
          }
          break;
        case 'self':
          object.principal = nl.sara.webdav.Ace.SELF;
          break;
        default:
          throw new nl.sara.webdav.Exception('Principal XML Node contains illegal child node: ' + nl.sara.webdav.Ie.getLocalName(principal), nl.sara.webdav.Exception.WRONG_XML);
        break;
      }
    }
  }

  function parsePrivileges(object, privilegeList) {
    for (var i = 0; i < privilegeList.length; i++) {
      var privilege = privilegeList.item(i);
      if ( ( privilege.nodeType === 1 ) &&
           ( privilege.namespaceURI === 'DAV:' ) &&
           ( nl.sara.webdav.Ie.getLocalName( privilege ) === 'privilege' ) ) {
        object.addPrivilege( new nl.sara.webdav.Privilege( privilege.childNodes[0] ) );
      }
    }
  }

  // Parse the XML
  if (typeof xmlNode !== 'undefined') {
    if ((xmlNode.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(xmlNode) !== 'ace')) {
      throw new nl.sara.webdav.Exception('Node is not of type DAV:ace', nl.sara.webdav.Exception.WRONG_XML);
    }
    var data = xmlNode.childNodes;
    for (var i = 0; i < data.length; i++) {
      var child = data.item(i);
      if ((child.namespaceURI === null) || (child.namespaceURI !== 'DAV:')) { // Skip if not from the right namespace
        continue;
      }
      switch (nl.sara.webdav.Ie.getLocalName(child)) {
        case 'principal':
          this.invertprincipal = false;
          parsePrincipal(this, child);
          break;
        case 'invert':
          this.invertprincipal = true;
          for (var j = 0; j < child.childNodes.length; j++) {
            var element = child.childNodes.item(j);
            if ((element.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(element) !== 'principal')) {
              continue;
            }
            parsePrincipal(this, element);
          }
          break;
        case 'grant':
          this.grantdeny = nl.sara.webdav.Ace.GRANT;
          parsePrivileges(this, child.childNodes);
          break;
        case 'deny':
          this.grantdeny = nl.sara.webdav.Ace.DENY;
          parsePrivileges(this, child.childNodes);
          break;
        case 'protected':
          this.isprotected = true;
          break;
        case 'inherited':
          for (var j = 0; j < child.childNodes.length; j++) {
            var element = child.childNodes.item(j);
            if ((element.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(element) !== 'href')) {
              continue;
            }
            this.inherited = child.childNodes.item(j).childNodes.item(0).nodeValue;
          }
        break;
      }
    }
  }
};

/**#@+
 * Class constant
 */
nl.sara.webdav.Ace.GRANT = 1;
nl.sara.webdav.Ace.DENY = 2;
nl.sara.webdav.Ace.ALL = 3;
nl.sara.webdav.Ace.AUTHENTICATED = 4;
nl.sara.webdav.Ace.UNAUTHENTICATED = 5;
nl.sara.webdav.Ace.SELF = 6;
/**#@-*/

//######################### DEFINE PUBLIC ATTRIBUTES ###########################
Object.defineProperty(nl.sara.webdav.Ace.prototype, 'principal', {
  'set': function(value) {
    switch (value) {
      case nl.sara.webdav.Ace.ALL:
      case nl.sara.webdav.Ace.AUTHENTICATED:
      case nl.sara.webdav.Ace.UNAUTHENTICATED:
      case nl.sara.webdav.Ace.SELF:
        break;
      default: // If it isn't one of the constants, it should be either a Property object or a string/URL
        if (!nl.sara.webdav.Ie.isIE && !(value instanceof nl.sara.webdav.Property)) {
          value = String(value);
        }
      break;
    }
    this._principal = value;
  },
  'get': function() {
    return this._principal;
  }
});

Object.defineProperty(nl.sara.webdav.Ace.prototype, 'invertprincipal', {
  'set': function(value) {
    this._invertprincipal = Boolean(value);
  },
  'get': function() {
    return this._invertprincipal;
  }
});

Object.defineProperty(nl.sara.webdav.Ace.prototype, 'isprotected', {
  'set': function(value) {
    this._isprotected = Boolean(value);
  },
  'get': function() {
    return this._isprotected;
  }
});

Object.defineProperty(nl.sara.webdav.Ace.prototype, 'grantdeny', {
  'set': function(value) {
    if ((value !== nl.sara.webdav.Ace.GRANT) && (value !== nl.sara.webdav.Ace.DENY)) {
      throw new nl.sara.webdav.Exception('grantdeny must be either nl.sara.webdav.Ace.GRANT or nl.sara.webdav.Ace.DENY', nl.sara.webdav.Exception.WRONG_VALUE);
    }
    this._grantdeny = value;
  },
  'get': function() {
    return this._grantdeny;
  }
});

Object.defineProperty(nl.sara.webdav.Ace.prototype, 'inherited', {
  'set': function(value) {
    if (Boolean(value)) {
      this._inherited = String(value);
    }else{
      this._inherited = false;
    }
  },
  'get': function() {
    return this._inherited;
  }
});

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Adds a WebDAV privilege
 *
 * @param    {nl.sara.webdav.Privilege}  privilege  The privilege to add
 * @returns  {nl.sara.webdav.Ace}                   The ace itself for chaining methods
 */
nl.sara.webdav.Ace.prototype.addPrivilege = function(privilege) {
  if (!nl.sara.webdav.Ie.isIE && !(privilege instanceof nl.sara.webdav.Privilege)) {
    throw new nl.sara.webdav.Exception('Privilege should be instance of Privilege', nl.sara.webdav.Exception.WRONG_TYPE);
  }
  var namespace = privilege.namespace;
  if (namespace) {
    if (this._namespaces[namespace] === undefined) {
      this._namespaces[namespace] = {};
    }
  }else{
    throw new nl.sara.webdav.Exception('Privilege should have a namespace', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  this._namespaces[namespace][privilege.tagname] = privilege;
  return this;
};

/**
 * Gets a WebDAV privilege
 *
 * @param    {String}                    namespace  The namespace of the privilege
 * @param    {String}                    privilege  The privilege to get
 * @returns  {nl.sara.webdav.Privilege}             The value of the privilege or undefined if the privilege doesn't exist
 */
nl.sara.webdav.Ace.prototype.getPrivilege = function(namespace, privilege) {
  if ((this._namespaces[namespace] === undefined) || (this._namespaces[namespace][privilege] === undefined)) {
    return undefined;
  }
  return this._namespaces[namespace][privilege];
};

/**
 * Gets the namespace names
 *
 * @returns  {String[]}  The names of the different namespaces
 */
nl.sara.webdav.Ace.prototype.getNamespaceNames = function() {
  return Object.keys(this._namespaces);
};

/**
 * Gets the privilege names of a namespace
 *
 * @param    {String}    namespace  The namespace of the privilege
 * @returns  {String[]}             The names of the different privilege of a namespace
 */
nl.sara.webdav.Ace.prototype.getPrivilegeNames = function(namespace) {
  if (this._namespaces[namespace] === undefined) {
    return new Array();
  }
  return Object.keys(this._namespaces[namespace]);
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.AclCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.AclCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.AclCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: acl to an nl.sara.webdav.Acl object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.AclCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.AclCodec.namespace = 'DAV:';
nl.sara.webdav.codec.AclCodec.tagname = 'acl';

nl.sara.webdav.codec.AclCodec.fromXML = function(nodelist) {
  // The constructor of Acl will parse a DAV: acl node itself, so just make sure this nodelist is part of a DAV: acl node
  var xmlDoc = document.implementation.createDocument("DAV:", "acl", null);
  var acl = xmlDoc.documentElement;
  for (var i = 0; i < nodelist.length; i++) {
    acl.appendChild( xmlDoc.importNode( nodelist.item( i ), true ) );
  }
  return new nl.sara.webdav.Acl(acl);
};

nl.sara.webdav.codec.AclCodec.toXML = function(acl, xmlDoc){
  var aclLength = acl.getLength();
  for (var i = 0; i < aclLength; i++) { // Loop over the ACE's in this ACL
    var ace = acl.getAce(i);
    var aceBody = xmlDoc.createElementNS('DAV:', 'ace');

    // First create a principal node
    var principal = xmlDoc.createElementNS('DAV:', 'principal');
    var princVal = ace.principal;
    switch (princVal) {
      case nl.sara.webdav.Ace.ALL:
        principal.appendChild(xmlDoc.createElementNS('DAV:', 'all'));
        break;
      case nl.sara.webdav.Ace.AUTHENTICATED:
        principal.appendChild(xmlDoc.createElementNS('DAV:', 'authenticated'));
        break;
      case nl.sara.webdav.Ace.UNAUTHENTICATED:
        principal.appendChild(xmlDoc.createElementNS('DAV:', 'unauthenticated'));
        break;
      case nl.sara.webdav.Ace.SELF:
        principal.appendChild(xmlDoc.createElementNS('DAV:', 'self'));
        break;
      default: // If it isn't one of the constants, it should be either a Property object or a string/URL
        if (typeof princVal === 'string') { // It is a string; the URL of the principal
          var href = xmlDoc.createElementNS('DAV:', 'href');
          href.appendChild(xmlDoc.createCDATASection(princVal));
          principal.appendChild(href);
        }else{ // And else it is a property
          var property = xmlDoc.createElementNS('DAV:', 'property');
          var prop = xmlDoc.createElementNS(princVal.namespace, princVal.tagname);
          if (princVal.xmlvalue !== null) {
            for (var j = 0; j < princVal.xmlvalue.length; j++) {
              var nodeCopy = xmlDoc.importNode(princVal.xmlValue.item(j), true);
              prop.appendChild(nodeCopy);
            }
          }
          property.appendChild(prop);
          principal.appendChild(property);
        }
      break;
    }

    // If the principal should be inverted, put it in an 'invert' element
    if (ace.invertprincipal) {
      var invert = xmlDoc.createElementNS('DAV:', 'invert');
      invert.appendChild(principal);
      aceBody.appendChild(invert);
    }else{
      aceBody.appendChild(principal);
    }

    // Then prepare the privileges
    // grant or deny?
    var privilegeParent = null;
    if (ace.grantdeny === nl.sara.webdav.Ace.DENY) {
      privilegeParent = xmlDoc.createElementNS('DAV:', 'deny');
    }else if (ace.grantdeny === nl.sara.webdav.Ace.GRANT) {
      privilegeParent = xmlDoc.createElementNS('DAV:', 'grant');
    }else{
      throw new nl.sara.webdav.Exception('\'grantdeny\' property not set on one of the ACE\'s in this ACL', nl.sara.webdav.Exception.WRONG_VALUE);
    }
    var namespaces = ace.getNamespaceNames();
    for (j = 0; j < namespaces.length; j++) { // loop through namespaces
      var namespace = namespaces[j];
      var privileges = ace.getPrivilegeNames(namespace);
      for (var k = 0; k < privileges.length; k++) { // loop through each privilege in this namespace
        var privilege = ace.getPrivilege(namespace, privileges[k]);
        var privilegeElement = xmlDoc.createElementNS('DAV:', 'privilege');
        var priv = xmlDoc.createElementNS(privilege.namespace, privilege.tagname);
        if (privilege.xmlvalue !== null) {
          for (var l = 0; l < privilege.xmlvalue.length; l++) {
            var nodeCopy = xmlDoc.importNode(privilege.xmlValue.item(j), true);
            priv.appendChild(nodeCopy);
          }
        }
        privilegeElement.appendChild(priv);
        privilegeParent.appendChild(privilegeElement);
      }
    }
    aceBody.appendChild(privilegeParent);

    xmlDoc.documentElement.appendChild(aceBody);
  }
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.AclCodec);

// End of file

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Acl is already defined, we have a namespace clash!
if (nl.sara.webdav.Acl !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Acl already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Access Control List
 *
 * @param  {Node}  [xmlNode]  Optional; the xmlNode describing the acl object (should be compliant with RFC 3744)
 */
nl.sara.webdav.Acl = function(xmlNode) {
  // First define private attributes
  Object.defineProperty(this, '_aces', {
    'value': [],
    'enumerable': false,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  // Parse the XML
  if (typeof xmlNode !== 'undefined') {
    if ((xmlNode.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(xmlNode) !== 'acl')) {
      throw new nl.sara.webdav.Exception('Node is not of type DAV:acl', nl.sara.webdav.Exception.WRONG_XML);
    }
    for (var i = 0; i < xmlNode.childNodes.length; i++) {
      var child = xmlNode.childNodes.item(i);
      if ((child.namespaceURI === null) || (child.namespaceURI !== 'DAV:') || (nl.sara.webdav.Ie.getLocalName(child) !== 'ace')) { // Skip if not the right element
        continue;
      }
      this.addAce(new nl.sara.webdav.Ace(child));
    }
  }
};

//########################## DEFINE PUBLIC METHODS #############################
/**
 * Adds an ACE
 *
 * @param    {nl.sara.webdav.Ace}  ace       The ACE to add
 * @param    {Number}              position  Optional; The position to add this ACE. If the position is lower than 1, 0 is assumed, of the position is higher than the current length of the ACL or not specified, the ACE is appended to the end.
 * @returns  {nl.sara.webdav.Acl}            The ACL itself for chaining methods
 */
nl.sara.webdav.Acl.prototype.addAce = function(ace, position) {
  if (!nl.sara.webdav.Ie.isIE && !(ace instanceof nl.sara.webdav.Ace)) {
    throw new nl.sara.webdav.Exception('Ace should be instance of Ace', nl.sara.webdav.Exception.WRONG_TYPE);
  }
  if ((position === undefined) || (position > (this._aces.length - 1))) {
    this._aces.push(ace);
  }else{
    position = Number(position);
    if (position < 1) {
      this._aces.unshift(ace);
    }else{
      this._aces.splice(position, 0, ace);
    }
  }
  return this;
};

/**
 * Gets the ACL as an array
 *
 * @returns  {nl.sara.webdav.Ace[]}  An array of the ACE's in this ACL
 */
nl.sara.webdav.Acl.prototype.getAces = function() {
  return this._aces;
};

/**
 * Gets one ACE from a certain position
 *
 * @param    {Number}              position  The position of the ACE
 * @returns  {nl.sara.webdav.Ace}            The ACE
 */
nl.sara.webdav.Acl.prototype.getAce = function(position) {
  position = Number(position);
  if ((position < 0) || (position >= this.getLength())) {
    throw new nl.sara.webdav.Exception('No ACE found on position ' + position, nl.sara.webdav.Exception.UNEXISTING_PROPERTY);
  }
  return this._aces[position];
};

/**
 * Gets the length of the ACL
 *
 * @returns  {Number}  The length of the ACL
 */
nl.sara.webdav.Acl.prototype.getLength = function() {
  return this._aces.length;
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

/**
 * This plugin adds acl capabilities to the WebDAV client class
 */

/**
 * Perform a WebDAV ACL request
 *
 * @param    {String}                         path      The path to perform ACL on
 * @param    {Function(status,body,headers)}  callback  Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {nl.sara.webdav.Acl}             acl       The ACL to submit
 * @param    {Array}                          headers   Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                    The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.acl = function(path, callback, acl, headers) {
  if ((path === undefined) || (callback === undefined)) {
    throw new nl.sara.webdav.Exception('ACL requires the parameters path, callback and acl', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if (!(typeof path === "string") || (!nl.sara.webdav.Ie.isIE && !(acl instanceof nl.sara.webdav.Acl))) {
    throw new nl.sara.webdav.Exception('ACL parameter; path should be a string, acl should be an instance of Acl', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  var aclBody = document.implementation.createDocument("DAV:", "acl", null);
  aclBody = nl.sara.webdav.codec.AclCodec.toXML(acl, aclBody);

  // Create the request body string
  var serializer = new XMLSerializer();
  var body = '<?xml version="1.0" encoding="utf-8" ?>' + serializer.serializeToString(aclBody);

  // And then send the request
  var ajax = null;
  if (nl.sara.webdav.Ie.isIE) {
    if (url.lastIndexOf('?') !== -1) {
      url = url + '&_method=acl';
    }else{
      url = url + '?_method=acl';
    }
    ajax = this.getAjax('POST', url, callback, headers);
  }else{
    ajax = this.getAjax("ACL", url, callback, headers);
  }
  ajax.setRequestHeader('Content-Type', 'application/xml; charset="utf-8"');
  ajax.send(body);

  return this;
};

/**
 * Perform a WebDAV REPORT request
 *
 * @param    {String}                         path         The path to perform REPORT on
 * @param    {Function(status,body,headers)}  callback     Querying the server is done asynchronously, this callback function is called when the results are in
 * @param    {Document}                       body         The (XML DOM) document to parse and send as the request body
 * @param    {Array}                          headers      Optional; Additional headers to set
 * @returns  {nl.sara.webdav.Client}                       The client itself for chaining methods
 */
nl.sara.webdav.Client.prototype.report = function(path, callback, body, headers) {
  if ((path === undefined) || (callback === undefined) || (body === undefined)) {
    throw new nl.sara.webdav.Exception('REPORT requires the parameters path, callback and body', nl.sara.webdav.Exception.MISSING_REQUIRED_PARAMETER);
  }
  if ((typeof path !== "string") || (!nl.sara.webdav.Ie.isIE && !(body instanceof Document))) {
    throw new nl.sara.webdav.Exception('REPORT parameter; path should be a string, body should be an instance of Document', nl.sara.webdav.Exception.WRONG_TYPE);
  }

  // Get the full URL, based on the specified path
  var url = this.getUrl(path);

  // Parse the body
  var serializer = new XMLSerializer();
  var body = '<?xml version="1.0" encoding="utf-8" ?>' + serializer.serializeToString(body);

  // And then send the request
  var ajax = null;
  if (nl.sara.webdav.Ie.isIE) {
    if (url.lastIndexOf('?') !== -1) {
      url = url + '&_method=report';
    }else{
      url = url + '?_method=report';
    }
    ajax = this.getAjax('POST', url, callback, headers);
  }else{
    ajax = this.getAjax("REPORT", url, callback, headers);
  }
  ajax.setRequestHeader('Content-Type', 'application/xml; charset="utf-8"');
  ajax.send(body);

  return this;
};

// End of library

/*
 * Copyright ©2014 SURFsara bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.Current_user_privilege_setCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.Current_user_privilege_setCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.Current_user_privilege_setCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: current-user-privilege-set to an array of privileges
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.Current_user_privilege_setCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.Current_user_privilege_setCodec.namespace = 'DAV:';
nl.sara.webdav.codec.Current_user_privilege_setCodec.tagname = 'current-user-privilege-set';

nl.sara.webdav.codec.Current_user_privilege_setCodec.fromXML = function(nodelist) {
  var privileges = [];
  for ( var key = 0; key < nodelist.length; key++ ) {
    var node = nodelist.item( key );
    if ( ( node.nodeType === 1 )) {
      var privilege = new nl.sara.webdav.Privilege( node );
      privileges.push( privilege );
    }
  }
  return privileges;
};

nl.sara.webdav.codec.Current_user_privilege_setCodec.toXML = function(value, xmlDoc){
  for ( var key in value ) {
    var privilege = xmlDoc.createElementNS( value[ key ].namespace, value[ key ].tagname );
    xmlDoc.documentElement.appendChild( privilege );
  }
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.Current_user_privilege_setCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.Privilege is already defined, we have a namespace clash!
if (nl.sara.webdav.Privilege !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.Privilege already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class WebDAV ACL privilege
 *
 * @param  {Node}  [xmlNode]  Optional; the xmlNode describing the privilege object
 * @property  {String}    namespace  The namespace
 * @property  {String}    tagname    The tag name
 * @property  {NodeList}  xmlvalue   A NodeList with the value of this privilege
 */
nl.sara.webdav.Privilege = function(xmlNode) {
  // First define private attributes
  Object.defineProperty(this, '_xmlvalue', {
    'value': null,
    'enumerable': false,
    'configurable': false,
    'writable': true
  });
  // Second define public attributes
  Object.defineProperty(this, 'namespace', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });
  Object.defineProperty(this, 'tagname', {
    'value': null,
    'enumerable': true,
    'configurable': false,
    'writable': true
  });

  // Constructor logic
  if (typeof xmlNode !== 'undefined') {
    this.namespace = xmlNode.namespaceURI;
    this.tagname = nl.sara.webdav.Ie.getLocalName(xmlNode);
    this.xmlvalue = xmlNode.childNodes;
  }
};

//######################### DEFINE PUBLIC ATTRIBUTES ###########################
(function() {
  // This creates a (private) static variable. It will contain all codecs
  var codecNamespaces = {};

  Object.defineProperty(nl.sara.webdav.Privilege.prototype, 'xmlvalue', {
    'set': function(value) {
      if (value === null) {
        this._xmlvalue = null;
        return;
      }
      if (!nl.sara.webdav.Ie.isIE && !(value instanceof NodeList)) {
        throw new nl.sara.webdav.Exception('xmlvalue must be an instance of NodeList', nl.sara.webdav.Exception.WRONG_TYPE);
      }
      this._xmlvalue = value;
    },
    'get': function() {
      return this._xmlvalue;
    }
  });

//########################## DEFINE PUBLIC METHODS #############################
  /**
   * Adds functions to encode or decode properties
   *
   * This allows exact control in how Privilege.xmlvalue is parsed when
   * getParsedValue() is called and how XML is rebuild when
   * setValueAndRebuildXml() is called. You can specify two functions: 'fromXML
   * and 'toXML'. These should be complementary. That is, toXML should be able
   * to create a NodeList based on the output of fromXML. For example:
   * A == toXML(fromXML(A)) &&
   * B == fromXML(toXML(B))
   *
   * @param    {nl.sara.webdav.Codec}  codec  The codec to add
   * @returns  {void}
   */
  nl.sara.webdav.Privilege.addCodec = function(codec) {
    if (typeof codec.namespace !== 'string') {
      throw new nl.sara.webdav.Exception('addCodec: codec.namespace must be a String', nl.sara.webdav.Exception.WRONG_TYPE);
    }
    if (typeof codec.tagname !== 'string') {
      throw new nl.sara.webdav.Exception('addCodec: codec.tagname must be a String', nl.sara.webdav.Exception.WRONG_TYPE);
    }
    if (codecNamespaces[codec.namespace] === undefined) {
      codecNamespaces[codec.namespace] = {};
    }
    codecNamespaces[codec.namespace][codec.tagname] = {
      'fromXML': (codec.fromXML ? codec.fromXML : undefined),
      'toXML': (codec.toXML ? codec.toXML : undefined)
    };
  };

  /**
   * Sets a new value and rebuilds xmlvalue
   *
   * If a codec for this privilege is specified, it will use this codec to
   * rebuild xmlvallue. Else it will attempt to create one CDATA element with
   * the string value of whatever was fiven as parameter.
   *
   * @param   {mixed}  value  The object to base the xmlvalue on
   * @return  {void}
   */
  nl.sara.webdav.Privilege.prototype.setValueAndRebuildXml = function(value) {
    // Call codec to automatically create correct 'xmlvalue'
    var xmlDoc = document.implementation.createDocument(this.namespace, this.tagname, null);
    if ((codecNamespaces[this.namespace] === undefined) ||
        (codecNamespaces[this.namespace][this.tagname] === undefined) ||
        (codecNamespaces[this.namespace][this.tagname]['toXML'] === undefined)) {
      // No 'toXML' function set, so create a NodeList with just one CDATA node
      if (value !== null) { // If the value is NULL, then we should add anything to the NodeList
        var cdata = xmlDoc.createCDATASection(value);
        xmlDoc.documentElement.appendChild(cdata);
      }
      this._xmlvalue = xmlDoc.documentElement.childNodes;
    }else{
      this._xmlvalue = codecNamespaces[this.namespace][this.tagname]['toXML'](value, xmlDoc).documentElement.childNodes;
    }
  };

  /**
   * Parses the xmlvalue
   *
   * If a codec for this privilege is specified, it will use this codec to parse
   * the XML nodes. Else it will attempt to parse it as text or CDATA elements.
   *
   * @return  {mixed}  If a codec is specified, the return type depends on that
   * codec. If no codec is specified and at least one node in xmlvalue is not a
   * text or CDATA node, it will return undefined. If xmlvalue is empty, it will
   * return null.
   */
  nl.sara.webdav.Privilege.prototype.getParsedValue = function() {
    // Call codec to automatically create correct 'value'
    if (this._xmlvalue.length > 0) {
      if ((codecNamespaces[this.namespace] === undefined) ||
          (codecNamespaces[this.namespace][this.tagname] === undefined) ||
          (codecNamespaces[this.namespace][this.tagname]['fromXML'] === undefined)) {
        // No 'fromXML' function set, so try to create a text value based on TextNodes and CDATA nodes. If other nodes are present, set 'value' to null
        var parsedValue = '';
        for (var i = 0; i < this._xmlvalue.length; i++) {
          var node = this._xmlvalue.item(i);
          if ((node.nodeType === 3) || (node.nodeType === 4)) { // Make sure text and CDATA content is stored
            parsedValue += node.nodeValue;
          }else{ // If even one of the nodes is not text or CDATA, then we don't parse a text value at all
            parsedValue = undefined;
            break;
          }
        }
        return parsedValue;
      }else{
        return codecNamespaces[this.namespace][this.tagname]['fromXML'](this._xmlvalue);
      }
    }
    return null;
  };
})(); // Ends the static scope

/**
 * Overloads the default toString() method so it returns the value of this privilege
 *
 * @returns  {String}  A string representation of this privilege
 */
nl.sara.webdav.Privilege.prototype.toString = function() {
  return this.getParsedValue();
};

// End of library

/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.CreationdateCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.CreationdateCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.CreationdateCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: creationdate to a Date object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.CreationdateCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.CreationdateCodec.namespace = 'DAV:';
nl.sara.webdav.codec.CreationdateCodec.tagname = 'creationdate';

nl.sara.webdav.codec.CreationdateCodec.fromXML = function(nodelist) {
  var node = nodelist.item(0);
  if ((node.nodeType === 3) || (node.nodeType === 4)) { // Make sure text and CDATA content is stored
    return new Date(node.nodeValue);
  }else{ // If the node is not text or CDATA, then we don't parse a value at all
    return null;
  }
};

nl.sara.webdav.codec.CreationdateCodec.toXML = function(value, xmlDoc){
  var cdata = xmlDoc.createCDATASection(value.toISOString());
  xmlDoc.documentElement.appendChild(cdata);
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.CreationdateCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.GetcontentlengthCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.GetcontentlengthCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.GetcontentlengthCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: getcontentlength to an integer
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.GetcontentlengthCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.GetcontentlengthCodec.namespace = 'DAV:';
nl.sara.webdav.codec.GetcontentlengthCodec.tagname = 'getcontentlength';

nl.sara.webdav.codec.GetcontentlengthCodec.fromXML = function(nodelist) {
  var node = nodelist.item(0);
  if ((node.nodeType === 3) || (node.nodeType === 4)) { // Make sure text and CDATA content is stored
    return parseInt(node.nodeValue);
  }else{ // If the node is not text or CDATA, then we don't parse a text value at all
    return null;
  }
};

nl.sara.webdav.codec.GetcontentlengthCodec.toXML = function(value, xmlDoc){
  var cdata = xmlDoc.createCDATASection(value.toString());
  xmlDoc.documentElement.appendChild(cdata);
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.GetcontentlengthCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.GetlastmodifiedCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.GetlastmodifiedCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.GetlastmodifiedCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: getlastmodified to a Date object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.GetlastmodifiedCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.GetlastmodifiedCodec.namespace = 'DAV:';
nl.sara.webdav.codec.GetlastmodifiedCodec.tagname = 'getlastmodified';

nl.sara.webdav.codec.GetlastmodifiedCodec.fromXML = function(nodelist) {
  var node = nodelist.item(0);
  if ((node.nodeType === 3) || (node.nodeType === 4)) { // Make sure text and CDATA content is stored
    return new Date(node.nodeValue);
  }else{ // If the node is not text or CDATA, then we don't parse a value at all
    return null;
  }
};

nl.sara.webdav.codec.GetlastmodifiedCodec.toXML = function(value, xmlDoc){
  function pad(text) {
    text = text.toString();
    while (text.length < 2) {
      text = '0' + text;
    }
    return text;
  }
  // I will parse this myself, because the Date object doesn't have a method which is specified to always give a rfc1123-date (defined in Section 3.3.1 of [RFC2616]). Even though Date.toUTCString() often does so, it doesn't have to.
  var wkday = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var date1 = pad(value.getUTCDate()) + ' ' + month[value.getUTCMonth()] + ' ' + value.getUTCFullYear();
  var time = pad(value.getUTCHours()) + ':' + pad(value.getUTCMinutes()) + ':' + pad(value.getUTCSeconds());
  var cdata = xmlDoc.createCDATASection(wkday[value.getUTCDay()] + ', ' + date1 + ' ' + time + ' GMT');
  xmlDoc.documentElement.appendChild(cdata);
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.GetlastmodifiedCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If nl.sara.webdav.codec.OwnerCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.OwnerCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.OwnerCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: owner to a Date object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.OwnerCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.OwnerCodec.namespace = 'DAV:';
nl.sara.webdav.codec.OwnerCodec.tagname = 'owner';

nl.sara.webdav.codec.OwnerCodec.fromXML = function(nodelist) {
  var returnValue = null;

  // Assertions whether the formed XML is correct
  var hrefNode = nodelist[0];

  if ((hrefNode.nodeType === 1) &&
      (hrefNode.namespaceURI === 'DAV:') &&
      (hrefNode.localName === 'href'))
  {
    var node = hrefNode.childNodes.item(0);

    if ( ( node.nodeType === 3 ) || ( node.nodeType === 4 ) ) { // Make sure text and CDATA content is stored
      returnValue = node.nodeValue;
    }
  } 
  return returnValue;
};

nl.sara.webdav.codec.OwnerCodec.toXML = function(value, xmlDoc){  
  var hrefNode = xmlDoc.createElementNS( 'DAV:', 'href' );
  hrefNode.appendChild( xmlDoc.createCDATASection( value.toString() ) );
  xmlDoc.documentElement.appendChild( hrefNode );
  
  return xmlDoc
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.OwnerCodec);

// End of file
/*
 * Copyright ©2012 SARA bv, The Netherlands
 *
 * This file is part of js-webdav-client.
 *
 * js-webdav-client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * js-webdav-client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with js-webdav-client.  If not, see <http://www.gnu.org/licenses/>.
 */
"use strict";

// If it isn't done yet: create a namespace for all the default codecs
if (nl.sara.webdav.codec === undefined) {
  nl.sara.webdav.codec = {};
}

// If nl.sara.webdav.codec.ResourcetypeCodec is already defined, we have a namespace clash!
if (nl.sara.webdav.codec.ResourcetypeCodec !== undefined) {
  throw new nl.sara.webdav.Exception('Namespace nl.sara.webdav.codec.ResourcetypeCodec already taken, could not load JavaScript library for WebDAV connectivity.', nl.sara.webdav.Exception.NAMESPACE_TAKEN);
}

/**
 * @class Adds a codec that converts DAV: resourcetype to a Date object
 * @augments nl.sara.webdav.Codec
 */
nl.sara.webdav.codec.ResourcetypeCodec = new nl.sara.webdav.Codec();
nl.sara.webdav.codec.ResourcetypeCodec.namespace = 'DAV:';
nl.sara.webdav.codec.ResourcetypeCodec.tagname = 'resourcetype';

/**
 * Class constants are a way to specify what the resource type is
 */
nl.sara.webdav.codec.ResourcetypeCodec.COLLECTION = 1;
nl.sara.webdav.codec.ResourcetypeCodec.UNSPECIFIED = 2;
nl.sara.webdav.codec.ResourcetypeCodec.PRINCIPAL = 4;

nl.sara.webdav.codec.ResourcetypeCodec.fromXML = function(nodelist) {
  for (var i = 0; i < nodelist.length; i++) {
    var node = nodelist.item(i);
    if (node.namespaceURI === 'DAV:') {
      switch (nl.sara.webdav.Ie.getLocalName(node)) {
        case 'collection':
          return nl.sara.webdav.codec.ResourcetypeCodec.COLLECTION;
        case 'principal':
          return nl.sara.webdav.codec.ResourcetypeCodec.PRINCIPAL;
      }
    }
  }
  return nl.sara.webdav.codec.ResourcetypeCodec.UNSPECIFIED;
};

nl.sara.webdav.codec.ResourcetypeCodec.toXML = function(value, xmlDoc){
  switch(value) {
    case nl.sara.webdav.codec.ResourcetypeCodec.COLLECTION:
      var collection = xmlDoc.createElementNS('DAV:', 'collection');
      xmlDoc.documentElement.appendChild(collection);
    case nl.sara.webdav.codec.ResourcetypeCodec.PRINCIPAL:
      var collection = xmlDoc.createElementNS('DAV:', 'principal');
      xmlDoc.documentElement.appendChild(collection);
    break;
  }
  return xmlDoc;
};

nl.sara.webdav.Property.addCodec(nl.sara.webdav.codec.ResourcetypeCodec);

// End of file

