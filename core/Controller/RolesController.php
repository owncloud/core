<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Core\Controller;

use OCP\AppFramework\OCSController;
use OCP\IL10N;
use OCP\IRequest;
use OCP\Roles\AddRolesEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RolesController extends OCSController {
	/**
	 * @var IL10N
	 */
	private $l10n;
	/**
	 * @var EventDispatcherInterface
	 */
	private $dispatcher;

	public function __construct($appName, IRequest $request,
								IL10N $l10n, EventDispatcherInterface $dispatcher) {
		parent::__construct($appName, $request);
		$this->l10n = $l10n;
		$this->dispatcher = $dispatcher;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @return array
	 */
	public function getRoles() {
		// build core roles
		$roleEvent = new AddRolesEvent();
		$this->buildCoreRoles($roleEvent);

		// allow apps to register roles
		$this->dispatcher->dispatch($roleEvent);

		return ['data' => $roleEvent->getRoles()];
	}

	private function buildCoreRoles(AddRolesEvent $event) {
		$event->addRole(
			[
				'id' => 'core.viewer',
				'displayName' => $this->l10n->t('Download / View'),
				'context' => [
					'publicLinks' => [
						'displayDescription' => $this->l10n->t('Recipients can view or download contents.'),
						'order' => 10,
						'resourceTypes' => [
							'*'
						],
						'permissions' => [
							'ownCloud' => [
								'read' => true
							]
						]
					]
				]
			]);
		$event->addRole(
			[
				'id' => 'core.contributor',
				'displayName' => $this->l10n->t('Download / View / Upload'),
				'context' => [
					'publicLinks' => [
						'displayDescription' => $this->l10n->t('Recipients can view, download and upload contents.'),
						'order' => 20,
						'resourceTypes' => [
							'httpd/unix-directory'
						],
						'permissions' => [
							'ownCloud' => [
								'create' => true,
								'read' => true,
							]
						]
					]
				]

			]);
		$event->addRole(
			[
				'id' => 'core.editor',
				'displayName' => $this->l10n->t('Download / View / Edit'),
				'context' => [
					'publicLinks' => [
						'displayDescription' => $this->l10n->t('Recipients can view, download, edit, delete and upload contents.'),
						'order' => 30,
						'resourceTypes' => [
							'httpd/unix-directory'
						],
						'permissions' => [
							'ownCloud' => [
								'create' => true,
								'read' => true,
								'update' => true,
								'delete' => true,
							]
						]
					]
				]
			]);
		$event->addRole(
			[
				'id' => 'core.uploader',
				'displayName' => $this->l10n->t('Upload only') . ' (File Drop)',
				'context' => [
					'publicLinks' => [
						'displayDescription' => $this->l10n->t('Receive files from multiple recipients without revealing the contents of the folder.'),
						'order' => 40,
						'resourceTypes' => [
							'httpd/unix-directory'
						],
						'permissions' => [
							'ownCloud' => [
								'create' => true,
							]
						]
					]
				]
			]);
	}
}
