<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OCP\Http\Client\IClientService;
use OCP\ILogger;
use OCP\Util;

/**
 * Fetches CRL (Certificate Revocation List) from HTTPS URLs with no redirects.
 * Returns null on any failure (network error, non-200 status, exceptions).
 * Never throws for network problems; the caller's fallback policy decides.
 *
 * Failures are logged at warning level so that a fail-closed CRL outcome
 * (network down, wrong scheme, non-200) is diagnosable from the log rather
 * than surfacing only as an opaque CRL_UNAVAILABLE downstream.
 */
class CrlFetcher {
	/** @var IClientService|null */
	private $clientService;

	/** @var ILogger|null */
	private $logger;

	public function __construct(?IClientService $clientService = null, ?ILogger $logger = null) {
		$this->clientService = $clientService;
		$this->logger = $logger;
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
			$this->logWarning('CRL fetch skipped: no HTTP client service available', ['url' => $url]);
			return null;
		}

		// Only allow HTTPS URLs
		if (\strpos($url, 'https://') !== 0) {
			$this->logWarning('CRL fetch skipped: non-HTTPS URL rejected', ['url' => $url]);
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
			$statusCode = $response->getStatusCode();
			if ($statusCode !== 200) {
				$this->logWarning('CRL fetch failed: unexpected HTTP status {status}', [
					'url' => $url,
					'status' => $statusCode,
				]);
				return null;
			}

			// Return the body (even if empty)
			return $response->getBody();
		} catch (\Throwable $e) {
			// Never throw for network problems; return null after logging.
			if ($this->logger !== null) {
				$this->logger->logException($e, [
					'app' => 'core',
					'message' => 'CRL fetch failed for URL ' . $url,
					'level' => Util::WARN,
				]);
			}
			return null;
		}
	}

	/**
	 * Log a warning if a logger is available. No-op otherwise (logger is optional
	 * so the fetcher stays trivially constructible in unit tests).
	 *
	 * @param string $message
	 * @param array $context
	 */
	private function logWarning(string $message, array $context = []): void {
		if ($this->logger === null) {
			return;
		}
		$context['app'] = 'core';
		$this->logger->warning($message, $context);
	}
}
