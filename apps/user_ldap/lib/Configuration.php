<?php
/**
 * @author Alexander Bergolth <leo@strike.wu.ac.at>
 * @author Alex Weirig <alex.weirig@technolink.lu>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lennart Rosam <hello@takuto.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\User_LDAP;
use OCP\IConfig;

/**
 * @property int $ldapPagingSize holds an integer
 * @property string $ldapHost,
 * @property string $ldapPort,
 * @property string $ldapBackupHost,
 * @property string $ldapBackupPort,
 * @property string $ldapBase,
 * @property string[] $ldapBaseUsers,
 * @property string $ldapBaseGroups,
 * @property string $ldapAgentName,
 * @property string $ldapAgentPassword,
 * @property bool $ldapTLS,
 * @property string $turnOffCertCheck,
 * @property string $ldapIgnoreNamingRules,
 * @property string $ldapUserName,
 * @property string $ldapUserDisplayName,
 * @property string $ldapUserDisplayName2,
 * @property string $ldapUserFilterObjectclass,
 * @property string $ldapUserFilterGroups,
 * @property string $ldapUserFilter,
 * @property string $ldapUserFilterMode,
 * @property string $ldapGroupFilter,
 * @property string $ldapGroupFilterMode,
 * @property string $ldapGroupFilterObjectclass,
 * @property string $ldapGroupFilterGroups,
 * @property string $ldapGroupDisplayName,
 * @property string $ldapGroupMemberAssocAttr,
 * @property string $ldapGroupMemberAlgo,
 * @property string $ldapLoginFilter,
 * @property string $ldapLoginFilterMode,
 * @property string $ldapLoginFilterEmail,
 * @property string $ldapLoginFilterUsername,
 * @property string $ldapLoginFilterAttributes,
 * @property string $ldapQuotaAttribute,
 * @property string $ldapQuotaDefault,
 * @property string $ldapEmailAttribute,
 * @property string $ldapCacheTTL,
 * @property string $ldapNetworkTimeout,
 * @property string $ldapUuidUserAttribute,
 * @property string $ldapUuidGroupAttribute,
 * @property string $ldapOverrideMainServer,
 * @property string $ldapConfigurationActive,
 * @property string $ldapAttributesForUserSearch,
 * @property string $ldapAttributesForGroupSearch,
 * @property string $ldapExperiencedAdmin,
 * @property string $homeFolderNamingRule,
 * @property string $hasPagedResultSupport,
 * @property string $hasMemberOfFilterSupport,
 * @property string $useMemberOfToDetectMembership,
 * @property string $ldapExpertUsernameAttr,
 * @property string $ldapExpertGroupnameAttr,
 * @property string $ldapExpertUUIDUserAttr,
 * @property string $ldapExpertUUIDGroupAttr,
 * @property string $lastJpegPhotoLookup,
 * @property string $ldapNestedGroups,
 * @property string $ldapDynamicGroupMemberURL
 * @property string $backupPort
 */
class Configuration {

	/** @var IConfig */
	protected $coreConfig;

	/** @var string */
	protected $prefix;

	/** @var bool */
	protected $read = false;

