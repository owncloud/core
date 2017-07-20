<?php
/**
 * @author Tom Needham <tom@owncloud.com
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


namespace OC\Encryption;

use Symfony\Component\Console\Helper\ProgressBar;

class ParallelDecryptAll extends DecryptAll {

	public function decryptUsersFiles($uid, ProgressBar $progress, $userCount) {
		parent::decryptUsersFiles($uid, $progress, $userCount);
	}

	public function prepareEncryptionModules($user) {
		return parent::prepareEncryptionModules($user);
	}

	public function checkForFailure() {
		if (empty($this->failed)) {
			$this->output->writeln('all files could be decrypted successfully!');
			return 0;
		} else {
			$this->output->writeln('The following files failed to decrypt:');
			foreach ($this->failed as $uid => $paths) {
				$this->output->writeln('    ' . $uid);
			}
			$this->output->writeln('');
			return 1;
		}
	}


}
