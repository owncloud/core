<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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

namespace Test\Session;

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\Security\ICrypto;
use OCP\Security\ISecureRandom;

/**
 * Class CryptoSessionHandler
 *
 * @package Test\Session
 */
class CryptoSessionHandler extends \Test\TestCase {
	/** @var \OC\Session\CryptoSessionHandler */
	private $cryptoSessionHandler;
	/** @var ICrypto */
	private $crypto;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var IDBConnection */
	private $connection;
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var ILogger */
	private $logger;

	public function setUp() {
		parent::setUp();

		$this->crypto = $this->getMockBuilder('\\OCP\\Security\\ICrypto')
			->disableOriginalConstructor()
			->getMock();
		$this->secureRandom = $this->getMockBuilder('\\OCP\\Security\\ISecureRandom')
			->disableOriginalConstructor()
			->getMock();
		$this->connection = $this->getMockBuilder('\\OCP\\IDBConnection')
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->getMockBuilder('\\OCP\\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->timeFactory = $this->getMockBuilder('\\OCP\\AppFramework\\Utility\\ITimeFactory')
			->disableOriginalConstructor()
			->getMock();
		$this->logger = $this->getMockBuilder('\\OCP\\ILogger')
			->disableOriginalConstructor()
			->getMock();
		$this->cryptoSessionHandler = $this->getMockBuilder('\\OC\\Session\\CryptoSessionHandler')
			->setConstructorArgs([
				$this->crypto,
				$this->secureRandom,
				$this->connection,
				$this->config,
				$this->timeFactory,
				$this->logger,
			])
			->setMethods([
				'parentGc',
				'parentDestroy',
				'parentRead',
				'parentWrite',
			])
			->getMock();
	}

	/**
	 * @return array
	 */
	public function hashDataProvider() {
		return [
			[
				'OriginalSecretId',
				'3326270571368a224a95fa74dbe3b86c6fc96e3c3c51d54306f3618f7f3f8c990249aacef3766d24033f324b652ea73f1bc206be330829c60ff75100e31e3190',
				'RandomSecret',
			],
			[
				'PAFT3R18I85TE3ajLl62',
				'7e98e48ea7714edc9eaa899e137c34d6916cd708785ab45193ac8ba77ab342d174ee61283d7294ccdbfb59ea00be1d97f53eee5d9c2390769aeb314ad88b3fb1',
				'sFQQ0hnT3B9Fzoeh2AbX',
			],
			[
				'ek3tqx28gwyccfzgbyi273tyevvlzjgiok6sc1krv55915nsce9om8ocvnfu0w4u',
				'21ee1547f147e8fd32f217af112aae968b1327cf67607e2c272ffd74199e47c189acf35e79e66b67b7fd7973626dd30f36f4ced45682ce3f8c5c945214dd8ec3',
				'rdyoLA+bFUeAydwPg8UV4NGT2RygGLOMgg8HR6rQtKMoyQVL'
			],
		];
	}

	/**
	 * @dataProvider hashDataProvider
	 *
	 * @param string $originalId
	 * @param string $expectedHashedLocalId
	 * @param string $secret
	 */
	public function testDeriveHashedLocalSessionName($originalId, $expectedHashedLocalId, $secret) {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('secret', '')
			->will($this->returnValue($secret));

		$hashedId = $this->invokePrivate($this->cryptoSessionHandler, 'deriveHashedLocalSessionName', [$originalId]);
		$this->assertSame($expectedHashedLocalId, $hashedId);
	}

	public function testGc() {
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$exp = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();

		$this->connection
			->expects($this->once())
			->method('getQueryBuilder')
			->will($this->returnValue($qb));

		$qb->expects($this->once())
			->method('delete')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('expr')
			->will($this->returnValue($exp));
		$exp->expects($this->once())
			->method('lte')
			->with('last_used', $qb->createParameter('timestamp'))
			->will($this->returnValue($exp));
		$qb->expects($this->once())
			->method('where')
			->with($exp)
			->will($this->returnValue($qb));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(2000));
		$qb->expects($this->once())
			->method('setParameter')
			->with('timestamp', 663)
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('execute');

		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentGc')
			->with(1337)
			->will($this->returnValue(true));

		$this->assertTrue($this->cryptoSessionHandler->gc(1337));
	}

