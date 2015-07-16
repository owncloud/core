var dav = {

};

dav.Client = function(options) {
    var i;
    for(i in options) {
        this[i] = options[i];
    }

};

dav.Client.prototype = {

    baseUrl : null,

    userName : null,

    password : null,


    xmlNamespaces : {
        'DAV:' : 'd'
    },

    /**
     * Generates a propFind request.
     *
     * @param {string} url Url to do the propfind request on
     * @param {Array} properties List of properties to retrieve.
     * @return {Promise}
     */
    propFind : function(url, properties, depth) {

        if(typeof depth == "undefined") {
            depth = 0;
        }

        var headers = {
            Depth          : depth,
            'Content-Type' : 'application/xml; charset=utf-8'
        };

        var body =
            '<?xml version="1.0"?>\n' +
            '<d:propfind ';

		var namespace;
		for (namespace in this.xmlNamespaces) {
			body += ' xmlns:' + this.xmlNamespaces[namespace] + '="' + namespace + '"';
		}
		body += '>\n' +
			'  <d:prop>\n';

        for(var ii in properties) {
			var propText = properties[ii];
			if (typeof propText !== 'string') {
				// can happen on IE8
				continue;
			}
            var property = this.parseClarkNotation(properties[ii]);
            if (this.xmlNamespaces[property.namespace]) {
                body+='    <' + this.xmlNamespaces[property.namespace] + ':' + property.name + ' />\n';
            } else {
                body+='    <x:' + property.name + ' xmlns:x="' + property.namespace + '" />\n';
            }

        }
        body+='  </d:prop>\n';
        body+='</d:propfind>';

        return this.request('PROPFIND', url, headers, body).then(
            function(result) {
                var elements = this.parseMultiStatus(result.xhr.responseXML);
                if (depth===0) {
                    return {
						status: result.status,
						body: elements[0]
					};
                } else {
                    return {
						status: result.status,
						body: elements
					};
                }

            }.bind(this)
        );

    },

    /**
     * Performs a HTTP request, and returns a Promise
     *
     * @param {string} method HTTP method
     * @param {string} url Relative or absolute url
     * @param {Object} headers HTTP headers as an object.
     * @param {string} body HTTP request body.
     * @return {Promise}
     */
    request : function(method, url, headers, body) {

        var xhr = this.xhrProvider();

        if (this.userName) {
            headers['Authorization'] = 'Basic ' + btoa(this.userName + ':' + this.password);
            // xhr.open(method, this.resolveUrl(url), true, this.userName, this.password);
        }
        xhr.open(method, this.resolveUrl(url), true);
        var ii;
        for(ii in headers) {
            xhr.setRequestHeader(ii, headers[ii]);
        }
        xhr.send(body);

        return new Promise(function(fulfill, reject) {

            xhr.onreadystatechange = function() {
                if (xhr.readyState !== 4) {
                    return;
                }

                fulfill({
					status: xhr.status,
                    body: xhr.response,
					xhr: xhr
                });

            };

            xhr.ontimeout = function() {

                reject(new Error('Timeout exceeded'));

            };

        });

    },

	_getElementsByTagName: function(node, name, resolver) {
		var parts = name.split(':');
		var tagName = parts[1];
		var namespace = resolver(parts[0]);
		if (node.getElementsByTagNameNS) {
			return node.getElementsByTagNameNS(namespace, tagName);
		}
		return node.getElementsByTagName(name);
	},

    /**
     * Returns an XMLHttpRequest object.
     *
     * This is in its own method, so it can be easily overridden.
     *
     * @return {XMLHttpRequest}
     */
    xhrProvider : function() {

        return new XMLHttpRequest();

    },


    /**
     * Parses a multi-status response body.
     *
     * @param {string} xmlBody
     * @param {Array}
     */
    parseMultiStatus : function(doc) {

		var result = [];
        var resolver = function(foo) {
            var ii;
            for(ii in this.xmlNamespaces) {
                if (this.xmlNamespaces[ii] === foo) {
                    return ii;
                }
            }
        }.bind(this);

		var responses = this._getElementsByTagName(doc, 'd:response', resolver);
		var i;
		for (i = 0; i < responses.length; i++) {
			var responseNode = responses[i];
            var response = {
                href : null,
                propStat : []
            };

			var hrefNode = this._getElementsByTagName(responseNode, 'd:href', resolver)[0];

            response.href = hrefNode.textContent || hrefNode.text;

            var propStatNodes = this._getElementsByTagName(responseNode, 'd:propstat', resolver);
			var j = 0;

            for (j = 0; j < propStatNodes.length; j++) {
				var propStatNode = propStatNodes[j];
				var statusNode = this._getElementsByTagName(propStatNode, 'd:status', resolver)[0];

                var propStat = {
					status : statusNode.textContent || statusNode.text,
                    properties : []
                };

                var propNode = this._getElementsByTagName(propStatNode, 'd:prop', resolver)[0];
				var k = 0;
				for (k = 0; k < propNode.childNodes.length; k++) {
					var prop = propNode.childNodes[k];
					var value = prop.textContent || prop.text;
					/*
					if (prop.childNodes && prop.childNodes.length > 0 && !(prop.childNodes[0] instanceof Text)) {
						// use node list instead
						value = prop.childNodes;
					}
					*/
					propStat.properties['{' + prop.namespaceURI + '}' + (prop.localName || prop.baseName)] = value;

                }
                response.propStat.push(propStat);
            }

            result.push(response);
        }

        return result;

    },

    /**
     * Takes a relative url, and maps it to an absolute url, using the baseUrl
     *
     * @param {string} url
     * @return {string}
     */
    resolveUrl : function(url) {

        // Note: this is rudamentary.. not sure yet if it handles every case.
        if (/^https?:\/\//i.test(url)) {
            // absolute
            return url;
        }

        var baseParts = this.parseUrl(this.baseUrl);
        if (url.charAt('/')) {
            // Url starts with a slash
            return baseParts.root + url;
        }

        // Url does not start with a slash, we need grab the base url right up until the last slash.
        var newUrl = baseParts.root + '/';
        if (baseParts.path.lastIndexOf('/')!==-1) {
            newUrl = newUrl = baseParts.path.subString(0, baseParts.path.lastIndexOf('/')) + '/';
        }
        newUrl+=url;
        return url;

    },

    /**
     * Parses a url and returns its individual components.
     *
     * @param {String} url
     * @return {Object}
     */
    parseUrl : function(url) {

         var parts = url.match(/^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/);
         var result = {
             url : parts[0],
             scheme : parts[1],
             host : parts[3],
             port : parts[4],
             path : parts[5],
             query : parts[6],
             fragment : parts[7],
         };
         result.root =
            result.scheme + '://' +
            result.host +
            (result.port ? ':' + result.port : '');

         return result;

    },

    parseClarkNotation : function(propertyName) {

        var result = propertyName.match(/^{([^}]+)}(.*)$/);
        if (!result) {
            return;
        }

        return {
            name : result[2],
            namespace : result[1]
        };

    }

};

