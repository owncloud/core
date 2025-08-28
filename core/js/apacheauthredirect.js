/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

 $(document).ready(function() {

	var redirect_url = document.getElementById('redirect_url').value;
	// Only allow safe same-origin or relative redirects
	function isSafeRedirect(url) {
		try {
			// If url starts with "/", allow it (relative path)
			if (url.startsWith("/")) {
				return true;
			}
			// If absolute, check host and protocol
			var loc = window.location;
			var urlObj = new URL(url, loc.origin);
			if (urlObj.origin === loc.origin && ["http:", "https:"].includes(urlObj.protocol)) {
				return true;
			}
		} catch (e) {
			// Malformed
			return false;
		}
		return false;
	}
	if (isSafeRedirect(redirect_url)) {
		window.location = redirect_url;
	} else {
		// Optionally, do not redirect or set to a safe default
		console.warn("Unsafe redirect_url:", redirect_url);
	}

});