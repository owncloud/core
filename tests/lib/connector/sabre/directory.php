<?php
/**
 * Copyright (c) 2013 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class Test_OC_Connector_Sabre_Directory extends PHPUnit_Framework_TestCase {

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateSharedFileFails() {
		$dir = new OC_Connector_Sabre_Directory('');
		$dir->createFile('Shared');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateSharedFolderFails() {
		$dir = new OC_Connector_Sabre_Directory('');
		$dir->createDirectory('Shared');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testDeleteSharedFolderFails() {
		$dir = new OC_Connector_Sabre_Directory('Shared');
		$dir->delete();
	}
}
