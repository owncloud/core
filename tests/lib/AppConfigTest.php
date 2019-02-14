<?php
/**
 * Copyright (c) 2013 Christopher Schäpers <christopher@schaepers.it>
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class AppConfigTest
 *
 * @group DB
 *
 * @package Test
 */
class AppConfigTest extends TestCase {
	/** @var \OCP\IAppConfig */
	protected $appConfig;

	/** @var \OCP\IDBConnection */
	protected $connection;

	protected $originalConfig;

	public function setUp(): void {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$sql = $this->connection->getQueryBuilder();
		$sql->select('*')
			->from('appconfig');
		$result = $sql->execute();
		$this->originalConfig = $result->fetchAll();
		$result->closeCursor();

		$sql = $this->connection->getQueryBuilder();
		$sql->delete('appconfig');
		$sql->execute();

		$this->registerAppConfig(new \OC\AppConfig($this->connection));

		$sql = $this->connection->getQueryBuilder();
		$sql->insert('appconfig')
			->values([
				'appid' => $sql->createParameter('appid'),
				'configkey' => $sql->createParameter('configkey'),
				'configvalue' => $sql->createParameter('configvalue'),
			]);

		$sql->setParameters([
			'appid' => 'testapp',
			'configkey' => 'enabled',
			'configvalue' => 'true',
		])->execute();
		$sql->setParameters([
			'appid' => 'testapp',
			'configkey' => 'installed_version',
			'configvalue' => '1.2.3',
		])->execute();
		$sql->setParameters([
			'appid' => 'testapp',
			'configkey' => 'depends_on',
			'configvalue' => 'someapp',
		])->execute();
		$sql->setParameters([
			'appid' => 'testapp',
			'configkey' => 'deletethis',
			'configvalue' => 'deletethis',
		])->execute();
		$sql->setParameters([
			'appid' => 'testapp',
			'configkey' => 'key',
			'configvalue' => 'value',
		])->execute();

		$sql->setParameters([
			'appid' => 'someapp',
			'configkey' => 'key',
			'configvalue' => 'value',
		])->execute();
		$sql->setParameters([
			'appid' => 'someapp',
			'configkey' => 'otherkey',
			'configvalue' => 'othervalue',
		])->execute();

		$sql->setParameters([
			'appid' => '123456',
			'configkey' => 'key',
			'configvalue' => 'value',
		])->execute();
		$sql->setParameters([
			'appid' => '123456',
			'configkey' => 'enabled',
			'configvalue' => 'false',
		])->execute();

		$sql->setParameters([
			'appid' => 'anotherapp',
			'configkey' => 'key',
			'configvalue' => 'value',
		])->execute();
		$sql->setParameters([
			'appid' => 'anotherapp',
			'configkey' => 'enabled',
			'configvalue' => 'false',
		])->execute();
	}

	public function tearDown(): void {
		$sql = $this->connection->getQueryBuilder();
		$sql->delete('appconfig');
		$sql->execute();

		$sql = $this->connection->getQueryBuilder();
		$sql->insert('appconfig')
			->values([
				'appid' => $sql->createParameter('appid'),
				'configkey' => $sql->createParameter('configkey'),
				'configvalue' => $sql->createParameter('configvalue'),
			]);

		foreach ($this->originalConfig as $configs) {
			$sql->setParameter('appid', $configs['appid'])
				->setParameter('configkey', $configs['configkey'])
				->setParameter('configvalue', $configs['configvalue']);
			$sql->execute();
		}

		$this->registerAppConfig(new \OC\AppConfig(\OC::$server->getDatabaseConnection()));
		parent::tearDown();
	}

	/**
	 * Register an app config object for testing purposes.
	 *
	 * @param \OCP\IAppConfig $appConfig
	 */
	protected function registerAppConfig($appConfig) {
		\OC::$server->registerService('AppConfig', function () use ($appConfig) {
			return $appConfig;
		});
	}

