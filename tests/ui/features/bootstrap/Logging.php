<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <info@jankaritech.com>
 * @copyright 2017 Artur Neumann info@jankaritech.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
use TestHelpers\LoggingHelper;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;

trait Logging
{
	private $oldLogLevel = null;
	private $oldLogBackend = null;
	private $oldLogTimezone = null;
	
	/**
	 * checks for specific rows in the log file.
	 * order of the table has to be the same as in the log file
	 * empty cells in the table will not be checked!
	 * 
	 * @param TableNode $expectedLogEntries table with headings that correspond
	 * to the json keys in the log entry
	 * e.g.
	 * |user|app|method|message|
	 * @Then the last lines of the log file should contain log-entries with these attributes:
	 * @return void
	 */
	public function theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes(
		TableNode $expectedLogEntries
	) {
		//-1 because getRows gives also the header
		$linesToRead = count($expectedLogEntries->getRows()) - 1;
		$logLines = LoggingHelper::tailFile(
			LoggingHelper::getLogFilePath($this->ocPath),
			$linesToRead
		);
		$lineNo = 0;
		foreach ($expectedLogEntries as $expectedLogEntry) {
			$logEntry = json_decode($logLines[$lineNo], true);
			foreach (array_keys($expectedLogEntry) as $attribute) {
				$expectedLogEntry [$attribute] = $this->substituteInLineCodes(
					$expectedLogEntry [$attribute]
				);
				PHPUnit_Framework_Assert::assertArrayHasKey(
					$attribute, $logEntry,
					"could not find attribute: '". $attribute .
					"' in log entry: '" . $logLines [$lineNo] . "'"
				);
				if ($expectedLogEntry [$attribute] !== "") {
					PHPUnit_Framework_Assert::assertEquals(
						$expectedLogEntry [$attribute], $logEntry [$attribute],
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
	 * @param TableNode $logEntriesExpectedNotToExist table with headings that correspond
	 * to the json keys in the log entry
	 * e.g.
	 * |user|app|method|message|
	 * @Then the log file should not contain any log-entries with these attributes:
	 * @return void
	 */
	public function theLogFileShouldNotContainAnyLogEntriesWithTheseAttributes(TableNode $logEntriesExpectedNotToExist)
	{
		$logLines = file(LoggingHelper::getLogFilePath($this->ocPath));
		foreach ($logLines as $logLine) {
			$logEntries = json_decode($logLine, true);
			foreach ($logEntriesExpectedNotToExist as $logEntryExpectedNotToExist) {
				foreach (array_keys($logEntryExpectedNotToExist) as $attribute) {
					$logEntryExpectedNotToExist [$attribute]
						= $this->substituteInLineCodes(
							$logEntryExpectedNotToExist [$attribute]
						);
					if (isset($logEntries [$attribute]) 
						&& ($logEntryExpectedNotToExist [$attribute] === ""
						|| $logEntryExpectedNotToExist [$attribute] === $logEntries [$attribute])
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
	 * @param string $logLevel (debug|info|warning|error)
	 * @Given owncloud log level is set to :logLevel
	 * @return void
	 */
	public function owncloudLogLevelIsSetTo($logLevel)
	{
		LoggingHelper::setLogLevel($this->ocPath, $logLevel);
	}

	/**
	 * @param string $backend (owncloud|syslog|errorlog)
	 * @Given owncloud log backend is set to :backend
	 * @return void
	 */
	public function owncloudLogBackendIsSetTo($backend)
	{
		LoggingHelper::setLogBackend($this->ocPath, $backend);
	}

	/**
	 * @param string $timezone
	 * @Given owncloud log timezone is set to :timezone
	 * @return void
	 */
	public function owncloudLogTimezoneIsSetTo($timezone)
	{
		LoggingHelper::setLogTimezone($this->ocPath, $timezone);
	}

	/**
	 * @Given the owncloud log is cleared
	 * @return void
	 */
	public function theOwncloudLogIsCleared()
	{
		LoggingHelper::clearLogFile($this->ocPath);
	}

	/**
	 * Before Scenario for logging. Saves current log settings
	 * 
	 * @param BeforeScenarioScope $scope
	 * @BeforeScenario
	 * @return void
	 */
	public function setUpScenarioLogging(BeforeScenarioScope $scope)
	{
		$this->oldLogLevel = LoggingHelper::getLogLevel($this->ocPath);
		$this->oldLogBackend = LoggingHelper::getLogBackend($this->ocPath);
		$this->oldLogTimezone = LoggingHelper::getLogTimezone($this->ocPath);
	}

	/**
	 * After Scenario for logging. Sets back old log settings
	 * 
	 * @param AfterScenarioScope $scope
	 * @AfterScenario
	 * @return void
	 */
	public function tearDownScenarioLogging(AfterScenarioScope $scope)
	{
		if ($this->oldLogLevel !== null
			&& $this->oldLogLevel !== LoggingHelper::getLogLevel($this->ocPath)
		) {
			LoggingHelper::setLogLevel($this->ocPath, $this->oldLogLevel);
		}
		if ($this->oldLogBackend !== null
			&& $this->oldLogBackend !== LoggingHelper::getLogBackend($this->ocPath)
		) {
			LoggingHelper::setLogBackend($this->ocPath, $this->oldLogBackend);
		}
		if ($this->oldLogTimezone !== null
			&& $this->oldLogTimezone !== LoggingHelper::getLogTimezone($this->ocPath)
		) {
			LoggingHelper::setLogTimezone($this->ocPath, $this->oldLogTimezone);
		}
	}
}