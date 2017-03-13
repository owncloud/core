<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OCP;

/**
 * Interface IGnuPG
 *
 * @package OCP
 * @since 8.2.0
 */
interface IGnuPG {
	/**
	 * Add a public key to the keyring
	 *
	 * @param string $key The public key to add
	 * @return string Fingerprint of added $key
	 * @since 8.2.0
	 */
	public function addPublicKey($key);

	/**
	 * Remove public key with $fingerprint from the keyring
	 *
	 * @param string $fingerprint The fingerprint of the public key to remove
	 * @return bool Was the key removed succesfully
	 * @since 8.2.0
	 */
	public function removePublicKey($fingerprint);

	/**
	 * Encrtypt a message
	 *
	 * @param string $message The message to encrypt
	 * @param string $fingerprint The fingerprint of the key to use for encryption
	 * @return string The encrypted message
	 * @since 8.2.0
	 */
	public function encryptMessage($message, $fingerprint);
}
