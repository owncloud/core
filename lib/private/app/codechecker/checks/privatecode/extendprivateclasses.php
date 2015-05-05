<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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

namespace OC\App\CodeChecker\Checks\PrivateCode;

use OC\App\CodeChecker\Error;
use SplObserver;
use SplSubject;
use OC\App\CodeChecker\Check;

/**
 * Checks for code that extends private classes such as: "class BadClass extends OC_Hook"
 *
 * @package OC\App\CodeChecker\Checks\PrivateCode
 */
class ExtendPrivateClasses implements SplObserver {
	/**
	 * @param SplSubject $subject
	 */
	public function update(SplSubject $subject) {
		/** @var $subject Check */
		$xpath = $subject->xmlAst->xpath('//node:Stmt_Class/subNode:extends/node:Name');

		if(!empty($xpath)) {
			foreach($xpath as $result) {
				// For each element get the name
				$name = (string)$result->xpath('.//subNode:parts/scalar:array/scalar:string')[0];
				if(substr(strtoupper($name), 0, 3) === "OC_") {
					$error = new Error();
					$error->addLine((int)$result->xpath('./attribute:startLine/scalar:int')[0]);
					$error->addDisallowedToken($name);
					$error->addCode(1000);
					$error->addMessage('Extending a private class is not supported.');
					$subject->addError($error);
				}
			}
		}
	}
}
