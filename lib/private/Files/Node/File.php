<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
 *
 */

namespace OC\Files\Node;

use OCP\Files\IPreviewNode;
use OCP\Files\NotPermittedException;
use OCP\IImage;
use Psr\Http\Message\StreamInterface;

class File extends Node implements \OCP\Files\File, IPreviewNode {
	/**
	 * Creates a Folder that represents a non-existing path
	 *
	 * @param string $path path
	 * @return string non-existing node class
	 */
	protected function createNonExistingNode($path) {
		return new NonExistingFile($this->root, $this->view, $path);
	}

	/**
	 * @return string
	 * @throws \OCP\Files\NotPermittedException
	 */
	public function getContent() {
		if ($this->checkPermissions(\OCP\Constants::PERMISSION_READ)) {
			/**
			 * @var \OC\Files\Storage\Storage $storage;
			 */
			return $this->view->file_get_contents($this->path);
		}

		throw new NotPermittedException();
	}

	/**
	 * Write the contents of data into this file node. It can be a whole
	 * string or a stream resource
	 * @param string|resource $data
	 * @throws \OCP\Files\NotPermittedException
	 */
	public function putContent($data) {
		if ($this->checkPermissions(\OCP\Constants::PERMISSION_UPDATE)) {
			$this->sendHooks(['preWrite']);
			$this->view->file_put_contents($this->path, $data);
			$this->fileInfo = null;
			$this->sendHooks(['postWrite']);
		} else {
			throw new NotPermittedException();
		}
	}

	/**
	 * @param string $mode
	 * @return resource
	 * @throws \OCP\Files\NotPermittedException
	 * @deprecated 11.0.0
	 */
	public function fopen($mode) {
		throw new \BadMethodCallException('fopen is no longer allowed to be called');
	}

	public function delete() {
		if (!$this->checkPermissions(\OCP\Constants::PERMISSION_DELETE)) {
			throw new NotPermittedException();
		}

		$this->sendHooks(['preDelete']);
		$fileInfo = $this->getFileInfo();
		$this->view->unlink($this->path);
		$nonExisting = new NonExistingFile($this->root, $this->view, $this->path, $fileInfo);
		$this->root->emit('\OC\Files', 'postDelete', [$nonExisting]);
		$this->fileInfo = null;
	}

	/**
	 * @param string $type
	 * @param bool $raw
	 * @return string
	 */
	public function hash($type, $raw = false) {
		return $this->view->hash($type, $this->path, $raw);
	}

	/**
	 * @inheritdoc
	 */
	public function getChecksum() {
		return $this->getFileInfo()->getChecksum();
	}

	/**
	 * @param array $options
	 * @return IImage
	 * @since 10.1.0
	 */
	public function getThumbnail($options) {
		$maxX = \array_key_exists('x', $options) ? (int)$options['x'] : 32;
		$maxY = \array_key_exists('y', $options) ? (int)$options['y'] : 32;
		$scalingUp = \array_key_exists('scalingup', $options) ? (bool)$options['scalingup'] : true;
		$keepAspect = \array_key_exists('a', $options) ? true : false;
		$mode = \array_key_exists('mode', $options) ? $options['mode'] : 'fill';

		$preview = new \OC\Preview();
		$preview->setFile($this);
		$preview->setMaxX($maxX);
		$preview->setMaxY($maxY);
		$preview->setScalingUp($scalingUp);
		$preview->setMode($mode);
		$preview->setKeepAspect($keepAspect);
		if (\array_key_exists('mimeType', $options)) {
			$preview->setMimetype($options['mimeType']);
		}
		return $preview->getPreview();
	}

	/**
	 * @param array $options
	 * @return StreamInterface
	 * @since 11.0.0
	 */
	public function readFile(array $options = []): StreamInterface {
		if (!$this->checkPermissions(\OCP\Constants::PERMISSION_READ)) {
			throw new NotPermittedException();
		}
		return $this->view->readFile($this->path, $options);
	}

	/**
	 * @param StreamInterface $stream
	 * @return int
	 * @since 11.0.0
	 */
	public function writeFile(StreamInterface $stream): int {
		if (!$this->checkPermissions(\OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_READ)) {
			throw new NotPermittedException();
		}
		$this->sendHooks(['preWrite']);
		$count = $this->view->writeFile($this->path, $stream);
		$this->sendHooks(['postWrite']);

		return $count;
	}
}
