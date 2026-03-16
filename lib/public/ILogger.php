<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * Modified by BW-Tech GmbH
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

namespace OCP;

use Psr\Log\LoggerInterface;

/**
 * Interface ILogger
 *
 * @package OCP
 * @since 7.0.0
 *
 * This logger interface follows the design guidelines of PSR-3
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md#3-psrlogloggerinterface
 */
interface ILogger extends LoggerInterface {
	/**
	 * System is unusable.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function emergency($message, array $context = []): void;

	/**
	 * Action must be taken immediately.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function alert($message, array $context = []): void;

	/**
	 * Critical conditions.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function critical($message, array $context = []): void;

	/**
	 * Runtime errors that do not require immediate action but should typically
	 * be logged and monitored.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function error($message, array $context = []): void;

	/**
	 * Exceptional occurrences that are not errors.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function warning($message, array $context = []): void;

	/**
	 * Normal but significant events.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function notice($message, array $context = []): void;

	/**
	 * Interesting events.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function info($message, array $context = []): void;

	/**
	 * Detailed debug information.
	 *
	 * @param string $message
	 * @param array $context
	 * @return void
	 * @since 7.0.0
	 */
	public function debug($message, array $context = []): void;

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed $level
	 * @param string $message
	 * @param array $context
	 * @return mixed
	 * @since 7.0.0
	 */
	public function log($level, $message, array $context = []): void;

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
	public function logException($exception, array $context = []);
}
