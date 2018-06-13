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

use OCA\DAV\JobStatus\Entity\JobStatus as JobStatusEntity;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use Sabre\DAV\File;

class JobStatus extends File {

	/** @var string */
	private $jobId;
	/** @var string */
	private $userId;
	/** @var string */
	private $data;
	/** @var JobStatusMapper */
	private $mapper;
	/** @var JobStatusEntity */
	private $entity;

	public function __construct($userId, $jobId,
								JobStatusMapper $mapper,
								JobStatusEntity $entity) {
		$this->userId = $userId;
		$this->jobId = $jobId;
		$this->mapper = $mapper;
		$this->entity = $entity;
	}

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->jobId;
	}

	public function get() {
		if ($this->entity === null) {
			$this->entity = $this->mapper
				->findByUserIdAndJobId($this->userId, $this->jobId);
		}
		return $this->entity->getStatusInfo();
	}

	public function getETag() {
		return '"' . \sha1($this->get()) . '"';
	}

	public function getSize() {
		return \strlen($this->get());
	}

	public function refreshStatus() {
		$this->entity = null;
	}
}
