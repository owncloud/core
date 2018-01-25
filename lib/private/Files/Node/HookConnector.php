<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

use OCP\Files\FileInfo;
use OC\Files\Filesystem;
use OC\Files\View;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class HookConnector {
	/**
	 * @var Root
	 */
	private $root;

	/**
	 * @var View
	 */
	private $view;

	/** @var EventDispatcher  */
	private $eventDispatcher;
	/**
	 * @var FileInfo[]
	 */
	private $deleteMetaCache = [];

	/**
	 * HookConnector constructor.
	 *
	 * @param Root $root
	 * @param View $view
	 */
	public function __construct(Root $root, View $view, EventDispatcher $eventDispatcher) {
		$this->root = $root;
		$this->view = $view;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function viewToNode() {
		Util::connectHook('OC_Filesystem', 'write', $this, 'write');
		Util::connectHook('OC_Filesystem', 'post_write', $this, 'postWrite');

		Util::connectHook('OC_Filesystem', 'create', $this, 'create');
		$this->eventDispatcher->addListener('file.aftercreate', [$this, 'postCreate']);

		Util::connectHook('OC_Filesystem', 'delete', $this, 'delete');
		$this->eventDispatcher->addListener('file.afterdelete', [$this, 'postDelete']);

		Util::connectHook('OC_Filesystem', 'rename', $this, 'rename');
		$this->eventDispatcher->addListener('file.afterrename', [$this, 'postRename']);

		Util::connectHook('OC_Filesystem', 'copy', $this, 'copy');
		$this->eventDispatcher->addListener('file.aftercopy', [$this, 'postCopy']);

		Util::connectHook('OC_Filesystem', 'touch', $this, 'touch');
		Util::connectHook('OC_Filesystem', 'post_touch', $this, 'postTouch');
	}

	public function write($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->root->emit('\OC\Files', 'preWrite', [$node]);
	}

	public function postWrite($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->root->emit('\OC\Files', 'postWrite', [$node]);
	}

	public function create($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->root->emit('\OC\Files', 'preCreate', [$node]);
	}

	public function postCreate(GenericEvent $arguments) {
		if ($arguments->getArgument('processPostEvent') === true) {
			$node = $this->getNodeForPath($arguments->getArgument('path'));
			$this->root->emit('\OC\Files', 'postCreate', [$node]);
		}
	}

	public function delete($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->deleteMetaCache[$node->getPath()] = $node->getFileInfo();
		$this->root->emit('\OC\Files', 'preDelete', [$node]);
	}

	public function postDelete(GenericEvent $arguments) {
		if ($arguments->getArgument('processPostEvent') === true) {
			$node = $this->getNodeForPath($arguments->getArgument('path'));
			unset($this->deleteMetaCache[$node->getPath()]);
			$this->root->emit('\OC\Files', 'postDelete', [$node]);
		}
	}

	public function touch($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->root->emit('\OC\Files', 'preTouch', [$node]);
	}

	public function postTouch($arguments) {
		$node = $this->getNodeForPath($arguments['path']);
		$this->root->emit('\OC\Files', 'postTouch', [$node]);
	}

	public function rename($arguments) {
		$source = $this->getNodeForPath($arguments['oldpath']);
		$target = $this->getNodeForPath($arguments['newpath']);
		$this->root->emit('\OC\Files', 'preRename', [$source, $target]);
	}

	public function postRename(GenericEvent $arguments) {
		if ($arguments->getArgument('processPostEvent') === true) {
			$source = $this->getNodeForPath($arguments->getArgument('oldpath'));
			$target = $this->getNodeForPath($arguments->getArgument('newpath'));
			$this->root->emit('\OC\Files', 'postRename', [$source, $target]);
		}
	}

	public function copy($arguments) {
		$source = $this->getNodeForPath($arguments['oldpath']);
		$target = $this->getNodeForPath($arguments['newpath']);
		$this->root->emit('\OC\Files', 'preCopy', [$source, $target]);
	}

	public function postCopy(GenericEvent $arguments) {
		if ($arguments->getArgument('processPostEvent') === true) {
			$source = $this->getNodeForPath($arguments->getArgument('oldpath'));
			$target = $this->getNodeForPath($arguments->getArgument('newpath'));
			$this->root->emit('\OC\Files', 'postCopy', [$source, $target]);
		}
	}

	private function getNodeForPath($path) {
		$info = Filesystem::getView()->getFileInfo($path);
		if (!$info) {

			$fullPath = Filesystem::getView()->getAbsolutePath($path);
			if (isset($this->deleteMetaCache[$fullPath])) {
				$info = $this->deleteMetaCache[$fullPath];
			} else {
				$info = null;
			}
			if (Filesystem::is_dir($path)) {
				return new NonExistingFolder($this->root, $this->view, $fullPath, $info);
			} else {
				return new NonExistingFile($this->root, $this->view, $fullPath, $info);
			}
		}
		if ($info->getType() === FileInfo::TYPE_FILE) {
			return new File($this->root, $this->view, $info->getPath(), $info);
		} else {
			return new Folder($this->root, $this->view, $info->getPath(), $info);
		}
	}
}
