<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OC\Notification;


use OCP\Notification\IApp;
use OCP\Notification\IManager;
use OCP\Notification\INotification;
use OCP\Notification\INotifier;
use OCP\Notification\Exceptions\IncompleteSerializationException;
use OCP\Notification\Exceptions\IncompleteDeserializationException;
use OCP\Notification\Exceptions\CannotDeserializeException;

class Manager implements IManager {
	/** @var IApp[] */
	protected $apps;

	/** @var INotifier */
	protected $notifiers;

	/** @var array[] */
	protected $notifiersInfo;

	/** @var \Closure[] */
	protected $appsClosures;

	/** @var \Closure[] */
	protected $notifiersClosures;

	/** @var \Closure[] */
	protected $notifiersInfoClosures;

	public function __construct() {
		$this->apps = [];
		$this->notifiers = [];
		$this->notifiersInfo = [];
		$this->appsClosures = [];
		$this->notifiersClosures = [];
		$this->notifiersInfoClosures = [];
	}

	/**
	 * @param \Closure $service The service must implement IApp, otherwise a
	 *                          \InvalidArgumentException is thrown later
	 * @return null
	 * @since 8.2.0
	 */
	public function registerApp(\Closure $service) {
		$this->appsClosures[] = $service;
		$this->apps = [];
	}

	/**
	 * @param \Closure $service The service must implement INotifier, otherwise a
	 *                          \InvalidArgumentException is thrown later
	 * @param \Closure $info    An array with the keys 'id' and 'name' containing
	 *                          the app id and the app name
	 * @return null
	 * @since 8.2.0 - Parameter $info was added in 9.0.0
	 */
	public function registerNotifier(\Closure $service, \Closure $info) {
		$this->notifiersClosures[] = $service;
		$this->notifiersInfoClosures[] = $info;
		$this->notifiers = [];
		$this->notifiersInfo = [];
	}

	/**
	 * @return IApp[]
	 */
	protected function getApps() {
		if (!empty($this->apps)) {
			return $this->apps;
		}

		$this->apps = [];
		foreach ($this->appsClosures as $closure) {
			$app = $closure();
			if (!($app instanceof IApp)) {
				throw new \InvalidArgumentException('The given notification app does not implement the IApp interface');
			}
			$this->apps[] = $app;
		}

		return $this->apps;
	}

	/**
	 * @return INotifier[]
	 */
	protected function getNotifiers() {
		if (!empty($this->notifiers)) {
			return $this->notifiers;
		}

		$this->notifiers = [];
		foreach ($this->notifiersClosures as $closure) {
			$notifier = $closure();
			if (!($notifier instanceof INotifier)) {
				throw new \InvalidArgumentException('The given notifier does not implement the INotifier interface');
			}
			$this->notifiers[] = $notifier;
		}

		return $this->notifiers;
	}

	/**
	 * @return array[]
	 */
	public function listNotifiers() {
		if (!empty($this->notifiersInfo)) {
			return $this->notifiersInfo;
		}

		$this->notifiersInfo = [];
		foreach ($this->notifiersInfoClosures as $closure) {
			$notifier = $closure();
			if (!is_array($notifier) || sizeof($notifier) !== 2 || !isset($notifier['id']) || !isset($notifier['name'])) {
				throw new \InvalidArgumentException('The given notifier information is invalid');
			}
			if (isset($this->notifiersInfo[$notifier['id']])) {
				throw new \InvalidArgumentException('The given notifier ID ' . $notifier['id'] . ' is already in use');
			}
			$this->notifiersInfo[$notifier['id']] = $notifier['name'];
		}

		return $this->notifiersInfo;
	}

	/**
	 * @return INotification
	 * @since 8.2.0
	 */
	public function createNotification() {
		return new Notification();
	}

	/**
	 * @return bool
	 * @since 8.2.0
	 */
	public function hasNotifiers() {
		return !empty($this->notifiersClosures);
	}

	/**
	 * @param INotification $notification
	 * @return null
	 * @throws \InvalidArgumentException When the notification is not valid
	 * @since 8.2.0
	 */
	public function notify(INotification $notification) {
		if (!$notification->isValid()) {
			throw new \InvalidArgumentException('The given notification is invalid');
		}

		$apps = $this->getApps();

		foreach ($apps as $app) {
			try {
				$app->notify($notification);
			} catch (\InvalidArgumentException $e) {
			}
		}
	}

