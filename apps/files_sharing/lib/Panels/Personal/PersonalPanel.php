<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Files_Sharing\Panels\Personal;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IUserSession;
use OCP\Settings\ISettings;
use OCP\Template;

class PersonalPanel implements ISettings {
	const USER_CONFIGS = [
		[
			'key' => 'auto_accept_share',
			'default' => 'yes'
		],
		[
			'key' => 'allow_share_dialog_user_enumeration',
			'default' => 'yes'
		]
	];

	const GLOBAL_CONFIG_PREFIX = 'shareapi_';

	/** @var IConfig $config */
	private $config;

	/** @var IUserSession $userSession */
	private $userSession;

	/** @var IL10N */
	private $l10n;

	public function __construct(IConfig $config, IUserSession $userSession, IL10N $l10n) {
		$this->config = $config;
		$this->userSession = $userSession;
		$this->l10n = $l10n;
	}

	/**
	 * The panel controller method that returns a template to the UI
	 *
	 * @return TemplateResponse | Template
	 */
	public function getPanel() {
		$tmpl = new Template('files_sharing', 'settings-personal');
		$enabledConfigs = [];
		foreach (self::USER_CONFIGS as $config) {
			if ($config['key'] === 'auto_accept_share') {
				$config['label'] = $this->l10n->t('Automatically accept new incoming local user shares');
			} elseif ($config['key'] === 'allow_share_dialog_user_enumeration') {
				$config['label'] = $this->l10n->t('Allow finding you via autocomplete in share dialog. If this is disabled the full username needs to be entered.');
			}
			/**
			 * Show configurations only if global enabled
			 */
			$globalConfigKey = self::GLOBAL_CONFIG_PREFIX . $config['key'];
			$globalEnabled = $this->config->getAppValue(
				'core',
				$globalConfigKey,
				$config['default']
			);
			if ($globalEnabled === 'yes') {
				$userEnabled = $this->config->getUserValue(
					$this->userSession->getUser()->getUID(),
					'files_sharing',
					$config['key'],
					'yes'
				);
				$enabledConfigs[$config['key']] = [
					'enabled' => $userEnabled,
					'label' => $config['label']
				];
			}
		}
		if (empty($enabledConfigs)) {
			return new Template('files_sharing', 'settings-personal-empty');
		}
		$tmpl->assign('enabled_configs', $enabledConfigs);
		return $tmpl;
	}

	/**
	 * A string to identify the section in the UI / HTML and URL
	 *s
	 * @return string
	 */
	public function getSectionID() {
		return 'sharing';
	}

	/**
	 * The number used to order the section in the UI.
	 *
	 * @return int between 0 and 100, with 100 being the highest priority
	 */
	public function getPriority() {
		return 100;
	}
}
