<?php
/**
 * @author Alexander Bergolth <leo@strike.wu.ac.at>
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Benjamin Diele <benjamin@diele.be>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lorenzo M. Catucci <lorenzo@sancho.ccd.uniroma2.it>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Lyonel Vincent <lyonel@ezix.org>
 * @author Mario Kolling <mario.kolling@serpro.gov.br>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Nicolas Grekas <nicolas.grekas@gmail.com>
 * @author Ralph Krimmel <rkrimme1@gwdg.de>
 * @author Renaud Fortier <Renaud.Fortier@fsaa.ulaval.ca>
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

use OCA\User_LDAP\Exceptions\BindFailedException;
use OCA\User_LDAP\User\IUserTools;
use OCA\User_LDAP\User\Manager;
use OCA\User_LDAP\Mapping\AbstractMapping;
use OCA\User_LDAP\Attributes\ConverterHub;
use OCP\Util;

/**
 * Class Access
 *
 * Also responsible for normalizing DNs in ldap api request results
 *
 * @package OCA\User_LDAP
 */
class Access implements IUserTools {
	/**
	 * @var \OCA\User_LDAP\Connection
	 */
	public $connection;
	public $userManager;
	//never ever check this var directly, always use getPagedSearchResultState
	protected $pagedSearchedSuccessful;

	/**
	 * @var string[] $cookies an array of returned Paged Result cookies
	 */
	protected $cookies = [];

	/**
	 * @var string $lastCookie the last cookie returned from a Paged Results
	 * operation, defaults to an empty string
	 */
	protected $lastCookie = '';

	/**
	 * @var AbstractMapping $userMapper
	 */
	protected $userMapper;

	/**
	* @var AbstractMapping $userMapper
	*/
	protected $groupMapper;

	public function __construct(Connection $connection, Manager $userManager) {
		$this->connection = $connection;
		$this->userManager = $userManager;
		$this->userManager->setLdapAccess($this);
	}

	/**
	 * sets the User Mapper
	 * @param AbstractMapping $mapper
	 */
	public function setUserMapper(AbstractMapping $mapper) {
		$this->userMapper = $mapper;
	}

	/**
	 * returns the User Mapper
	 * @throws \BadMethodCallException
	 * @return AbstractMapping
	 */
	public function getUserMapper() {
		if ($this->userMapper === null) {
			throw new \BadMethodCallException('UserMapper was not assigned to this Access instance.');
		}
		return $this->userMapper;
	}

	/**
	 * returns the user Manager
	 * @return Manager
	 */
	public function getUserManager() {
		return $this->userManager;
	}

	/**
	 * sets the Group Mapper
	 * @param AbstractMapping $mapper
	 */
	public function setGroupMapper(AbstractMapping $mapper) {
		$this->groupMapper = $mapper;
	}

	/**
	 * returns the Group Mapper
	 * @throws \BadMethodCallException
	 * @return AbstractMapping
	 */
	public function getGroupMapper() {
		if ($this->groupMapper === null) {
			throw new \BadMethodCallException('GroupMapper was not assigned to this Access instance.');
		}
		return $this->groupMapper;
	}

	/**
	 * @return bool
	 */
	private function checkConnection() {
		return ($this->connection instanceof Connection);
	}

	/**
	 * returns the Connection instance
	 * @return \OCA\User_LDAP\Connection
	 */
	public function getConnection() {
		return $this->connection;
	}

	/**
	 * returns the Connection instance
	 * @return \OCA\User_LDAP\ILDAPWrapper
	 */
	private function getLDAP() {
		return $this->getConnection()->getLDAP();
	}

	/**
	 * reads a given attribute for an LDAP record identified by a DN
	 *
	 * @param string $dn the record in question
	 * @param string $attr the attribute that shall be retrieved
	 *        if empty, just check the record's existence
	 * @param string $filter
	 * @return array|false an array of values on success or an empty
	 *          array if $attr is empty, false otherwise
	 * @throws \OC\ServerNotAvailableException
	 */
	public function readAttribute($dn, $attr, $filter = 'objectClass=*') {
		if (!$this->checkConnection()) {
			\OC::$server->getLogger()->warning(
				'No LDAP Connector assigned, access impossible for readAttribute.',
				['app' => 'user_ldap']
			);
			return false;
		}
		$cr = $this->connection->getConnectionResource();
		if (!$this->getLDAP()->isResource($cr)) {
			//LDAP not available
			\OC::$server->getLogger()->debug(
				'LDAP resource not available.',
				['app' => 'user_ldap']
			);
			return false;
		}
		//Cancel possibly running Paged Results operation, otherwise we run in
		//LDAP protocol errors
		$this->abandonPagedSearch();
		// openLDAP requires that we init a new Paged Search. Not needed by AD,
		// but does not hurt either.
		$pagingSize = (int)$this->connection->ldapPagingSize;
		// 0 won't result in replies, small numbers may leave out groups
		// (cf. #12306), 500 is default for paging and should work everywhere.
		if ($pagingSize > 20) {
			$maxResults = $pagingSize;
		} else {
			$maxResults = 500;
		}
		$attr = \mb_strtolower($attr, 'UTF-8');
		// the actual read attribute later may contain parameters on a ranged
		// request, e.g. member;range=99-199. Depends on server reply.
		$attrToRead = $attr;

		$values = [];
		$isRangeRequest = false;
		do {
			$result = $this->executeRead($cr, $dn, $attrToRead, $filter, $maxResults);
			if (\is_bool($result)) {
				// when an exists request was run and it was successful, an empty
				// array must be returned
				if ($result) {
					return [];
				}
				return false;
			}

			if (!$isRangeRequest) {
				$values = $this->extractAttributeValuesFromResult($result, $attr);
				if (!empty($values)) {
					return $values;
				}
			}

			$isRangeRequest = false;
			$result = $this->extractRangeData($result, $attr);
			if (!empty($result)) {
				$normalizedResult = $this->extractAttributeValuesFromResult(
					[ $attr => $result['values'] ],
					$attr
				);
				$values = \array_merge($values, $normalizedResult);

				if ($result['rangeHigh'] === '*') {
					// when server replies with * as high range value, there are
					// no more results left
					return $values;
				}
				$low  = $result['rangeHigh'] + 1;
				$attrToRead = "{$result['attributeName']};range=$low-*";
				$isRangeRequest = true;
			}
		} while ($isRangeRequest);

		\OC::$server->getLogger()->debug(
			"Requested attribute $attr not found for $dn",
			['app' => 'user_ldap']
		);
		return false;
	}

	/**
	 * Runs an read operation against LDAP
	 *
	 * @param resource $cr the LDAP connection
	 * @param string $dn
	 * @param string|array $attributes
	 * @param string $filter
	 * @param int $maxResults
	 * @return array|bool false if there was any error, true if an exists check
	 *                    was performed and the requested DN found, array with the
	 *                    returned data on a successful usual operation
	 * @throws \OC\ServerNotAvailableException
	 */
	public function executeRead($cr, $dn, $attributes, $filter, $maxResults) {
		if (\is_string($attributes)) {
			$attributes = [$attributes];
		}
		$this->initPagedSearch($filter, [$dn], $attributes, $maxResults, 0);
		$dn = $this->DNasBaseParameter($dn);
		$rr = @$this->getLDAP()->read($cr, $dn, $filter, $attributes);
		if (!$this->getLDAP()->isResource($rr)) {
			if (\count($attributes) === 1 && $attributes[0] === '') {
				//do not throw this message on userExists check, irritates
				\OC::$server->getLogger()->debug(
					"readAttribute failed for DN $dn",
					['app' => 'user_ldap']
				);
			}
			//in case an error occurs , e.g. object does not exist
			return false;
		}
		if ($attributes[0] === '' && ($filter === 'objectclass=*' || $this->getLDAP()->countEntries($cr, $rr) === 1)) {
			\OC::$server->getLogger()->debug(
				"readAttribute: $dn found",
				['app' => 'user_ldap']
			);
			return true;
		}
		$er = $this->getLDAP()->firstEntry($cr, $rr);
		if (!$this->getLDAP()->isResource($er)) {
			//did not match the filter, return false
			return false;
		}
		//LDAP attributes are not case sensitive
		$result = Util::mb_array_change_key_case(
			$this->getLDAP()->getAttributes($cr, $er),
			MB_CASE_LOWER,
			'UTF-8'
		);

		if (!\array_key_exists('dn', $result)
			&& \in_array('dn', $attributes, true)
		) {
			// add in DN to results
			$rawDn = $this->getLDAP()->getDN($cr, $er);
			$normalizedDn = Helper::normalizeDN($rawDn);
			$result['dn'] = ['count' => 1, 0 => $normalizedDn];
			$result[] = 'dn';
			$result['count']++;
		}

		return $result;
	}

