<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files;

use OC\Files\Filesystem;
use OCP\Share;

class EtagTest extends \Test\TestCase {

	private $uid;

	/**
	 * @var \OC_User_Dummy $userBackend
	 */
	private $userBackend;

	protected function setUp() {
		parent::setUp();

		\OC_Hook::clear('OC_Filesystem', 'setup');
		\OCP\Util::connectHook('OC_Filesystem', 'setup', '\OC\Files\Storage\Shared', 'setup');
		\OCP\Share::registerBackend('file', 'OC_Share_Backend_File');
		\OCP\Share::registerBackend('folder', 'OC_Share_Backend_Folder', 'file');

		$this->userBackend = new \OC_User_Dummy();
		\OC_User::useBackend($this->userBackend);
	}

	public function testNewUser() {
		$user1 = $this->getUniqueID('user_');
		$this->userBackend->createUser($user1, '');

		Filesystem::mount('\OC\Files\Storage\Temporary', array(), '/' . $user1);
		$folder = \OC::$server->getUserFolder($user1);
		$folder->newFolder('/folder');
		$folder->newFolder('/folder/subfolder');
		$folder->newFile('/foo.txt')->putContent('asd');
		$folder->newFile('/folder/bar.txt')->putContent('fgh');
		$folder->newFile('/folder/subfolder/qwerty.txt')->putContent('jkl');

		$files = array('/foo.txt', '/folder/bar.txt', '/folder/subfolder', '/folder/subfolder/qwerty.txt');
		$originalEtags = $this->getEtags($folder, $files);

		$scanner = new \OC\Files\Utils\Scanner($user1, \OC::$server->getDatabaseConnection(), \OC::$server->getUserFolder($user1));
		$scanner->backgroundScan('/');

		$newEtags = $this->getEtags($folder, $files);
		// loop over array and use assertSame over assertEquals to prevent false positives
		foreach ($originalEtags as $file => $originalEtag) {
			$this->assertSame($originalEtag, $newEtags[$file]);
		}
	}

	/**
	 * @param \OCP\Files\Folder $folder
	 * @param string[] $files
	 * @return string[]
	 */
	private function getEtags($folder, $files) {
		$etags = array();
		foreach ($files as $file) {
			$node = $folder->get($file);
			$etags[$file] = $node->getEtag();
		}
		return $etags;
	}
}
