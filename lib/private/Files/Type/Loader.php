<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OC\Files\Type;

use OCP\Files\IMimeTypeLoader;
use OCP\IDBConnection;
use OCP\ICacheFactory;
use OCP\ICache;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

/**
 * Mimetype database loader
 *
 * @package OC\Files\Type
 */
class Loader implements IMimeTypeLoader {
	public const CACHE_PREFIX_FOR_ID = ':id:';
	public const CACHE_PREFIX_FOR_MIME = ':mime:';

	/** @var IDBConnection */
	private $dbConnection;

	/** @var ICache */
	private $memcache;

	/** @var array [id => mimetype] */
	protected $mimetypes;

	/** @var array [mimetype => id] */
	protected $mimetypeIds;

	/**
	 * @param IDBConnection $dbConnection
	 */
	public function __construct(IDBConnection $dbConnection, ICacheFactory $cacheFactory) {
		$this->dbConnection = $dbConnection;
		$this->memcache = $cacheFactory->create('mimetypes');
		$this->mimetypes = [];
		$this->mimetypeIds = [];
	}

	/**
	 * Get a mimetype from its ID
	 *
	 * @param int $id
	 * @return string|null
	 */
	public function getMimetypeById($id) {
		// Check local vars
		if (isset($this->mimetypes[$id])) {
			return $this->mimetypes[$id];
		}

		// Check memcache. It will update the local var if needed.
		$mimetype = $this->getMimetypeFromMemcache($id);
		if ($mimetype !== null) {
			return $mimetype;
		}

		// Check the DB. Local vars and memcache will be updated if needed
		// if the id doesn't exists, null will be returned
		return $this->getMimetypeFromDB($id);
	}

	/**
	 * Get a mimetype ID, adding the mimetype to the DB if it does not exist
	 *
	 * @param string $mimetype
	 * @return int
	 */
	public function getId($mimetype) {
		$id = $this->lookFor($mimetype);
		if ($id !== null) {
			return $id;
		}

		// store the new value, update caches and return new id
		return $this->store($mimetype);
	}

	/**
	 * Test if a mimetype exists in the database
	 *
	 * @param string $mimetype
	 * @return bool
	 */
	public function exists($mimetype) {
		return $this->lookFor($mimetype) !== null;
	}

	/**
	 * Check local vars, memcache and DB looking for the mimetype.
	 * @return int|null the id of the mimetype or null if the mimetype isn't found anywhere
	 */
	private function lookFor($mimetype) {
		// Check local vars
		if (isset($this->mimetypeIds[$mimetype])) {
			return $this->mimetypeIds[$mimetype];
		}

		// Check memcache. It will update the local var if needed.
		$id = $this->getIdFromMemcache($mimetype);
		if ($id !== null) {
			return $id;
		}

		// Check the DB. Local vars and memcache will be updated if needed
		return $this->getIdFromDB($mimetype);
	}

	/**
	 * Clear all loaded mimetypes, allow for re-loading
	 */
	public function reset() {
		$this->memcache->clear();
		$this->mimetypes = [];
		$this->mimetypeIds = [];
	}

	/**
	 * Store a mimetype in the DB
	 *
	 * @param string $mimetype
	 * @param int inserted ID
	 */
	protected function store($mimetype) {
		try {
			$qb = $this->dbConnection->getQueryBuilder();
			$qb->insert('mimetypes')
				->values([
					'mimetype' => $qb->createNamedParameter($mimetype)
				]);
			$qb->execute();
		} catch (UniqueConstraintViolationException $e) {
			// something inserted it before us
		}

		$fetch = $this->dbConnection->getQueryBuilder();
		$fetch->select('id')
			->from('mimetypes')
			->where(
				$fetch->expr()->eq(
					'mimetype',
					$fetch->createNamedParameter($mimetype)
				)
			);
		$row = $fetch->execute()->fetch();

		// update cache
		$this->memcache->set(self::CACHE_PREFIX_FOR_ID . $row['id'], $mimetype);
		$this->memcache->set(self::CACHE_PREFIX_FOR_MIME . $mimetype, $row['id']);

		// update local vars
		$this->mimetypes[$row['id']] = $mimetype;
		$this->mimetypeIds[$mimetype] = $row['id'];
		return $row['id'];
	}

