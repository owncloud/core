<?php

namespace OCA\Files\Service\TransferOwnership;

use OC\Command\CommandJob;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\BackgroundJob\IJobList;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\Files\Storage\IPersistentLockingStorage;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\L10N\IFactory;
use OCP\Lock\Persistent\ILock;
use OCP\Notification\IManager;
use OCP\Notification\INotification;
use OCP\Notification\INotifier;
use OCP\Util;

class TransferRequestManager implements INotifier {

	/** @var IRootFolder */
	protected $rootFolder;
	/** @var IManager */
	protected $notificationManager;
	/** @var IUserManager  */
	protected $userManager;
	/** @var ITimeFactory */
	protected $timeFactory;
	/** @var TransferRequestMapper  */
	protected $requestMapper;
	/** @var IURLGenerator  */
	protected $urlGenerator;
	/** @var IFactory */
	protected $factory;
	/** @var IJobList */
	protected $jobList;

	public function __construct(
		IRootFolder $rootFolder,
		IManager $notificationManager,
		IUserManager $userManager,
		ITimeFactory $timeFactory,
		TransferRequestMapper $requestMapper,
		IURLGenerator $urlGenerator,
		IFactory $factory,
		IJobList $jobList) {
		$this->rootFolder = $rootFolder;
		$this->notificationManager = $notificationManager;
		$this->userManager = $userManager;
		$this->timeFactory = $timeFactory;
		$this->requestMapper = $requestMapper;
		$this->urlGenerator = $urlGenerator;
		$this->factory = $factory;
		$this->jobList = $jobList;
	}

	/**
	 * @param IUser $sourceUser
	 * @param IUser $destinationUser
	 * @param $fileId
	 * @throws NotFoundException
	 * @throws \Exception
	 */
	public function newTransferRequest(IUser $sourceUser, IUser $destinationUser, $fileId) {
		// Cannot give to self
		if ($sourceUser->getUID() === $destinationUser->getUID()) {
			throw new \Exception('Cannot transfer to self');
		}
		// Check node exists
		$sourceFolder = $this->rootFolder->getById($fileId)[0];
		// Check source user owns the node
		if ($sourceFolder->getOwner()->getUID() !== $sourceUser->getUID()) {
			throw new NotPermittedException('Cannot move a file you dont own');
		}
		// Check the folder is on persistent lockable storage otherwise we can't do this in the background
		if (!$sourceFolder->getStorage() instanceof IPersistentLockingStorage) {
			throw new \Exception('Source folder storage not lockable');
		}
		// Check therer is no request with the same signature
		if (count($this->requestMapper->findRequestWithSameSignature($sourceUser->getUID(), $destinationUser->getUID(), $fileId)) > 0) {
			// There is
			throw new \Exception('There is already a request to transfer this file/folder');
		}
		// Check we are not trying to request a transfer for a folder that is inside a current request
		$folder = $sourceFolder;
		$fileids = [$folder->getId()];
		while($folder->getPath() !== '/') {
			$folder = $folder->getParent();
			$fileids[] = $folder->getId();
		}
		if (count($this->requestMapper->findOpenRequestForGivenFiles($fileids)) > 0) {
			throw new \Exception('This file/folder is already pending an existing transfer');
		}

		// Create the transfer request object
		$request = new TransferRequest();
		$request->setRequestedTime($this->timeFactory->getTime());
		$request->setSourceUserId($sourceUser->getUID());
		$request->setDestinationUserId($destinationUser->getUID());
		$request->setFileId($fileId);
		$request = $this->requestMapper->insert($request);

		/** @var IPersistentLockingStorage $storage */
		$storage = $sourceFolder->getStorage();
		try {
			$storage->lockNodePersistent($sourceFolder->getInternalPath(), [
				'depth' => ILock::LOCK_DEPTH_INFINITE,
				'token' => $this->getLockTokenFromRequest($request),
				'timeout' => 60*60*2 // 2 hours to allow a cron run
			]);
		} catch (\Exception $e) {
			// Cleanup transfer request and fail
			$this->requestMapper->delete($request);
			throw $e;
		}

		$this->sendRequestNotification($request);
	}

	public function acceptRequest(TransferRequest $request) {
		if ($request->getAcceptedTime() !== null || $request->getActionedTime() !== null || $request->getRejectedTime() !== null) {
			throw new \Exception('Already actioned, accepted or rejected');
		}
		// Create a background job, update accepted time
		$request->setAcceptedTime($this->timeFactory->getTime());
		$this->requestMapper->update($request);
		$sourcePath = $this->rootFolder->getUserFolder(
			$request->getSourceUserId())->getById($request->getFileId())[0]->getInternalPath();
		$this->jobList->add(CommandJob::class, [
			'sourcePath' => $sourcePath,
			'sourceUser' => $request->getSourceUserId(),
			'destinationUser' => $request->getDestinationUserId()
		]);
		$notification = $this->notificationManager->createNotification();
		$notification->setApp('files')
			->setUser($request->getDestinationUserId())
			->setObject('transfer_request', $request->getId());
		$this->notificationManager->markProcessed($notification);
	}

