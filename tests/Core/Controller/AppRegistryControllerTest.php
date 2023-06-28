<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Core\Controller;

use Generator;
use OC\Core\Controller\AppRegistryController;
use OC\Files\Node\File;
use OCP\App\IAppManager;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use Test\TestCase;

class AppRegistryControllerTest extends TestCase {
	public function testList(): void {
		$request = $this->createMock(IRequest::class);
		$appManager = $this->createMock(IAppManager::class);
		$rootFolder = $this->createMock(IRootFolder::class);
		$generator = $this->createMock(IURLGenerator::class);
		$logger = $this->createMock(ILogger::class);
		$config = $this->createMock(IConfig::class);

		$appManager->method('isEnabledForUser')->willReturn(true);

		$controller = new AppRegistryController('core', $request, $appManager, $rootFolder, $generator, $config, $logger);

		$result = $controller->list();
		$data = $result['mime-types'];
		self::assertCount(5, $data);
		self::assertEquals('application/pdf', $data[0]['mime_type']);
		self::assertEquals('application/vnd.oasis.opendocument.text', $data[1]['mime_type']);
		self::assertEquals('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', $data[2]['mime_type']);
		self::assertEquals('application/vnd.openxmlformats-officedocument.wordprocessingml.document', $data[3]['mime_type']);
		self::assertEquals('application/x-drawio', $data[4]['mime_type']);
	}

	public function testOpenWithWeb(): void {
		$request = $this->createMock(IRequest::class);
		$appManager = $this->createMock(IAppManager::class);
		$rootFolder = $this->createMock(IRootFolder::class);
		$generator = $this->createMock(IURLGenerator::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);

		$drawio_node = $this->createMock(File::class);

		$appManager->method('isEnabledForUser')->willReturn(true);
		$rootFolder->method('getById')->willReturnCallback(function ($file_id) use ($drawio_node) {
			if ($file_id === 123) {
				return [$drawio_node];
			}

			return [];
		});
		$generator->method('linkToRouteAbsolute')->willReturn('https://example.cloud/index.php/apps/drawio/editor/123');
		$request->method('getHeader')->willReturn('ownCloudApp/12.0.2');
		$config->method('getSystemValue')->willReturnCallback(function ($key, $default) {
			return $default;
		});

		$controller = new AppRegistryController('core', $request, $appManager, $rootFolder, $generator, $config, $logger);

		$result = $controller->openWithWeb(123, 'draw.io');
		$data = $result->getData();
		self::assertCount(1, $data);
		self::assertEquals('https://example.cloud/index.php/apps/drawio/editor/123', $data['uri']);
	}

	public function testNew(): void {
		$request = $this->createMock(IRequest::class);
		$appManager = $this->createMock(IAppManager::class);
		$rootFolder = $this->createMock(IRootFolder::class);
		$generator = $this->createMock(IURLGenerator::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);

		$parent_folder = $this->createMock(Folder::class);
		$newFile = $this->createMock(File::class);
		$parent_folder->method('newFile')->willReturn($newFile);
		$newFile->method('getId')->willReturn(9999999);

		$appManager->method('isEnabledForUser')->willReturn(true);
		$rootFolder->method('getById')->willReturnCallback(function ($file_id) use ($parent_folder) {
			if ($file_id === 123) {
				return [$parent_folder];
			}

			return [];
		});
		$generator->method('linkToRouteAbsolute')->willReturn('https://example.cloud/index.php/apps/drawio/editor/123');
		$request->method('getHeader')->willReturn('ownCloud iOS');
		$config->method('getSystemValue')->willReturnCallback(function ($key, $default) {
			return $default;
		});

		$controller = new AppRegistryController('core', $request, $appManager, $rootFolder, $generator, $config, $logger);

		$result = $controller->new(123, 'hello.txt');
		$data = $result->getData();
		self::assertCount(1, $data);
		self::assertSame('9999999', $data['file_id']);
	}
}
