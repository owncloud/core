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

use OC\LargeFileHelper;
use OC\Settings\Panels\Helper;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;
use OCP\IURLGenerator;

class Logging implements ISettings {

	/** @var IConfig  */
	protected $config;
	/** @var IURLGenerator  */
	protected $urlGenerator;
	/** @var Helper  */
	protected $helper;

	public function __construct(IConfig $config,
								IURLGenerator $urlGenerator,
								Helper $helper) {
		$this->config = $config;
		$this->urlGenerator = $urlGenerator;
		$this->helper = $helper;
	}

	public function getPriority() {
		return 0;
	}

	public function getPanel() {
		$tmpl = new Template('settings', 'panels/admin/logging');
		$logFilePath = $this->helper->getLogFilePath();
		$doesLogFileExist = \file_exists($logFilePath);
		$logFileSize = 0;
		if ($doesLogFileExist) {
			$h = new LargeFileHelper();
			$logFileSize = $h->getFileSize($logFilePath);
		}
		$tmpl->assign('loglevel', $this->config->getSystemValue("loglevel", 2));
		$tmpl->assign('doesLogFileExist', $doesLogFileExist);
		$tmpl->assign('urlGenerator', $this->urlGenerator);
		$tmpl->assign('logFileSize', $logFileSize);
		$tmpl->assign('showLog', $this->config->getSystemValue('log_type', 'owncloud') === 'owncloud');
		return $tmpl;
	}

	public function getSectionID() {
		return 'general';
	}
}
