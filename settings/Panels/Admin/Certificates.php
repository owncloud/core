<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Settings\Panels\Admin;

use OCP\ICertificateManager;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;
use OCP\IURLGenerator;

class Certificates implements ISettings {

	/** @var IConfig */
	protected $config;
	/** @var ICertificateManager */
	protected $certificateManager;
	/** @var IURLGenerator */
	protected $urlGenerator;

	public function __construct(IConfig $config,
								IURLGenerator $urlGenerator,
								ICertificateManager $certificateManager) {
		$this->config = $config;
		$this->urlGenerator = $urlGenerator;
		$this->certificateManager = $certificateManager;
	}

	public function getPriority() {
		return 0;
	}

	public function getPanel() {
		if ($this->config->getSystemValue('enable_certificate_management', false)) {
			$tmpl = new Template('settings', 'panels/admin/certificates');
			$tmpl->assign('type', 'admin');
			$tmpl->assign('uploadRoute', 'settings.Certificate.addSystemRootCertificate');
			$tmpl->assign('certs', $this->certificateManager->listCertificates());
			$tmpl->assign('urlGenerator', $this->urlGenerator);
			return $tmpl;
		} else {
			return null;
		}
	}

	public function getSectionID() {
		return 'general';
	}
}
