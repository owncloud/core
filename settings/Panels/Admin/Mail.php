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

use OC\Settings\Panels\Helper;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;

class Mail implements ISettings {

	/** @var IConfig  */
	protected $config;
	/** @var Helper  */
	protected $helper;

	public function __construct(IConfig $config,
								Helper $helper) {
		$this->config = $config;
		$this->helper = $helper;
	}

	public function getPriority() {
		return 20;
	}

	public function getPanel() {
		$template = new Template('settings', 'panels/admin/mail');
		// Should we display sendmail as an option?
		$template->assign('read-only', $this->config->isSystemConfigReadOnly());
		$template->assign('sendmail_is_available', $this->helper->findBinaryPath('sendmail'));
		$template->assign('loglevel', $this->config->getSystemValue("loglevel", 2));
		$template->assign('mail_domain', $this->config->getSystemValue("mail_domain", ''));
		$template->assign('mail_from_address', $this->config->getSystemValue("mail_from_address", ''));
		$template->assign('mail_smtpmode', $this->config->getSystemValue("mail_smtpmode", ''));
		$template->assign('mail_smtpsecure', $this->config->getSystemValue("mail_smtpsecure", ''));
		$template->assign('mail_smtphost', $this->config->getSystemValue("mail_smtphost", ''));
		$template->assign('mail_smtpport', $this->config->getSystemValue("mail_smtpport", ''));
		$template->assign('mail_smtpauthtype', $this->config->getSystemValue("mail_smtpauthtype", ''));
		$template->assign('mail_smtpauth', $this->config->getSystemValue("mail_smtpauth", false));
		$template->assign('mail_smtpname', $this->config->getSystemValue("mail_smtpname", ''));
		$template->assign('mail_smtppassword', $this->config->getSystemValue("mail_smtppassword", ''));
		return $template;
	}

	public function getSectionID() {
		return 'general';
	}
}
