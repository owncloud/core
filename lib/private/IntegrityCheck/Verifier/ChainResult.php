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

use phpseclib3\File\X509;

/**
 * ChainResult - Immutable holder for successful X.509 chain validation result.
 *
 * Carries the validated leaf certificate, the generation of its anchor root (g1/g2),
 * the leaf's CN, and its serial number.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class ChainResult {
	private X509 $leaf;
	private string $anchorGeneration;
	private string $leafCn;
	private string $leafSerial;
	/** @var array Chain serials (leaf first, then intermediates) */
	private array $chainSerials;

	/**
	 * @param X509 $leaf Loaded and validated leaf certificate
	 * @param string $anchorGeneration 'g1' or 'g2'
	 * @param string $leafCn Common Name of the leaf cert
	 * @param string $leafSerial Decimal string serial number
	 * @param array $chainSerials Array of all chain certificate serials (leaf first, then intermediates)
	 */
	public function __construct(X509 $leaf, string $anchorGeneration, string $leafCn, string $leafSerial, array $chainSerials = []) {
		$this->leaf = $leaf;
		$this->anchorGeneration = $anchorGeneration;
		$this->leafCn = $leafCn;
		$this->leafSerial = $leafSerial;
		// If chainSerials is empty, default to just the leaf serial for backward compatibility
		$this->chainSerials = !empty($chainSerials) ? $chainSerials : [$leafSerial];
	}

	/**
	 * Get the loaded and validated leaf certificate.
	 *
	 * @return X509
	 */
	public function getLeaf(): X509 {
		return $this->leaf;
	}

	/**
	 * Get the generation of the root that anchors the chain.
	 *
	 * @return string 'g1' or 'g2'
	 */
	public function getAnchorGeneration(): string {
		return $this->anchorGeneration;
	}

	/**
	 * Convenience: returns true iff anchor generation is 'g1'.
	 *
	 * @return bool
	 */
	public function isG1(): bool {
		return $this->anchorGeneration === 'g1';
	}

	/**
	 * Get the leaf certificate's Common Name.
	 *
	 * @return string
	 */
	public function getLeafCn(): string {
		return $this->leafCn;
	}

	/**
	 * Get the leaf certificate's serial number as a decimal string.
	 *
	 * Used for CRL (Certificate Revocation List) checks in later tasks.
	 *
	 * @return string Decimal string (e.g. "12345678901234567890")
	 */
	public function getLeafSerial(): string {
		return $this->leafSerial;
	}

	/**
	 * Get all serials in the validated chain (leaf first, then intermediates).
	 *
	 * Used to check if ANY certificate in the chain is revoked, per spec §4.
	 *
	 * @return array Array of decimal string serials
	 */
	public function getChainSerials(): array {
		return $this->chainSerials;
	}
}
