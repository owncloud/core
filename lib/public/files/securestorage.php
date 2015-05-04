<?php
/**
 * ownCloud
 *
 * @author Dagan Henderson
 * @copyright 2015 Dagan Henderson dagan@techdagan.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Public interface of ownCloud for apps to use.
 * Files/SecureStorage interface
 */

namespace OCP\Files;


interface SecureStorage extends Storage {

    /**
     * Indicates Whether a Path Should be Encrypted by ownCloud
     *
     * Used by OCA\Files_Encryption\Proxy to determine whether or not to
     * encrypt the given file. If the storage returns false, it must monitor
     * and respects share of the given path, ensuring all users the file is
     * shared with maintain access. The storage must also ensure the file is
     * stored securely.
     *
     * @param $path
     * @return bool
     */
    public function shouldEncrypt($path);
}