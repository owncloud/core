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
 * Helper to test email sending, using inbucket email service
 *
 *
 */
class InbucketHelper {

	/**
	 * retrieving emails sent from mailhog
	 *
	 * @param array $mailboxes
	 *
	 * @return mixed JSON encoded contents
	 * @throws GuzzleException
	 */
	public static function getMailboxIds (array $mailboxes) {
		$response = HttpRequestHelper::get(
			 "http://localhost:9100" . "/api/v1/mailbox/${mailboxes[0]}",
			null,
			null,
			null,
			['Content-Type' => 'application/json']
		);

		$json = json_decode($response->getBody()->getContents(), true);
		return $json;
	}


	/**
	 * retrieving emails sent from mailhog
	 *
	 * @param string $mailboxid
	 * @param array $mailboxes
	 *
	 * @return mixed JSON encoded contents
	 * @throws GuzzleException
	 */
	public static function getBodyContentWithID (array $mailboxes, string $mailboxid) {
		var_dump(
			$mailboxes[0],
			$mailboxid
		);
		$response = HttpRequestHelper::get(
			"http://localhost:9100" . "/api/v1/mailbox/${mailboxes[0]}/" . $mailboxid,
			null,
			null,
			null,
			['Content-Type' => 'application/json']
		);

		$json = json_decode($response->getBody()->getContents());
		return $json;
	}
}
