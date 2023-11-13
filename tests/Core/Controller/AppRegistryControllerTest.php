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

namespace Tests\Core\Controller;

use OC\Core\Controller\AppRegistryController;
use OC\Files\Node\File;
use OC\URLGenerator;
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
		# necessary to create proper URLs
		\OC::$WEBROOT = '';

		# mock it ....
		$request = $this->createMock(IRequest::class);
		$appManager = $this->createMock(IAppManager::class);
		$rootFolder = $this->createMock(IRootFolder::class);
		$logger = $this->createMock(ILogger::class);
		$config = $this->createMock(IConfig::class);
		$generator = \OC::$server->getURLGenerator();

		$appManager->method('isEnabledForUser')->willReturn(true);

		$controller = new AppRegistryController('core', $request, $appManager, $rootFolder, $generator, $config, $logger);

		$result = $controller->list();
		$data = $result['mime-types'];
		self::assertCount(8, $data);
		# assert mime
		self::assertEquals('application/pdf', $data[0]['mime_type']);
		self::assertEquals('application/vnd.oasis.opendocument.text', $data[1]['mime_type']);
		self::assertEquals('application/vnd.oasis.opendocument.presentation', $data[2]['mime_type']);
		self::assertEquals('application/vnd.oasis.opendocument.spreadsheet', $data[3]['mime_type']);
		self::assertEquals('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', $data[4]['mime_type']);
		self::assertEquals('application/vnd.openxmlformats-officedocument.wordprocessingml.document', $data[5]['mime_type']);
		self::assertEquals('application/vnd.openxmlformats-officedocument.presentationml.presentation', $data[6]['mime_type']);
		self::assertEquals('application/x-drawio', $data[7]['mime_type']);
		# assert icon path
		self::assertEquals('http://localhost/core/img/app-registry/richdocuments.png', $data[0]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/richdocuments.png', $data[1]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/richdocuments.png', $data[2]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/richdocuments.png', $data[3]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/onlyoffice.png', $data[4]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/onlyoffice.png', $data[5]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/onlyoffice.png', $data[6]['app_providers'][0]['icon']);
		self::assertEquals('http://localhost/core/img/app-registry/drawio.png', $data[7]['app_providers'][0]['icon']);
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

		$result = $controller->openWithWeb('123ocxxxxx', 'draw.io');
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
