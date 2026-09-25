<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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

namespace OCA\DAV\CardDAV;

use OCP\AppFramework\Http;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use Sabre\DAV\Xml\Response\MultiStatus;
use Sabre\DAV\Xml\Service;
use Sabre\HTTP\ClientHttpException;
use Sabre\VObject\Reader;

class SyncService {
	/** @var CardDavBackend */
	private $backend;

	/** @var IUserManager */
	private $userManager;

	/** @var ILogger */
	private $logger;

	/** @var array */
	private $localSystemAddressBook;

	public function __construct(CardDavBackend $backend, IUserManager $userManager, ILogger $logger) {
		$this->backend = $backend;
		$this->userManager = $userManager;
		$this->logger = $logger;
	}

	/**
	 * @param string $url
	 * @param string $userName
	 * @param string $sharedSecret
	 * @param string $syncToken
	 * @param int $targetBookId
	 * @param string $targetPrincipal
	 * @param array $targetProperties
	 * @return string
	 * @throws \Exception
	 */
	public function syncRemoteAddressBook($url, $userName, $sharedSecret, $syncToken, $targetBookId, $targetPrincipal, $targetProperties) {
		// 1. create addressbook
		$book = $this->ensureSystemAddressBookExists($targetPrincipal, $targetBookId, $targetProperties);
		$addressBookId = $book['id'];

		// 2. query changes
		try {
			$response = $this->requestSyncReport($url, $userName, $sharedSecret, $syncToken);
		} catch (ClientHttpException $ex) {
			if ($ex->getCode() === Http::STATUS_UNAUTHORIZED) {
				// remote server revoked access to the address book, remove it
				$this->backend->deleteAddressBook($addressBookId);
				$this->logger->info('Authorization failed, remove address book: ' . $url, ['app' => 'dav']);
				throw $ex;
			}
		}

		// 3. apply changes
		// TODO: use multi-get for download
		// Note that a skipped resource is skipped for good: the sync token below
		// still advances, and a sync-collection report only reports a resource
		// once per token, so it is not offered again. That is the right outcome
		// for a resource which does not belong to the server reporting it.
		foreach ($response['response'] as $resource => $status) {
			// The href is text the server chose, and xml text keeps literal
			// newlines, so it must not reach the log as it arrived.
			$reported = TrustedServerClient::forLog($resource);
			// An href has no business carrying control characters, and a
			// character reference survives the parser's line-ending handling,
			// so they can arrive as real control bytes. Sanitising for the log
			// is not enough: the raw value is what reaches curl, and what
			// basename() would store as the card uri and we would serve back to
			// our own clients. Reject it outright.
			if (\preg_match('/[\x00-\x1f\x7f]/', (string)$resource) === 1) {
				$this->logger->warning(
					"Ignoring resource \"$reported\" reported by trusted server $url: contains control characters",
					['app' => 'dav']
				);
				continue;
			}
			if (!TrustedServerClient::isSameOrigin($url, (string)$resource)) {
				$this->logger->warning(
					"Ignoring resource \"$reported\" reported by trusted server $url: not on the trusted server",
					['app' => 'dav']
				);
				continue;
			}
			$cardUri = \basename($resource);
			// '.' and '..' pass the origin check - resolve() normalises them
			// away - but name no card. Storing one would leave a row our own
			// clients resolve to the collection itself, so it could never be
			// addressed or deleted again.
			if ($cardUri === '' || $cardUri === '.' || $cardUri === '..') {
				$this->logger->warning(
					"Ignoring resource \"$reported\" reported by trusted server $url: no usable card name",
					['app' => 'dav']
				);
				continue;
			}
			if (isset($status[200])) {
				$vCard = $this->download($url, $sharedSecret, $resource);
				$existingCard = $this->backend->getCard($addressBookId, $cardUri);
				if ($existingCard === false) {
					$this->backend->createCard($addressBookId, $cardUri, $vCard['body']);
				} else {
					$this->backend->updateCard($addressBookId, $cardUri, $vCard['body']);
				}
			} else {
				$this->backend->deleteCard($addressBookId, $cardUri);
			}
		}

		return $response['token'];
	}

	/**
	 * @param string $principal
	 * @param string $id
	 * @param array $properties
	 * @return array|null
	 * @throws \Sabre\DAV\Exception\BadRequest
	 */
	public function ensureSystemAddressBookExists($principal, $id, $properties) {
		$book = $this->backend->getAddressBooksByUri($principal, $id);
		if ($book !== null) {
			return $book;
		}
		$this->backend->createAddressBook($principal, $id, $properties);

		return $this->backend->getAddressBooksByUri($principal, $id);
	}

	/**
	 * @param string $url
	 * @param string $userName
	 * @param string $sharedSecret
	 * @param string $syncToken
	 * @return array
	 */
	protected function requestSyncReport($url, $userName, $sharedSecret, $syncToken) {
		$settings = [
			'baseUri' => $url . '/',
			'userName' => $userName,
			'password' => $sharedSecret,
		];
		$client = new TrustedServerClient($settings, $url);
		$client->setThrowExceptions(true);

		$addressBookUrl = "remote.php/dav/addressbooks/system/system/system";
		$body = $this->buildSyncCollectionRequestBody($syncToken);

		$response = $client->request('REPORT', $addressBookUrl, $body, [
			'Content-Type' => 'application/xml'
		]);

		$result = $this->parseMultiStatus($response['body']);

		return $result;
	}

