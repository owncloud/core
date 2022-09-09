<?php declare(strict_types=1);
/**
 * @author Sergio Bertolin <sbertolin@owncloud.com>
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

use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UserHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\OcisHelper;
use TestHelpers\WebDavHelper;
use Laminas\Ldap\Exception\LdapException;
use Laminas\Ldap\Ldap;

/**
 * Functions for provisioning of users and groups
 */
trait Provisioning {

	/**
	 * list of users that were created on the local server during test runs
	 * key is the lowercase username, value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdUsers = [];

	/**
	 * list of users that were created on the remote server during test runs
	 * key is the lowercase username, value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdRemoteUsers = [];

	/**
	 * @var array
	 */
	private $enabledApps = [];

	/**
	 * @var array
	 */
	private $disabledApps = [];

	/**
	 * @var array
	 */
	private $startingGroups = [];

	/**
	 * @var array
	 */
	private $createdRemoteGroups = [];

	/**
	 * @var array
	 */
	private $createdGroups = [];

	/**
	 * @var array
	 */
	private $userResponseFields = [
		"enabled", "quota", "email", "displayname", "home", "two_factor_auth_enabled",
		"quota definition", "quota free", "quota user", "quota total", "quota relative"
	];

	/**
	 * Check if this is the admin group. That group is always a local group in
	 * ownCloud10, even if other groups come from LDAP.
	 *
	 * @param string $groupname
	 *
	 * @return boolean
	 */
	public function isLocalAdminGroup(string $groupname):bool {
		return ($groupname === "admin");
	}

	/**
	 * Usernames are not case-sensitive, and can generally be specified with any
	 * mix of upper and lower case. For remembering usernames use the normalized
	 * form so that "alice" and "Alice" are remembered as the same user.
	 *
	 * @param string|null $username
	 *
	 * @return string
	 */
	public function normalizeUsername(?string $username):string {
		return \strtolower((string)$username);
	}

	/**
	 * @return array
	 */
	public function getCreatedUsers():array {
		return $this->createdUsers;
	}

	/**
	 * @return boolean
	 */
	public function someUsersHaveBeenCreated():bool {
		return (\count($this->createdUsers) > 0);
	}

	/**
	 * @return array
	 */
	public function getCreatedGroups():array {
		return $this->createdGroups;
	}

	/**
	 * returns the display name of the current user
	 * if no "Display Name" is set the user-name is returned instead
	 *
	 * @return string
	 */
	public function getCurrentUserDisplayName():string {
		return $this->getUserDisplayName($this->getCurrentUser());
	}

	/**
	 * returns the display name of a user
	 * if no "Display Name" is set the username is returned instead
	 *
	 * @param string $username
	 *
	 * @return string
	 */
	public function getUserDisplayName(string $username):string {
		$normalizedUsername = $this->normalizeUsername($username);
		if (isset($this->createdUsers[$normalizedUsername]['displayname'])) {
			$displayName = (string) $this->createdUsers[$normalizedUsername]['displayname'];
			if ($displayName !== '') {
				return $displayName;
			}
		}
		return $username;
	}

	/**
	 * @param string $user
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function rememberUserDisplayName(string $user, string $displayName):void {
		$normalizedUsername = $this->normalizeUsername($user);
		if ($this->isAdminUsername($normalizedUsername)) {
			$this->adminDisplayName = $displayName;
		} else {
			if ($this->currentServer === 'LOCAL') {
				if (\array_key_exists($normalizedUsername, $this->createdUsers)) {
					$this->createdUsers[$normalizedUsername]['displayname'] = $displayName;
				} else {
					throw new Exception(
						__METHOD__ . " tried to remember display name '$displayName' for nonexistent local user '$user'"
					);
				}
			} elseif ($this->currentServer === 'REMOTE') {
				if (\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
					$this->createdRemoteUsers[$normalizedUsername]['displayname'] = $displayName;
				} else {
					throw new Exception(
						__METHOD__ . " tried to remember display name '$displayName' for nonexistent federated user '$user'"
					);
				}
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $emailAddress
	 *
	 * @return void
	 * @throws Exception
	 */
	public function rememberUserEmailAddress(string $user, string $emailAddress):void {
		$normalizedUsername = $this->normalizeUsername($user);
		if ($this->isAdminUsername($normalizedUsername)) {
			$this->adminEmailAddress = $emailAddress;
		} else {
			if ($this->currentServer === 'LOCAL') {
				if (\array_key_exists($normalizedUsername, $this->createdUsers)) {
					$this->createdUsers[$normalizedUsername]['email'] = $emailAddress;
				} else {
					throw new Exception(
						__METHOD__ . " tried to remember email address '$emailAddress' for nonexistent local user '$user'"
					);
				}
			} elseif ($this->currentServer === 'REMOTE') {
				if (\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
					$this->createdRemoteUsers[$normalizedUsername]['email'] = $emailAddress;
				} else {
					throw new Exception(
						__METHOD__ . " tried to remember email address '$emailAddress' for nonexistent federated user '$user'"
					);
				}
			}
		}
	}

	/**
	 * returns an array of the user display names, keyed by normalized username
	 * if no "Display Name" is set the user-name is returned instead
	 *
	 * @return array
	 */
	public function getCreatedUserDisplayNames():array {
		$result = [];
		foreach ($this->getCreatedUsers() as $normalizedUsername => $user) {
			$result[$normalizedUsername] = $this->getUserDisplayName($normalizedUsername);
		}
		return $result;
	}

