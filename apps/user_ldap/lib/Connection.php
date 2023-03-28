<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Lyonel Vincent <lyonel@ezix.org>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

use OC\ServerNotAvailableException;
use OCA\User_LDAP\Exceptions\BindFailedException;
use OCP\Util;

/**
 * magic properties (incomplete)
 * responsible for LDAP connections in context with the provided configuration
 *
 * @property string $ldapHost
 * @property string $ldapPort holds the port number
 * @property string $ldapUserFilter
 * @property string $ldapUserDisplayName
 * @property string $ldapUserDisplayName2
 * @property boolean $hasPagedResultSupport
 * @property string[] $ldapBaseUsers
 * @property int|string $ldapPagingSize holds an integer
 * @property bool|mixed|void $ldapGroupMemberAssocAttr
 * @property string $ldapGroupMemberAlgo,
 * @property bool $ldapConfigurationActive
 * @property string $ldapGroupFilter
 * @property string $ldapLoginFilter
 * @property string $ldapDynamicGroupMemberURL
 * @property string $ldapNestedGroups
 * @property bool $hasMemberOfFilterSupport
 * @property bool $useMemberOfToDetectMembership
 * @property string $ldapGroupDisplayName
 *
 * These additional properties are being accessed from this class
 * So adding this to make phpstan pass
 * @property string $ldapQuotaAttribute
 * @property string $ldapEmailAttribute
 * @property string $ldapExpertUsernameAttr
 * @property string $ldapExpertGroupnameAttr
 * @property string $homeFolderNamingRule
 * @property array $ldapAttributesForUserSearch
 * @property string $ldapUuidUserAttribute
 * @property string $ldapUserName
 * @property string $ldapExpertUUIDUserAttr
 * @property string $ldapQuotaDefault
 * @property array $ldapBaseGroups
 * @property string $originalTTL
 * @property string $ldapCacheTTL
 * @property array $ldapBase
 * @property string $ldapIgnoreNamingRules
 * @property array $ldapAttributesForGroupSearch
 * @property string $ldapExpertUUIDGroupAttr
 * @property string $uuidAttr
 * @property string $ldapUuidGroupAttribute.
 * @property int $backupPort
 *
 */
class Connection extends LDAPUtility {
	/**
	 * @var resource|null
	 */
	private $ldapConnectionRes;

	private $configPrefix;
	private $configID;
	private $configured = false;
	private $hasPagedResultSupport = true;

	// for now, these are the autodetected unique attributes
	public $uuidAttributes = [
		'entryuuid', 'nsuniqueid', 'objectguid', 'guid', 'ipauniqueid'
	];

	/**
	 * TODO currently redundant with ldapExpertUsernameAttr. fix when core properly distinguishes uid and username
	 * @var string|null attribute to use for username
	 */
	public $userNameAttribute = 'samaccountname';

	/**
	 * @var bool runtime flag that indicates whether supported primary groups are available
	 */
	public $hasPrimaryGroups = true;

	//cache handler
	protected $cache;

	/** @var Configuration settings handler **/
	protected $configuration;

	protected $ignoreValidation = false;

	/**
	 * Constructor
	 * @param ILDAPWrapper $ldap
	 * @param Configuration $configuration
	 * @param string|null $configID a string with the value for the appid column (appconfig table) or null for on-the-fly connections // TODO might be obsolete
	 */
	public function __construct(ILDAPWrapper $ldap, Configuration $configuration, $configID = 'user_ldap') {
		parent::__construct($ldap);
		$this->configPrefix = $configuration->getPrefix();
		$this->configID = $configID;
		$this->configuration = $configuration;

		$memcache = \OC::$server->getMemCacheFactory();
		if ($memcache->isAvailable()) {
			$this->cache = $memcache->create();
		}

		$this->hasPagedResultSupport =
			(int)$this->configuration->ldapPagingSize !== 0
			&& $this->getLDAP()->hasPagedResultSupport();
	}

	public function __destruct() {
		if ($this->getLDAP()->isResource($this->ldapConnectionRes)) {
			@$this->getLDAP()->unbind($this->ldapConnectionRes);
		}
	}

