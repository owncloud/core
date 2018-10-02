<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace TestHelpers;

use GuzzleHttp\Message\ResponseInterface;

/**
 * Helper to test email sending, using mailhog
 *
 *
 */
class EmailHelper {
	/**
	 * retrieving emails sent from mailhog
	 *
	 * @param string $mailhogUrl
	 *
	 * @return mixed JSON encoded contents
	 */
	public static function getEmails($mailhogUrl) {
		$response = HttpRequestHelper::get(
			$mailhogUrl . "/api/v2/messages",
			null,
			null,
			['Content-Type' => 'application/json']
		);

		$json = \json_decode($response->getBody()->getContents());
		return $json;
	}

	/**
	 *
	 * @param string $mailhogUrl
	 *
	 * @param string $address
	 * @param int $waitTimeSec Time to wait for the email
	 *
	 * @throws \Exception
	 *
	 * @return mixed
	 */
	public static function getBodyOfLastEmail($mailhogUrl, $address, $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC) {
		return self::getBodyOfEmail($mailhogUrl, $address, 0, $waitTimeSec);
	}

	/**
	 *
	 * @param string $mailhogUrl
	 * @param string $address
	 * @param int $numEmails which number of multiple emails to read (first email is 1)
	 * @param int $waitTimeSec Time to wait for the email
	 *
	 * @throws \Exception
	 *
	 * @return mixed
	 */
	public static function getBodyOfEmail($mailhogUrl, $address, $numEmails = 1, $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC) {
		$currentTime = \time(true);
		$end = $currentTime + $waitTimeSec;

		while ($currentTime <= $end) {
			$skip = 1;
			foreach (self::getEmails($mailhogUrl)->items as $item) {
				$expectedEmail = $item->To[0]->Mailbox . "@" . $item->To[0]->Domain;
				if ($expectedEmail === $address) {
					if ($skip < $numEmails) {
						$skip++;
						continue;
					}
					$body = \str_replace(
						"\r\n", "\n",
						\quoted_printable_decode($item->Content->Body)
						);
					return $body;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time(true);
		}
		throw new \Exception("Could not find the email to the address: " . $address);
	}

	/**
	 *
	 * @param string $mailhogUrl
	 *
	 * @return ResponseInterface
	 */
	public static function deleteAllMessages($mailhogUrl) {
		return HttpRequestHelper::delete(
			$mailhogUrl . "/api/v1/messages"
		);
	}

	/**
	 * @return string
	 */
	public static function getMailhogHost() {
		$mailhogHost = \getenv('MAILHOG_HOST');
		if ($mailhogHost === false) {
			$mailhogHost = "127.0.0.1";
		}
		return $mailhogHost;
	}
	/**
	 *
	 * @return string
	 */
	public static function getMailhogUrl() {
		$mailhogHost = self::getMailhogHost();

		$mailhogPort = \getenv('MAILHOG_PORT');
		if ($mailhogPort === false) {
			$mailhogPort = "8025";
		}
		return "http://$mailhogHost:$mailhogPort";
	}
}
