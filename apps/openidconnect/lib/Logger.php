<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\OpenIdConnect;

use OCP\ILogger;

class Logger implements ILogger {
	/**
	 * @var ILogger
	 */
	private $logger;

	/**
	 * Logger constructor.
	 *
	 * @param ILogger $logger
	 */
	public function __construct(ILogger $logger) {
		$this->logger = $logger;
	}

	/**
	 * System is unusable.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function emergency($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->emergency($message, $context);
	}

	/**
	 * Action must be taken immediately.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function alert($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->alert($message, $context);
	}

	/**
	 * Critical conditions.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function critical($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->critical($message, $context);
	}

	/**
	 * Runtime errors that do not require immediate action but should typically
	 * be logged and monitored.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function error($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->error($message, $context);
	}

	/**
	 * Exceptional occurrences that are not errors.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function warning($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->warning($message, $context);
	}

	/**
	 * Normal but significant events.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function notice($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->notice($message, $context);
	}

	/**
	 * Interesting events.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function info($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->info($message, $context);
	}

	/**
	 * Detailed debug information.
	 *
	 * @param string $message
	 * @param array $context
	 * @since 7.0.0
	 */
	public function debug($message, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->debug($message, $context);
	}

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed $level
	 * @param string $message
	 * @param array $context
	 * @return mixed
	 * @since 7.0.0
	 */
	public function log($level, $message, array $context = []) {
		$context['app'] = 'OpenID';
		return $this->logger->log($level, $message, $context);
	}

	/**
	 * Logs an exception very detailed
	 * An additional message can we written to the log by adding it to the
	 * context.
	 *
	 * <code>
	 * $logger->logException($ex, [
	 *     'message' => 'Exception during cron job execution'
	 * ]);
	 * </code>
	 *
	 * @param \Exception | \Throwable $exception
	 * @param array $context
	 * @return void
	 * @since 8.2.0
	 */
	public function logException($exception, array $context = []) {
		$context['app'] = 'OpenID';
		$this->logger->logException($exception, $context);
	}
}
