<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
namespace OC\Share20;

use OC\Share20\Exception\ShareNotFound;
use OC\Share20\Exception\BackendError;
use OCP\IUser;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\IDBConnection;

class DefaultShareProvider implements IShareProvider {

	/** @var IDBConnection */
	private $dbConn;

	/** @var IUserManager */
	private $userManager;

	/** @var IGroupManager */
	private $groupManager;

	/** @var Folder */
	private $userFolder;

	/** @var IRootFolder */
	private $rootFolder;

	public function __construct(IDBConnection $connection,
								IUserManager $userManager,
								IGroupManager $groupManager,
								Folder $userFolder,
								IRootFolder $rootFolder) {
		$this->dbConn = $connection;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->userFolder = $userFolder;
		$this->rootFolder = $rootFolder;
	}

	/**
	 * Share a path
	 * 
	 * @param IShare $share
	 * @return Share The share object
	 */
	public function create(IShare $share) {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share');

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			throw new \Exception('creating user shares is not supported yet');
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			throw new \Exception('creating group shares is not supported yet');
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			// Set the token
			$qb->setValue('token', $qb->createParameter('token'))
					->setParameter(':token', $share->getToken());

			// Set expiration date if set
			if ($share->getExpirationDate() !== null) {
				$qb->setValue('expiration', $qb->createParameter('expiration'))
					->setParameter('expiration', $share->getExpirationDate(), \Doctrine\DBAL\Types\Type::DATETIME);
			}

			//Set the password if set
			if ($share->getPassword() !== null) {
				$qb->setValue('share_with', $qb->createParameter('share_with'))
					->setParameter(':share_with', $share->getPassword());
			}
		} else {
			throw new \Exception('unkown share type');
		}

		// Share Type
		$qb->setValue('share_type', $qb->createParameter('share_type'))
			->setParameter(':share_type', $share->getShareType());

		// Shared by
		$qb->setValue('uid_owner', $qb->createParameter('uid_owner'))
			->setParameter(':uid_owner', $share->getSharedBy()->getUID());

		// Set item_type
		$qb->setValue('item_type', $qb->createParameter('item_type'));
		if ($share->getPath() instanceof \OCP\Files\File) {
			$qb->setParameter(':item_type', 'file');
		} else if ($share->getPath() instanceof \OCP\Files\Folder) {
			$qb->setParameter(':item_type', 'folder');
		} else {
			throw new \Exception('invalid path');
		}

		// Set fileid
		$qb->setValue('item_source', $qb->createParameter('item_source'))
			->setValue('file_source', $qb->createParameter('file_source'))
			->setParameter(':item_source', $share->getPath()->getId())
			->setParameter(':file_source', $share->getPath()->getId());

		// Set permissions
		$qb->setValue('permissions', $qb->createParameter('permissions'))
			->setParameter(':permissions', $share->getPermissions());

		// Set parent if not empty
		if ($share->getParent() !== null) {
			$qb->setValue('parent', $qb->createParameter('parent'))
				->setParameter(':parent', $share->getParent());
		}

		// Set the share time
		$qb->setValue('stime', $qb->createParameter('share_time'))
			->setParameter(':share_time', time());

		// Get target
		$userFolder = $this->rootFolder->getUserFolder($share->getSharedBy()->getUID());
		$path = $userFolder->getRelativePath($share->getPath()->getPath());

		$qb->setValue('file_target', $qb->createParameter('file_target'))
			->setParameter(':file_target', $path);

		$qb->execute();


		// Now create select statement to get the data back
		$qb = $this->dbConn->getQueryBuilder();

		$qb->select('*')
			->from('share');

