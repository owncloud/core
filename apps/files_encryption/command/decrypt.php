<?php
/**
 * Copyright (c) 2014 Simon Vocella <voxsim@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files_Encryption\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Decrypt extends AbstractEncryptionCommand {

	protected function configure() {
		parent::configure();
		$this	->setName('encryption:decrypt')
			->setDescription('decrypt command for encryption');
	}

	protected function executeEncryptionCommand(InputInterface $input, OutputInterface $output, \OC\Files\View $view, $uid) {
		$util = new \OCA\Files_Encryption\Util($view, $uid);
                $result = $util->decryptAll('/' . $uid . '/' . 'files');
		if($result) {
			$output->writeln("The user $uid has all files decrypted.");
		} else {
			$output->writeln("The user $uid had some problems in the decryption phase.");
		}
	}
}
