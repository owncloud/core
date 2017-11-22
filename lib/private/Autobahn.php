<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


namespace OC;


use OCP\IAutobahn;
use Psr\Log\AbstractLogger;
use Thruway\ClientSession;
use Thruway\Logging\Logger;
use Thruway\Peer\Client;
use Thruway\Transport\PawlTransportProvider;

class OCLogger extends AbstractLogger {

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed $level
	 * @param string $message
	 * @param array $context
	 *
	 * @return void
	 */
	public function log($level, $message, array $context = array()) {
		\OC::$server->getLogger()->log($level, $message, $context);
	}
}

class Autobahn implements IAutobahn {

	private $buffer;

	public function __construct() {
		$this->buffer = [];
		register_shutdown_function(function() {
			$this->end();
		});
	}

	public function publish($topic, $payLoad) {
		$this->buffer[$topic] = isset($this->buffer[$topic]) ? $this->buffer[$topic] : [];
		$this->buffer[$topic][] = $payLoad;
	}

	private function end() {
		\OC::$server->getEventDispatcher()->dispatch('autobahn.end');

		// init client
		Logger::set(new OCLogger());
		$client = new Client("realm1");
		$client->setAttemptRetry(false);
		$client->addTransportProvider(new PawlTransportProvider("ws://localhost:8080/ws"));

		/** @var ClientSession $session */
		$session = null;
		$client->on('open', function (ClientSession $s) use (&$session) {
			$session = $s;
		});
		$client->start(false);

		while ($session === null) {
			$client->getLoop()->tick();
		}

		// publish
		foreach ($this->buffer as $topic => $payloads) {
			foreach ($payloads as $index => $payload) {
				$session->publish($topic, [$payload], null, ['acknowledge' => true])
					->always(function () use ($topic, $index) {
						unset($this->buffer[$topic][$index]);
						if (empty($this->buffer[$topic])) {
							unset($this->buffer[$topic]);
						}
					});
			}
		}

		while (!empty($this->buffer)) {
			$client->getLoop()->tick();
		}
		$session->close();
	}
}
