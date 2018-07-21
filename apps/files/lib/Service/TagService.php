<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files\Service;
use OC\AppFramework\Middleware\Security\Exceptions\NotLoggedInException;
use OCP\Files\IRootFolder;

/**
 * Service class to manage tags on files.
 */
class TagService {

	/**
	 * @var \OCP\IUserSession
	 */
	private $userSession;

	/**
	 * @var \OCP\ITagManager
	 */
	private $tagManager;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	public function __construct(
		\OCP\IUserSession $userSession,
		\OCP\ITagManager $tagManager,
		IRootFolder $rootFolder
	) {
		$this->userSession = $userSession;
		$this->tagManager = $tagManager;
		$this->rootFolder = $rootFolder;
	}

	/**
	 * Updates the tags of the specified file path.
	 * The passed tags are absolute, which means they will
	 * replace the actual tag selection.
	 *
	 * @param string $path path
	 * @param array $tags array of tags
	 * @return array list of tags
	 * @throws \OCP\Files\NotFoundException if the file does not exist
	 * @throws NotLoggedInException
	 */
	public function updateFileTags($path, $tags) {
		$user = $this->userSession->getUser();
		if ($user === null) {
			throw new NotLoggedInException();
		}
		$fileId = $this->rootFolder->getUserFolder($user->getUID())->get($path)->getId();
		$tagger = $this->tagManager->load('files');

		$currentTags = $tagger->getTagsForObjects([$fileId]);

		if (!empty($currentTags)) {
			$currentTags = \current($currentTags);
		}

		$newTags = \array_diff($tags, $currentTags);
		foreach ($newTags as $tag) {
			$tagger->tagAs($fileId, $tag);
		}
		$deletedTags = \array_diff($currentTags, $tags);
		foreach ($deletedTags as $tag) {
			$tagger->unTag($fileId, $tag);
		}

		// TODO: re-read from tagger to make sure the
		// list is up to date, in case of concurrent changes ?
		return $tags;
	}
}
