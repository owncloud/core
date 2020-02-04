<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OC\User\Service;

use OCP\Security\ISecureRandom;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class PasswordGeneratorService {
	/** @var EventDispatcherInterface  */
	private $eventDispatcher;
	/** @var ISecureRandom  */
	private $secureRandom;

	/**
	 * PasswordGeneratorService constructor.
	 *
	 * @param EventDispatcherInterface $eventDispatcher
	 * @param ISecureRandom $secureRandom
	 */
	public function __construct(EventDispatcherInterface $eventDispatcher,
								ISecureRandom $secureRandom) {
		$this->eventDispatcher = $eventDispatcher;
		$this->secureRandom = $secureRandom;
	}

	/**
	 * Create password
	 *
	 * This method will generate password for the user. This method emits a signal which
	 * could be listened by another function, which could set a random password. Lets say
	 * if there is no such listener for this signal, then this function itself would
	 * generate random password of length 20. The idea here is to generate random password.
	 *
	 * @return string
	 */
	public function createPassword() {
		$event = new GenericEvent();
		$this->eventDispatcher->dispatch('OCP\User::createPassword', $event);
		if ($event->hasArgument('password')) {
			$password = $event->getArgument('password');
		} else {
			$password = $this->secureRandom->generate(20);
		}
		return $password;
	}
}
