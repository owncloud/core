<?php
/**
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
namespace OCA\DAV\JobStatus;

use OCA\DAV\DAV\LazyOpsPlugin;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\SimpleFile;
use Sabre\HTTP\URLUtil;

class Home extends Collection {
	/** @var array */
	private $principalInfo;
	/** @var JobStatusMapper */
	private $mapper;

	/**
	 * Home constructor.
	 *
	 * @param array $principalInfo
	 * @param JobStatusMapper $mapper
	 */
	public function __construct($principalInfo, JobStatusMapper $mapper) {
		$this->principalInfo = $principalInfo;
		$this->mapper = $mapper;
	}

	public function getChild($name) {
		try {
			$entity = $this->mapper->findByUserIdAndJobId($this->getName(), $name);

			return new JobStatus($this->getName(), $name, $this->mapper, $entity);
		} catch (DoesNotExistException $ex) {
			throw new NotFound();
		}
	}

	public function getChildren() {
		throw new MethodNotAllowed('Listing members of this collection is disabled');
	}

	public function getName() {
		list(, $name) = URLUtil::splitPath($this->principalInfo['uri']);
		return $name;
	}
}
