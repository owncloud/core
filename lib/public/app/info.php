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
interface Info {
	/**
	 * @brief Get the name of the app.
	 *
	 * @return string
	 */
	public function getName();

	/**
	 * @brief Get the last version of the app. Either from appinfo/version or from appinfo/info.xml
	 *
	 * @return string for example '1.2.45'
	 */
	public function getVersion();

	/**
	 * @brief Get the directory for the given app.
	 * If the app is defined in multiple directories, the first one is taken. (false if not found)
	 *
	 * @return string
	 */
	public function getDirectory();

	/**
	 * @brief Get the web path of the app.
	 * If the app is defined in multiple directories, the first one is taken. (false if not found)
	 *
	 * @return string
	 */
	public function getWebPath();
}