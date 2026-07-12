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

/**
 * Class VerifierConstants holds shared constants for the G2 code-signing verifier.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class VerifierConstants {
	public const CRL_URL = 'https://owncloud.github.io/developer-certificates/crl/developers.crl';
	public const LEGACY_SUNSET = '2026-12-31T23:59:59Z';
	public const ALG_ECDSA_P384_SHA384 = 'ecdsa-p384-sha384';
	public const ALG_RSA_PSS_SHA384 = 'rsa-pss-sha384';
	public const ALG_LEGACY_RSA_PSS_SHA1 = 'rsa-pss-sha1';
	public const G2_ALGS = [self::ALG_ECDSA_P384_SHA384, self::ALG_RSA_PSS_SHA384];
}
