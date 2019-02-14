<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Federation\Tests;

use Doctrine\DBAL\Driver\Statement;
use OCA\Federation\Panels\Admin;
use OCP\BackgroundJob\IJobList;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\ILogger;
use OCP\Security\ISecureRandom;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @package OCA\Federation\Tests
 */
class PanelTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;
	/** @var IDBConnection */
	private $connection;
	/** @var IL10N */
	private $l;
	/** @var ILogger */
	private $logger;
	/** @var IJobList */
	private $jobList;
	/** @var IClientService */
	private $clientService;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var IConfig */
	private $config;
	/** @var EventDispatcherInterface */
	private $eventDispatcher;

	public function setUp(): void {
		parent::setUp();
		$this->connection = $this->getMockBuilder(IDBConnection::class)->getMock();
		$this->l = $this->getMockBuilder(IL10N::class)->getMock();
		$this->clientService = $this->getMockBuilder(IClientService::class)->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)->getMock();
		$this->jobList = $this->getMockBuilder(IJobList::class)->getMock();
		$this->secureRandom = $this->getMockBuilder(ISecureRandom::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)->getMock();

		$this->panel = new Admin(
			$this->connection,
			$this->l,
			$this->clientService,
			$this->logger,
			$this->jobList,
			$this->secureRandom,
			$this->config,
			$this->eventDispatcher
			);
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$queryBuilder = $this->getMockBuilder(IQueryBuilder::class)->getMock();
		$queryBuilder->expects($this->once())->method('select')->willReturn($queryBuilder);
		$queryBuilder->expects($this->once())->method('from')->willReturn($queryBuilder);
		$statement = $this->getMockBuilder(Statement::class)->getMock();
		$queryBuilder->expects($this->once())->method('execute')->willReturn($statement);
		$statement->expects($this->once())->method('fetchAll')->willReturn([]);
		$this->connection->expects($this->once())->method('getQueryBuilder')->willReturn($queryBuilder);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="ocFederationSettings" class="section">', $templateHtml);
	}
}