	/**
	 * Normalizes a result grom getAttributes(), i.e. handles DNs and binary
	 * data if present.
	 *
	 * @param array $result from ILDAPWrapper::getAttributes()
	 * @param string $attribute the attribute name that was read
	 * @return string[]
	 * @throws \OutOfBoundsException
	 */
	public function extractAttributeValuesFromResult($result, $attribute) {
		$values = [];
		if (isset($result[$attribute]) && $result[$attribute]['count'] > 0) {
			$lowercaseAttribute = \strtolower($attribute);
			$converterHub = ConverterHub::getDefaultConverterHub();
			for ($i=0; $i<$result[$attribute]['count']; $i++) {
				if ($this->resemblesDN($attribute)) {
					$values[] = Helper::normalizeDN($result[$attribute][$i]);
				} elseif ($converterHub->hasConverter($lowercaseAttribute)) {
					$values[] = $converterHub->bin2str($lowercaseAttribute, $result[$attribute][$i]);
				} else {
					$values[] = $result[$attribute][$i];
				}
			}
		}
		return $values;
	}

	/**
	 * Attempts to find ranged data in a getAttribute results and extracts the
	 * returned values as well as information on the range and full attribute
	 * name for further processing.
	 *
	 * @param array $result from ILDAPWrapper::getAttributes()
	 * @param string $attribute the attribute name that was read. Without ";range=…"
	 * @return array If a range was detected with keys 'values', 'attributeName',
	 *               'attributeFull' and 'rangeHigh', otherwise empty.
	 */
	public function extractRangeData($result, $attribute) {
		foreach ($result as $key => $value) {
			if ($key !== $attribute && \strpos($key, $attribute) === 0) {
				$queryData = \explode(';', $key);
				if (\strpos($queryData[1], 'range=') === 0) {
					$high = \substr($queryData[1], 1 + \strpos($queryData[1], '-'));
					$data = [
						'values' => $value,
						'attributeName' => $queryData[0],
						'attributeFull' => $key,
						'rangeHigh' => $high,
					];
					return $data;
				}
			}
		}
		return [];
	}

	/**
	 * checks whether the given attributes value is probably a DN
	 * @param string $attr the attribute in question
	 * @return boolean if so true, otherwise false
	 */
	private function resemblesDN($attr) {
		$resemblingAttributes = [
			'dn',                     // http://www.alvestrand.no/objectid/2.5.4.49.html
			'uniquemember',           // http://www.alvestrand.no/objectid/2.5.4.50.html
			'member',                 // http://www.alvestrand.no/objectid/2.5.4.31.html
			// memberOf is an "operational" attribute, without a definition in any RFC
			'memberof'
			/* there are other attributes that contain a dn, but we only need
			   the above to determine membership of users and groups
			'manager',                // http://www.alvestrand.no/objectid/0.9.2342.19200300.100.1.10.html
			'owner',                  // http://www.alvestrand.no/objectid/2.5.4.32.html
			'targetService',          // http://www.alvestrand.no/objectid/1.3.18.0.2.4.131.html
			'nameandoptionaluid',     // http://www.alvestrand.no/objectid/1.3.6.1.4.1.1466.115.121.1.34.html
			'modifiersname',          // http://www.alvestrand.no/objectid/2.5.18.4.html
			'aliasedentryname',       // http://www.alvestrand.no/objectid/2.5.4.1.html
			'roleoccupant',           // http://www.alvestrand.no/objectid/2.5.4.33.html
			'seealso',                // http://www.alvestrand.no/objectid/2.5.4.34.html
			'creatorsname',           // http://www.alvestrand.no/objectid/2.5.18.3.html
			'subschemasubentry',      // http://www.alvestrand.no/objectid/2.5.18.10.html
			'contextdefaultsubentry', // http://www.alvestrand.no/objectid/2.5.18.13.html
			'associatedorganization', // http://www.alvestrand.no/objectid/2.16.840.1.101.2.2.1.4.html
			'associatedpla',          // http://www.alvestrand.no/objectid/2.16.840.1.101.2.2.1.6.html
			'aliaspointer',           // http://www.alvestrand.no/objectid/2.16.840.1.101.2.2.1.49.html
			'listpointer',            // http://www.alvestrand.no/objectid/2.16.840.1.101.2.2.1.61.html
			*/
		];
		return \in_array($attr, $resemblingAttributes, true);
	}

	/**
	 * returns a DN-string that is cleaned from not domain parts, e.g.
	 * cn=foo,cn=bar,dc=foobar,dc=server,dc=org
	 * becomes dc=foobar,dc=server,dc=org
	 * @param string $dn
	 * @return string
	 */
	public function getDomainDNFromDN($dn) {
		$allParts = $this->getLDAP()->explodeDN($dn, 0);
		if ($allParts === false) {
			//not a valid DN
			return '';
		}
		$domainParts = [];
		$dcFound = false;
		foreach ($allParts as $part) {
			if (!$dcFound && \strpos($part, 'dc=') === 0) {
				$dcFound = true;
			}
			if ($dcFound) {
				$domainParts[] = $part;
			}
		}
		return \implode(',', $domainParts);
	}

	/**
	 * returns the LDAP DN for the given internal ownCloud name of the group
	 * @param string $name the ownCloud name in question
	 * @return string|false LDAP DN on success, otherwise false
	 */
	public function groupname2dn($name) {
		return $this->groupMapper->getDNByName($name);
	}

	/**
	 * returns the LDAP DN for the given internal ownCloud name of the user
	 * @param string $name the ownCloud name in question
	 * @return string|false with the LDAP DN on success, otherwise false
	 */
	public function username2dn($name) {
		$fdn = $this->userMapper->getDNByName($name);

		//Check whether the DN belongs to the Base, to avoid issues on multi-
		//server setups
		if (\is_string($fdn)) {
			if ($this->isDNPartOfBase($fdn, $this->connection->ldapBaseUsers)) {
				return $fdn;
			}
			\OC::$server->getLogger()->debug(
				"DN <$fdn> outside configured base domains:".
				\print_r($this->connection->ldapBaseUsers, true).
				" on {$this->connection->ldapHost}",
				['app' => 'user_ldap']
			);
		} else {
			\OC::$server->getLogger()->debug(
				"No DN found for <$name> on {$this->connection->ldapHost}",
				['app' => 'user_ldap']
			);
		}

		return false;
	}

	/**
	 * returns the internal ownCloud name for the given LDAP DN of the group, false on DN outside of search DN or failure
	 *
	 * @param string $fdn the dn of the group object
	 * @return string|false with the name to use in ownCloud, false on DN outside of search DN
	 * @throws \OC\ServerNotAvailableException
	 */
	public function dn2groupname($fdn) {
		//To avoid bypassing the base DN settings under certain circumstances
		//with the group support, check whether the provided DN matches one of
		//the given Bases
		if (!$this->isDNPartOfBase($fdn, $this->connection->ldapBaseGroups)) {
			return false;
		}

		return $this->dn2ocname($fdn, false);
	}

	/**
	 * accepts an array of group DNs and tests whether they match the user
	 * filter by doing read operations against the group entries. Returns an
	 * array of DNs that match the filter.
	 *
	 * @param string[] $groupDNs
	 * @return string[]
	 * @throws \OC\ServerNotAvailableException
	 */
	public function groupsMatchFilter($groupDNs) {
		$validGroupDNs = [];
		foreach ($groupDNs as $dn) {
			$cacheKey = "groupsMatchFilter-$dn";
			$groupMatchFilter = $this->connection->getFromCache($cacheKey);
			if ($groupMatchFilter !== null) {
				if ($groupMatchFilter) {
					$validGroupDNs[] = $dn;
				}
				continue;
			}

			// Check the base DN first. If this is not met already, we don't
			// need to ask the server at all.
			if (!$this->isDNPartOfBase($dn, $this->connection->ldapBaseGroups)) {
				$this->connection->writeToCache($cacheKey, false);
				continue;
			}

			$result = $this->readAttribute($dn, 'cn', $this->connection->ldapGroupFilter);
			if (\is_array($result)) {
				$this->connection->writeToCache($cacheKey, true);
				$validGroupDNs[] = $dn;
			} else {
				$this->connection->writeToCache($cacheKey, false);
			}
		}
		return $validGroupDNs;
	}

