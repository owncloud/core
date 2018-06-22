<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Settings\Panels\Personal;

use OC\Helper\LocaleHelper;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\IConfig;
use OCP\L10N\IFactory;

class Profile implements ISettings {

	/* @var IConfig */
	protected $config;
	/* @var IGroupManager */
	protected $groupManager;
	/* @var IUserSession */
	protected $userSession;
	/** @var IFactory */
	protected $lfactory;

	/**
	 * @var LocaleHelper
	 */
	private $localeHelper;

	/**
	 * Profile constructor.
	 *
	 * @param IConfig $config
	 * @param IGroupManager $groupManager
	 * @param IUserSession $userSession
	 * @param IFactory $lfactory
	 * @param LocaleHelper $localeHelper
	 */
	public function __construct(IConfig $config,
								   IGroupManager $groupManager,
								   IUserSession $userSession,
								   IFactory $lfactory,
								   LocaleHelper $localeHelper
	) {
		$this->config = $config;
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
		$this->lfactory = $lfactory;
		$this->localeHelper = $localeHelper;
	}

	public function getPriority() {
		return 100;
	}

	public function getPanel() {
		$activeLangCode = $this->config->getUserValue(
			$this->userSession->getUser()->getUID(),
			'core',
			'lang',
			$this->lfactory->findLanguage()
		);

		list($userLang, $commonLanguages, $languages) = $this->localeHelper->getNormalizedLanguages(
			$this->lfactory,
			$activeLangCode
		);

		$selector = new Template('settings', 'language');
		$selector->assign('selectName', 'lang');
		$selector->assign('selectId', 'languageinput');
		$selector->assign('activelanguage', $userLang);
		$selector->assign('commonlanguages', $commonLanguages);
		$selector->assign('languages', $languages);

		$tmpl = new Template('settings', 'panels/personal/profile');
		$tmpl->assign('email', $this->userSession->getUser()->getEMailAddress());
		$tmpl->assign('displayName', $this->userSession->getUser()->getDisplayName());
		$tmpl->assign('enableAvatars', $this->config->getSystemValue('enable_avatars', true) === true);
		$tmpl->assign('avatarChangeSupported', $this->userSession->getUser()->canChangeAvatar());
		$tmpl->assign('displayNameChangeSupported', $this->userSession->getUser()->canChangeDisplayName());
		$tmpl->assign('passwordChangeSupported', $this->userSession->getUser()->canChangePassword());
		$groups = $this->groupManager->getUserGroupIds($this->userSession->getUser());
		\sort($groups);
		$tmpl->assign('groups', $groups);
		$tmpl->assign('languageSelector', $selector->fetchPage());
		return $tmpl;
	}

	public function getSectionID() {
		return 'general';
	}
}
