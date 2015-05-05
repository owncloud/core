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

namespace OC\App\CodeChecker\Checks\Security;

use OC\App\CodeChecker\Error;
use SplObserver;
use SplSubject;
use OC\App\CodeChecker\Check;

/**
 * Checks for forbidden loose comparison parameters such as == or !=, instead
 * use === or !== for type security.
 *
 * @package OC\App\CodeChecker\Checks\Security
 */
class ComparisonOperators implements SplObserver {

	/**
	 * @param Check $subject
	 */
	private function checkEqual(Check $subject) {
		$xpath = $subject->xmlAst->xpath('//node:Expr_BinaryOp_Equal/attribute:startLine/scalar:int');

		if(!empty($xpath)) {
			foreach($xpath as $result) {
				$error = new Error();
				$error->addLine((int)$result);
				$error->addDisallowedToken('==');
				$error->addCode(1005);
				$error->addMessage('== usage not allowed');
				$subject->addError($error);
			}
		}
	}

	/**
	 * @param Check $subject
	 */
	private function checkNotEqual(Check $subject) {
		$xpath = $subject->xmlAst->xpath('//node:Expr_BinaryOp_NotEqual/attribute:startLine/scalar:int');

		if(!empty($xpath)) {
			foreach($xpath as $result) {
				$error = new Error();
				$error->addLine((int)$result);
				$error->addDisallowedToken('!=');
				$error->addCode(1005);
				$error->addMessage('!= usage not allowed');
				$subject->addError($error);
			}
		}
	}


	/**
	 * @param SplSubject $subject
	 */
	public function update(SplSubject $subject) {
		/** @var $subject Check */
		$this->checkEqual($subject);
		$this->checkNotEqual($subject);
	}
}