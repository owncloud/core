<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @copyright 2014 Lukas Reschke
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing\Controllers;

use OCA\Files_Sharing\Application;
use OCP\AppFramework\IAppContainer;
use OCP\Files;
use OCP\Share;
use OCA\Files_sharing\Tests\TestCase;

/**
 * @package OCA\Files_Sharing\Controllers
 */
class OCSApiControllerTest extends TestCase {

	/** @var IAppContainer */
	private $container;
	/** @var OCSApiController */
	private $OCSApiController;
	/** @var \Doctrine\DBAL\Query\QueryBuilder */
	private $qb;

	//OLD
	const TEST_FOLDER_NAME = '/folder_share_api_test';

	private static $tempStorage;


	protected function setUp() {
		parent::setUp();

		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'no');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_expire_after_n_days', '7');

		$this->folder = self::TEST_FOLDER_NAME;
		$this->subfolder  = '/subfolder_share_api_test';
		$this->subsubfolder = '/subsubfolder_share_api_test';

		$this->filename = '/share-api-test.txt';

		// save file with content
		$this->view->file_put_contents($this->filename, $this->data);
		$this->view->mkdir($this->folder);
		$this->view->mkdir($this->folder . $this->subfolder);
		$this->view->mkdir($this->folder . $this->subfolder . $this->subsubfolder);
		$this->view->file_put_contents($this->folder.$this->filename, $this->data);
		$this->view->file_put_contents($this->folder . $this->subfolder . $this->filename, $this->data);

		//NEW
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['AppName'] = 'files_sharing';
		$this->container['Logger'] = $this->getMockBuilder('\OCP\ILogger')
			->disableOriginalConstructor()->getMock();

		$ex = $this->getMockBuilder('\Doctrine\DBAL\Query\Expression\ExpressionBuilder')
			->disableOriginalConstructor()->getMock();
		$this->qb = $this->getMockBuilder('\Doctrine\DBAL\Query\QueryBuilder')
			->disableOriginalConstructor()->getMock();

		$this->qb->method('update')->will($this->returnSelf());
		$this->qb->method('set')->will($this->returnSelf());
		$this->qb->method('where')->will($this->returnSelf());
		$this->qb->method('andWhere')->will($this->returnSelf());
		$this->qb->method('select')->will($this->returnSelf());
		$this->qb->method('addSelect')->will($this->returnSelf());
		$this->qb->method('from')->will($this->returnSelf());
		$this->qb->method('expr')->willReturn($ex);

		$this->container['DatabaseConnection'] = $this->getMockBuilder('\OCP\IDBConnection')
			->disableOriginalConstructor()->getMock();
		$this->container['DatabaseConnection']->method('createQueryBuilder')->willReturn($this->qb);
		$this->container['Config'] = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
	