	/**
	 * @param INotification $notification
	 * @param string $languageCode The code of the language that should be used to prepare the notification
	 * @return INotification
	 * @throws \InvalidArgumentException When the notification was not prepared by a notifier
	 * @since 8.2.0
	 */
	public function prepare(INotification $notification, $languageCode) {
		$notifiers = $this->getNotifiers();

		foreach ($notifiers as $notifier) {
			try {
				$notification = $notifier->prepare($notification, $languageCode);
			} catch (\InvalidArgumentException $e) {
				continue;
			}

			if (!($notification instanceof INotification) || !$notification->isValidParsed()) {
				throw new \InvalidArgumentException('The given notification has not been handled');
			}
		}

		if (!($notification instanceof INotification) || !$notification->isValidParsed()) {
			throw new \InvalidArgumentException('The given notification has not been handled');
		}

		return $notification;
	}

	/**
	 * @param INotification $notification
	 * @return null
	 */
	public function markProcessed(INotification $notification) {
		$apps = $this->getApps();

		foreach ($apps as $app) {
			$app->markProcessed($notification);
		}
	}

	/**
	 * @param INotification $notification
	 * @return int
	 */
	public function getCount(INotification $notification) {
		$apps = $this->getApps();

		$count = 0;
		foreach ($apps as $app) {
			$count += $app->getCount($notification);
		}

		return $count;
	}

	/**
	 * @param INotification $notification the notification to be serialized
	 * @param bool $forceIncomplete whether this method should serialize a INotification instance with
	 * incomplete data or throw an exception if the notification isn't complete
	 * @return string a json string with the all the data
	 * @throws \OCP\Notification\Exceptions\IncompleteSerializationException if the notification
	 * doesn't * have all the required fields for the notification AND the $forceIncomplete flag
	 * isn't true. This exception musn't be thrown if the $forceIncomplete flag is true.
	 */
	public function serializeNotification(INotification $notification, $forceIncomplete = false) {
		// make sure signature of these methods are the expected ones
		$mandatoryFields = [
			'app' => 'getApp',
			'user' => 'getUser',
			'dateTime' => 'getDateTime',  // requires special handling
			'message' => 'getMessage',
		];
		$optionalFields = [
			'objectType' => 'getObjectType',
			'objectId' => 'getObjectId',
			'subject' => 'getSubject',
			'subjectParameters' => 'getSubjectParameters',
			'messageParameters' => 'getMessageParameters',
			'link' => 'getLink',
			'icon' => 'getIcon',
		];
		$actionFields = [
			'label' => 'getLabel',
			'requestType' => 'getRequestType',
			'link' => 'getLink',
			'primary' => 'isPrimary',
		];

		$dummyNotification = $this->createNotification();
		foreach ($mandatoryFields as $field => $fieldMethod) {
			if ($dummyNotification->$fieldMethod() === $notification->$fieldMethod()) {
				// one of the mandatory fields didn't change => missing important data
				if (!$forceIncomplete) {
					throw new IncompleteSerializationException('mandatory fields not set or using the default values');
				}
				// TODO: Log something if forcing for tracking.
			}
		}

		// start the serialization
		// serialize the actions
		$serializedActions = [];
		$actions = $notification->getActions();
		foreach ($actions as $action) {
			$newSerializedAction = [];
			foreach ($actionFields as $field => $fieldMethod) {
				$newSerializedAction[$field] = $action->$fieldMethod();
			}
			$serializedActions[] = $newSerializedAction;
		}

		// serialize the notification
		$serializedNotification = [];
		$allFields = $mandatoryFields + $optionalFields;  // disjoint sets shouldn't be problematic
		foreach ($allFields as $field => $fieldMethod) {
			if ($field === 'dateTime') {
				$serializedNotification[$field] = $notification->$fieldMethod()->getTimestamp();
			} else {
				$serializedNotification[$field] = $notification->$fieldMethod();
			}
		}

		// add the actions
		$serializedNotification['actions'] = $serializedActions;

		return json_encode($serializedNotification);
	}

