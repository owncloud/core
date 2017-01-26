<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

namespace OC\Core\Command\Upgrade;

use OC\Updater\PreUpdate;
use OCP\App\IAppManager;
use OCP\ILogger;
use OC\Core\Command\Base;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckApps extends Base {
	/** @var  PreUpdate */
	private $preUpdate;

	/** @var ILogger */
	private $logger;

	/**
	 * @param IAppManager $appManager
	 * @param ILogger $logger
	 */
	public function __construct(PreUpdate $preUpdate, ILogger $logger) {
		parent::__construct();
		$this->preUpdate = $preUpdate;
		$this->logger = $logger;
	}


	protected function configure() {
		parent::configure();
		$this
			->setName('upgrade:checkapps')
			->setDescription('Check if there are apps with missing code.')
		;
	}

	/**
	 * Execute the command
	 *
	 * @param InputInterface $input input interface
	 * @param OutputInterface $output output interface
	 * @return int|null
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$missingApps = $this->preUpdate->getMissingApps();
		if (count($missingApps) !==0 ){
			$this->writeArrayInOutputFormat($input, $output, $missingApps);
			return 1;
		}
		return 0;
	}
}
