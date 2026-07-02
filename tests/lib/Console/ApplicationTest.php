<?php
/**
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Console;

use OC\Console\Application;
use Symfony\Component\Console\Command\Command;
use Test\TestCase;

/**
 * A minimal, dependency-free console command used as the "valid" command in
 * the resilience test. It must be resolvable both via the DI container
 * (\OC::$server->query()) and via `new $command()`.
 */
class ValidStubCommand extends Command {
	protected function configure() {
		$this->setName('test:valid-stub-command');
	}
}

/**
 * A fake Symfony application that just records the commands it is asked to
 * register, so the test can assert which commands survived loading without
 * needing a real Symfony Application instance.
 */
class RecordingApplication {
	public $registered = [];

	public function addCommand($command) {
		$this->registered[] = $command;
	}
}

/**
 * @group DB
 *
 * Requires the ownCloud test bootstrap (\OC::$server must be available for the
 * logger and the DI container). It does NOT require a database connection, but
 * is tagged @group DB so it only runs in the bootstrapped suite where
 * \OC::$server is wired up.
 */
class ApplicationTest extends TestCase {
	/**
	 * Core guarantee for issue #33895: a single broken app-provided command
	 * (here an unknown/non-existent class name, which today reaches the
	 * `throw new \Exception(...)` path) must NOT abort loading or kill occ.
	 * The broken command is skipped (and logged) while every other valid
	 * command is still registered.
	 */
	public function testBrokenCommandDoesNotAbortLoading() {
		// Build an Application without running its constructor so we don't need
		// a real Symfony Application / OC_Defaults / version string here.
		$reflection = new \ReflectionClass(Application::class);
		$application = $reflection->newInstanceWithoutConstructor();

		// Inject a fake Symfony application that just records added commands.
		$symfonyApplication = new RecordingApplication();
		self::invokePrivate($application, 'application', [$symfonyApplication]);

		$commands = [
			// Broken: unknown class -> throws inside the loop. Must be skipped.
			'OC\\This\\Command\\Does\\Not\\Exist',
			// Valid: must still be registered despite the broken one above.
			ValidStubCommand::class,
		];

		// The method must NOT throw despite the broken command.
		self::invokePrivate($application, 'loadCommandsFromInfoXml', [$commands]);

		// The valid command was still registered.
		$this->assertCount(1, $symfonyApplication->registered);
		$this->assertInstanceOf(ValidStubCommand::class, $symfonyApplication->registered[0]);
	}
}
