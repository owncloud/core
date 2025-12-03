<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

/**
 * Class StartCommand
 *
 * @package Owncloud\Updater\Command
 */
class StartCommand extends Command {
	protected $stack = [
		[ 'command' => 'upgrade:info'],
		[ 'command' => 'upgrade:checkSystem'],
		[ 'command' => 'upgrade:detect', '--exit-if-none' => '1'],
		//[ 'command' => 'upgrade:maintenanceMode', '--on' => '1'],
		[ 'command' => 'upgrade:backupDb'],
		[ 'command' => 'upgrade:backupData'],
		[ 'command' => 'upgrade:checkpoint', '--create' => '1'],
		[ 'command' => 'upgrade:preUpgradeRepair'],
		[ 'command' => 'upgrade:executeCoreUpgradeScripts'],
		[ 'command' => 'upgrade:cleanCache'],
		[ 'command' => 'upgrade:postUpgradeRepair'],
		[ 'command' => 'upgrade:restartWebServer'],
		[ 'command' => 'upgrade:updateConfig'],
		//[ 'command' => 'upgrade:maintenanceMode', '--off' => '1'],
		[ 'command' => 'upgrade:postUpgradeCleanup'],
	];

	protected function configure() {
		$this
				->setName('upgrade:start')
				->setDescription('automated process')
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 * @throws \Throwable
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$app = $this->getApplication();
		foreach ($this->stack as $command) {
			$input = new ArrayInput($command);
			$returnCode = $app->doRun($input, $output);
			if ($returnCode != 0) {
				// Something went wrong
				break;
			}
		}
		$output->writeln('Done');
		return 0;
	}
}
