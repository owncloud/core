<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCP\App;

/**
 * Provide a common interface to all Application functions
 */
interface Loader {
	/**
	 * @brief load all enabled apps
	 */
	public function loadAll();
}