	public function testDestroy() {
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$exp = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();

		$this->connection
			->expects($this->once())
			->method('getQueryBuilder')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('delete')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('expr')
			->will($this->returnValue($exp));
		$exp->expects($this->once())
			->method('eq')
			->with('hashed_id')
			->will($this->returnValue($exp));
		$qb->expects($this->once())
			->method('where')
			->with($exp)
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('setParameter')
			->with('hashed_id', 'c3d74c512393fa9b93159cd52668463e9b2321e8112baa61c0663531b2c7e10d904601094411625e079f6ff016fbeefc81384a6526e48cc709eba4c54e88c505')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('execute');

		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentDestroy')
			->with('c3d74c512393fa9b93159cd52668463e9b2321e8112baa61c0663531b2c7e10d904601094411625e079f6ff016fbeefc81384a6526e48cc709eba4c54e88c505')
			->will($this->returnValue(true));

		$this->assertTrue($this->cryptoSessionHandler->destroy('MySessionToDestroy'));
	}

	public function testReadEmpty() {
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$checkExpr = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();

		$this->connection
			->expects($this->exactly(2))
			->method('getQueryBuilder')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('select')
			->with('hashed_id')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('from')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('expr')
			->will($this->returnValue($checkExpr));
		$checkExpr->expects($this->exactly(2))
			->method('eq')
			->with('hashed_id', $qb->createParameter('hashed_id'))
			->will($this->returnValue($checkExpr));
		$qb->expects($this->any())
			->method('where')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('setParameter')
			->will($this->returnValue($qb));
		$statement = $this->getMockBuilder('\\Doctrine\\DBAL\\Driver\\Statement')
			->disableOriginalConstructor()
			->getMock();
		$qb->expects($this->exactly(2))
			->method('execute')
			->will($this->returnValue($statement));
		$statement->expects($this->once())
			->method('fetch')
			->will($this->returnValue(['DummyValue']));
		$qb->expects($this->once())
			->method('update')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('set')
			->will($this->returnValue($qb));

		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentRead')
			->with('9024f4324c7290ef7a982356436c94542eebe1cf12e8236c4c811eadb7e0c0d2444227abb8379573b2f2461de2d04120165576d6135db5ccf17aa1e0360d9188')
			->will($this->returnValue(''));

		$this->assertSame('', $this->cryptoSessionHandler->read('MySessionIdToRead'));
	}

	public function testReadData() {
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$checkExpr = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();

		$this->connection
			->expects($this->exactly(2))
			->method('getQueryBuilder')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('select')
			->with('hashed_id')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('from')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('expr')
			->will($this->returnValue($checkExpr));
		$checkExpr->expects($this->exactly(2))
			->method('eq')
			->with('hashed_id', $qb->createParameter('hashed_id'))
			->will($this->returnValue($checkExpr));
		$qb->expects($this->any())
			->method('where')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('setParameter')
			->will($this->returnValue($qb));
		$statement = $this->getMockBuilder('\\Doctrine\\DBAL\\Driver\\Statement')
			->disableOriginalConstructor()
			->getMock();
		$qb->expects($this->exactly(2))
			->method('execute')
			->will($this->returnValue($statement));
		$statement->expects($this->once())
			->method('fetch')
			->will($this->returnValue(['DummyValue']));
		$qb->expects($this->once())
			->method('update')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('set')
			->will($this->returnValue($qb));

		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentRead')
			->with('9024f4324c7290ef7a982356436c94542eebe1cf12e8236c4c811eadb7e0c0d2444227abb8379573b2f2461de2d04120165576d6135db5ccf17aa1e0360d9188')
			->will($this->returnValue('9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948'));
		$this->crypto
			->expects($this->once())
			->method('decrypt')
			->with('9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948')
			->will($this->returnValue('ReturnedData'));

		$this->assertSame('ReturnedData', $this->cryptoSessionHandler->read('MySessionIdToRead'));
	}

