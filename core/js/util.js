/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * Utility functions
 * @namespace
 */
OC.Util = {
	// TODO: remove original functions from global namespace
	humanFileSize: function (size, skipSmallSizes) {
		var humanList = ['B', 'kB', 'MB', 'GB', 'TB'];
		// Calculate Log with base 1024: size = 1024 ** order
		var order = size > 0 ? Math.floor(Math.log(size) / Math.log(1024)) : 0;
		// Stay in range of the byte sizes that are defined
		order = Math.min(humanList.length - 1, order);
		var readableFormat = humanList[order];
		var relativeSize = (size / Math.pow(1024, order)).toFixed(1);
		if (skipSmallSizes === true && order === 0) {
			if (relativeSize !== "0.0") {
				return '< 1 kB';
			} else {
				return '0 kB';
			}
		}
		if (order < 2) {
			relativeSize = parseFloat(relativeSize).toFixed(0);
		}
		else if (relativeSize.substr(relativeSize.length - 2, 2) === '.0') {
			relativeSize = relativeSize.substr(0, relativeSize.length - 2);
		}
		return relativeSize + ' ' + readableFormat;
	},

	/**
	 * @param timestamp
	 * @param format
	 * @returns {string} timestamp formatted as requested
	 */
	formatDate: function (timestamp, format) {
		format = format || "LLL";
		return moment(timestamp).format(format);
	},

	/**
	 * @param timestamp
	 * @returns {string} human readable difference from now
	 */
	relativeModifiedDate: function (timestamp) {
		return moment(timestamp).fromNow();
	},


	/**
	 * Returns whether the browser supports SVG
	 * @return {boolean} true if the browser supports SVG, false otherwise
	 */
	// TODO: replace with original function
	hasSVGSupport: function () {
		this.checkMimeType= function () {
			$.ajax({
				url: OC.imagePath('core', 'breadcrumb.svg'),
				success: function (data, text, xhr) {
					var headerParts = xhr.getAllResponseHeaders().split("\n");
					var headers = {};
					$.each(headerParts, function (i, text) {
						if (text) {
							var parts = text.split(':', 2);
							if (parts.length === 2) {
								var value = parts[1].trim();
								if (value[0] === '"') {
									value = value.substr(1, value.length - 2);
								}
								headers[parts[0].toLowerCase()] = value;
							}
						}
					});
					if (headers["content-type"] !== 'image/svg+xml') {
						OC.Util.replaceSVG();
						this.checkMimeType.correct = false;
					}
				}
			});
		};

		this.checkMimeType.correct = true;

		return this.checkMimeType.correct && !!document.createElementNS && !!document.createElementNS('http://www.w3.org/2000/svg', "svg").createSVGRect;
	},
	/**
	 * If SVG is not supported, replaces the given icon's extension
	 * from ".svg" to ".png".
	 * If SVG is supported, return the image path as is.
	 * @param {string} file image path with svg extension
	 * @return {string} fixed image path with png extension if SVG is not supported
	 */
	replaceSVGIcon: function (file) {
		if (file && !OC.Util.hasSVGSupport()) {
			var i = file.lastIndexOf('.svg');
			if (i >= 0) {
				file = file.substr(0, i) + '.png' + file.substr(i + 4);
			}
		}
		return file;
	},
	/**
	 * Replace SVG images in all elements that have the "svg" class set
	 * with PNG images.
	 *
	 * @param $el root element from which to search, defaults to $('body')
	 */
	replaceSVG: function ($el) {
		if (!$el) {
			$el = $('body');
		}
		$el.find('img.svg').each(function (index, element) {
			element = $(element);
			var src = element.attr('src');
			element.attr('src', src.substr(0, src.length - 3) + 'png');
		});
		$el.find('.svg').each(function (index, element) {
			element = $(element);
			var background = element.css('background-image');
			if (background) {
				var i = background.lastIndexOf('.svg');
				if (i >= 0) {
					background = background.substr(0, i) + '.png' + background.substr(i + 4);
					element.css('background-image', background);
				}
			}
			element.find('*').each(function (index, element) {
				element = $(element);
				var background = element.css('background-image');
				if (background) {
					var i = background.lastIndexOf('.svg');
					if (i >= 0) {
						background = background.substr(0, i) + '.png' + background.substr(i + 4);
						element.css('background-image', background);
					}
				}
			});
		});
	},

	/**
	 * Remove the time component from a given date
	 *
	 * @param {Date} date date
	 * @return {Date} date with stripped time
	 */
	stripTime: function (date) {
		// FIXME: likely to break when crossing DST
		// would be better to use a library like momentJS
		return new Date(date.getFullYear(), date.getMonth(), date.getDate());
	},

	_chunkify: function (t) {
		// Adapted from http://my.opera.com/GreyWyvern/blog/show.dml/1671288
		var tz = [], x = 0, y = -1, n = 0, code, c;

		while (x < t.length) {
			c = t.charAt(x);
			// only include the dot in strings
			var m = ((!n && c === '.') || (c >= '0' && c <= '9'));
			if (m !== n) {
				// next chunk
				y++;
				tz[y] = '';
				n = m;
			}
			tz[y] += c;
			x++;
		}
		return tz;
	},
	/**
	 * Compare two strings to provide a natural sort
	 * @param a first string to compare
	 * @param b second string to compare
	 * @return -1 if b comes before a, 1 if a comes before b
	 * or 0 if the strings are identical
	 */
	naturalSortCompare: function (a, b) {
		var x;
		var aa = OC.Util._chunkify(a);
		var bb = OC.Util._chunkify(b);

		for (x = 0; aa[x] && bb[x]; x++) {
			if (aa[x] !== bb[x]) {
				var aNum = Number(aa[x]), bNum = Number(bb[x]);
				// note: == is correct here
				if (aNum == aa[x] && bNum == bb[x]) {
					return aNum - bNum;
				} else {
					// Forcing 'en' locale to match the server-side locale which is
					// always 'en'.
					//
					// Note: This setting isn't supported by all browsers but for the ones
					// that do there will be more consistency between client-server sorting
					return aa[x].localeCompare(bb[x], 'en');
				}
			}
		}
		return aa.length - bb.length;
	},
	History: {}
};