	/**
	 * defines behaviour when the instance is cloned
	 */
	public function __clone() {
		$this->configuration = new Configuration(
			$this->configuration->getCoreConfig(),
			$this->configPrefix,
			$this->configID !== null
		);
		$this->ldapConnectionRes = null;
	}

	/**
	 * @param string $name
	 * @return bool|mixed
	 */
	public function __get($name) {
		if (!$this->configured) {
			$this->readConfiguration();
		}

		if ($name === 'hasPagedResultSupport') {
			return $this->hasPagedResultSupport;
		}

		return $this->configuration->$name;
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) {
		$before = $this->configuration->$name;
		$this->configuration->$name = $value;
		$after = $this->configuration->$name;
		if ($before !== $after) {
			if ($this->configID !== '') {
				$this->configuration->saveConfiguration();
			}
			$this->validateConfiguration();
		}
	}

	/**
	 * sets whether the result of the configuration validation shall
	 * be ignored when establishing the connection. Used by the Wizard
	 * in early configuration state.
	 * @param bool $state
	 */
	public function setIgnoreValidation($state) {
		$this->ignoreValidation = (bool)$state;
	}

	/**
	 * Returns the LDAP handler
	 * @return resource | null
	 *
	 * @throws \OC\ServerNotAvailableException
	 */
	public function getConnectionResource() {
		if ($this->ldapConnectionRes === null) {
			$this->readConfiguration();
			$this->establishConnection();
		}
		return $this->ldapConnectionRes;
	}

	/**
	 * resets the connection resource
	 */
	public function resetConnectionResource() {
		if ($this->ldapConnectionRes !== null) {
			@$this->getLDAP()->unbind($this->ldapConnectionRes);
			$this->ldapConnectionRes = null;
		}
	}

	/**
	 * @param string|null $key
	 * @return string
	 */
	private function getCacheKey($key) {
		$prefix = 'LDAP-'.$this->configID.'-'.$this->configPrefix.'-';
		if ($key === null) {
			return $prefix;
		}
		return $prefix.\md5($key);
	}