	public function rejectRequest(TransferRequest $request) {
		// Cleanup the lock, save reject timestamp
		if ($request->getAcceptedTime() !== null || $request->getActionedTime() !== null || $request->getRejectedTime() !== null) {
			throw new \Exception('Already actioned, accepted or rejected');
		}
		// Create a background job, update accepted time
		$request->setRejectedTime($this->timeFactory->getTime());
		$this->requestMapper->update($request);
		$notification = $this->notificationManager->createNotification();
		$notification->setApp('files')
			->setUser($request->getDestinationUserId())
			->setObject('transfer_request', $request->getId());
		$this->notificationManager->markProcessed($notification);
		$file = $this->rootFolder->getById($request->getFileId())[0];
		/** @var IPersistentLockingStorage $storage */
		$storage = $file->getStorage();
		$storage->unlockNodePersistent($file->getInternalPath(), ['token' => $this->getLockTokenFromRequest($request)]);
	}

	public function deleteRequest(TransferRequest $request) {
		// Cleanup the lock and the notification
		$this->requestMapper->delete($request);
		$notification = $this->notificationManager->createNotification();
		$notification->setApp('files')
			->setUser($request->getDestinationUserId())
			->setObject('transfer_request', $request->getId());
		$this->notificationManager->markProcessed($notification);
		$file = $this->rootFolder->getById($request->getFileId())[0];
		/** @var IPersistentLockingStorage $storage */
		$storage = $file->getStorage();
		$storage->unlockNodePersistent($file->getInternalPath(), ['token' => $this->getLockTokenFromRequest($request)]);
	}


	/**
	 * @param TransferRequest $request the request object
	 */
	protected function sendRequestNotification(TransferRequest $request) {
		$time = new \DateTime();
		$time->setTimestamp($this->timeFactory->getTime());
		$notification = $this->notificationManager->createNotification();
		$notification->setApp('files')
			->setUser($request->getDestinationUserId())
			->setDateTime($time)
			->setObject('transfer_request', $request->getId());

		$notification->setIcon(
			$this->urlGenerator->imagePath('core', 'actions/give.svg')
		);
		$notification->setLink('test.com');

		$sourceUser = $this->userManager->get($request->getSourceUserId());
		$folder = $this->rootFolder->getById($request->getFileId())[0];
		$notification->setSubject("new_transfer_request");
		$notification->setMessage("new_transfer_request", [$sourceUser->getDisplayName(), $folder->getName(), Util::humanFileSize($folder->getSize())]);

		$endpoint = $this->urlGenerator->linkToRouteAbsolute(
			'files.Transfer.accept',
			['requestId' => $request->getId()]
		);
		$declineAction = $notification->createAction();
		$declineAction->setLabel('reject');
		$declineAction->setLink($endpoint, 'DELETE');
		$notification->addAction($declineAction);

		$acceptAction = $notification->createAction();
		$acceptAction->setLabel('accept');
		$acceptAction->setLink($endpoint, 'POST');
		$acceptAction->setPrimary(true);
		$notification->addAction($acceptAction);

		$this->notificationManager->notify($notification);
	}

	public function prepare(INotification $notification, $languageCode) {
		if ($notification->getApp() !== 'files') {
			throw new \InvalidArgumentException();
		}

		// Read the language from the notification
		$l = $this->factory->get('files', $languageCode);

		switch ($notification->getObjectType()) {
			case 'transfer_request':
				$requestId = $notification->getObjectId();
				try {
					$this->requestMapper->findById($requestId);
				} catch (DoesNotExistException $ex) {
					$this->notificationManager->markProcessed($notification);
					throw new \InvalidArgumentException();
				}
				return $this->formatNotification($notification, $l);

			default:
				throw new \InvalidArgumentException();
		}
	}

	protected function formatNotification(INotification $notification, IL10N $l) {
		$notification->setParsedSubject((string) $l->t('A user would like to transfer a folder to you'));

		$notification->setParsedMessage(
			(string) $l->t(
				'"%1$s" requested to transfer "%2$s" to you (%3$s)"',
				$notification->getMessageParameters())
		);

		foreach ($notification->getActions() as $action) {
			switch ($action->getLabel()) {
				case 'accept':
					$action->setParsedLabel(
						(string) $l->t('Accept')
					);
					break;
				case 'reject':
					$action->setParsedLabel(
						(string) $l->t('Decline')
					);
					break;
			}
			$notification->addParsedAction($action);
		}

		return $notification;
	}

	public function cleanup() {
		// Delete request that are older than 24 hours
		$oldRequests = $this->requestMapper->findOpenRequestsOlderThan(1);
		/** @var TransferRequest $request */
		foreach ($oldRequests as $request) {
			// Remove the lock
			try {
				$file = $this->rootFolder->getById($request->getFileId())[0];
				/** @var IPersistentLockingStorage $storage */
				$storage = $file->getStorage();
				$storage->unlockNodePersistent($file->getInternalPath(), $this->getLockTokenFromRequest($request));
			} catch (\Exception $e) {
				\OC::$server->getLogger()->logException($e, ['app' => 'files']);
			}
			// Now remove the request
			$this->requestMapper->delete($request);
			// And lets remove the notification to save confusion
			$notification = $this->notificationManager->createNotification();
			$notification->setApp('files')
				->setUser($request->getDestinationUserId())
				->setObject('transfer_request', $request->getId());
			$this->notificationManager->markProcessed($notification);
		}
	}

	protected function getLockTokenFromRequest(TransferRequest $request) {
		return 'transfer-request-'.$request->getId();
	}

	public function getRequestById($requestId) {
		return $this->requestMapper->findById($requestId);
	}


}