	/**
	 * returns the internal ownCloud name for the given LDAP DN of the user, false on DN outside of search DN or failure
	 *
	 * @param string $fdn the dn of the user object
	 * @return string|false with with the name to use in ownCloud
	 * @throws \OC\ServerNotAvailableException
	 */
	public function dn2username($fdn) {
		//To avoid bypassing the base DN settings under certain circumstances
		//with the group support, check whether the provided DN matches one of
		//the given Bases
		if (!$this->isDNPartOfBase($fdn, $this->connection->ldapBaseUsers)) {
			return false;
		}

		return $this->dn2ocname($fdn, true);
	}

	/**
	 * returns an internal ownCloud name for the given LDAP DN, false on DN outside of search DN
	 *
	 * @param string $fdn the dn of the user object
	 * @param bool $isUser optional, whether it is a user object (otherwise group assumed)
	 * @return string|false with with the name to use in ownCloud
	 * @throws \BadMethodCallException
	 * @throws \OC\ServerNotAvailableException
	 */
	public function dn2ocname($fdn, $isUser = true) {
		if ($isUser) {
			$mapper = $this->getUserMapper();
			$nameAttribute = (string)$this->connection->ldapExpertUsernameAttr;
		} else {
			$mapper = $this->getGroupMapper();
			$nameAttribute = (string)$this->connection->ldapExpertGroupnameAttr;
		}

		//let's try to retrieve the ownCloud name from the mappings table
		$ocName = $mapper->getNameByDN($fdn);
		if (\is_string($ocName)) {
			return $ocName;
		}

		//second try: get the UUID and check if it is known. Then, update the DN and return the name.
		$uuid = $this->getUUID($fdn, $isUser);
		if (\is_string($uuid)) {
			$ocName = $mapper->getNameByUUID($uuid);
			if (\is_string($ocName)) {
				$mapper->setDNbyUUID($fdn, $uuid);
				return $ocName;
			}
		} else {
			//If the UUID can't be detected something is foul.
			\OC::$server->getLogger()->error(
				"Cannot determine UUID for $fdn. Skipping.",
				['app' => 'user_ldap']
			);
			return false;
		}

		if ($nameAttribute !== '') {
			$name = $this->readAttribute($fdn, $nameAttribute);
			$name = $name[0];
		} else {
			$name = $uuid;
		}

		$intName = $name;
		if ($isUser) {
			$intName = $this->sanitizeUsername($name);
		}

		//a new user/group! Add it only if it doesn't conflict with other backend's users or existing groups
		//disabling Cache is required to avoid that the new user is cached as not-existing in fooExists check
		//NOTE: mind, disabling cache affects only this instance! Using it
		// outside of core user management will still cache the user as non-existing.
		$originalTTL = $this->connection->ldapCacheTTL;
		$this->connection->setConfiguration(['ldapCacheTTL' => 0]);
		if (($isUser && $this->shouldMapToUsername($intName))
			|| (!$isUser && $this->shouldMapToGroupname($intName))) {
			\OC::$server->getLogger()->info("Reusing existing mapping for ownCloud identifer: $intName to LDAP UUID: $uuid", ['app' => 'user_ldap']);
			if ($mapper->map($fdn, $intName, $uuid)) {
				$this->connection->setConfiguration(['ldapCacheTTL' => $originalTTL]);
				return $intName;
			}
		}
		$this->connection->setConfiguration(['ldapCacheTTL' => $originalTTL]);
		\OC::$server->getLogger()->error("Mapping collision for DN $fdn and UUID $uuid. Couldn't map to identifer: $intName", ['app' => 'user_ldap']);
		//if everything else did not help..
		return false;
	}

	/**
	 * Determines if we should store a mapping to this ownCloud account or not
	 * @param string $username
	 * @return bool
	 */
	public function shouldMapToUsername($username) {
		$user = \OC::$server->getUserManager()->get($username);
		if ($user === null) {
			\OC::$server->getLogger()->info("No account exists with username: $username so cannot reuse mapping", ['app' => 'user_ldap']);
			// No account exists with this username, use this mapping
			return true;
		}
		if ($user->getBackendClassName() === 'LDAP' && \OC::$server->getConfig()->getAppValue('user_ldap', 'reuse_accounts', 'no') === 'yes') {
			// Account with same username exists, and matching backend, we can use this - merge
			return true;
		}

		// Account exists, but is from a different backend, don't use this mapping!
		\OC::$server->getLogger()->error("Cannot reuse account with username: $username because it is from a different backend: {$user->getBackendClassName()}", ['app' => 'user_ldap']);
		return false;
	}

	public function shouldMapToGroupname($groupname) {
		$group = \OC::$server->getGroupManager()->get($groupname);
		if ($group === null) {
			\OC::$server->getLogger()->info("No account exists with groupname: $groupname so cannot reuse mapping", ['app' => 'user_ldap']);
			// No account exists with this groupname, use this mapping
			return true;
		}
		$groupBackend = $group->getBackend();
		$groupBackendClass = \get_class($groupBackend);
		if (($groupBackendClass === \OCA\User_LDAP\Group_LDAP::class || $groupBackendClass === \OCA\User_LDAP\Group_Proxy::class)
				&& \OC::$server->getConfig()->getAppValue('user_ldap', 'reuse_accounts', 'no') === 'yes') {
			// Account with same groupname exists, and matching backend, we can use this - merge
			return true;
		}

		// Account exists, but is from a different backend, don't use this mapping!
		\OC::$server->getLogger()->error("Cannot reuse account with groupname: $groupname because it is from a different backend: {$groupBackendClass}", ['app' => 'user_ldap']);
		return false;
	}

	/**
	 * gives back the user names as they are used ownClod internally
	 *
	 * @param array $ldapUsers as returned by fetchList()
	 * @return array an array with the user names to use in ownCloud
	 *
	 * gives back the user names as they are used ownClod internally
	 * @throws \OC\ServerNotAvailableException
	 */
	public function ownCloudUserNames($ldapUsers) {
		return $this->ldap2ownCloudNames($ldapUsers, true);
	}

	/**
	 * gives back the group names as they are used ownClod internally
	 *
	 * @param array $ldapGroups as returned by fetchList()
	 * @return array an array with the group names to use in ownCloud
	 *
	 * gives back the group names as they are used ownClod internally
	 * @throws \OC\ServerNotAvailableException
	 */
	public function ownCloudGroupNames($ldapGroups) {
		return $this->ldap2ownCloudNames($ldapGroups, false);
	}

	/**
	 * @param array $ldapObjects as returned by fetchList()
	 * @param bool $isUsers
	 * @return array
	 * @throws \OC\ServerNotAvailableException
	 */
	private function ldap2ownCloudNames($ldapObjects, $isUsers) {
		$ownCloudNames = [];

		foreach ($ldapObjects as $ldapObject) {
			$ocName = $this->dn2ocname($ldapObject['dn'][0], $isUsers);
			if ($ocName) {
				$ownCloudNames[$ldapObject['dn'][0]] = $ocName;
			}
		}
		return $ownCloudNames;
	}

	/**
	 * caches the user display name
	 * @param string $ocName the internal ownCloud username
	 * @param string|false $home the home directory path
	 */
	public function cacheUserHome($ocName, $home) {
		$cacheKey = "getHome$ocName";
		$this->connection->writeToCache($cacheKey, $home);
	}

	/**
	 * caches a user as existing
	 * @param string $ocName the internal ownCloud username
	 */
	public function cacheUserExists($ocName) {
		$this->connection->writeToCache("userExists$ocName", true);
	}

	/**
	 * fetches a list of users according to a provided loginName and utilizing
	 * the login filter.
	 *
	 * @param string $loginName
	 * @param array $attributes optional, list of attributes to read
	 * @return array
	 * @throws \OC\ServerNotAvailableException
	 */
	public function fetchUsersByLoginName($loginName, array $attributes = ['dn']) {
		$loginName = $this->escapeFilterPart($loginName);
		$filter = \str_replace('%uid', $loginName, $this->connection->ldapLoginFilter);
		return $this->fetchListOfUsers($filter, $attributes);
	}

	/**
	 * counts the number of users according to a provided loginName and
	 * utilizing the login filter.
	 *
	 * @param string $loginName
	 * @return int|false
	 * @throws \OC\ServerNotAvailableException
	 */
	public function countUsersByLoginName($loginName) {
		$loginName = $this->escapeFilterPart($loginName);
		$filter = \str_replace('%uid', $loginName, $this->connection->ldapLoginFilter);
		return $this->countUsers($filter);
	}

