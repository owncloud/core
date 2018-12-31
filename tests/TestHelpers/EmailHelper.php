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
	 * @param string $localMailhogUrl
	 *
	 * @return mixed JSON encoded contents
	 */
	public static function getEmails($localMailhogUrl) {
		$response = HttpRequestHelper::get(
			$localMailhogUrl . "/api/v2/messages",
			null,
			null,
			['Content-Type' => 'application/json']
		);

		$json = \json_decode($response->getBody()->getContents());
		return $json;
	}

	/**
	 *
	 * @param string $localMailhogUrl
	 * @param string $address
	 * @param int $waitTimeSec Time to wait for the email
	 *
	 * @throws \Exception
	 *
	 * @return mixed
	 */
	public static function getBodyOfLastEmail(
		$localMailhogUrl, $address, $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	) {
		return self::getBodyOfEmail(
			$localMailhogUrl, $address, 0, $waitTimeSec
		);
	}

	/**
	 *
	 * @param string $localMailhogUrl
	 * @param string $address
	 * @param int $numEmails which number of multiple emails to read (first email is 1)
	 * @param int $waitTimeSec Time to wait for the email
	 *
	 * @throws \Exception
	 *
	 * @return mixed
	 */
	public static function getBodyOfEmail(
		$localMailhogUrl,
		$address,
		$numEmails = 1,
		$waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	) {
		$currentTime = \time();
		$end = $currentTime + $waitTimeSec;

		while ($currentTime <= $end) {
			$skip = 1;
			foreach (self::getEmails($localMailhogUrl)->items as $item) {
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
			$currentTime = \time();
		}
		throw new \Exception("Could not find the email to the address: " . $address);
	}

	/**
	 *
	 * @param string $localMailhogUrl
	 * @param string $address
	 * @param int $numEmails which number of multiple emails to read (first email is 1)
	 * @param int $waitTimeSec Time to wait for the email
	 *
	 * @throws \Exception
	 *
	 * @return mixed
	 */
	public static function getSenderOfEmail(
		$localMailhogUrl,
		$address,
		$numEmails = 1,
		$waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	) {
		$currentTime = \time();
		$end = $currentTime + $waitTimeSec;

		while ($currentTime <= $end) {
			$skip = 1;
			foreach (self::getEmails($localMailhogUrl)->items as $item) {
				$expectedEmail = $item->To[0]->Mailbox . "@" . $item->To[0]->Domain;
				if ($expectedEmail === $address) {
					if ($skip < $numEmails) {
						$skip++;
						continue;
					}
					return $item->From->Mailbox . '@' . $item->From->Domain;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time();
		}
		throw new \Exception("Could not find the email to the address: " . $address);
	}

	/**
	 *
	 * @param string $localMailhogUrl
	 *
	 * @return ResponseInterface
	 */
	public static function deleteAllMessages($localMailhogUrl) {
		return HttpRequestHelper::delete(
			$localMailhogUrl . "/api/v1/messages"
		);
	}

	/**
	 * Returns the host name or address of the Mailhog server as seen from the
	 * point of view of the system-under-test.
	 *
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
	 * Returns the host name or address of the Mailhog server as seen from the
	 * point of view of the test runner.
	 *
	 * @return string
	 */
	public static function getLocalMailhogHost() {
		$localMailhogHost = \getenv('LOCAL_MAILHOG_HOST');
		if ($localMailhogHost === false) {
			$localMailhogHost = self::getMailhogHost();
		}
		return $localMailhogHost;
	}

	/**
	 * Returns the host and port where Mailhog messages can be read and deleted
	 * by the test runner.
	 *
	 * @return string
	 */
	public static function getLocalMailhogUrl() {
		$localMailhogHost = self::getLocalMailhogHost();

		$mailhogPort = \getenv('MAILHOG_PORT');
		if ($mailhogPort === false) {
			$mailhogPort = "8025";
		}
		return "http://$localMailhogHost:$mailhogPort";
	}
}
