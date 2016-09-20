<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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
 *
 */

/**
 * Public interface of ownCloud for apps to use.
 * Files Class
 *
 */

// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP;

/**
 * This class provides access to the internal filesystem abstraction layer. Use
 * this class exlusively if you want to access files
 * @since 5.0.0
 */
class Files {
	/**
	 * Recusive deletion of folders
	 * @return bool
	 * @since 5.0.0
	 */
	static function rmdirr( $dir ) {
		return \OC_Helper::rmdirr( $dir );
	}

	/**
	 * Get the mimetype of a local file
	 * @param string $path
	 * @return string
	 * does NOT work for ownClouds filesystem, use OC_FileSystem::getMimeType instead
	 * @since 5.0.0
	 */
	static function getMimeType( $path ) {
		return \OC::$server->getMimeTypeDetector()->detect($path);
	}

	/**
	 * Get the pathinfo of a path with special handling for tar.(gz|bz2) which
	 * have different mimetypes
	 * @param string $path
	 * @return array|string|null
	 * @since 9.2.0
	 */
	static function pathinfo( $path, $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ) {
		$result = pathinfo($path, $options);
		// handle .tar.(gz|bz2)
		if (is_array($result)) {
			if (isset($result['extension'])) {
				if ($result['extension'] === 'gz' && substr($path, -7) === '.tar.gz') {
					$result['extension'] = 'tar.gz';
					if (isset($result['filename'])) {
						$result['filename'] = substr($result['filename'], 0, -4);
					}
				} else if ($result['extension'] === 'bz2' && substr($path, -8) === '.tar.bz2') {
					$result['extension'] = 'tar.bz2';
					if (isset($result['filename'])) {
						$result['filename'] = substr($result['filename'], 0, -4);
					}
				}
			}
		} else if ($options === PATHINFO_EXTENSION) {
			if ($result === 'gz' && substr($path, -7) === '.tar.gz') {
				$result = 'tar.gz';
			} else if ($result === 'bz2' && substr($path, -8) === '.tar.bz2') {
				$result = 'tar.bz2';
			}
		} else if ($options === PATHINFO_FILENAME) {
			if (substr($path, -7) === '.tar.gz' || substr($path, -8) === '.tar.bz2' ) {
				$result = substr($result, 0, -4);
			}
		}
		return $result;
	}

	/**
	 * Search for files by mimetype
	 * @param string $mimetype
	 * @return array
	 * @since 6.0.0
	 */
	static public function searchByMime( $mimetype ) {
		return(\OC\Files\Filesystem::searchByMime( $mimetype ));
	}

	/**
	 * Copy the contents of one stream to another
	 * @param resource $source
	 * @param resource $target
	 * @return int the number of bytes copied
	 * @since 5.0.0
	 */
	public static function streamCopy( $source, $target ) {
		list($count, ) = \OC_Helper::streamCopy( $source, $target );
		return $count;
	}

	/**
	 * Create a temporary file with an unique filename
	 * @param string $postfix
	 * @return string
	 *
	 * temporary files are automatically cleaned up after the script is finished
	 * @deprecated 8.1.0 use getTemporaryFile() of \OCP\ITempManager - \OC::$server->getTempManager()
	 * @since 5.0.0
	 */
	public static function tmpFile( $postfix='' ) {
		return \OC::$server->getTempManager()->getTemporaryFile($postfix);
	}

	/**
	 * Create a temporary folder with an unique filename
	 * @return string
	 *
	 * temporary files are automatically cleaned up after the script is finished
	 * @deprecated 8.1.0 use getTemporaryFolder() of \OCP\ITempManager - \OC::$server->getTempManager()
	 * @since 5.0.0
	 */
	public static function tmpFolder() {
		return \OC::$server->getTempManager()->getTemporaryFolder();
	}

	/**
	 * Adds a suffix to the name in case the file exists
	 * @param string $path
	 * @param string $filename
	 * @return string
	 * @since 5.0.0
	 */
	public static function buildNotExistingFileName( $path, $filename ) {
		return(\OC_Helper::buildNotExistingFileName( $path, $filename ));
	}

	/**
	 * Gets the Storage for an app - creates the needed folder if they are not
	 * existent
	 * @param string $app
	 * @return \OC\Files\View
	 * @since 5.0.0
	 */
	public static function getStorage( $app ) {
		return \OC_App::getStorage( $app );
	}
}
