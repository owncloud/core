<?php declare(strict_types=1);
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

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Helper to test email sending, using mailhog
 *
 *
 */
class EmailHelper {
	/**
	 * retrieving emails sent from mailhog
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $xRequestId
	 *
	 * @return mixed JSON encoded contents
	 * @throws GuzzleException
	 */
	public static function getEmails(
		?string $localMailhogUrl,
		?string $xRequestId = ''
	) {
		$response = HttpRequestHelper::get(
			$localMailhogUrl . "/api/v2/messages",
			$xRequestId,
			null,
			null,
			['Content-Type' => 'application/json']
		);

		$json = \json_decode($response->getBody()->getContents());
		var_dump(
			$json
		);
		return $json;
	}

	/**
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $waitTimeSec Time to wait for the email
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getBodyOfLastEmail(
		?string $localMailhogUrl,
		?string $emailAddress,
		?string $xRequestId,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	):string {
		return self::getBodyOfEmail(
			$localMailhogUrl,
			$emailAddress,
			$xRequestId,
			1,
			$waitTimeSec
		);
	}

	/**
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $emailNumber which number of multiple emails to read (first email is 1)
	 * @param int|null $waitTimeSec Time to wait for the email
	 *
	 * @return string
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public static function getBodyOfEmail(
		?string $localMailhogUrl,
		?string $emailAddress,
		?string $xRequestId = '',
		?int $emailNumber = 1,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	):string {
		$currentTime = \time();
		$endTime = $currentTime + $waitTimeSec;

		while ($currentTime <= $endTime) {
			$skip = 1;
			foreach (self::getEmails($localMailhogUrl, $xRequestId)->items as $item) {
				$thisEmailAddress
					= $item->To[0]->Mailbox . "@" . $item->To[0]->Domain;
				if ($thisEmailAddress === $emailAddress) {
					if ($skip < $emailNumber) {
						$skip++;
						continue;
					}

					$body = \str_replace(
						"\r\n",
						"\n",
						\quoted_printable_decode($item->Content->Body)
					);
					return $body;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time();
		}

		throw new Exception("Could not find the email to the address: " . $emailAddress);
	}

	/**
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $waitTimeSec Time to wait for the email
	 *
	 * @return boolean
	 */
	public static function emailReceived(
		?string $localMailhogUrl,
		?string $emailAddress,
		?string $xRequestId,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	):bool {
		try {
			self::getBodyOfLastEmail(
				$localMailhogUrl,
				$emailAddress,
				$xRequestId,
				$waitTimeSec
			);
		} catch (Exception $err) {
			return false;
		}

		return true;
	}

	/**
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $emailNumber which number of multiple emails to read (first email is 1)
	 * @param int|null $waitTimeSec Time to wait for the email
	 *
	 * @return mixed
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public static function getSenderOfEmail(
		?string $localMailhogUrl,
		?string $emailAddress,
		?string $xRequestId = '',
		?int $emailNumber = 1,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	) {
		$currentTime = \time();
		$endTime = $currentTime + $waitTimeSec;

		while ($currentTime <= $endTime) {
			$skip = 1;
			foreach (self::getEmails($localMailhogUrl, $xRequestId)->items as $item) {
				$thisEmailAddress
					= $item->To[0]->Mailbox . "@" . $item->To[0]->Domain;
				if ($thisEmailAddress === $emailAddress) {
					if ($skip < $emailNumber) {
						$skip++;
						continue;
					}
					return $item->From->Mailbox . '@' . $item->From->Domain;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time();
		}
		throw new Exception("Could not find the email to the address: " . $emailAddress);
	}

	/**
	 *
	 * @param string|null $localMailhogUrl
	 * @param string|null $xRequestId
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function deleteAllMessages(
		?string $localMailhogUrl,
		?string $xRequestId
	):ResponseInterface {
		return HttpRequestHelper::delete(
			$localMailhogUrl . "/api/v1/messages",
			$xRequestId
		);
	}

	/**
	 * Returns the host name or address of the Mailhog server as seen from the
	 * point of view of the system-under-test.
	 *
	 * @return string
	 */
	public static function getMailhogHost():string {
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
	public static function getLocalMailhogHost():string {
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
	public static function getLocalMailhogUrl():string {
		$localMailhogHost = self::getLocalMailhogHost();

		$mailhogPort = \getenv('MAILHOG_PORT');
		if ($mailhogPort === false) {
			$mailhogPort = "8025";
		}
		return "http://$localMailhogHost:$mailhogPort";
	}
}
