<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use TestHelpers\LoggingHelper;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * Context to make the Logging steps available
 */
class LoggingContext implements Context {
	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	private $oldLogLevel = null;
	private $oldLogBackend = null;
	private $oldLogTimezone = null;

	/**
	 * checks for specific rows in the log file.
	 * order of the table has to be the same as in the log file
	 * empty cells in the table will not be checked!
	 *
	 * @Then /^the last lines of the log file should contain log-entries (with|containing|matching) these attributes:$/
	 *
	 * @param string $comparingMode
	 * @param string|int $ignoredLines
	 * @param TableNode $expectedLogEntries table with headings that correspond
	 *                                      to the json keys in the log entry
	 *                                      e.g.
	 *                                      |user|app|method|message|
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes(
		$comparingMode, $ignoredLines = 0, TableNode $expectedLogEntries = null
	) {
		$ignoredLines = (int) $ignoredLines;
		//-1 because getRows gives also the header
		$linesToRead = \count($expectedLogEntries->getRows()) - 1 + $ignoredLines;
		$logLines = LoggingHelper::getLogFileContent(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$linesToRead
		);
		$lineNo = 0;
		foreach ($expectedLogEntries as $expectedLogEntry) {
			$logEntry = \json_decode($logLines[$lineNo], true);
			if ($logEntry === null) {
				throw new \Exception("the logline :\n{$logLines[$lineNo]} is not valid JSON");
			}

			foreach (\array_keys($expectedLogEntry) as $attribute) {
				if ($comparingMode === 'matching') {
					$expectedLogEntry[$attribute]
						= $this->featureContext->substituteInLineCodes(
							$expectedLogEntry[$attribute], ['preg_quote' => ['/']]
						);
				} else {
					$expectedLogEntry[$attribute]
						= $this->featureContext->substituteInLineCodes(
							$expectedLogEntry[$attribute]
						);
				}

				if ($expectedLogEntry[$attribute] !== "") {
					Assert::assertArrayHasKey(
						$attribute, $logEntry,
						"could not find attribute: '$attribute' in log entry: '{$logLines[$lineNo]}'"
					);
					$message = "log entry:\n{$logLines[$lineNo]}\n";
					if (!\is_string($logEntry[$attribute])) {
						$logEntry[$attribute] = \json_encode(
							$logEntry[$attribute], JSON_UNESCAPED_SLASHES
						);
					}
					if ($comparingMode === 'with') {
						Assert::assertEquals(
							$expectedLogEntry[$attribute], $logEntry[$attribute],
							$message
						);
					} elseif ($comparingMode === 'containing') {
						Assert::assertContains(
							$expectedLogEntry[$attribute], $logEntry[$attribute],
							$message
						);
					} elseif ($comparingMode === 'matching') {
						Assert::assertRegExp(
							$expectedLogEntry[$attribute], $logEntry[$attribute],
							$message
						);
					} else {
						throw new \InvalidArgumentException(
							"$comparingMode is not a valid mode"
						);
					}
				}
			}
			$lineNo++;
			if (($lineNo + $ignoredLines) >= $linesToRead) {
				break;
			}
		}
	}

	/**
	 * alternative wording theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes()
	 *
	 * @Then /^the last lines of the log file, ignoring the last (\d+) lines, should contain log-entries (with|containing|matching) these attributes:$/
	 *
	 * @param string|int $ignoredLines
	 * @param string $comparingMode
	 * @param TableNode $expectedLogEntries
	 *
	 * @return void
	 */
	public function theLastLinesOfTheLogFileIgnoringSomeShouldContainEntries(
		$ignoredLines, $comparingMode, TableNode $expectedLogEntries
	) {
		$this->theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes(
			$comparingMode, $ignoredLines, $expectedLogEntries
		);
	}

	/**
	 * alternative wording theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes()
	 *
	 * @Then /^the last lines of the log file, ignoring the last line, should contain log-entries (with|containing|matching) these attributes:$/
	 *
	 * @param string $comparingMode
	 * @param TableNode $expectedLogEntries
	 *
	 * @return void
	 */
	public function theLastLinesOfTheLogFileIgnoringLastShouldContainEntries(
		$comparingMode, TableNode $expectedLogEntries
	) {
		$this->theLastLinesOfTheLogFileShouldContainEntriesWithTheseAttributes(
			$comparingMode, 1, $expectedLogEntries
		);
	}

