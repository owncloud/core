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
 * Checks for code that extends private constant usage
 *
 * @package OC\App\CodeChecker\Checks\PrivateCode
 */
class Consts implements SplObserver {
	/**
	 * @param SplSubject $subject
	 */
	public function update(SplSubject $subject) {
		/** @var $subject Check */
		$xpath = $subject->xmlAst->xpath('//node:Expr_ClassConstFetch');

		if(!empty($xpath)) {
			foreach($xpath as $result) {
				// For each element get the name
				$name = (string)$result->xpath('./subNode:class/node:Name/subNode:parts/scalar:array/scalar:string')[0];
				if(substr(strtoupper($name), 0, 3) === "OC_") {
					$error = new Error();
					$error->addLine((int)$result->xpath('./subNode:class/node:Name/attribute:startLine/scalar:int')[0]);
					$error->addDisallowedToken($name);
					$error->addCode(1003);
					$error->addMessage('Using a private constant is not supported.');
					$subject->addError($error);
				}
			}
		}
	}
}
