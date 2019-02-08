<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
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

namespace Test\Notification;

use OC\Notification\Manager;
use OCP\Notification\IManager;
use OCP\Notification\IApp;
use OCP\Notification\INotifier;
use OCP\Notification\INotification;
use OCP\Notification\Events\RegisterConsumerEvent;
use OCP\Notification\Events\RegisterNotifierEvent;
use OCP\Notification\Exceptions\NotifierIdInUseException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;

class ManagerTest extends TestCase {
	/** @var IManager */
	protected $manager;
	/** @var EventDispatcherInterface */
	protected $eventDispatcher;

	public function setUp() {
		parent::setUp();

		$eventMap = [];
		$this->eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->eventDispatcher->method('addListener')
			->will($this->returnCallback(function ($eventName, $callable, $priority) use (&$eventMap) {
				if (!isset($eventMap[$eventName])) {
					$eventMap[$eventName] = [];
				}
				// ignore priority for now
				$eventMap[$eventName][] = $callable;
			}));
		$this->eventDispatcher->method('dispatch')
			->will($this->returnCallback(function ($eventName, $event) use (&$eventMap) {
				if (isset($eventMap[$eventName])) {
					foreach ($eventMap[$eventName] as $callable) {
						$callable($event);
					}
				}
				return $event;
			}));

		$this->manager = new Manager($this->eventDispatcher);
	}

	public function testRegisterApp() {
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($app) {
			return $app;
		};

		$this->assertEquals([], $this->invokePrivate($this->manager, 'getApps'));

		$this->manager->registerApp($closure);

		$this->assertEquals([$app], $this->invokePrivate($this->manager, 'getApps'));
		$this->assertEquals([$app], $this->invokePrivate($this->manager, 'getApps'));

		$this->manager->registerApp($closure);

		$this->assertEquals([$app, $app], $this->invokePrivate($this->manager, 'getApps'));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testRegisterAppInvalid() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($notifier) {
			return $notifier;
		};

		$this->manager->registerApp($closure);

		$this->invokePrivate($this->manager, 'getApps');
	}

	public function testRegisterAppNew() {
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$this->eventDispatcher->addListener(RegisterConsumerEvent::NAME,
				function (RegisterConsumerEvent $event) use ($app, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotificationConsumer($app);
				});

		$apps = $this->invokePrivate($this->manager, 'getApps');
		$this->assertEquals([$app], $apps);
		$this->assertSame($app, $apps[0]);
		$this->assertEquals(1, $callbackCalledCount);

		// second call returns the same info and doesn't trigger the event again
		$apps = $this->invokePrivate($this->manager, 'getApps');
		$this->assertEquals([$app], $apps);
		$this->assertSame($app, $apps[0]);
		$this->assertEquals(1, $callbackCalledCount);
	}

	public function testRegisterNotifier() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($notifier) {
			return $notifier;
		};