	public function testGetApps() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertEquals([
			'anotherapp',
			'someapp',
			'testapp',
			'123456',
		], $config->getApps());
	}

	public function testGetKeys() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$keys = $config->getKeys('testapp');
		$this->assertEquals([
			'deletethis',
			'depends_on',
			'enabled',
			'installed_version',
			'key',
		], $keys);
	}

	public function testGetValue() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$value = $config->getValue('testapp', 'installed_version');
		$this->assertConfigKey('testapp', 'installed_version', $value);

		$value = $config->getValue('testapp', 'nonexistant');
		$this->assertNull($value);

		$value = $config->getValue('testapp', 'nonexistant', 'default');
		$this->assertEquals('default', $value);
	}

	public function testHasKey() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertTrue($config->hasKey('testapp', 'installed_version'));
		$this->assertFalse($config->hasKey('testapp', 'nonexistant'));
		$this->assertFalse($config->hasKey('nonexistant', 'nonexistant'));
	}

	public function testSetValueUpdate() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertEquals('1.2.3', $config->getValue('testapp', 'installed_version'));
		$this->assertConfigKey('testapp', 'installed_version', '1.2.3');

		$wasModified = $config->setValue('testapp', 'installed_version', '1.2.3');
		if (!(\OC::$server->getDatabaseConnection() instanceof \OC\DB\OracleConnection)) {
			$this->assertFalse($wasModified);
		}

		$this->assertEquals('1.2.3', $config->getValue('testapp', 'installed_version'));
		$this->assertConfigKey('testapp', 'installed_version', '1.2.3');

		$calledBeforeSetValue = [];
		$calledAfterSetValue = [];
		\OC::$server->getEventDispatcher()->addListener('appconfig.beforesetvalue',
			function (GenericEvent $event) use (&$calledBeforeSetValue) {
				$calledBeforeSetValue[] = 'appconfig.beforesetvalue';
				$calledBeforeSetValue[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('appconfig.aftersetvalue',
			function (GenericEvent $event) use (&$calledAfterSetValue) {
				$calledAfterSetValue[] = 'appconfig.aftersetvalue';
				$calledAfterSetValue[] = $event;
			});

		$this->assertTrue($config->setValue('testapp', 'installed_version', '1.33.7'));

		$this->assertEquals('appconfig.aftersetvalue', $calledAfterSetValue[0]);
		$this->assertEquals('appconfig.beforesetvalue', $calledBeforeSetValue[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeSetValue[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterSetValue[1]);
		$this->assertArrayHasKey('key', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('value', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('app', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('key', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('value', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('app', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('update', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('oldvalue', $calledAfterSetValue[1]);

		$this->assertEquals('1.33.7', $config->getValue('testapp', 'installed_version'));
		$this->assertConfigKey('testapp', 'installed_version', '1.33.7');

		$config->setValue('someapp', 'somekey', 'somevalue');
		$this->assertConfigKey('someapp', 'somekey', 'somevalue');
	}

	public function testSetValueInsert() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertFalse($config->hasKey('someapp', 'somekey'));
		$this->assertNull($config->getValue('someapp', 'somekey'));

		$calledBeforeSetValue = [];
		$calledAfterSetValue = [];
		\OC::$server->getEventDispatcher()->addListener('appconfig.beforesetvalue',
			function (GenericEvent $event) use (&$calledBeforeSetValue) {
				$calledBeforeSetValue[] = 'appconfig.beforesetvalue';
				$calledBeforeSetValue[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('appconfig.aftersetvalue',
			function (GenericEvent $event) use (&$calledAfterSetValue) {
				$calledAfterSetValue[] = 'appconfig.aftersetvalue';
				$calledAfterSetValue[] = $event;
			});

		$this->assertTrue($config->setValue('someapp', 'somekey', 'somevalue'));

		$this->assertEquals('appconfig.aftersetvalue', $calledAfterSetValue[0]);
		$this->assertEquals('appconfig.beforesetvalue', $calledBeforeSetValue[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeSetValue[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterSetValue[1]);
		$this->assertArrayHasKey('key', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('value', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('app', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('key', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('value', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('app', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('update', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('oldvalue', $calledAfterSetValue[1]);

		$this->assertTrue($config->hasKey('someapp', 'somekey'));
		$this->assertEquals('somevalue', $config->getValue('someapp', 'somekey'));
		$this->assertConfigKey('someapp', 'somekey', 'somevalue');

		$wasInserted = $config->setValue('someapp', 'somekey', 'somevalue');
		if (!(\OC::$server->getDatabaseConnection() instanceof \OC\DB\OracleConnection)) {
			$this->assertFalse($wasInserted);
		}
	}

	public function testDeleteKey() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertTrue($config->hasKey('testapp', 'deletethis'));

		$calledBeforeDeleteValue = [];
		$calledAfterDeleteValue = [];
		\OC::$server->getEventDispatcher()->addListener('appconfig.beforedeletevalue',
			function (GenericEvent $event) use (&$calledBeforeDeleteValue) {
				$calledBeforeDeleteValue[] = 'appconfig.beforedeletevalue';
				$calledBeforeDeleteValue[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('appconfig.afterdeletevalue',
			function (GenericEvent $event) use (&$calledAfterDeleteValue) {
				$calledAfterDeleteValue[] = 'appconfig.afterdeletevalue';
				$calledAfterDeleteValue[] = $event;
			});

		$config->deleteKey('testapp', 'deletethis');

		$this->assertEquals('appconfig.beforedeletevalue', $calledBeforeDeleteValue[0]);
		$this->assertEquals('appconfig.afterdeletevalue', $calledAfterDeleteValue[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteValue[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterDeleteValue[1]);
		$this->assertArrayHasKey('app', $calledBeforeDeleteValue[1]);
		$this->assertArrayHasKey('key', $calledBeforeDeleteValue[1]);
		$this->assertArrayHasKey('app', $calledAfterDeleteValue[1]);
		$this->assertArrayHasKey('key', $calledAfterDeleteValue[1]);

		$this->assertFalse($config->hasKey('testapp', 'deletethis'));

		$sql = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$sql->select('configvalue')
			->from('appconfig')
			->where($sql->expr()->eq('appid', $sql->createParameter('appid')))
			->andWhere($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
			->setParameter('appid', 'testapp')
			->setParameter('configkey', 'deletethis');
		$query = $sql->execute();
		$result = $query->fetch();
		$query->closeCursor();
		$this->assertFalse($result);
	}

	public function testDeleteApp() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertTrue($config->hasKey('someapp', 'otherkey'));

		$calledBeforeDeleteApp = [];
		$calledAfterDeleteApp = [];
		\OC::$server->getEventDispatcher()->addListener('appconfig.beforedeleteapp',
			function (GenericEvent $event) use (&$calledBeforeDeleteApp) {
				$calledBeforeDeleteApp[] = 'appconfig.beforedeleteapp';
				$calledBeforeDeleteApp[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('appconfig.afterdeleteapp',
			function (GenericEvent $event) use (&$calledAfterDeleteApp) {
				$calledAfterDeleteApp[] = 'appconfig.afterdeleteapp';
				$calledAfterDeleteApp[] = $event;
			});

		$config->deleteApp('someapp');

		$this->assertEquals('appconfig.beforedeleteapp', $calledBeforeDeleteApp[0]);
		$this->assertEquals('appconfig.afterdeleteapp', $calledAfterDeleteApp[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteApp[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterDeleteApp[1]);
		$this->assertArrayHasKey('app', $calledBeforeDeleteApp[1]);
		$this->assertArrayHasKey('app', $calledAfterDeleteApp[1]);

		$this->assertFalse($config->hasKey('someapp', 'otherkey'));

		$sql = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$sql->select('configvalue')
			->from('appconfig')
			->where($sql->expr()->eq('appid', $sql->createParameter('appid')))
			->setParameter('appid', 'someapp');
		$query = $sql->execute();
		$result = $query->fetch();
		$query->closeCursor();
		$this->assertFalse($result);
	}

	public function testGetValuesNotAllowed() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$this->assertFalse($config->getValues('testapp', 'enabled'));

		$this->assertFalse($config->getValues(false, false));
	}

	public function testGetValues() {
		$config = new \OC\AppConfig(\OC::$server->getDatabaseConnection());

		$sql = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$sql->select(['configkey', 'configvalue'])
			->from('appconfig')
			->where($sql->expr()->eq('appid', $sql->createParameter('appid')))
			->setParameter('appid', 'testapp');
		$query = $sql->execute();
		$expected = [];
		while ($row = $query->fetch()) {
			$expected[$row['configkey']] = $row['configvalue'];
		}
		$query->closeCursor();

		$values = $config->getValues('testapp', false);
		$this->assertEquals($expected, $values);

		$sql = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$sql->select(['appid', 'configvalue'])
			->from('appconfig')
			->where($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
			->setParameter('configkey', 'enabled');
		$query = $sql->execute();
		$expected = [];
		while ($row = $query->fetch()) {
			$expected[$row['appid']] = $row['configvalue'];
		}
		$query->closeCursor();

		$values = $config->getValues(false, 'enabled');
		$this->assertEquals($expected, $values);
	}

	public function testSettingConfigParallel() {
		$appConfig1 = new \OC\AppConfig(\OC::$server->getDatabaseConnection());
		$appConfig2 = new \OC\AppConfig(\OC::$server->getDatabaseConnection());
		$appConfig1->getValue('testapp', 'foo', 'v1');
		$appConfig2->getValue('testapp', 'foo', 'v1');

		$appConfig1->setValue('testapp', 'foo', 'v1');
		$this->assertConfigKey('testapp', 'foo', 'v1');

		$appConfig2->setValue('testapp', 'foo', 'v2');
		$this->assertConfigKey('testapp', 'foo', 'v2');
	}

	/**
	 * @param string $app
	 * @param string $key
	 * @param string $expected
	 */
	protected function assertConfigKey($app, $key, $expected) {
		$sql = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$sql->select('configvalue')
			->from('appconfig')
			->where($sql->expr()->eq('appid', $sql->createParameter('appid')))
			->andWhere($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
			->setParameter('appid', $app)
			->setParameter('configkey', $key);
		$query = $sql->execute();
		$actual = $query->fetch();
		$query->closeCursor();

		$this->assertEquals($expected, $actual['configvalue']);
	}
}