	/**
	 * @param string $user
	 * @param string $attribute
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function getAttributeOfCreatedUser(string $user, string $attribute) {
		$usersList = $this->getCreatedUsers();
		$normalizedUsername = $this->normalizeUsername($user);
		if (\array_key_exists($normalizedUsername, $usersList)) {
			// provide attributes only if the user exists
			if ($usersList[$normalizedUsername]["shouldExist"]) {
				if (\array_key_exists($attribute, $usersList[$normalizedUsername])) {
					return $usersList[$normalizedUsername][$attribute];
				} else {
					throw new Exception(
						__METHOD__ . ": User '$user' has no attribute with name '$attribute'."
					);
				}
			} else {
				throw new Exception(
					__METHOD__ . ": User '$user' has been deleted."
				);
			}
		} else {
			throw new Exception(
				__METHOD__ . ": User '$user' does not exist in the created list."
			);
		}
	}

	/**
	 * @param string $group
	 * @param string $attribute
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function getAttributeOfCreatedGroup(string $group, string $attribute) {
		$groupsList = $this->getCreatedGroups();
		if (\array_key_exists($group, $groupsList)) {
			// provide attributes only if the group exists
			if ($groupsList[$group]["shouldExist"]) {
				if (\array_key_exists($attribute, $groupsList[$group])) {
					return $groupsList[$group][$attribute];
				} else {
					throw new Exception(
						__METHOD__ . ": Group '$group' has no attribute with name '$attribute'."
					);
				}
			} else {
				throw new Exception(
					__METHOD__ . ": Group '$group' has been deleted."
				);
			}
		} else {
			throw new Exception(
				__METHOD__ . ": Group '$group' does not exist in the created list."
			);
		}
	}

	/**
	 * returns an array of the group display names, keyed by group name
	 * currently group name and display name are always the same, so this
	 * function is a convenience for getting the group names in a similar
	 * format to what getCreatedUserDisplayNames() returns
	 *
	 * @return array
	 */
	public function getCreatedGroupDisplayNames():array {
		$result = [];
		foreach ($this->getCreatedGroups() as $groupName => $groupData) {
			$result[$groupName] = $groupName;
		}
		return $result;
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return string password
	 * @throws Exception
	 */
	public function getUserPassword(string $username):string {
		$normalizedUsername = $this->normalizeUsername($username);
		if ($normalizedUsername === $this->getAdminUsername()) {
			$password = $this->getAdminPassword();
		} elseif (\array_key_exists($normalizedUsername, $this->createdUsers)) {
			$password = $this->createdUsers[$normalizedUsername]['password'];
		} elseif (\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
			$password = $this->createdRemoteUsers[$normalizedUsername]['password'];
		} else {
			throw new Exception(
				"user '$username' was not created by this test run"
			);
		}

		//make sure the function always returns a string
		return (string) $password;
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public function theUserShouldExist(string $username):bool {
		$normalizedUsername = $this->normalizeUsername($username);
		if (\array_key_exists($normalizedUsername, $this->createdUsers)) {
			return $this->createdUsers[$normalizedUsername]['shouldExist'];
		}

		if (\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
			return $this->createdRemoteUsers[$normalizedUsername]['shouldExist'];
		}

		throw new Exception(
			__METHOD__
			. " user '$username' was not created by this test run"
		);
	}

	/**
	 *
	 * @param string $groupname
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public function theGroupShouldExist(string $groupname):bool {
		if (\array_key_exists($groupname, $this->createdGroups)) {
			if (\array_key_exists('shouldExist', $this->createdGroups[$groupname])) {
				return $this->createdGroups[$groupname]['shouldExist'];
			}
			return false;
		}

		if (\array_key_exists($groupname, $this->createdRemoteGroups)) {
			if (\array_key_exists('shouldExist', $this->createdRemoteGroups[$groupname])) {
				return $this->createdRemoteGroups[$groupname]['shouldExist'];
			}
			return false;
		}

		throw new Exception(
			__METHOD__
			. " group '$groupname' was not created by this test run"
		);
	}

	/**
	 *
	 * @param string $groupname
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public function theGroupShouldBeAbleToBeDeleted(string $groupname):bool {
		if (\array_key_exists($groupname, $this->createdGroups)) {
			return $this->createdGroups[$groupname]['possibleToDelete'] ?? true;
		}

		if (\array_key_exists($groupname, $this->createdRemoteGroups)) {
			return $this->createdRemoteGroups[$groupname]['possibleToDelete'] ?? true;
		}

		throw new Exception(
			__METHOD__
			. " group '$groupname' was not created by this test run"
		);
	}

	/**
	 * @When /^the administrator creates user "([^"]*)" using the provisioning API$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminCreatesUserUsingTheProvisioningApi(?string $user):void {
		$this->createUser(
			$user,
			null,
			null,
			null,
			true,
			'api'
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes in the database user backend$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenCreatedOnDatabaseBackend(?string $user):void {
		$this->adminCreatesUserUsingTheProvisioningApi($user);
		$this->userShouldExist($user);
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes and (tiny|small|large)\s?skeleton files$/
	 *
	 * @param string $user
	 * @param string $skeletonType
	 * @param boolean $skeleton
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenCreatedWithDefaultAttributes(
		string $user,
		string $skeletonType = "",
		bool $skeleton = true
	):void {
		if ($skeletonType === "") {
			$skeletonType = $this->getSmallestSkeletonDirName();
		}

		$originalSkeletonPath = $this->setSkeletonDirByType($skeletonType);

		try {
			$this->createUser(
				$user,
				null,
				null,
				null,
				true,
				null,
				true,
				$skeleton
			);
			$this->userShouldExist($user);
		} finally {
			$this->setSkeletonDir($originalSkeletonPath);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes and without skeleton files$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenCreatedWithDefaultAttributesAndWithoutSkeletonFiles(string $user):void {
		$this->userHasBeenCreatedWithDefaultAttributes($user);
		$this->resetOccLastCode();
	}

	/**
	 * @Given these users have been created with default attributes and without skeleton files:
	 * expects a table of users with the heading
	 * "|username|"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception|GuzzleException
	 */
	public function theseUsersHaveBeenCreatedWithDefaultAttributesAndWithoutSkeletonFiles(TableNode $table):void {
		$originalSkeletonPath = $this->setSkeletonDirByType($this->getSmallestSkeletonDirName());
		try {
			$this->createTheseUsers(true, true, true, $table);
		} finally {
			// restore skeleton directory even if user creation failed
			$this->setSkeletonDir($originalSkeletonPath);
		}
	}

	/**
	 * @Given /^these users have been created without skeleton files ?(and not initialized|):$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param TableNode $table
	 * @param string $doNotInitialize
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theseUsersHaveBeenCreatedWithoutSkeletonFiles(TableNode $table, string $doNotInitialize):void {
		$this->theseUsersHaveBeenCreated("", "", $doNotInitialize, $table);
	}

	/**
	 * @Given the administrator has set the system language to :defaultLanguage
	 *
	 * @param string $defaultLanguage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetTheSystemLanguageTo(string $defaultLanguage):void {
		$this->runOcc(
			["config:system:set default_language --value $defaultLanguage"]
		);
	}

	/**
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function importLdifFile(string $path):void {
		$ldifData = \file_get_contents($path);
		$this->importLdifData($ldifData);
	}

	/**
	 * imports an ldif string
	 *
	 * @param string $ldifData
	 *
	 * @return void
	 */
	public function importLdifData(string $ldifData):void {
		$items = Laminas\Ldap\Ldif\Encoder::decode($ldifData);
		if (isset($items['dn'])) {
			//only one item in the ldif data
			$this->ldap->add($items['dn'], $items);
		} else {
			foreach ($items as $item) {
				if (isset($item["objectclass"])) {
					if (\in_array("posixGroup", $item["objectclass"])) {
						\array_push($this->ldapCreatedGroups, $item["cn"][0]);
						$this->addGroupToCreatedGroupsList($item["cn"][0]);
					} elseif (\in_array("inetOrgPerson", $item["objectclass"])) {
						\array_push($this->ldapCreatedUsers, $item["uid"][0]);
						$this->addUserToCreatedUsersList($item["uid"][0], $item["userpassword"][0]);
					}
				}
				$this->ldap->add($item['dn'], $item);
			}
		}
	}

	/**
	 * @param array $suiteParameters
	 *
	 * @return void
	 * @throws Exception
	 * @throws \LdapException
	 */
	public function connectToLdap(array $suiteParameters):void {
		$useSsl = false;
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$this->ldapBaseDN = OcisHelper::getBaseDN();
			$this->ldapUsersOU = OcisHelper::getUsersOU();
			$this->ldapGroupsOU = OcisHelper::getGroupsOU();
			$this->ldapGroupSchema = OcisHelper::getGroupSchema();
			$this->ldapHost = OcisHelper::getHostname();
			$this->ldapPort = OcisHelper::getLdapPort();
			$useSsl = OcisHelper::useSsl();
			$this->ldapAdminUser = OcisHelper::getBindDN();
			$this->ldapAdminPassword = OcisHelper::getBindPassword();
			$this->skipImportLdif = (\getenv("REVA_LDAP_SKIP_LDIF_IMPORT") === "true");
			if ($useSsl === true) {
				\putenv('LDAPTLS_REQCERT=never');
			}
		} else {
			$occResult = SetupHelper::runOcc(
				['ldap:show-config', 'LDAPTestId', '--output=json'],
				$this->getStepLineRef()
			);

			Assert::assertSame(
				'0',
				$occResult['code'],
				"could not read current LDAP config. stdOut: " .
				$occResult['stdOut'] .
				" stdErr: " . $occResult['stdErr']
			);

			$ldapConfig = \json_decode(
				$occResult['stdOut'],
				true
			);
			Assert::assertNotNull(
				$ldapConfig,
				"could not json decode current LDAP config. stdOut: " . $occResult['stdOut']
			);

			$this->ldapBaseDN = (string)$ldapConfig['ldapBase'][0];
			$this->ldapHost = (string)$ldapConfig['ldapHost'];
			$this->ldapPort = (int)$ldapConfig['ldapPort'];
			$this->ldapAdminUser = (string)$ldapConfig['ldapAgentName'];
			$this->ldapGroupSchema = "rfc2307";
			$this->ldapUsersOU = (string)$suiteParameters['ldapUsersOU'];
			$this->ldapGroupsOU = (string)$suiteParameters['ldapGroupsOU'];
		}
		if ($this->ldapAdminPassword === "") {
			$this->ldapAdminPassword = (string)$suiteParameters['ldapAdminPassword'];
		}
		$options = [
			'host' => $this->ldapHost,
			'port' => $this->ldapPort,
			'password' => $this->ldapAdminPassword,
			'bindRequiresDn' => true,
			'useSsl' => $useSsl,
			'baseDn' => $this->ldapBaseDN,
			'username' => $this->ldapAdminUser
		];
		$this->ldap = new Ldap($options);
		$this->ldap->bind();

		$ldifFile = __DIR__ . (string)$suiteParameters['ldapInitialUserFilePath'];
		if (OcisHelper::isTestingParallelDeployment()) {
			$behatYml = \getenv("BEHAT_YML");
			if ($behatYml) {
				$configPath = \dirname($behatYml);
				$ldifFile = $configPath . "/" . \basename($ldifFile);
			}
		}
		if (!$this->skipImportLdif) {
			$this->importLdifFile($ldifFile);
		}
		$this->theLdapUsersHaveBeenResynced();
	}

	/**
	 * @Given the LDAP users have been resynced
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLdapUsersHaveBeenReSynced():void {
		// we need to sync ldap users when testing for parallel deployment
		if (!OcisHelper::isTestingOnOcisOrReva() || OcisHelper::isTestingParallelDeployment()) {
			$occResult = SetupHelper::runOcc(
				['user:sync', 'OCA\User_LDAP\User_Proxy', '-m', 'remove'],
				$this->getStepLineRef()
			);
			if ($occResult['code'] !== "0") {
				throw new Exception(__METHOD__ . " could not sync LDAP users " . $occResult['stdErr']);
			}
		}
	}

	/**
	 * @When the LDAP users are resynced
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function theLdapUsersAreReSynced():void {
		SetupHelper::runOcc(
			['user:sync', 'OCA\User_LDAP\User_Proxy', '-m', 'remove'],
			$this->getStepLineRef()
		);
	}

	/**
	 * prepares suitable nested array with user-attributes for multiple users to be created
	 *
	 * @param boolean $setDefaultAttributes
	 * @param array $table
	 *
	 * @return array
	 * @throws JsonException
	 */
	public function buildUsersAttributesArray(bool $setDefaultAttributes, array $table):array {
		$usersAttributes = [];
		foreach ($table as $row) {
			$userAttribute['userid'] = $this->getActualUsername($row['username']);

			if (isset($row['displayname'])) {
				$userAttribute['displayName'] = $row['displayname'];
			} elseif ($setDefaultAttributes) {
				$userAttribute['displayName'] = $this->getDisplayNameForUser($row['username']);
				if ($userAttribute['displayName'] === null) {
					$userAttribute['displayName'] = $this->getDisplayNameForUser('regularuser');
				}
			} else {
				$userAttribute['displayName'] = null;
			}
			if (isset($row['email'])) {
				$userAttribute['email'] = $row['email'];
			} elseif ($setDefaultAttributes) {
				$userAttribute['email'] = $this->getEmailAddressForUser($row['username']);
				if ($userAttribute['email'] === null) {
					$userAttribute['email'] = $row['username'] . '@owncloud.com';
				}
			} else {
				$userAttribute['email'] = null;
			}

			if (isset($row['password'])) {
				$userAttribute['password'] = $this->getActualPassword($row['password']);
			} else {
				$userAttribute['password'] = $this->getPasswordForUser($row['username']);
			}
			// Add request body to the bodies array. we will use that later to loop through created users.
			$usersAttributes[] = $userAttribute;
		}
		return $usersAttributes;
	}

	/**
	 * Generates UUIDV4
	 * Example: 123e4567-e89b-12d3-a456-426614174000
	 *
	 * @return string
	 * @throws Exception
	 */
	public function generateUUIDv4(): string {
		$data = random_bytes(16);
		$data[6] = \chr(\ord($data[6]) & 0x0f | 0x40);
		$data[8] = \chr(\ord($data[8]) & 0x3f | 0x80);

		return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}

	/**
	 * creates a user in the ldap server
	 * the created user is added to `createdUsersList`
	 * ldap users are re-synced after creating a new user
	 *
	 * @param array $setting
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createLdapUser(array $setting):void {
		$ou =  $this->ldapUsersOU ;
		// Some special characters need to be escaped in LDAP DN and attributes
		// The special characters allowed in a username (UID) are +_.@-
		// Of these, only + has to be escaped.
		$userId = \str_replace('+', '\+', $setting["userid"]);
		$newDN = 'uid=' . $userId . ',ou=' . $ou . ',' . $this->ldapBaseDN;

		//pick a high number as uidnumber to make sure there are no conflicts with existing uidnumbers
		$uidNumber = \count($this->ldapCreatedUsers) + 30000;
		$entry = [];
		$entry['cn'] = $userId;
		$entry['sn'] = $userId;
		$entry['uid'] = $setting["userid"];
		$entry['homeDirectory'] = '/home/openldap/' . $setting["userid"];
		$entry['objectclass'][] = 'posixAccount';
		$entry['objectclass'][] = 'inetOrgPerson';
		$entry['objectclass'][] = 'organizationalPerson';
		$entry['objectclass'][] = 'person';
		$entry['objectclass'][] = 'top';

		$entry['userPassword'] = $setting["password"];
		if (isset($setting["displayName"])) {
			$entry['displayName'] = $setting["displayName"];
		}
		if (isset($setting["email"])) {
			$entry['mail'] = $setting["email"];
		} elseif (OcisHelper::isTestingOnOcis()) {
			$entry['mail'] = $userId . '@owncloud.com';
		}
		$entry['gidNumber'] = 5000;
		$entry['uidNumber'] = $uidNumber;

		if (OcisHelper::isTestingOnOcis()) {
			$entry['objectclass'][] = 'ownCloud';
			$entry['ownCloudUUID'] = $this->generateUUIDv4();
		}
		if (OcisHelper::isTestingParallelDeployment()) {
			$entry['ownCloudSelector'] = $this->getOCSelector();
		}

		if ($this->federatedServerExists()) {
			if (!\in_array($setting['userid'], $this->ldapCreatedUsers)) {
				$this->ldap->add($newDN, $entry);
			}
		} else {
			$this->ldap->add($newDN, $entry);
		}
		$this->ldapCreatedUsers[] = $setting["userid"];
		$this->theLdapUsersHaveBeenReSynced();
	}

	/**
	 * @param string $group group name
	 *
	 * @return void
	 * @throws Exception
	 * @throws LdapException
	 */
	public function createLdapGroup(string $group):void {
		$baseDN = $this->getLdapBaseDN();
		$newDN = 'cn=' . $group . ',ou=' . $this->ldapGroupsOU . ',' . $baseDN;
		$entry = [];
		$entry['cn'] = $group;
		$entry['objectclass'][] = 'top';

		if ($this->ldapGroupSchema == "rfc2307") {
			$entry['objectclass'][] = 'posixGroup';
			$entry['gidNumber'] = 5000;
		} else {
			$entry['objectclass'][] = 'groupOfNames';
			$entry['member'] = "";
		}
		if (OcisHelper::isTestingOnOcis()) {
			$entry['objectclass'][] = 'ownCloud';
			$entry['ownCloudUUID'] = $this->generateUUIDv4();
		}
		$this->ldap->add($newDN, $entry);
		$this->ldapCreatedGroups[] = $group;
		// For syncing the ldap groups
		if (OcisHelper::isTestingOnOc10()) {
			$this->runOcc(['group:list']);
		}
	}

	/**
	 *
	 * @param string $configId
	 * @param string $configKey
	 * @param string $configValue
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setLdapSetting(string $configId, string $configKey, string $configValue):void {
		if ($configValue === "") {
			$configValue = "''";
		}
		$substitutions = [
			[
				"code" => "%ldap_host_without_scheme%",
				"function" => [
					$this,
					"getLdapHostWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%ldap_host%",
				"function" => [
					$this,
					"getLdapHost"
				],
				"parameter" => []
			],
			[
				"code" => "%ldap_port%",
				"function" => [
					$this,
					"getLdapPort"
				],
				"parameter" => []
			]
		];
		$configValue = $this->substituteInLineCodes(
			$configValue,
			null,
			[],
			$substitutions
		);
		$occResult = SetupHelper::runOcc(
			['ldap:set-config', $configId, $configKey, $configValue],
			$this->getStepLineRef()
		);
		if ($occResult['code'] !== "0") {
			throw new Exception(
				__METHOD__ . " could not set LDAP setting " . $occResult['stdErr']
			);
		}
	}

	/**
	 * deletes LDAP users|groups created during test
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteLdapUsersAndGroups():void {
		$isOcisOrReva = OcisHelper::isTestingOnOcisOrReva();
		foreach ($this->ldapCreatedUsers as $user) {
			if ($isOcisOrReva) {
				$this->ldap->delete(
					"uid=" . ldap_escape($user, "", LDAP_ESCAPE_DN) . ",ou=" . $this->ldapUsersOU . "," . $this->ldapBaseDN,
				);
			}
			$this->rememberThatUserIsNotExpectedToExist($user);
		}
		foreach ($this->ldapCreatedGroups as $group) {
			if ($isOcisOrReva) {
				$this->ldap->delete(
					"cn=" . ldap_escape($group, "", LDAP_ESCAPE_DN) . ",ou=" . $this->ldapGroupsOU . "," . $this->ldapBaseDN,
				);
			}
			$this->rememberThatGroupIsNotExpectedToExist($group);
		}
		if (!$isOcisOrReva || !$this->skipImportLdif) {
			//delete ou from LDIF import
			$this->ldap->delete(
				"ou=" . $this->ldapUsersOU . "," . $this->ldapBaseDN,
				true
			);
			//delete all created ldap groups
			$this->ldap->delete(
				"ou=" . $this->ldapGroupsOU . "," . $this->ldapBaseDN,
				true
			);
		}
		$this->theLdapUsersHaveBeenResynced();
	}

	/**
	 * Sets back old settings
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetOldLdapConfig():void {
		$toDeleteLdapConfig = $this->getToDeleteLdapConfigs();
		foreach ($toDeleteLdapConfig as $configId) {
			SetupHelper::runOcc(
				['ldap:delete-config', $configId],
				$this->getStepLineRef()
			);
		}
		foreach ($this->oldLdapConfig as $configId => $settings) {
			foreach ($settings as $configKey => $configValue) {
				$this->setLdapSetting($configId, $configKey, $configValue);
			}
		}
		foreach ($this->toDeleteDNs as $dn) {
			$this->getLdap()->delete($dn, true);
		}
	}

	/**
	 * Manually add skeleton files for a single user on OCIS and reva systems
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function manuallyAddSkeletonFilesForUser(string $user, string $password):void {
		$settings = [];
		$setting["userid"] = $user;
		$setting["password"] = $password;
		$settings[] = $setting;
		$this->manuallyAddSkeletonFiles($settings);
	}

	/**
	 * Manually add skeleton files on OCIS and reva systems
	 *
	 * @param array $usersAttributes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function manuallyAddSkeletonFiles(array $usersAttributes):void {
		if ($this->isEmptySkeleton()) {
			// The empty skeleton has no files. There is nothing to do so return early.
			return;
		}
		$skeletonDir = \getenv("SKELETON_DIR");
		$revaRoot = \getenv("OCIS_REVA_DATA_ROOT");
		$skeletonStrategy = \getenv("OCIS_SKELETON_STRATEGY");
		if (!$skeletonStrategy) {
			$skeletonStrategy = 'upload'; //slower, but safer, so make it the default
		}
		if ($skeletonStrategy !== 'upload' && $skeletonStrategy !== 'copy') {
			throw new Exception(
				'Wrong OCIS_SKELETON_STRATEGY environment variable. ' .
				'OCIS_SKELETON_STRATEGY has to be set to "upload" or "copy"'
			);
		}
		if (!$skeletonDir) {
			throw new Exception('Missing SKELETON_DIR environment variable, cannot copy skeleton files for OCIS');
		}
		if ($skeletonStrategy === 'copy' && !$revaRoot) {
			throw new Exception(
				'OCIS_SKELETON_STRATEGY is set to "copy" ' .
				'but no "OCIS_REVA_DATA_ROOT" given'
			);
		}
		if ($skeletonStrategy === 'upload') {
			foreach ($usersAttributes as $userAttributes) {
				OcisHelper::recurseUpload(
					$this->getBaseUrl(),
					$skeletonDir,
					$userAttributes['userid'],
					$userAttributes['password'],
					$this->getStepLineRef()
				);
			}
		}
		if ($skeletonStrategy === 'copy') {
			foreach ($usersAttributes as $userAttributes) {
				$user = $userAttributes['userid'];
				$dataDir = $revaRoot . "$user/files";
				if (!\file_exists($dataDir)) {
					\mkdir($dataDir, 0777, true);
				}
				OcisHelper::recurseCopy($skeletonDir, $dataDir);
			}
		}
	}

	/**
	 * This function will allow us to send user creation requests in parallel.
	 * This will be faster in comparison to waiting for each request to complete before sending another request.
	 *
	 * @param boolean $initialize
	 * @param array|null $usersAttributes
	 * @param string|null $method create the user with "ldap" or "api"
	 * @param boolean $skeleton
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function usersHaveBeenCreated(
		bool $initialize,
		?array $usersAttributes,
		?string $method = null,
		?bool $skeleton = true
	) {
		$requests = [];
		$client = HttpRequestHelper::createClient(
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);

		$useLdap = false;
		$useGraph = false;
		if ($method === null) {
			$useLdap = $this->isTestingWithLdap();
			$useGraph = OcisHelper::isTestingWithGraphApi();
		} elseif ($method === "ldap") {
			$useLdap = true;
		} elseif ($method === "graph") {
			$useGraph = true;
		}

		foreach ($usersAttributes as $i => $userAttributes) {
			if ($useLdap) {
				$this->createLdapUser($userAttributes);
			} else {
				$attributesToCreateUser['userid'] = $userAttributes['userid'];
				$attributesToCreateUser['password'] = $userAttributes['password'];
				$attributesToCreateUser['displayname'] = $userAttributes['displayName'];
				if (OcisHelper::isTestingOnOcisOrReva()) {
					$attributesToCreateUser['username'] = $userAttributes['userid'];
					if ($userAttributes['email'] === null) {
						Assert::assertArrayHasKey(
							'userid',
							$userAttributes,
							__METHOD__ . " userAttributes array does not have key 'userid'"
						);
						$attributesToCreateUser['email'] = $userAttributes['userid'] . '@owncloud.com';
					} else {
						$attributesToCreateUser['email'] = $userAttributes['email'];
					}
				}
				if ($useGraph) {
					$body = \TestHelpers\GraphHelper::prepareCreateUserPayload(
						$attributesToCreateUser['userid'],
						$attributesToCreateUser['password'],
						$attributesToCreateUser['email'],
						$attributesToCreateUser['displayname']
					);
					$request = \TestHelpers\GraphHelper::createRequest(
						$this->getBaseUrl(),
						$this->getStepLineRef(),
						"POST",
						'users',
						$body,
					);
				} else {
					// Create a OCS request for creating the user. The request is not sent to the server yet.
					$request = OcsApiHelper::createOcsRequest(
						$this->getBaseUrl(),
						'POST',
						"/cloud/users",
						$this->stepLineRef,
						$attributesToCreateUser
					);
				}
				// Add the request to the $requests array so that they can be sent in parallel.
				$requests[] = $request;
			}
		}

		$exceptionToThrow = null;
		if (!$useLdap) {
			$results = HttpRequestHelper::sendBatchRequest($requests, $client);
			// Check all requests to inspect failures.
			foreach ($results as $key => $e) {
				if ($e instanceof ClientException) {
					if ($useGraph) {
						$responseBody = $this->getJsonDecodedResponse($e->getResponse());
						$httpStatusCode = $e->getResponse()->getStatusCode();
						$graphStatusCode = $responseBody['error']['code'];
						$messageText = $responseBody['error']['message'];
						$exceptionToThrow = new Exception(
							__METHOD__ .
							" Unexpected failure when creating the user '" .
							$usersAttributes[$key]['userid'] . "'" .
							"\nHTTP status $httpStatusCode " .
							"\nGraph status $graphStatusCode " .
							"\nError message $messageText"
						);
					} else {
						$responseXml = $this->getResponseXml($e->getResponse(), __METHOD__);
						$messageText = (string) $responseXml->xpath("/ocs/meta/message")[0];
						$ocsStatusCode = (string) $responseXml->xpath("/ocs/meta/statuscode")[0];
						$httpStatusCode = $e->getResponse()->getStatusCode();
						$reasonPhrase = $e->getResponse()->getReasonPhrase();
						$exceptionToThrow = new Exception(
							__METHOD__ . " Unexpected failure when creating the user '" .
							$usersAttributes[$key]['userid'] . "': HTTP status $httpStatusCode " .
							"HTTP reason $reasonPhrase OCS status $ocsStatusCode " .
							"OCS message $messageText"
						);
					}
				}
			}
		}

		// Create requests for setting displayname and email for the newly created users.
		// These values cannot be set while creating the user, so we have to edit the newly created user to set these values.
		$users = [];
		$editData = [];
		foreach ($usersAttributes as $userAttributes) {
			$users[] = $userAttributes['userid'];
			if ($useGraph) {
				// for graph api, we need to save the user id to be able to add it in some group
				// can be fetched with the "onPremisesSamAccountName" i.e. userid
				$this->graphContext->adminHasRetrievedUserUsingTheGraphApi($userAttributes['userid']);
				$userAttributes['id'] = $this->getJsonDecodedResponse()['id'];
			} else {
				$userAttributes['id'] = null;
			}
			$this->addUserToCreatedUsersList(
				$userAttributes['userid'],
				$userAttributes['password'],
				$userAttributes['displayName'],
				$userAttributes['email'],
				$userAttributes['id']
			);

			if (OcisHelper::isTestingOnOcisOrReva()) {
				OcisHelper::createEOSStorageHome(
					$this->getBaseUrl(),
					$userAttributes['userid'],
					$userAttributes['password'],
					$this->getStepLineRef()
				);
				// We don't need to set displayName and email while running in oCIS
				// As they are set when creating the user
				continue;
			}
			if (isset($userAttributes['displayName'])) {
				$editData[] = ['user' => $userAttributes['userid'], 'key' => 'displayname', 'value' => $userAttributes['displayName']];
			}
			if (isset($userAttributes['email'])) {
				$editData[] = ['user' => $userAttributes['userid'], 'key' => 'email', 'value' => $userAttributes['email']];
			}
		}
		// Edit the users in parallel to make the process faster.
		if (!OcisHelper::isTestingOnOcisOrReva() && !$useLdap && \count($editData) > 0) {
			UserHelper::editUserBatch(
				$this->getBaseUrl(),
				$editData,
				$this->getAdminUsername(),
				$this->getAdminPassword(),
				$this->stepLineRef
			);
		}

		if (isset($exceptionToThrow)) {
			throw $exceptionToThrow;
		}

		// If the user should have skeleton files, and we are testing on OCIS
		// then do some work to "manually" put the skeleton files in place.
		// When testing on ownCloud 10 the user is already getting whatever
		// skeleton dir is defined in the server-under-test.
		if ($skeleton && OcisHelper::isTestingOnOcisOrReva()) {
			$this->manuallyAddSkeletonFiles($usersAttributes);
		}

		if ($initialize && ($this->isEmptySkeleton() || !OcisHelper::isTestingOnOcis())) {
			// We need to initialize each user using the individual authentication of each user.
			// That is not possible in Guzzle6 batch mode. So we do it with normal requests in serial.
			$this->initializeUsers($users);
		}
	}

	/**
	 * @When /^the administrator creates these users with ?(default attributes and|) skeleton files ?(but not initialized|):$/
	 *
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param string $setDefaultAttributes
	 * @param string $doNotInitialize
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function theAdministratorCreatesTheseUsers(
		string $setDefaultAttributes,
		string $doNotInitialize,
		TableNode $table
	): void {
		$this->verifyTableNodeColumns($table, ['username'], ['displayname', 'email', 'password']);
		$table = $table->getColumnsHash();
		$setDefaultAttributes = $setDefaultAttributes !== "";
		$initialize = $doNotInitialize === "";
		$usersAttributes = $this->buildUsersAttributesArray($setDefaultAttributes, $table);
		$this->usersHaveBeenCreated(
			$initialize,
			$usersAttributes
		);
	}

	/**
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param boolean $setDefaultAttributes
	 * @param boolean $initialize
	 * @param boolean $skeleton
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function createTheseUsers(bool $setDefaultAttributes, bool $initialize, bool $skeleton, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ['username'], ['displayname', 'email', 'password']);
		$table = $table->getColumnsHash();
		$usersAttributes = $this->buildUsersAttributesArray($setDefaultAttributes, $table);
		$this->usersHaveBeenCreated(
			$initialize,
			$usersAttributes,
			null,
			$skeleton
		);
		foreach ($usersAttributes as $expectedUser) {
			$this->userShouldExist($expectedUser["userid"]);
		}
	}

	/**
	 * @Given /^these users have been created with ?(default attributes and|) (tiny|small|large)\s?skeleton files ?(but not initialized|):$/
	 *
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param string $defaultAttributesText
	 * @param string $skeletonType
	 * @param string $doNotInitialize
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception|GuzzleException
	 */
	public function theseUsersHaveBeenCreated(
		string $defaultAttributesText,
		string $skeletonType,
		string $doNotInitialize,
		TableNode $table
	):void {
		if ($skeletonType === "") {
			$skeletonType = $this->getSmallestSkeletonDirName();
		}

		$originalSkeletonPath = $this->setSkeletonDirByType($skeletonType);
		$setDefaultAttributes = $defaultAttributesText !== "";
		$initialize = $doNotInitialize === "";
		try {
			$this->createTheseUsers($setDefaultAttributes, $initialize, true, $table);
		} finally {
			// The effective skeleton directory is the one when the user is initialized
			// If we did not initialize the user on creation, then we need to leave
			// the skeleton directory in effect so that it applies when some action
			// happens later in the scenario that causes the user to be initialized.
			if ($initialize) {
				$this->setSkeletonDir($originalSkeletonPath);
			}
		}
	}

	/**
	 * @When the administrator changes the password of user :user to :password using the provisioning API
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesPasswordOfUserToUsingTheProvisioningApi(
		string $user,
		string $password
	):void {
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$user,
			'password',
			$password,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef()
		);
	}

	/**
	 * @Given the administrator has changed the password of user :user to :password
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasChangedPasswordOfUserTo(
		string $user,
		string $password
	):void {
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->adminChangesPasswordOfUserToUsingTheGraphApi(
				$user,
				$password
			);
		} else {
			$this->adminChangesPasswordOfUserToUsingTheProvisioningApi(
				$user,
				$password
			);
		}
		$this->theHTTPStatusCodeShouldBe(
			200,
			"could not change password of user $user"
		);
	}

	/**
	 * @When /^user "([^"]*)" (enables|disables) app "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action enables or disables
	 * @param string $app
	 *
	 * @return void
	 */
	public function userEnablesOrDisablesApp(string $user, string $action, string $app):void {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps/$app";
		if ($action === 'enables') {
			$this->response = HttpRequestHelper::post(
				$fullUrl,
				$this->getStepLineRef(),
				$user,
				$this->getPasswordForUser($user)
			);
		} else {
			$this->response = HttpRequestHelper::delete(
				$fullUrl,
				$this->getStepLineRef(),
				$user,
				$this->getPasswordForUser($user)
			);
		}
	}

	/**
	 * @When /^the administrator (enables|disables) app "([^"]*)"$/
	 *
	 * @param string $action enables or disables
	 * @param string $app
	 *
	 * @return void
	 */
	public function adminEnablesOrDisablesApp(string $action, string $app):void {
		$this->userEnablesOrDisablesApp(
			$this->getAdminUsername(),
			$action,
			$app
		);
	}

	/**
	 * @Given /^app "([^"]*)" has been (enabled|disabled)$/
	 *
	 * @param string $app
	 * @param string $action enabled or disabled
	 *
	 * @return void
	 */
	public function appHasBeenDisabled(string $app, string $action):void {
		if ($action === 'enabled') {
			$action = 'enables';
		} else {
			$action = 'disables';
		}
		$this->userEnablesOrDisablesApp(
			$this->getAdminUsername(),
			$action,
			$app
		);
	}

	/**
	 * @When the administrator gets the info of app :app
	 *
	 * @param string $app
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheInfoOfApp(string $app):void {
		$this->ocsContext->userSendsToOcsApiEndpoint(
			$this->getAdminUsername(),
			"GET",
			"/cloud/apps/$app"
		);
	}

	/**
	 * @When the administrator gets all apps using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllAppsUsingTheProvisioningApi():void {
		$this->getAllApps();
	}

	/**
	 * @When the administrator gets all enabled apps using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllEnabledAppsUsingTheProvisioningApi():void {
		$this->getEnabledApps();
	}

	/**
	 * @When the administrator gets all disabled apps using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllDisabledAppsUsingTheProvisioningApi():void {
		$this->getDisabledApps();
	}

	/**
	 * @When the administrator sends a user creation request with the following attributes using the provisioning API:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminSendsUserCreationRequestWithFollowingAttributesUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeRows($table, ["username", "password"], ["email", "displayname"]);
		$table = $table->getRowsHash();
		$username = $this->getActualUsername($table["username"]);
		$password = $this->getActualPassword($table["password"]);
		$displayname = \array_key_exists("displayname", $table) ? $table["displayname"] : null;
		$email = \array_key_exists("email", $table) ? $table["email"] : null;

		if (OcisHelper::isTestingOnOcisOrReva()) {
			if ($email === null) {
				$email = $username . '@owncloud.com';
			}
		}

		$userAttributes = [
			["userid", $username],
			["password", $password],
		];

		if ($displayname !== null) {
			$userAttributes[] = ["displayname", $displayname];
		}

		if ($email !== null) {
			$userAttributes[] = ["email", $email];
		}

		if (OcisHelper::isTestingOnOcisOrReva()) {
			$userAttributes[] = ["username", $username];
		}

		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/users",
			new TableNode($userAttributes)
		);
		$this->addUserToCreatedUsersList(
			$username,
			$password,
			$displayname,
			$email,
			null,
			$this->theHTTPStatusCodeWasSuccess()
		);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$this->manuallyAddSkeletonFilesForUser($username, $password);
		}
	}

	/**
	 * @When /^the administrator sends a user creation request for user "([^"]*)" password "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminSendsUserCreationRequestUsingTheProvisioningApi(string $user, string $password):void {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$email = $user . '@owncloud.com';
			$bodyTable = new TableNode(
				[
					['userid', $user],
					['password', $password],
					['username', $user],
					['email', $email]
				]
			);
		} else {
			$email = null;
			$bodyTable = new TableNode([['userid', $user], ['password', $password]]);
		}
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->pushToLastStatusCodesArrays();
		$success = $this->theHTTPStatusCodeWasSuccess();
		$this->addUserToCreatedUsersList(
			$user,
			$password,
			null,
			$email,
			null,
			$success
		);
		if (OcisHelper::isTestingOnOcisOrReva() && $success) {
			OcisHelper::createEOSStorageHome(
				$this->getBaseUrl(),
				$user,
				$password,
				$this->getStepLineRef()
			);
			$this->manuallyAddSkeletonFilesForUser($user, $password);
		}
	}

	/**
	 * @When /^the administrator sends a user creation request for the following users with password using the provisioning API$/
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorSendsAUserCreationRequestForTheFollowingUsersWithPasswordUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username", "password"], ["comment"]);
		$users = $table->getHash();
		foreach ($users as $user) {
			$this->adminSendsUserCreationRequestUsingTheProvisioningApi($user["username"], $user["password"]);
		}
	}

	/**
	 * @When /^unauthorized user "([^"]*)" tries to create new user "([^"]*)" with password "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $userToCreate
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsUserCreationRequestUsingTheProvisioningApi(string $user, string $userToCreate, string $password):void {
		$userToCreate = $this->getActualUsername($userToCreate);
		$password = $this->getActualPassword($password);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$email = $userToCreate . '@owncloud.com';
			$bodyTable = new TableNode(
				[
					['userid', $userToCreate],
					['password', $password],
					['username', $userToCreate],
					['email', $email]
				]
			);
		} else {
			$email = null;
			$bodyTable = new TableNode([['userid', $userToCreate], ['password', $password]]);
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList(
			$userToCreate,
			$password,
			null,
			$email,
			null,
			$this->theHTTPStatusCodeWasSuccess()
		);
	}

	/**
	 * @When /^the administrator sends a user creation request for user "([^"]*)" password "([^"]*)" group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesUserPasswordGroupUsingTheProvisioningApi(
		string $user,
		string $password,
		string $group
	):void {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$email = $user . '@owncloud.com';
			$bodyTable = new TableNode(
				[
					['userid', $user],
					['password', $password],
					['username', $user],
					['email', $email],
					['groups[]', $group],
				]
			);
		} else {
			$email = null;
			$bodyTable = new TableNode(
				[['userid', $user], ['password', $password], ['groups[]', $group]]
			);
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList(
			$user,
			$password,
			null,
			$email,
			null,
			$this->theHTTPStatusCodeWasSuccess()
		);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$this->manuallyAddSkeletonFilesForUser($user, $password);
		}
	}

	/**
	 * @When /^the groupadmin "([^"]*)" sends a user creation request for user "([^"]*)" password "([^"]*)" group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $groupadmin
	 * @param string $userToCreate
	 * @param string $password
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theGroupAdminCreatesUserPasswordGroupUsingTheProvisioningApi(
		string $groupadmin,
		string $userToCreate,
		string $password,
		string $group
	):void {
		$userToCreate = $this->getActualUsername($userToCreate);
		$password = $this->getActualPassword($password);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$email = $userToCreate . '@owncloud.com';
			$bodyTable = new TableNode(
				[
					['userid', $userToCreate],
					['password', $userToCreate],
					['username', $userToCreate],
					['email', $email],
					['groups[]', $group],
				]
			);
		} else {
			$email = null;
			$bodyTable = new TableNode(
				[['userid', $userToCreate], ['password', $password], ['groups[]', $group]]
			);
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$groupadmin,
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList(
			$userToCreate,
			$password,
			null,
			$email,
			null,
			$this->theHTTPStatusCodeWasSuccess()
		);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$this->manuallyAddSkeletonFilesForUser($userToCreate, $password);
		}
	}

	/**
	 * @When /^the groupadmin "([^"]*)" tries to create new user "([^"]*)" password "([^"]*)" in other group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $groupadmin
	 * @param string $userToCreate
	 * @param string|null $password
	 * @param string $group
	 *
	 * @return void
	 */
	public function theGroupAdminCreatesUserPasswordInOtherGroupUsingTheProvisioningApi(
		string $groupadmin,
		string $userToCreate,
		?string $password,
		string $group
	):void {
		$userToCreate = $this->getActualUsername($userToCreate);
		$password = $this->getActualPassword($password);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$email = $userToCreate . '@owncloud.com';
			$bodyTable = new TableNode(
				[
					['userid', $userToCreate],
					['password', $userToCreate],
					['username', $userToCreate],
					['email', $email],
					['groups[]', $group],
				]
			);
		} else {
			$email = null;
			$bodyTable = new TableNode(
				[['userid', $userToCreate], ['password', $password], ['groups[]', $group]]
			);
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$groupadmin,
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList(
			$userToCreate,
			$password,
			null,
			$email,
			null,
			$this->theHTTPStatusCodeWasSuccess()
		);
	}

	/**
	 * @param string $username
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function resetUserPasswordAsAdminUsingTheProvisioningApi(string $username, ?string $password):void {
		$this->userResetUserPasswordUsingProvisioningApi(
			$this->getAdminUsername(),
			$username,
			$password
		);
	}

	/**
	 * @When the administrator resets the password of user :username to :password using the provisioning API
	 *
	 * @param string $username of the user whose password is reset
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function adminResetsPasswordOfUserUsingTheProvisioningApi(string $username, ?string $password):void {
		$this->resetUserPasswordAsAdminUsingTheProvisioningApi(
			$username,
			$password
		);
	}

	/**
	 * @Given the administrator has reset the password of user :username to :password
	 *
	 * @param string $username of the user whose password is reset
	 * @param string $password
	 *
	 * @return void
	 */
	public function adminHasResetPasswordOfUserUsingTheProvisioningApi(string $username, ?string $password):void {
		$this->resetUserPasswordAsAdminUsingTheProvisioningApi(
			$username,
			$password
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string|null $user
	 * @param string|null $username
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userResetUserPasswordUsingProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$targetUsername = $this->getActualUsername($username);
		$password = $this->getActualPassword($password);
		$this->userTriesToResetUserPasswordUsingTheProvisioningApi(
			$user,
			$targetUsername,
			$password
		);
		$this->rememberUserPassword($targetUsername, $password);
	}

	/**
	 * @When user :user resets the password of user :username to :password using the provisioning API
	 *
	 * @param string|null $user that does the password reset
	 * @param string|null $username of the user whose password is reset
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userResetsPasswordOfUserUsingTheProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$this->userResetUserPasswordUsingProvisioningApi(
			$user,
			$username,
			$password
		);
	}

	/**
	 * @Given user :user has reset the password of user :username to :password
	 *
	 * @param string|null $user that does the password reset
	 * @param string|null $username of the user whose password is reset
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userHasResetPasswordOfUserUsingTheProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$this->userResetUserPasswordUsingProvisioningApi(
			$user,
			$username,
			$password
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string|null $user
	 * @param string|null $username
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userTriesToResetUserPasswordUsingTheProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$password = $this->getActualPassword($password);
		$bodyTable = new TableNode([['key', 'password'], ['value', $password]]);
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"PUT",
			"/cloud/users/$username",
			$bodyTable
		);
	}

	/**
	 * @When user :user tries to reset the password of user :username to :password using the provisioning API
	 *
	 * @param string|null $user that does the password reset
	 * @param string|null $username of the user whose password is reset
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userTriesToResetPasswordOfUserUsingTheProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$this->userTriesToResetUserPasswordUsingTheProvisioningApi(
			$user,
			$username,
			$password
		);
	}

	/**
	 * @Given user :user has tried to reset the password of user :username to :password
	 *
	 * @param string|null $user that does the password reset
	 * @param string|null $username of the user whose password is reset
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userHasTriedToResetPasswordOfUserUsingTheProvisioningApi(?string $user, ?string $username, ?string $password):void {
		$this->userTriesToResetUserPasswordUsingTheProvisioningApi(
			$user,
			$username,
			$password
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Given /^the administrator has deleted user "([^"]*)" using the provisioning API$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasDeletedUserUsingTheProvisioningApi(?string $user):void {
		$user = $this->getActualUsername($user);
		$this->deleteTheUserUsingTheProvisioningApi($user);
		WebDavHelper::removeSpaceIdReferenceForUser($user);
		$this->userShouldNotExist($user);
	}

	/**
	 * @When /^the administrator deletes user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminDeletesUserUsingTheProvisioningApi(string $user):void {
		$user = $this->getActualUsername($user);
		$this->deleteTheUserUsingTheProvisioningApi($user);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @When the administrator deletes the following users using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesTheFollowingUsersUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->theAdminDeletesUserUsingTheProvisioningApi($username["username"]);
		}
	}

	/**
	 * @When user :user deletes user :otherUser using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDeletesUserUsingTheProvisioningApi(
		string $user,
		string $otherUser
	):void {
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$actualOtherUser = $this->getActualUsername($otherUser);

		$this->response = UserHelper::deleteUser(
			$this->getBaseUrl(),
			$actualOtherUser,
			$actualUser,
			$actualPassword,
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^the administrator changes the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheEmailOfUserToUsingTheProvisioningApi(
		string $user,
		string $email
	):void {
		$user = $this->getActualUsername($user);
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$user,
			'email',
			$email,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->rememberUserEmailAddress($user, $email);
	}

	/**
	 * @Given /^the administrator has changed the email of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasChangedTheEmailOfUserTo(string $user, string $email):void {
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userHasBeenEditedUsingTheGraphApi(
				$user,
				null,
				null,
				$email
			);
			$updatedUserData = $this->getJsonDecodedResponse();
			Assert::assertEquals(
				$email,
				$updatedUserData['mail']
			);
		} else {
			$this->adminChangesTheEmailOfUserToUsingTheProvisioningApi(
				$user,
				$email
			);
			$this->theHTTPStatusCodeShouldBe(
				200,
				"could not change email of user $user"
			);
		}
	}

	/**
	 * @Given the administrator has changed their own email address to :email
	 *
	 * @param string|null $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasChangedTheirOwnEmailAddressTo(?string $email):void {
		$admin = $this->getAdminUsername();
		$this->adminHasChangedTheEmailOfUserTo($admin, $email);
	}

	/**
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $email
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userChangesUserEmailUsingProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $email
	):void {
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'email',
			$email,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^user "([^"]*)" changes the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userChangesTheEmailOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $email
	):void {
		$this->userTriesToChangeTheEmailOfUserUsingTheProvisioningApi(
			$requestingUser,
			$targetUser,
			$email
		);
		$targetUser = $this->getActualUsername($targetUser);
		$this->rememberUserEmailAddress($targetUser, $email);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" tries to change the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $email
	 *
	 * @return void
	 */
	public function userTriesToChangeTheEmailOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $email
	):void {
		$requestingUser = $this->getActualUsername($requestingUser);
		$targetUser = $this->getActualUsername($targetUser);
		$this->userChangesUserEmailUsingProvisioningApi(
			$requestingUser,
			$targetUser,
			$email
		);
	}

	/**
	 * @Given /^user "([^"]*)" has changed the email of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasChangedTheEmailOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $email
	):void {
		$requestingUser = $this->getActualUsername($requestingUser);
		$targetUser = $this->getActualUsername($targetUser);
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userHasBeenEditedUsingTheGraphApi(
				$targetUser,
				null,
				null,
				$email,
				null,
				$requestingUser,
				$this->getPasswordForUser($requestingUser)
			);
			$updatedUserData = $this->getJsonDecodedResponse();
			Assert::assertEquals(
				$email,
				$updatedUserData['mail'],
			);
		} else {
			$this->userChangesUserEmailUsingProvisioningApi(
				$requestingUser,
				$targetUser,
				$email
			);
			$this->theHTTPStatusCodeShouldBeSuccess();
		}
		$this->rememberUserEmailAddress($targetUser, $email);
	}

	/**
	 * Edit the "display name" of a user by sending the key "displayname" to the API end point.
	 *
	 * This is the newer and consistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^the administrator changes the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayNameOfUserUsingTheProvisioningApi(
		string $user,
		string $displayName
	):void {
		$user = $this->getActualUsername($user);
		$this->adminChangesTheDisplayNameOfUserUsingKey(
			$user,
			'displayname',
			$displayName
		);
		$this->rememberUserDisplayName($user, $displayName);
	}

	/**
	 * @Given /^the administrator has changed the display name of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasChangedTheDisplayNameOfUser(
		string $user,
		string $displayName
	):void {
		$user = $this->getActualUsername($user);
		if ($this->isTestingWithLdap()) {
			$this->editLdapUserDisplayName(
				$user,
				$displayName
			);
		} elseif (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userHasBeenEditedUsingTheGraphApi(
				$user,
				null,
				null,
				null,
				$displayName
			);
			$updatedUserData = $this->getJsonDecodedResponse();
			Assert::assertEquals(
				$displayName,
				$updatedUserData['displayName']
			);
		} else {
			$this->adminChangesTheDisplayNameOfUserUsingKey(
				$user,
				'displayname',
				$displayName
			);
			$response = UserHelper::getUser(
				$this->getBaseUrl(),
				$user,
				$this->getAdminUsername(),
				$this->getAdminPassword(),
				$this->getStepLineRef()
			);
			$this->setResponse($response);
			$this->theDisplayNameReturnedByTheApiShouldBe($displayName);
		}
		$this->rememberUserDisplayName($user, $displayName);
	}

	/**
	 * As the administrator, edit the "display name" of a user by sending the key "display" to the API end point.
	 *
	 * This is the older and inconsistent key name, which remains for backward-compatibility.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^the administrator changes the display of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayOfUserUsingTheProvisioningApi(
		string $user,
		string $displayName
	):void {
		$user = $this->getActualUsername($user);
		$this->adminChangesTheDisplayNameOfUserUsingKey(
			$user,
			'display',
			$displayName
		);
		$this->rememberUserDisplayName($user, $displayName);
	}

	/**
	 *
	 * @param string $user
	 * @param string $key
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayNameOfUserUsingKey(
		string $user,
		string $key,
		string $displayName
	):void {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$key,
			$displayName,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
		if ($result->getStatusCode() !== 200) {
			throw new Exception(
				__METHOD__ . " could not change display name of user using key $key "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * As a user, edit the "display name" of a user by sending the key "displayname" to the API end point.
	 *
	 * This is the newer and consistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^user "([^"]*)" changes the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userChangesTheDisplayNameOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $displayName
	):void {
		$this->userTriesToChangeTheDisplayNameOfUserUsingTheProvisioningApi(
			$requestingUser,
			$targetUser,
			$displayName
		);
		$targetUser = $this->getActualUsername($targetUser);
		$this->rememberUserDisplayName($targetUser, $displayName);
	}

	/**
	 * As a user, try to edit the "display name" of a user by sending the key "displayname" to the API end point.
	 *
	 * This is the newer and consistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^user "([^"]*)" tries to change the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function userTriesToChangeTheDisplayNameOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $displayName
	):void {
		$requestingUser = $this->getActualUsername($requestingUser);
		$targetUser = $this->getActualUsername($targetUser);
		$this->userChangesTheDisplayNameOfUserUsingKey(
			$requestingUser,
			$targetUser,
			'displayname',
			$displayName
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * As a user, edit the "display name" of a user by sending the key "display" to the API end point.
	 *
	 * This is the older and inconsistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^user "([^"]*)" changes the display of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userChangesTheDisplayOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $displayName
	):void {
		$requestingUser = $this->getActualUsername($requestingUser);
		$targetUser = $this->getActualUsername($targetUser);
		$this->userChangesTheDisplayNameOfUserUsingKey(
			$requestingUser,
			$targetUser,
			'display',
			$displayName
		);
		$this->rememberUserDisplayName($targetUser, $displayName);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has changed the display name of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasChangedTheDisplayNameOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $displayName
	):void {
		$requestingUser = $this->getActualUsername($requestingUser);
		$targetUser = $this->getActualUsername($targetUser);
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userHasBeenEditedUsingTheGraphApi(
				$targetUser,
				null,
				null,
				null,
				$displayName,
				$requestingUser,
				$this->getPasswordForUser($requestingUser)
			);
			$updatedUserData = $this->getJsonDecodedResponse();
			Assert::assertEquals(
				$displayName,
				$updatedUserData['displayName']
			);
		} else {
			$this->userChangesTheDisplayNameOfUserUsingKey(
				$requestingUser,
				$targetUser,
				'displayname',
				$displayName
			);
			$this->theHTTPStatusCodeShouldBeSuccess();
		}
		$this->rememberUserDisplayName($targetUser, $displayName);
	}
	/**
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $key
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function userChangesTheDisplayNameOfUserUsingKey(
		string $requestingUser,
		string $targetUser,
		string $key,
		string $displayName
	):void {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			$key,
			$displayName,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator changes the quota of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminChangesTheQuotaOfUserUsingTheProvisioningApi(
		string $user,
		string $quota
	):void {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			'quota',
			$quota,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @Given /^the administrator has (?:changed|set) the quota of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminHasChangedTheQuotaOfUserTo(
		string $user,
		string $quota
	):void {
		$user = $this->getActualUsername($user);
		$this->adminChangesTheQuotaOfUserUsingTheProvisioningApi(
			$user,
			$quota
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"could not change quota of user $user"
		);
	}

	/**
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $quota
	 *
	 * @return void
	 */
	public function userChangeQuotaOfUserUsingProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $quota
	):void {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'quota',
			$quota,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^user "([^"]*)" changes the quota of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $quota
	 *
	 * @return void
	 */
	public function userChangesTheQuotaOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $quota
	):void {
		$this->userChangeQuotaOfUserUsingProvisioningApi(
			$requestingUser,
			$targetUser,
			$quota
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has changed the quota of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $quota
	 *
	 * @return void
	 */
	public function userHasChangedTheQuotaOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser,
		string $quota
	):void {
		$this->userChangeQuotaOfUserUsingProvisioningApi(
			$requestingUser,
			$targetUser,
			$quota
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function retrieveUserInformationAsAdminUsingProvisioningApi(
		string $user
	):void {
		$result = UserHelper::getUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator retrieves the information of user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function adminRetrievesTheInformationOfUserUsingTheProvisioningApi(
		string $user
	):void {
		$user = $this->getActualUsername($user);
		$this->retrieveUserInformationAsAdminUsingProvisioningApi(
			$user
		);
	}

	/**
	 * @Given /^the administrator has retrieved the information of user "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function adminHasRetrievedTheInformationOfUserUsingTheProvisioningApi(
		string $user
	):void {
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->adminHasRetrievedUserUsingTheGraphApi($user);
		} else {
			$this->retrieveUserInformationAsAdminUsingProvisioningApi($user);
			$this->theHTTPStatusCodeShouldBeSuccess();
		}
	}

	/**
	 * @param string $requestingUser
	 * @param string $targetUser
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userRetrieveUserInformationUsingProvisioningApi(
		string $requestingUser,
		string $targetUser
	):void {
		$result = UserHelper::getUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^user "([^"]*)" retrieves the information of user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userRetrievesTheInformationOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser
	):void {
		$this->userRetrieveUserInformationUsingProvisioningApi(
			$requestingUser,
			$targetUser
		);
	}

	/**
	 * @Given /^user "([^"]*)" has retrieved the information of user "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userHasRetrievedTheInformationOfUserUsingTheProvisioningApi(
		string $requestingUser,
		string $targetUser
	):void {
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userHasRetrievedUserUsingTheGraphApi(
				$requestingUser,
				$targetUser
			);
		} else {
			$this->userRetrieveUserInformationUsingProvisioningApi(
				$requestingUser,
				$targetUser
			);
			$this->theHTTPStatusCodeShouldBeSuccess();
		}
	}

	/**
	 * @Then /^user "([^"]*)" should exist$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userShouldExist(string $user):void {
		$user = $this->getActualUsername($user);
		Assert::assertTrue(
			$this->userExists($user),
			"User '$user' should exist but does not exist"
		);
	}

	/**
	 * @Then the following users should exist
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersShouldExist(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->userShouldExist($username["username"]);
		}
	}

	/**
	 * @Then /^user "([^"]*)" should not exist$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userShouldNotExist(string $user):void {
		$user = $this->getActualUsername($user);
		Assert::assertFalse(
			$this->userExists($user),
			"User '$user' should not exist but does exist"
		);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @Then the following users should not exist
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersShouldNotExist(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->userShouldNotExist($username["username"]);
		}
	}

	/**
	 * @Then /^group "([^"]*)" should exist$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function groupShouldExist(string $group):void {
		Assert::assertTrue(
			$this->groupExists($group),
			"Group '$group' should exist but does not exist"
		);
	}

	/**
	 * @Then /^group "([^"]*)" should not exist$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function groupShouldNotExist(string $group):void {
		Assert::assertFalse(
			$this->groupExists($group),
			"Group '$group' should not exist but does exist"
		);
	}

	/**
	 * @Then the following groups should not exist
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingGroupsShouldNotExist(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["groupname"]);
		$groups = $table->getHash();
		foreach ($groups as $group) {
			$this->groupShouldNotExist($group["groupname"]);
		}
	}

	/**
	 * @Then /^these groups should (not|)\s?exist:$/
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theseGroupsShouldNotExist(string $shouldOrNot, TableNode $table):void {
		$should = ($shouldOrNot !== "not");
		$this->verifyTableNodeColumns($table, ['groupname']);
		$useGraph = OcisHelper::isTestingWithGraphApi();
		if ($useGraph) {
			$this->graphContext->theseGroupsShouldNotExist($shouldOrNot, $table);
		} else {
			$groups = $this->getArrayOfGroupsResponded($this->getAllGroups());
			foreach ($table as $row) {
				if (\in_array($row['groupname'], $groups, true) !== $should) {
					throw new Exception(
						"group '" . $row['groupname'] .
						"' does" . ($should ? " not" : "") .
						" exist but should" . ($should ? "" : " not")
					);
				}
			}
		}
	}

	/**
	 * @Given /^user "([^"]*)" has been deleted$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenDeleted(string $user):void {
		$user = $this->getActualUsername($user);
		if ($this->userExists($user)) {
			if ($this->isTestingWithLdap() && \in_array($user, $this->ldapCreatedUsers)) {
				$this->deleteLdapUser($user);
			} else {
				$this->deleteTheUserUsingTheProvisioningApi($user);
			}
		}
		$this->userShouldNotExist($user);
	}

	/**
	 * @Given the following users have been deleted
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersHaveBeenDeleted(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->userHasBeenDeleted($username["username"]);
		}
	}

	/**
	 * @Given these users have been initialized:
	 * expects a table of users with the heading
	 * "|username|password|"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseUsersHaveBeenInitialized(TableNode $table):void {
		foreach ($table as $row) {
			if (!isset($row ['password'])) {
				$password = $this->getPasswordForUser($row ['username']);
			} else {
				$password = $row ['password'];
			}
			$this->initializeUser(
				$row ['username'],
				$password
			);
		}
	}

	/**
	 * @When the administrator gets all the members of group :group using the provisioning API
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheMembersOfGroupUsingTheProvisioningApi(string $group):void {
		$this->userGetsAllTheMembersOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$group
		);
	}

	/**
	 * @When /^user "([^"]*)" gets all the members of group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userGetsAllTheMembersOfGroupUsingTheProvisioningApi(string $user, string $group):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getActualUsername($user),
			$this->getPasswordForUser($user)
		);
	}

	/**
	 * get all the existing groups
	 *
	 * @return ResponseInterface
	 */
	public function getAllGroups():ResponseInterface {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/groups";
		return HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @When the administrator gets all the groups using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheGroupsUsingTheProvisioningApi():void {
		$this->response = $this->getAllGroups();
	}

	/**
	 * @When /^user "([^"]*)" tries to get all the groups using the provisioning API$/
	 * @When /^user "([^"]*)" gets all the groups using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToGetAllTheGroupsUsingTheProvisioningApi(string $user):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/groups";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
	}

	/**
	 * @When the administrator gets all the groups of user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsAllTheGroupsOfUser(string $user):void {
		$this->userGetsAllTheGroupsOfUser($this->getAdminUsername(), $user);
	}

	/**
	 * @When user :user gets all the groups of user :otherUser using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsAllTheGroupsOfUser(string $user, string $otherUser):void {
		$actualOtherUser = $this->getActualUsername($otherUser);
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$actualOtherUser/groups";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
	}

	/**
	 * @When the administrator gets the list of all users using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheListOfAllUsersUsingTheProvisioningApi():void {
		$this->userGetsTheListOfAllUsersUsingTheProvisioningApi($this->getAdminUsername());
	}

	/**
	 * @When user :user gets the list of all users using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsTheListOfAllUsersUsingTheProvisioningApi(string $user):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/users";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
	}

	/**
	 * Make a request about the user. That will force the server to fully
	 * initialize the user, including their skeleton files.
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function initializeUser(string $user, string $password):void {
		$url = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		HttpRequestHelper::get(
			$url,
			$this->getStepLineRef(),
			$user,
			$password
		);
		$this->lastUploadTime = \time();
	}

	/**
	 * Touch an API end-point for each user so that their file-system gets setup
	 *
	 * @param array $users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function initializeUsers(array $users):void {
		$url = "/cloud/users/%s";
		foreach ($users as $user) {
			$response = OcsApiHelper::sendRequest(
				$this->getBaseUrl(),
				$user,
				$this->getPasswordForUser($user),
				'GET',
				\sprintf($url, $user),
				$this->getStepLineRef()
			);
			$this->setResponse($response);
			$this->theHTTPStatusCodeShouldBe(200);
		}
	}

	/**
	 * adds a user to the list of users that were created during test runs
	 * makes it possible to use this list in other test steps
	 * or to delete them at the end of the test
	 *
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $displayName
	 * @param string|null $email
	 * @param string|null $userId only set for the users created using the Graph API
	 * @param bool $shouldExist
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function addUserToCreatedUsersList(
		?string $user,
		?string $password,
		?string $displayName = null,
		?string $email = null,
		?string $userId = null,
		bool $shouldExist = true
	):void {
		$user = $this->getActualUsername($user);
		$normalizedUsername = $this->normalizeUsername($user);
		$userData = [
			"password" => $password,
			"displayname" => $displayName,
			"email" => $email,
			"shouldExist" => $shouldExist,
			"actualUsername" => $user,
			"id" => $userId
		];

		if ($this->currentServer === 'LOCAL') {
			// Only remember this user creation if it was expected to have been successful
			// or the user has not been processed before. Some tests create a user the
			// first time (successfully) and then purposely try to create the user again.
			// The 2nd user creation is expected to fail, and in that case we want to
			// still remember the details of the first user creation.
			if ($shouldExist || !\array_key_exists($normalizedUsername, $this->createdUsers)) {
				$this->createdUsers[$normalizedUsername] = $userData;
			}
		} elseif ($this->currentServer === 'REMOTE') {
			// See comment above about the LOCAL case. The logic is the same for the remote case.
			if ($shouldExist || !\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
				$this->createdRemoteUsers[$normalizedUsername] = $userData;
			}
		}
	}

	/**
	 * remember the password of a user that already exists so that you can use
	 * ordinary test steps after changing their password.
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function rememberUserPassword(
		string $user,
		string $password
	):void {
		$normalizedUsername = $this->normalizeUsername($user);
		if ($this->currentServer === 'LOCAL') {
			if (\array_key_exists($normalizedUsername, $this->createdUsers)) {
				$this->createdUsers[$normalizedUsername]['password'] = $password;
			}
		} elseif ($this->currentServer === 'REMOTE') {
			if (\array_key_exists($normalizedUsername, $this->createdRemoteUsers)) {
				$this->createdRemoteUsers[$user]['password'] = $password;
			}
		}
	}

	/**
	 * Remembers that a user from the list of users that were created during
	 * test runs is no longer expected to exist. Useful if a user was created
	 * during the setup phase but was deleted in a test run. We don't expect
	 * this user to exist in the tear-down phase, so remember that fact.
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function rememberThatUserIsNotExpectedToExist(string $user):void {
		$user = $this->getActualUsername($user);
		$normalizedUsername = $this->normalizeUsername($user);
		if (\array_key_exists($normalizedUsername, $this->createdUsers)) {
			$this->createdUsers[$normalizedUsername]['shouldExist'] = false;
		}
	}

	/**
	 * creates a single user
	 *
	 * @param string|null $user
	 * @param string|null $password if null, then select a password
	 * @param string|null $displayName
	 * @param string|null $email
	 * @param bool $initialize initialize the user skeleton files etc
	 * @param string|null $method how to create the user api|occ, default api
	 * @param bool $setDefault sets the missing values to some default
	 * @param bool $skeleton
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createUser(
		?string $user,
		?string $password = null,
		?string $displayName = null,
		?string $email = null,
		bool $initialize = true,
		?string $method = null,
		bool $setDefault = true,
		bool $skeleton = true
	):void {
		$userId = null;
		if ($password === null) {
			$password = $this->getPasswordForUser($user);
		}

		if ($displayName === null && $setDefault === true) {
			$displayName = $this->getDisplayNameForUser($user);
			if ($displayName === null) {
				$displayName = $this->getDisplayNameForUser('regularuser');
			}
		}

		if ($email === null && $setDefault === true) {
			$email = $this->getEmailAddressForUser($user);

			if ($email === null) {
				// escape @ & space if present in userId
				$email = \str_replace(["@", " "], "", $user) . '@owncloud.com';
			}
		}

		$user = $this->getActualUsername($user);

		if ($method === null && $this->isTestingWithLdap()) {
			//guess yourself
			$method = "ldap";
		} elseif (OcisHelper::isTestingWithGraphApi()) {
			$method = "graph";
		} elseif ($method === null) {
			$method = "api";
		}
		$user = \trim($user);
		$method = \trim(\strtolower($method));
		switch ($method) {
			case "occ":
				$result = SetupHelper::createUser(
					$user,
					$password,
					$this->getStepLineRef(),
					$displayName,
					$email
				);
				if ($result["code"] !== "0") {
					throw new Exception(
						__METHOD__ . " could not create user. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "api":
			case "ldap":
				$settings = [];
				$setting["userid"] = $user;
				$setting["displayName"] = $displayName;
				$setting["password"] = $password;
				$setting["email"] = $email;
				\array_push($settings, $setting);
				try {
					$this->usersHaveBeenCreated(
						$initialize,
						$settings,
						$method,
						$skeleton
					);
				} catch (LdapException $exception) {
					throw new Exception(
						__METHOD__ . " cannot create a LDAP user with provided data. Error: {$exception}"
					);
				}
				break;
			case "graph":
				$this->graphContext->theAdminHasCreatedUser(
					$user,
					$password,
					$email,
					$displayName,
				);
				$newUser = $this->getJsonDecodedResponse();
				$userId = $newUser['id'];
				break;
			default:
				throw new InvalidArgumentException(
					__METHOD__ . " Invalid method to create a user"
				);
		}

		$this->addUserToCreatedUsersList($user, $password, $displayName, $email, $userId);
		if ($initialize) {
			$this->initializeUser($user, $password);
		}
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteUser(string $user):void {
		$this->deleteTheUserUsingTheProvisioningApi($user);
		$this->userShouldNotExist($user);
	}

	/**
	 * Try to delete the group, catching anything bad that might happen.
	 * Use this method only in places where you want to try as best you
	 * can to delete the group, but do not want to error if there is a problem.
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cleanupGroup(string $group):void {
		try {
			if (OcisHelper::isTestingWithGraphApi()) {
				$this->graphContext->adminHasDeletedGroupUsingTheGraphApi($group);
			} else {
				$this->deleteTheGroupUsingTheProvisioningApi($group);
			}
		} catch (Exception $e) {
			\error_log(
				"INFORMATION: There was an unexpected problem trying to delete group " .
				"'$group' message '" . $e->getMessage() . "'"
			);
		}

		if ($this->theGroupShouldBeAbleToBeDeleted($group)
			&& $this->groupExists($group)
		) {
			\error_log(
				"INFORMATION: tried to delete group '$group'" .
				" at the end of the scenario but it seems to still exist. " .
				"There might be problems with later scenarios."
			);
		}
	}

	/**
	 * @param string|null $user
	 *
	 * @return bool
	 * @throws JsonException
	 */
	public function userExists(?string $user):bool {
		// in OCIS there is no admin user and in oC10 there are issues when
		// sending the username in lowercase in the auth but in uppercase in
		// the URL see https://github.com/owncloud/core/issues/36822
		$user = $this->getActualUsername($user);
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// In OCIS an intermittent issue restricts users to list their own account
			// So use admin account to list the user
			// https://github.com/owncloud/ocis/issues/820
			// The special code can be reverted once the issue is fixed
			if (OcisHelper::isTestingParallelDeployment()) {
				$requestingUser = $this->getActualUsername($user);
				$requestingPassword = $this->getPasswordForUser($user);
			} elseif (OcisHelper::isTestingWithGraphApi()) {
				$requestingUser = $this->getAdminUsername();
				$requestingPassword = $this->getAdminPassword();
			} elseif (OcisHelper::isTestingOnOcis()) {
				$requestingUser = 'moss';
				$requestingPassword = 'vista';
			} else {
				$requestingUser = $this->getActualUsername($user);
				$requestingPassword = $this->getPasswordForUser($requestingUser);
			}
		} else {
			$requestingUser = $this->getAdminUsername();
			$requestingPassword = $this->getAdminPassword();
		}
		$path = (OcisHelper::isTestingWithGraphApi())
			? "/graph/v1.0"
			: "/ocs/v2.php/cloud";
		$fullUrl = $this->getBaseUrl() . $path . "/users/$user";

		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$requestingUser,
			$requestingPassword
		);
		if ($this->response->getStatusCode() >= 400) {
			return false;
		}
		return true;
	}

	/**
	 * @Then /^user "([^"]*)" should belong to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBelongToGroup(string $user, string $group):void {
		$user = $this->getActualUsername($user);
		$respondedArray = [];
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userShouldBeMemberInGroupUsingTheGraphApi(
				$user,
				$group
			);
		} else {
			$this->theAdministratorGetsAllTheGroupsOfUser($user);
			$respondedArray = $this->getArrayOfGroupsResponded($this->response);
			\sort($respondedArray);
			Assert::assertContains(
				$group,
				$respondedArray,
				__METHOD__ . " Group '$group' does not exist in '"
				. \implode(', ', $respondedArray)
				. "'"
			);
			Assert::assertEquals(
				200,
				$this->response->getStatusCode(),
				__METHOD__
				. " Expected status code is '200' but got '"
				. $this->response->getStatusCode()
				. "'"
			);
		}
	}

	/**
	 * @Then the following users should belong to the following groups
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTheFollowingUserShouldBelongToTheFollowingGroup(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username", "groupname"]);
		$rows = $table->getHash();
		foreach ($rows as $row) {
			$this->userShouldBelongToGroup($row["username"], $row["groupname"]);
		}
	}

	/**
	 * @param string $group
	 *
	 * @return array
	 */
	public function getUsersOfLdapGroup(string $group):array {
		$ou = $this->getLdapGroupsOU();
		$entry = 'cn=' . $group . ',ou=' . $ou . ',' . $this->ldapBaseDN;
		$ldapResponse = $this->ldap->getEntry($entry);
		return $ldapResponse["memberuid"];
	}

	/**
	 * @Then /^user "([^"]*)" should not belong to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userShouldNotBelongToGroup(string $user, string $group):void {
		$user = $this->getActualUsername($user);
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->userShouldNotBeMemberInGroupUsingTheGraphApi($user, $group);
		} else {
			$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user/groups";
			$this->response = HttpRequestHelper::get(
				$fullUrl,
				$this->getStepLineRef(),
				$this->getAdminUsername(),
				$this->getAdminPassword()
			);
			$respondedArray = $this->getArrayOfGroupsResponded($this->response);
			\sort($respondedArray);
			Assert::assertNotContains($group, $respondedArray);
			Assert::assertEquals(
				200,
				$this->response->getStatusCode()
			);
		}
	}

	/**
	 * @Then the following users should not belong to the following groups
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTheFollowingUserShouldNotBelongToTheFollowingGroup(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username", "groupname"]);
		$rows = $table->getHash();
		foreach ($rows as $row) {
			$this->userShouldNotBelongToGroup($row["username"], $row["groupname"]);
		}
	}

	/**
	 * @Then group :group should not contain user :username
	 *
	 * @param string $group
	 * @param string $username
	 *
	 * @return void
	 */
	public function groupShouldNotContainUser(string $group, string $username):void {
		$username = $this->getActualUsername($username);
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		$this->theUsersReturnedByTheApiShouldNotInclude($username);
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return bool
	 */
	public function userBelongsToGroup(string $user, string $group):bool {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);

		if (\in_array($group, $respondedArray)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @When /^the administrator adds user "([^"]*)" to group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminAddsUserToGroupUsingTheProvisioningApi(string $user, string $group):void {
		$this->addUserToGroup($user, $group, "api");
	}

	/**
	 * @When the administrator adds the following users to the following groups using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorAddsUserToTheFollowingGroupsUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username", "groupname"], ["comment"]);
		$rows = $table->getHash();
		foreach ($rows as $row) {
			$this->adminAddsUserToGroupUsingTheProvisioningApi($row["username"], $row["groupname"]);
		}
	}

	/**
	 * @When user :user tries to add user :otherUser to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToAddUserToGroupUsingTheProvisioningApi(string $user, string $otherUser, string $group):void {
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$actualOtherUser = $this->getActualUsername($otherUser);
		$result = UserHelper::addUserToGroup(
			$this->getBaseUrl(),
			$actualOtherUser,
			$group,
			$actualUser,
			$actualPassword,
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When user :user tries to add himself to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToAddHimselfToGroupUsingTheProvisioningApi(string $user, string $group):void {
		$this->userTriesToAddUserToGroupUsingTheProvisioningApi($user, $user, $group);
	}

	/**
	 * @When the administrator tries to add user :user to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTriesToAddUserToGroupUsingTheProvisioningApi(
		string $user,
		string $group
	):void {
		$this->userTriesToAddUserToGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$user,
			$group
		);
	}

	/**
	 * @Given /^user "([^"]*)" has been added to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenAddedToGroup(string $user, string $group):void {
		$user = $this->getActualUsername($user);
		$this->addUserToGroup($user, $group, null, true);
	}

	/**
	 * @Given the following users have been added to the following groups
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUserHaveBeenAddedToTheFollowingGroup(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ['username', 'groupname']);
		foreach ($table as $row) {
			$this->userHasBeenAddedToGroup($row['username'], $row['groupname']);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has been added to database backend group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenAddedToDatabaseBackendGroup(string $user, string $group):void {
		$this->addUserToGroup($user, $group, 'api', true);
	}

	/**
	 * @param string $user
	 * @param string $group
	 * @param string|null $method how to add the user to the group api|occ
	 * @param bool $checkResult if true, then check the status of the operation. default false.
	 * 			                for given step checkResult is expected to be set as true
	 * 			                for when step checkResult is expected to be set as false
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addUserToGroup(string $user, string $group, ?string $method = null, bool $checkResult = false):void {
		$user = $this->getActualUsername($user);
		if ($method === null
			&& $this->isTestingWithLdap()
			&& !$this->isLocalAdminGroup($group)
		) {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null && OcisHelper::isTestingWithGraphApi()) {
			$method = "graph";
		} elseif ($method === null) {
			$method = "api";
		}
		$method = \trim(\strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::addUserToGroup(
					$this->getBaseUrl(),
					$user,
					$group,
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					$this->getStepLineRef(),
					$this->ocsApiVersion
				);
				if ($checkResult && ($result->getStatusCode() !== 200)) {
					throw new Exception(
						"could not add user to group. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				$this->response = $result;
				if (!$checkResult) {
					// for when step only
					$this->pushToLastStatusCodesArrays();
				}
				break;
			case "occ":
				$result = SetupHelper::addUserToGroup(
					$group,
					$user,
					$this->getStepLineRef()
				);
				if ($checkResult && ($result["code"] !== "0")) {
					throw new Exception(
						"could not add user to group. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "ldap":
				try {
					$this->addUserToLdapGroup(
						$user,
						$group
					);
				} catch (LdapException $exception) {
					throw new Exception(
						"User " . $user . " cannot be added to " . $group . " . Error: {$exception}"
					);
				};
				break;
			case "graph":
				$this->graphContext->adminHasAddedUserToGroupUsingTheGraphApi(
					$user,
					$group
				);
				break;
			default:
				throw new InvalidArgumentException(
					"Invalid method to add a user to a group"
				);
		}
	}

	/**
	 * @Given the administrator has been added to group :group
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasBeenAddedToGroup(string $group):void {
		$admin = $this->getAdminUsername();
		$this->addUserToGroup($admin, $group, null, true);
	}

	/**
	 * @param string $group
	 * @param bool $shouldExist - true if the group should exist
	 * @param bool $possibleToDelete - true if it is possible to delete the group
	 * @param string|null $id - id of the group, only required for the groups created using the Graph API
	 *
	 * @return void
	 */
	public function addGroupToCreatedGroupsList(
		string $group,
		bool $shouldExist = true,
		bool $possibleToDelete = true,
		?string $id = null
	):void {
		$groupData = [
			"shouldExist" => $shouldExist,
			"possibleToDelete" => $possibleToDelete
		];
		if ($id !== null) {
			$groupData["id"] = $id;
		}

		if ($this->currentServer === 'LOCAL') {
			$this->createdGroups[$group] = $groupData;
		} elseif ($this->currentServer === 'REMOTE') {
			$this->createdRemoteGroups[$group] = $groupData;
		}
	}

	/**
	 * Remembers that a group from the list of groups that were created during
	 * test runs is no longer expected to exist. Useful if a group was created
	 * during the setup phase but was deleted in a test run. We don't expect
	 * this group to exist in the tear-down phase, so remember that fact.
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function rememberThatGroupIsNotExpectedToExist(string $group):void {
		if (\array_key_exists($group, $this->createdGroups)) {
			$this->createdGroups[$group]['shouldExist'] = false;
		}
	}

	/**
	 * @When /^the administrator creates group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminCreatesGroupUsingTheProvisioningApi(string $group):void {
		if (!$this->groupExists($group)) {
			$this->createTheGroup($group, 'api');
		}
		$this->groupShouldExist($group);
	}

	/**
	 * @Given /^group "([^"]*)" has been created$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function groupHasBeenCreated(string $group):void {
		$this->createTheGroup($group);
		$this->groupShouldExist($group);
	}

	/**
	 * @Given /^group "([^"]*)" has been created in the database user backend$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function groupHasBeenCreatedOnDatabaseBackend(string $group):void {
		$this->adminCreatesGroupUsingTheProvisioningApi($group);
	}

	/**
	 * @Given these groups have been created:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theseGroupsHaveBeenCreated(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ['groupname'], ['comment']);
		foreach ($table as $row) {
			$this->createTheGroup($row['groupname']);
		}
	}

	/**
	 * @When /^the administrator sends a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 * @param string|null $user
	 *
	 * @return void
	 */
	public function adminSendsGroupCreationRequestUsingTheProvisioningApi(
		string $group,
		?string $user = null
	):void {
		$bodyTable = new TableNode([['groupid', $group]]);
		$user = $user === null ? $this->getAdminUsername() : $user;
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"POST",
			"/cloud/groups",
			$bodyTable
		);
		$this->pushToLastStatusCodesArrays();
		$this->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @When the administrator sends a group creation request for the following groups using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorSendsAGroupCreationRequestForTheFollowingGroupUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["groupname"], ["comment"]);
		$groups = $table->getHash();
		foreach ($groups as $group) {
			$this->adminSendsGroupCreationRequestUsingTheProvisioningApi($group["groupname"]);
		}
	}

	/**
	 * @When /^the administrator tries to send a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminTriesToSendGroupCreationRequestUsingTheAPI(string $group):void {
		$this->adminSendsGroupCreationRequestUsingTheProvisioningApi($group);
		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @When /^user "([^"]*)" tries to send a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToSendGroupCreationRequestUsingTheAPI(string $user, string $group):void {
		$this->adminSendsGroupCreationRequestUsingTheProvisioningApi($group, $user);
		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * creates a single group
	 *
	 * @param string $group
	 * @param string|null $method how to create the group api|occ
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTheGroup(string $group, ?string $method = null):void {
		//guess yourself
		if ($method === null) {
			if ($this->isTestingWithLdap()) {
				$method = "ldap";
			} elseif (OcisHelper::isTestingWithGraphApi()) {
				$method = "graph";
			} else {
				$method = "api";
			}
		}
		$group = \trim($group);
		$method = \trim(\strtolower($method));
		$groupCanBeDeleted = false;
		$groupId = null;
		switch ($method) {
			case "api":
				$result = UserHelper::createGroup(
					$this->getBaseUrl(),
					$group,
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					$this->getStepLineRef()
				);
				if ($result->getStatusCode() === 200) {
					$groupCanBeDeleted = true;
				} else {
					throw new Exception(
						"could not create group '$group'. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				break;
			case "occ":
				$result = SetupHelper::createGroup(
					$group,
					$this->getStepLineRef()
				);
				if ($result["code"] == 0) {
					$groupCanBeDeleted = true;
				} else {
					throw new Exception(
						"could not create group '$group'. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "ldap":
				try {
					$this->createLdapGroup($group);
				} catch (LdapException $e) {
					throw new Exception(
						"could not create group '$group'. Error: {$e}"
					);
				}
				break;
			case "graph":
				$newGroup = $this->graphContext->adminHasCreatedGroupUsingTheGraphApi($group);
				$groupCanBeDeleted = true;
				$groupId = $newGroup["id"];
				break;
			default:
				throw new InvalidArgumentException(
					"Invalid method to create group '$group'"
				);
		}

		$this->addGroupToCreatedGroupsList($group, true, $groupCanBeDeleted, $groupId);
	}

	/**
	 * @param string $attribute
	 * @param string $entry
	 * @param string $value
	 * @param bool $append
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setTheLdapAttributeOfTheEntryTo(
		string $attribute,
		string $entry,
		string $value,
		bool $append = false
	):void {
		$ldapEntry = $this->ldap->getEntry($entry . "," . $this->ldapBaseDN);
		Laminas\Ldap\Attribute::setAttribute($ldapEntry, $attribute, $value, $append);
		$this->ldap->update($entry . "," . $this->ldapBaseDN, $ldapEntry);
		$this->theLdapUsersHaveBeenReSynced();
	}

	/**
	 * @param string $user
	 * @param string $group
	 * @param string|null $ou
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addUserToLdapGroup(string $user, string $group, ?string $ou = null):void {
		if ($ou === null) {
			$ou = $this->getLdapGroupsOU();
		}
		$memberAttr = "";
		$memberValue = "";
		if ($this->ldapGroupSchema == "rfc2307") {
			$memberAttr = "memberUID";
			$memberValue = "$user";
		} else {
			$memberAttr = "member";
			$userbase = "ou=" . $this->getLdapUsersOU() . "," . $this->ldapBaseDN;
			$memberValue = "uid=$user" . "," . "$userbase";
		}
		$this->setTheLdapAttributeOfTheEntryTo(
			$memberAttr,
			"cn=$group,ou=$ou",
			$memberValue,
			true
		);
	}

	/**
	 * @param string $value
	 * @param string $attribute
	 * @param string $entry
	 *
	 * @return void
	 */
	public function deleteValueFromLdapAttribute(string $value, string $attribute, string $entry):void {
		$this->ldap->deleteAttributes(
			$entry . "," . $this->ldapBaseDN,
			[$attribute => [$value]]
		);
	}

	/**
	 * @param string $user
	 * @param string $group
	 * @param string|null $ou
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeUserFromLdapGroup(string $user, string $group, ?string $ou = null):void {
		if ($ou === null) {
			$ou = $this->getLdapGroupsOU();
		}
		$memberAttr = "";
		$memberValue = "";
		if ($this->ldapGroupSchema == "rfc2307") {
			$memberAttr = "memberUID";
			$memberValue = "$user";
		} else {
			$memberAttr = "member";
			$userbase = "ou=" . $this->getLdapUsersOU() . "," . $this->ldapBaseDN;
			$memberValue = "uid=$user" . "," . "$userbase";
		}
		$this->deleteValueFromLdapAttribute(
			$memberValue,
			$memberAttr,
			"cn=$group,ou=$ou"
		);
		$this->theLdapUsersHaveBeenReSynced();
	}

	/**
	 * @param string $entry
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteTheLdapEntry(string $entry):void {
		$this->ldap->delete($entry . "," . $this->ldapBaseDN);
		$this->theLdapUsersHaveBeenReSynced();
	}

	/**
	 * @param string $group
	 * @param string|null $ou
	 *
	 * @return void
	 * @throws LdapException
	 * @throws Exception
	 */
	public function deleteLdapGroup(string $group, ?string $ou = null):void {
		if ($ou === null) {
			$ou = $this->getLdapGroupsOU();
		}
		$this->deleteTheLdapEntry("cn=$group,ou=$ou");
		$this->theLdapUsersHaveBeenReSynced();
		$key = \array_search($group, $this->ldapCreatedGroups);
		if ($key !== false) {
			unset($this->ldapCreatedGroups[$key]);
		}
		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @param string|null $username
	 * @param string|null $ou
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteLdapUser(?string $username, ?string $ou = null):void {
		if (!\in_array($username, $this->ldapCreatedUsers)) {
			throw new Error(
				"User " . $username . " was not created using Ldap and does not exist as an Ldap User"
			);
		}
		if ($ou === null) {
			$ou = $this->getLdapUsersOU();
		}
		$entry = "uid=$username,ou=$ou";
		$this->deleteTheLdapEntry($entry);
		$key = \array_search($username, $this->ldapCreatedUsers);
		if ($key !== false) {
			unset($this->ldapCreatedUsers[$key]);
		}
		$this->rememberThatUserIsNotExpectedToExist($username);
	}

	/**
	 * @param string|null $user
	 * @param string|null $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editLdapUserDisplayName(?string $user, ?string $displayName):void {
		$entry = "uid=" . $user . ",ou=" . $this->getLdapUsersOU();
		$this->setTheLdapAttributeOfTheEntryTo(
			'displayname',
			$entry,
			$displayName
		);
		$this->theLdapUsersHaveBeenReSynced();
	}

	/**
	 * @When /^the administrator disables user "([^"]*)" using the provisioning API$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 */
	public function adminDisablesUserUsingTheProvisioningApi(?string $user):void {
		$user = $this->getActualUsername($user);
		$this->disableOrEnableUser($this->getAdminUsername(), $user, 'disable');
	}

	/**
	 * @When the administrator disables the following users using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDisablesTheFollowingUsersUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->adminDisablesUserUsingTheProvisioningApi($username["username"]);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has been disabled$/
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasDisabledUserUsingTheProvisioningApi(?string $user):void {
		$user = $this->getActualUsername($user);
		$this->disableOrEnableUser($this->getAdminUsername(), $user, 'disable');
		$this->theHTTPStatusCodeShouldBeSuccess();
		$this->ocsContext->assertOCSResponseIndicatesSuccess();
	}

	/**
	 * @Given the following users have been disabled
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersHaveBeenDisabled(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->adminHasDisabledUserUsingTheProvisioningApi($username["username"]);
		}
	}

	/**
	 * @When user :user disables user :otherUser using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 *
	 * @return void
	 */
	public function userDisablesUserUsingTheProvisioningApi(string $user, string $otherUser):void {
		$user = $this->getActualUsername($user);
		$actualOtherUser = $this->getActualUsername($otherUser);
		$this->disableOrEnableUser($user, $actualOtherUser, 'disable');
	}

	/**
	 * @When the administrator enables user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorEnablesUserUsingTheProvisioningApi(string $user):void {
		$this->disableOrEnableUser($this->getAdminUsername(), $user, 'enable');
	}

	/**
	 * @When the administrator enables the following users using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEnablesTheFollowingUsersUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->theAdministratorEnablesUserUsingTheProvisioningApi($username["username"]);
		}
	}

	/**
	 * @When /^user "([^"]*)" enables user "([^"]*)" using the provisioning API$/
	 * @When /^user "([^"]*)" tries to enable user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $otherUser
	 *
	 * @return void
	 */
	public function userTriesToEnableUserUsingTheProvisioningApi(
		string $user,
		string $otherUser
	):void {
		$this->disableOrEnableUser($user, $otherUser, 'enable');
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteTheUserUsingTheProvisioningApi(string $user):void {
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		// Always try to delete the user
		if (OcisHelper::isTestingWithGraphApi()) {
			// users can be deleted using the username in the GraphApi too
			$this->graphContext->adminDeletesUserUsingTheGraphApi($user);
		} else {
			$this->response = UserHelper::deleteUser(
				$this->getBaseUrl(),
				$user,
				$this->getAdminUsername(),
				$this->getAdminPassword(),
				$this->getStepLineRef(),
				$this->ocsApiVersion
			);
		}
		$this->pushToLastStatusCodesArrays();

		// Only log a message if the test really expected the user to have been
		// successfully created (i.e. the delete is expected to work) and
		// there was a problem deleting the user. Because in this case there
		// might be an effect on later tests.
		if ($this->theUserShouldExist($user)
			&& (!\in_array($this->response->getStatusCode(), [200, 204]))
		) {
			\error_log(
				"INFORMATION: could not delete user '$user' "
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}

		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @param string $group group name
	 *
	 * @return void
	 * @throws Exception
	 * @throws LdapException
	 */
	public function deleteGroup(string $group):void {
		if ($this->groupExists($group)) {
			if ($this->isTestingWithLdap() && \in_array($group, $this->ldapCreatedGroups)) {
				$this->deleteLdapGroup($group);
			} else {
				$this->deleteTheGroupUsingTheProvisioningApi($group);
			}
		}
	}

	/**
	 * @Given /^group "([^"]*)" has been deleted$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function groupHasBeenDeleted(string $group):void {
		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->adminHasDeletedGroupUsingTheGraphApi($group);
		} else {
			$this->deleteGroup($group);
		}
		$this->groupShouldNotExist($group);
	}

	/**
	 * @When /^the administrator deletes group "([^"]*)" from the default user backend$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminDeletesGroup(string $group):void {
		$this->deleteGroup($group);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^the administrator deletes group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteTheGroupUsingTheProvisioningApi(string $group):void {
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		$this->response = UserHelper::deleteGroup(
			$this->getBaseUrl(),
			$group,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
		$this->pushToLastStatusCodesArrays();
		if ($this->theGroupShouldExist($group)
			&& $this->theGroupShouldBeAbleToBeDeleted($group)
			&& ($this->response->getStatusCode() !== 200)
		) {
			\error_log(
				"INFORMATION: could not delete group '$group'"
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}

		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @When the administrator deletes the following groups using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesTheFollowingGroupsUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["groupname"]);
		$groups = $table->getHash();
		foreach ($groups as $group) {
			$this->deleteTheGroupUsingTheProvisioningApi($group["groupname"]);
		}
	}

	/**
	 * @When user :user tries to delete group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userTriesToDeleteGroupUsingTheProvisioningApi(string $user, string $group):void {
		$this->response = UserHelper::deleteGroup(
			$this->getBaseUrl(),
			$group,
			$this->getActualUsername($user),
			$this->getActualPassword($user),
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
	}

	/**
	 * @param string $group
	 *
	 * @return bool
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function groupExists(string $group):bool {
		if ($this->isTestingWithLdap() && OcisHelper::isTestingOnOcisOrReva()) {
			$baseDN = $this->getLdapBaseDN();
			$newDN = 'cn=' . $group . ',ou=' . $this->ldapGroupsOU . ',' . $baseDN;
			if ($this->ldap->getEntry($newDN) !== null) {
				return true;
			}
			return false;
		}
		if (OcisHelper::isTestingWithGraphApi()) {
			$base = '/graph/v1.0';
			$group = $this->getAttributeOfCreatedGroup($group, "id");
		} else {
			$base = '/ocs/v2.php/cloud';
		}
		$group = \rawurlencode($group);
		$fullUrl = $this->getBaseUrl() . "$base/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		if ($this->response->getStatusCode() >= 400) {
			return false;
		}
		return true;
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeUserFromGroupAsAdminUsingTheProvisioningApi(string $user, string $group):void {
		$this->userRemovesUserFromGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$user,
			$group
		);
	}

	/**
	 * @When the administrator removes user :user from group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminRemovesUserFromGroupUsingTheProvisioningApi(string $user, string $group):void {
		$user = $this->getActualUsername($user);
		$this->removeUserFromGroupAsAdminUsingTheProvisioningApi(
			$user,
			$group
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When the administrator removes the following users from the following groups using the provisioning API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRemovesTheFollowingUserFromTheFollowingGroupUsingTheProvisioningApi(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ['username', 'groupname']);
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		foreach ($table as $row) {
			$this->adminRemovesUserFromGroupUsingTheProvisioningApi($row['username'], $row['groupname']);
			$this->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @Given user :user has been removed from group :group
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasRemovedUserFromGroup(string $user, string $group):void {
		if ($this->isTestingWithLdap()
			&& !$this->isLocalAdminGroup($group)
			&& \in_array($group, $this->ldapCreatedGroups)
		) {
			$this->removeUserFromLdapGroup($user, $group);
		} elseif (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext->adminHasRemovedUserFromGroupUsingTheGraphApi($user, $group);
		} else {
			$this->removeUserFromGroupAsAdminUsingTheProvisioningApi(
				$user,
				$group
			);
		}
		$this->userShouldNotBelongToGroup($user, $group);
	}

	/**
	 * @When user :user removes user :otherUser from group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRemovesUserFromGroupUsingTheProvisioningApi(
		string $user,
		string $otherUser,
		string $group
	):void {
		$this->userTriesToRemoveUserFromGroupUsingTheProvisioningApi(
			$user,
			$otherUser,
			$group
		);

		if ($this->response->getStatusCode() !== 200) {
			\error_log(
				"INFORMATION: could not remove user '$user' from group '$group'"
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}
	}

	/**
	 * @When user :user tries to remove user :otherUser from group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToRemoveUserFromGroupUsingTheProvisioningApi(
		string $user,
		string $otherUser,
		string $group
	):void {
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$actualOtherUser = $this->getActualUsername($otherUser);
		$this->response = UserHelper::removeUserFromGroup(
			$this->getBaseUrl(),
			$actualOtherUser,
			$group,
			$actualUser,
			$actualPassword,
			$this->getStepLineRef(),
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^the administrator makes user "([^"]*)" a subadmin of group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminMakesUserSubadminOfGroupUsingTheProvisioningApi(
		string $user,
		string $group
	):void {
		$user = $this->getActualUsername($user);
		$this->userMakesUserASubadminOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$user,
			$group
		);
	}

	/**
	 * @When user :user makes user :otherUser a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userMakesUserASubadminOfGroupUsingTheProvisioningApi(
		string $user,
		string $otherUser,
		string $group
	):void {
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$actualSubadminUsername = $this->getActualUsername($otherUser);

		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$actualSubadminUsername/subadmins";
		$body = ['groupid' => $group];
		$this->response = HttpRequestHelper::post(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword,
			null,
			$body
		);
	}

	/**
	 * @When the administrator gets all the groups where user :user is subadmin using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheGroupsWhereUserIsSubadminUsingTheProvisioningApi(string $user):void {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @When /^user "([^"]*)" gets all the groups where user "([^"]*)" is subadmin using the provisioning API$/
	 * @When /^user "([^"]*)" tries to get all the groups where user "([^"]*)" is subadmin using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $otherUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToGetAllTheGroupsWhereUserIsSubadminUsingTheProvisioningApi(string $user, string $otherUser):void {
		$actualOtherUser = $this->getActualUsername($otherUser);
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$actualOtherUser/subadmins";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
	}

	/**
	 * @Given /^user "([^"]*)" has been made a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userHasBeenMadeSubadminOfGroup(
		string $user,
		string $group
	):void {
		$this->adminMakesUserSubadminOfGroupUsingTheProvisioningApi(
			$user,
			$group
		);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @When the administrator gets all the subadmins of group :group using the provisioning API
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi(string $group):void {
		$this->userGetsAllTheSubadminsOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$group
		);
	}

	/**
	 * @When user :user gets all the subadmins of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsAllTheSubadminsOfGroupUsingTheProvisioningApi(string $user, string $group):void {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/groups/$group/subadmins";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
	}

	/**
	 * @When the administrator removes user :user from being a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
		string $user,
		string $group
	):void {
		$this->userRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$user,
			$group
		);
	}

	/**
	 * @When user :user removes user :otherUser from being a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
		string $user,
		string $otherUser,
		string $group
	):void {
		$actualOtherUser = $this->getActualUsername($otherUser);
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$actualOtherUser/subadmins";
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getUserPassword($actualUser);
		$this->response = HttpRequestHelper::delete(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword,
			null,
			['groupid' => $group]
		);
	}

	/**
	 * @Then /^the users returned by the API should be$/
	 *
	 * @param TableNode $usersList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUsersShouldBe(TableNode $usersList):void {
		$this->verifyTableNodeColumnsCount($usersList, 1);
		$users = $usersList->getRows();
		$usersSimplified = \array_map(
			function ($user) {
				return $this->getActualUsername($user);
			},
			$this->simplifyArray($users)
		);
		$respondedArray = $this->getArrayOfUsersResponded($this->response);
		Assert::assertEqualsCanonicalizing(
			$usersSimplified,
			$respondedArray
		);
	}

	/**
	 * @Then /^the users returned by the API should include$/
	 *
	 * @param TableNode $usersList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUsersShouldInclude(TableNode $usersList):void {
		$this->verifyTableNodeColumnsCount($usersList, 1);
		$users = $usersList->getRows();
		$usersSimplified = \array_map(
			function ($user) {
				return $this->getActualUsername($user);
			},
			$this->simplifyArray($users)
		);
		$respondedArray = $this->getArrayOfUsersResponded($this->response);
		foreach ($usersSimplified as $userElement) {
			Assert::assertContains(
				$userElement,
				$respondedArray,
				__METHOD__
				. " user $userElement is not present in the users list: \n"
				. \join("\n", $respondedArray)
			);
		}
	}

	/**
	 * @Then /^the groups returned by the API should be$/
	 *
	 * @param TableNode $groupsList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theGroupsShouldBe(TableNode $groupsList):void {
		$this->verifyTableNodeColumnsCount($groupsList, 1);
		$groups = $groupsList->getRows();
		$groupsSimplified = $this->simplifyArray($groups);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		Assert::assertEqualsCanonicalizing(
			$groupsSimplified,
			$respondedArray
		);
	}

	/**
	 * @Then /^the extra groups returned by the API should be$/
	 *
	 * @param TableNode $groupsList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theExtraGroupsShouldBe(TableNode $groupsList):void {
		$this->verifyTableNodeColumnsCount($groupsList, 1);
		$groups = $groupsList->getRows();
		$groupsSimplified = $this->simplifyArray($groups);
		$expectedGroups = \array_merge($this->startingGroups, $groupsSimplified);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		\asort($expectedGroups);
		\asort($respondedArray);
		Assert::assertEqualsCanonicalizing(
			$expectedGroups,
			$respondedArray
		);
	}

	/**
	 * @Then /^the groups returned by the API should include "([^"]*)"$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theGroupsReturnedByTheApiShouldInclude(string $group):void {
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		Assert::assertContains($group, $respondedArray);
	}

	/**
	 * @Then /^the groups returned by the API should not include "([^"]*)"$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theGroupsReturnedByTheApiShouldNotInclude(string $group):void {
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		Assert::assertNotContains($group, $respondedArray);
	}

	/**
	 * @Then /^the users returned by the API should not include "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theUsersReturnedByTheApiShouldNotInclude(string $user):void {
		$respondedArray = $this->getArrayOfUsersResponded($this->response);
		Assert::assertNotContains($user, $respondedArray);
	}

	/**
	 * @param TableNode|null $groupsOrUsersList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkSubadminGroupsOrUsersTable(?TableNode $groupsOrUsersList):void {
		$this->verifyTableNodeColumnsCount($groupsOrUsersList, 1);
		$tableRows = $groupsOrUsersList->getRows();
		$simplifiedTableRows = $this->simplifyArray($tableRows);
		$respondedArray = $this->getArrayOfSubadminsResponded($this->response);
		Assert::assertEqualsCanonicalizing(
			$simplifiedTableRows,
			$respondedArray
		);
	}

	/**
	 * @Then /^the subadmin groups returned by the API should be$/
	 *
	 * @param TableNode|null $groupsList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSubadminGroupsShouldBe(?TableNode $groupsList):void {
		$this->checkSubadminGroupsOrUsersTable($groupsList);
	}

	/**
	 * @Then /^the subadmin users returned by the API should be$/
	 *
	 * @param TableNode|null $usersList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSubadminUsersShouldBe(?TableNode $usersList):void {
		$this->checkSubadminGroupsOrUsersTable($usersList);
	}

	/**
	 * @Then /^the apps returned by the API should include$/
	 *
	 * @param TableNode|null $appList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAppsShouldInclude(?TableNode $appList):void {
		$this->verifyTableNodeColumnsCount($appList, 1);
		$apps = $appList->getRows();
		$appsSimplified = $this->simplifyArray($apps);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		foreach ($appsSimplified as $app) {
			Assert::assertContains(
				$app,
				$respondedArray,
				"The apps returned by the API should include $app but $app was not included"
			);
		}
	}

	/**
	 * @Then /^the apps returned by the API should not include$/
	 *
	 * @param TableNode|null $appList
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAppsShouldNotInclude(?TableNode $appList):void {
		$this->verifyTableNodeColumnsCount($appList, 1);
		$apps = $appList->getRows();
		$appsSimplified = $this->simplifyArray($apps);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		foreach ($appsSimplified as $app) {
			Assert::assertNotContains(
				$app,
				$respondedArray,
				"The apps returned by the API should not include $app but $app was included"
			);
		}
	}

	/**
	 * @Then /^app "([^"]*)" should not be in the apps list$/
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function appShouldNotBeInTheAppsList(string $appName):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		Assert::assertNotContains($appName, $respondedArray);
	}

	/**
	 * @Then /^user "([^"]*)" should be a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeASubadminOfGroup(string $user, string $group):void {
		$this->theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($group);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		Assert::assertContains(
			$user,
			$listOfSubadmins
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not be a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldNotBeASubadminOfGroup(string $user, string $group):void {
		$this->theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($group);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		Assert::assertNotContains(
			$user,
			$listOfSubadmins
		);
	}

	/**
	 * @Then /^the display name returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedDisplayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDisplayNameReturnedByTheApiShouldBe(string $expectedDisplayName):void {
		$responseDisplayName = (string) $this->getResponseXml(null, __METHOD__)->data[0]->displayname;
		Assert::assertEquals(
			$expectedDisplayName,
			$responseDisplayName
		);
	}

	/**
	 * @Then /^the display name of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDisplayNameOfUserShouldBe(string $user, string $displayname):void {
		$actualUser = $this->getActualUsername($user);
		$this->retrieveUserInformationAsAdminUsingProvisioningApi($actualUser);
		$this->theDisplayNameReturnedByTheApiShouldBe($displayname);
	}

	/**
	 * @Then the display name of the following users should be
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDisplayNameOfTheFollowingUsersShouldBe(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["name", "display-name"]);
		$users = $table->getHash();
		foreach ($users as $user) {
			$this->theDisplayNameOfUserShouldBe($user["name"], $user["display-name"]);
		}
	}

	/**
	 * @Then /^the display name of user "([^"]*)" should not have changed$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDisplayNameOfUserShouldNotHaveChanged(string $user):void {
		$actualUser = $this->getActualUsername($user);
		$expectedDisplayName = $this->getDisplayNameForUser($user);
		$this->retrieveUserInformationAsAdminUsingProvisioningApi($actualUser);
		$this->theDisplayNameReturnedByTheApiShouldBe($expectedDisplayName);
	}

	/**
	 * @Then /^the email address returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedEmailAddress
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theEmailAddressReturnedByTheApiShouldBe(string $expectedEmailAddress):void {
		$responseEmailAddress = (string) $this->getResponseXml(null, __METHOD__)->data[0]->email;
		Assert::assertEquals(
			$expectedEmailAddress,
			$responseEmailAddress
		);
	}

	/**
	 * @Then /^the email address of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $expectedEmailAddress
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theEmailAddressOfUserShouldBe(string $user, string $expectedEmailAddress):void {
		$user = $this->getActualUsername($user);
		$this->retrieveUserInformationAsAdminUsingProvisioningApi($user);
		$this->theEmailAddressReturnedByTheApiShouldBe($expectedEmailAddress);
	}

	/**
	 * @Then /^the email address of user "([^"]*)" should not have changed$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theEmailAddressOfUserShouldNotHaveChanged(string $user):void {
		$user = $this->getActualUsername($user);
		$expectedEmailAddress = $this->getEmailAddressForUser($user);
		$this->retrieveUserInformationAsAdminUsingProvisioningApi($user);
		$this->theEmailAddressReturnedByTheApiShouldBe($expectedEmailAddress);
	}

	/**
	 * @Then /^the free, used, total and relative quota returned by the API should exist and be valid numbers$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theQuotaFieldsReturnedByTheApiShouldBValid():void {
		$quotaData = $this->getResponseXml(null, __METHOD__)->data[0]->quota;
		$missingQuotaDataString = "";
		if (!isset($quotaData->free)) {
			$missingQuotaDataString .= "free ";
		}
		if (!isset($quotaData->used)) {
			$missingQuotaDataString .= "used ";
		}
		if (!isset($quotaData->total)) {
			$missingQuotaDataString .= "total ";
		}
		if (!isset($quotaData->relative)) {
			$missingQuotaDataString .= "relative ";
		}
		Assert::assertSame(
			"",
			$missingQuotaDataString,
			"These quota data items are missing: $missingQuotaDataString"
		);
		$freeQuota = (string) $quotaData->free;
		Assert::assertIsNumeric($freeQuota, "free quota '$freeQuota' is not numeric");
		$usedQuota = (string) $quotaData->used;
		Assert::assertIsNumeric($usedQuota, "used quota '$usedQuota' is not numeric");
		$totalQuota = (string) $quotaData->total;
		Assert::assertIsNumeric($totalQuota, "total quota '$totalQuota' is not numeric");
		$relativeQuota = (string) $quotaData->relative;
		Assert::assertIsNumeric($relativeQuota, "free quota '$relativeQuota' is not numeric");
		Assert::assertSame(
			(int) $freeQuota + (int) $usedQuota,
			(int) $totalQuota,
			"free $freeQuota plus used $usedQuota quota is not equal to total quota $totalQuota"
		);
	}

	/**
	 * @Then /^the quota definition returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedQuotaDefinition a string that describes the quota
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theQuotaDefinitionReturnedByTheApiShouldBe(string $expectedQuotaDefinition):void {
		$responseQuotaDefinition = (string) $this->getResponseXml(null, __METHOD__)->data[0]->quota->definition;
		Assert::assertEquals(
			$expectedQuotaDefinition,
			$responseQuotaDefinition
		);
	}

	/**
	 * @Then /^the quota definition of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $expectedQuotaDefinition
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theQuotaDefinitionOfUserShouldBe(string $user, string $expectedQuotaDefinition):void {
		$this->retrieveUserInformationAsAdminUsingProvisioningApi($user);
		$this->theQuotaDefinitionReturnedByTheApiShouldBe($expectedQuotaDefinition);
	}

	/**
	 * @Then /^the last login returned by the API should be a current Unix timestamp$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastLoginReturnedByTheApiShouldBe():void {
		$responseLastLogin = (string) $this->getResponseXml(null, __METHOD__)->data[0]->last_login;
		Assert::assertIsNumeric($responseLastLogin);
		Assert::assertGreaterThan($this->scenarioStartTime, (int) $responseLastLogin);
	}

	/**
	 * Parses the xml answer to get the array of users returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayOfUsersResponded(ResponseInterface $resp):array {
		$listCheckedElements
			= $this->getResponseXml($resp, __METHOD__)->data[0]->users[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), true);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of groups returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayOfGroupsResponded(ResponseInterface $resp):array {
		$listCheckedElements
			= $this->getResponseXml($resp, __METHOD__)->data[0]->groups[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), true);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of apps returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayOfAppsResponded(ResponseInterface $resp):array {
		$listCheckedElements
			= $this->getResponseXml($resp, __METHOD__)->data[0]->apps[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), true);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of subadmins returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayOfSubadminsResponded(ResponseInterface $resp):array {
		$listCheckedElements
			= $this->getResponseXml($resp, __METHOD__)->data[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), true);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of app info returned for an app.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayOfAppInfoResponded(ResponseInterface $resp):array {
		$listCheckedElements
			= $this->getResponseXml($resp, __METHOD__)->data[0];
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), true);
		return $extractedElementsArray;
	}

	/**
	 * @Then /^app "([^"]*)" should be disabled$/
	 *
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appShouldBeDisabled(string $app):void {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v2.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		Assert::assertContains($app, $respondedArray);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^app "([^"]*)" should be enabled$/
	 *
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function appShouldBeEnabled(string $app):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps?filter=enabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		Assert::assertContains($app, $respondedArray);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^the information for app "([^"]*)" should have a valid version$/
	 *
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theInformationForAppShouldHaveAValidVersion(string $app):void {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps/$app";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
		$respondedArray = $this->getArrayOfAppInfoResponded($this->response);
		Assert::assertArrayHasKey(
			'version',
			$respondedArray,
			"app info returned for $app app does not have a version"
		);
		$appVersion = $respondedArray['version'];
		Assert::assertTrue(
			\substr_count($appVersion, '.') > 1,
			"app version '$appVersion' returned in app info is not a valid version string"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be disabled$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeDisabled(string $user):void {
		$user = $this->getActualUsername($user);
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		Assert::assertEquals(
			"false",
			$this->getResponseXml(null, __METHOD__)->data[0]->enabled
		);
	}

	/**
	 * @Then the following users should be disabled
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersShouldBeDisabled(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->userShouldBeDisabled($username["username"]);
		}
	}

	/**
	 * @Then /^user "([^"]*)" should be enabled$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeEnabled(string $user):void {
		$user = $this->getActualUsername($user);
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		Assert::assertEquals(
			"true",
			$this->getResponseXml(null, __METHOD__)->data[0]->enabled
		);
	}

	/**
	 * @Then the following users should be enabled
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersShouldBeEnabled(TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$this->userShouldBeEnabled($username["username"]);
		}
	}

	/**
	 * @When the administrator sets the quota of user :user to :quota using the provisioning API
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminSetsUserQuotaToUsingTheProvisioningApi(string $user, string $quota):void {
		$user = $this->getActualUsername($user);
		$body
			= [
			'key' => 'quota',
			'value' => $quota,
		];

		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			"PUT",
			"/cloud/users/$user",
			$this->getStepLineRef(),
			$body,
			2
		);
	}

	/**
	 * @Given the quota of user :user has been set to :quota
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function theQuotaOfUserHasBeenSetTo(string $user, string $quota):void {
		$this->adminSetsUserQuotaToUsingTheProvisioningApi($user, $quota);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @When the administrator gives unlimited quota to user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminGivesUnlimitedQuotaToUserUsingTheProvisioningApi(string $user):void {
		$this->adminSetsUserQuotaToUsingTheProvisioningApi($user, 'none');
	}

	/**
	 * @Given user :user has been given unlimited quota
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasBeenGivenUnlimitedQuota(string $user):void {
		$this->theQuotaOfUserHasBeenSetTo($user, 'none');
	}

	/**
	 * Returns home path of the given user
	 *
	 * @param string $user
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getUserHome(string $user):string {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		return $this->getResponseXml(null, __METHOD__)->data[0]->home;
	}

	/**
	 * @Then /^the user attributes returned by the API should include$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkUserAttributes(?TableNode $body):void {
		$this->verifyTableNodeRows($body, [], $this->userResponseFields);
		$bodyRows = $body->getRowsHash();
		foreach ($bodyRows as $field => $value) {
			$data = $this->getResponseXml(null, __METHOD__)->data[0];
			$field_array = \explode(' ', $field);
			foreach ($field_array as $field_name) {
				$data = $data->$field_name;
			}
			if ($data != $value) {
				Assert::fail(
					"$field has value $data"
				);
			}
		}
	}

	/**
	 * @Then the attributes of user :user returned by the API should include
	 *
	 * @param string $user
	 * @param TableNode $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkAttributesForUser(string $user, TableNode $body):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($body, 2);
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"GET",
			"/cloud/users/$user",
			null
		);
		$this->checkUserAttributes($body);
	}

	/**
	 * @Then /^the API should not return any data$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theApiShouldNotReturnAnyData():void {
		$responseData = $this->getResponseXml(null, __METHOD__)->data[0];
		Assert::assertEmpty(
			$responseData,
			"Response data is not empty but it should be empty"
		);
	}

	/**
	 * @Then /^the list of users returned by the API should be empty$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theListOfUsersReturnedByTheApiShouldBeEmpty():void {
		$usersList = $this->getResponseXml(null, __METHOD__)->data[0]->users[0];
		Assert::assertEmpty(
			$usersList,
			"Users list is not empty but it should be empty"
		);
	}

	/**
	 * @Then /^the list of groups returned by the API should be empty$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theListOfGroupsReturnedByTheApiShouldBeEmpty():void {
		$groupsList = $this->getResponseXml(null, __METHOD__)->data[0]->groups[0];
		Assert::assertEmpty(
			$groupsList,
			"Groups list is not empty but it should be empty"
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function afterScenario():void {
		$this->waitForDavRequestsToFinish();
		$this->restoreParametersAfterScenario();

		if (OcisHelper::isTestingOnOcisOrReva() && $this->someUsersHaveBeenCreated()) {
			foreach ($this->getCreatedUsers() as $user) {
				OcisHelper::deleteRevaUserData($user["actualUsername"]);
			}
		} elseif (OcisHelper::isTestingOnOc10()) {
			$this->resetAdminUserAttributes();
		}
		if ($this->isTestingWithLdap()) {
			$this->deleteLdapUsersAndGroups();
		}
		$this->cleanupDatabaseUsers();
		$this->cleanupDatabaseGroups();
	}

	/**
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetAdminUserAttributes():void {
		if ($this->adminDisplayName !== '') {
			$this->adminChangesTheDisplayNameOfUserUsingTheProvisioningApi(
				$this->getAdminUsername(),
				''
			);
		}
		if ($this->adminEmailAddress !== '') {
			$this->adminChangesTheEmailOfUserToUsingTheProvisioningApi(
				$this->getAdminUsername(),
				''
			);
		}
	}

	/**
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cleanupDatabaseUsers():void {
		$this->authContext->deleteTokenAuthEnforcedAfterScenario();
		$previousServer = $this->currentServer;
		$this->usingServer('LOCAL');
		foreach ($this->createdUsers as $user => $userData) {
			$this->deleteUser($userData['actualUsername']);
		}
		$this->usingServer('REMOTE');
		foreach ($this->createdRemoteUsers as $remoteUser => $userData) {
			$this->deleteUser($userData['actualUsername']);
		}
		$this->usingServer($previousServer);
	}

	/**
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cleanupDatabaseGroups():void {
		$this->authContext->deleteTokenAuthEnforcedAfterScenario();
		$previousServer = $this->currentServer;
		$this->usingServer('LOCAL');
		foreach ($this->createdGroups as $group => $groupData) {
			if (OcisHelper::isTestingWithGraphApi()) {
				$this->graphContext->adminDeletesGroupWithGroupId(
					$groupData['id']
				);
			} else {
				$this->cleanupGroup((string)$group);
			}
		}
		$this->usingServer('REMOTE');
		foreach ($this->createdRemoteGroups as $remoteGroup => $groupData) {
			if (OcisHelper::isTestingWithGraphApi()) {
				$this->graphContext->adminDeletesGroupWithGroupId(
					$groupData['id']
				);
			} else {
				$this->cleanupGroup((string)$remoteGroup);
			}
		}
		$this->usingServer($previousServer);
	}

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function rememberAppEnabledDisabledState():void {
		if (!OcisHelper::isTestingOnOcisOrReva()) {
			SetupHelper::init(
				$this->getAdminUsername(),
				$this->getAdminPassword(),
				$this->getBaseUrl(),
				$this->getOcPath()
			);
			$this->runOcc(['app:list', '--output json']);
			$apps = \json_decode($this->getStdOutOfOccCommand(), true);
			$this->enabledApps = \array_keys($apps["enabled"]);
			$this->disabledApps = \array_keys($apps["disabled"]);
		}
	}

	/**
	 * @BeforeScenario @rememberGroupsThatExist
	 *
	 * @return void
	 * @throws Exception
	 */
	public function rememberGroupsThatExistAtTheStartOfTheScenario():void {
		$this->startingGroups = $this->getArrayOfGroupsResponded($this->getAllGroups());
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function restoreAppEnabledDisabledState():void {
		if (!OcisHelper::isTestingOnOcisOrReva() && !$this->isRunningForDbConversion()) {
			$this->runOcc(['app:list', '--output json']);

			$apps = \json_decode($this->getStdOutOfOccCommand(), true);
			$currentlyEnabledApps = \array_keys($apps["enabled"]);
			$currentlyDisabledApps = \array_keys($apps["disabled"]);

			foreach ($currentlyDisabledApps as $disabledApp) {
				if (\in_array($disabledApp, $this->enabledApps)) {
					$this->adminEnablesOrDisablesApp('enables', $disabledApp);
				}
			}

			foreach ($currentlyEnabledApps as $enabledApp) {
				if (\in_array($enabledApp, $this->disabledApps)) {
					$this->adminEnablesOrDisablesApp('disables', $enabledApp);
				}
			}
		}
	}

	/**
	 * disable or enable user
	 *
	 * @param string $user
	 * @param string $otherUser
	 * @param string $action
	 *
	 * @return void
	 */
	public function disableOrEnableUser(string $user, string $otherUser, string $action):void {
		$actualUser = $this->getActualUsername($user);
		$actualPassword = $this->getPasswordForUser($actualUser);
		$actualOtherUser = $this->getActualUsername($otherUser);

		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$actualOtherUser/$action";
		$this->response = HttpRequestHelper::put(
			$fullUrl,
			$this->getStepLineRef(),
			$actualUser,
			$actualPassword
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * Returns an array of all apps reported by the cloud/apps endpoint
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getAllApps():array {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}

	/**
	 * Returns array of enabled apps reported by the cloud/apps endpoint
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getEnabledApps():array {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps?filter=enabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}

	/**
	 * Returns array of disabled apps reported by the cloud/apps endpoint
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getDisabledApps():array {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}

	/**
	 * Removes skeleton directory config from config.php and returns the config value
	 *
	 * @param string|null $baseUrl
	 *
	 * @return string
	 * @throws Exception
	 */
	public function popSkeletonDirectoryConfig(?string $baseUrl = null):string {
		$path = $this->getSkeletonDirectory($baseUrl);
		$this->runOcc(
			["config:system:delete skeletondirectory"],
			null,
			null,
			$baseUrl
		);
		return $path;
	}

	/**
	 * @param string|null $baseUrl
	 *
	 * @return string
	 * @throws Exception
	 */
	private function getSkeletonDirectory(?string $baseUrl = null):string {
		$this->runOcc(
			["config:system:get skeletondirectory"],
			null,
			null,
			$baseUrl
		);
		return \trim($this->getStdOutOfOccCommand());
	}

	/**
	 * Get the name of the smallest available skeleton, to "simulate" without skeleton.
	 *
	 * In ownCloud 10 there is always a skeleton directory. If none is specified
	 * then whatever is in core/skeleton is used. That contains different files
	 * and folders depending on the build that is being tested. So for testing
	 * we have "empty" skeleton that is created on-the-fly by the testing app.
	 * That provides a consistent skeleton for test scenarios that specify
	 * "without skeleton files"
	 *
	 * @return string name of the smallest skeleton folder
	 */
	private function getSmallestSkeletonDirName(): string {
		return "empty";
	}

	/**
	 * @return bool
	 */
	private function isEmptySkeleton(): bool {
		$skeletonDir = \getenv("SKELETON_DIR");
		if (($skeletonDir !== false) && (\basename($skeletonDir) === $this->getSmallestSkeletonDirName() . "Skeleton")) {
			return true;
		}
		return false;
	}

	/**
	 * sets the skeletondirectory according to the type
	 *
	 * @param string $skeletonType can be "tiny", "small", "large" OR empty.
	 *                             If an empty string is given, the current
	 *                             setting will not be changed
	 *
	 * @return string skeleton folder before the change
	 * @throws Exception
	 */
	private function setSkeletonDirByType(string $skeletonType): string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$originalSkeletonPath = \getenv("SKELETON_DIR");
			if ($originalSkeletonPath === false) {
				$originalSkeletonPath = '';
			}
			if ($skeletonType !== '') {
				$skeletonDirName = $skeletonType . "Skeleton";
				$newSkeletonPath = \dirname($originalSkeletonPath) . '/' . $skeletonDirName;
				\putenv(
					"SKELETON_DIR=" . $newSkeletonPath
				);
			}
		} else {
			$baseUrl = $this->getBaseUrl();
			$originalSkeletonPath = $this->getSkeletonDirectory($baseUrl);

			if ($skeletonType !== '') {
				OcsApiHelper::sendRequest(
					$baseUrl,
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					'POST',
					"/apps/testing/api/v1/testingskeletondirectory",
					$this->getStepLineRef(),
					[
						'directory' => $skeletonType . "Skeleton"
					],
					$this->getOcsApiVersion()
				);
			}
		}
		return $originalSkeletonPath;
	}

	/**
	 * sets the skeletondirectory
	 *
	 * @param string $skeletonDir Full path of the skeleton directory
	 *                            If an empty string is given, the current
	 *                            setting will not be changed
	 *
	 * @return string skeleton folder before the change
	 * @throws Exception
	 */
	private function setSkeletonDir(string $skeletonDir): string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			$originalSkeletonPath = \getenv("SKELETON_DIR");
			if ($skeletonDir !== '') {
				\putenv("SKELETON_DIR=" . $skeletonDir);
			}
		} else {
			$baseUrl = $this->getBaseUrl();
			$originalSkeletonPath = $this->getSkeletonDirectory($baseUrl);
			if ($skeletonDir !== '') {
				$this->runOcc(
					["config:system:set skeletondirectory --value $skeletonDir"],
					null,
					null,
					$baseUrl
				);
			}
		}
		return $originalSkeletonPath;
	}
}
