<?php
namespace OCA\dav\Migrations;

use OC\Files\Filesystem;
use OC\Files\FileInfo;
use \OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\IUser;
use OCP\Migration\ISqlMigration;


/*
 * Resolve userid/propertypath into fileid
 * Update all entries with actual fileid if possible
 * Drop all entries that can't be resolved
 */
class Version20170202213905 implements ISqlMigration {
	/** @var \OCP\IUserSession */
	private $userSession;

	/** @var string */
	private $currentFilesystemUser;

	/**
	 * @param IDBConnection $connection
	 * @return null
	 */
	public function sql(IDBConnection $connection) {
		$qb = $connection->getQueryBuilder();
		$qb->select('*')
			->from('properties', 'props')
			->setMaxResults(1);
		$result = $qb->execute();
		$row = $result->fetch();

		// There is nothing to do if table is empty or has no userid field
		if (!$row || !isset($row['userid'])) {
			return;
		}


		$qb->select('*')
			->from('properties', 'props')
			->groupBy('userid')
			->addGroupBy('propertypath')
			->orderBy('userid')
			->addOrderBy('propertypath');
		$selectResult = $qb->execute();

		while ($row = $selectResult->fetch()) {
			try {
				$this->repairEntry($qb, $row);
			} catch (\Exception $e) {
				// do nothing
			}
		}

		$this->userSession = \OC::$server->getUserSession();

		// drop entries with empty fileid
		$qb->delete('properties')
			->where(
				$qb->expr()->eq('fileid', $qb->expr()->literal('0'))
			)
			->orWhere(
				$qb->expr()->isNull('fileid')
			);
		$rowsDeleted = $qb->execute();
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param $entry
	 */
	private function repairEntry(IQueryBuilder $qb, $entry) {
		$userId = $entry['userid'];
		$user = \OC::$server->getUserManager()->get($userId);
		if (!($user instanceof IUser)) {
			return;
		}

		$this->initFilesystemForUser($user);
		$fileInfo = Filesystem::getFileInfo($entry['propertypath']);
		if ($fileInfo instanceof FileInfo) {
			$fileId = $fileInfo->getId();
			$qb->update('properties')
				->set('fileid', $fileId)
				->where(
					$qb->expr()->eq('userid', $userId)
				)
				->andWhere(
					$qb->expr()->eq('propertypath', $entry['propertypath'])
				);
			$qb->execute();
		}
	}

	/**
	 * @param IUser $user
	 */
	private function initFilesystemForUser(IUser $user) {
		if ($this->currentFilesystemUser !== $user->getUID()) {
			if ($this->currentFilesystemUser !== '') {
				Filesystem::tearDown();
			}
			Filesystem::init($user->getUID(), '/' . $user->getUID() . '/files');
			$this->userSession->setUser($user);
			$this->currentFilesystemUser = $user->getUID();
			Filesystem::initMountPoints($user->getUID());
		}
	}
}
