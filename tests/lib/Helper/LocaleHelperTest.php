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

namespace Test\Helper;

use OC\Helper\LocaleHelper;
use OCP\IL10N;
use OCP\L10N\IFactory;
use Test\TestCase;

/**
 * Class LocaleHelperTest
 *
 * @package Test\Helper
 */
class LocaleHelperTest extends TestCase {
	/**
	 * @var LocaleHelper
	 */
	protected $localeHelper;

	protected function setUp() {
		parent::setUp();
		$this->localeHelper = new LocaleHelper();
	}

	public function langDataProvider() {
		return [
			[
				[ 'hi', 'ro', 'php', 'de', 'java' ],
				'en',
				// en was omited in the available lang list above. it will have
				// no translation and will not be available for selection
				[
					'code' => 'en',
					'name' => 'en',
				],
				// Only de is common. en was omitted in the available lang list above
				[
					3 => [
						'code' => 'de',
						'name' => 'de',
					]
				],
				// sorted by name alphabetically but if code was not resolved
				// to name the item should has less priority
				[
					[
						'code' => 'ro',
						'name' => 'română',
					],
					[
						'code' => 'hi',
						'name' => 'हिन्दी',
					],
					[
						'code' => 'java',
						'name' => 'java',
					],
					[
						'code' => 'php',
						'name' => 'php',
					],
				]
			],
			[
				[ 'hi', 'ro', 'php', 'de', 'java', 'en'],
				'ro',
				// Now we have ro in a list. It will be translated
				[
					'code' => 'ro',
					'name' => 'română',
				],
				// de and en are common. en should go first
				[
					0 => [
						'code' => 'en',
						'name' => 'English',
					],
					3 => [
						'code' => 'de',
						'name' => 'de',
					]
				],
				// sorted by name alphabetically but if code was not resolved
				// to name the item should has less priority
				[
					[
						'code' => 'hi',
						'name' => 'हिन्दी',
					],
					[
						'code' => 'java',
						'name' => 'java',
					],
					[
						'code' => 'php',
						'name' => 'php',
					],
				]
			]
		];
	}

	/**
	 * @dataProvider langDataProvider
	 */
	public function testNormalization($availableCodes,
								$currentCode,
								$expectedUserLang,
								$expectedCommonLanguages,
								$expectedLanguages
	) {
		$l10n = $this->createMock(IL10N::class);

		$langFactory = $this->createMock(IFactory::class);
		$langFactory->expects($this->any())
			->method('findAvailableLanguages')
			->willReturn($availableCodes);
		$langFactory->expects($this->any())
			->method('get')
			->willReturn($l10n);

		list(
			$userLang,
			$commonLanguages,
			$languages
			) = $this->localeHelper->getNormalizedLanguages($langFactory, $currentCode);
		$this->assertEquals($expectedUserLang, $userLang);
		$this->assertEquals($expectedCommonLanguages, $commonLanguages);
		$this->assertEquals($expectedLanguages, $languages);
	}
}
