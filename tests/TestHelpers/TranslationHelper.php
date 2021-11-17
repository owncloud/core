<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Talank Baral <talank@jankaritech.com>
 * @copyright Copyright (c) 2021 Talank Baral talank@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace TestHelpers;

/**
 * Class TranslationHelper
 *
 * Helper functions that are needed to run tests on different languages
 *
 * @package TestHelpers
 */
class TranslationHelper {
	/**
	 * @param string|null $language
	 *
	 * @return string
	 */
	public static function getLanguage(?string $language): ?string {
		if (!isset($language)) {
			if (\getenv('OC_LANGUAGE') !== false) {
				$language = \getenv('OC_LANGUAGE');
			}
		}
		return $language;
	}
}
