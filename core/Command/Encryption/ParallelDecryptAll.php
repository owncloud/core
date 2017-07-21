<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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
use Symfony\Component\Console\Helper\ProgressBar;
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

	/** @var \OC\Encryption\ParallelDecryptAll */
	protected $parallelDecryptAll;

	/** @var  OutputInterface */
	protected $output;

	/** @var  InputInterface  */
	protected $input;

	/**
	 * @param IManager $encryptionManager
	 * @param IAppManager $appManager
	 * @param IConfig $config
	 * @param \OC\Encryption\DecryptAll $parallelDecryptAll
	 */
	public function __construct(
		IManager $encryptionManager,
		IAppManager $appManager,
		IConfig $config,
		\OC\Encryption\ParallelDecryptAll $parallelDecryptAll
	) {
		parent::__construct();
		$this->appManager = $appManager;
		$this->encryptionManager = $encryptionManager;
		$this->config = $config;
		$this->parallelDecryptAll = $parallelDecryptAll;
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

		$this->parallelDecryptAll->setInOut($input, $output);

		$user = $input->getArgument('user');

		$this->output->writeln('Preparing module for decryption...');
		if ($this->parallelDecryptAll->prepareEncryptionModules($user) === false) {
			return false;
		}

		$this->checkSetup();

		$output->writeln("Decrypting $user...");

		// Run the decryption
		$progress = new ProgressBar($this->output);
		$progress->setFormat(" %message% \n [%bar%]");
		$this->parallelDecryptAll->decryptUsersFiles($user, $progress, 1);

		return $this->parallelDecryptAll->checkForFailure($output);

	}
}
