<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OC\Migration;

use OCP\IConfig;
use OCP\Migration\IOutput;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputAdapter implements OutputInterface {

	protected $config;

	protected $output;

	public function __construct(IConfig $config, IOutput $output) {
		$this->config = $config;
		$this->output = $output;
	}

	/**
	 * Returns whether verbosity is debug (-vvv).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_DEBUG, false otherwise
	 */
	public function isDebug() {
		return (int)($this->config->getSystemValue('loglevel', 2)) === 0;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setFormatter(OutputFormatterInterface $formatter) {
		// do nothing
	}

	/**
	 * Returns whether verbosity is verbose (-v).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_VERBOSE, false otherwise
	 */
	public function isVerbose() {
		return $this->isDebug();
	}

	/**
	 * Returns whether verbosity is very verbose (-vv).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_VERY_VERBOSE, false otherwise
	 */
	public function isVeryVerbose() {
		return $this->isDebug();
	}

	/**
	 * {@inheritdoc}
	 */
	public function write($messages, $newline = false, $options = 0) {
		if (is_string($messages)) {
			$messages = [$messages];
		}
		foreach ($messages as $message) {
			if ($this->output instanceof SimpleOutput) {
				if (strncmp("\x0D", $message, 1)
					|| strncmp("\x1B", $message, 1)) {
					continue; // cannot erase lines in the logfile
				}
			}
			$this->output->info($message);
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function writeln($messages, $options = 0) {
		$this->write($messages, false, $options);
	}

	/**
	 * {@inheritdoc}
	 */
	public function setVerbosity($level) {
		// do nothing
	}

	/**
	 * {@inheritdoc}
	 */
	public function getVerbosity() {
		if ($this->isDebug()) {
			return OutputInterface::VERBOSITY_DEBUG;
		} else {
			return OutputInterface::VERBOSITY_NORMAL;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function setDecorated($decorated) {
		// do nothing
	}

	/**
	 * {@inheritdoc}
	 */
	public function isDecorated() {
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getFormatter() {
		// to comply with the interface we must return a OutputFormatterInterface
		return new OutputFormatter();
	}

	/**
	 * Returns whether verbosity is quiet (-q).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_QUIET, false otherwise
	 */
	public function isQuiet() {
		return false;
	}
}