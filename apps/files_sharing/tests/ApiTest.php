<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
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

namespace OCA\Files_Sharing\Tests;
use OCP\Constants;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Share;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCA\Files_Sharing\SharingBlacklist;

/**
 * Class ApiTest
 *
 * @group DB
 */
class ApiTest extends TestCase {
	const TEST_FOLDER_NAME = '/folder_share_api_test';

	private static $tempStorage;

	/** @var \OCP\Files\Folder */
	private $userFolder;

	/** @var string */
	private $subsubfolder;

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

		$this->userFolder = \OC::$server->getUserFolder(self::TEST_FILES_SHARING_API_USER1);
	}

	protected function tearDown() {
		if ($this->view instanceof \OC\Files\View) {
			$this->view->unlink($this->filename);
			$this->view->deleteAll($this->folder);
		}

		self::$tempStorage = null;

		parent::tearDown();
	}

	/**
	 * @param array $data
	 * @return \OCP\IRequest
	 */
	private function createRequest(array $data) {
		$request = $this->createMock(IRequest::class);
		$request->method('getParam')
			->will($this->returnCallback(function ($param, $default = null) use ($data) {
				if (isset($data[$param])) {
					return $data[$param];
				}
				return $default;
			}));
		return $request;
	}

	/**
	 * @param \OCP\IRequest $request
	 * @param string $userId The userId of the caller
	 * @return \OCA\Files_Sharing\Controller\Share20OcsController
	 */
	private function createOCS($request, $userId) {
		$currentUser = \OC::$server->getUserManager()->get($userId);
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($currentUser);

		$l = $this->createMock(IL10N::class);
		$l->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));

		return new \OCA\Files_Sharing\Controller\Share20OcsController(
			'files_sharing',
			$request,
			$this->shareManager,
			\OC::$server->getGroupManager(),
			\OC::$server->getUserManager(),
			\OC::$server->getRootFolder(),
			\OC::$server->getURLGenerator(),
			$userSession,
			$l,
			\OC::$server->getConfig(),
			\OC::$server->getAppContainer('files_sharing')->query(NotificationPublisher::class),
			\OC::$server->getEventDispatcher(),
			\OC::$server->getAppContainer('files_sharing')->query(SharingBlacklist::class)
		);
	}

	/**
	 * @medium
	 */
	public function testCreateShareUserFile() {
		// simulate a post request
		$data['path'] = $this->filename;
		$data['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$data['shareType'] = Share::SHARE_TYPE_USER;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();
		$this->assertEquals(19, $data['permissions']);
		$this->assertEmpty($data['expiration']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testCreateShareUserFolder() {
		// simulate a post request
		$data['path'] = $this->folder;
		$data['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$data['shareType'] = Share::SHARE_TYPE_USER;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();
		$this->assertEquals(31, $data['permissions']);
		$this->assertEmpty($data['expiration']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testCreateShareGroupFile() {
		// simulate a post request
		$data['path'] = $this->filename;
		$data['shareWith'] = self::TEST_FILES_SHARING_API_GROUP1;
		$data['shareType'] = Share::SHARE_TYPE_GROUP;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();
		$this->assertEquals(19, $data['permissions']);
		$this->assertEmpty($data['expiration']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testCreateShareGroupFolder() {
		// simulate a post request
		$data['path'] = $this->folder;
		$data['shareWith'] = self::TEST_FILES_SHARING_API_GROUP1;
		$data['shareType'] = Share::SHARE_TYPE_GROUP;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();
		$this->assertEquals(31, $data['permissions']);
		$this->assertEmpty($data['expiration']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testCreateShareLink() {
		// simulate a post request
		$data['path'] = $this->folder;
		$data['shareType'] = Share::SHARE_TYPE_LINK;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		// check if API call was successful
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertEquals(1, $data['permissions']);
		$this->assertEmpty($data['expiration']);
		$this->assertInternalType('string', $data['token']);

		// check for correct link
		$url = \OC::$server->getURLGenerator()->getAbsoluteURL('/index.php/s/' . $data['token']);
		$this->assertEquals($url, $data['url']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testCreateShareLinkPublicUpload() {
		// simulate a post request
		$data['path'] = $this->folder;
		$data['shareType'] = Share::SHARE_TYPE_LINK;
		$data['publicUpload'] = 'true';

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		// check if API call was successful
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertEquals(
			Constants::PERMISSION_READ |
			Constants::PERMISSION_CREATE |
			Constants::PERMISSION_UPDATE |
			Constants::PERMISSION_DELETE,
			$data['permissions']
		);
		$this->assertEmpty($data['expiration']);
		$this->assertInternalType('string', $data['token']);

		// check for correct link
		$url = \OC::$server->getURLGenerator()->getAbsoluteURL('/index.php/s/' . $data['token']);
		$this->assertEquals($url, $data['url']);

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());
	}

	public function testEnforceLinkPassword() {
		$appConfig = \OC::$server->getAppConfig();
		$appConfig->setValue('core', 'shareapi_enforce_links_password_read_only', 'yes');

		// don't allow to share link without a password
		$data['path'] = $this->folder;
		$data['shareType'] = Share::SHARE_TYPE_LINK;

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertFalse($result->succeeded());

		// don't allow to share link without a empty password
		$data = [];
		$data['path'] = $this->folder;
		$data['shareType'] = Share::SHARE_TYPE_LINK;
		$data['password'] = '';

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertFalse($result->succeeded());

		// share with password should succeed
		$data = [];
		$data['path'] = $this->folder;
		$data['shareType'] = Share::SHARE_TYPE_LINK;
		$data['password'] = 'foo';

		$request = $this->createRequest($data);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());

		$data = $result->getData();

		// setting new password should succeed
		$data2 = [
			'password' => 'bar',
		];
		$request = $this->createRequest($data2);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($data['id']);
		$this->assertTrue($result->succeeded());

		// removing password should fail
		$data2 = [
			'password' => '',
		];
		$request = $this->createRequest($data2);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($data['id']);
		$this->assertFalse($result->succeeded());

		// cleanup
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());

		$appConfig->setValue('core', 'shareapi_enforce_links_password_read_only', 'no');
	}

	/**
	 * @medium
	*/
	public function testSharePermissions() {
		// sharing file to a user should work if shareapi_exclude_groups is set
		// to no
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'no');
		$post['path'] = $this->filename;
		$post['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$post['shareType'] = Share::SHARE_TYPE_USER;

		$request = $this->createRequest($post);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();

		$this->shareManager->getShareById('ocinternal:'.$data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());

		// exclude groups, but not the group the user belongs to. Sharing should still work
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'yes');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', 'admin,group1,group2');

		$post = [];
		$post['path'] = $this->filename;
		$post['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$post['shareType'] = Share::SHARE_TYPE_USER;

		$request = $this->createRequest($post);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		$this->assertTrue($result->succeeded());
		$data = $result->getData();

		$this->shareManager->getShareById('ocinternal:' . $data['id']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($data['id']);
		$this->assertTrue($result->succeeded());

		// now we exclude the group the user belongs to ('group'), sharing should fail now
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', 'admin,group');

		$post = [];
		$post['path'] = $this->filename;
		$post['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$post['shareType'] = Share::SHARE_TYPE_USER;

		$request = $this->createRequest($post);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		// cleanup
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups', 'no');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_exclude_groups_list', '');
	}

	/**
	 * @medium
	 */
	public function testGetAllShares() {
		$node = $this->userFolder->get($this->filename);

		$share = $this->shareManager->newShare();
		$share->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);

		$share = $this->shareManager->createShare($share);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();

		$this->assertTrue($result->succeeded());
		$this->assertCount(1, $result->getData());

		$this->shareManager->deleteShare($share);
	}

	public function testGetAllSharesWithMe() {
		\OC::$server->getConfig()->setAppValue('core', 'shareapi_exclude_groups_list', '[]');
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = $this->userFolder->get($this->folder);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share2 = $this->shareManager->createShare($share2);

		$request = $this->createRequest(['shared_with_me' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->getShares();

		$this->assertTrue($result->succeeded());
		$this->assertCount(2, $result->getData());

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
		\OC::$server->getConfig()->deleteAppValue('core', 'shareapi_exclude_groups_list');
	}

	/**
	 * @medium
	 */
	public function testPublicLinkUrl() {
		// simulate a post request
		$post['path'] = $this->folder;
		$post['shareType'] = Share::SHARE_TYPE_LINK;

		$request = $this->createRequest($post);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());

		$data = $result->getData();

		// check if we have a token
		$this->assertInternalType('string', $data['token']);
		$id = $data['id'];

		// check for correct link
		$url = \OC::$server->getURLGenerator()->getAbsoluteURL('/index.php/s/' . $data['token']);
		$this->assertEquals($url, $data['url']);

		// check for link in getall shares
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertEquals($url, \current($data)['url']);

		// check for path
		$request = $this->createRequest(['path' => $this->folder]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertEquals($url, \current($data)['url']);

		// check in share id
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShare($id);
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertEquals($url, \current($data)['url']);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($id);
		$this->assertTrue($result->succeeded());
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 * @depends testCreateShareLink
	 */
	public function testGetShareFromSource() {
		$node = $this->userFolder->get($this->filename);
		$share = $this->shareManager->newShare();
		$share->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share);

		$share = $this->shareManager->newShare();
		$share->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share);

		$request = $this->createRequest(['path' => $this->filename]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share created from testCreateShare()
		$this->assertCount(2, $result->getData());

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 * @depends testCreateShareLink
	 */
	public function testGetShareFromSourceWithReshares() {
		$node = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$share2 = $this->shareManager->newShare();
		$share2->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER3)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share2 = $this->shareManager->createShare($share2);

		$request = $this->createRequest(['path' => $this->filename]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share
		$this->assertCount(1, $result->getData());

		// now also ask for the reshares
		$request = $this->createRequest(['path' => $this->filename, 'reshares' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		$this->assertTrue($result->succeeded());

		// now we should get two shares, the initial share and the reshare
		$this->assertCount(2, $result->getData());

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 */
	public function testGetShareFromId() {
		$node = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		// call getShare() with share ID
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShare($share1->getId());
		$this->assertTrue($result->succeeded());

		// test should return one share created from testCreateShare()
		$this->assertCount(1, $result->getData());

		$this->shareManager->deleteShare($share1);
	}

	/**
	 * @medium
	 */
	public function testGetShareFromFolder() {
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = $this->userFolder->get($this->folder.'/'.$this->filename);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share2);

		$request = $this->createRequest(['path' => $this->folder, 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$this->assertCount(1, $result->getData());

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
	}

	public function testGetShareFromFolderWithFile() {
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$request = $this->createRequest(['path' => $this->filename, 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();

		$this->assertFalse($result->succeeded());
		$this->assertEquals(400, $result->getStatusCode());
		$this->assertEquals('Not a directory', $result->getMeta()['message']);

		$this->shareManager->deleteShare($share1);
	}

	/**
	 * share a folder, than reshare a file within the shared folder and check if we construct the correct path
	 * @medium
	 */
	public function testGetShareFromFolderReshares() {
		$node1 = $this->userFolder->get($this->folder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = $this->userFolder->get($this->folder.'/'.$this->filename);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share2);

		$node3 = $this->userFolder->get($this->folder.'/'.$this->subfolder.'/'.$this->filename);
		$share3 = $this->shareManager->newShare();
		$share3->setNode($node3)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share3 = $this->shareManager->createShare($share3);

		$testValues= [
			['query' => $this->folder,
				'expectedResult' => $this->folder . $this->filename],
			['query' => $this->folder . $this->subfolder,
				'expectedResult' => $this->folder . $this->subfolder . $this->filename],
		];
		foreach ($testValues as $value) {
			$request = $this->createRequest(['path' => $value['query'], 'subfiles' => 'true']);
			$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
			$result = $ocs->getShares();
			$this->assertTrue($result->succeeded());

			// test should return one share within $this->folder
			$data = $result->getData();

			$this->assertEquals($value['expectedResult'], $data[0]['path']);
		}

		// cleanup
		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
		$this->shareManager->deleteShare($share3);
	}

	/**
	 * reshare a sub folder and check if we get the correct path
	 * @medium
	 */
	public function testGetShareFromSubFolderReShares() {
		$node1 = $this->userFolder->get($this->folder . $this->subfolder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = \OC::$server->getRootFolder()->getUserFolder(self::TEST_FILES_SHARING_API_USER2)->get($this->subfolder);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share2);

		$request = $this->createRequest(['path' => '/', 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$data = $result->getData();

		// we should get exactly one result
		$this->assertCount(1, $data);

		$this->assertEquals($this->subfolder, $data[0]['path']);

		$this->shareManager->deleteShare($share2);
		$this->shareManager->deleteShare($share1);
	}

	/**
	 * test re-re-share of folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareFromFolderReReShares() {
		$node1 = $this->userFolder->get($this->folder . $this->subfolder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = $this->userFolder->get($this->folder . $this->subfolder . $this->subsubfolder);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER3)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share2 = $this->shareManager->createShare($share2);

		$share3 = $this->shareManager->newShare();
		$share3->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER3)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share3 = $this->shareManager->createShare($share3);

		/*
		 * Test as recipient
		 */
		$request = $this->createRequest(['path' => '/', 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER3);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$data = $result->getData();

		// we should get exactly one result
		$this->assertCount(1, $data);
		$this->assertEquals($this->subsubfolder, $data[0]['path']);

		/*
		 * Test for first owner/initiator
		 */
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$data = $result->getData();

		// we should get exactly one result
		$this->assertCount(1, $data);
		$this->assertEquals($this->folder . $this->subfolder, $data[0]['path']);

		/*
		 * Test for second initiator
		 */
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$data = $result->getData();

		// we should get exactly one result
		$this->assertCount(1, $data);
		$this->assertEquals($this->subfolder . $this->subsubfolder, $data[0]['path']);

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
		$this->shareManager->deleteShare($share3);
	}

	/**
	 * test multiple shared folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareMultipleSharedFolder() {
		$node1 = $this->userFolder->get($this->folder . $this->subfolder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$node2 = $this->userFolder->get($this->folder);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share2 = $this->shareManager->createShare($share2);

		$share3 = $this->shareManager->newShare();
		$share3->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share3 = $this->shareManager->createShare($share3);

		$request = $this->createRequest(['path' => $this->subfolder]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result1 = $ocs->getShares();
		$this->assertTrue($result1->succeeded());

		// test should return one share within $this->folder
		$data1 = $result1->getData();
		$this->assertCount(1, $data1);
		$s1 = \reset($data1);

		$request = $this->createRequest(['path' => $this->folder.$this->subfolder]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result2 = $ocs->getShares();
		$this->assertTrue($result2->succeeded());

		// test should return one share within $this->folder
		$data2 = $result2->getData();
		$this->assertCount(1, $data2);
		$s2 = \reset($data2);

		$this->assertEquals($this->folder.$this->subfolder, $s1['path']);
		$this->assertEquals($this->folder.$this->subfolder, $s2['path']);

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
		$this->shareManager->deleteShare($share3);
	}

	/**
	 * test re-re-share of folder if the path gets constructed correctly
	 * @medium
	 */
	public function testGetShareFromFileReReShares() {
		$node1 = $this->userFolder->get($this->folder . $this->subfolder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$user2Folder = \OC::$server->getUserFolder(self::TEST_FILES_SHARING_API_USER2);
		$node2 = $user2Folder->get($this->subfolder . $this->filename);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER3)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share2 = $this->shareManager->createShare($share2);

		$user3Folder = \OC::$server->getUserFolder(self::TEST_FILES_SHARING_API_USER3);
		$node3 = $user3Folder->get($this->filename);
		$share3 = $this->shareManager->newShare();
		$share3->setNode($node3)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER3)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share3 = $this->shareManager->createShare($share3);

		$request = $this->createRequest(['path' => '/', 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER3);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		// test should return one share within $this->folder
		$data = $result->getData();

		// we should get exactly one result
		$this->assertCount(1, $data);

		$this->assertEquals($this->filename, $data[0]['path']);

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
		$this->shareManager->deleteShare($share3);
	}

	/**
	 * @medium
	 */
	public function testGetShareFromUnknownId() {
		$request = $this->createRequest(['path' => '/', 'subfiles' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER3);
		$result = $ocs->getShare(0);
		$this->assertFalse($result->succeeded());

		$this->assertEquals(404, $result->getStatusCode());
		$meta = $result->getMeta();
		$this->assertEquals('Wrong share ID, share doesn\'t exist', $meta['message']);
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 * @depends testCreateShareLink
	 */
	public function testUpdateShare() {
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19)
			->setAttributes($this->shareManager->newShare()->newAttributes());
		$share1 = $this->shareManager->createShare($share1);
		$this->assertEquals(19, $share1->getPermissions());
		$this->assertEquals(null, $share1->getAttributes());

		$share2 = $this->shareManager->newShare();
		$share2->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share2);
		$this->assertEquals(1, $share2->getPermissions());

		// update permissions
		$params = [
			'permissions' => '1',
			'attributes' => [
				[
					'scope' => 'app1',
					'key' => 'attr1',
					'enabled' => 'true',
				],
			]
		];
		$request = $this->createRequest($params);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());
		$this->assertTrue($result->succeeded());

		$meta = $result->getMeta();
		$this->assertTrue($result->succeeded(), $meta['message']);

		$share1 = $this->shareManager->getShareById('ocinternal:' . $share1->getId());
		$this->assertEquals(1, $share1->getPermissions());
		$this->assertEquals(true, $share1->getAttributes()->getAttribute('app1', 'attr1'));

		// update password for link share
		$this->assertNull($share2->getPassword());

		$request = $this->createRequest(['password' => 'foo']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share2->getId());
		$this->assertTrue($result->succeeded());

		$share2 = $this->shareManager->getShareById('ocinternal:' . $share2->getId());
		$this->assertNotNull($share2->getPassword());

		$request = $this->createRequest(['password' => '']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share2->getId());
		$this->assertTrue($result->succeeded());

		$share2 = $this->shareManager->getShareById('ocinternal:' . $share2->getId());
		$this->assertNull($share2->getPassword());

		$this->shareManager->deleteShare($share1);
		$this->shareManager->deleteShare($share2);
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 */
	public function testUpdateShareInvalidPermissions() {
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$request = $this->createRequest(['permissions' => Constants::PERMISSION_ALL]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());

		//Updating should fail with 400
		$this->assertFalse($result->succeeded());
		$this->assertEquals(400, $result->getStatusCode());

		//Permissions should not have changed!
		$share1 = $this->shareManager->getShareById('ocinternal:' . $share1->getId());
		$this->assertEquals(19, $share1->getPermissions());

		$this->shareManager->deleteShare($share1);
	}

	/**
	 * @medium
	 */
	public function testUpdateShareUpload() {
		$node1 = $this->userFolder->get($this->folder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share1 = $this->shareManager->createShare($share1);

		// update public upload
		$request = $this->createRequest(['publicUpload' => 'true']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());
		$this->assertTrue($result->succeeded());

		$share1 = $this->shareManager->getShareById($share1->getFullId());
		$this->assertEquals(
			Constants::PERMISSION_READ |
			Constants::PERMISSION_CREATE |
			Constants::PERMISSION_UPDATE |
			Constants::PERMISSION_DELETE,
			$share1->getPermissions()
		);

		// cleanup
		$this->shareManager->deleteShare($share1);
	}

	/**
	 * @medium
	 */
	public function testUpdateShareExpireDate() {
		$node1 = $this->userFolder->get($this->folder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share1 = $this->shareManager->createShare($share1);

		$config = \OC::$server->getConfig();

		// enforce expire date, by default 7 days after the file was shared
		$config->setAppValue('core', 'shareapi_default_expire_date', 'yes');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'yes');

		$dateWithinRange = new \DateTime();
		$dateWithinRange->setTime(0, 0, 0);
		$dateWithinRange->add(new \DateInterval('P5D'));
		$dateOutOfRange = new \DateTime();
		$dateOutOfRange->setTime(0, 0, 0);
		$dateOutOfRange->add(new \DateInterval('P8D'));

		// update expire date to a valid value
		$request = $this->createRequest(['expireDate' => $dateWithinRange->format('Y-m-d')]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());
		$this->assertTrue($result->succeeded());

		$share1 = $this->shareManager->getShareById($share1->getFullId());

		// date should be changed
		$this->assertEquals($dateWithinRange, $share1->getExpirationDate());

		// update expire date to a value out of range
		$request = $this->createRequest(['expireDate' => $dateOutOfRange->format('Y-m-d')]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());
		$this->assertFalse($result->succeeded());

		$share1 = $this->shareManager->getShareById($share1->getFullId());

		// date shouldn't be changed
		$this->assertEquals($dateWithinRange, $share1->getExpirationDate());

		// Try to remove expire date
		$request = $this->createRequest(['expireDate' => '']);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->updateShare($share1->getId());
		$this->assertFalse($result->succeeded());

		$share1 = $this->shareManager->getShareById($share1->getFullId());

		// date shouldn't be changed
		$this->assertEquals($dateWithinRange, $share1->getExpirationDate());
		// cleanup
		$config->setAppValue('core', 'shareapi_default_expire_date', 'no');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'no');
		$this->shareManager->deleteShare($share1);
	}

	/**
	 * @medium
	 * @depends testCreateShareUserFile
	 */
	public function testDeleteShare() {
		$node1 = $this->userFolder->get($this->filename);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$share1 = $this->shareManager->createShare($share1);

		$share2 = $this->shareManager->newShare();
		$share2->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share1);

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($share1->getId());
		$this->assertTrue($result->succeeded());

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($share2->getId());
		$this->assertTrue($result->succeeded());

		$this->assertEmpty($this->shareManager->getSharesBy(self::TEST_FILES_SHARING_API_USER2, Share::SHARE_TYPE_USER));
		$this->assertEmpty($this->shareManager->getSharesBy(self::TEST_FILES_SHARING_API_USER2, Share::SHARE_TYPE_LINK));
	}

	/**
	 * test unshare of a reshared file
	 */
	public function testDeleteReshare() {
		$node1 = $this->userFolder->get($this->folder);
		$share1 = $this->shareManager->newShare();
		$share1->setNode($node1)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER1)
			->setSharedWith(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(31);
		$share1 = $this->shareManager->createShare($share1);

		$user2folder = \OC::$server->getUserFolder(self::TEST_FILES_SHARING_API_USER2);
		$node2 = $user2folder->get($this->folder.'/'.$this->filename);
		$share2 = $this->shareManager->newShare();
		$share2->setNode($node2)
			->setSharedBy(self::TEST_FILES_SHARING_API_USER2)
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(1);
		$share2 = $this->shareManager->createShare($share2);

		// test if we can unshare the link again
		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->deleteShare($share2->getId());
		$this->assertTrue($result->succeeded());

		$this->shareManager->deleteShare($share1);
	}

	/**
	 * share a folder which contains a share mount point, should be forbidden
	 */
	public function testShareFolderWithAMountPoint() {
		// user 1 shares a folder with user2
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo = $this->view->getFileInfo($this->folder);

		$share = $this->share(
			Share::SHARE_TYPE_USER,
			$this->folder,
			self::TEST_FILES_SHARING_API_USER1,
			self::TEST_FILES_SHARING_API_USER2,
			Constants::PERMISSION_ALL
		);

		// user2 shares a file from the folder as link
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$view = new \OC\Files\View('/' . self::TEST_FILES_SHARING_API_USER2 . '/files');
		$view->mkdir("localDir");

		// move mount point to the folder "localDir"
		$result = $view->rename($this->folder, 'localDir/'.$this->folder);
		$this->assertNotFalse($result);

		// try to share "localDir"
		$fileInfo2 = $view->getFileInfo('localDir');

		$this->assertInstanceOf(\OC\Files\FileInfo::class, $fileInfo2);

		$pass = true;
		try {
			$this->share(
				Share::SHARE_TYPE_USER,
				'localDir',
				self::TEST_FILES_SHARING_API_USER2,
				self::TEST_FILES_SHARING_API_USER3,
				Constants::PERMISSION_ALL
			);
		} catch (\Exception $e) {
			$pass = false;
		}

		$this->assertFalse($pass);

		//cleanup

		$result = $view->rename('localDir/' . $this->folder, $this->folder);
		$this->assertNotFalse($result);
		$view->unlink('localDir');

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$this->shareManager->deleteShare($share);
	}

	/**
	 * Post init mount points hook for mounting simulated ext storage
	 */
	public static function initTestMountPointsHook($data) {
		if ($data['user'] === self::TEST_FILES_SHARING_API_USER1) {
			\OC\Files\Filesystem::mount(self::$tempStorage, [], '/' . self::TEST_FILES_SHARING_API_USER1 . '/files' . self::TEST_FOLDER_NAME);
		}
	}

	/**
	 * Tests mounting a folder that is an external storage mount point.
	 */
	public function testShareStorageMountPoint() {
		self::$tempStorage = new \OC\Files\Storage\Temporary([]);
		self::$tempStorage->file_put_contents('test.txt', 'abcdef');
		self::$tempStorage->getScanner()->scan('');

		// needed because the sharing code sometimes switches the user internally and mounts the user's
		// storages. In our case the temp storage isn't mounted automatically, so doing it in the post hook
		// (similar to how ext storage works)
		\OCP\Util::connectHook('OC_Filesystem', 'post_initMountPoints', '\OCA\Files_Sharing\Tests\ApiTest', 'initTestMountPointsHook');

		// logging in will auto-mount the temp storage for user1 as well
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$fileInfo = $this->view->getFileInfo($this->folder);

		// user 1 shares the mount point folder with user2
		$share = $this->share(
			Share::SHARE_TYPE_USER,
			$this->folder,
			self::TEST_FILES_SHARING_API_USER1,
			self::TEST_FILES_SHARING_API_USER2,
			Constants::PERMISSION_ALL
		);

		// user2: check that mount point name appears correctly
		self::loginHelper(self::TEST_FILES_SHARING_API_USER2);

		$view = new \OC\Files\View('/' . self::TEST_FILES_SHARING_API_USER2 . '/files');

		$this->assertTrue($view->file_exists($this->folder));
		$this->assertTrue($view->file_exists($this->folder . '/test.txt'));

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$this->shareManager->deleteShare($share);

		\OC_Hook::clear('OC_Filesystem', 'post_initMountPoints', '\OCA\Files_Sharing\Tests\ApiTest', 'initTestMountPointsHook');
	}

	public function datesProvider() {
		$date = new \DateTime();
		$date->add(new \DateInterval('P5D'));

		return [
			[$date->format('Y-m-d'), true],
			['abc', false],
			[$date->format('Y-m-d') . 'xyz', false],
		];
	}

	/**
	 * Make sure only ISO 8601 dates are accepted
	 *
	 * @dataProvider datesProvider
	 */
	public function testPublicLinkExpireDate($date, $valid) {
		$request = $this->createRequest([
			'path' => $this->folder,
			'shareType' => Share::SHARE_TYPE_LINK,
			'expireDate' => $date,
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();

		if ($valid === false) {
			$this->assertFalse($result->succeeded());
			$this->assertEquals(404, $result->getStatusCode());
			$this->assertEquals('Invalid date, date format must be YYYY-MM-DD', $result->getMeta()['message']);
			return;
		}

		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertInternalType('string', $data['token']);
		$this->assertEquals($date, \substr($data['expiration'], 0, 10));

		// check for correct link
		$url = \OC::$server->getURLGenerator()->getAbsoluteURL('/index.php/s/' . $data['token']);
		$this->assertEquals($url, $data['url']);

		$share = $this->shareManager->getShareById('ocinternal:'.$data['id']);

		$this->assertEquals($date, $share->getExpirationDate()->format('Y-m-d'));

		$this->shareManager->deleteShare($share);
	}

	public function testCreatePublicLinkExpireDateValid() {
		$config = \OC::$server->getConfig();

		// enforce expire date, by default 7 days after the file was shared
		$config->setAppValue('core', 'shareapi_default_expire_date', 'yes');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'yes');

		$date = new \DateTime();
		$date->add(new \DateInterval('P5D'));

		$request = $this->createRequest([
			'path' => $this->folder,
			'shareType' => Share::SHARE_TYPE_LINK,
			'expireDate' => $date->format('Y-m-d'),
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());

		$data = $result->getData();
		$this->assertInternalType('string', $data['token']);
		$this->assertEquals($date->format('Y-m-d') . ' 00:00:00', $data['expiration']);

		// check for correct link
		$url = \OC::$server->getURLGenerator()->getAbsoluteURL('/index.php/s/' . $data['token']);
		$this->assertEquals($url, $data['url']);

		$share = $this->shareManager->getShareById('ocinternal:'.$data['id']);
		$date->setTime(0, 0, 0);
		$this->assertEquals($date, $share->getExpirationDate());

		$this->shareManager->deleteShare($share);

		$config->setAppValue('core', 'shareapi_default_expire_date', 'no');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'no');
	}

	public function testCreatePublicLinkExpireDateInvalidFuture() {
		$config = \OC::$server->getConfig();

		// enforce expire date, by default 7 days after the file was shared
		$config->setAppValue('core', 'shareapi_default_expire_date', 'yes');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'yes');

		$date = new \DateTime();
		$date->add(new \DateInterval('P8D'));

		$request = $this->createRequest([
			'path' => $this->folder,
			'shareType' => Share::SHARE_TYPE_LINK,
			'expireDate' => $date->format('Y-m-d'),
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertFalse($result->succeeded());
		$this->assertEquals(404, $result->getStatusCode());
		$this->assertEquals('Cannot set expiration date more than 7 days in the future', $result->getMeta()['message']);

		$config->setAppValue('core', 'shareapi_default_expire_date', 'no');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'no');
	}

	public function testCreatePublicLinkExpireDateInvalidPast() {
		$config = \OC::$server->getConfig();

		$date = new \DateTime();
		$date->sub(new \DateInterval('P8D'));

		$request = $this->createRequest([
			'path' => $this->folder,
			'shareType' => Share::SHARE_TYPE_LINK,
			'expireDate' => $date->format('Y-m-d'),
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertFalse($result->succeeded());
		$this->assertEquals(404, $result->getStatusCode());
		$this->assertEquals('Expiration date is in the past', $result->getMeta()['message']);

		$config->setAppValue('core', 'shareapi_default_expire_date', 'no');
		$config->setAppValue('core', 'shareapi_enforce_expire_date', 'no');
	}

	/**
	 * test for no invisible shares
	 * See: https://github.com/owncloud/core/issues/22295
	 */
	public function testInvisibleSharesUser() {
		// simulate a post request
		$request = $this->createRequest([
			'path' => $this->folder,
			'shareWith' => self::TEST_FILES_SHARING_API_USER2,
			'shareType' => Share::SHARE_TYPE_USER
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());
		$data = $result->getData();

		$topId = $data['id'];

		$request = $this->createRequest([
			'path' => $this->folder . $this->subfolder,
			'shareType' => Share::SHARE_TYPE_LINK,
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($topId);
		$this->assertTrue($result->succeeded());

		$request = $this->createRequest([
			'reshares' => 'true',
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		$this->assertEmpty($result->getData());
	}

	/**
	 * test for no invisible shares
	 * See: https://github.com/owncloud/core/issues/22295
	 */
	public function testInvisibleSharesGroup() {
		// simulate a post request
		$request = $this->createRequest([
			'path' => $this->folder,
			'shareWith' => self::TEST_FILES_SHARING_API_GROUP1,
			'shareType' => Share::SHARE_TYPE_GROUP
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());
		$data = $result->getData();

		$topId = $data['id'];

		$request = $this->createRequest([
			'path' => $this->folder . $this->subfolder,
			'shareType' => Share::SHARE_TYPE_LINK,
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER2);
		$result = $ocs->createShare();
		$this->assertTrue($result->succeeded());

		$request = $this->createRequest([]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->deleteShare($topId);
		$this->assertTrue($result->succeeded());

		$request = $this->createRequest([
			'reshares' => 'true',
		]);
		$ocs = $this->createOCS($request, self::TEST_FILES_SHARING_API_USER1);
		$result = $ocs->getShares();
		$this->assertTrue($result->succeeded());

		$this->assertEmpty($result->getData());
	}
}