	/** @var array */
	protected $data = [
		'ldapHost' => null,
		'ldapPort' => null,
		'ldapBackupHost' => null,
		'ldapBackupPort' => null,
		'ldapBase' => null,
		'ldapBaseUsers' => null,
		'ldapBaseGroups' => null,
		'ldapAgentName' => null,
		'ldapAgentPassword' => null,
		'ldapTLS' => null,
		'turnOffCertCheck' => null,
		'ldapIgnoreNamingRules' => null,
		'ldapUserName' => null,
		'ldapUserDisplayName' => null,
		'ldapUserDisplayName2' => null,
		'ldapUserFilterObjectclass' => null,
		'ldapUserFilterGroups' => null,
		'ldapUserFilter' => null,
		'ldapUserFilterMode' => null,
		'ldapGroupFilter' => null,
		'ldapGroupFilterMode' => null,
		'ldapGroupFilterObjectclass' => null,
		'ldapGroupFilterGroups' => null,
		'ldapGroupDisplayName' => null,
		'ldapGroupMemberAssocAttr' => null,
		'ldapGroupMemberAlgo' => null,
		'ldapLoginFilter' => null,
		'ldapLoginFilterMode' => null,
		'ldapLoginFilterEmail' => null,
		'ldapLoginFilterUsername' => null,
		'ldapLoginFilterAttributes' => null,
		'ldapQuotaAttribute' => null,
		'ldapQuotaDefault' => null,
		'ldapEmailAttribute' => null,
		'ldapCacheTTL' => null,
		'ldapNetworkTimeout' => null,
		'ldapUuidUserAttribute' => 'auto',
		'ldapUuidGroupAttribute' => 'auto',
		'ldapOverrideMainServer' => false,
		'ldapConfigurationActive' => false,
		'ldapAttributesForUserSearch' => null,
		'ldapAttributesForGroupSearch' => null,
		'ldapExperiencedAdmin' => false,
		'homeFolderNamingRule' => null,
		'hasPagedResultSupport' => false,
		'hasMemberOfFilterSupport' => false,
		'useMemberOfToDetectMembership' => true,
		'ldapExpertUsernameAttr' => null,
		'ldapExpertGroupnameAttr' => null,
		'ldapExpertUUIDUserAttr' => null,
		'ldapExpertUUIDGroupAttr' => null,
		'lastJpegPhotoLookup' => null,
		'ldapNestedGroups' => false,
		'ldapPagingSize' => null,
		'ldapDynamicGroupMemberURL' => null,
	];

	/**
	 * @param IConfig $coreConfig
	 * @param string $prefix a string with the prefix for the configkey column (appconfig table)
	 * @param bool $autoRead
	 */
	public function __construct(IConfig $coreConfig, $prefix, $autoRead = true) {
		$this->coreConfig = $coreConfig;
		$this->prefix = $prefix;
		if ($autoRead) {
			$this->readConfiguration();
		}
	}

	/**
	 * @return IConfig
	 */
	public function getCoreConfig() {
		return $this->coreConfig;
	}
	/**
	 * @return string the configuration prefix
	 */
	public function getPrefix() {
		return $this->prefix;
	}

	/**
	 * @return bool
	 */
	public function isRead() {
		return $this->read;
	}

	/**
	 * @param string $name
	 * @return mixed|null
	 */
	public function __get($name) {
		if (isset($this->data[$name])) {
			return $this->data[$name];
		}
		return null;
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) {
		$this->setConfiguration([$name => $value]);
	}

	/**
	 * @return array
	 */
	public function getConfiguration() {
		return $this->data;
	}

