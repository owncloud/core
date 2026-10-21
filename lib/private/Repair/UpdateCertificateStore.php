<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Repair;

use OC\Files\View;
use OC\Server;
use OCP\IConfig;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

/**
 * Class UpdateCertificateStore rewrites the system and the user specific certificate
 * stores after an update has been performed. This is done because the bundled root
 * certificates might have changed.
 *
 * @package OC\Repair
 */
class UpdateCertificateStore implements IRepairStep {
	/**
	 * FIXME: The certificate manager does only allow specifying the user
	 *        within the constructor. This makes DI impossible.
	 * @var Server
	 */
	protected $server;
	/** @var IConfig */
	protected $config;

	/**
	 * @param Server $server
	 * @param IConfig $config
	 */
	public function __construct(
		Server $server,
		IConfig $config
	) {
		$this->server = $server;
		$this->config = $config;
	}

	/** {@inheritDoc} */
	public function getName() {
		return 'Update certificate stores with new root certificates';
	}

	/** {@inheritDoc} */
	public function run(IOutput $out) {
		// a stale certificate cache must not abort the upgrade
		try {
			$this->updateCertificateStores($out);
		} catch (\Throwable $e) {
			$this->warn($out, 'Could not update certificate stores', $e);
		}
	}

	private function warn(IOutput $out, $message, \Throwable $e) {
		$out->warning($message . ': ' . $e->getMessage());
		$this->server->getLogger()->logException($e, ['app' => 'core']);
	}

	private function updateCertificateStores(IOutput $out) {
		$rootView = new View();
		$pathToRootCerts = '/files_external/rootcerts.crt';

		// Regenerate the system certificate bundle first, the user bundles include it
		$systemCertificateManager = $this->server->getCertificateManager(null);
		'@phan-var \OC\Security\CertificateManager $systemCertificateManager';
		$systemCertificateManager->createCertificateBundle();

		foreach ($rootView->getDirectoryContent('', 'httpd/unix-directory') as $fileInfo) {
			$uid = \trim($fileInfo->getPath(), '/');
			try {
				if ($rootView->file_exists($uid . $pathToRootCerts)) {
					// Delete the existing root certificate
					$rootView->unlink($uid . $pathToRootCerts);

					/**
					 * FIXME: The certificate manager does only allow specifying the user
					 *        within the constructor. This makes DI impossible.
					 */
					// Regenerate the certificates
					$certificateManager = $this->server->getCertificateManager($uid);
					// ICertificateManager does not have createCertificateBundle
					// But CertificateManager has createCertificateBundle
					// ToDo: sort that out
					'@phan-var \OC\Security\CertificateManager $certificateManager';
					$certificateManager->createCertificateBundle();
				}
			} catch (\Throwable $e) {
				// one broken user store must not keep the others stale
				$this->warn($out, "Could not update the certificate store of $uid", $e);
			}
		}
	}
}
