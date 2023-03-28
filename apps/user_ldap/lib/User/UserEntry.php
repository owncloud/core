<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

namespace OCA\User_LDAP\User;

use OCA\User_LDAP\Access;
use OCA\User_LDAP\Connection;
use OCA\User_LDAP\Attributes\ConverterHub;
use OCP\IConfig;
use OCP\ILogger;

/**
 * UserEntry is a wrapper around an ldap search array.
 *
 * It represents an LDAP user and is created by the UserManager on a getUsers
 * call. It is more than a Plain Old PHP Objects (POPO) because it uses the ldap
 * configuration to fetch the results fo different getters. It also does some
 * sanity checking eg for dn, displayName, uuid, quota and home folder. Finally,
 * it can store the internal ownCloud UID determined by the UserManager.
 */
class UserEntry {
	/**
	 * @var IConfig
	 */
	protected $config;
	/**
	 * @var ILogger
	 */
	protected $logger;
	/**
	 * @var Connection
	 */
	protected $connection;
	/**
	 * @var array
	 */
	protected $ldapEntry;
	/**
	 * @var string
	 */
	protected $ownCloudUID;

	/**
	 * @brief constructor, make sure the subclasses call this one!
	 * @param IConfig $config
	 * @param ILogger $logger
	 * // FIXME Connection is used to look up configuration ... pass in Configuration instead?
	 * @param Connection $connection to lookup configured attribute names
	 * @param array $ldapEntry an ldapEntry returned from Access::fetchListOfUsers()
	 * @throws \InvalidArgumentException if entry does not contain a dn
	 */
	public function __construct(IConfig $config, ILogger $logger, Connection $connection, array $ldapEntry) {
		$this->config = $config;
		$this->logger = $logger;
		$this->connection = $connection;
		// Fix ldap entry to force all keys to lowercase
		foreach ($ldapEntry as $key => $value) {
			$this->ldapEntry[\strtolower($key)] = $ldapEntry[$key];
		}
		// only accept an entry with the dn set
		if ($this->getDN() === null) {
			throw new \InvalidArgumentException('Entry must have the dn set');
		}
		//TODO extractAttributeValuesFromResult from Access
	}

	/**
	 * DN normalization should have happened in @see \OCA\User_LDAP\Access::search()
	 * @return string|null the Distinguished Name (DN) of the LDAP entry
	 */
	public function getDN() {
		return $this->getAttributeValue('dn', null);
	}

	/**
	 * Returns the username or null if none defined or
	 * if no such LDAP attribute was configured.
	 *
	 * @return string|null username for this user
	 */
	public function getUserName() {
		$attr = $this->getAttributeName('ldapUserName');
		if ($attr !== '') {
			return $this->getAttributeValue($attr, null);
		}
		return null;
	}

	/**
	 * @see getOwncloudUID() to get the owncloud internal userid
	 * @return string userid as configured. THIS IS NOT the ownCloud internal userid!
	 * @throws \OutOfBoundsException if userid could not be determined
	 */
	public function getUserId() {
		$attr = $this->getAttributeName('ldapExpertUsernameAttr');
		if ($attr === '') {
			$username = $this->getUUID(); // fallback to uuid
		} else {
			$username = $this->getAttributeValue($attr, null);
		}
		if ($username === null) {
			$json = @\json_encode($this->ldapEntry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_PARTIAL_OUTPUT_ON_ERROR);
			if (\json_last_error() !== JSON_ERROR_NONE) {
				$json .= ', ' . \json_last_error_msg();
			};
			throw new \OutOfBoundsException('Cannot determine userid for '.$this->getDN().' from '.$json);
		}
		return $username;
	}

	/**
	 * @brief returns the ownCloudUserID if it has been resolved by the Manager
	 * @return string|null
	 */
	public function getOwnCloudUID() {
		return $this->ownCloudUID;
	}

	/**
	 * @param string $ownCloudUID
	 */
	public function setOwnCloudUID($ownCloudUID) {
		$this->ownCloudUID = $ownCloudUID;
	}

