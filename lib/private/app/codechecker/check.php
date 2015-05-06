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

namespace OC\App\CodeChecker;

use SimpleXMLElement;
use SplSubject;
use SplObserver;

/**
 * Subject class that is observed by the different checks for invalid code
 *
 * @package OC\App\CodeChecker
 */
class Check implements SplSubject {
	/** @var array */
	private $observers = [];
	/** @var Error[] */
	private $errors = [];
	/** @var SimpleXMLElement */
	public $xmlAst;
	/** @var []string */
	public $blacklistedApiCalls;

	/**
	 * @param SimpleXMLElement $xmlAst
	 * @param []string $blacklistedApiCalls
	 */
	public function __construct(SimpleXMLElement &$xmlAst,
								array $blacklistedApiCalls) {
		$this->xmlAst = $xmlAst;
		$this->blacklistedApiCalls = $blacklistedApiCalls;
	}

	/**
	 * @param SplObserver $observer
	 */
	public function attach(SplObserver $observer) {
		$this->observers[] = $observer;
	}

	/**
	 * @param SplObserver $observer
	 */
	public function detach(SplObserver $observer){
		if(($idx = array_search($observer, $this->observers, true)) !== false){
			unset($this->observers[$idx]);
		}
	}

	/**
	 *
	 */
	public function notify(){
		foreach($this->observers as $observer){
			$observer->update($this);
		}
	}

	/**
	 * Calls all observers
	 */
	public function scan() {
		$this->notify();
	}

	/**
	 * @param Error $error
	 */
	public function addError(Error $error) {
		$this->errors[] = $error;
	}

	/**
	 * @return Error[]
	 */
	public function getErrors() {
		return $this->errors;
	}
}