	/**
	 * set LDAP configuration with values delivered by an array, not read
	 * from configuration. It does not save the configuration! To do so, you
	 * must call saveConfiguration afterwards.
	 * @param array $config array that holds the config parameters in an associated
	 * array
	 * @param array $applied optional; array where the set fields will be given to
	 * @return false|null
	 */
	public function setConfiguration($config, &$applied = null) {
		if (!\is_array($config)) {
			return false;
		}

		$cta = $this->getConfigTranslationArray();
		foreach ($config as $inputKey => $val) {
			if (\strpos($inputKey, '_') !== false && \array_key_exists($inputKey, $cta)) {
				$key = $cta[$inputKey];
			} elseif (\array_key_exists($inputKey, $this->data)) {
				$key = $inputKey;
			} else {
				continue;
			}

			$setMethod = 'setValue';
			switch ($key) {
				case 'ldapAgentPassword':
					$val = \filter_var($val, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
					$setMethod = 'setRawValue';
					break;
				case 'homeFolderNamingRule':
					$trimmedVal = \trim($val);
					if ($trimmedVal !== '' && \strpos($val, 'attr:') === false) {
						$val = 'attr:'.$trimmedVal;
					}
					break;
				case 'ldapBase':
				case 'ldapBaseUsers':
				case 'ldapBaseGroups':
				case 'ldapAttributesForUserSearch':
				case 'ldapAttributesForGroupSearch':
				case 'ldapUserFilterObjectclass':
				case 'ldapUserFilterGroups':
				case 'ldapGroupFilterObjectclass':
				case 'ldapGroupFilterGroups':
				case 'ldapLoginFilterAttributes':
					$setMethod = 'setMultiLine';
					break;
			}
			$this->$setMethod($key, $val);
			if (\is_array($applied)) {
				$applied[] = $inputKey;
			}
		}
		return null;
	}

	public function readConfiguration() {
		if ($this->prefix !== null && !$this->isRead()) {
			$cta = \array_flip($this->getConfigTranslationArray());
			foreach ($this->data as $key => $val) {
				if (!isset($cta[$key])) {
					//some are determined
					continue;
				}
				$dbKey = $cta[$key];
				switch ($key) {
					case 'ldapBase':
					case 'ldapBaseUsers':
					case 'ldapBaseGroups':
					case 'ldapAttributesForUserSearch':
					case 'ldapAttributesForGroupSearch':
					case 'ldapUserFilterObjectclass':
					case 'ldapUserFilterGroups':
					case 'ldapGroupFilterObjectclass':
					case 'ldapGroupFilterGroups':
					case 'ldapLoginFilterAttributes':
						$readMethod = 'getMultiLine';
						break;
					case 'ldapIgnoreNamingRules':
						$readMethod = 'getSystemValue';
						$dbKey = $key;
						break;
					case 'ldapAgentPassword':
						$readMethod = 'getPwd';
						break;
					case 'ldapUserDisplayName2':
					case 'ldapGroupDisplayName':
						$readMethod = 'getLcValue';
						break;
					case 'ldapUserDisplayName':
					default:
						// user display name does not lower case because
						// we rely on an upper case N as indicator whether to
						// auto-detect it or not. FIXME
						$readMethod = 'getValue';
						break;
				}
				$this->data[$key] = $this->$readMethod($dbKey);
			}
			$this->read = true;
		}
	}

	private function getTranslatedConfig() {
		$cta = \array_flip($this->getConfigTranslationArray());
		$result = [];
		foreach ($this->data as $key => $value) {
			switch ($key) {
				case 'ldapAgentPassword':
					$value = \base64_encode($value);
					break;
				case 'ldapBase':
				case 'ldapBaseUsers':
				case 'ldapBaseGroups':
				case 'ldapAttributesForUserSearch':
				case 'ldapAttributesForGroupSearch':
				case 'ldapUserFilterObjectclass':
				case 'ldapUserFilterGroups':
				case 'ldapGroupFilterObjectclass':
				case 'ldapGroupFilterGroups':
				case 'ldapLoginFilterAttributes':
					if (\is_array($value)) {
						$value = \implode("\n", $value);
					}
					break;
				//following options are not stored but detected, skip them
				case 'ldapIgnoreNamingRules':
				case 'hasPagedResultSupport':
				case 'ldapUuidUserAttribute':
				case 'ldapUuidGroupAttribute':
					continue 2;
			}
			if ($value === null) {
				$value = '';
			}
			$result[$cta[$key]] = $value;
		}
		return $result;
	}
	/**
	 * saves the current Configuration in the database
	 */
	public function saveConfiguration() {
		foreach ($this->getTranslatedConfig() as $key => $value) {
			$this->saveValue($key, $value);
		}
	}

	public function isDefault() {
		$diff = \array_diff_assoc($this->getTranslatedConfig(), $this->getDefaults());
		return \count($diff) === 0;
	}

	/**
	 * @param string $varName
	 * @return array|string
	 */
	protected function getMultiLine($varName) {
		$value = $this->getValue($varName);
		if (empty($value)) {
			$value = '';
		} else {
			$value = \preg_split('/\r\n|\r|\n/', $value);
		}

		return $value;
	}

	/**
	 * Sets multi-line values as arrays
	 *
	 * @param string $varName name of config-key
	 * @param array|string $value to set
	 */
	protected function setMultiLine($varName, $value) {
		if (empty($value)) {
			$value = '';
		} elseif (!\is_array($value)) {
			$value = \preg_split('/\r\n|\r|\n|;/', $value);
			if ($value === false) {
				$value = '';
			}
		}

		if (!\is_array($value)) {
			$finalValue = \trim($value);
		} else {
			$finalValue = [];
			foreach ($value as $key => $val) {
				if (\is_string($val)) {
					$val = \trim($val);
					if ($val !== '') {
						//accidental line breaks are not wanted and can cause
						// odd behaviour. Thus, away with them.
						$finalValue[] = $val;
					}
				} else {
					$finalValue[] = $val;
				}
			}
		}

		$this->setRawValue($varName, $finalValue);
	}

	/**
	 * @param string $varName
	 * @return string
	 */
	protected function getPwd($varName) {
		return \base64_decode($this->getValue($varName));
	}

	/**
	 * @param string $varName
	 * @return string
	 */
	protected function getLcValue($varName) {
		return \mb_strtolower($this->getValue($varName), 'UTF-8');
	}

	/**
	 * @param string $varName
	 * @return string
	 */
	protected function getSystemValue($varName) {
		//FIXME: if another system value is added, softcode the default value
		return $this->coreConfig->getSystemValue($varName, false);
	}

	/**
	 * @param string $varName
	 * @return string
	 */
	protected function getValue($varName) {
		static $defaults;
		if ($defaults === null) {
			$defaults = $this->getDefaults();
		}
		return $this->coreConfig->getAppValue(
			'user_ldap',
			$this->prefix.$varName,
			$defaults[$varName]
		);
	}

	/**
	 * Sets a scalar value.
	 *
	 * @param string $varName name of config key
	 * @param mixed $value to set
	 */
	protected function setValue($varName, $value) {
		if (\is_string($value)) {
			$value = \trim($value);
		}
		$this->data[$varName] = $value;
	}

	/**
	 * Sets a scalar value without trimming.
	 *
	 * @param string $varName name of config key
	 * @param mixed $value to set
	 */
	protected function setRawValue($varName, $value) {
		$this->data[$varName] = $value;
	}

	/**
	 * @param string $varName
	 * @param string $value
	 */
	protected function saveValue($varName, $value) {
		$this->coreConfig->setAppValue(
			'user_ldap',
			$this->prefix.$varName,
			$value
		);
	}

	/**
	 * @return array an associative array with the default values. Keys are correspond
	 * to config-value entries in the database table
	 */
	public function getDefaults() {
		return [
			'ldap_host'                         => '',
			'ldap_port'                         => '',
			'ldap_backup_host'                  => '',
			'ldap_backup_port'                  => '',
			'ldap_override_main_server'         => '',
			'ldap_dn'                           => '',
			'ldap_agent_password'               => '',
			'ldap_base'                         => '',
			'ldap_base_users'                   => '',
			'ldap_base_groups'                  => '',
			'ldap_userlist_filter'              => '',
			'ldap_user_filter_mode'             => 0,
			'ldap_userfilter_objectclass'       => '',
			'ldap_userfilter_groups'            => '',
			'ldap_login_filter'                 => '',
			'ldap_login_filter_mode'            => 0,
			'ldap_loginfilter_email'            => 0,
			'ldap_loginfilter_username'         => 1,
			'ldap_loginfilter_attributes'       => '',
			'ldap_group_filter'                 => '',
			'ldap_group_filter_mode'            => 0,
			'ldap_groupfilter_objectclass'      => '',
			'ldap_groupfilter_groups'           => '',
			'ldap_user_name'                    => 'samaccountname',
			'ldap_display_name'                 => 'displayName',
			'ldap_user_display_name_2'			=> '',
			'ldap_group_display_name'           => 'cn',
			'ldap_tls'                          => 0,
			'ldap_quota_def'                    => '',
			'ldap_quota_attr'                   => '',
			'ldap_email_attr'                   => '',
			'ldap_group_member_assoc_attribute' => 'uniqueMember',
			'ldap_group_member_algo'            => 'groupScan',
			'ldap_cache_ttl'                    => 600,
			'ldap_network_timeout'              => 15,
			'ldap_uuid_user_attribute'          => 'auto',
			'ldap_uuid_group_attribute'         => 'auto',
			'home_folder_naming_rule'           => '',
			'ldap_turn_off_cert_check'          => 0,
			'ldap_configuration_active'         => 0,
			'ldap_attributes_for_user_search'   => '',
			'ldap_attributes_for_group_search'  => '',
			'ldap_expert_username_attr'         => '',
			'ldap_expert_groupname_attr'        => '',
			'ldap_expert_uuid_user_attr'        => '',
			'ldap_expert_uuid_group_attr'       => '',
			'has_memberof_filter_support'       => 0,
			'use_memberof_to_detect_membership' => 1,
			'last_jpegPhoto_lookup'             => 0,
			'ldap_nested_groups'                => 0,
			'ldap_paging_size'                  => 500,
			'ldap_experienced_admin'            => 0,
			'ldap_dynamic_group_member_url'     => '',
		];
	}

	/**
	 * @return array that maps internal variable names to database fields
	 */
	public function getConfigTranslationArray() {
		//TODO: merge them into one representation
		static $array = [
			'ldap_host'                         => 'ldapHost',
			'ldap_port'                         => 'ldapPort',
			'ldap_backup_host'                  => 'ldapBackupHost',
			'ldap_backup_port'                  => 'ldapBackupPort',
			'ldap_override_main_server'         => 'ldapOverrideMainServer',
			'ldap_dn'                           => 'ldapAgentName',
			'ldap_agent_password'               => 'ldapAgentPassword',
			'ldap_base'                         => 'ldapBase',
			'ldap_base_users'                   => 'ldapBaseUsers',
			'ldap_base_groups'                  => 'ldapBaseGroups',
			'ldap_userfilter_objectclass'       => 'ldapUserFilterObjectclass',
			'ldap_userfilter_groups'            => 'ldapUserFilterGroups',
			'ldap_userlist_filter'              => 'ldapUserFilter',
			'ldap_user_filter_mode'             => 'ldapUserFilterMode',
			'ldap_login_filter'                 => 'ldapLoginFilter',
			'ldap_login_filter_mode'            => 'ldapLoginFilterMode',
			'ldap_loginfilter_email'            => 'ldapLoginFilterEmail',
			'ldap_loginfilter_username'         => 'ldapLoginFilterUsername',
			'ldap_loginfilter_attributes'       => 'ldapLoginFilterAttributes',
			'ldap_group_filter'                 => 'ldapGroupFilter',
			'ldap_group_filter_mode'            => 'ldapGroupFilterMode',
			'ldap_groupfilter_objectclass'      => 'ldapGroupFilterObjectclass',
			'ldap_groupfilter_groups'           => 'ldapGroupFilterGroups',
			'ldap_user_name'                    => 'ldapUserName',
			'ldap_display_name'                 => 'ldapUserDisplayName',
			'ldap_user_display_name_2'			=> 'ldapUserDisplayName2',
			'ldap_group_display_name'           => 'ldapGroupDisplayName',
			'ldap_tls'                          => 'ldapTLS',
			'ldap_quota_def'                    => 'ldapQuotaDefault',
			'ldap_quota_attr'                   => 'ldapQuotaAttribute',
			'ldap_email_attr'                   => 'ldapEmailAttribute',
			'ldap_group_member_assoc_attribute' => 'ldapGroupMemberAssocAttr',
			'ldap_group_member_algo'            => 'ldapGroupMemberAlgo',
			'ldap_cache_ttl'                    => 'ldapCacheTTL',
			'ldap_network_timeout'              => 'ldapNetworkTimeout',
			'home_folder_naming_rule'           => 'homeFolderNamingRule',
			'ldap_turn_off_cert_check'          => 'turnOffCertCheck',
			'ldap_configuration_active'         => 'ldapConfigurationActive',
			'ldap_attributes_for_user_search'   => 'ldapAttributesForUserSearch',
			'ldap_attributes_for_group_search'  => 'ldapAttributesForGroupSearch',
			'ldap_expert_username_attr'         => 'ldapExpertUsernameAttr',
			'ldap_expert_groupname_attr'        => 'ldapExpertGroupnameAttr',
			'ldap_expert_uuid_user_attr'        => 'ldapExpertUUIDUserAttr',
			'ldap_expert_uuid_group_attr'       => 'ldapExpertUUIDGroupAttr',
			'has_memberof_filter_support'       => 'hasMemberOfFilterSupport',
			'use_memberof_to_detect_membership' => 'useMemberOfToDetectMembership',
			'last_jpegPhoto_lookup'             => 'lastJpegPhotoLookup',
			'ldap_nested_groups'                => 'ldapNestedGroups',
			'ldap_paging_size'                  => 'ldapPagingSize',
			'ldap_experienced_admin'            => 'ldapExperiencedAdmin',
			'ldap_dynamic_group_member_url'     => 'ldapDynamicGroupMemberURL',
		];
		return $array;
	}
}
