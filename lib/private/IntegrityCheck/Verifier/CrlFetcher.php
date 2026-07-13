<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OCP\Http\Client\IClientService;

/**
 * Fetches CRL (Certificate Revocation List) from HTTPS URLs with no redirects.
 * Returns null on any failure (network error, non-200 status, exceptions).
 * Never throws for network problems; the caller's fallback policy decides.
 */
class CrlFetcher {
	/** @var IClientService|null */
	private $clientService;

	public function __construct(?IClientService $clientService = null) {
		$this->clientService = $clientService;
	}

	/**
	 * Fetch CRL from the given URL.
	 *
	 * @param string $url HTTPS URL to fetch from
	 * @return string|null Raw CRL bytes on 200, null on any failure
	 */
	public function fetch(string $url): ?string {
		// If no client service, cannot fetch
		if ($this->clientService === null) {
			return null;
		}

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
