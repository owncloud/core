<?php
/**
 * @author Matthew Setter <matthew@matthewsetter.com>
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

namespace OC\Core\Command\App;

use OC\Core\Command\Base;
use OCP\App\IAppManager;
use OCP\IConfig;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MoveApps extends Base {

	/** @var IAppManager */
	protected $manager;

	/** * @var IConfig */
	private $config;

	/**
	 * @param IAppManager $manager
	 * @param IConfig $config
	 */
	public function __construct(IAppManager $manager, IConfig $config) {
		parent::__construct();

		$this->manager = $manager;
		$this->config = $config;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('app:move')
			->setDescription('Move apps from the core apps directory to a non-core apps directory.')
			->addArgument(
				'listNonCoreDirectories',
				InputArgument::OPTIONAL,
				'List any non-core app directories'
			)
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->hasArgument('listNonCoreDirectories')) {
			$this->writeNonAppDirectories($input, $output);
		}
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param array $items
	 */
	protected function writeNonAppDirectories(InputInterface $input, OutputInterface $output) {
		$appPaths = $this->config->getSystemValue('apps_paths');
		$output->writeln('Non-App Directories:');
		$directories = [];
		foreach ($appPaths as $path) {
			if ($path['url'] !== '/apps' && $path['writable'] === true) {
				$directories[] = sprintf("%s -> %s", $path['url'], $path['path']);
			}
		}

		parent::writeArrayInOutputFormat($input, $output, $directories);
	}
}
