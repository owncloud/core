<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace Owncloud\Updater\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Owncloud\Updater\Console\Application;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessUtils;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * Class OccRunner
 *
 * @package Owncloud\Updater\Utils
 */
class OccRunner {
	/**
	 * @var Locator $locator
	 */
	protected $locator;

	/**
	 * @var bool
	 */
	protected $canUseProcess;

	/**
	 *
	 * @param Locator $locator
	 * @param bool $canUseProcess
	 */
	public function __construct(Locator $locator, $canUseProcess) {
		$this->locator = $locator;
		$this->canUseProcess = $canUseProcess;
	}

	/**
	 * @param bool $canUseProcess
	 */
	public function setCanUseProcess($canUseProcess) {
		$this->canUseProcess = $canUseProcess;
	}

	/**
	 * @param $command
	 * @param array $args
	 * @param bool $asJson
	 * @return string
	 */
	public function run($command, $args = [], $asJson = false) {
		if ($this->canUseProcess) {
			$extra = $asJson ? '--output=json' : '';
			$cmdLine = \trim($command . ' ' . $extra);
			foreach ($args as $optionTitle => $optionValue) {
				if (\strpos($optionTitle, '--') === 0) {
					$line = \trim("$optionTitle=$optionValue");
				} else {
					$line = $optionValue;
				}
				/* @phan-suppress-next-line PhanDeprecatedFunction */
				$escapedLine = ProcessUtils::escapeArgument($line);
				$cmdLine .= " $escapedLine";
			}
			return $this->runAsProcess($cmdLine);
		} else {
			if ($asJson) {
				$args['--output'] = 'json';
			}
			$response = $this->runAsRequest($command, $args);
			$decodedResponse = \json_decode($response, true);
			/* @phan-suppress-next-line PhanTypeArraySuspiciousNullable */
			return $decodedResponse['response'];
		}
	}

	/**
	 * @param $command
	 * @param array $args
	 * @return mixed
	 */
	public function runJson($command, $args = []) {
		$plain = $this->run($command, $args, true);
		// trim response to always be a valid json. Capture everything between the first and the last curly brace
		\preg_match_all('!(\{.*\})!ms', $plain, $matches);
		$clean = isset($matches[1][0]) ? $matches[1][0] : '';
		$decoded = \json_decode($clean, true);
		if (!\is_array($decoded)) {
			throw new \UnexpectedValueException('Could not parse a response for ' . $command . '. Please check if the current shell user can run occ command. Raw output: ' . PHP_EOL . $plain);
		}
		return $decoded;
	}

	/**
	 * @param $command
	 * @param $args
	 * @return string
	 */
	protected function runAsRequest($command, $args) {
		$application = $this->getApplication();
		$client = new Client();
		$endpointBase = $application->getEndpoint();
		$params = [
			RequestOptions::TIMEOUT => 0,
			RequestOptions::JSON => [
				'token' => $application->getAuthToken(),
				'params'=> $args
			]
		];

		// Skip SSL validation for localhost only as localhost never has a valid cert
		if (\preg_match('/^https:\/\/localhost\/.*/i', $endpointBase)) {
			$params[RequestOptions::VERIFY] = false;
		}

		$response = $client->request('POST', "$endpointBase$command", $params);
		$responseBody = $response->getBody()->getContents();
		return $responseBody;
	}

	/**
	 * @return mixed
	 */
	protected function getApplication() {
		$container = Application::$container;
		$application = $container['application'];
		return $application;
	}

	/**
	 * @param $cmdLine
	 * @return string
	 */
	protected function runAsProcess($cmdLine) {
		$occPath = $this->locator->getPathToOccFile();
		$cmd = "php $occPath --no-warnings $cmdLine";
		$process = new Process($cmd);
		$process->setTimeout(null);
		$process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
		return $process->getOutput();
	}
}
