<?php
/**
* @author Björn Schießle <bjoern@schiessle.org>
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


namespace OCA\Encryption\Command;

use OCA\Encryption\Util;
use OCP\IConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Input\InputOption;

class SelectEncryptionType extends Command {

	/** @var Util */
	protected $util;

	/** @var IConfig */
	protected $config;

	/** @var  QuestionHelper */
	protected $questionHelper;

	/**
	 * @param Util $util
	 * @param IConfig $config
	 * @param QuestionHelper $questionHelper
	 */
	public function __construct(Util $util,
								IConfig $config,
								QuestionHelper $questionHelper) {

		$this->util = $util;
		$this->config = $config;
		$this->questionHelper = $questionHelper;
		parent::__construct();
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('encryption:select-encryption-type')
			->setDescription('Select the encryption type. The encryption types available are: masterkey and user-keys. There is also no way to disable it again.')
			->addArgument(
					'encryption-type',
				InputArgument::REQUIRED,
				'Encryption type can be either: masterkey | user-keys'
			)
		;

		$this->addOption(
			'yes',
			'y',
			InputOption::VALUE_NONE,
			'Answer yes to all questions'
		);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if($this->config->getAppValue('core', 'encryption_enabled', 'no') === 'no') {
			$output->writeln('Kindly enable encryption to select the encryption type.');
			return 1;
		}

		$encryptionType = $input->getArgument('encryption-type');
		$yes = $input->getOption('yes');

		$masterKeyNotEnabled = (!$this->util->isMasterKeyEnabled());
		$userKeysNotEnabled = ($this->config->getAppValue('encryption','userSpecificKey', '') === '');
		$freshInstallation = ($masterKeyNotEnabled && $userKeysNotEnabled);

		if(!$freshInstallation) {
			if(!$masterKeyNotEnabled) {
				$output->writeln("Master key already enabled");
			} else {
				$output->writeln("User keys already enabled");
			}
			return 1;
		}

		if($encryptionType === "masterkey") {
			$question = new ConfirmationQuestion(
				'Warning: Only available for fresh installations with no existing encrypted data! '
				. 'There is also no way to disable it again. Do you want to continue? (y/n) ', false);
			if ($yes || $this->questionHelper->ask($input, $output, $question)) {
				$this->config->setAppValue('encryption', 'useMasterKey', '1');
				$output->writeln('Master key successfully enabled.');
			}
		} elseif ($encryptionType === "user-keys") {
			$question = new ConfirmationQuestion(
				'Warning: Only available for fresh installations with no existing encrypted data! '
				. 'There is also no way to disable it again. Do you want to continue? (y/n) ', false);
			if ($yes || $this->questionHelper->ask($input, $output, $question)) {
				$this->config->setAppValue('encryption', 'userSpecificKey', '1');
				$output->writeln('User key successfully enabled.');
			}
		} else {
			$output->writeln("The option provided for encryption-type " . $encryptionType . " is not valid. The available options are: 'masterkey' or 'user-keys'");
		}

	}
}

