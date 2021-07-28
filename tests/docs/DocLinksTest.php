#!/usr/bin/env php
<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;

require_once __DIR__ . '/../../lib/base.php';

\set_time_limit(0);

if (!\OC::$CLI) {
	echo "This script can be run from the command line only" . PHP_EOL;
	exit(1);
}

class TestDocLinksCommand extends Command {
	protected static $defaultName = 'testDocLinks';

	protected function configure() {
		$this
			->addArgument(
				'version',
				InputArgument::OPTIONAL,
				'The ownCloud version to look for in the docs. Defaults to the current version of this ownCloud instance.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$ocVersion = $input->getArgument('version');
		if (!$ocVersion) {
			$versionArr = \OCP\Util::getVersion();
			$ocVersion = $versionArr[0] . '.' . $versionArr[1];
		}

		$urlGenerator = \OC::$server->getURLGenerator();
		$client = \OC::$server->getHTTPClientService()->newClient();

		$reflectionClass = new \ReflectionClass(\OCP\Constants::class);
		$constants = $reflectionClass->getConstants();
		$errorsOccurred = false;

		foreach ($constants as $constName => $identifier) {
			if (strpos($constName, 'DOCS_') === 0) {
				$docLink = $urlGenerator->linkToDocs($identifier, $ocVersion);
				try {
					$client->head($docLink);
				} catch (\Exception $e) {
					$errorsOccurred = true;
					$errCode = $e->getCode();
					$output->writeln("<error>Doclink for '$identifier' failed with status code $errCode: $docLink</error>");
				}
			}
		}

		if (!$errorsOccurred) {
			$output->writeln("<info>All doclinks are valid!</info>");
		}

		return Command::SUCCESS;
	}
}

$application = new Application();

$command = new TestDocLinksCommand();

$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run(new ArgvInput());
