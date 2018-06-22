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

namespace OC\Helper;

use OCP\L10N\IFactory;

class LocaleHelper {
	/**
	 * @var string[]
	 */
	private $commonLanguages = [
		'en',
		'es',
		'fr',
		'de',
		'de_DE',
		'ja',
		'ar',
		'ru',
		'nl',
		'it',
		'pt_BR',
		'pt_PT',
		'da',
		'fi_FI',
		'nb_NO',
		'sv',
		'tr',
		'zh_CN',
		'ko'
	];

	/**
	 * @var string[]
	 */
	private $languageCodes = [
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
		'my_MM' => 'Burmese - MYANMAR',
		'ur_PK' => 'Urdu (Pakistan)'
	];

	/**
	 * Get available languages split to the current, common and the rest
	 *
	 * @param IFactory $langFactory
	 * @param string $activeLangCode
	 *
	 * @return array
	 */
	public function getNormalizedLanguages(IFactory $langFactory, $activeLangCode) {
		$userLang = null;
		$commonLanguages = [];
		$languages = [];

		$availableCodes = $langFactory->findAvailableLanguages();
		foreach ($availableCodes as $languageCode) {
			$l = $langFactory->get('settings', $languageCode);

			// TRANSLATORS this is a self-name of your language for the language switcher
			$endonym = (string)$l->t('__language_name__');
			// Check if the language name is in the translation file
			// Fallback to hardcoded language name if it isn't
			$languageName = ($l->getLanguageCode() === $languageCode
				&& \substr($endonym, 0, 1) !== '_'
			) ? $endonym
				: $this->getLanguageNameByCode($languageCode);

			$ln = [
				'code' => $languageCode,
				'name' => $languageName
			];
			$languageWeight = $this->getCommonLanguageWeight($languageCode);
			if ($languageCode === $activeLangCode) {
				$userLang = $ln;
			} elseif ($languageWeight !== false) {
				$commonLanguages[$languageWeight] = $ln;
			} else {
				$languages[] = $ln;
			}
		}

		// if user language is not available but set somehow
		// show the actual code as name
		if ($userLang === null) {
			$userLang = [
				'code' => $activeLangCode,
				'name' => $activeLangCode,
			];
		}

		\ksort($commonLanguages);
		\usort($languages, [$this, 'compareLanguagesByName']);

		return [$userLang, $commonLanguages, $languages];
	}

	/**
	 * Get common language weight or false if language is not common
	 *
	 * @param string $languageCode
	 *
	 * @return false|int
	 */
	public function getCommonLanguageWeight($languageCode) {
		return \array_search($languageCode, $this->commonLanguages);
	}

	/**
	 * Get language name by code
	 *
	 * @param string $code
	 *
	 * @return string
	 */
	public function getLanguageNameByCode($code) {
		return (isset($this->languageCodes[$code]))
			? $this->languageCodes[$code]
			: $code;
	}

	/**
	 * Compare language arrays by name
	 * both arrays should have 'code' and 'name' keys
	 *
	 * @param string[] $a
	 * @param string[] $b
	 *
	 * @return int
	 */
	protected function compareLanguagesByName($a, $b) {
		if ($a['code'] === $a['name'] && $b['code'] !== $b['name']) {
			// If a doesn't have a name, but b does, list b before a
			return 1;
		}
		if ($a['code'] !== $a['name'] && $b['code'] === $b['name']) {
			// If a does have a name, but b doesn't, list a before b
			return -1;
		}
		// Otherwise compare the names
		return \strcmp($a['name'], $b['name']);
	}
}
