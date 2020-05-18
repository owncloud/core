<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
namespace OC\License;

use OCP\L10N\IFactory;
use OCP\License\ILicenseManager;
use OC\License\ILicense;
use OCP\AppFramework\Utility\ITimeFactory;

/**
 * This class will provide translated messages based on the current license status
 */
class MessageService {
	/** @var IFactory */
	private $l10nFactory;

	public function __construct(IFactory $l10nFactory) {
		$this->l10nFactory = $l10nFactory;
	}

	/**
	 * Based on the license's state, generate a message to be shown to the user.
	 * This function will return an array containing, the raw / untranslated message
	 * (usually in English), and the translated message that should be shown to the user.
	 * Note that the translated message will depend on the language availability, and could
	 * be shown as English if the translation is missing.
	 * The "contains_html" key indicates which lines (there could be multiple) of the message
	 * contains html code which shouldn't be escaped if possible.
	 * Example:
	 * [
	 *   'raw_message' => [
	 *     'invalid license',
	 *     'contact with your admin'
	 *   ],
	 *   'translated_message' => [
	 *     $l->t('invalid license'),
	 *     $l->t('contact with your <a href="mailto:admin@admin">admin</a>')'
	 *   ],
	 *   'contains_html' => [1]
	 * ]
	 * @param array $info the information to generate the message. The array must contain:
	 *   "licenseState" => one of the ILicenseManager::LICENSE_STATE_* constants (required)
	 *   "licenseType" => one of the ILicense::LICENCE_TYPE_* constants (required if license is present)
	 *   "daysLeft" => the days left until the license expires (required for LICENSE_STATE_VALID and LICENSE_STATE_ABOUT_TO_EXPIRE)
	 * @param string|null $language the language to be used for the message or
	 * null to use the default language
	 * @return array with the following keys: raw_message", "translated_message" and
	 * "contains_html. Both "raw_message" and "translated_message" will contain an array with the texts that
	 * should be displayed one text per line
	 */
	public function getMessageForLicense(array $info, string $language = null): array {
		$l = $this->l10nFactory->get('core', $language);

		// check if present
		if ($info['licenseState'] === ILicenseManager::LICENSE_STATE_MISSING) {
			return [
				'raw_message' => [
					'No license key available.',
				],
				'translated_message' => [
					$l->t('No license key available.'),
				],
				'contains_html' => [],
			];
		}

		// check if valid
		if ($info['licenseState'] === ILicenseManager::LICENSE_STATE_INVALID) {
			return [
				'raw_message' => [
					'Invalid license key!',
					'Please contact your administrator or sales@owncloud.com for a new license key.',
				],
				'translated_message' => [
					$l->t('Invalid license key!'),
					$l->t('Please contact your administrator or %s for a new license key.', ['<a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a>']),
				],
				'contains_html' => [1],
			];
		}

		// check if expired
		if ($info['licenseState'] === ILicenseManager::LICENSE_STATE_EXPIRED) {
			// license expired
			if ($info['licenseType'] === ILicense::LICENSE_TYPE_DEMO) {
				return [
					'raw_message' => [
						'Your Enterprise license key has expired.',
						'Enterprise features have been disabled.',
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						$l->t('Your Enterprise license key has expired.'),
						$l->t('Enterprise features have been disabled.'),
						$l->t('Please contact your administrator or %s for a new license key.', ['<a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a>']),
					],
					'contains_html' => [2],
				];
			} else {
				return [
					'raw_message' => [
						'Your Enterprise license key has expired.',
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						$l->t('Your Enterprise license key has expired.'),
						$l->t('Please contact your administrator or %s for a new license key.', ['<a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a>']),
					],
					'contains_html' => [1],
				];
			}
		}

		// licenses valid and about-to-expire
		if ($info['licenseType'] === ILicense::LICENSE_TYPE_DEMO) {
			return [
				'raw_message' => [
					"Evaluation - expires in {$info['daysLeft']} days.",
				],
				'translated_message' => [
					$l->t('Evaluation - expires in %d days.', [$info['daysLeft']]),
				],
				'contains_html' => [],
			];
		} else {
			if ($info['licenseState'] === ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE) {
				return [
					'raw_message' => [
						"Your Enterprise license key is about to expire (days remaining: {$info['daysLeft']}).",
						'Please contact your administrator or sales@owncloud.com for a new license key.',
					],
					'translated_message' => [
						$l->t('Your Enterprise license key is about to expire (days remaining: %d).', [$info['daysLeft']]),
						$l->t('Please contact your administrator or %s for a new license key.', ['<a href="mailto:sales@owncloud.com?subject=Renew+ownCloud+License">sales@owncloud.com</a>']),
					],
					'contains_html' => [1],
				];
			} else {
				return [
					'raw_message' => [
						"The registered enterprise license key expires in {$info['daysLeft']} days",
					],
					'translated_message' => [
						$l->t('The registered enterprise license key expires in %d days', [$info['daysLeft']]),
					],
					'contains_html' => [],
				];
			}
		}
	}
}
