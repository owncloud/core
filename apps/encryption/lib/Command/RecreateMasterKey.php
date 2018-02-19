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


namespace OCA\Encryption\Command;

use OC\Encryption\DecryptAll;
use OC\Encryption\Exceptions\DecryptionFailedException;
use OC\Encryption\Manager;
use OC\Files\Filesystem;
use OC\Files\View;
use OC\Memcache\ArrayCache;
use OCA\Encryption\Crypto\EncryptAll;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Users\Setup;
use OCA\Encryption\Util;
use OCP\App\IAppManager;
use OCP\IAppConfig;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\ISession;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class RecreateMasterKey extends Command {

	/** @var Manager  */
	protected $encryptionManager;

	/** @var IUserManager  */
	protected $userManager;

	/** @var View  */
	protected $rootView;

	/** @var KeyManager  */
	protected $keyManager;

	/** @var Util  */
	protected $util;

	/** @var \OC\Encryption\Util  */
	protected $encUtil;

	/** @var  IAppManager */
	protected $appManager;

	/** @var  IAppConfig */
	protected $appConfig;

	/** @var IConfig  */
	protected $config;

	/** @var ISession  */
	protected $session;

	/** @var QuestionHelper  */
	protected $questionHelper;

	/** @var Setup  */
	protected $userSetup;

	/** @var IMailer  */
	protected $mailer;

	/** @var ISecureRandom  */
	protected $secureRandom;

	/** @var IL10N  */
	protected $l;

	/** @var ILogger  */
	protected $logger;

	/** @var  */
	protected $encryptAll;

	protected $decryptAll;

	/** @var array files which couldn't be decrypted */
	protected $failed;

	/**
	 * RecreateMasterKey constructor.
	 *
	 * @param IUserManager $userManager
	 * @param View $rootView
	 * @param KeyManager $keyManager
	 * @param Util $util
	 * @param IAppManager $appManager
	 * @param IAppConfig $appConfig
	 * @param IConfig $config
	 * @param ISession $session
	 * @param QuestionHelper $questionHelper
	 * @param Setup $userSetup
	 * @param IMailer $mailer
	 * @param ISecureRandom $secureRandom
	 * @param IL10N $l
	 * @param ILogger $logger
	 */
	public function __construct(IUserManager $userManager, View $rootView, KeyManager $keyManager, Util $util, \OC\Encryption\Util $encUtil,
								IAppManager $appManager, IAppConfig $appConfig, IConfig $config, ISession $session,
								Manager $encryptionManager, QuestionHelper $questionHelper, Setup $userSetup, IMailer $mailer,
								ISecureRandom $secureRandom, IL10N $l, ILogger $logger) {

		parent::__construct();
		$this->userManager = $userManager;
		$this->rootView = $rootView;
		$this->keyManager = $keyManager;
		$this->util = $util;
		$this->encUtil = $encUtil;
		$this->appManager = $appManager;
		$this->appConfig = $appConfig;
		$this->config = $config;
		$this->session = $session;
		$this->encryptionManager = $encryptionManager;
		$this->questionHelper = $questionHelper;
		$this->userSetup = $userSetup;
		$this->mailer = $mailer;
		$this->secureRandom = $secureRandom;
		$this->l = $l;
		$this->logger = $logger;
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
			if ($yes || $this->questionHelper->ask($input, $output, $question)) {

				$output->writeln("Decryption started\n");
				$progress = new ProgressBar($output);
				$progress->start();
				$progress->setMessage("Decryption in progress...");
				$progress->advance();

				$this->decryptAllUsers($input, $output);
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

					$this->appConfig->setValue('core', 'encryption_enabled', 'no');
					$this->appConfig->deleteKey('encryption', 'useMasterKey');
					$this->appConfig->deleteKey('encryption', 'masterKeyId');
					$this->appConfig->deleteKey('encryption', 'recoveryKeyId');
					$this->appConfig->deleteKey('encryption', 'publicShareKeyId');
					$this->appConfig->deleteKey('files_encryption', 'installed_version');

				}
				$output->writeln("\nDecryption completed\n");

				//Reencrypt again
				$this->appManager->enableApp('encryption');
				$this->appConfig->setValue('core', 'encryption_enabled', 'yes');
				$this->appConfig->setValue('encryption', 'enabled', 'yes');
				$output->writeln("Encryption started\n");

				$output->writeln("Waiting for creating new masterkey\n");

				$this->keyManager->setPublicShareKeyIDAndMasterKeyId();

				$output->writeln("New masterkey created successfully\n");

				$this->appConfig->setValue('encryption', 'enabled', 'yes');
				$this->appConfig->setValue('encryption', 'useMasterKey', '1');

				/**
				 * Call validateShareKey method, to check if public share exists,
				 * else create one.
				 */
				$this->keyManager->validateShareKey();
				/**
				 * Same here, check if public masterkey exists else
				 * create one.
				 */
				$this->keyManager->validateMasterKey();
				$this->encryptAllUsers($input, $output);
				$output->writeln("\nEncryption completed successfully\n");
			} else {
				$output->writeln("The process is abandoned");
			}
		} else {
			$output->writeln("Master key is not enabled.\n");
		}
	}

	protected function decryptAllUsers(InputInterface $input, OutputInterface $output) {
		$this->decryptAll = new DecryptAll($this->encryptionManager, $this->userManager, $this->rootView, $this->logger);
		$this->decryptAll->decryptAll($input,$output);
	}

	protected function encryptAllUsers(InputInterface $input, OutputInterface $output) {
		/*
		 * We are reusing the encryptAll code but not the decryptAll. The reason being
		 * decryptAll finishes by encrypting. Which is not what we want. This will make
		 * things out of scope for this command. We want first the entire oC FS to be
		 * decrypt. Then re-encrypt the entire oC FS with the new master key generated.
		 *
		 */
		$this->encryptAll = new EncryptAll(
			$this->userSetup, $this->userManager, $this->rootView,
			$this->keyManager, $this->util, $this->config,
			$this->mailer, $this->l, $this->questionHelper,
			$this->secureRandom);
		$this->encryptAll->encryptAll($input, $output);
	}
}

