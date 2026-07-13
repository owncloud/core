<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\BadSignatureException;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\EC;

/**
 * Class ManifestVerifier verifies manifest signatures using various cryptographic algorithms.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class ManifestVerifier {
	private const ALG_EC_P384_SHA384 = 'ecdsa-p384-sha384';
	private const ALG_RSA_PSS_SHA384 = 'rsa-pss-sha384';
	private const ALG_RSA_PSS_SHA1 = 'rsa-pss-sha1';

	/**
	 * Verify a manifest signature.
	 *
	 * @param string $signedBytes The exact bytes that were signed (M for v2; legacy json_encode for G1)
	 * @param string $alg The signature algorithm ('ecdsa-p384-sha384' | 'rsa-pss-sha384' | 'rsa-pss-sha1')
	 * @param string $signatureBinary Raw signature bytes (already base64-decoded)
	 * @param string $leafPem The leaf certificate PEM
	 * @throws BadSignatureException If verification fails or algorithm is unknown
	 * @return void
	 */
	public function verify(
		string $signedBytes,
		string $alg,
		string $signatureBinary,
		string $leafPem
	): void {
		// Validate algorithm
		if (!\in_array($alg, [self::ALG_EC_P384_SHA384, self::ALG_RSA_PSS_SHA384, self::ALG_RSA_PSS_SHA1])) {
			throw new BadSignatureException("Unknown signature algorithm: {$alg}");
		}

		try {
			$publicKey = PublicKeyLoader::load($leafPem);
		} catch (\Throwable $e) {
			throw new BadSignatureException("Failed to load public key: " . $e->getMessage());
		}

		// Verify algorithm/key-type match and perform verification
		try {
			if ($alg === self::ALG_EC_P384_SHA384) {
				if (!($publicKey instanceof EC\PublicKey)) {
					throw new BadSignatureException("Algorithm requires EC key, got " . \get_class($publicKey));
				}
				$verified = $publicKey->withHash('sha384')->verify($signedBytes, $signatureBinary);
			} elseif ($alg === self::ALG_RSA_PSS_SHA384) {
				if (!($publicKey instanceof RSA\PublicKey)) {
					throw new BadSignatureException("Algorithm requires RSA key, got " . \get_class($publicKey));
				}
				$verified = $publicKey
					->withHash('sha384')
					->withMGFHash('sha384')
					->withPadding(RSA::SIGNATURE_PSS)
					->withSaltLength(48)
					->verify($signedBytes, $signatureBinary);
			} elseif ($alg === self::ALG_RSA_PSS_SHA1) {
				if (!($publicKey instanceof RSA\PublicKey)) {
					throw new BadSignatureException("Algorithm requires RSA key, got " . \get_class($publicKey));
				}
				$verified = $publicKey
					->withHash('sha1')
					->withMGFHash('sha512')
					->withSaltLength(0)
					->withPadding(RSA::SIGNATURE_PSS)
					->verify($signedBytes, $signatureBinary);
			} else {
				throw new BadSignatureException("Unknown signature algorithm: {$alg}");
			}

			if (!$verified) {
				throw new BadSignatureException('Signature could not be verified.');
			}
		} catch (BadSignatureException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BadSignatureException('Signature could not be verified: ' . $e->getMessage());
		}
	}
}