	/**
	 * Get the id from the memcache based on the mimetype
	 * This method will also update the local vars if needed.
	 * DB won't be accessed
	 * @return int|null the id for the mimetype or null if it isn't found in the memcache
	 */
	private function getIdFromMemcache($mimetype) {
		$id = $this->memcache->get(self::CACHE_PREFIX_FOR_MIME . $mimetype);
		if ($id !== null) {
			$this->mimetypes[$id] = $mimetype;
			$this->mimetypeIds[$mimetype] = $id;
		}
		return $id;
	}

	/**
	 * Get the mimetype from the memcache based on the id
	 * This method will also update the local vars if needed.
	 * DB won't be accessed
	 * @return string|null the mimetype for the id or null if it isn't found in the memcache
	 */
	private function getMimetypeFromMemcache($id) {
		$mimetype = $this->memcache->get(self::CACHE_PREFIX_FOR_ID . $id);
		if ($mimetype !== null) {
			$this->mimetypes[$id] = $mimetype;
			$this->mimetypeIds[$mimetype] = $id;
		}
		return $mimetype;
	}

	/**
	 * Get the id from the DB based on the mimetype
	 * This method will also update the memcache and local vars if needed
	 * @return int|null the id for the mimetype or null if it isn't found in the DB
	 */
	private function getIdFromDB($mimetype) {
		$qb = $this->dbConnection->getQueryBuilder();
		$qb->select('id', 'mimetype')
			->from('mimetypes')
			->where(
				$qb->expr()->eq(
					'mimetype',
					$qb->createNamedParameter($mimetype)
				)
			);
		$result = $qb->execute();

		$id = null;
		if (($row = $result->fetch()) !== false) {
			$id = $row['id'];

			// update cache
			$this->memcache->set(self::CACHE_PREFIX_FOR_ID . $row['id'], $row['mimetype']);
			$this->memcache->set(self::CACHE_PREFIX_FOR_MIME . $row['mimetype'], $row['id']);

			// update local vars
			$this->mimetypes[$row['id']] = $row['mimetype'];
			$this->mimetypeIds[$row['mimetype']] = $row['id'];
		}
		$result->closeCursor();

		return $id;
	}

	/**
	 * Get the mimetype from the DB based on the id
	 * This method will also update the memcache and local vars if needed
	 * @return string|null the mimetype for the id or null if it isn't found in the DB
	 */
	private function getMimetypeFromDB($id) {
		$qb = $this->dbConnection->getQueryBuilder();
		$qb->select('id', 'mimetype')
			->from('mimetypes')
			->where(
				$qb->expr()->eq(
					'id',
					$qb->createNamedParameter($id)
				)
			);
		$result = $qb->execute();

		$mimetype = null;
		if (($row = $result->fetch()) !== false) {
			$mimetype = $row['mimetype'];

			// update cache
			$this->memcache->set(self::CACHE_PREFIX_FOR_ID . $row['id'], $row['mimetype']);
			$this->memcache->set(self::CACHE_PREFIX_FOR_MIME . $row['mimetype'], $row['id']);

			// update local vars
			$this->mimetypes[$row['id']] = $row['mimetype'];
			$this->mimetypeIds[$row['mimetype']] = $row['id'];
		}
		$result->closeCursor();

		return $mimetype;
	}

	/**
	 * Update filecache mimetype based on file extension
	 *
	 * @param string $ext file extension
	 * @param int $mimetypeId
	 * @return int number of changed rows
	 */
	public function updateFilecache($ext, $mimetypeId) {
		$is_folderId = $this->getId('httpd/unix-directory');
		$update = $this->dbConnection->getQueryBuilder();
		$update->update('filecache')
			->set('mimetype', $update->createPositionalParameter($mimetypeId))
			->where($update->expr()->neq(
				'mimetype',
				$update->createPositionalParameter($mimetypeId)
			))
			->andwhere($update->expr()->neq(
				'mimetype',
				$update->createPositionalParameter($is_folderId)
			))
			->andWhere($update->expr()->like(
				$update->createFunction('LOWER(`name`)'),
				$update->createPositionalParameter("%.$ext")
			));
		return $update->execute();
	}
}
