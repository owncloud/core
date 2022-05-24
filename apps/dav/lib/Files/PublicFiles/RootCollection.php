<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files\PublicFiles;

use OC\Share\Constants;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\SimpleCollection;
use Sabre\DAV\SimpleFile;

/**
 * Class RootCollection - represents the list of public shares.
 * Only in debug mode all shares will be listed.
 * In production enumerating public shares is considered an information disclosure.
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class RootCollection extends Collection {

	/** @var IManager */
	private $shareManager;
	/** @var \OCP\IL10N */
	protected $l10n;

	/**
	 * If this value is set to true, it effectively disables listing of users
	 * it still allows user to find other users if they have an exact url.
	 *
	 * @var bool
	 */
	public $disableListing = false;
	/**
	 * @var \OCP\IRequest
	 */
	private $request;

	public function __construct() {
		$this->l10n = \OC::$server->getL10N('dav');
		$this->shareManager = \OC::$server->getShareManager();
		$this->request = \OC::$server->getRequest();
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return 'public-files';
	}

	/**
	 * @inheritdoc
	 */
	public function getChild($name) {
		try {
			$share = $this->shareManager->getShareByToken($name);
			return new PublicSharedRootNode($share, $this->request);
		} catch (ShareNotFound $ex) {
			throw new NotFound();
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		if ($this->disableListing) {
			throw new MethodNotAllowed('Listing members of this collection is disabled');
		}

		$shares = $this->shareManager->getAllSharedWith(null, [Constants::SHARE_TYPE_LINK]);
		return \array_map(function (IShare $share) {
			return new PublicSharedRootNode($share, $this->request);
		}, $shares);
	}
}
