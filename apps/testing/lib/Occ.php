<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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

namespace OCA\Testing;

use OC\OCS\Result;
use OCP\IRequest;

/**
 * run the occ command from an API call
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class Occ {

	/**
	 *
	 * @var IRequest
	 */
	private $request;
	
	/**
	 *
	 * @param IRequest $request
	 */
	public function __construct(IRequest $request) {
		$this->request = $request;
	}

	/**
	 *
	 * @return Result
	 */
	public function execute() {
		$command = $this->request->getParam("command", "");
		$args = \preg_split("/[\s,]+/", $command);
		$args = \array_map(
			function ($arg) {
				return \escapeshellarg($arg);
			}, $args
		);

		$args = \implode(' ', $args);
		$descriptor = [
			0 => ['pipe', 'r'],
			1 => ['pipe', 'w'],
			2 => ['pipe', 'w'],
		];
		$process = \proc_open(
			'php console.php ' . $args,
			$descriptor,
			$pipes,
			\realpath("../")
		);
		$lastStdOut = \stream_get_contents($pipes[1]);
		$lastStdErr = \stream_get_contents($pipes[2]);
		$lastCode = \proc_close($process);
		$result = [
			"code" => $lastCode,
			"stdOut" => $lastStdOut,
			"stdErr" => $lastStdErr
		];
		
		$resultCode = $lastCode + 100;
		
		return new Result($result, $resultCode);
	}
}