	/**
	 * @param string $url
	 * @param string $sharedSecret
	 * @param string $resourcePath
	 * @return array
	 */
	protected function download($url, $sharedSecret, $resourcePath) {
		$settings = [
			'baseUri' => $url,
			'userName' => 'system',
			'password' => $sharedSecret,
		];
		$client = new TrustedServerClient($settings, $url);
		$client->setThrowExceptions(true);

		$response = $client->request('GET', $resourcePath);
		return $response;
	}

	/**
	 * @param string|null $syncToken
	 * @return string
	 */
	private function buildSyncCollectionRequestBody($syncToken) {
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$dom->formatOutput = true;
		$root = $dom->createElementNS('DAV:', 'd:sync-collection');
		$sync = $dom->createElement('d:sync-token', $syncToken);
		$prop = $dom->createElement('d:prop');
		$cont = $dom->createElement('d:getcontenttype');
		$etag = $dom->createElement('d:getetag');

		$prop->appendChild($cont);
		$prop->appendChild($etag);
		$root->appendChild($sync);
		$root->appendChild($prop);
		$dom->appendChild($root);
		$body = $dom->saveXML();

		return $body;
	}

	/**
	 * @param string $body
	 * @return array
	 * @throws \Sabre\Xml\ParseException
	 */
	private function parseMultiStatus($body) {
		$xml = new Service();

		/** @var MultiStatus $multiStatus */
		$multiStatus = $xml->expect('{DAV:}multistatus', $body);

		$result = [];
		/** @phan-suppress-next-line PhanNonClassMethodCall */
		foreach ($multiStatus->getResponses() as $response) {
			$result[$response->getHref()] = $response->getResponseProperties();
		}

		/** @phan-suppress-next-line PhanNonClassMethodCall */
		return ['response' => $result, 'token' => $multiStatus->getSyncToken()];
	}

	/**
	 * @param IUser $user
	 */
	public function updateUser($user) {
		$systemAddressBook = $this->getLocalSystemAddressBook();
		$addressBookId = $systemAddressBook['id'];
		$converter = new Converter();
		$name = $user->getBackendClassName();
		$userId = $user->getUID();

		$cardId = "$name:$userId.vcf";
		$card = $this->backend->getCard($addressBookId, $cardId);
		if ($card === false) {
			$vCard = $converter->createCardFromUser($user);
			$this->backend->createCard($addressBookId, $cardId, $vCard->serialize());
		} else {
			$vCard = Reader::read($card['carddata']);
			if ($converter->updateCard($vCard, $user)) {
				$this->backend->updateCard($addressBookId, $cardId, $vCard->serialize());
			}
		}
	}

	/**
	 * @param IUser|string $userOrCardId
	 */
	public function deleteUser($userOrCardId) {
		$systemAddressBook = $this->getLocalSystemAddressBook();
		if ($userOrCardId instanceof IUser) {
			$name = $userOrCardId->getBackendClassName();
			$userId = $userOrCardId->getUID();

			$userOrCardId = "$name:$userId.vcf";
		}
		$this->backend->deleteCard($systemAddressBook['id'], $userOrCardId);
	}

	/**
	 * Delete the card owned by the user if the userId is unique
	 * Returns:
	 *   - true if the card is deleted (the user was unique)
	 *   - false if there are 2 or more cards found with the same uid
	 *   - null if no card was found with that uid
	 * @param string $userId the user Id
	 * @return bool|null
	 */
	public function deleteUserByUidIfUnique($userId) {
		$systemAddressBook = $this->getLocalSystemAddressBook();
		$contacts = $this->backend->searchEx(
			$systemAddressBook['id'],
			$userId,
			['UID'],
			['matchMode' => 'EXACT'],
			2
		);

		$contactsFound = \count($contacts);
		switch ($contactsFound) {
			case 1:
				// if there is only one contact found, delete it
				$this->backend->deleteCard($systemAddressBook['id'], $contacts[0]['uri']);
				return true;
			case 2:
				// if there are 2 or more (search was limited to 2 results), do nothing and return false
				return false;
		}
	}

	/**
	 * @return array|null
	 */
	public function getLocalSystemAddressBook() {
		if ($this->localSystemAddressBook === null) {
			$systemPrincipal = "principals/system/system";
			$this->localSystemAddressBook = $this->ensureSystemAddressBookExists($systemPrincipal, 'system', [
				'{' . Plugin::NS_CARDDAV . '}addressbook-description' => 'System addressbook which holds all users of this instance'
			]);
		}

		return $this->localSystemAddressBook;
	}

	public function syncInstance(\Closure $progressCallback = null) {
		$systemAddressBook = $this->getLocalSystemAddressBook();
		$this->userManager->callForAllUsers(function ($user) use ($progressCallback) {
			$this->updateUser($user);
			if ($progressCallback !== null) {
				$progressCallback();
			}
		});

		// remove no longer existing
		$allCards = $this->backend->getCards($systemAddressBook['id']);
		foreach ($allCards as $card) {
			$vCard = Reader::read($card['carddata']);
			$uid = $vCard->UID->getValue();
			// load backend and see if user exists
			if (!$this->userManager->userExists($uid)) {
				$this->deleteUser($card['uri']);
			}
		}
	}
}