	/**
	 * @param string $serialNotification the serialized notification coming from the
	 * serializeNotification() method
	 * @param bool $forceIncomplete whether this method should return a INotification instance with
	 * incomplete data or throw an exception if the notification data isn't complete
	 * @return INotification an INotification object from the serialized data
	 * @throws \OCP\Notification\Exceptions\CannotDeserializeException if the data can't be
	 * deserialized (format not supported, errors during deserialization, etc)
	 * @throws \OCP\Notification\Exceptions\IncompleteDeserializationException if the data doesn't
	 * have all the required fields for the notification AND the $forceIncomplete flag isn't true.
	 * This exception musn't be thrown if the $forceIncomplete flag is true.
	 */
	public function deserializeNotification($serialNotification, $forceIncomplete = false) {
		$deserializedNotification = json_decode($serialNotification, true);
		if ($deserializedNotification === null) {
			$jsonError = json_last_error_msg();
			throw new CannotDeserializeException("cannot deserialize the notification: $jsonError");
		}

		// check mandatory fields
		$mandatoryFields = ['app', 'user', 'dateTime', 'message'];
		$missingMandatoryFields = [];
		foreach ($mandatoryFields as $field) {
			if (!isset($deserializedNotification[$field])) {
				$missingMandatoryFields[] = $field;
			}
		}
		if (!empty($missingMandatoryFields) && !$forceIncomplete) {
			$missingFields = implode(',', $missingMandatoryFields);
			throw new IncompleteDeserializationException("some required fields to deserialize the notification are missing: $missingFields");
		}

		$notificationFields = [
			'app' => 'setApp',
			'user' => 'setUser',
			'dateTime' => 'setDateTime',  // requires special handling
			'objectType+objectId' => 'setObject',
			'subject+subjectParameters' => 'setSubject',
			'message+messageParameters' => 'setMessage',
			'link' => 'setLink',
			'icon' => 'setIcon',
			// actions will be handled separately
		];

		$actionsFields = [
			'label' => 'setLabel',
			'link+requestType' => 'setLink',
			'primary' => 'setPrimary',
		];

		$notification = $this->createNotification();
		foreach ($notificationFields as $field => $fieldMethod) {
			if (strpos($field, '+')) {  // 0 isn't a valid result here.
				// this implies that several fields must be set at the same time
				$multipleFields = explode('+', $field);
				$multipleValues = array_map(function($field) use ($deserializedNotification){
					return (isset($deserializedNotification[$field])) ? $deserializedNotification[$field] : null;
				}, $multipleFields);
				if (in_array(null, $multipleValues, true)) {
					// TODO: Log something
				} else {
					call_user_func_array([$notification, $fieldMethod], $multipleValues);
				}
			} else {
				if (isset($deserializedNotification[$field])) {
					if ($field === 'dateTime') {
						// requires special handling
						$dateTime = new \DateTime();
						$dateTime->setTimestamp($deserializedNotification[$field]);
						$notification->$fieldMethod($dateTime);
					} else {
						$notification->$fieldMethod($deserializedNotification[$field]);
					}
				} else {
					// TODO: Log something
				}
			}
		}

		// handle actions
		$deserializedActions = $deserializedNotification['actions'];
		foreach ($deserializedActions as $deserializedAction) {
			$newAction = $notification->createAction();
			foreach ($actionsFields as $field => $fieldMethod) {
				if (strpos($field, '+')) {  // 0 isn't a valid result here.
					// this implies that several fields must be set at the same time
					$multipleFields = explode('+', $field);
					$multipleValues = array_map(function($field) use ($deserializedAction){
						return (isset($deserializedAction[$field])) ? $deserializedAction[$field] : null;
					}, $multipleFields);
					if (in_array(null, $multipleValues, true)) {
						// TODO: Log something
					} else {
						call_user_func_array([$newAction, $fieldMethod], $multipleValues);
					}
				} else {
					if (isset($deserializedAction[$field])) {
						$newAction->$fieldMethod($deserializedAction[$field]);
					} else {
						// TODO: Log something
					}
				}
			}
			$notification->addAction($newAction);
		}
		return $notification;
	}
}