		$this->OCSApiController = $this->container['OCSApiController'];
	}

	protected function tearDown() {
		if($this->view instanceof \OC\Files\View) {
			$this->view->unlink($this->filename);
			$this->view->deleteAll($this->folder);
		}

		self::$tempStorage = null;

		parent::tearDown();
	}

	/**
	 * @medium
	 */
	function testCreateShare() {

		// share to user
		$result = $this->OCSApiController->createShare($this->filename, Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, null, null, null);

		$this->assertArrayHasKey('data', $result);
		$this->assertArrayHasKey('id', $result['data']);

		$share = $this->getShareFromId($result['data']['id']);
		$items = \OCP\Share::getItemShared('file', $share['item_source']);
		$this->assertTrue(!empty($items));

		// share link
		$result = $this->OCSApiController->createShare($this->folder, Share::SHARE_TYPE_LINK, null, null, null, null);

		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];
		$this->assertArrayHasKey('id', $data);
		$this->assertArrayHasKey('url', $data);
		$this->assertArrayHasKey('token', $data);

		// check if we have a token
		$this->assertTrue(is_string($data['token']));
		$share = $this->getShareFromId($data['id']);

		$items = \OCP\Share::getItemShared('file', $share['item_source']);
		$this->assertTrue(!empty($items));

		$fileinfo = $this->view->getFileInfo($this->filename);
		\OCP\Share::unshare('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		$fileinfo = $this->view->getFileInfo($this->folder);
		\OCP\Share::unshare('folder', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
	}

	/**
	 * @medium
	 */
	public function testCreateShareInvalidPermissions() {

		// simulate a post request
		$result = $this->OCSApiController->createShare($this->filename, \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, null, null, \OCP\Constants::PERMISSION_SHARE);

		$this->assertEquals(400, $result['statuscode']);

		$shares = \OCP\Share::getItemShared('file', null);
		$this->assertCount(0, $shares);

		$fileinfo = $this->view->getFileInfo($this->filename);
		\OCP\Share::unshare('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
	}


	public function testEnfoceLinkPassword() {
		$appConfig = \OC::$server->getAppConfig();
		$appConfig->setValue('core', 'shareapi_enforce_links_password', 'yes');

		// don't allow to share link without a password
		$result = $this->OCSApiController->createShare($this->folder, \OCP\Share::SHARE_TYPE_LINK, null ,null, null, null);
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(403, $result['statuscode']);

		// don't allow to share link without a empty password
		$result = $this->OCSApiController->createShare($this->folder, \OCP\Share::SHARE_TYPE_LINK, null, null, '', null);
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(403, $result['statuscode']);

		// share with password should succeed
		$result = $this->OCSApiController->createShare($this->folder, \OCP\Share::SHARE_TYPE_LINK, null, null, 'foo', null);
		$this->assertArrayHasKey('data', $result);

		$data = $result['data'];

		// setting new password should succeed
		$result = $this->OCSApiController->updateShare($data['id'], null, 'bar', null, null);
		$this->assertEmpty($result);

		// removing password should fail
		$result = $this->OCSApiController->updateShare($data['id'], null, '', null, null);
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(403, $result['statuscode']);

		// cleanup
		$fileinfo = $this->view->getFileInfo($this->folder);
		\OCP\Share::unshare('folder', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		$appConfig->setValue('core', 'shareapi_enforce_links_password', 'no');
	}

	/**
	 * @medium
	*/
	public function testSharePermissions() {

		// sharing file to a user should work if shareapi_exclude_groups is set
		// to no
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'no');

		$result = $this->OCSApiController->createShare($this->filename, \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, null, null, null);

		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];

		$share = $this->getShareFromId($data['id']);

		$items = \OCP\Share::getItemShared('file', $share['item_source']);

		$this->assertTrue(!empty($items));

		$fileinfo = $this->view->getFileInfo($this->filename);

		$result = \OCP\Share::unshare('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		$this->assertTrue($result);

		// exclude groups, but not the group the user belongs to. Sharing should still work
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'yes');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', 'admin,group1,group2');

		$result = $this->OCSApiController->createShare($this->filename, \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, null, null, null);

		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];

		$share = $this->getShareFromId($data['id']);

		$items = \OCP\Share::getItemShared('file', $share['item_source']);

		$this->assertTrue(!empty($items));

		$fileinfo = $this->view->getFileInfo($this->filename);

		$result = \OCP\Share::unshare('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		$this->assertTrue($result);

		// now we exclude the group the user belongs to ('group'), sharing should fail now
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', 'admin,group');

		$result = $this->OCSApiController->createShare($this->filename, \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, null, null, null);

		$this->assertEquals(403, $result['statuscode']);

		// cleanup
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'no');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', '');
	}


	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testGetAllShares() {

		$fileinfo = $this->view->getFileInfo($this->filename);

		\OCP\Share::shareItem('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
		self::TEST_FILES_SHARING_API_USER2, 31);

		$result = $this->OCSApiController->getAllShares(null, null, null);
		$this->assertArrayHasKey('data', $result);

		// test should return one share 
		$this->assertTrue(count($result['data']) === 1);

		\OCP\Share::unshare('file', $fileinfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testGetShareFromSource() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		$result = $this->OCSApiController->getAllShares($this->filename, null, null);
		$this->assertArrayHasKey('data', $result);

		$this->assertTrue(count($result['data']) === 2);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testGetShareFromSourceWithReshares() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		// share the file as user1 to user2
		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// login as user2 and reshare the file to user3
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3, 31);

		// login as user1 again
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$result = $this->OCSApiController->getAllShares($this->filename, null, null);
		$this->assertArrayHasKey('data', $result);

		// test should return one share
		$this->assertTrue(count($result['data']) === 1);

		// now also ask for the reshares
		$result = $this->OCSApiController->getAllShares($this->filename, true, null);
		$this->assertArrayHasKey('data', $result);

		// now we should get two shares, the initial share and the reshare
		$this->assertTrue(count($result['data']) === 2);

		// unshare files again
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testGetShareFromId() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		$result = \OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
			self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// get item to determine share ID
		$result = \OCP\Share::getItemShared('file', $fileInfo['fileid']);

		$this->assertEquals(1, count($result));

		// get first element
		$share = reset($result);

		// call getShare() with share ID
		$result = $this->OCSApiController->getShare($share['id']);
		$this->assertArrayHasKey('data', $result);

		// test should return one share created from testCreateShare()
		$this->assertEquals(1, count($result['data']));

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
			self::TEST_FILES_SHARING_API_USER2);

	}

	/**
	 * @medium
	 */
	public function testGetShareFromFolder() {

		$fileInfo1 = $this->view->getFileInfo($this->filename);
		$fileInfo2 = $this->view->getFileInfo($this->folder.'/'.$this->filename);

		$result = \OCP\Share::shareItem('file', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		$result = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		// share was successful?
		$this->assertTrue(is_string($result));

		$result = $this->OCSApiController->getAllShares($this->folder, null, true);
		$this->assertArrayHasKey('data', $result);

		// test should return one share within $this->folder
		$this->assertTrue(count($result['data']) === 1);

		\OCP\Share::unshare('file', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		\OCP\Share::unshare('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

	}

	/**
	 * share a folder, than reshare a file within the shared folder and check if we construct the correct path
	 * @medium
	 */
	public function testGetShareFromFolderReshares() {

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo1 = $this->view->getFileInfo($this->folder);
		$fileInfo2 = $this->view->getFileInfo($this->folder.'/'.$this->filename);
		$fileInfo3 = $this->view->getFileInfo($this->folder.'/' . $this->subfolder . '/' .$this->filename);

		// share root folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// login as user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		// share file in root folder
		$result = \OCP\Share::shareItem('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);
		// share was successful?
		$this->assertTrue(is_string($result));

		// share file in subfolder
		$result = \OCP\Share::shareItem('file', $fileInfo3['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);
		// share was successful?
		$this->assertTrue(is_string($result));

		$testValues=array(
			array('query' => $this->folder,
				'expectedResult' => $this->folder . $this->filename),
			array('query' => $this->folder . $this->subfolder,
				'expectedResult' => $this->folder . $this->subfolder . $this->filename),
		);
		foreach ($testValues as $value) {
			$result = $this->OCSApiController->getAllShares($value['query'], null, true);
			$this->assertArrayHasKey('data', $result);
			$this->assertCount(1, $result['data']);
			$this->assertEquals($value['expectedResult'], $result['data'][0]['path']);
		}

		// cleanup

		\OCP\Share::unshare('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		\OCP\Share::unshare('file', $fileInfo3['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		\OCP\Share::unshare('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

	}

	/**
	 * reshare a sub folder and check if we get the correct path
	 * @medium
	 */
	public function testGetShareFromSubFolderReShares() {

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo = $this->view->getFileInfo($this->folder . $this->subfolder);

		// share sub-folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// login as user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		// reshare subfolder
		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);

		// share was successful?
		$this->assertTrue(is_string($result));

		$result = $this->OCSApiController->getAllShares('/', null, true);
		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];
		$this->assertCount(1, $data);

		$expectedPath = $this->subfolder;
		$this->assertEquals($expectedPath, $data[0]['path']);

		// cleanup
		$result = \OCP\Share::unshare('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		$result = \OCP\Share::unshare('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);

	}

	/**
	 * test re-re-share of folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareFromFolderReReShares() {

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo1 = $this->view->getFileInfo($this->folder . $this->subfolder);
		$fileInfo2 = $this->view->getFileInfo($this->folder . $this->subfolder . $this->subsubfolder);

		// share sub-folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// login as user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		// reshare subsubfolder
		$result = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3, 31);
		// share was successful?
		$this->assertTrue($result);

		// login as user3
		self::loginHelper(self::TEST_FILES_SHARING_API_USER3);

		$result = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);
		// share was successful?
		$this->assertTrue(is_string($result));

		$result = $this->OCSApiController->getAllShares('/', null, true);
		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];
		$this->assertCount(1, $data);

		$expectedPath = $this->subsubfolder;
		$this->assertEquals($expectedPath, $data[0]['path']);


		// cleanup
		$result = \OCP\Share::unshare('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);
		$result = \OCP\Share::unshare('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		$result = \OCP\Share::unshare('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);

	}

	/**
	 * test multiple shared folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareMultipleSharedFolder() {

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo1 = $this->view->getFileInfo($this->folder);
		$fileInfo2 = $this->view->getFileInfo($this->folder . $this->subfolder);


		// share sub-folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// share folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);


		// login as user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$result = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);
		// share was successful?
		$this->assertTrue(is_string($result));


		// ask for subfolder
		$expectedPath1 = $this->subfolder;

		$result1 = $this->OCSApiController->getAllShares($expectedPath1, null, null);
		$this->assertArrayHasKey('data', $result1);
		$data1 = $result1['data'];
		$this->assertCount(1, $data1);
		$share1 = reset($data1);

		// ask for folder/subfolder
		$expectedPath2 = $this->folder . $this->subfolder;

		$result2 = $this->OCSApiController->getAllShares($expectedPath2, null, null);
		$this->assertArrayHasKey('data', $result2);
		$data2 = $result2['data'];
		$this->assertCount(1, $data2);
		$share2 = reset($data2);

		// validate results
		// we should get exactly one result each time
		$this->assertEquals(1, count($data1));
		$this->assertEquals(1, count($data2));

		$this->assertEquals($expectedPath1, $share1['path']);
		$this->assertEquals($expectedPath2, $share2['path']);


		// cleanup
		$result = \OCP\Share::unshare('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		$result = \OCP\Share::unshare('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);
		$result = \OCP\Share::unshare('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);

	}

	/**
	 * test re-re-share of folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareFromFileReReShares() {

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo1 = $this->view->getFileInfo($this->folder . $this->subfolder);
		$fileInfo2 = $this->view->getFileInfo($this->folder. $this->subfolder . $this->filename);

		// share sub-folder to user2
		$result = \OCP\Share::shareItem('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		// share was successful?
		$this->assertTrue($result);

		// login as user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		// reshare subsubfolder
		$result = \OCP\Share::shareItem('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3, 31);
		// share was successful?
		$this->assertTrue($result);

		// login as user3
		self::loginHelper(self::TEST_FILES_SHARING_API_USER3);

		$result = \OCP\Share::shareItem('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);
		// share was successful?
		$this->assertTrue(is_string($result));

		$result = $this->OCSApiController->getAllShares('/', null, true);
		$this->assertArrayHasKey('data', $result);
		$data = $result['data'];
		$this->assertCount(1, $data);

		$expectedPath = $this->filename;
		$this->assertEquals($expectedPath, $data[0]['path']);

		// cleanup
		$result = \OCP\Share::unshare('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);
		$result = \OCP\Share::unshare('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER3);
		$this->assertTrue($result);

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		$result = \OCP\Share::unshare('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);

	}

	/**
	 * @medium
	 */
	public function testGetShareFromUnknownId() {
		$result = $this->OCSApiController->getShare(0);
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(404, $result['statuscode']);
	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testUpdateShare() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		$result = \OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, \OCP\Constants::PERMISSION_ALL);

		// share was successful?
		$this->assertTrue($result);

		$result = \OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		// share was successful?
		$this->assertTrue(is_string($result));

		$items = \OCP\Share::getItemShared('file', null);

		// make sure that we found a link share and a user share
		$this->assertEquals(count($items), 2);

		$linkShare = null;
		$userShare = null;

		foreach ($items as $item) {
			if ($item['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$linkShare = $item;
			}
			if ($item['share_type'] === \OCP\Share::SHARE_TYPE_USER) {
				$userShare = $item;
			}
		}

		// make sure that we found a link share and a user share
		$this->assertTrue(is_array($linkShare));
		$this->assertTrue(is_array($userShare));

		// check if share have expected permissions, single shared files never have
		// delete permissions
		$this->assertEquals(\OCP\Constants::PERMISSION_ALL & ~\OCP\Constants::PERMISSION_DELETE, $userShare['permissions']);

		//no elements
		$pdo = $this->getMock('mockPDOStatement', ['fetch']);
		$this->qb->method('execute')->willReturn($pdo);

		// update permissions
		$result = $this->OCSApiController->updateShare($userShare['id'], 1, null, null, null);
		$this->assertEmpty($result);

		$items = \OCP\Share::getItemShared('file', $userShare['file_source']);

		$newUserShare = null;
		foreach ($items as $item) {
			if ($item['share_with'] === self::TEST_FILES_SHARING_API_USER2) {
				$newUserShare = $item;
				break;
			}
		}

		$this->assertTrue(is_array($newUserShare));

		$this->assertEquals('1', $newUserShare['permissions']);

		// update password for link share

		$this->assertTrue(empty($linkShare['share_with']));

		$result = $this->OCSApiController->updateShare($linkShare['id'], null, 'foo', null, null);
		$this->assertEmpty($result);

		$items = \OCP\Share::getItemShared('file', $linkShare['file_source']);

		$newLinkShare = null;
		foreach ($items as $item) {
			if ($item['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$newLinkShare = $item;
				break;
			}
		}

		$this->assertTrue(is_array($newLinkShare));
		$this->assertTrue(!empty($newLinkShare['share_with']));

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testUpdateShareInvalidPermissions() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		$result = \OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, \OCP\Constants::PERMISSION_ALL);

		// share was successful?
		$this->assertTrue($result);

		$share = \OCP\Share::getItemShared('file', null);
		$this->assertCount(1, $share);
		$share = reset($share);

		// check if share have expected permissions, single shared files never have
		// delete permissions
		$this->assertEquals(\OCP\Constants::PERMISSION_ALL & ~\OCP\Constants::PERMISSION_DELETE, $share['permissions']);

		// update permissions
		$result = $this->OCSApiController->updateShare($share['id'], \OCP\Constants::PERMISSION_SHARE, null, null, null);

		//Updating should fail with 400
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(400, $result['statuscode']);

		$share = \OCP\Share::getItemShared('file', $share['file_source']);
		$share = reset($share);

		//Permissions should not have changed!
		$this->assertEquals(\OCP\Constants::PERMISSION_ALL & ~\OCP\Constants::PERMISSION_DELETE, $share['permissions']);

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
	}


	/**
	 * @medium
	 */
	public function testUpdateShareUpload() {
		//Allow public uploads
		$this->container['Config']->method('getAppValue')->willReturn('yes');

		$fileInfo = $this->view->getFileInfo($this->folder);

		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		// share was successful?
		$this->assertTrue(is_string($result));

		$items = \OCP\Share::getItemShared('file', null);

		// make sure that we found a link share and a user share
		$this->assertEquals(1, count($items));

		$linkShare = null;

		foreach ($items as $item) {
			if ($item['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$linkShare = $item;
			}
		}

		// make sure that we found a link share
		$this->assertTrue(is_array($linkShare));

		// update public upload
		$result = $this->OCSApiController->updateShare($linkShare['id'], null, null, true, null);
		$this->assertEmpty($result);

		$items = \OCP\Share::getItemShared('file', $linkShare['file_source']);

		$updatedLinkShare = null;
		foreach ($items as $item) {
			if ($item['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$updatedLinkShare = $item;
				break;
			}
		}

		$this->assertTrue(is_array($updatedLinkShare));
		$this->assertEquals(7, $updatedLinkShare['permissions']);

		// cleanup

		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

	}

	/**
	 * @medium
	 */
	public function testUpdateShareExpireDate() {

		$fileInfo = $this->view->getFileInfo($this->folder);
		$config = \OC::$server->getConfig();

		// enforce expire date, by default 7 days after the file was share
		$config->setAppValue('core', 'shareapi_default_expire_date', 'yes');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'yes');

		$dateWithinRange = new \DateTime();
		$dateWithinRange->add(new \DateInterval('P5D'));
		$dateOutOfRange = new \DateTime();
		$dateOutOfRange->add(new \DateInterval('P8D'));

		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		// share was successful?
		$this->assertTrue(is_string($result));

		$items = \OCP\Share::getItemShared('file', null);

		// make sure that we found a link share
		$this->assertEquals(1, count($items));

		$linkShare = reset($items);

		// update expire date to a valid value
		$result = $this->OCSApiController->updateShare($linkShare['id'], null, null, null, $dateWithinRange->format('Y-m-d'));
		$this->assertEmpty($result);

		$items = \OCP\Share::getItemShared('file', $linkShare['file_source']);
		$updatedLinkShare = reset($items);

		// date should be changed
		$this->assertTrue(is_array($updatedLinkShare));
		$this->assertEquals($dateWithinRange->format('Y-m-d') . ' 00:00:00', $updatedLinkShare['expiration']);

		// update expire date to a value out of range
		$result = $this->OCSApiController->updateShare($linkShare['id'], null, null, null, $dateOutOfRange->format('Y-m-d'));
		$this->assertArrayHasKey('statuscode', $result);
		$this->assertEquals(404, $result['statuscode']);

		$items = \OCP\Share::getItemShared('file', $linkShare['file_source']);

		$updatedLinkShare = reset($items);

		// date shouldn't be changed
		$this->assertTrue(is_array($updatedLinkShare));
		$this->assertEquals($dateWithinRange->format('Y-m-d') . ' 00:00:00', $updatedLinkShare['expiration']);

		// cleanup
		$config->setAppValue('core', 'shareapi_default_expire_date', 'no');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'no');
		\OCP\Share::unshare('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK, null);

	}

	/**
	 * @medium
	 * @depends testCreateShare
	 */
	public function testDeleteShare() {

		$fileInfo = $this->view->getFileInfo($this->filename);

		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		\OCP\Share::shareItem('file', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_LINK,
				null, 1);

		$items = \OCP\Share::getItemShared('file', null);

		$this->assertEquals(2, count($items));

		foreach ($items as $item) {
			$result = $this->OCSApiController->deleteShare($item['id']);
			$this->assertEmpty($result);
		}

		$itemsAfterDelete = \OCP\Share::getItemShared('file', null);

		$this->assertTrue(empty($itemsAfterDelete));

	}

	/**
	 * test unshare of a reshared file
	 */
	public function testDeleteReshare() {

		// user 1 shares a folder with user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo1 = $this->view->getFileInfo($this->folder);
		$fileInfo2 = $this->view->getFileInfo($this->folder.'/'.$this->filename);

		$result1 = \OCP\Share::shareItem('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		$this->assertTrue($result1);

		// user2 shares a file from the folder as link
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$result2 = \OCP\Share::shareItem('file', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_LINK, null, 1);

		$this->assertTrue(is_string($result2));

		// test if we can unshare the link again
		$items = \OCP\Share::getItemShared('file', null);
		$this->assertEquals(1, count($items));

		$item = reset($items);
		$result3 = $this->OCSApiController->deleteShare($item['id']);
		$this->assertEmpty($result3);

		// cleanup
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$result = \OCP\Share::unshare('folder', $fileInfo1['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);

		$this->assertTrue($result);
	}

	/**
	 * share a folder which contains a share mount point, should be forbidden
	 */
	public function testShareFolderWithAMountPoint() {
		// user 1 shares a folder with user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo = $this->view->getFileInfo($this->folder);

		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		$this->assertTrue($result);

		// user2 shares a file from the folder as link
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$view = new \OC\Files\View('/' . self::TEST_FILES_SHARING_API_USER2 . '/files');
		$view->mkdir("localDir");

		// move mount point to the folder "localDir"
		$result = $view->rename($this->folder, 'localDir/'.$this->folder);
		$this->assertTrue($result !== false);

		// try to share "localDir"
		$fileInfo2 = $view->getFileInfo('localDir');

		$this->assertTrue($fileInfo2 instanceof \OC\Files\FileInfo);

		try {
			$result2 = \OCP\Share::shareItem('folder', $fileInfo2['fileid'], \OCP\Share::SHARE_TYPE_USER,
					self::TEST_FILES_SHARING_API_USER3, 31);
		} catch (\Exception $e) {
			$result2 = false;
		}

		$this->assertFalse($result2);

		//cleanup

		$result = $view->rename('localDir/' . $this->folder, $this->folder);
		$this->assertTrue($result !== false);
		$view->unlink('localDir');

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		\OCP\Share::unshare('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2);
	}

	/**
	 * Post init mount points hook for mounting simulated ext storage
	 *
	 * @param array $data
	 */
	public static function initTestMountPointsHook($data) {
		if ($data['user'] === self::TEST_FILES_SHARING_API_USER1) {
			\OC\Files\Filesystem::mount(self::$tempStorage, array(), '/' . self::TEST_FILES_SHARING_API_USER1 . '/files' . self::TEST_FOLDER_NAME);
		}
	}

	/**
	 * Tests mounting a folder that is an external storage mount point.
	 */
	public function testShareStorageMountPoint() {
		self::$tempStorage = new \OC\Files\Storage\Temporary(array());
		self::$tempStorage->file_put_contents('test.txt', 'abcdef');
		self::$tempStorage->getScanner()->scan('');

		// needed because the sharing code sometimes switches the user internally and mounts the user's
		// storages. In our case the temp storage isn't mounted automatically, so doing it in the post hook
		// (similar to how ext storage works)
		\OCP\Util::connectHook('OC_Filesystem', 'post_initMountPoints', 'self', 'initTestMountPointsHook');

		// logging in will auto-mount the temp storage for user1 as well
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo = $this->view->getFileInfo($this->folder);

		// user 1 shares the mount point folder with user2
		$result = \OCP\Share::shareItem('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
				self::TEST_FILES_SHARING_API_USER2, 31);

		$this->assertTrue($result);

		// user2: check that mount point name appears correctly
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$view = new \OC\Files\View('/' . self::TEST_FILES_SHARING_API_USER2 . '/files');

		$this->assertTrue($view->file_exists($this->folder));
		$this->assertTrue($view->file_exists($this->folder . '/test.txt'));

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		\OCP\Share::unshare('folder', $fileInfo['fileid'], \OCP\Share::SHARE_TYPE_USER,
			self::TEST_FILES_SHARING_API_USER2);

		\OC_Hook::clear('OC_Filesystem', 'post_initMountPoints', 'self', 'initTestMountPointsHook');
	}
	/**
	 * @expectedException \Exception
	 */
	public function testShareNonExisting() {
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$id = PHP_INT_MAX - 1;
		\OCP\Share::shareItem('file', $id, \OCP\Share::SHARE_TYPE_LINK, self::TEST_FILES_SHARING_API_USER2, 31);
	}

	/**
	 * @expectedException \Exception
	 */
	public function testShareNotOwner() {
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);
		\OC\Files\Filesystem::file_put_contents('foo.txt', 'bar');
		$info = \OC\Files\Filesystem::getFileInfo('foo.txt');

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		\OCP\Share::shareItem('file', $info->getId(), \OCP\Share::SHARE_TYPE_LINK, self::TEST_FILES_SHARING_API_USER2, 31);
	}

	public function testDefaultExpireDate() {
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_default_expire_date', 'yes');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_enforce_expire_date', 'yes');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_expire_after_n_days', '2');

		// default expire date is set to 2 days
		// the time when the share was created is set to 3 days in the past
		// user defined expire date is set to +2 days from now on
		// -> link should be already expired by the default expire date but the user
		//    share should still exists.
		$now = time();
		$dateFormat = 'Y-m-d H:i:s';
		$shareCreated = $now - 3 * 24 * 60 * 60;
		$expireDate = date($dateFormat, $now + 2 * 24 * 60 * 60);

		$info = \OC\Files\Filesystem::getFileInfo($this->filename);
		$this->assertTrue($info instanceof \OC\Files\FileInfo);

		$result = \OCP\Share::shareItem('file', $info->getId(), \OCP\Share::SHARE_TYPE_LINK, null, \OCP\Constants::PERMISSION_READ);
		$this->assertTrue(is_string($result));

		$result = \OCP\Share::shareItem('file', $info->getId(), \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2, 31);
		$this->assertTrue($result);

		$result = \OCP\Share::setExpirationDate('file', $info->getId() , $expireDate, $now);
		$this->assertTrue($result);

		//manipulate stime so that both shares are older then the default expire date
		$statement = "UPDATE `*PREFIX*share` SET `stime` = ? WHERE `share_type` = ?";
		$query = \OCP\DB::prepare($statement);
		$result = $query->execute(array($shareCreated, \OCP\Share::SHARE_TYPE_LINK));
		$this->assertSame(1, $result);
		$query = \OCP\DB::prepare($statement);
		$result = $query->execute(array($shareCreated, \OCP\Share::SHARE_TYPE_USER));
		$this->assertSame(1, $result);

		// now the link share should expire because of enforced default expire date
		// the user share should still exist
		$result = \OCP\Share::getItemShared('file', $info->getId());
		$this->assertTrue(is_array($result));
		$this->assertSame(1, count($result));
		$share = reset($result);
		$this->assertSame(\OCP\Share::SHARE_TYPE_USER, $share['share_type']);

		//cleanup
		$result = \OCP\Share::unshare('file', $info->getId(), \OCP\Share::SHARE_TYPE_USER, self::TEST_FILES_SHARING_API_USER2);
		$this->assertTrue($result);
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_default_expire_date', 'no');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_enforce_expire_date', 'no');

	}
}
