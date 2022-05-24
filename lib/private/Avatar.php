<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Olivier Mehani <shtrom@ssji.net>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC;

use OC\Files\Storage\File;
use OC\User\User;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\Files\StorageNotAvailableException;
use OCP\IAvatar;
use OCP\IImage;
use OCP\IL10N;
use OC_Image;
use OCP\ILogger;

/**
 * This class gets and sets users avatars.
 */

class Avatar implements IAvatar {
	/** @var IStorage */
	private $storage;
	/** @var IL10N */
	private $l;
	/** @var User */
	private $user;
	/** @var ILogger  */
	private $logger;
	/** @var string */
	private $path;

	/**
	 * constructor
	 *
	 * @param IStorage $storage The storage where the avatars are
	 * @param IL10N $l
	 * @param User $user
	 * @param ILogger $logger
	 */
	public function __construct(IStorage $storage, IL10N $l, User $user, ILogger $logger) {
		$this->storage = $storage;
		$this->l = $l;
		$this->user = $user;
		$this->logger = $logger;
		$this->path = $this->buildAvatarPath();
	}

	private function buildAvatarPath() {
		return 'avatars/' . \substr_replace(\substr_replace(\md5($this->user->getUID()), '/', 4, 0), '/', 2, 0);
	}

	/**
	 * @inheritdoc
	 */
	public function get($size = 64) {
		try {
			$file = $this->getFile($size);
		} catch (NotFoundException $e) {
			return false;
		}

		$avatar = new OC_Image();
		$avatar->loadFromData($file->getContent());
		return $avatar;
	}

	/**
	 * Check if an avatar exists for the user
	 *
	 * @return bool
	 */
	public function exists() {
		try {
			return $this->storage->file_exists("{$this->path}/avatar.jpg")
				|| $this->storage->file_exists("{$this->path}/avatar.png");
		} catch (StorageNotAvailableException $e) {
			return false;
		}
	}

	/**
	 * sets the users avatar
	 * @param IImage|resource|string $data An image object, imagedata or path to set a new avatar
	 * @throws \Exception if the provided file is not a jpg or png image
	 * @throws \Exception if the provided image is not valid
	 * @throws NotSquareException if the image is not square
	 * @return void
	*/
	public function set($data) {
		if ($data instanceof IImage) {
			$img = $data;
			$data = $img->data();
		} else {
			$img = new OC_Image($data);
		}
		$type = \substr($img->mimeType(), -3);
		if ($type === 'peg') {
			$type = 'jpg';
		}
		if ($type !== 'jpg' && $type !== 'png') {
			throw new \Exception($this->l->t('Unknown filetype'));
		}

		if (!$img->valid()) {
			throw new \Exception($this->l->t('Invalid image'));
		}

		if (!($img->height() === $img->width())) {
			throw new NotSquareException($this->l->t('Avatar image is not square'));
		}

		$this->remove();
		if (!$this->storage->mkdir($this->path)) {
			$this->logger->error("Could not create {$this->path} for {$this->user->getUID()}");
		}
		$path = "$this->path/avatar.$type";
		if ($this->storage->file_put_contents($path, $data) === false) {
			$this->logger->error("Failed to save resized avatar for {$this->user->getUID()} to $path");
		}
		$this->user->triggerChange('avatar');
	}

	/**
	 * remove the users avatars
	*/
	public function remove() {
		$this->storage->rmdir($this->path);
		$this->user->triggerChange('avatar');
	}

	/**
	 * @inheritdoc
	 */
	public function getFile($size) {
		$ext = $this->getExtension();

		$basePath = "{$this->path}/avatar.$ext";

		if ($size === -1) {
			$resizedPath = $basePath;
		} else {
			$resizedPath = "{$this->path}/avatar.$size.$ext";
		}
		// do we have the requested size?
		if (!$this->storage->file_exists($resizedPath)) {
			if ($size <= 0) {
				throw new NotFoundException($resizedPath);
			}
			// do we have a base image?
			if (!$this->storage->file_exists($basePath)) {
				throw new NotFoundException($basePath);
			}
			// resize!
			$avatar = new OC_Image();
			$data = $this->storage->file_get_contents($basePath);
			$avatar->loadFromData($data);
			if ($size !== -1) {
				$avatar->resize($size);
			}
			$result = $this->storage->file_put_contents($resizedPath, $avatar->data());
			if ($result === false) {
				$this->logger->error("Failed to save resized avatar for {$this->user->getUID()} to $resizedPath");
			}
		}

		return new File($this->storage, $resizedPath);
	}

	/**
	 * Get the extension of the avatar. If there is no avatar throw Exception
	 *
	 * @return string
	 * @throws NotFoundException
	 * @throws StorageNotAvailableException
	 */
	private function getExtension() {
		if ($this->storage->file_exists("{$this->path}/avatar.jpg")) {
			return 'jpg';
		}
		if ($this->storage->file_exists("{$this->path}/avatar.png")) {
			return 'png';
		}
		throw new NotFoundException("{$this->path}/avatar.jpg|png");
	}
}
