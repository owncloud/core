<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2025, ownCloud GmbH
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

use OC\IntegrityCheck\Exceptions\BadAlgorithmException;

/**
 * Class AlgorithmAllowlist implements the crypto-agility gate from spec §3.
 * It validates algorithm permissions according to chain generation and sunset rules.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class AlgorithmAllowlist {

	/**
	 * Assert that the given algorithm is permitted based on chain generation and current time.
	 *
	 * @param string $alg The algorithm identifier
	 * @param bool $isG1Chain Whether this is a G1 chain
	 * @param \DateTimeInterface $now The current time (injected for deterministic testing)
	 * @throws BadAlgorithmException If the algorithm is not permitted
	 */
	public function assertPermitted(string $alg, bool $isG1Chain, \DateTimeInterface $now): void {
		// G2 algorithms are always permitted
		if (\in_array($alg, VerifierConstants::G2_ALGS, true)) {
			return;
		}

		// Legacy algorithm: only permitted on G1 chains before sunset
		if ($alg === VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1) {
			if (!$isG1Chain) {
				throw new BadAlgorithmException('legacy algorithm is not permitted on non-G1 chains');
			}

			$sunset = new \DateTimeImmutable(VerifierConstants::LEGACY_SUNSET);
			if ($now->getTimestamp() >= $sunset->getTimestamp()) {
				throw new BadAlgorithmException('legacy algorithm is not permitted after sunset');
			}

			return;
		}

		// Any other algorithm is not permitted
		throw new BadAlgorithmException('algorithm "' . $alg . '" is not permitted');
	}
}
