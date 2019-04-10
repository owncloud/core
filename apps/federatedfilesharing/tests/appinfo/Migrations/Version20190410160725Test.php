<?php

namespace OCA\FederatedFileSharing\Tests\appinfo\Migrations;

// FIXME: autoloader fails to load migration
require_once \dirname(\dirname(\dirname(__DIR__))) . "/appinfo/Migrations/Version20190410160725.php";

use Doctrine\DBAL\Schema\Table;
use OCA\FederatedFileSharing\Migrations\Version20190410160725;
use Test\TestCase;
use Doctrine\DBAL\Schema\Schema;

class Version20190410160725Test extends TestCase {
	public function testExecute() {
		$tablePrefix = 'pr_';
		$migration = new Version20190410160725();
		$table = $this->createMock(Table::class);
		$schema = $this->createMock(Schema::class);
		$schema->method('hasTable')->withConsecutive(
			['pr_federated_reshares'],
			['pr_share_external']
		)->willReturn(true);
		$schema->method('getTable')->withConsecutive(
			['pr_federated_reshares'],
			['pr_share_external']
		)->willReturn($table);

		$this->assertNull($migration->changeSchema($schema, ['tablePrefix' => $tablePrefix]));
	}
}
