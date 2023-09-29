<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Command;

use Closure;
use InvalidArgumentException;
use Laravel\SerializableClosure\SerializableClosure;
use OCP\BackgroundJob\IJobList;
use OCP\Command\IBus;
use OCP\Command\ICommand;
use function array_search;
use function class_uses;
use function is_callable;
use function serialize;
use function trim;

/**
 * Asynchronous command bus that uses the background job system as backend
 */
class AsyncBus implements IBus {
	private IJobList $jobList;

	/**
	 * List of traits for command which require sync execution
	 *
	 * @var string[]
	 */
	private $syncTraits = [];

	/**
	 * @param IJobList $jobList
	 */
	public function __construct(IJobList $jobList) {
		$this->jobList = $jobList;
	}

	/**
	 * Schedule a command to be fired
	 *
	 * @param ICommand | callable $command
	 */
	public function push($command) {
		if ($this->canRunAsync($command)) {
			$this->jobList->add($this->getJobClass($command), $this->serializeCommand($command));
		} else {
			$this->runCommand($command);
		}
	}

	/**
	 * Require all commands using a trait to be run synchronous
	 *
	 * @param string $trait
	 */
	public function requireSync($trait) {
		$this->syncTraits[] = trim($trait, '\\');
	}

	/**
	 * @param ICommand | callable $command
	 */
	private function runCommand($command) {
		if ($command instanceof ICommand) {
			$command->handle();
		} else {
			$command();
		}
	}

	/**
	 * @param ICommand | callable $command
	 * @return string
	 */
	private function getJobClass($command) {
		if ($command instanceof Closure) {
			return 'OC\Command\ClosureJob';
		}

		if (\is_callable($command)) {
			return 'OC\Command\CallableJob';
		}

		if ($command instanceof ICommand) {
			return 'OC\Command\CommandJob';
		}

		throw new InvalidArgumentException('Invalid command');
	}

	/**
	 * @param ICommand | callable $command
	 * @return string
	 */
	private function serializeCommand($command) {
		if ($command instanceof Closure) {
			return serialize(new SerializableClosure($command));
		}

		if (\is_callable($command) || $command instanceof ICommand) {
			return serialize($command);
		}

		throw new InvalidArgumentException('Invalid command');
	}

	/**
	 * @param ICommand | callable $command
	 * @return bool
	 */
	private function canRunAsync($command) {
		$traits = $this->getTraits($command);
		foreach ($traits as $trait) {
			if (array_search($trait, $this->syncTraits) !== false) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @param ICommand | callable $command
	 * @return string[]
	 */
	private function getTraits($command) {
		if ($command instanceof ICommand) {
			return class_uses($command);
		}

		return [];
	}
}
