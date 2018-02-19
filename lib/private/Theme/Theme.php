<?php
/**
 * @author Philipp Schaffrath <github@philipp.schaffrath.email>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
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
namespace OC\Theme;

use OCP\Theme\ITheme;

class Theme implements ITheme {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $baseDirectory;

	/**
	 * @var string
	 */
	private $directory;

	/**
	 * @var string
	 */
	private $webPath;

	/**
	 * @param string $name
	 * @param string $directory
	 * @param string $webPath
	 */
	public function __construct($name = '', $directory = '', $webPath = '') {
		$this->name = $name;
		$this->directory = $directory;
		$this->webPath = $webPath;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $baseDirectory
	 * @return string
	 */
	public function setBaseDirectory($baseDirectory) {
		$this->baseDirectory = $baseDirectory;
	}

	/**
	 * @return string
	 */
	public function getBaseDirectory() {
		return $this->baseDirectory;
	}

	/**
	 * @return string
	 */
	public function getDirectory() {
		return $this->directory;
	}

	/**
	 * @return string
	 */
	public function getWebPath() {
		return $this->webPath;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param string $directory
	 */
	public function setDirectory($directory) {
		$this->directory = $directory;
	}

	/**
	 * @param string $webPath
	 */
	public function setWebPath($webPath) {
		$this->webPath = $webPath;
	}
}
