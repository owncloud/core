<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Gherkin\Node\TableNode;
use TestHelpers\LoggingHelper;

/**
 * Logging trait
 */
trait Logging {
	private $oldLogLevel = null;
	private $oldLogBackend = null;
	private $oldLogTimezone = null;

	/**
	 * checks for specific rows in the log file.
	 * order of the table has to be the same as in the log file
	 * empty cells in the table will not be checked!
	 *
	 * @Then the last lines of the log file should contain log-entries with these attributes:
	 *
	 * @param TableNode $expectedLogEntries table with headings that correspond
	 *                                      to the json keys in the log entry
	 *                                      e.g.
	 *                                      |user|app|method|message|
	 *
	 * @return void
	 */
	public function theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes(
		TableNode $expectedLogEntries
	) {
		//-1 because getRows gives also the header
		$linesToRead = \count($expectedLogEntries->getRows()) - 1;
		$logLines = LoggingHelper::tailFile(
			LoggingHelper::getLogFilePath(),
			$linesToRead
		);
		$lineNo = 0;
		foreach ($expectedLogEntries as $expectedLogEntry) {
			$logEntry = \json_decode($logLines[$lineNo], true);
			foreach (\array_keys($expectedLogEntry) as $attribute) {
				$expectedLogEntry[$attribute]
					= $this->featureContext->substituteInLineCodes(
						$expectedLogEntry[$attribute]
					);
				PHPUnit_Framework_Assert::assertArrayHasKey(
					$attribute, $logEntry,
					"could not find attribute: '" . $attribute .
					"' in log entry: '" . $logLines[$lineNo] . "'"
				);
				if ($expectedLogEntry[$attribute] !== "") {
					PHPUnit_Framework_Assert::assertEquals(
						$expectedLogEntry[$attribute], $logEntry[$attribute],
						"log entry:\n" . $logLines[$lineNo] . "\n"
					);
				}
			}
			$lineNo++;
		}
	}

	/**
	 * fails if there is at least one line in the log file that matches all
	 * given attributes
	 * attributes in the table that are empty will match any value in the
	 * corresponding attribute in the log file
	 *
	 * @Then the log file should not contain any log-entries with these attributes:
	 *
	 * @param TableNode $logEntriesExpectedNotToExist table with headings that
	 *                                                correspond to the json
	 *                                                keys in the log entry
	 *                                                e.g.
	 *                                                |user|app|method|message|
	 *
	 * @return void
	 */
	public function theLogFileShouldNotContainAnyLogEntriesWithTheseAttributes(
		TableNode $logEntriesExpectedNotToExist
	) {
		$logLines = \file(LoggingHelper::getLogFilePath());
		foreach ($logLines as $logLine) {
			$logEntries = \json_decode($logLine, true);
			foreach ($logEntriesExpectedNotToExist as $logEntryExpectedNotToExist) {
				foreach (\array_keys($logEntryExpectedNotToExist) as $attribute) {
					$logEntryExpectedNotToExist[$attribute]
						= $this->featureContext->substituteInLineCodes(
							$logEntryExpectedNotToExist[$attribute]
						);
					if (isset($logEntries[$attribute])
						&& ($logEntryExpectedNotToExist[$attribute] === ""
						|| $logEntryExpectedNotToExist[$attribute] === $logEntries[$attribute])
					) {
						$match = true;
					} else {
						$match = false;
						break;
					}
				}
			}
			PHPUnit_Framework_Assert::assertFalse(
				$match,
				"found a log entry that should not be there\n" . $logLine . "\n"
			);
		}
	}

	/**
	 * @When the owncloud log level is set to :logLevel
	 * @Given the owncloud log level has been set to :logLevel
	 *
	 * @param string $logLevel (debug|info|warning|error)
	 *
	 * @return void
	 */
	public function owncloudLogLevelIsSetTo($logLevel) {
		LoggingHelper::setLogLevel($logLevel);
	}

	/**
	 * @When the owncloud log backend is set to :backend
	 * @Given the owncloud log backend has been set to :backend
	 *
	 * @param string $backend (owncloud|syslog|errorlog)
	 *
	 * @return void
	 */
	public function owncloudLogBackendIsSetTo($backend) {
		LoggingHelper::setLogBackend($backend);
	}

	/**
	 * @When the owncloud log timezone is set to :timezone
	 * @Given the owncloud log timezone has been set to :timezone
	 *
	 * @param string $timezone
	 *
	 * @return void
	 */
	public function owncloudLogTimezoneIsSetTo($timezone) {
		LoggingHelper::setLogTimezone($timezone);
	}

	/**
	 * @When the owncloud log is cleared
	 * @Given the owncloud log has been cleared
	 *
	 * @return void
	 */
	public function theOwncloudLogIsCleared() {
		LoggingHelper::clearLogFile();
	}

	/**
	 * Before Scenario for logging. Saves current log settings
	 *
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function setUpScenarioLogging() {
		$this->oldLogLevel = LoggingHelper::getLogLevel();
		$this->oldLogBackend = LoggingHelper::getLogBackend();
		$this->oldLogTimezone = LoggingHelper::getLogTimezone();
	}

	/**
	 * After Scenario for logging. Sets back old log settings
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function tearDownScenarioLogging() {
		if ($this->oldLogLevel !== null
			&& $this->oldLogLevel !== LoggingHelper::getLogLevel()
		) {
			LoggingHelper::setLogLevel($this->oldLogLevel);
		}
		if ($this->oldLogBackend !== null
			&& $this->oldLogBackend !== LoggingHelper::getLogBackend()
		) {
			LoggingHelper::setLogBackend($this->oldLogBackend);
		}
		if ($this->oldLogTimezone !== null
			&& $this->oldLogTimezone !== LoggingHelper::getLogTimezone()
		) {
			LoggingHelper::setLogTimezone($this->oldLogTimezone);
		}
	}
}