		// share_type
		$qb->where($qb->expr()->eq('share_type', $qb->createParameter('share_type')))
			->setParameter(':share_type', $share->getShareType());

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			$qb->andWhere($qb->expr()->eq('token', $qb->createParameter('token')))
				->setParameter(':token', $share->getToken());
		}

		// uid_owner
		$qb->andWhere($qb->expr()->eq('uid_owner', $qb->createParameter('uid_owner')))
			->setParameter(':uid_owner', $share->getSharedBy()->getUID());

		// item_type
		$qb->andWhere($qb->expr()->eq('item_type', $qb->createParameter('item_type')));
		if ($share->getPath() instanceof \OCP\Files\File) {
			$qb->setParameter(':item_type', 'file');
		} else if ($share->getPath() instanceof \OCP\Files\Folder) {
			$qb->setParameter(':item_type', 'folder');
		} else {
			throw new \Exception('invalid path');
		}

		// fileid
		$qb->andWhere($qb->expr()->eq('item_source', $qb->createParameter('item_source')));
		$qb->andWhere($qb->expr()->eq('file_source', $qb->createParameter('file_source')));
		$qb->setParameter(':item_source', $share->getPath()->getId());
		$qb->setParameter(':file_source', $share->getPath()->getId());

		$cursor = $qb->execute();
		$data = $cursor->fetch();
		$cursor->closeCursor();

		if ($data === false) {
			throw new ShareNotFound();
		}

		$share = $this->createShare($data);

		return $share;
	}

	/**
	 * Update a share
	 *
	 * @param Share $share
	 * @return Share The share object
	 */
	public function update(Share $share) {
		throw new \Exception();
	}

	/**
	 * Get all children of this share
	 *
	 * @param IShare $parent
	 * @return IShare[]
	 */
	public function getChildren(IShare $parent) {
		$children = [];

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share')
			->where($qb->expr()->eq('parent', $qb->createParameter('parent')))
			->setParameter(':parent', $parent->getId())
			->orderBy('id');

		$cursor = $qb->execute();
		while($data = $cursor->fetch()) {
			$children[] = $this->createShare($data);
		}
		$cursor->closeCursor();

		return $children;
	}

	/**
	 * Delete a share
	 *
	 * @param IShare $share
	 * @throws BackendError
	 */
	public function delete(IShare $share) {
		// Fetch share to make sure it exists
		$share = $this->getShareById($share->getId());

		$qb = $this->dbConn->getQueryBuilder();
		$qb->delete('share')
			->where($qb->expr()->eq('id', $qb->createParameter('id')))
			->setParameter(':id', $share->getId());
	
		try {
			$qb->execute();
		} catch (\Exception $e) {
			throw new BackendError();
		}
	}

	/**
	 * Get all shares by the given user
	 *
	 * @param IUser $user
	 * @param int $shareType
	 * @param int $offset
	 * @param int $limit
	 * @return Share[]
	 */
	public function getShares(IUser $user, $shareType, $offset, $limit) {
		throw new \Exception();
	}

	/**
	 * Get share by id
	 *
	 * @param int $id
	 * @return IShare
	 * @throws ShareNotFound
	 */
	public function getShareById($id) {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createParameter('id')))
			->setParameter(':id', $id);
		
		$cursor = $qb->execute();
		$data = $cursor->fetch();
		$cursor->closeCursor();

		if ($data === false) {
			throw new ShareNotFound();
		}

		$share = $this->createShare($data);

		return $share;
	}

	/**
	 * Get shares for a given path
	 *
	 * @param \OCP\IUser $user
	 * @param \OCP\Files\Node $path
	 * @return IShare[]
	 */
	public function getSharesByPath(\OCP\IUser $user, \OCP\Files\Node $path) {
		throw new \Exception();
	}

	/**
	 * Get shared with the given user
	 *
	 * @param IUser $user
	 * @param int $shareType
	 * @param Share
	 */
	public function getSharedWithMe(IUser $user, $shareType = null) {
		throw new \Exception();
	}

	/**
	 * Get a share by token and if present verify the password
	 *
	 * @param string $token
	 * @param Share
	 */
	public function getShareByToken($token) {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->select('*')
			->from('share')
			->where(
				$qb->expr()->eq('token', $qb->createParameter('token'))
			)
			->setParameter(':token', $token);

		$cursor = $qb->execute();
		$data = $cursor->fetch();
		$cursor->closeCursor();

		if ($data === false) {
			throw new ShareNotFound();
		}

		$share = $this->createShare($data);

		return $share;
	}
	
	/**
	 * Create a share object from an database row
	 *
	 * @param mixed[] $data
	 * @return Share
	 */
	private function createShare($data) {
		$share = new Share();
		$share->setId((int)$data['id'])
			->setShareType((int)$data['share_type'])
			->setPermissions((int)$data['permissions'])
			->setTarget($data['file_target'])
			->setShareTime((int)$data['stime'])
			->setMailSend((bool)$data['mail_send']);

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			$share->setSharedWith($this->userManager->get($data['share_with']));
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			$share->setSharedWith($this->groupManager->get($data['share_with']));
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			$share->setPassword($data['share_with']);
			$share->setToken($data['token']);
		} else {
			$share->setSharedWith($data['share_with']);
		}

		$share->setSharedBy($this->userManager->get($data['uid_owner']));

		// TODO: getById can return an array. How to handle this properly??
		$path = $this->userFolder->getById((int)$data['file_source']);
		$path = $path[0];
		$share->setPath($path);

		$owner = $path->getStorage()->getOwner('.');
		if ($owner !== false) {
			$share->setShareOwner($this->userManager->get($owner));
		}

		if ($data['expiration'] !== null) {
			$expiration = \DateTime::createFromFormat('Y-m-d H:i:s', $data['expiration']);
			$share->setExpirationDate($expiration);
		}

		if ($data['parent'] !== null) {
			$share->setParent((int)$data['parent']);
		}

		return $share;
	}


}
