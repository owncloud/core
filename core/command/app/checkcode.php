<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Core\Command\App;

use OC\App\CodeChecker\Exception\HardFail;
use OC\App\CodeChecker\Exception\SoftFail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use OC\App\CodeChecker\Exception\Error;

class CheckCode extends Command {
	protected function configure() {
		$this
			->setName('app:check-code')
			->setDescription('check code to be compliant')
			->addArgument(
				'app-id',
				InputArgument::REQUIRED,
				'check the specified app'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$appId = $input->getArgument('app-id');
		$codeChecker = new \OC\App\CodeChecker\CodeChecker();
		$codeChecker->listen('CodeChecker', 'analyseFileBegin', function($params) use ($output) {
			if(OutputInterface::VERBOSITY_VERBOSE <= $output->getVerbosity()) {
				$output->writeln("<info>Analysing {$params}</info>");
			}
		});
		$codeChecker->listen('CodeChecker', 'analyseFileFinished', function($filename, $errors) use ($output) {
			/** @var Error[] $errors */
			$count = count($errors);

			// show filename if the verbosity is low, but there are errors in a file
			if($count > 0 && OutputInterface::VERBOSITY_VERBOSE > $output->getVerbosity()) {
				$output->writeln("<info>Analysing {$filename}</info>");
			}

			// show error count if there are errros present or the verbosity is high
			if($count > 0 || OutputInterface::VERBOSITY_VERBOSE <= $output->getVerbosity()) {
				$output->writeln(" {$count} errors");
			}

			// FIXME: Make work with error class
			/*	usort($params, function($a, $b) {
				return $a['line'] >$b['line'];
			});*/


			$style = new OutputFormatterStyle('yellow');
			$output->getFormatter()->setStyle('warning', $style);

			foreach($errors as $error) {
				$line = sprintf("%' 4d", $error->getLine());
				if($error instanceof HardFail) {
					$output->writeln("    <error>error: line $line: {$error->getDisallowedToken()} - {$error->getMessage()}</error>");
				} elseif ($error instanceof SoftFail) {
					$output->writeln("    <warning>warning: line $line: {$error->getDisallowedToken()} - {$error->getMessage()}</warning>");
				}
			}
		});
		$errors = $codeChecker->analyse($appId);
		if (empty($errors)) {
			$output->writeln('<info>App is compliant - awesome job!</info>');
		} else {
			$output->writeln('<error>App is not compliant</error>');
		}
	}
}
