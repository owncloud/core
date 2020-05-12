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
use OC\License\ILicense;
use OCP\AppFramework\Utility\ITimeFactory;

/**
 * This class will provide translated messages based on the current license status
 */
class MessageService {
	const MESSAGE_LICENSE_MISSING = 1;
	const MESSAGE_LICENSE_INVALID = 2;
	const MESSAGE_LICENSE_EXPIRED_DEMO = 11;
	const MESSAGE_LICENSE_EXPIRED_NORMAL = 12;
	const MESSAGE_LICENSE_OK_DEMO = 21;
	const MESSAGE_LICENSE_OK_NORMAL = 22;

	/** @var IFactory */
	private $l10nFactory;
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(IFactory $l10nFactory, ITimeFactory $timeFactory) {
		$this->l10nFactory = $l10nFactory;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * Based on the license's state, generate a message to be shown to the user.
	 * This function will return an array containing a numeric code to identify the message,
	 * the raw / untranslated message (usually in English), and the translated message
	 * that should be shown to the user. Note that the translated message will depend
	 * on the language availability, and could be shown as English if the translation
	 * is missing.
	 * The "contains_html" key indicates which lines (there could be multiple) of the message
	 * contains html code which shouldn't be escaped if possible.
	 * Example:
	 * [
	 *   'code' => 2,
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
	 * @param ILicense|null $license the license to check or null if no license (required argument)
	 * @param string|null $language the language to be used for the message or
	 * null to use the default language
	 * @return array with the following keys: "code", "raw_message", "translated_message" and
	 * "contains_html. Both "raw_message" and "translated_message" will contain an array with the texts that
	 * should be displayed one text per line
	 */
	public function getMessageForLicense(?ILicense $license, string $language = null) {
		$l = $this->l10nFactory->get('core', $language);

		// check if present
		if ($license === null) {
			return [
				'code' => self::MESSAGE_LICENSE_MISSING,
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
		if (!$license->isValid()) {
			return [
				'code' => self::MESSAGE_LICENSE_INVALID,
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
		$currentTime = $this->timeFactory->getTime();
		if ($license->getExpirationTime() < $currentTime) {
			// license expired
			if ($license->getType() === ILicense::LICENSE_TYPE_DEMO) {
				return [
					'code' => self::MESSAGE_LICENSE_EXPIRED_DEMO,
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
					'code' => self::MESSAGE_LICENSE_EXPIRED_NORMAL,
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

		// show remaining time
		$daysLeft = \ceil(($license->getExpirationTime() - $currentTime) / 86400);
		if ($license->getType() === ILicense::LICENSE_TYPE_DEMO) {
			return [
				'code' => self::MESSAGE_LICENSE_OK_DEMO,
				'raw_message' => [
					"Evaluation - expires in $daysLeft days.",
				],
				'translated_message' => [
					$l->t('Evaluation - expires in %d days.', [$daysLeft]),
				],
				'contains_html' => [],
			];
		} else {
			return [
				'code' => self::MESSAGE_LICENSE_OK_NORMAL,
				'raw_message' => [
					"The registered enterprise license key expires in $daysLeft days",
				],
				'translated_message' => [
					$l->t('The registered enterprise license key expires in %s days', [$daysLeft]),
				],
				'contains_html' => [],
			];
		}
	}
}
