<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OC\Core\Command\Maintenance;

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\ILogger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;

class DataFingerprint extends Command {

	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var ILogger */
	private $logger;

	public function __construct(IConfig $config,
								ITimeFactory $timeFactory,
								ILogger $logger) {
		$this->config = $config;
		$this->timeFactory = $timeFactory;
		$this->logger = $logger;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('maintenance:data-fingerprint')
			->setDescription('Update the systems data-fingerprint after a backup is restored.');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$io = new SymfonyStyle($input, $output);
		$warning = <<<EOD
Setting the data fingerprint will notify desktop and mobile clients that a server backup has been restored. 
Users will be prompted to resolve any conflicts between newer and older file versions.

Setting the data fingerprint has a large impact on all connected clients!

Only perform this operation if you really know what you are doing.
EOD;

		$io->warning($warning);
		if ($io->confirm('Do you want to set the data fingerprint?', false)) {
			$osUser = \get_current_user();
			$server = \gethostname();
			$fingerprint = \md5($this->timeFactory->getTime());
			$this->config->setSystemValue('data-fingerprint', $fingerprint);
			$this->logger->info("Data fingerprint was set by $osUser@$server to $fingerprint");
		}
	}
}
