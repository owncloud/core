<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\FederatedFileSharing;
use OC\HintException;
use OCP\IL10N;
use OCP\IURLGenerator;

/**
 * Class AddressHandler - parse, modify and construct federated sharing addresses
 *
 * @package OCA\FederatedFileSharing
 */
class AddressHandler {

	/** @var IL10N */
	private $l;

	/** @var IURLGenerator */
	private $urlGenerator;

	/**
	 * AddressHandler constructor.
	 *
	 * @param IURLGenerator $urlGenerator
	 * @param IL10N $il10n
	 */
	public function __construct(
		IURLGenerator $urlGenerator,
		IL10N $il10n
	) {
		$this->l = $il10n;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * split user and remote from federated cloud id
	 *
	 * @param string $address federated share address
	 * @return array [user, remoteURL]
	 * @throws HintException
	 */
	public function splitUserRemote($address) {
		if (\strpos($address, '@') === false) {
			$hint = $this->l->t('Invalid Federated Cloud ID');
			throw new HintException('Invalid Federated Cloud ID', $hint);
		}

		// Find the first character that is not allowed in user names
		$id = \str_replace('\\', '/', $address);
		$posSlash = \strpos($id, '/');
		$posColon = \strpos($id, ':');

		if ($posSlash === false && $posColon === false) {
			$invalidPos = \strlen($id);
		} elseif ($posSlash === false) {
			$invalidPos = $posColon;
		} elseif ($posColon === false) {
			$invalidPos = $posSlash;
		} else {
			$invalidPos = \min($posSlash, $posColon);
		}

		// Find the last @ before $invalidPos
		$pos = $lastAtPos = 0;
		while ($lastAtPos !== false && $lastAtPos <= $invalidPos) {
			$pos = $lastAtPos;
			$lastAtPos = \strpos($id, '@', $pos + 1);
		}

		if ($pos !== false) {
			$user = \substr($id, 0, $pos);
			$remote = \substr($id, $pos + 1);
			$remote = $this->fixRemoteURL($remote);
			if (!empty($user) && !empty($remote)) {
				return [$user, $remote];
			}
		}

		$hint = $this->l->t('Invalid Federated Cloud ID');
		throw new HintException('Invalid Federated Cloud ID', $hint);
	}

	/**
	 * @param string $uid
	 *
	 * @return Address
	 */
	public function getLocalUserFederatedAddress($uid) {
		$host = $this->generateRemoteURL();
		return new Address("{$uid}@{$host}");
	}

	/**
	 * generate remote URL part of federated ID
	 *
	 * @return string url of the current server
	 */
	public function generateRemoteURL() {
		$url = $this->urlGenerator->getAbsoluteURL('/');
		return $url;
	}

	/**
	 * remove protocol from URL
	 *
	 * @param string $url
	 * @return string
	 */
	public function removeProtocolFromUrl($url) {
		// replace all characters before :// and :// itself
		return \preg_replace('|^(.*?://)|', '', $url);
	}

	/**
	 * Strips away a potential file names and trailing slashes:
	 * - http://localhost
	 * - http://localhost/
	 * - http://localhost/index.php
	 * - http://localhost/index.php/s/{shareToken}
	 *
	 * all return: http://localhost
	 *
	 * @param string $remote
	 * @return string
	 */
	protected function fixRemoteURL($remote) {
		$remote = \str_replace('\\', '/', $remote);
		if ($fileNamePosition = \strpos($remote, '/index.php')) {
			$remote = \substr($remote, 0, $fileNamePosition);
		}
		$remote = \rtrim($remote, '/');

		return $remote;
	}
}
