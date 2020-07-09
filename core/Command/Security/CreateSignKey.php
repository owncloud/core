<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Core\Command\Security;

use OC\Core\Command\Base;
use OCP\IConfig;
use OCP\IUserManager;
use OCP\Security\ISecureRandom;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class CreateSignKey extends Base {

	/**
	 * @var IUserManager
	 */
	private $userManager;
	/**
	 * @var IConfig
	 */
	private $config;
	/**
	 * @var ISecureRandom
	 */
	private $secureRandom;

	public function __construct(IUserManager $userManager, IConfig $config, ISecureRandom $secureRandom) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->config = $config;
		$this->secureRandom = $secureRandom;
	}

	protected function configure() {
		$this
			->setName('security:sign-key:create')
			->setDescription('Create and recreate a users signing key for signed urls')
			->addArgument(
				'user',
				InputArgument::REQUIRED,
				'The is of the user'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('user');
		$user = $this->userManager->get($uid);
		if ($user === null) {
			$output->write('User unknown');
			return 1;
		}
		$signingKey = $this->config->getUserValue($uid, 'core', 'signing-key', null);
		if ($signingKey !== null) {
			$output->writeln('This user already has a signing key. Recreating the key will invalidate all existing signed urls.');

			$helper = $this->getHelper('question');
			$question = new ConfirmationQuestion('Shall we re-create the signing key? (y/N)', false);

			if (!$helper->ask($input, $output, $question)) {
				return 0;
			}
		}
		$newSigningKey = $this->secureRandom->generate(64);
		$this->config->setUserValue($uid, 'core', 'signing-key', $newSigningKey, $signingKey);
		return 1;
	}
}