	/**
	 * fetches a list of users according to a provided filter and attributes
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter
	 * @param string|string[] $attr
	 * @param int $limit
	 * @param int $offset
	 * @return array if only on attr is returned
	 * @throws \OC\ServerNotAvailableException
	 */
	public function fetchListOfUsers($filter, $attr, $limit = null, $offset = null) {
		$ldapRecords = $this->searchUsers($filter, $attr, $limit, $offset);
		return $this->fetchList($ldapRecords, \count($attr) > 1);
	}

	/**
	 * fetches a list of groups according to a provided filter and attributes
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter
	 * @param string|string[] $attr
	 * @param int $limit
	 * @param int $offset
	 * @return array
	 * @throws \OC\ServerNotAvailableException
	 */
	public function fetchListOfGroups($filter, $attr, $limit = null, $offset = null) {
		return $this->fetchList($this->searchGroups($filter, $attr, $limit, $offset), \count($attr) > 1);
	}

	/**
	 * If count($attr) > 1 the result will be an array like this:
	 *
	 *	Array
	 *	(
	 *		[0] => Array
	 *		(
	 *			[dn] => Array
	 *			(
	 *				[0] => uid=zombie4000,ou=zombies,dc=owncloud,dc=com
	 *			)
	 *
	 *			[uid] => Array
	 *			(
	 *				[0] => zombie4000
	 *			)
	 *
	 *			[mail] => Array
	 *			(
	 *				[0] => zombie4000@example.org
	 *			)
	 *
	 *  	)
	 *
	 *		[1] => Array
	 *		(
	 *			[dn] => Array
	 *			(
	 *				[0] => uid=zombie40000,ou=zombies,dc=owncloud,dc=com
	 *			)
	 *
	 *			[uid] => Array
	 *			(
	 *				[0] => zombie40000
	 *			)
	 *
	 *			[mail] => Array
	 *			(
	 *				[0] => zombie40000@example.org
	 *			)
	 *
	 *		)
	 * 		...
	 *
	 * Otherwise, eg. if $attr is ['dn'] it will be reduced to this
	 *
	 *  Array
	 *	(
	 *		[0] => uid=zombie4000,ou=zombies,dc=owncloud,dc=com
	 *		[1] => uid=zombie40000,ou=zombies,dc=owncloud,dc=com
	 *		[2] => uid=zombie40001,ou=zombies,dc=owncloud,dc=com
	 * 		...
	 *
	 * TODO this actually reduces the list if
	 * FIXME was private
	 * @param array $list
	 * @param bool $manyAttributes
	 * @return array
	 */
	private function fetchList($list, $manyAttributes) {
		if (\is_array($list)) {
			if ($manyAttributes) {
				return $list;
			}
			$list = \array_reduce($list, function ($carry, $item) {
				$attribute = \array_keys($item)[0];
				$carry[] = $item[$attribute][0];
				return $carry;
			}, []);
			return \array_unique($list, SORT_LOCALE_STRING);
		}

		//error cause actually, maybe throw an exception in future.
		return [];
	}

	/**
	 * executes an LDAP search, optimized for Users
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param string|string[] $attr optional, when a certain attribute shall be filtered out
	 * @param integer $limit
	 * @param integer $offset
	 * @return array with the search result
	 *
	 * Executes an LDAP search
	 * @throws \OC\ServerNotAvailableException
	 */
	public function searchUsers($filter, $attr = null, $limit = null, $offset = null) {
		$entries = [];
		if ($offset !== null && $offset > 0) {
			// when using paginated search on subsequent pages that require valid
			// paging cookies, we need to use single base search - this behaviour is similar to
			// using separate ldap backend and avoids cookie invalidation
			foreach ($this->connection->ldapBaseUsers as $base) {
				foreach ($this->search($filter, [$base], $attr, $limit, $offset) as $entry) {
					$entries[] = $entry;
				}
			}
		} else {
			// simple search without pagination
			$entries = $this->search($filter, $this->connection->ldapBaseUsers, $attr, $limit, $offset);
		}
		return $entries;
	}

	/**
	 * executes an simplified LDAP search to count users, optimized for Users
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter
	 * @param string|string[] $attr
	 * @param int $limit
	 * @param int $offset
	 * @return false|int
	 * @throws \OC\ServerNotAvailableException
	 */
	public function countUsers($filter, $attr = ['dn'], $limit = null, $offset = null) {
		// counting does not support multiple bases, we have to count each
		// base separately (as in case of separate ldap backends)
		$entries = 0;
		foreach ($this->connection->ldapBaseUsers as $base) {
			$e = $this->count($filter, [$base], $attr, $limit, $offset);
			$entries += $e;
		}
		return $entries;
	}

	/**
	 * executes an LDAP search, optimized for Groups
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param string|string[] $attr optional, when a certain attribute shall be filtered out
	 * @param integer $limit
	 * @param integer $offset
	 * @return array with the search result
	 *
	 * @throws \OC\ServerNotAvailableException
	 */
	public function searchGroups($filter, $attr = null, $limit = null, $offset = null) {
		if ($offset !== null && $offset > 0) {
			// when using paginated search on subsequent pages that require valid
			// paging cookies, we need to use single base search - this behaviour is similar to
			// using separate ldap backend and avoids cookie invalidation
			$entries = [];
			foreach ($this->connection->ldapBaseGroups as $base) {
				foreach ($this->search($filter, [$base], $attr, $limit, $offset) as $entry) {
					$entries[] = $entry;
				}
			}
		} else {
			// simple search without pagination
			$entries = $this->search($filter, $this->connection->ldapBaseGroups, $attr, $limit, $offset);
		}
		return $entries;
	}

	/**
	 * returns the number of available groups
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $filter the LDAP search filter
	 * @param string[] $attr optional
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return int|bool
	 * @throws \OC\ServerNotAvailableException
	 */
	public function countGroups($filter, $attr = ['dn'], $limit = null, $offset = null) {
		// counting does not support multiple bases, we have to count each
		// base separately (as in case of separate ldap backends)
		$entries = 0;
		foreach ($this->connection->ldapBaseGroups as $base) {
			$e = $this->count($filter, [$base], $attr, $limit, $offset);
			$entries += $e;
		}
		return $entries;
	}

	/**
	 * returns the number of available objects on the base DN
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs in this server,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return int|bool
	 * @throws \OC\ServerNotAvailableException
	 */
	public function countObjects($limit = null, $offset = null) {
		// counting does not support multiple bases, we have to count each
		// base separately (as in case of separate ldap backends)
		$entries = 0;
		foreach ($this->connection->ldapBase as $base) {
			$e = $this->count('objectclass=*', [$base], ['dn'], $limit, $offset);
			$entries += $e;
		}
		return $entries;
	}

	/**
	 * returns the available objects on the base DN,
	 * results will according to the order in the array.
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param string[] $base an array containing the LDAP subtree(s) that shall be searched
	 * @param string[] $attr optional, when a certain attribute shall be filtered outside
	 * @param int $limit optional, maximum results to be counted
	 * @param int $offset optional, a starting point
	 * @return array|false array with the search result as first value and pagedSearchOK as
	 * second | false if not successful
	 * @throws \OC\ServerNotAvailableException
	 */
	private function executeSearch($filter, array $base, &$attr = null, $limit = null, $offset = null) {
		if ($attr !== null && !\is_array($attr)) {
			$attr = [\mb_strtolower($attr, 'UTF-8')];
		}

		// See if we have a resource, in case not cancel with message
		$cr = $this->connection->getConnectionResource();
		if (!$this->getLDAP()->isResource($cr)) {
			// Seems like we didn't find any resource.
			// Return an empty array just like before.
			\OC::$server->getLogger()->debug(
				'Could not search, because resource is missing.',
				['app' => 'user_ldap']
			);
			return false;
		}

		//check whether paged search should be attempted
		$pagedSearchOK = $this->initPagedSearch($filter, $base, $attr, (int)$limit, $offset);

		$linkResources = \array_pad([], \count($base), $cr);
		$sr = $this->getLDAP()->search($linkResources, $base, $filter, $attr); /** @phpstan-ignore-line */
		$error = $this->getLDAP()->errno($cr);
		if (!\is_array($sr) || (string)$error !== '0') {
			\OC::$server->getLogger()->error(
				'Error when searching: '.$this->getLDAP()->error($cr).
				' code '.$this->getLDAP()->errno($cr),
				['app' => 'user_ldap']
			);
			\OC::$server->getLogger()->error(
				'Attempt for Paging?  '.\print_r($pagedSearchOK, true),
				['app' => 'user_ldap']
			);
			return false;
		}

		return [$sr, $pagedSearchOK];
	}

