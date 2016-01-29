<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\Files\Storage\Wrapper;

use Icewind\Streams\Directory;

class NormalizeDirWrapper implements Directory {
	/**
	 * @var resource
	 */
	public $context;

	/**
	 * @var resource
	 */
	protected $source;

	/**
	 * Load the source from the stream context and return the context options
	 *
	 * @param string $name
	 * @return array
	 * @throws \Exception
	 */
	protected function loadContext($name) {
		$context = stream_context_get_options($this->context);
		if (isset($context[$name])) {
			$context = $context[$name];
		} else {
			throw new \BadMethodCallException('Invalid context, "' . $name . '" options not set');
		}
		if (isset($context['source']) and is_resource($context['source'])) {
			$this->source = $context['source'];
		} else {
			throw new \BadMethodCallException('Invalid context, source not set');
		}
		return $context;
	}

	/**
	 * @param string $path
	 * @param array $options
	 * @return bool
	 */
	public function dir_opendir($path, $options) {
		$this->loadContext('dir');
		return true;
	}

	/**
	 * @return string
	 */
	public function dir_readdir() {
		$file = readdir($this->source);
		if ($file !== false) {
			$file = normalizer_normalize($file);
		}
		return $file;
	}

	/**
	 * @return bool
	 */
	public function dir_closedir() {
		closedir($this->source);
	}

	/**
	 * @return bool
	 */
	public function dir_rewinddir() {
		rewinddir($this->source);
	}

	/**
	 * Creates a directory handle from the provided array or iterator
	 *
	 * @param resource $source
	 * @return resource
	 *
	 * @throws \BadMethodCallException
	 */
	public static function wrap($source) {
		$context = stream_context_create(array(
			'dir' => array(
				'source' => $source)
		));
		stream_wrapper_register('normalize', '\OC\Files\Storage\Wrapper\NormalizeDirWrapper');
		$wrapped = opendir('normalize://', $context);
		stream_wrapper_unregister('normalize');
		return $wrapped;
	}
}