	/**
	 * @brief returns the uuid of the ldap entry
	 * @return string
	 * @throws \OutOfBoundsException if uuid could not be determined
	 */
	public function getUUID() {
		$attr = $this->getAttributeName('ldapExpertUUIDUserAttr', 'auto');
		if ($attr !== 'auto') {
			$uuidAttributes = [$attr];
		} else {
			$uuidAttributes = $this->connection->uuidAttributes;
		}
		foreach ($uuidAttributes as $uuidAttribute) {
			// uuid may be binary ... must not be trimmed!
			$uuid = $this->getAttributeValue($uuidAttribute, null, false);
			if ($uuid === null) {
				continue;
			}
			if ($this->connection->ldapExpertUUIDUserAttr !== $uuidAttribute) {
				// remember autodetected uuid attribute
				$this->connection->ldapExpertUUIDUserAttr = $uuidAttribute;
				$this->connection->saveConfiguration(); // FIXME should not be done here. Move to wizard?
			}

			return $uuid;
		}
		throw new \OutOfBoundsException('Cannot determine UUID for '.$this->getDN());
	}

	/**
	 * Determine the displayname, based on displayName, displayname2 with fallback to username.
	 * TODO do fallback in core, allow returning null in backends
	 *
	 * @return string
	 * @throws \OutOfBoundsException if display name could not be determined
	 */
	public function getDisplayName() {
		$attr = $this->getAttributeName('ldapUserDisplayName', 'displayname');
		$displayName = $this->getAttributeValue($attr, '');

		//Check whether the display name is configured to have a 2nd feature
		$additionalAttribute = $this->getAttributeName('ldapUserDisplayName2');
		if ($additionalAttribute !== '') {
			$displayName2 = (string)$this->getAttributeValue($additionalAttribute, '');
		} else {
			$displayName2 = '';
		}

		if ($displayName !== '') {
			if ($displayName2 !== '') {
				return "$displayName ($displayName2)";
			}
			return $displayName;
		}

		return $this->getUserId();
	}

	/**
	 * Overall process goes as follow:
	 * 1. check if the users quota is parseable with the "verifyQuotaValue" function
	 * 2. if the value can't be fetched, is empty or not parseable, use the default LDAP quota
	 * 3. if the default LDAP quota can't be parsed, use ownCloud's quota (return null)
	 * 4. check if the target user exists and set the quota for the user.
	 *
	 * The expected value for the quota attribute is a string describing the quota for the user. Valid
	 * values are 'none' (unlimited), 'default' (the ownCloud's default quota), '1234' (quota in
	 * bytes), '1234 MB' (quota in MB - check the \OC_Helper::computerFileSize method for more info)
	 *
	 * @return string|false quota
	 * TODO throw Exception for invalid values after https://github.com/owncloud/core/pull/28805 has been merged
	 */
	public function getQuota() {
		$quota = null;

		$attr = $this->getAttributeName('ldapQuotaAttribute');
		if ($attr === '') {
			\OC::$server->getLogger()->debug("No LDAP quota attribute configured", ['app' => 'user_ldap']);
		} else {
			$quota = $this->getAttributeValue($attr);
			if ($quota !== null && !$this->verifyQuotaValue($quota)) {
				\OC::$server->getLogger()->error("Invalid quota <$quota> for LDAP user <{$this->getOwnCloudUID()}>", ['app' => 'user_ldap']);
				$quota = null;
			}
		}

		if ($quota === null) {
			if (!$this->connection->ldapQuotaDefault) {
				\OC::$server->getLogger()->debug("No LDAP quota default configured", ['app' => 'user_ldap']);
			} else {
				$quota = $this->connection->ldapQuotaDefault;
				if (!$this->verifyQuotaValue($quota)) {
					\OC::$server->getLogger()->error("Invalid default quota <$quota>", ['app' => 'user_ldap']);
					$quota = null;
				}
			}
		}
		if ($quota === null) {
			$quota = false;
		}

		\OC::$server->getLogger()->debug("using quota <$quota> for user <{$this->getOwnCloudUID()}>", ['app' => 'user_ldap']);
		return $quota;
	}

