<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IUser;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\IConfig;
use OC\Settings\Panels\Helper;
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

	public function __construct(IConfig $config,
								IGroupManager $groupManager,
								IUserSession $userSession,
								IFactory $lfactory) {
		$this->config = $config;
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
		$this->lfactory = $lfactory;
	}

	public function getPriority() {
		return 100;
	}

	public function getPanel() {
		$tmpl = new Template('settings', 'panels/personal/profile');

		// Assign some data
		$lang = $this->lfactory->findLanguage();
		$userLang = $this->config->getUserValue( $this->userSession->getUser()->getUID(), 'core', 'lang', $lang);
		$languageCodes = $this->lfactory->findAvailableLanguages();
		// array of common languages
		$commonLangCodes = [
			'en', 'es', 'fr', 'de', 'de_DE', 'ja', 'ar', 'ru', 'nl', 'it', 'pt_BR', 'pt_PT', 'da', 'fi_FI', 'nb_NO', 'sv', 'tr', 'zh_CN', 'ko'
		];
		$languageNames = $this->getLanguageCodes();
		$languages= [];
		$commonLanguages = [];
		foreach($languageCodes as $lang) {
			$l = $this->lfactory->get('settings', $lang);
			// TRANSLATORS this is the language name for the language switcher in the personal settings and should be the localized version
			$potentialName = (string) $l->t('__language_name__');
			if($l->getLanguageCode() === $lang && substr($potentialName, 0, 1) !== '_') {//first check if the language name is in the translation file
				$ln = ['code'=>$lang, 'name'=> $potentialName];
			} elseif (isset($languageNames[$lang])) {
				$ln = ['code'=>$lang, 'name'=>$languageNames[$lang]];
			} else {//fallback to language code
				$ln = ['code'=>$lang, 'name'=>$lang];
			}
			// put appropriate languages into appropriate arrays, to print them sorted
			// used language -> common languages -> divider -> other languages
			if ($lang === $userLang) {
				$userLang = $ln;
			} elseif (in_array($lang, $commonLangCodes)) {
				$commonLanguages[array_search($lang, $commonLangCodes)]=$ln;
			} else {
				$languages[]=$ln;
			}
		}
		// if user language is not available but set somehow: show the actual code as name
		if (!is_array($userLang)) {
			$userLang = [
				'code' => $userLang,
				'name' => $userLang,
			];
		}
		ksort($commonLanguages);
		// sort now by displayed language not the iso-code
		usort( $languages, function ($a, $b) {
			if ($a['code'] === $a['name'] && $b['code'] !== $b['name']) {
				// If a doesn't have a name, but b does, list b before a
				return 1;
			}
			if ($a['code'] !== $a['name'] && $b['code'] === $b['name']) {
				// If a does have a name, but b doesn't, list a before b
				return -1;
			}
			// Otherwise compare the names
			return strcmp($a['name'], $b['name']);
		});

		$tmpl->assign('email', $this->userSession->getUser()->getEMailAddress());
		$tmpl->assign('languages', $languages);
		$tmpl->assign('commonlanguages', $commonLanguages);
		$tmpl->assign('activelanguage', $userLang);
		$tmpl->assign('displayName', $this->userSession->getUser()->getDisplayName());
		$tmpl->assign('enableAvatars', $this->config->getSystemValue('enable_avatars', true) === true);
		$tmpl->assign('avatarChangeSupported', $this->userSession->getUser()->canChangeAvatar());
		$tmpl->assign('displayNameChangeSupported', $this->userSession->getUser()->canChangeDisplayName());
		$tmpl->assign('passwordChangeSupported', $this->userSession->getUser()->canChangePassword());
		$groups = $this->groupManager->getUserGroupIds($this->userSession->getUser());
		sort($groups);
		$tmpl->assign('groups', $groups);
		return $tmpl;
	}

	protected function getLanguageCodes() {
		return [
			'el' => 'Ελληνικά',
			'en' => 'English',
			'fa' => 'فارسى',
			'fi_FI' => 'Suomi',
			'hi' => 'हिन्दी',
			'id' => 'Bahasa Indonesia',
			'lb' => 'Lëtzebuergesch',
			'ms_MY' => 'Bahasa Melayu',
			'nb_NO' => 'Norwegian Bokmål',
			'pt_BR' => 'Português brasileiro',
			'pt_PT' => 'Português',
			'ro' => 'română',
			'sr@latin' => 'Srpski',
			'sv' => 'Svenska',
			'hu_HU' => 'Magyar',
			'hr' => 'Hrvatski',
			'ar' => 'العربية',
			'lv' => 'Latviešu',
			'mk' => 'македонски',
			'uk' => 'Українська',
			'vi' => 'Tiếng Việt',
			'zh_TW' => '正體中文（臺灣）',
			'af_ZA' => 'Afrikaans',
			'bn_BD' => 'Bengali',
			'ta_LK' => 'தமிழ்',
			'zh_HK' => '繁體中文（香港）',
			'is' => 'Icelandic',
			'ka_GE' => 'Georgian for Georgia',
			'ku_IQ' => 'Kurdish Iraq',
			'si_LK' => 'Sinhala',
			'be' => 'Belarusian',
			'ka' => 'Kartuli (Georgian)',
			'my_MM' => 'Burmese - MYANMAR ',
			'ur_PK' => 'Urdu (Pakistan)'
		];
	}

	public function getSectionID() {
		return 'general';
	}

}
