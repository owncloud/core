<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Federation\Tests;

use OCA\Federation\Panels\Admin;
/**
 * @package OCA\Federation\Tests
 */
class PanelTest extends \Test\TestCase {

	/** @var \OCA\Federation\Panels\Admin */
	private $panel;

	private $connection;

	private $l;

	private $logger;

	private $jobList;

	private $clientService;

	private $secureRandom;

	private $config;

	private $eventDispatcher;

	public function setUp() {
		parent::setUp();
		$this->connection = $this->getMockBuilder('\OCP\IDBConnection')->getMock();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->clientService = $this->getMockBuilder('\OCP\Http\Client\IClientService')->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')->getMock();
		$this->jobList = $this->getMockBuilder('\OCP\BackgroundJob\IJobList')->getMock();
		$this->secureRandom = $this->getMockBuilder('\OCP\Security\ISecureRandom')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->eventDispatcher = $this->getMockBuilder('\Symfony\Component\EventDispatcher\EventDispatcherInterface')->getMock();

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
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$queryBuilder = $this->getMockBuilder('\OCP\DB\QueryBuilder\IQueryBuilder')->getMock();
		$queryBuilder->expects($this->once())->method('select')->willReturn($queryBuilder);
		$queryBuilder->expects($this->once())->method('from')->willReturn($queryBuilder);
		$statement = $this->getMockBuilder('\Doctrine\DBAL\Driver\Statement')->getMock();
		$queryBuilder->expects($this->once())->method('execute')->willReturn($statement);
		$statement->expects($this->once())->method('fetchAll')->willReturn([]);
		$this->connection->expects($this->once())->method('getQueryBuilder')->willReturn($queryBuilder);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="ocFederationSettings" class="section">', $templateHtml);
	}

}
