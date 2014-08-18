<?php
/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 * @since 8/13/14, 3:03 PM
 * @link http:/www.owncloud.com
 * @copyright ownCloud © 2014
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Log\Formatters;


use Monolog\Formatter\FormatterInterface;

class ownCloudFormatter implements FormatterInterface {

	/**
	 * Formats a log record.
	 *
	 * @param  array $record A record to format
	 * @return mixed The formatted record
	 */
	public function format(array $record) {

		// Replace variables in message with context array values
		$replace = array();
		foreach ($record['context'] as $key => $val) {
			$replace['{' . $key . '}'] = $val;
		}

		// interpolate replacement values into the message and return
		$record['message'] = strtr($record['message'], $replace);
		unset($replace);

		return json_encode($record) . PHP_EOL;
	}

	/**
	 * Formats a set of log records.
	 *
	 * @param  array $records A set of records to format
	 * @return mixed The formatted set of records
	 */
	public function formatBatch(array $records) {
		$message = '';
		foreach ($records as $record) {
			$message .= $this->format($record);
		}

		return $message;
	}
}