<?php
/**
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud, Gmbh.
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

require __DIR__ . '/../../../../lib/composer/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

trait MailTool {

	/*
	 * Connects to an API in a docker container with mailhog,
	 * retrieving the emails sent from it.
	 * To use it the container should have previously been set up.
	*/
	public function getEmails() {
		$fullUrl = $this->mailhogUrl;
		$client = new Client();
		try {
			$request = new Request(
				'GET',
				$fullUrl,
				['Content-Type' => 'application/json']
			);
			$this->response = $client->send($request, $options);
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
		$json = json_decode($this->response->getBody()->getContents());
		return $json;
	}


}