	public function testReadDataException() {
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$checkExpr = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();

		$this->connection
			->expects($this->exactly(2))
			->method('getQueryBuilder')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('select')
			->with('hashed_id')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('from')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('expr')
			->will($this->returnValue($checkExpr));
		$checkExpr->expects($this->exactly(2))
			->method('eq')
			->with('hashed_id', $qb->createParameter('hashed_id'))
			->will($this->returnValue($checkExpr));
		$qb->expects($this->any())
			->method('where')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('setParameter')
			->will($this->returnValue($qb));
		$statement = $this->getMockBuilder('\\Doctrine\\DBAL\\Driver\\Statement')
			->disableOriginalConstructor()
			->getMock();
		$qb->expects($this->exactly(2))
			->method('execute')
			->will($this->returnValue($statement));
		$statement->expects($this->once())
			->method('fetch')
			->will($this->returnValue(['DummyValue']));
		$qb->expects($this->once())
			->method('update')
			->with('*PREFIX*sessions')
			->will($this->returnValue($qb));
		$qb->expects($this->once())
			->method('set')
			->will($this->returnValue($qb));

		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentRead')
			->with('9024f4324c7290ef7a982356436c94542eebe1cf12e8236c4c811eadb7e0c0d2444227abb8379573b2f2461de2d04120165576d6135db5ccf17aa1e0360d9188')
			->will($this->returnValue('9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948'));
		$this->crypto
			->expects($this->once())
			->method('decrypt')
			->with('9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948')
			->will($this->throwException(new \Exception()));

		$this->assertSame('', $this->cryptoSessionHandler->read('MySessionIdToRead'));
	}

	public function testWrite() {
		$this->crypto
			->expects($this->once())
			->method('encrypt')
			->with('RandomData', 'MySessionIdToWrite')
			->will($this->returnValue('9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948'));
		$this->cryptoSessionHandler
			->expects($this->once())
			->method('parentWrite')
			->with(
				'40e7b28ebdbaa02d09d571a656e8aa8db4737ddc3c547245cb5a2ff1d6893b984e494bb0df37c3e991f31ac93392b303e99915690382aaa54b2fe9dadb73b18a',
				'9b7fe79030f1b2b15b7464a1d849dc72931db954bcc504f04d22fcb33a4eedff|eyUT7om27ZQJ7QZ2|b23bffce7c88bfe8258cd5ee1d792ae1b251ca6cb8c8e4a816dfaf0405a0c29161cd3cd8069f231cca6c03310f32ad8f767431c80ae1ddb5e3f6e01bbbfae948'
			)
			->will($this->returnValue(true));

		$this->assertTrue($this->cryptoSessionHandler->write('MySessionIdToWrite', 'RandomData'));
	}

	public function testCreate_sid() {
		$this->secureRandom
			->expects($this->once())
			->method('getMediumStrengthGenerator')
			->will($this->returnSelf());
		$this->secureRandom
			->expects($this->once())
			->method('generate')
			->with(
				64,
				'abcdefghijklmnopqrstuvwxyz0123456789'
			)
			->will($this->returnValue('MyRandomSessionId'));
		$qb = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IQueryBuilder')
			->disableOriginalConstructor()
			->getMock();
		$checkExpr = $this->getMockBuilder('\\OCP\\DB\\QueryBuilder\\IExpressionBuilder')
			->disableOriginalConstructor()
			->getMock();
		$this->connection
			->expects($this->any())
			->method('getQueryBuilder')
			->will($this->returnValue($qb));
		$qb->expects($this->any())
			->method('select')
			->with('hashed_id')
			->will($this->returnSelf());
		$qb->expects($this->any())
			->method('from')
			->with('*PREFIX*sessions')
			->will($this->returnSelf());
		$checkExpr->expects($this->any())
			->method('eq')
			->with('hashed_id', $qb->createParameter('hashed_id'));
		$qb->expects($this->any())
			->method('expr')
			->will($this->returnValue($checkExpr));
		$qb->expects($this->any())
			->method('where')
			->will($this->returnSelf());
		$statement = $this->getMockBuilder('\\Doctrine\\DBAL\\Driver\\Statement')
			->disableOriginalConstructor()
			->getMock();
		$qb->expects($this->any())
			->method('execute')
			->will($this->returnValue($statement));
		$statement->expects($this->any())
			->method('fetch')
			->will($this->returnValue([]));
		$qb->expects($this->once())
			->method('insert')
			->with('*PREFIX*sessions')
			->will($this->returnSelf());
		$qb->expects($this->once())
			->method('values')
			->with([
				'hashed_id' => $qb->createNamedParameter('', \PDO::PARAM_STR),
				'last_used' => $qb->createNamedParameter($this->timeFactory->getTime()),
			])
			->will($this->returnSelf());

		$this->assertSame('MyRandomSessionId', $this->cryptoSessionHandler->create_sid());
	}

}
