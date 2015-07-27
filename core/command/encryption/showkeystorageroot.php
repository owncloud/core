<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
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


namespace OC\Core\Command\Encryption;

use OCP\IConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowKeyStorageRoot extends Command{

	/** @var IConfig  */
	protected $config;

	/**
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		parent::__construct();
		$this->config = $config;
	}

	protected function configure() {
		parent::configure();
		$this
			->setName('encryption:show-key-storage-root')
			->setDescription('Show current key storage root');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$currentRoot = $this->config->getAppValue('core', 'encryption_key_storage_root', '');

		$rootDescription = $currentRoot !== '' ? $currentRoot : 'default storage location (data/)';

		$output->writeln("Current key storage root:  <info>$rootDescription</info>");
	}

}