	/**
	 * processes an LDAP paged search operation
	 *
	 * @param array $sr the array containing the LDAP search resources
	 * @param string $filter the LDAP filter for the search
	 * @param array $base an array containing the LDAP subtree(s) that shall be searched
	 * @param int $iFoundItems number of results in the search operation
	 * @param int $limit maximum results to be counted
	 * @param int $offset a starting point
	 * @param bool $pagedSearchOK whether a paged search has been executed
	 * @param bool $skipHandling required for paged search when cookies to
	 * prior results need to be gained
	 * @return array 0 => bool cookie validity, true if we have more pages, false otherwise.
	 *               1 => estimate for every result. if 0 server just might not support estimates
	 * @throws \OC\ServerNotAvailableException
	 */
	private function processPagedSearchStatus($sr, $filter, $base, $iFoundItems, $limit, $offset, $pagedSearchOK, $skipHandling) {
		$cookie = null;
		$estimated = 0;
		$estimates = [];
		if ($pagedSearchOK) {
			$cr = $this->connection->getConnectionResource();
			foreach ($sr as $key => $res) {
				if ($this->getLDAP()->controlPagedResultResponse($cr, $res, $cookie, $estimated)) {
					$range = $offset . "-" . ($offset + $limit);
					$estimates[$key] = $estimated;
					\OC::$server->getLogger()->debug(
						'Page response cookie '.$this->cookie2str($cookie)." at $range, estimated<$estimated>",
						['app' => 'user_ldap']
					);
					$this->setPagedResultCookie($base[$key], $filter, $limit, $offset, $cookie);
				}
			}

			//browsing through prior pages to get the cookie for the new one
			if ($skipHandling) {
				return [false, $estimates];
			}
			// if count is bigger, then the server does not support
			// paged search. Instead, he did a normal search. We set a
			// flag here, so the callee knows how to deal with it.
			if ($iFoundItems <= $limit) {
				$this->pagedSearchedSuccessful = true;
			}
		} else {
			if ($limit !== null) {
				\OC::$server->getLogger()->info( // TODO level debug?
					'Paged search was not available',
					['app' => 'user_ldap']
				);
			}
		}
		/* ++ Fixing RHDS searches with pages with zero results ++
		 * Return cookie status. If we don't have more pages, with RHDS
		 * cookie is null, with openldap cookie is an empty string and
		 * to 386ds '0' is a valid cookie. Even if $iFoundItems == 0
		 */
		$validCookie = !empty($cookie) || $cookie === '0';

		return [$validCookie, $estimates];
	}

	/**
	 * executes an LDAP search, but counts the results only
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param array $bases an array containing the LDAP subtree(s) that shall be searched
	 * @param string|string[]|null $attr optional, array, one or more attributes that shall be
	 * retrieved. Results will according to the order in the array.
	 * @param int|null $limit optional, maximum results to be counted
	 * @param int|null $offset optional, a starting point
	 * @param bool $skipHandling indicates whether the pages search operation is
	 * completed
	 * @return int|false Integer or false if the search could not be initialized
	 *
	 * @throws \OC\ServerNotAvailableException
	 */
	private function count($filter, array $bases, $attr = null, $limit = null, $offset = null, $skipHandling = false) {
		\OC::$server->getLogger()->debug(
			'Count filter:  '.\print_r($filter, true),
			['app' => 'user_ldap']
		);

		$limitPerPage = (int)$this->connection->ldapPagingSize;
		if ($limit !== null && $limit < $limitPerPage && $limit > 0) {
			$limitPerPage = $limit;
		}

		$counter = 0;
		$count = null;
		$this->connection->getConnectionResource();

		$shouldRetryForMissingCookie = true;
		do {
			$search = $this->executeSearch(
				$filter,
				$bases,
				$attr,
				$limitPerPage,
				$offset
			);
			if ($search === false) {
				if ($counter > 0) {
					return $counter;
				}
				return false;
			}
			list($sr, $pagedSearchOK) = $search;

			/* ++ Fixing RHDS searches with pages with zero results ++
			 * countEntriesInSearchResults() method signature changed
			 * by removing $limit and &$hasHitLimit parameters
			 */
			$counts = $this->countEntriesInSearchResults($sr);

			list($hasMorePages, $estimates) = $this->processPagedSearchStatus(
				$sr,
				$filter,
				$bases,
				$count,
				$limitPerPage,
				$offset,
				$pagedSearchOK,
				$skipHandling
			);

			// according to LDAP documentation, when cookie is missing for
			// continued paged search, we should retry search from scratch
			// up to required offset. Do not try reissuing cache next
			// time as it could be another issue
			if (!$pagedSearchOK && $shouldRetryForMissingCookie && $limit !== null && $offset > 0) {
				// abandon paged searches to start missing paged search
				$this->abandonPagedSearch();

				\OC::$server->getLogger()->info(
					"Reissuing paged count at range 0-$offset with limit $limit to retrieve missing cookie"
				);
				$shouldRetryForMissingCookie = false;

				// reoffset to 0
				$reOffset = 0;
				do {
					$retrySearch = $this->executeSearch($filter, $bases, $attr, $limit, $reOffset);
					if ($retrySearch === false) {
						$retryPagedSearchOK = false;
					} else {
						list($retrySr, $retryPagedSearchOK) = $retrySearch;

						// i.e. result does not need to be fetched, we just need the cookie
						// thus pass 1 or any other value as $iFoundItems because it is not
						// used
						$this->countEntriesInSearchResults($sr);
						$this->processPagedSearchStatus(
							$retrySr,
							$filter,
							$bases,
							1,
							$limitPerPage,
							$reOffset,
							$retryPagedSearchOK,
							true
						);
					}

					// do not continue both retry and original query on error
					$continue = $retryPagedSearchOK;
					$reOffset += $limit;
				} while ($continue && $reOffset < $offset);
			} else {
				foreach ($counts as $i => $count) {
					if (!empty($estimates) && $estimates[$i] > 0) {
						// estimate reported for complete result, use it
						$counter += $estimates[$i];
						// stop counting entries on subsequent pages for the base with an estimate
						// TODO currently all queries search the same ldap server, in theory we could end all here. Not much harm done though
						unset($bases[$i]);
					} else {
						$counter += $count;
					}
				}

				$offset += $limitPerPage;
				/* ++ Fixing RHDS searches with pages with zero results ++
				 * Continue now depends on $hasMorePages value
				 */
				$continue = $pagedSearchOK && $hasMorePages && \count($bases) > 0;
			}
		} while ($continue && ($limit === null || $limit <= 0 || $limit > $counter));

		return $counter;
	}

	/**
	 * @param array $searchResults
	 * @return int[]
	 * @throws \OC\ServerNotAvailableException
	 */
	private function countEntriesInSearchResults($searchResults) {
		$cr = $this->connection->getConnectionResource();
		$counts = [];

		foreach ($searchResults as $key => $res) {
			$count = (int)$this->getLDAP()->countEntries($cr, $res);
			$counts[$key] = $count;
		}

		return $counts;
	}

