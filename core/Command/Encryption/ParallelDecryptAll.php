<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author davitol <dtoledo@solidgear.es>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolín <sbertolin@solidgear.es>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Core\Command\Encryption;

use OCP\App\IAppManager;
use OCP\Encryption\IManager;
use OCP\IConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class ParallelDecryptAll extends Command {

	/** @var IManager */
	protected $encryptionManager;

	/** @var  IAppManager */
	protected $appManager;

	/** @var IConfig */
	protected $config;

	/** @var  bool */
	protected $wasSingleUserModeEnabled;

	/** @var \OC\Encryption\DecryptAll */
	protected $decryptAll;

	/** @var  OutputInterface */
	protected $output;

	/** @var  InputInterface  */
	protected $input;

	/**
	 * @param IManager $encryptionManager
	 * @param IAppManager $appManager
	 * @param IConfig $config
	 * @param \OC\Encryption\DecryptAll $decryptAll
	 */
	public function __construct(
		IManager $encryptionManager,
		IAppManager $appManager,
		IConfig $config,
		\OC\Encryption\DecryptAll $decryptAll
	) {
		parent::__construct();
		$this->appManager = $appManager;
		$this->encryptionManager = $encryptionManager;
		$this->config = $config;
		$this->decryptAll = $decryptAll;
	}

	protected function configure() {
		parent::configure();

		$this->setName('encryption:parallel-decrypt-all');
		$this->setDescription('Decrypts all files for a user - can be used in parallel');
		$this->addArgument(
			'user',
			InputArgument::REQUIRED,
			'user for which you want to decrypt all files'
		);
	}

	protected function checkSetup() {
		$this->output->writeln('Enable single user, disable trashbin, disable encryption...');
		$this->config->setSystemValue('singleuser', true);
		$this->appManager->disableApp('files_trashbin');
		$this->config->setAppValue('core', 'encryption_enabled', 'no');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$this->output = $output;
		$this->input = $input;

		$this->checkSetup();
		$user = $input->getArgument('user');
		$output->writeln("Decrypting $user...");

		// Run the decryption
		$result = $this->decryptAll->decryptAll($input, $output, $user);
		if ($result === false) {
			$output->writeln(' aborted.');
		}

	}
}
