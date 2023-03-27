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

use OCA\User_LDAP\Configuration;
use OCA\User_LDAP\Connection;
use OCA\User_LDAP\Helper;
use OCA\User_LDAP\LDAP;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;
use OCP\ISession;

/**
 * Class ConfigurationController
 *
 * @package OCA\User_LDAP\Controller
 */
class ConfigurationController extends Controller {

	/** @var IConfig */
	protected $config;

	/** @var ISession */
	protected $session;

	/** @var IL10N */
	protected $l10n;

	/** @var LDAP */
	protected $ldapWrapper;

	/** @var Helper */
	protected $helper;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IConfig $config
	 * @param ISession $session
	 * @param IL10N $l10n
	 * @param LDAP $ldapWrapper
	 * @param Helper $helper
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IConfig $config,
		ISession $session,
		IL10N $l10n,
		LDAP $ldapWrapper,
		Helper $helper
	) {
		parent::__construct($appName, $request);
		$this->config = $config;
		$this->session = $session;
		$this->l10n = $l10n;
		$this->ldapWrapper = $ldapWrapper;
		$this->helper = $helper;
	}

	/**
	 * create a new ldap config
	 *
	 * @param string $copyConfig copy the config
	 * @return DataResponse
	 */
	public function create($copyConfig = null) {
		$newPrefix = $this->helper->nextPossibleConfigurationPrefix();

		$resultData = ['configPrefix' => $newPrefix];

		$newConfig = new Configuration($this->config, $newPrefix, false);
		if ($copyConfig === null) {
			// create empty config
			$configuration = new Configuration($this->config, $newPrefix, false);
			$newConfig->setConfiguration($configuration->getDefaults());
			$resultData['defaults'] = $configuration->getDefaults();
		} else {
			// copy existing config
			$originalConfig = new Configuration($this->config, $copyConfig);
			$newConfig->setConfiguration($originalConfig->getConfiguration());
		}
		$newConfig->saveConfiguration();

		$resultData['status'] = 'success';
		return new DataResponse($resultData);
	}
	/**
	 * get the given ldap config
	 *
	 * @param string $ldap_serverconfig_chooser config id
	 * @return DataResponse
	 */
	public function read($ldap_serverconfig_chooser) {
		$prefix = $ldap_serverconfig_chooser; // TODO if possible make JS send as 'prefix' right away

		$configuration = new Configuration($this->config, $prefix);
		$connection = new Connection($this->ldapWrapper, $configuration);

		$configuration = $connection->getConfiguration();
		if (isset($configuration['ldap_agent_password']) && $configuration['ldap_agent_password'] !== '') {
			// hide password
			$configuration['ldap_agent_password'] = '**PASSWORD SET**';
		}
		return new DataResponse([
			'status' => 'success',
			'configuration' => $configuration
		]);
	}

	/**
	 * test the given ldap config
	 *
	 * @param string $ldap_serverconfig_chooser config id
	 * @return DataResponse
	 */
	public function test($ldap_serverconfig_chooser) {
		$prefix = $ldap_serverconfig_chooser; // TODO if possible make JS send as 'prefix' right away

		$configuration = new Configuration($this->config, $prefix);
		$connection = new Connection($this->ldapWrapper, $configuration);

		try {
			$configurationOk = true;
			$conf = $connection->getConfiguration();
			if ($conf['ldap_configuration_active'] === '0') {
				//needs to be true, otherwise it will also fail with an irritating message
				$conf['ldap_configuration_active'] = '1';
				$configurationOk = $connection->setConfiguration($conf);
			}
			if ($configurationOk) {
				//Configuration is okay
				/*
				 * Clossing the session since it won't be used from this point on. There might be a potential
				 * race condition if a second request is made: either this request or the other might not
				 * contact the LDAP backup server the first time when it should, but there shouldn't be any
				 * problem with that other than the extra connection.
				 */
				$this->session->close();
				if ($connection->bind()) {
					/*
					 * This shiny if block is an ugly hack to find out whether anonymous
					 * bind is possible on AD or not. Because AD happily and constantly
					 * replies with success to any anonymous bind request, we need to
					 * fire up a broken operation. If AD does not allow anonymous bind,
					 * it will end up with LDAP error code 1 which is turned into an
					 * exception by the LDAP wrapper. We catch this. Other cases may
					 * pass (like e.g. expected syntax error).
					 */
					try {
						$this->ldapWrapper->read($connection->getConnectionResource(), '', 'objectClass=*', ['dn']);
					} catch (\Exception $e) {
						if ($e->getCode() === 1) {
							return new DataResponse([
								'status' => 'error',
								'message' => $this->l10n->t('The configuration is invalid: anonymous bind is not allowed.')
							]);
						}
					}
					return new DataResponse([
						'status' => 'success',
						'message' => $this->l10n->t('The configuration is valid and the connection could be established!')
					]);
				}
				return new DataResponse([
					'status' => 'error',
					'message' => $this->l10n->t('The configuration is valid, but the Bind failed. Please check the server settings and credentials.')
				]);
			}
			return new DataResponse([
				'status' => 'error',
				'message' => $this->l10n->t('The configuration is invalid. Please have a look at the logs for further details.')
			]);
		} catch (\Exception $e) {
			return new DataResponse([
				'status' => 'error',
				'message' => $e->getMessage()
			]);
		}
	}

	/**
	 * get the given ldap config
	 *
	 * @param string $ldap_serverconfig_chooser config id
	 * @return DataResponse
	 */
	public function delete($ldap_serverconfig_chooser) {
		$prefix = $ldap_serverconfig_chooser; // TODO if possible make JS send as 'prefix' right away
		if ($this->helper->deleteServerConfiguration($prefix)) {
			return new DataResponse(['status' => 'success']);
		}
		return new DataResponse([
			'status' => 'error',
			'message' => $this->l10n->t('Failed to delete the server configuration')
		]);
	}
}