	/**
	 * wrapper around assertLogFileContainsAtLeastOneEntryMatchingTable()
	 *
	 * @Then the log file should contain at least one entry matching each of these lines:
	 *
	 * @param TableNode $expectedLogEntries table with headings that correspond
	 *                                      to the json keys in the log entry
	 *                                      e.g.
	 *                                      |user|app|method|message|
	 *
	 * @return void
	 * @throws \Exception
	 * @see assertLogFileContainsAtLeastOneEntryMatchingTable()
	 */
	public function logFileShouldContainEntriesMatching(
		TableNode $expectedLogEntries
	) {
		$this->assertLogFileContainsAtLeastOneEntryMatchingTable(
			true, $expectedLogEntries
		);
	}

	/**
	 * wrapper around assertLogFileContainsAtLeastOneEntryMatchingTable()
	 *
	 * @Then the log file should contain at least one entry matching the regular expressions in each of these lines:
	 *
	 * @param TableNode $expectedLogEntries
	 *
	 * @return void
	 * @throws \Exception
	 * @see assertLogFileContainsAtLeastOneEntryMatchingTable()
	 */
	public function logFileShouldContainEntriesMatchingRegularExpression(
		TableNode $expectedLogEntries
	) {
		$this->assertLogFileContainsAtLeastOneEntryMatchingTable(
			true, $expectedLogEntries, true
		);
	}

