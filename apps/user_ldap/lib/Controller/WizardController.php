<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OCA\User_LDAP\Controller;

use OCA\User_LDAP\Access;
use OCA\User_LDAP\Configuration;
use OCA\User_LDAP\Connection;
use OCA\User_LDAP\LDAP;
use OCA\User_LDAP\User\Manager;
use OCA\User_LDAP\Wizard;
use OCA\User_LDAP\WizardResult;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;

/**
 * Class WizardController
 *
 * @package OCA\User_LDAP\Controller
 */
class WizardController extends Controller {

	/** @var IConfig */
	protected $config;

	/** @var Manager */
	protected $manager;

	/** @var IL10N */
	protected $l10n;

	/** @var LDAP */
	protected $ldapWrapper;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IConfig $config
	 * @param Manager $manager
	 * @param IL10N $l10n
	 * @param LDAP $ldapWrapper
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IConfig $config,
		Manager $manager,
		IL10N $l10n,
		LDAP $ldapWrapper
	) {
		parent::__construct($appName, $request);
		$this->config = $config;
		$this->manager = $manager;
		$this->l10n = $l10n;
		$this->ldapWrapper = $ldapWrapper;
	}

	/**
	 * TODO allow to change config of wizard at runtime, DI wizard and mock it
	 * @param Configuration $configuration
	 * @return Wizard
	 */
	private function getWizard(Configuration $configuration) {
		$con = new Connection($this->ldapWrapper, $configuration);
		$con->setConfiguration($configuration->getConfiguration());
		$con->ldapConfigurationActive = true;
		$con->setIgnoreValidation(true);

		$access = new Access($con, $this->manager);

		return new Wizard($this->ldapWrapper, $configuration, $access, $this->l10n);
	}

	/**
	 * do your magic
	 *
	 * @param string $ldap_serverconfig_chooser config id
	 * @param string $action the spell to cast
	 * @param string $cfgkey optional
	 * @param string $cfgval optional
	 * @param string $ldap_test_loginname optional
	 * @return DataResponse
	 */
	public function cast($ldap_serverconfig_chooser, $action, $cfgkey = null, $cfgval = null, $ldap_test_loginname = null) {
		$prefix = $ldap_serverconfig_chooser; // TODO if possible make JS send as 'prefix' right away

		$config = new Configuration($this->config, $prefix);

		switch ($action) {
			case 'guessBaseDN':
			case 'detectEmailAttribute':
			case 'detectUserDisplayNameAttribute':
			case 'determineGroupMemberAssoc':
			case 'determineUserObjectClasses':
			case 'determineGroupObjectClasses':
			case 'determineGroupsForUsers':
			case 'determineGroupsForGroups':
			case 'determineAttributes':
			case 'getUserListFilter':
			case 'getUserLoginFilter':
			case 'getGroupFilter':
			case 'countUsers':
			case 'countGroups':
			case 'countInBaseDN':
				try {
					/** @var WizardResult|bool $result */
					$result = $this->getWizard($config)->$action();
					if ($result !== false) {
						$data = $result->getResultArray();
						$data['status'] = 'success';
						return new DataResponse($data);
					}
				} catch (\Exception $e) {
					return new DataResponse([
						'status' => 'error',
						'message' => $e->getMessage(),
						'code' => $e->getCode()
					]);
				}
				return new DataResponse(['status' => 'error',]);

			case 'testLoginName': {
				try {
					$loginName = $ldap_test_loginname; // TODO if possible make JS send as 'loginName' right away
					// FIXME throw exception when loginname is empty
					$result = $this->getWizard($config)->testLoginName($loginName);
					if ($result !== false) {
						$data = $result->getResultArray();
						$data['status'] = 'success';
						return new DataResponse($data);
					}
				} catch (\Exception $e) {
					return new DataResponse([
						'status' => 'error',
						'message' => $e->getMessage()
					]);
				}
				return new DataResponse(['status' => 'error']);
			}

			case 'save':
				$key = $cfgkey; // TODO if possible make JS send as 'key' right away
				$val = $cfgval; // TODO if possible make JS send as 'val' right away
				if ($key === null || $val === null) {
					return new DataResponse([ // FIXME use same Exception as app framework
						'status' => 'error',
						'message' => $this->l10n->t('No data specified')
					]);
				}
				$cfg = [$key => $val];
				$setParameters = [];
				$config->setConfiguration($cfg, $setParameters);
				if (!\in_array($key, $setParameters, true)) {
					return new DataResponse([
						'status' => 'error',
						'message' => $this->l10n->t($key.' Could not set configuration %s', $setParameters[0])
					]);
				}
				$config->saveConfiguration();
				//clear the cache on save
				$configuration = new Configuration($this->config, $prefix);
				$connection = new Connection($this->ldapWrapper, $configuration);
				$connection->clearCache();
				return new DataResponse(['status' => 'success']);

			default:
				return new DataResponse([
					'status' => 'error',
					'message' => $this->l10n->t('Action does not exist')
				]);
		}
	}
}
