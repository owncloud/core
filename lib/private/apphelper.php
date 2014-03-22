<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 *
 */

namespace OC;

/**
 * TODO: Description
 */
class AppHelper implements \OCP\IHelper {
	/**
	 * Gets the content of an URL by using CURL or a fallback if it is not
	 * installed
	 * @param string $url the url that should be fetched
	 * @param bool $verifyCert Whether the SSL certificate should get verified (defaults to yes)
	 * @return string the content of the webpage
	 */
	public function getUrlContent($url, $verifyCert = true) {
		return \OC_Util::getUrlContent($url, $verifyCert);
	}
}
