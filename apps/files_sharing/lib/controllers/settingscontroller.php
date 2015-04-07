<?php

/**
 * ownCloud
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files_Sharing\Controllers;

use OCA\Files_Sharing\External\AliasManager;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUser;
use OCP\IURLGenerator;
use OCP\IL10N;
use OCP\IUserManager;

class SettingsController extends Controller {

	/** @var \OCP\IUser */
	protected $user;

	/** @var \OCP\IURLGenerator */
	protected $urlGenerator;

	/** @var \OCP\IL10N */
	protected $l10n;

	/** @var AliasManager */
	protected $aliasManager;

	/** @var \OCP\IUserManager */
	protected $userManager;

	/**
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUser $user
	 * @param IURLGenerator $urlGenerator
	 * @param IL10N $l10n
	 * @param \OCA\Files_Sharing\External\AliasManager $aliasManager
	 * @param IUserManager $userManager
	 */
	public function __construct($appName, IRequest $request, IUser $user,
		IURLGenerator $urlGenerator, IL10N $l10n, AliasManager $aliasManager,
		IUserManager $userManager) {

		parent::__construct($appName, $request);
		$this->user = $user;
		$this->urlGenerator = $urlGenerator;
		$this->l10n = $l10n;
		$this->aliasManager = $aliasManager;
		$this->userManager = $userManager;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param string $federatedCloudId
	 * @return DataResponse
	 */
	public function personal($federatedCloudId) {

		$uid = $this->user->getUID();

		if ($uid !== $federatedCloudId
			&& ($this->aliasManager->aliasExists($federatedCloudId)
				|| ($this->userManager->userExists($federatedCloudId)))) {

			$response = new DataResponse(
				array(
					'status'	=>'error',
					'data'		=> array(
						'message'	=> (string) $this->l10n->t('Name already in use.'),
						),
					));
		} else {

			$this->aliasManager->updateAlias($federatedCloudId, $uid);

			$response =  new DataResponse(
				array(
					'status'	=>'success',
					'data'		=> array(
						'message'	=> (string) $this->l10n->t('Your settings have been updated.'),
						),
					));
		}

		return $response;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @return TemplateResponse
	 */
	public function displayPanel() {

		$uid = $this->user->getUID();
		$url = $this->urlGenerator->getAbsoluteURL('/');
		$domain = $this->normalizeUrl($url);
		$enabled = \OCA\Files_Sharing\Helper::isIncomingServer2serverShareEnabled();

		$alias = $this->aliasManager->getAlias($uid);
		// if no alias is defined we fall-back to the uid
		if ($alias === null) {
			$alias = $uid;
		}

		return new TemplateResponse(
			'files_sharing',
			'settings-personal',
			array(
				'enabled' => $enabled,
				'alias'     => $alias,
				'domain'  => $domain,
			),
			''
		);

	}

	/**
	 * normalize URL, remove protocol and trailing slashes
	 *
	 * @param string $url
	 * @return string
	 */
	protected function normalizeUrl($url) {
		$offset = 0;
		if (strpos($url, 'https://') === 0) {
			$offset = strlen('https://');
		} elseif (strpos($url, 'http://') === 0) {
			$offset = strlen('http://');
		}

		$domain = substr($url, $offset);

		return rtrim($domain, '/');
	}
}