	/**
	 * @param string $key
	 * @return mixed|null
	 */
	public function getFromCache($key) {
		if (!$this->configured) {
			$this->readConfiguration();
		}
		if ($this->cache === null || !$this->configuration->ldapCacheTTL) {
			return null;
		}
		$key = $this->getCacheKey($key);

		return \json_decode(\base64_decode($this->cache->get($key)), true);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public function writeToCache($key, $value) {
		if (!$this->configured) {
			$this->readConfiguration();
		}
		if ($this->cache === null
			|| !$this->configuration->ldapCacheTTL
			|| !$this->configuration->ldapConfigurationActive) {
			return;
		}
		$key   = $this->getCacheKey($key);
		$value = \base64_encode(\json_encode($value));
		$this->cache->set($key, $value, $this->configuration->ldapCacheTTL);
	}

	public function clearCache() {
		if ($this->cache !== null) {
			$this->cache->clear($this->getCacheKey(null));
		}
	}

	/**
	 * Caches the general LDAP configuration.
	 * @param bool $force optional. true, if the re-read should be forced. defaults
	 * to false.
	 */
	private function readConfiguration($force = false) {
		if ((!$this->configured || $force) && $this->configID !== null) {
			$this->configuration->readConfiguration();
			$this->configured = $this->validateConfiguration();
		}
	}

	/**
	 * set LDAP configuration with values delivered by an array, not read from configuration
	 * @param array $config array that holds the config parameters in an associated array
	 * @param array $setParameters optional; array where the set fields will be given to
	 * @return boolean true if config validates, false otherwise. Check with $setParameters for detailed success on single parameters
	 */
	public function setConfiguration($config, &$setParameters = null) {
		if ($setParameters === null) {
			$setParameters = [];
		}
		$this->configuration->setConfiguration($config, $setParameters);
		if (\count($setParameters) > 0) {
			$this->configured = $this->validateConfiguration();
		}

		return $this->configured;
	}

	/**
	 * saves the current Configuration in the database and empties the
	 * cache
	 */
	public function saveConfiguration() {
		$this->configuration->saveConfiguration();
		$this->clearCache();
	}

	/**
	 * get the current LDAP configuration
	 * @return array
	 */
	public function getConfiguration() {
		$this->readConfiguration();
		$config = $this->configuration->getConfiguration();
		$cta = $this->configuration->getConfigTranslationArray();
		$result = [];
		foreach ($cta as $dbkey => $configkey) {
			switch ($configkey) {
				case 'homeFolderNamingRule':
					if (\strpos($config[$configkey], 'attr:') === 0) {
						$result[$dbkey] = \substr($config[$configkey], 5);
					} else {
						$result[$dbkey] = '';
					}
					break;
				case 'ldapBase':
				case 'ldapBaseUsers':
				case 'ldapBaseGroups':
				case 'ldapAttributesForUserSearch':
				case 'ldapAttributesForGroupSearch':
					if (\is_array($config[$configkey])) {
						$result[$dbkey] = \implode("\n", $config[$configkey]);
						break;
					} //else follows default
					// no break
				default:
					$result[$dbkey] = $config[$configkey];
			}
		}
		return $result;
	}

	private function doSoftValidation() {
		//if User or Group Base are not set, take over Base DN setting
		foreach (['ldapBaseUsers', 'ldapBaseGroups'] as $keyBase) {
			$val = $this->configuration->$keyBase;
			if (empty($val)) {
				$obj = \strpos('Users', $keyBase) !== false ? 'Users' : 'Groups';
				Util::writeLog(
					'user_ldap',
					'Base tree for '.$obj.
									' is empty, using Base DN',
					Util::DEBUG
				);
				$this->configuration->$keyBase = $this->configuration->ldapBase; /** @phpstan-ignore-line fixing this makes unit tests fail */
			}
		}

		foreach (['ldapExpertUUIDUserAttr'  => 'ldapUuidUserAttribute',
					  'ldapExpertUUIDGroupAttr' => 'ldapUuidGroupAttribute']
				as $expertSetting => $effectiveSetting) {
			$uuidOverride = $this->configuration->$expertSetting;
			if (!empty($uuidOverride)) {
				$this->configuration->$effectiveSetting = $uuidOverride;
			} else {
				if ($this->configID !== null &&
					!\in_array(
						$this->configuration->$effectiveSetting,
						\array_merge(['auto'], $this->uuidAttributes),
						true
					)
				) {
					$this->configuration->$effectiveSetting = 'auto';
					$this->configuration->saveConfiguration();
					Util::writeLog(
						'user_ldap',
						'Illegal value for the '.
										$effectiveSetting.', '.'reset to '.
										'autodetect.',
						Util::INFO
					);
				}
			}
		}

		$backupPort = (int)$this->configuration->ldapBackupPort;
		if ($backupPort <= 0) {
			$this->configuration->backupPort = $this->configuration->ldapPort;
		}

		//make sure empty search attributes are saved as simple, empty array
		$saKeys = ['ldapAttributesForUserSearch',
						'ldapAttributesForGroupSearch'];
		foreach ($saKeys as $key) {
			$val = $this->configuration->$key;
			if (\is_array($val) && \count($val) === 1 && empty($val[0])) {
				$this->configuration->$key = '';
			}
		}

		if ($this->configuration->ldapTLS
			&& \stripos($this->configuration->ldapHost, 'ldaps://') === 0
		) {
			$this->configuration->ldapTLS = false;
			Util::writeLog(
				'user_ldap',
				'LDAPS (already using secure connection) and '.
								'TLS do not work together. Switched off TLS.',
				Util::INFO
			);
		}
	}

	/**
	 * @return bool
	 */
	private function doCriticalValidation() {
		$configurationOK = true;
		$errorStr = "Configuration Error (prefix {$this->configPrefix}): ";

		//options that shall not be empty
		$options = ['ldapHost', 'ldapPort', 'ldapUserDisplayName',
						 'ldapGroupDisplayName', 'ldapLoginFilter'];
		foreach ($options as $key) {
			$val = $this->configuration->$key;
			if (empty($val)) {
				switch ($key) {
					case 'ldapHost':
						$subj = 'LDAP Host';
						break;
					case 'ldapPort':
						$subj = 'LDAP Port';
						break;
					case 'ldapUserDisplayName':
						$subj = 'LDAP User Display Name';
						break;
					case 'ldapGroupDisplayName':
						$subj = 'LDAP Group Display Name';
						break;
					case 'ldapLoginFilter':
						$subj = 'LDAP Login Filter';
						break;
					default:
						$subj = $key;
						break;
				}
				$configurationOK = false;
				Util::writeLog(
					'user_ldap',
					$errorStr.'No '.$subj.' given!',
					Util::WARN
				);
			}
		}

		//combinations
		$agent = $this->configuration->ldapAgentName;
		$pwd = $this->configuration->ldapAgentPassword;
		if (
			($agent === ''  && $pwd !== '')
			|| ($agent !== '' && $pwd === '')
		) {
			Util::writeLog(
				'user_ldap',
				$errorStr.'either no password is given for the '.
								'user agent or a password is given, but not an '.
								'LDAP agent.',
				Util::WARN
			);
			$configurationOK = false;
		}

		$base = $this->configuration->ldapBase;
		$baseUsers = $this->configuration->ldapBaseUsers;
		$baseGroups = $this->configuration->ldapBaseGroups;

		if (empty($base) && empty($baseUsers) && empty($baseGroups)) {
			Util::writeLog(
				'user_ldap',
				$errorStr.'Not a single Base DN given.',
				Util::WARN
			);
			$configurationOK = false;
		}

		if (\mb_strpos($this->configuration->ldapLoginFilter, '%uid', 0, 'UTF-8')
		   === false) {
			Util::writeLog(
				'user_ldap',
				$errorStr.'login filter does not contain %uid '.
								'place holder.',
				Util::WARN
			);
			$configurationOK = false;
		}

		return $configurationOK;
	}

	/**
	 * Validates the user specified configuration
	 * @return bool true if configuration seems OK, false otherwise
	 */
	private function validateConfiguration() {
		if ($this->configuration->isDefault()) {
			//don't do a validation if it is a new configuration with pure
			//default values.
			return false;
		}

		// first step: "soft" checks: settings that are not really
		// necessary, but advisable. If left empty, give an info message
		$this->doSoftValidation();

		//second step: critical checks. If left empty or filled wrong, mark as
		//not configured and give a warning.
		return $this->doCriticalValidation();
	}

	/**
	 * Connects and Binds to LDAP
	 *
	 * @throws \OC\ServerNotAvailableException
	 * @throws BindFailedException
	 */
	private function establishConnection() {
		if (!$this->configuration->ldapConfigurationActive) {
			return null;
		}
		static $phpLDAPinstalled = true;
		if (!$phpLDAPinstalled) {
			return false;
		}
		if (!$this->ignoreValidation && !$this->configured) {
			Util::writeLog(
				'user_ldap',
				'Configuration is invalid, cannot connect',
				Util::WARN
			);
			return false;
		}
		if (!$this->ldapConnectionRes) {
			if (!$this->getLDAP()->areLDAPFunctionsAvailable()) {
				$phpLDAPinstalled = false;
				Util::writeLog(
					'user_ldap',
					'function ldap_connect is not available. Make '.
									'sure that the PHP ldap module is installed.',
					Util::ERROR
				);

				return false;
			}
			if ($this->configuration->turnOffCertCheck) {
				if (\putenv('LDAPTLS_REQCERT=never')) {
					Util::writeLog(
						'user_ldap',
						'Turned off SSL certificate validation successfully.',
						Util::DEBUG
					);
				} else {
					Util::writeLog(
						'user_ldap',
						'Could not turn off SSL certificate validation.',
						Util::WARN
					);
				}
			}

			try {
				// skip contacting main server after failed connection attempt
				// until cache TTL is reached
				if (\trim($this->configuration->ldapBackupHost) === ""
					|| (!$this->configuration->ldapOverrideMainServer
					&& !$this->getFromCache('overrideMainServer'))
				) {
					$this->doConnect(
						$this->configuration->ldapHost,
						$this->configuration->ldapPort
					);
					if (@$this->ldap->bind(
						$this->ldapConnectionRes,
						$this->configuration->ldapAgentName,
						$this->configuration->ldapAgentPassword
					)
					) {
						return true;
					}
					Util::writeLog(
						'user_ldap',
						'Bind failed: ' . $this->getLDAP()->errno($this->ldapConnectionRes) . ': ' . $this->getLDAP()->error($this->ldapConnectionRes),
						Util::DEBUG
					);
					throw new BindFailedException();
				}
			} catch (ServerNotAvailableException $e) {
				if (\trim($this->configuration->ldapBackupHost) === "") {
					throw $e;
				}
			} catch (BindFailedException $e) {
				if (\trim($this->configuration->ldapBackupHost) === "") {
					throw $e;
				}
			}

			if (\trim($this->configuration->ldapBackupHost) === "") {
				$this->ldapConnectionRes = null;
				return false;
			}

			// try the Backup (Replica!) Server
			Util::writeLog(
				'user_ldap',
				'Trying to connect to backup server '.$this->configuration->ldapBackupHost.':'.$this->configuration->ldapBackupPort,
				Util::DEBUG
			);
			$this->doConnect(
				$this->configuration->ldapBackupHost,
				$this->configuration->ldapBackupPort
			);
			if (@$this->ldap->bind(
				$this->ldapConnectionRes,
				$this->configuration->ldapAgentName,
				$this->configuration->ldapAgentPassword
			)
			) {
				if (!$this->getFromCache('overrideMainServer')) {
					//when bind to backup server succeeded and failed to main server,
					//skip contacting him until next cache refresh
					$this->writeToCache('overrideMainServer', true);
				}
				return true;
			}
			Util::writeLog(
				'user_ldap',
				'Bind to backup server failed: ' . $this->getLDAP()->errno($this->ldapConnectionRes) . ': ' . $this->getLDAP()->error($this->ldapConnectionRes),
				Util::DEBUG
			);
			throw new BindFailedException();
		}
		return null;
	}

	/**
	 * This method will perform some setup required to connect to the LDAP server,
	 * but it won't connect to the LDAP server unless ldap_start_tls is activated
	 *
	 * @param string $host
	 * @param string $port
	 * @return bool
	 * @throws \OC\ServerNotAvailableException
	 */
	private function doConnect($host, $port) {
		if ($host === '') {
			return false;
		}
		// Returns a link resource on success, otherwise false
		$this->ldapConnectionRes = $this->getLDAP()->connect($host, $port);
		if ($this->getLDAP()->setOption($this->ldapConnectionRes, (string)LDAP_OPT_PROTOCOL_VERSION, 3)) {
			if ($this->getLDAP()->setOption($this->ldapConnectionRes, (string)LDAP_OPT_REFERRALS, 0)) {
				if ($this->configuration->ldapTLS) {
					$this->getLDAP()->startTls($this->ldapConnectionRes);
				}
			}
		} else {
			throw new ServerNotAvailableException('Could not set required LDAP Protocol version.');
		}
		// Set network timeout threshold to avoid long delays when ldap server cannot be resolved
		$this->getLDAP()->setOption($this->ldapConnectionRes, (string)LDAP_OPT_NETWORK_TIMEOUT, \intval($this->configuration->ldapNetworkTimeout));
		$this->getLDAP()->setOption($this->ldapConnectionRes, (string)LDAP_OPT_TIMEOUT, \intval($this->configuration->ldapNetworkTimeout));
		if (!$this->getLDAP()->isResource($this->ldapConnectionRes)) {
			$this->ldapConnectionRes = null; // to indicate it really is not set, connect() might have set it to false
			throw new ServerNotAvailableException("Connect to $host:$port failed");
		}
		return true;
	}

	/**
	 * Binds to LDAP
	 * @throws \OC\ServerNotAvailableException
	 */
	public function bind() {
		if (!$this->configuration->ldapConfigurationActive) {
			return false;
		}

		// binding is done via getConnectionResource()
		$cr = $this->getConnectionResource();

		if (!$this->getLDAP()->isResource($cr)) {
			return false;
		}
		return true;
	}
}