	/**
	 * Executes an LDAP search
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param array $bases an array containing the LDAP subtree(s) that shall be searched
	 * @param string|string[] $attr optional, array, one or more attributes that shall be
	 * @param int $limit
	 * @param int $offset
	 * @return array with the search result
	 * @throws \OC\ServerNotAvailableException
	 */
	private function search($filter, $bases, $attr = null, $limit = null, $offset = null) {
		if ($attr !== null && !\is_array($attr)) {
			$attr = [\mb_strtolower($attr, 'UTF-8')];
		}
		if ($limit <= 0) {
			//otherwise search will fail
			$limit = null;
		}

		/* ++ Fixing RHDS searches with pages with zero results ++
		 * As we can have pages with zero results and/or pages with less
		 * than $limit results but with a still valid server 'cookie',
		 * loops through until we get $continue equals true and
		 * $findings['count'] < $limit
		 */
		$findings = [];
		$savedoffset = $offset;
		$shouldRetryForMissingCookie = true;
		do {
			$search = $this->executeSearch($filter, $bases, $attr, $limit, $offset);
			if ($search === false) {
				return [];
			}
			list($sr, $pagedSearchOK) = $search;
			$cr = $this->connection->getConnectionResource();

			foreach ($sr as $res) {
				$findings = \array_merge($findings, $this->getLDAP()->getEntries($cr, $res));
			}

			list($hasMorePages, ) = $this->processPagedSearchStatus(
				$sr,
				$filter,
				$bases,
				$findings['count'],
				$limit,
				$offset,
				$pagedSearchOK,
				false
			);

			// according to LDAP documentation, when cookie is missing for
			// continued paged search, we should retry search from scratch
			// up to required offset. Do not try reissuing cache next
			// time as it could be another issue
			if (!$pagedSearchOK && $shouldRetryForMissingCookie && $limit !== null && $offset > 0) {
				// abandon paged searches to start missing paged search
				$this->abandonPagedSearch();

				\OC::$server->getLogger()->info(
					"Reissuing paged search at range 0-$offset with limit $limit to retrieve missing cookie"
				);
				$shouldRetryForMissingCookie = false;

				// reoffset to 0
				$reOffset = 0;
				do {
					$retrySearch = $this->executeSearch($filter, $bases, $attr, $limit, $reOffset);
					if ($retrySearch === false) {
						$retryPagedSearchOK = false;
					} else {
						list($retrySr, $retryPagedSearchOK) = $retrySearch;

						// i.e. result does not need to be fetched, we just need the cookie
						// thus pass 1 or any other value as $iFoundItems because it is not
						// used
						$this->processPagedSearchStatus(
							$retrySr,
							$filter,
							$bases,
							1,
							$limit,
							$reOffset,
							$retryPagedSearchOK,
							true
						);
					}

					// do not continue both retry and original query on error
					$continue = $retryPagedSearchOK;
					$reOffset += $limit;
				} while ($continue && $reOffset < $offset);
			} else {
				$continue = $hasMorePages && $pagedSearchOK;
				$offset += $limit;
			}
		} while ($continue && $findings['count'] < $limit);
		// resetting offset
		$offset = $savedoffset;

		// if we're here, probably no connection resource is returned.
		// to make ownCloud behave nicely, we simply give back an empty array.
		if (\count($findings) === 0) {
			return [];
		}

		unset($findings['count']);

		//we slice the findings, when
		//a) paged search unsuccessful, though attempted
		//b) no paged search, but limit set
		if ((!$pagedSearchOK && $limit !== null)
			|| (!$this->getPagedSearchResultState() && $pagedSearchOK)
		) {
			$findings = \array_slice($findings, (int)$offset, $limit);
		}

		if (!$continue) {
			$this->abandonPagedSearch();
		}

		if ($attr !== null) {
			$selection = [];
			$i = 0;
			foreach ($findings as $item) {
				if (!\is_array($item)) {
					continue;
				}
				$item = Util::mb_array_change_key_case($item, MB_CASE_LOWER, 'UTF-8');
				foreach ($attr as $key) {
					$key = \mb_strtolower($key, 'UTF-8');
					if (isset($item[$key])) {
						if (\is_array($item[$key]) && isset($item[$key]['count'])) {
							unset($item[$key]['count']);
						}
						if ($key !== 'dn') {
							if ($this->resemblesDN($key)) {
								$selection[$i][$key] = Helper::normalizeDN($item[$key]);
							} else {
								$selection[$i][$key] = $item[$key];
							}
						} else {
							$selection[$i][$key] = [Helper::normalizeDN($item[$key])];
						}
					}
				}
				$i++;
			}
			$findings = $selection;
		}
		return $findings;
	}

	/**
	 * @param string $name
	 * @return bool|mixed|string
	 */
	public function sanitizeUsername($name) {
		if ($this->connection->ldapIgnoreNamingRules) {
			return $name;
		}

		// Transliteration
		// latin characters to ASCII
		$name = \iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);

		// Replacements
		$name = \str_replace(' ', '_', $name);

		// All remaining disallowed characters will be removed
		$name = \preg_replace('/[^a-zA-Z0-9+_.@-]/u', '', $name);