	/**
	 * @Then the log file should not contain any entry matching the regular expressions in each of these lines:
	 *
	 * @param TableNode $expectedLogEntries
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function logFileShouldNotContainAnyTheEntriesMatchingTheRegularExpression(
		TableNode $expectedLogEntries
	) {
		$this->assertLogFileContainsAtLeastOneEntryMatchingTable(
			false, $expectedLogEntries, true
		);
	}

	/**
	 * checks that every line in the table has at least one
	 * corresponding line in the log file
	 * empty cells in the table will not be checked!
	 *
	 * @param boolean $shouldOrNot if true the table entries are expected to match
	 *                             at least one entry in the log
	 *                             if false the table entries are expected not
	 *                             to match any log in the log file
	 * @param TableNode $expectedLogEntries table with headings that correspond
	 *                                      to the json keys in the log entry
	 *                                      e.g.
	 *                                      |user|app|method|message|
	 * @param boolean $regexCompare if true the table entries are expected
	 *                              to be regular expressions
	 *
	 * @return void
	 * @throws \Exception
	 */
	private function assertLogFileContainsAtLeastOneEntryMatchingTable(
		$shouldOrNot, TableNode $expectedLogEntries, $regexCompare = false
	) {
		$logLines = LoggingHelper::getLogFileContent(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		$expectedLogEntries = $expectedLogEntries->getHash();
		foreach ($logLines as $logLine) {
			$logEntry = \json_decode($logLine, true);
			if ($logEntry === null) {
				throw new \Exception("the logline :\n{$logLine} is not valid JSON");
			}
			//reindex the array, we might have deleted entries
			$expectedLogEntries = \array_values($expectedLogEntries);
			for ($entryNo = 0; $entryNo < \count($expectedLogEntries); $entryNo++) {
				$count = 0;
				$expectedLogEntry = $expectedLogEntries[$entryNo];
				$foundLine = true;
				foreach (\array_keys($expectedLogEntry) as $attribute) {
					if ($expectedLogEntry[$attribute] === "") {
						//don't check empty table entries
						continue;
					}
					if (!\array_key_exists($attribute, $logEntry)) {
						//this line does not have the attribute we are looking for
						$foundLine = false;
						break;
					}
					if (!\is_string($logEntry[$attribute])) {
						$logEntry[$attribute] = \json_encode(
							$logEntry[$attribute], JSON_UNESCAPED_SLASHES
						);
					}

					if ($regexCompare === true) {
						$expectedLogEntry[$attribute]
							= $this->featureContext->substituteInLineCodes(
								$expectedLogEntry[$attribute], ['preg_quote' => ['/']]
							);
						$matchAttribute = \preg_match(
							$expectedLogEntry[$attribute], $logEntry[$attribute]
						);
					} else {
						$expectedLogEntry[$attribute]
							= $this->featureContext->substituteInLineCodes(
								$expectedLogEntry[$attribute]
							);
						$matchAttribute
							= ($expectedLogEntry[$attribute] === $logEntry[$attribute]);
					}
					if (!$matchAttribute) {
						$foundLine = false;
						break;
					}
					if ($matchAttribute and !$shouldOrNot) {
						$count += 1;
						Assert::assertNotEquals(
							$count,
							\count($expectedLogEntry),
							"The entry matches"
						);
					}
				}
				if ($foundLine === true) {
					unset($expectedLogEntries[$entryNo]);
				}
			}
		}
		$notFoundLines = \print_r($expectedLogEntries, true);
		if ($shouldOrNot) {
			Assert::assertEmpty(
				$expectedLogEntries,
				"could not find these expected line(s):\n $notFoundLines"
			);
		}
	}

	/**
	 * fails if there is at least one line in the log file that matches all
	 * given attributes
	 * attributes in the table that are empty will match any value in the
	 * corresponding attribute in the log file
	 *
	 * @Then /^the log file should not contain any log-entries (with|containing) these attributes:$/
	 *
	 * @param string $withOrContaining
	 * @param TableNode $logEntriesExpectedNotToExist table with headings that
	 *                                                correspond to the json
	 *                                                keys in the log entry
	 *                                                e.g.
	 *                                                |user|app|method|message|
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theLogFileShouldNotContainAnyLogEntriesWithTheseAttributes(
		$withOrContaining, TableNode $logEntriesExpectedNotToExist
	) {
		$logLines = LoggingHelper::getLogFileContent(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		foreach ($logLines as $logLine) {
			$logEntry = \json_decode($logLine, true);
			if ($logEntry === null) {
				throw new \Exception("the logline :\n$logLine is not valid JSON");
			}
			foreach ($logEntriesExpectedNotToExist as $logEntryExpectedNotToExist) {
				$match = true; // start by assuming the worst, we match the unwanted log entry
				foreach (\array_keys($logEntryExpectedNotToExist) as $attribute) {
					$logEntryExpectedNotToExist[$attribute]
						= $this->featureContext->substituteInLineCodes(
							$logEntryExpectedNotToExist[$attribute]
						);

					if (isset($logEntry[$attribute]) && ($logEntryExpectedNotToExist[$attribute] !== "")) {
						if ($withOrContaining === 'with') {
							$match = ($logEntryExpectedNotToExist[$attribute] === $logEntry[$attribute]);
						} else {
							$match = (\strpos($logEntry[$attribute], $logEntryExpectedNotToExist[$attribute]) !== false);
						}
					}
					if (!isset($logEntry[$attribute])) {
						$match = false;
					}
					if (!$match) {
						break;
					}
				}
			}
			Assert::assertFalse(
				$match,
				"found a log entry that should not be there\n$logLine\n"
			);
		}
	}

	/**
	 * @When the owncloud log level is set to :logLevel
	 *
	 * @param string $logLevel (debug|info|warning|error|fatal)
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogLevelIsSetTo($logLevel) {
		LoggingHelper::setLogLevel($logLevel);
	}

	/**
	 * @Given the owncloud log level has been set to :logLevel
	 *
	 * @param string $logLevel (debug|info|warning|error|fatal)
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogLevelHasBeenSetTo($logLevel) {
		$this->owncloudLogLevelIsSetTo($logLevel);
		$logLevelArray = LoggingHelper::LOG_LEVEL_ARRAY;
		$logLevelExpected = \array_search($logLevel, $logLevelArray);
		$logLevelActual = \array_search(LoggingHelper::getLogLevel(), $logLevelArray);
		Assert::assertEquals($logLevelExpected, $logLevelActual);
	}

	/**
	 * @When the owncloud log backend is set to :backend
	 *
	 * @param string $backend (owncloud|syslog|errorlog)
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogBackendIsSetTo($backend) {
		LoggingHelper::setLogBackend($backend);
	}

	/**
	 * @Given the owncloud log backend has been set to :backend
	 *
	 * @param string $backend (owncloud|syslog|errorlog)
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogBackendHasBeenSetTo($backend) {
		$this->owncloudLogBackendIsSetTo($backend);
		$currentBackend = LoggingHelper::getLogBackend();
		Assert::assertEquals(
			$currentBackend,
			$backend
		);
	}

	/**
	 * @When the owncloud log timezone is set to :timezone
	 *
	 * @param string $timezone
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogTimezoneIsSetTo($timezone) {
		LoggingHelper::setLogTimezone($timezone);
	}

	/**
	 * @Given the owncloud log timezone has been set to :timezone
	 *
	 * @param string $timezone
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function owncloudLogTimezoneHasBeenSetTo($timezone) {
		$this->owncloudLogTimezoneIsSetTo($timezone);
		$currentTimezone = LoggingHelper::getLogTimezone();
		Assert::assertEquals(
			$currentTimezone,
			$timezone
		);
	}

	/**
	 * @When the owncloud log is cleared
	 * @Given the owncloud log has been cleared
	 *
	 * checks for the httpRequest is done inside clearLogFile function
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theOwncloudLogIsCleared() {
		LoggingHelper::clearLogFile(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
	}

	/**
	 * Before Scenario for logging. Saves current log settings
	 *
	 * @BeforeScenario
	 *
	 * @return void
	 * @throws \Exception
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
	 * @throws \Exception
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

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
	}
}