		$this->assertEquals([], $this->invokePrivate($this->manager, 'getNotifiers'));
		$this->assertEquals([], $this->invokePrivate($this->manager, 'listNotifiers'));

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->assertEquals([$notifier], $this->invokePrivate($this->manager, 'getNotifiers'));
		$this->assertEquals(['test1' => 'Test One'], $this->invokePrivate($this->manager, 'listNotifiers'));
		$this->assertEquals([$notifier], $this->invokePrivate($this->manager, 'getNotifiers'));
		$this->assertEquals(['test1' => 'Test One'], $this->invokePrivate($this->manager, 'listNotifiers'));

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'test2', 'name' => 'Test Two'];
		});

		$this->assertEquals([$notifier, $notifier], $this->invokePrivate($this->manager, 'getNotifiers'));
		$this->assertEquals(['test1' => 'Test One', 'test2' => 'Test Two'], $this->invokePrivate($this->manager, 'listNotifiers'));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testRegisterNotifierInvalid() {
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($app) {
			return $app;
		};

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->invokePrivate($this->manager, 'getNotifiers');
	}

	public function dataRegisterNotifierInfoInvalid() {
		return [
			[null],
			['No array'],
			[['id' => 'test1', 'name' => 'Test One', 'size' => 'Invalid']],
			[['no-id' => 'test1', 'name' => 'Test One']],
			[['id' => 'test1', 'no-name' => 'Test One']],
		];
	}

	/**
	 * @dataProvider dataRegisterNotifierInfoInvalid
	 * @expectedException \InvalidArgumentException
	 * @param mixed $data
	 */
	public function testRegisterNotifierInfoInvalid($data) {
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($app) {
			return $app;
		};

		$this->manager->registerNotifier($closure, function () use ($data) {
			return $data;
		});

		$this->manager->listNotifiers();
	}

	/**
	 * @expectedException \InvalidArgumentException
	 * @expectedExceptionMessage The given notifier ID test1 is already in use
	 */
	public function testRegisterNotifierInfoDuplicate() {
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($app) {
			return $app;
		};

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->manager->listNotifiers();
	}

	public function testRegisterNotifierNew() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals([$notifier], $notifiers);
		$this->assertSame($notifier, $notifiers[0]);
		$this->assertEquals(1, $callbackCalledCount);

		// second call returns the same info and doesn't trigger the event again
		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals([$notifier], $notifiers);
		$this->assertSame($notifier, $notifiers[0]);
		$this->assertEquals(1, $callbackCalledCount);
	}

	public function testRegisterNotifierNewListingVersion() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$notifiersInfo = $this->manager->listNotifiers();
		$this->assertEquals(['testid1' => 'test app name'], $notifiersInfo);
		$this->assertEquals(1, $callbackCalledCount);

		// second call returns the same info and doesn't trigger the event again
		$notifiersInfo = $this->manager->listNotifiers();
		$this->assertEquals(['testid1' => 'test app name'], $notifiersInfo);
		$this->assertEquals(1, $callbackCalledCount);
	}

	public function testRegisterNotifierNewGetPlusList() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals([$notifier], $notifiers);
		$this->assertSame($notifier, $notifiers[0]);
		$this->assertEquals(1, $callbackCalledCount);

		$notifiersInfo = $this->manager->listNotifiers();
		$this->assertEquals(['testid1' => 'test app name'], $notifiersInfo);
		$this->assertEquals(2, $callbackCalledCount);  // expected to trigger another event

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals([$notifier], $notifiers);
		$this->assertSame($notifier, $notifiers[0]);
		$this->assertEquals(2, $callbackCalledCount);  // this second call should remain the same
	}

	/**
	 * @expectedException \OCP\Notification\Exceptions\NotifierIdInUseException
	 */
	public function testRegisterNotifierNewDuplicatedId() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$notifier2 = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$callbackCalledCount2 = 0;

		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier2, &$callbackCalledCount2) {
					$callbackCalledCount2++;
					$event->registerNotifier($notifier2, 'testid1', 'test app name');
				});

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals(1, $callbackCalledCount);
		$this->assertEquals(1, $callbackCalledCount2);
	}

	/**
	 * @expected \OCP\Notification\Exceptions\NotifierIdInUseException
	 */
	public function testRegisterNotifierNewDuplicatedIdCompatibleWithOld() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$notifier2 = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$closure = function () use ($notifier) {
			return $notifier;
		};

		$callbackCalledCount = 0;

		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$this->manager->registerNotifier($closure, function () {
			return ['id' => 'testid1', 'name' => 'test app name'];
		});

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals(1, $callbackCalledCount);
	}

	public function testRegisterNotifierNewDuplicatedIdSwallowException() {
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$notifier2 = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();

		$callbackCalledCount = 0;
		$callbackCalledCount2 = 0;
		$swallowedException = false;

		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier, &$callbackCalledCount) {
					$callbackCalledCount++;
					$event->registerNotifier($notifier, 'testid1', 'test app name');
				});

		$this->eventDispatcher->addListener(RegisterNotifierEvent::NAME,
				function (RegisterNotifierEvent $event) use ($notifier2, &$callbackCalledCount2, &$swallowedException) {
					$callbackCalledCount2++;
					try {
						$event->registerNotifier($notifier2, 'testid1', 'test app name');
					} catch (NotifierIdInUseException $ex) {
						$swallowedException = true;
					}
				});

		$notifiers = $this->invokePrivate($this->manager, 'getNotifiers');
		$this->assertEquals(1, $callbackCalledCount);
		$this->assertEquals(1, $callbackCalledCount2);
		$this->assertTrue($swallowedException);
		$this->assertEquals([$notifier], $notifiers);
		$this->assertSame($notifier, $notifiers[0]);
	}

	public function testCreateNotification() {
		$action = $this->manager->createNotification();
		$this->assertInstanceOf(INotification::class, $action);
	}

	public function testNotify() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValid')
			->willReturn(true);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app */
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app->expects($this->once())
			->method('notify')
			->with($notification);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app2 */
		$app2 = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app2->expects($this->once())
			->method('notify')
			->with($notification);

		$this->manager->registerApp(function () use ($app) {
			return $app;
		});
		$this->manager->registerApp(function () use ($app2) {
			return $app2;
		});

		$this->manager->notify($notification);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testNotifyInvalid() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValid')
			->willReturn(false);

		$this->manager->notify($notification);
	}

	public function testPrepare() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValidParsed')
			->willReturn(true);
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification2 */
		$notification2 = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification2->expects($this->exactly(2))
			->method('isValidParsed')
			->willReturn(true);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $notifier */
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();
		$notifier->expects($this->once())
			->method('prepare')
			->with($notification, 'en')
			->willReturnArgument(0);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $notifier2 */
		$notifier2 = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();
		$notifier2->expects($this->once())
			->method('prepare')
			->with($notification, 'en')
			->willReturn($notification2);

		$this->manager->registerNotifier(function () use ($notifier) {
			return $notifier;
		}, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});
		$this->manager->registerNotifier(function () use ($notifier2) {
			return $notifier2;
		}, function () {
			return ['id' => 'test2', 'name' => 'Test Two'];
		});

		$this->assertEquals($notification2, $this->manager->prepare($notification, 'en'));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareInvalid() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValidParsed')
			->willReturn(false);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $notifier */
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();
		$notifier->expects($this->once())
			->method('prepare')
			->with($notification, 'de')
			->willReturnArgument(0);

		$this->manager->registerNotifier(function () use ($notifier) {
			return $notifier;
		}, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->manager->prepare($notification, 'de');
	}

	public function testPrepareNotifierThrows() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValidParsed')
			->willReturn(true);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $notifier */
		$notifier = $this->getMockBuilder(INotifier::class)
			->disableOriginalConstructor()
			->getMock();
		$notifier->expects($this->once())
			->method('prepare')
			->with($notification, 'de')
			->willThrowException(new \InvalidArgumentException);

		$this->manager->registerNotifier(function () use ($notifier) {
			return $notifier;
		}, function () {
			return ['id' => 'test1', 'name' => 'Test One'];
		});

		$this->assertEquals($notification, $this->manager->prepare($notification, 'de'));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareNoNotifier() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();
		$notification->expects($this->once())
			->method('isValidParsed')
			->willReturn(false);

		$this->manager->prepare($notification, 'en');
	}

	public function testMarkProcessed() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app */
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app->expects($this->once())
			->method('markProcessed')
			->with($notification);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app2 */
		$app2 = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app2->expects($this->once())
			->method('markProcessed')
			->with($notification);

		$this->manager->registerApp(function () use ($app) {
			return $app;
		});
		$this->manager->registerApp(function () use ($app2) {
			return $app2;
		});

		$this->manager->markProcessed($notification);
	}

	public function testGetCount() {
		/** @var \OCP\Notification\INotification|\PHPUnit_Framework_MockObject_MockObject $notification */
		$notification = $this->getMockBuilder(INotification::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app */
		$app = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app->expects($this->once())
			->method('getCount')
			->with($notification)
			->willReturn(21);

		/** @var \OCP\Notification\IApp|\PHPUnit_Framework_MockObject_MockObject $app2 */
		$app2 = $this->getMockBuilder(IApp::class)
			->disableOriginalConstructor()
			->getMock();
		$app2->expects($this->once())
			->method('getCount')
			->with($notification)
			->willReturn(42);

		$this->manager->registerApp(function () use ($app) {
			return $app;
		});
		$this->manager->registerApp(function () use ($app2) {
			return $app2;
		});

		$this->assertSame(63, $this->manager->getCount($notification));
	}
}