		return $name;
	}

	/**
	* escapes (user provided) parts for LDAP filter
	* @param string $input, the provided value
	* @param bool $allowAsterisk whether in * at the beginning should be preserved
	* @return string the escaped string
	*/
	public function escapeFilterPart($input, $allowAsterisk = false) {
		$asterisk = '';
		if ($allowAsterisk && \strlen($input) > 0 && $input[0] === '*') {
			$asterisk = '*';
			$input = \mb_substr($input, 1, null, 'UTF-8');
		}
		$search  = ['*', '\\', '(', ')'];
		$replace = ['\\*', '\\\\', '\\(', '\\)'];
		return $asterisk . \str_replace($search, $replace, $input);
	}

	/**
	 * combines the input filters with AND
	 * @param string[] $filters the filters to connect
	 * @return string the combined filter
	 */
	public function combineFilterWithAnd($filters) {
		return $this->combineFilter($filters, '&');
	}

	/**
	 * combines the input filters with OR
	 * @param string[] $filters the filters to connect
	 * @return string the combined filter
	 * Combines Filter arguments with OR
	 */
	public function combineFilterWithOr($filters) {
		return $this->combineFilter($filters, '|');
	}

	/**
	 * combines the input filters with given operator
	 * @param string[] $filters the filters to connect
	 * @param string $operator either & or |
	 * @return string the combined filter
	 */
	private function combineFilter($filters, $operator) {
		$combinedFilter = "($operator";
		foreach ($filters as $filter) {
			if ($filter !== '' && $filter[0] !== '(') {
				$filter = "($filter)";
			}
			$combinedFilter .= $filter;
		}
		return "$combinedFilter)";
	}

	/**
	 * creates a filter part for to perform search for users
	 * @param string $search the search term
	 * @return string the final filter part to use in LDAP searches
	 */
	public function getFilterPartForUserSearch($search) {
		return $this->getFilterPartForSearch(
			$search,
			$this->connection->ldapAttributesForUserSearch,
			$this->connection->ldapUserDisplayName
		);
	}

	/**
	 * creates a filter part for to perform search for groups
	 * @param string $search the search term
	 * @return string the final filter part to use in LDAP searches
	 */
	public function getFilterPartForGroupSearch($search) {
		return $this->getFilterPartForSearch(
			$search,
			$this->connection->ldapAttributesForGroupSearch,
			$this->connection->ldapGroupDisplayName
		);
	}

	/**
	 * creates a filter part for searches by splitting up the given search
	 * string into single words
	 * @param string $search the search term
	 * @param string[] $searchAttributes needs to have at least two attributes,
	 * otherwise it does not make sense :)
	 * @return string the final filter part to use in LDAP searches
	 * @throws \InvalidArgumentException
	 */
	private function getAdvancedFilterPartForSearch($search, $searchAttributes) {
		if (!\is_array($searchAttributes) || \count($searchAttributes) < 2) {
			throw new \InvalidArgumentException('searchAttributes must be an array with at least two string');
		}
		$searchWords = \explode(' ', \trim($search));
		$wordFilters = [];
		foreach ($searchWords as $word) {
			$word = $this->prepareSearchTerm($word);
			//every word needs to appear at least once
			$wordMatchOneAttrFilters = [];
			foreach ($searchAttributes as $attr) {
				$wordMatchOneAttrFilters[] = "$attr=$word";
			}
			$wordFilters[] = $this->combineFilterWithOr($wordMatchOneAttrFilters);
		}
		return $this->combineFilterWithAnd($wordFilters);
	}

	/**
	 * creates a filter part for searches
	 * @param string $search the search term
	 * @param string[]|null $searchAttributes
	 * @param string $fallbackAttribute a fallback attribute in case the user
	 * did not define search attributes. Typically the display name attribute.
	 * @return string the final filter part to use in LDAP searches
	 */
	private function getFilterPartForSearch($search, $searchAttributes, $fallbackAttribute) {
		$filter = [];
		$haveMultiSearchAttributes = (\is_array($searchAttributes) && \count($searchAttributes) > 0);
		if ($haveMultiSearchAttributes && \strpos(\trim($search), ' ') !== false) {
			try {
				return $this->getAdvancedFilterPartForSearch($search, $searchAttributes);
			} catch (\Exception $e) {
				\OC::$server->getLogger()->info(
					'Creating advanced filter for search failed, falling back to simple method.',
					['app' => 'user_ldap']
				);
			}
		}

		$search = $this->prepareSearchTerm($search);
		if (!\is_array($searchAttributes) || \count($searchAttributes) === 0) {
			if ($fallbackAttribute === '') {
				return '';
			}
			$filter[] = "$fallbackAttribute=$search";
		} else {
			foreach ($searchAttributes as $attribute) {
				$filter[] = "$attribute=$search";
			}
		}
		if (\count($filter) === 1) {
			return "($filter[0])";
		}
		return $this->combineFilterWithOr($filter);
	}

	/**
	 * returns the search term depending on whether we are allowed
	 * list users found by ldap with the current input appended by
	 * a *
	 *
	 * @param string $term
	 * @return string
	 */
	private function prepareSearchTerm($term) {
		// FIXME DI config
		$config = \OC::$server->getConfig();

		$allowEnum = $config->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes');
		$allowMedialSearches = $config->getSystemValue('user_ldap.enable_medial_search', false);

		$result = $term;
		if ($term === '') {
			$result = '*';
		} elseif (\filter_var($allowEnum, FILTER_VALIDATE_BOOLEAN)) {
			if ($allowMedialSearches) {
				$result = "*$term*";
			} else {
				$result = "$term*";
			}
		}
		return $result;
	}

	/**
	 * returns the filter used for counting users
	 * @return string
	 */
	public function getFilterForUserCount() {
		$filter = $this->combineFilterWithAnd([
			$this->connection->ldapUserFilter,
			"{$this->connection->ldapUserDisplayName}=*"
		]);

		return $filter;
	}

	/**
	 * @param string $name
	 * @param string $password
	 * @return bool
	 * TODO should live in user manager?
	 * @throws \OC\ServerNotAvailableException
	 */
	public function areCredentialsValid($name, $password) {
		$name = $this->DNasBaseParameter($name);
		$testConnection = clone $this->connection;
		$credentials = [
			'ldapAgentName' => $name,
			'ldapAgentPassword' => $password
		];
		if (!$testConnection->setConfiguration($credentials)) {
			return false;
		}
		try {
			return $testConnection->bind();
		} catch (BindFailedException $e) {
			return false;
		}
	}

	/**
	 * reverse lookup of a DN given a known UUID
	 *
	 * @param string $uuid
	 * @return string
	 * @throws \LengthException when more than one DN matches given UUID
	 * @throws \OutOfBoundsException when there is no DN matching given UUID
	 * @throws \OC\ServerNotAvailableException on any LDAP connection error
	 */
	public function getUserDnByUuid($uuid) {
		$uuidOverride = $this->connection->ldapExpertUUIDUserAttr;
		$filter       = $this->connection->ldapUserFilter;
		$base         = $this->connection->ldapBaseUsers;

		if ($this->connection->ldapUuidUserAttribute === 'auto' && $uuidOverride === '') {
			// Sacrebleu! The UUID attribute is unknown :( We need first an
			// existing DN to be able to reliably detect it.
			$result = $this->search($filter, $base, ['dn'], 1);
			if (!isset($result[0]['dn'])) {
				throw new \OutOfBoundsException('Cannot determine UUID attribute');
			}
			$dn = $result[0]['dn'][0];
			if (!$this->detectUuidAttribute($dn, true)) {
				throw new \OutOfBoundsException('Cannot determine UUID attribute');
			}
		} else {
			// The UUID attribute is either known or an override is given.
			// By calling this method we ensure that $this->connection->$uuidAttr
			// is definitely set
			if (!$this->detectUuidAttribute('', true)) {
				throw new \OutOfBoundsException('Cannot determine UUID attribute');
			}
		}

		$uuidAttr = $this->connection->ldapUuidUserAttribute;
		$lowercaseUuidAttr = \strtolower($uuidAttr);
		$converterHub = ConverterHub::getDefaultConverterHub();
		if ($converterHub->hasConverter($lowercaseUuidAttr)) {
			$uuid = $converterHub->str2filter($lowercaseUuidAttr, $uuid);
		}

		$filter = $uuidAttr . '=' . $uuid;
		$result = $this->searchUsers($filter, ['dn'], 2);

		// we put the count into account to make sure that this is really unique
		if (\count($result) > 1) {
			throw new \LengthException($uuidAttr . " is specified as UUID attribute but has a value '{$uuid}' for multiple entries");
		}

		if (isset($result[0]['dn'])) {
			return $result[0]['dn'][0];
		}

		throw new \OutOfBoundsException('Cannot determine UUID attribute');
	}

	/**
	 * auto-detects the directory's UUID attribute
	 *
	 * @param string $dn a known DN used to check against
	 * @param bool $isUser
	 * @param bool $force the detection should be run, even if it is not set to auto
	 * @return bool true on success, false otherwise
	 * @throws \OC\ServerNotAvailableException
	 */
	private function detectUuidAttribute($dn, $isUser = true, $force = false) {
		if ($isUser) {
			$uuidAttr     = 'ldapUuidUserAttribute';
			$uuidOverride = $this->connection->ldapExpertUUIDUserAttr;
		} else {
			$uuidAttr = 'ldapUuidGroupAttribute';
			$uuidOverride = $this->connection->ldapExpertUUIDGroupAttr;
		}

		if (($this->connection->$uuidAttr !== 'auto') && !$force) {
			return true;
		}

		if ($uuidOverride !== '' && !$force) {
			$this->connection->$uuidAttr = $uuidOverride;
			return true;
		}

		foreach ($this->connection->uuidAttributes as $attribute) {
			$value = $this->readAttribute($dn, $attribute);
			if (\is_array($value) && isset($value[0]) && !empty($value[0])) {
				\OC::$server->getLogger()->debug(
					"Setting $attribute as $uuidAttr",
					['app' => 'user_ldap']
				);
				// TODO we should make the autodetection explicit and store it in the configuration after detection
				// TODO the UserEntry does that ... but only for users. Get this sorted out in the wizard properly
				$this->connection->$uuidAttr = $attribute;
				return true;
			}
		}
		\OC::$server->getLogger()->error(
			'Could not autodetect the UUID attribute',
			['app' => 'user_ldap']
		);

		return false;
	}

	/**
	 * @param string $dn
	 * @param bool $isUser
	 * @return string|bool
	 * @throws \OC\ServerNotAvailableException
	 */
	public function getUUID($dn, $isUser = true) {
		if ($isUser) {
			$uuidAttr     = 'ldapUuidUserAttribute';
			$uuidOverride = $this->connection->ldapExpertUUIDUserAttr;
		} else {
			$uuidAttr     = 'ldapUuidGroupAttribute';
			$uuidOverride = $this->connection->ldapExpertUUIDGroupAttr;
		}

		$uuid = false;
		if ($this->detectUuidAttribute($dn, $isUser)) {
			$uuid = $this->readAttribute($dn, $this->connection->$uuidAttr);
			if (!\is_array($uuid)
				&& $uuidOverride !== ''
				&& $this->detectUuidAttribute($dn, $isUser, true)) {
				$uuid = $this->readAttribute(
					$dn,
					$this->connection->$uuidAttr
				);
			}
			if (\is_array($uuid) && isset($uuid[0]) && !empty($uuid[0])) {
				$uuid = $uuid[0];
			}
		}

		return $uuid;
	}

	/**
	 * gets a SID of the domain of the given dn
	 *
	 * @param string $dn
	 * @return string|bool
	 * @throws \OC\ServerNotAvailableException
	 */
	public function getSID($dn) {
		$domainDN = $this->getDomainDNFromDN($dn);
		$cacheKey = "getSID-$domainDN";
		$sid = $this->connection->getFromCache($cacheKey);
		if ($sid !== null) {
			return $sid;
		}

		$objectSid = $this->readAttribute($domainDN, 'objectsid');
		if (!\is_array($objectSid) || empty($objectSid)) {
			$this->connection->writeToCache($cacheKey, false);
			return false;
		}
		$domainObjectSid = self::sid2str($objectSid[0]);
		$this->connection->writeToCache($cacheKey, $domainObjectSid);

		return $domainObjectSid;
	}

	/**
	 * converts a binary SID into a string representation
	 * @param string $sid
	 * @return string
	 */
	public static function sid2str($sid) {
		// The format of a SID binary string is as follows:
		// 1 byte for the revision level
		// 1 byte for the number n of variable sub-ids
		// 6 bytes for identifier authority value
		// n*4 bytes for n sub-ids
		//
		// Example: 010400000000000515000000a681e50e4d6c6c2bca32055f
		//  Legend: RRNNAAAAAAAAAAAA11111111222222223333333344444444
		$revision = \ord($sid[0]);
		$numberSubID = \ord($sid[1]);

		$subIdStart = 8; // 1 + 1 + 6
		$subIdLength = 4;
		if (\strlen($sid) !== $subIdStart + $subIdLength * $numberSubID) {
			// Incorrect number of bytes present.
			return '';
		}

		// 6 bytes = 48 bits can be represented using floats without loss of
		// precision (see https://gist.github.com/bantu/886ac680b0aef5812f71)
		$iav = \number_format(\hexdec(\bin2hex(\substr($sid, 2, 6))), 0, '', '');

		$subIDs = [];
		for ($i = 0; $i < $numberSubID; $i++) {
			$subID = \unpack('V', \substr($sid, $subIdStart + $subIdLength * $i, $subIdLength));
			$subIDs[] = \sprintf('%u', $subID[1]);
		}

		// Result for example above: S-1-5-21-249921958-728525901-1594176202
		return \sprintf('S-%d-%s-%s', $revision, $iav, \implode('-', $subIDs));
	}

	/**
	 * converts a stored DN so it can be used as base parameter for LDAP queries, internally we store them for usage in LDAP filters
	 * @param string $dn the DN
	 * @return string
	 */
	private function DNasBaseParameter($dn) {
		return \str_ireplace('\\5c', '\\', $dn);
	}

	/**
	 * checks if the given DN is part of the given base DN(s)
	 * @param string $dn the DN
	 * @param string[] $bases array containing the allowed base DN or DNs
	 * @return bool
	 */
	public function isDNPartOfBase($dn, $bases) {
		$belongsToBase = false;

		foreach ($bases as $base) {
			$base = Helper::normalizeDN($base);
			$belongsToBase = true;
			if (\mb_strripos($dn, $base, 0, 'UTF-8') !== (\mb_strlen($dn, 'UTF-8')-\mb_strlen($base, 'UTF-8'))) {
				$belongsToBase = false;
			}
			if ($belongsToBase) {
				break;
			}
		}
		return $belongsToBase;
	}

	/**
	 * resets a running Paged Search operation
	 *
	 * @throws \OC\ServerNotAvailableException
	 */
	private function abandonPagedSearch() {
		if ($this->connection->hasPagedResultSupport) {
			\OC::$server->getLogger()->debug(
				'Abandoning paged search - last cookie: '.$this->cookie2str($this->lastCookie).', cookies: <'.\implode(',', \array_map([$this, 'cookie2str'], $this->cookies)).'>',
				['app' => 'user_ldap']
			);
			$cr = $this->connection->getConnectionResource();
			$this->getLDAP()->controlPagedResult($cr, 0, false, $this->lastCookie);
			$this->getPagedSearchResultState();
			$this->lastCookie = '';
			$this->cookies = [];
		}
	}

	private function cookie2str($cookie) {
		if ($cookie === '') {
			return "''";
		}
		return '0x'.\bin2hex($cookie);
	}

	/**
	 * get a cookie for the next LDAP paged search
	 * @param string $base a string with the base DN for the search
	 * @param string $filter the search filter to identify the correct search
	 * @param int $limit the limit (or 'pageSize'), to identify the correct search well
	 * @param int $offset the offset for the new search to identify the correct search really good
	 * @return string containing the key or empty if none is cached
	 */
	private function getPagedResultCookie($base, $filter, $limit, $offset) {
		if ($offset === 0) {
			return '';
		}
		$offset -= $limit;
		//we work with cache here
		$cacheKey = 'lc' . \crc32($base) . '-' . \crc32($filter) . '-' . (int)$limit . '-' . (int)$offset;
		$cookie = '';
		if (isset($this->cookies[$cacheKey])) {
			$cookie = $this->cookies[$cacheKey];
		}
		return $cookie;
	}

	/**
	 * checks whether an LDAP paged search operation has more pages that can be
	 * retrieved, typically when offset and limit are provided.
	 *
	 * Be very careful to use it: the last cookie value, which is inspected, can
	 * be reset by other operations. Best, call it immediately after a search(),
	 * searchUsers() or searchGroups() call. count-methods are probably safe as
	 * well. Don't rely on it with any fetchList-method.
	 * @return bool
	 */
	public function hasMoreResults() {
		if (!$this->connection->hasPagedResultSupport) {
			return false;
		}

		if (empty($this->lastCookie) && $this->lastCookie !== '0') {
			// as in RFC 2696, when all results are returned, the cookie will
			// be empty.
			return false;
		}

		return true;
	}

	/**
	 * set a cookie for LDAP paged search run
	 * @param string $base a string with the base DN for the search
	 * @param string $filter the search filter to identify the correct search
	 * @param int $limit the limit (or 'pageSize'), to identify the correct search well
	 * @param int $offset the offset for the run search to identify the correct search really good
	 * @param string $cookie string containing the cookie returned by ldap_control_paged_result_response
	 * @return void
	 */
	private function setPagedResultCookie($base, $filter, $limit, $offset, $cookie) {
		// allow '0' for 389ds
		$cacheKey = 'lc' . \crc32($base) . '-' . \crc32($filter) . '-' . (int)$limit . '-' . (int)$offset;
		$this->cookies[$cacheKey] = $cookie;
		$this->lastCookie = $cookie;
	}

	/**
	 * Check whether the most recent paged search was successful. It flushed the state var. Use it always after a possible paged search.
	 * @return boolean|null true on success, null or false otherwise
	 */
	public function getPagedSearchResultState() {
		$result = $this->pagedSearchedSuccessful;
		$this->pagedSearchedSuccessful = null;
		return $result;
	}

	/**
	 * Prepares a paged search, if possible
	 *
	 * @param string $filter the LDAP filter for the search
	 * @param string[] $bases an array containing the LDAP subtree(s) that shall be searched
	 * @param string[] $attr optional, when a certain attribute shall be filtered outside
	 * @param int $limit
	 * @param int $offset
	 * @return bool
	 * @throws \OC\ServerNotAvailableException
	 */
	private function initPagedSearch($filter, $bases, $attr, $limit, $offset) {
		$pagedSearchOK = false;
		if ($this->connection->hasPagedResultSupport && ($limit !== 0)) {
			$offset = (int)$offset; //can be null
			$range = $offset . "-" . ($offset + $limit);
			\OC::$server->getLogger()->debug(
				"Initializing paged search for Filter $filter base ".\print_r($bases, true)
				.' attr '.\print_r($attr, true)." at $range",
				['app' => 'user_ldap']
			);
			//get the cookie from the search for the previous search, required by LDAP
			foreach ($bases as $base) {
				$cookie = $this->getPagedResultCookie($base, $filter, $limit, $offset);
				\OC::$server->getLogger()->debug(
					"Cookie for $base at $range is ".$this->cookie2str($cookie),
					['app' => 'user_ldap']
				);

				// '0' is valid, because 389ds
				if (empty($cookie) && $cookie !== '0' && ($offset > 0)) {
					// Abandon - no cookie known although the offset is not 0.
					// Maybe cache run out (abandoned paged search or cookie deletion).
					$this->abandonPagedSearch();
					\OC::$server->getLogger()->debug(
						"Cache not available for continued paged search at $range, aborting.",
						['app' => 'user_ldap']
					);
					return false;
				}
				if ($cookie !== null) {
					if (empty($offset)) {
						//since offset = 0, this is a new search. We abandon other searches that might be ongoing.
						$this->abandonPagedSearch();
						\OC::$server->getLogger()->debug(
							'Ready for a paged search with cookie '.$this->cookie2str($cookie)." at $range",
							['app' => 'user_ldap']
						);
					} else {
						\OC::$server->getLogger()->debug(
							'Continuing a paged search with cookie '.$this->cookie2str($cookie)." at $range",
							['app' => 'user_ldap']
						);
					}
					$pagedSearchOK = $this->getLDAP()->controlPagedResult(
						$this->connection->getConnectionResource(),
						$limit,
						false,
						$cookie
					);
					if (!$pagedSearchOK) {
						return false;
					}
				} else {
					\OC::$server->getLogger()->debug(
						"No paged search for us at $range",
						['app' => 'user_ldap']
					);
				}
			}
		} elseif ($this->connection->hasPagedResultSupport && $limit === 0) {
			// a search without limit was requested. However, if we do use
			// Paged Search once, we always must do it. This requires us to
			// initialize it with the configured page size.
			$this->abandonPagedSearch();
			// in case someone set it to 0 … use 500, otherwise no results will
			// be returned.
			if ((int)$this->connection->ldapPagingSize > 0) {
				$pageSize = (int)$this->connection->ldapPagingSize;
			} else {
				$pageSize = 500;
			}
			$pagedSearchOK = $this->getLDAP()->controlPagedResult(
				$this->connection->getConnectionResource(),
				$pageSize,
				false,
				''
			);
		}

		return $pagedSearchOK;
	}
}
