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
 * Email Helper to test email sending, using Inbucket email service
 *
 *
 */
class EmailHelper {
	/**
	 * This function splits email address as mailbox
	 * for ex: mailbox for foo@example.com is created as 'foo'
	 *
	 * @param string $emailAddress
	 *
	 * @return string
	 */
	public static function getMailBoxFromEmail(string $emailAddress):string {
		return explode("@", $emailAddress)[0];
	}

	/**
	 * Returns general response information about the provided mailBox
	 * A mailbox is created automatically in InBucket for every unique email sender|receiver.
	 *
	 * @param string $mailBox
	 * @param string|null $xRequestId
	 *
	 * @return mixed JSON encoded contents
	 * @throws GuzzleException
	 */
	public static function getMailboxInformation(string $mailBox, ?string $xRequestId = null) {
		$response = HttpRequestHelper::get(
			self::getLocalEmailUrl() . "/api/v1/mailbox/" . $mailBox,
			$xRequestId,
			null,
			null,
			['Content-Type' => 'application/json']
		);
		return \json_decode($response->getBody()->getContents());
	}

	/**
	 * Deletes all the emails for the provided mailbox
	 *
	 * @param string $localInbucketUrl
	 * @param string|null $xRequestId
	 * @param string $mailBox
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function deleteAllEmailsForAMailbox(
		string $localInbucketUrl,
		?string $xRequestId,
		string $mailBox
	):ResponseInterface {
		return HttpRequestHelper::delete(
			$localInbucketUrl . "/api/v1/mailbox/" . $mailBox,
			$xRequestId
		);
	}

	/**
	 * Returns the body of the last received email for the provided receiver according to the provided email address and the serial number
	 * For email number, 1 means the latest one
	 *
	 * @param string $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $emailNumber For email number, 1 means the latest one
	 * @param int|null $waitTimeSec Time to wait for the email if the email has been delivered
	 *
	 * @return string
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public static function getBodyOfLastEmail(
		string $emailAddress,
		string $xRequestId,
		?int $emailNumber = 1,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	): string {
		$currentTime = \time();
		$endTime = $currentTime + $waitTimeSec;
		$mailBox = self::getMailBoxFromEmail($emailAddress);
		while ($currentTime <= $endTime) {
			$mailboxResponse = self::getMailboxInformation($mailBox);
			if (!empty($mailboxResponse) && \sizeof($mailboxResponse) >= $emailNumber) {
				$mailboxId = $mailboxResponse[\sizeof($mailboxResponse) - $emailNumber]->id;
				$response = self::getBodyOfAnEmailById($mailBox, $mailboxId, $xRequestId);
				$body = \str_replace(
					"\r\n",
					"\n",
					\quoted_printable_decode($response->body->text . "\n" . $response->body->html)
				);
				return $body;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time();
		}
		throw new Exception("Could not find the email to the address: " . $emailAddress);
	}

	/**
	 * returns body content of a specific email (mailBox) with email ID (mailbox Id)
	 *
	 * @param string $mailBox
	 * @param string $mailboxId
	 * @param string|null $xRequestId
	 *
	 * @return mixed JSON encoded contents
	 * @throws GuzzleException
	 */
	public static function getBodyOfAnEmailById(string $mailBox, string $mailboxId, ?string $xRequestId = null) {
		$response = HttpRequestHelper::get(
			self::getLocalEmailUrl() . "/api/v1/mailbox/" . $mailBox . "/" . $mailboxId,
			$xRequestId,
			null,
			null,
			['Content-Type' => 'application/json']
		);

		return \json_decode($response->getBody()->getContents());
	}

	/**
	 *
	 * @param string $emailAddress
	 * @param string|null $xRequestId
	 * @param int|null $waitTimeSec Time to wait for the email if the email has been delivered
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public static function isEmailReceived(
		string $emailAddress,
		?string $xRequestId,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	):bool {
		try {
			self::getBodyOfLastEmail(
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
	 * returns the email address of email sender
	 *
	 * @param string $emailAddress email address of the receiver
	 * @param string|null $xRequestId
	 * @param int|null $emailNumber For email number, 1 means the latest one
	 * @param int|null $waitTimeSec Time to wait for the email
	 *
	 * @return string
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public static function getEmailAddressOfSender(
		string $emailAddress,
		string $xRequestId,
		?int $emailNumber = 1,
		?int $waitTimeSec = EMAIL_WAIT_TIMEOUT_SEC
	): string {
		$currentTime = \time();
		$endTime = $currentTime + $waitTimeSec;
		$mailBox = self::getMailBoxFromEmail($emailAddress);
		while ($currentTime <= $endTime) {
			$mailBoxResponse = self::getMailboxInformation($mailBox, $xRequestId);
			if (!empty($mailBoxResponse) && \sizeof($mailBoxResponse) >= $emailNumber) {
				return $mailBoxResponse[\sizeof($mailBoxResponse) - $emailNumber]->from;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC * 50);
			$currentTime = \time();
		}
		throw new Exception("Could not find the email to the address: " . $emailAddress);
	}

	/**
	 * Returns the host name or address of the Email server as seen from the
	 * point of view of the system-under-test.
	 *
	 * @return string
	 */
	public static function getEmailHost():string {
		$emailHost = \getenv('EMAIL_HOST');
		if ($emailHost === false) {
			$emailHost = "127.0.0.1";
		}
		return $emailHost;
	}

	/**
	 * Returns the host name or address of the Email server as seen from the
	 * point of view of the test runner.
	 *
	 * @return string
	 */
	public static function getLocalEmailHost():string {
		$localEmailHost = \getenv('LOCAL_EMAIL_HOST');
		if ($localEmailHost === false) {
			$localEmailHost = self::getEmailHost();
		}
		return $localEmailHost;
	}

	/**
	 * Returns the host and port where Email messages can be read and deleted
	 * by the test runner.
	 *
	 * @return string
	 */
	public static function getLocalEmailUrl():string {
		$localEmailHost = self::getLocalEmailHost();
		$emailPort = \getenv('EMAIL_PORT');
		if ($emailPort === false) {
			$emailPort = "9000";
		}
		return "http://$localEmailHost:$emailPort";
	}
}
