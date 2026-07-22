<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

/**
 * Class VerifierConstants holds shared constants for the G2 code-signing verifier.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class VerifierConstants {
	// Served from owncloud.dev (not the owncloud.github.io path, which
	// 301-redirects org-wide to owncloud.dev — CrlFetcher does not follow
	// redirects; see spec-core-verifier §5, design §13).
	public const CRL_URL = 'https://owncloud.dev/developer-certificates/crl/developers.crl';
	public const LEGACY_SUNSET = '2026-12-31T23:59:59Z';
	public const ALG_ECDSA_P384_SHA384 = 'ecdsa-p384-sha384';
	public const ALG_RSA_PSS_SHA384 = 'rsa-pss-sha384';
	public const ALG_LEGACY_RSA_PSS_SHA1 = 'rsa-pss-sha1';
	public const G2_ALGS = [self::ALG_ECDSA_P384_SHA384, self::ALG_RSA_PSS_SHA384];
}