	private function verifyQuotaValue($quotaValue) {
		return $quotaValue === 'none' || $quotaValue === 'default' || \OC_Helper::computerFileSize($quotaValue) !== false;
	}

	/**
	 * @return string|null email
	 */
	public function getEMailAddress() {
		$attr = $this->getAttributeName('ldapEmailAttribute', 'mail');
		return $this->getAttributeValue($attr);
	}
	/**
	 * returns the home directory of the user if specified by LDAP settings
	 * @return string|null
	 * @throws \Exception if a naming rule attribute is enforced, but it doesn't exist for that LDAP user
	 */
	public function getHome() {
		$path = '';
		$attr = $this->getAttributeName('homeFolderNamingRule', '');
		if (\is_string($attr) && \strpos($attr, 'attr:') === 0 // TODO do faster startswith check
			&& \strlen($attr) > 5
		) {
			$attr = \substr($attr, 5);

			$path = $this->getAttributeValue($attr, '');
		}

		if ($path !== '') {
			//if attribute's value is an absolute path take this, otherwise append it to data dir
			//check for / at the beginning
			if ($path[0] !== '/') {
				$path = $this->config->getSystemValue(
					'datadirectory',
					\OC::$SERVERROOT.'/data'
				) . '/' . $path;
			}
			return $path;
		}

		// TODO use OutOfBoundsException and https://github.com/owncloud/core/pull/28805
		$enforce = $this->config->getAppValue('user_ldap', 'enforce_home_folder_naming_rule', true);
		if ($attr !== ''
			&& \filter_var($enforce, FILTER_VALIDATE_BOOLEAN)
		) {
			// a naming rule attribute is defined, but it doesn't exist for that LDAP user
			// TODO narrow down exception
			throw new \Exception('Home dir attribute can\'t be read from LDAP for uid: ' . $this->getUserId());
		}

		return null;
	}

	/**
	 * @brief reads the image from LDAP that shall be used as Avatar
	 * @return string|null image binary data (provided by LDAP)
	 */
	public function getAvatarImage() {
		$data = $this->getAttributeValue('jpegPhoto', null, false);
		if ($data === null) {
			$data = $this->getAttributeValue('thumbnailPhoto', null, false);
		}
		return $data;
	}

	/**
	 * @return string[]
	 */
	public function getSearchTerms() {
		$rawAttributes = $this->connection->ldapAttributesForUserSearch;
		$attributes = empty($rawAttributes) ? [] : $rawAttributes;
		// Get from LDAP if we don't have it already
		$searchTerms = [];
		foreach ($attributes as $attr) {
			$attr = \strtolower($attr);
			if (isset($this->ldapEntry[$attr])) {
				foreach ($this->ldapEntry[$attr] as $value) {
					$value = \trim($value);
					if (!empty($value)) {
						$searchTerms[\strtolower($value)] = true;
					}
				}
			}
		}

		return \array_keys($searchTerms);
	}

	/**
	 * @param string $configOption
	 * @param string $default
	 * @return string
	 */
	private function getAttributeName($configOption, $default = '') {
		$attributeName = \strtolower(\trim($this->connection->$configOption));

		// strtolower() returns '' for null and false, which is what the connection initializes config options to
		if ($attributeName === '') {
			return $default;
		}

		return $attributeName;
	}
	/**
	 * Read first value from a single value Attribute of an ldap entry
	 * TODO allow passing in a verification function, eg for quota or uuid values
	 * @param string $attributeName
	 * @param string $default
	 * @param bool $trim  don't trim value, eg for binary data
	 * @return string|null
	 */
	private function getAttributeValue($attributeName, $default = null, $trim = true) {
		$attributeName = \strtolower($attributeName); // all ldap keys are lowercase
		if (isset($this->ldapEntry[$attributeName][0])) {
			$value = $this->ldapEntry[$attributeName][0];

			$converterHub = ConverterHub::getDefaultConverterHub();
			if ($converterHub->hasConverter($attributeName)) {
				$value = $converterHub->bin2str($attributeName, $value);
			}

			if ($trim) {
				$value = \trim($value);
			}

			if ($value === '') {
				return $default;
			}
			return $value;
		}

		return $default;
	}
}
