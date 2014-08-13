<?php
/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 * @since 8/13/14, 2:03 PM
 * @link http:/www.owncloud.com
 * @copyright ownCloud © 2014
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OC\Log\Interfaces;

use Monolog\Logger;

/**
 * Interface LogHandlerInterface
 *
 * @package OC\Log\Interfaces
 */
interface LogHandlerInterface {
	/**
	 * Sets monolog instance into the handler
	 * @param Logger $logger
	 * @return mixed
	 */
	public function setMonolog(Logger $logger);

	/**
	 * @return mixed
	 */
	public function addHandler();

	/**
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters);

}