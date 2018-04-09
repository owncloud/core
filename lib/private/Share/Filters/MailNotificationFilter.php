<?php
/**
 * @author Matthew Setter <matthew@matthewsetter.com>
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

namespace OC\Share\Filters;

use Zend\InputFilter\Factory as InputFilterFactory;

/**
 * Class MailNotificationFilter
 *
 * This class provies a programmatic way of filtering data used in
 * MailNotification::sendLinkShareMail, to ensure that it's not tainted nor
 * contains any undesired information.
 *
 * @package OC\Share
 * @see https://hackerone.com/reports/297535
 */
class MailNotificationFilter {

	/**
	 * @var \Zend\InputFilter\InputFilterInterface
	 */
	private $inputFilter;

	/**
	 * MailNotificationFilter constructor.
	 *
	 * @param array $data
	 */
	public function __construct($data = []) {
		$factory = new InputFilterFactory();
		$this->inputFilter = $factory->createInputFilter([
			'file' => [
				'required' => true,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'HtmlEntities'],
				],
			],
			'link' => [
				'required' => true,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'StripTags'],
				],
			],
			'toAddress' => [
				'required' => true,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'StripTags'],
				],
			],
			'senderDisplayName' => [
				'required' => false,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'StripTags'],
				],
			],
			'personalNote' => [
				'required' => false,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'StripTags'],
				],
			],
			'expirationDate' => [
				'required' => true,
				'filters' => [
					['name' => 'StringTrim'],
					['name' => 'StripTags'],
				],
			],
		]);

		$this->inputFilter->setData($data);
	}

	/**
	 * @return string The filtered file name
	 */
	public function getFile() {
		return $this->inputFilter->getValue('file');
	}

	/**
	 * @return string The filtered link value
	 */
	public function getLink() {
		return $this->inputFilter->getValue('link');
	}

	/**
	 * @return string The filtered to email address
	 */
	public function getToAddress() {
		return $this->inputFilter->getValue('toAddress');
	}

	/**
	 * @return string The filtered to sender display name
	 */
	public function getSenderDisplayName() {
		return $this->inputFilter->getValue('senderDisplayName');
	}

	/**
	 * @return string The filtered expiration date
	 */
	public function getExpirationDate() {
		return $this->inputFilter->getValue('expirationDate');
	}

	/**
	 * @return string The filtered personal note
	 */
	public function getPersonalNote() {
		return $this->inputFilter->getValue('personalNote');
	}
}
