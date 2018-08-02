<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IURLGenerator;

/**
 * Class OcmController
 *
 * @package OCA\FederatedFileSharing\Controller
 */
class OcmController extends Controller {
	const API_VERSION = '1.0-proposal1';

	protected $urlGenerator;

	public function __construct($appName,
								IRequest $request,
								IURLGenerator $urlGenerator) {
		parent::__construct($appName, $request);

		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * EndPoint discovery
	 * Responds to /ocm-provider/ requests
	 *
	 * @return array
	 */
	public function discovery() {
		return [
			'enabled' => true,
			'apiVersion' => self::API_VERSION,
			'endPoint' => $this->urlGenerator->linkToRouteAbsolute(
				"{$this->appName}.ocm.index"
			),
			'shareTypes' => [
				'name' => 'file',
				'protocols' => $this->getProtocols()
			]
		];
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 *
	 *
	 * @param string $shareWith identifier of the user or group to share the resource with
	 * @param string $name name of the shared resource
	 * @param string $description share description (optional)
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param string $owner identifier of the user that owns the resource
	 * @param string $ownerDisplayName display name of the owner
	 * @param string $sender Provider specific identifier of the user that wants to share the resource
	 * @param string $senderDisplayName Display name of the user that wants to share the resource
	 * @param string $shareType Share type (user or group share)
	 * @param string $resourceType only 'file' is supported atm
	 * @param array $protocol
	 * 		[
	 * 			'name' => (string) protocol name. Only 'webdav' is supported atm,
	 * 			'options' => [
	 * 				protocol specific options
	 * 				only `webdav` options are supported atm
	 * 				e.g. `uri`,	`access_token`, `password`, `permissions` etc.
	 *
	 * 				For backward compatibility the webdav protocol will use
	 * 				the 'sharedSecret" as username and password
	 * 			]
	 *
	 */
	public function createShare($shareWith,
								$name,
								$description,
								$providerId,
								$owner,
								$ownerDisplayName,
								$sender,
								$senderDisplayName,
								$shareType,
								$resourceType,
								$protocol

	) {
		// TODO: implement
	}

	/**
	 * @param string $notificationType notification type (SHARE_REMOVED, etc)
	 * @param string $resourceType only 'file' is supported atm
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param array $notification
	 * 		[
	 * 			optional additional parameters, depending on the notification and the resource type
	 *
	 * 		]
	 */
	public function processNotification($notificationType,
										$resourceType,
										$providerId,
										$notification
	) {
		// TODO: implement
	}

	protected function getProtocols() {
		return [
			'webdav' => '/public.php/webdav/'
		];
	}

}
