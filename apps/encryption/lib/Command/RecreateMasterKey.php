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

namespace OCA\Encryption\Command;

use OC\Files\View;
use OCA\Encryption\Factory\EncDecAllFactory;
use OCA\Encryption\Util;
use OCP\App\IAppManager;
use OCP\IAppConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class RecreateMasterKey extends Command {

	/** @var View  */
	protected $rootView;

	/** @var Util  */
	protected $util;

	/** @var \OC\Encryption\Util  */
	protected $encUtil;

	/** @var  IAppManager */
	protected $appManager;

	/** @var  IAppConfig */
	protected $appConfig;

	/** @var EncDecAllFactory */
	private $encDecAllFactory;

	/** @var array files which couldn't be decrypted */
	protected $failed;

	/**
	 * RecreateMasterKey constructor.
	 *
	 * @param View $rootView
	 * @param Util $util
	 * @param \OC\Encryption\Util $encUtil
	 * @param IAppManager $appManager
	 * @param IAppConfig $appConfig
	 * @param EncDecAllFactory $encDecAllFactory
	 */
	public function __construct(View $rootView, Util $util, \OC\Encryption\Util $encUtil,
								IAppManager $appManager, IAppConfig $appConfig,
								EncDecAllFactory $encDecAllFactory) {
		parent::__construct();
		$this->rootView = $rootView;
		$this->util = $util;
		$this->encUtil = $encUtil;
		$this->appManager = $appManager;
		$this->appConfig = $appConfig;
		$this->encDecAllFactory = $encDecAllFactory;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('encryption:recreate-master-key')
			->setDescription('Replace existing master key with new one. Encrypt the file system with newly created master key')
		;

		$this->addOption(
			'yes',
			'y',
			InputOption::VALUE_NONE,
			'Answer yes to all questions'
		);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$yes = $input->getOption('yes');
		if ($this->util->isMasterKeyEnabled()) {
			$question = new ConfirmationQuestion(
				'Warning: In order to re-create master key, the entire ownCloud filesystem will be decrypted and then encrypted using new master key.'
				. ' Do you want to continue? (y/n)', false);
			//$questionHelper = $this->getHelper('question');
			if ($yes || $this->getHelper('question')->ask($input, $output, $question)) {
				$output->writeln("Decryption started\n");
				$progress = new ProgressBar($output);
				$progress->start();
				$progress->setMessage("Decryption in progress...");
				$progress->advance();

				//Get DecryptAll object from the factory
				$decryptAll = $this->encDecAllFactory->getDecryptAllObj();
				$decryptAll->decryptAll($input, $output);

				$progress->finish();

				if (empty($this->failed)) {
					$this->appManager->disableApp('encryption');

					//Delete the files_encryption dir
					$filesEncryptionDir = $this->encUtil->getKeyStorageRoot();
					if ($filesEncryptionDir === '') {
						$this->rootView->deleteAll('files_encryption');
					} else {
						$this->rootView->deleteAll($filesEncryptionDir . '/files_encryption');
					}

					$this->util->removeEncryptionAppSettings();
				}
				$output->writeln("\nDecryption completed\n");

				//Reencrypt again
				$this->appManager->enableApp('encryption');
				$this->appConfig->setValue('core', 'encryption_enabled', 'yes');
				$this->appConfig->setValue('encryption', 'useMasterKey', '1');

				$output->writeln("Waiting for creating new masterkey\n");

				//Get the EncryptAll object from factory
				$encryptAll = $this->encDecAllFactory->getEncryptAllObj();
				if ($encryptAll->createMasterKey($input, $output) === false) {
					$output->writeln("<error>Error: masterkeys creation failed</error>");
					return 1;
				}
				$output->writeln("New masterkey created successfully\n");

				$output->writeln("Encryption started\n");
				/**
				 * We are reusing the encryptAll code but not the decryptAll. The reason being
				 * decryptAll finishes by encrypting. Which is not what we want. This will make
				 * things out of scope for this command. We want first the entire oC FS to be
				 * decrypt. Then re-encrypt the entire oC FS with the new master key generated.
				 */
				$encryptAll->encryptAll($input, $output);

				$output->writeln("\nEncryption completed successfully\n");
				$output->writeln("\n<info>Note: All users are required to relogin.</info>\n");
				return 0;
			} else {
				$output->writeln("The process is abandoned");
				return 2;
			}
		} else {
			$output->writeln("Master key is not enabled.\n");
			return 3;
		}
	}
}
