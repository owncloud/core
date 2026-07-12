<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OC\IntegrityCheck\Verifier;

use OCP\Http\Client\IClientService;

/**
 * Fetches CRL (Certificate Revocation List) from HTTPS URLs with no redirects.
 * Returns null on any failure (network error, non-200 status, exceptions).
 * Never throws for network problems; the caller's fallback policy decides.
 */
class CrlFetcher {
	/** @var IClientService */
	private $clientService;

	public function __construct(IClientService $clientService) {
		$this->clientService = $clientService;
	}

	/**
	 * Fetch CRL from the given URL.
	 *
	 * @param string $url HTTPS URL to fetch from
	 * @return string|null Raw CRL bytes on 200, null on any failure
	 */
	public function fetch(string $url): ?string {
		// Only allow HTTPS URLs
		if (\strpos($url, 'https://') !== 0) {
			return null;
		}

		try {
			$client = $this->clientService->newClient();
			$options = [
				'allow_redirects' => false,
				'timeout' => 10,
				'connect_timeout' => 5,
			];
			$response = $client->get($url, $options);

			// Only accept 200 status
			if ($response->getStatusCode() !== 200) {
				return null;
			}

			// Return the body (even if empty)
			return $response->getBody();
		} catch (\Throwable $e) {
			// Never throw for network problems; return null
			return null;
		}
	}
}
