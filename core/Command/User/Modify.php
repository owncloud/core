<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\Core\Command\User;

use OC\Core\Command\Base;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Modify extends Base {

	/** @var IUserManager  */
	private $userManager;

	/** @var IMailer  */
	private $mailer;

	/** @var array  */
	private $allowedKeys = ['email', 'displayname'];

	/**
	 * Modify constructor.
	 *
	 * @param IUserManager $userManager
	 * @param IMailer $mailer
	 */
	public function __construct(IUserManager $userManager, IMailer $mailer) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->mailer = $mailer;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('user:modify')
			->setDescription('Modify user details')
			->addArgument(
				'uid',
				InputArgument::REQUIRED,
				'User ID used to login'
			)
			->addArgument(
				'key',
				InputArgument::REQUIRED,
				'Key to be changed. Valid keys are : displayname, email'
			)
			->addArgument(
				'value',
				InputArgument::REQUIRED,
				'The new value of the key.'
			);
	}

	/**
	 * @param InputInterface $input
	 * @throws \InvalidArgumentException
	 */
	protected function validateInput(InputInterface $input) {
		$uid = $input->getArgument('uid');
		if (($uid == null) || ($uid === '') || ($this->userManager->userExists($uid) === false)) {
			throw new \InvalidArgumentException("The user $uid does not exist");
		}

		$key = $input->getArgument('key');
		if (($key === '') || ($key === null)) {
			throw new \InvalidArgumentException('The key cannot be empty');
		}

		if (\in_array($input->getArgument('key'), $this->allowedKeys, true) === false) {
			throw new \InvalidArgumentException('Supported keys are ' . \implode(', ', $this->allowedKeys));
		}

		$value = $input->getArgument('value');
		if (($value === '') || ($value === null)) {
			throw new \InvalidArgumentException('The value cannot be empty');
		}
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('uid');
		$key = $input->getArgument('key');
		$value = $input->getArgument('value');

		try {
			$this->validateInput($input);
		} catch (\InvalidArgumentException $e) {
			$output->writeln('<error>' . $e->getMessage() . '</error>');
			return 1;
		}

		$user = $this->userManager->get($uid);
		if ($user === null) {
			$output->writeln('<error>The user ' . $uid . ' does not exist </error>');
			return 1;
		}

		if (($key === 'email') && ($value !== null) && ($value !== '')) {
			if ($this->mailer->validateMailAddress($value) === true) {
				$user->setEMailAddress($value);
				$output->writeln("The email address of $uid updated to $value");
				return 0;
			}
			$output->writeln('<error>Email address provided is invalid</error>');
			return 1;
		}

		if (($key === 'displayname') && ($value !== null) && ($value !== '')) {
			if ($user->setDisplayName($value) === true) {
				$output->writeln('The displayname of ' . $uid . ' updated to ' . $value);
				return 0;
			}
			$output->writeln('<error>Display name cannot be set</error>');
			return 1;
		}
		return 0;
	}
}
