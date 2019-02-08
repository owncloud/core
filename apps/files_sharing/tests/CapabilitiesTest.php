<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

use OCA\Files_Sharing\Capabilities;
use OCP\IL10N;

/**
 * Class CapabilitiesTest
 *
 * @group DB
 */
class CapabilitiesTest extends \Test\TestCase {

	/**
	 * @var \OCP\Util\UserSearch
	 */
	protected $userSearch;

	/** @var IL10N | \PHPUnit_Framework_MockObject_MockObject */
	private $l10n;

	/**
	 *
	 */
	protected function setUp() {
		parent::setUp();
		$this->userSearch = $this->getMockBuilder(\OCP\Util\UserSearch::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSearch->expects($this->any())
			->method('getSearchMinLength')
			->willReturn(1);

		$this->l10n = $this->createMock(IL10N::class);
		$this->l10n->method('t')
			->willReturn('Public link');
	}

	/**
	 * Test for the general part in each return statement and assert.
	 * Strip off the general part on the way.
	 *
	 * @param string[] $data Capabilities
	 * @return string[]
	 */
	private function getFilesSharingPart(array $data) {
		$this->assertArrayHasKey('files_sharing', $data);
		return $data['files_sharing'];
	}

	/**
	 * Create a mock config object and insert the values in $map to the getAppValue
	 * function. Then obtain the capabilities and extract the first few
	 * levels in the array
	 *
	 * @param (string[])[] $map Map of arguments to return types for the getAppValue function in the mock
	 * @return string[]
	 */
	private function getResults(array $map) {
		$stub = $this->getMockBuilder('\OCP\IConfig')->disableOriginalConstructor()->getMock();
		$stub->method('getAppValue')->will($this->returnValueMap($map));
		$cap = new Capabilities($stub, $this->userSearch, $this->l10n);
		$result = $this->getFilesSharingPart($cap->getCapabilities());
		return $result;
	}

	public function testEnabledSharingAPI() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['api_enabled']);
		$this->assertTrue($result['can_share']);
		$this->assertArrayHasKey('public', $result);
		$this->assertArrayHasKey('user', $result);
		$this->assertArrayHasKey('resharing', $result);
	}

	public function testDisabledSharingAPI() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['api_enabled']);
		$this->assertFalse($result['can_share']);
		$this->assertFalse($result['public']['enabled']);
		$this->assertFalse($result['user']['send_mail']);
		$this->assertFalse($result['resharing']);
	}

	public function testNoLinkSharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertInternalType('array', $result['public']);
		$this->assertFalse($result['public']['enabled']);
	}

	public function testOnlyLinkSharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertInternalType('array', $result['public']);
		$this->assertTrue($result['public']['enabled']);
	}

	public function linkPasswordProvider() {
		return [
			['no', 'no', 'yes'],
			['no', 'yes', 'no'],
			['no', 'yes', 'yes'],
			['yes', 'no', 'no'],
			['yes', 'no', 'yes'],
			['yes', 'yes', 'no'],
			['yes', 'yes', 'yes'],
		];
	}

	/**
	 * @dataProvider linkPasswordProvider
	 */
	public function testLinkPassword($readOnly, $readWrite, $writeOnly) {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_enforce_links_password_read_only', 'no', $readOnly],
			['core', 'shareapi_enforce_links_password_read_write', 'no', $readWrite],
			['core', 'shareapi_enforce_links_password_write_only', 'no', $writeOnly],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('password', $result['public']);
		$this->assertArrayHasKey('enforced', $result['public']['password']);
		$this->assertArrayHasKey('enforced_for', $result['public']['password']);
		$this->assertTrue($result['public']['password']['enforced']);

		$this->assertEquals($readOnly === 'yes', $result['public']['password']['enforced_for']['read_only']);
		$this->assertEquals($readWrite === 'yes', $result['public']['password']['enforced_for']['read_write']);
		$this->assertEquals($writeOnly === 'yes', $result['public']['password']['enforced_for']['upload_only']);
	}

	public function testLinkNoPassword() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_enforce_links_password_read_only', 'no', 'no'],
			['core', 'shareapi_enforce_links_password_read_write', 'no', 'no'],
			['core', 'shareapi_enforce_links_password_write_only', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('password', $result['public']);
		$this->assertArrayHasKey('enforced', $result['public']['password']);
		$this->assertArrayHasKey('enforced_for', $result['public']['password']);
		$this->assertFalse($result['public']['password']['enforced']);
		$this->assertFalse($result['public']['password']['enforced_for']['read_only']);
		$this->assertFalse($result['public']['password']['enforced_for']['read_write']);
		$this->assertFalse($result['public']['password']['enforced_for']['upload_only']);
	}

	public function testLinkNoExpireDate() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_default_expire_date', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('expire_date', $result['public']);
		$this->assertInternalType('array', $result['public']['expire_date']);
		$this->assertFalse($result['public']['expire_date']['enabled']);
	}

	public function testLinkExpireDate() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_default_expire_date', 'no', 'yes'],
			['core', 'shareapi_expire_after_n_days', '7', '7'],
			['core', 'shareapi_enforce_expire_date', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('expire_date', $result['public']);
		$this->assertInternalType('array', $result['public']['expire_date']);
		$this->assertTrue($result['public']['expire_date']['enabled']);
		$this->assertArrayHasKey('days', $result['public']['expire_date']);
		$this->assertFalse($result['public']['expire_date']['enforced']);
	}

	public function testLinkExpireDateEnforced() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_default_expire_date', 'no', 'yes'],
			['core', 'shareapi_enforce_expire_date', 'no', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('expire_date', $result['public']);
		$this->assertInternalType('array', $result['public']['expire_date']);
		$this->assertTrue($result['public']['expire_date']['enforced']);
	}

	public function testLinkSendMail() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_public_notification', 'no', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['public']['send_mail']);
	}

	public function testLinkNoSendMail() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_public_notification', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['public']['send_mail']);
	}

	public function testLinkSocial_Share() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_social_share', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['public']['social_share']);
	}
	public function testLinkNoSocial_Share() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_social_share', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['public']['social_share']);
	}

	public function testUserSendMail() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_mail_notification', 'no', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['user']['send_mail']);
	}

	public function testUserNoSendMail() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_mail_notification', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['user']['send_mail']);
	}

	public function testResharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_resharing', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['resharing']);
	}

	public function testNoResharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_resharing', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['resharing']);
	}

	public function testLinkPublicUpload() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_public_upload', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['public']['upload']);
	}

	public function testLinkNoPublicUpload() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
			['core', 'shareapi_allow_public_upload', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['public']['upload']);
	}

	public function testNoGroupSharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_group_sharing', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['group_sharing']);
	}

	public function testGroupSharing() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_group_sharing', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['group_sharing']);
	}

	public function testNoShareWithGroupMembersOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_only_share_with_group_members', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['share_with_group_members_only']);
	}

	public function testShareWithGroupMembersOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_only_share_with_group_members', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['share_with_group_members_only']);
	}

	public function testNoShareWithMembershipGroupsOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_only_share_with_membership_groups', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['share_with_membership_groups_only']);
	}

	public function testShareWithMembershipGroupsOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_only_share_with_membership_groups', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['share_with_membership_groups_only']);
	}

	public function testNoUserEnumeration() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_share_dialog_user_enumeration', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['user_enumeration']['enabled']);
	}

	public function testUserEnumeration() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_share_dialog_user_enumeration', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['user_enumeration']['enabled']);
	}

	public function testUserEnumerationNoGroupMembersOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_share_dialog_user_enumeration', 'yes', 'yes'],
			['core', 'shareapi_share_dialog_user_enumeration_group_members', 'no', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertFalse($result['user_enumeration']['group_members_only']);
	}

	public function testUserEnumerationGroupMembersOnly() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_share_dialog_user_enumeration', 'yes', 'yes'],
			['core', 'shareapi_share_dialog_user_enumeration_group_members', 'no', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertTrue($result['user_enumeration']['group_members_only']);
	}

	public function testFederatedSharingIncoming() {
		$map = [
			['files_sharing', 'incoming_server2server_share_enabled', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('federation', $result);
		$this->assertTrue($result['federation']['incoming']);
	}

	public function testFederatedSharingNoIncoming() {
		$map = [
			['files_sharing', 'incoming_server2server_share_enabled', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('federation', $result);
		$this->assertFalse($result['federation']['incoming']);
	}

	public function testFederatedSharingOutgoing() {
		$map = [
			['files_sharing', 'outgoing_server2server_share_enabled', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('federation', $result);
		$this->assertTrue($result['federation']['outgoing']);
	}

	public function testFederatedSharingNoOutgoing() {
		$map = [
			['files_sharing', 'outgoing_server2server_share_enabled', 'yes', 'no'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('federation', $result);
		$this->assertFalse($result['federation']['outgoing']);
	}

	public function testMultipleLinkShares() {
		$map = [
			['core', 'shareapi_enabled', 'yes', 'yes'],
			['core', 'shareapi_allow_links', 'yes', 'yes'],
		];
		$result = $this->getResults($map);
		$this->assertArrayHasKey('public', $result);
		$this->assertTrue($result['public']['multiple']);
		$this->assertEquals('Public link', $result['public']['defaultPublicLinkShareName']);
	}
}
