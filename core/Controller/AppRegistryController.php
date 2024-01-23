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

namespace OC\Core\Controller;

use OCP\App\IAppManager;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\Files\NotPermittedException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;

class AppRegistryController extends Controller {
	private const MIME_PDF = "application/pdf";
	private const MIME_DOCX = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	private const MIME_XLSX = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
	private const MIME_PPTX = "application/vnd.openxmlformats-officedocument.presentationml.presentation";
	private const MIME_ODP = "application/vnd.oasis.opendocument.presentation";
	private const MIME_ODS = "application/vnd.oasis.opendocument.spreadsheet";
	private const MIME_ODT = "application/vnd.oasis.opendocument.text";
	private const MIME_DRAWIO = 'application/x-drawio';

	private IAppManager $appManager;
	private IRootFolder $rootFolder;
	private IURLGenerator $generator;
	private ILogger $logger;
	private IConfig $config;

	public function __construct(
		$appName,
		IRequest $request,
		IAppManager $appManager,
		IRootFolder $rootFolder,
		IURLGenerator $generator,
		IConfig $config,
		ILogger $logger
	) {
		parent::__construct($appName, $request);
		$this->appManager = $appManager;
		$this->rootFolder = $rootFolder;
		$this->generator = $generator;
		$this->logger = $logger;
		$this->config = $config;
	}

	private static array $apps = [
		'Collabora' => [
			"oc_app_name" => 'richdocuments',
			"mime-types" => [self::MIME_PDF, self::MIME_ODT, self::MIME_ODP, self::MIME_ODS]
		],
		'OnlyOffice' => [
			"oc_app_name" => 'onlyoffice',
			"mime-types" => [self::MIME_PDF, self::MIME_ODT, self::MIME_ODP, self::MIME_ODS, self::MIME_XLSX, self::MIME_DOCX, self::MIME_PPTX]
		],
		'MS Office' => [
			"oc_app_name" => 'wopi',
			"mime-types" => [self::MIME_XLSX, self::MIME_DOCX, self::MIME_PPTX]
		],
		'draw.io' => [
			"oc_app_name" => 'drawio',
			"mime-types" => [self::MIME_DRAWIO]
		],
	];

	private static array $mimes = [
		self::MIME_PDF => [
			"ext" => "pdf",
			"name" => "PDF",
		],
		self::MIME_DRAWIO => [
			"ext" => "drawio",
			"name" => "draw.io (diagrams.net)",
		],
		self::MIME_ODP => [
			"ext" => "odp",
			"name" => "OpenDocument",
			"description" => "OpenDocument presentation",
		],
		self::MIME_ODS => [
			"ext" => "ods",
			"name" => "OpenDocument",
			"description" => "OpenDocument spreadsheet",
		],
		self::MIME_ODT => [
			"ext" => "odt",
			"name" => "OpenDocument",
			"description" => "OpenDocument text document",
		],
		self::MIME_XLSX => [
			"ext" => "xlsx",
			"name" => "Microsoft Excel",
		],
		self::MIME_PPTX => [
			"ext" => "pptx",
			"name" => "Microsoft Excel",
		],
		self::MIME_DOCX => [
			"ext" => "docx",
			"name" => "Microsoft Word",
		]
	];

	private static function buildMimeType(string $mimetype): array {
		$d = self::$mimes[$mimetype];

		return [
			"mime_type" => $mimetype,
			"app_providers" => [],
			"ext" => $d['ext'],
			"name" => $d['name'],
			"description" => $d['description'] ?? $d['name'] . ' document'
		];
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @CORS
	 */
	public function list(): array {
		$mimeTypes = [];

		foreach (self::$apps as $app_name => $app_info) {
			if ($this->appManager->isEnabledForUser($app_info['oc_app_name'])) {
				foreach ($app_info['mime-types'] as $mimetype) {
					# init new mime
					if (($mimeTypes[$mimetype] ?? null) === null) {
						$mimeTypes[$mimetype] = self::buildMimeType($mimetype);
					}
					# add app to mime
					$mimeTypes[$mimetype]['app_providers'][] = [
						"name" => $app_name,
						"icon" => $this->buildAppIconURL($app_info['oc_app_name']),
					];
					# add default_application
					$mimeTypes[$mimetype]['default_application'] = $this->getDefaultApp($mimetype);
				}
			}
		}

		return [
			"mime-types" => array_values($mimeTypes)
		];
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @CORS
	 */
	public function openWithWeb(?string $file_id, ?string $app_name): DataResponse {
		$userAgent = $this->request->getHeader('User-Agent') ?? '-';
		$this->logger->info("openWithWeb($file_id, $app_name) - $userAgent");
		$fileId = $this->extractFileId($file_id);
		$nodes = $this->rootFolder->getById($fileId, true);
		if (\count($nodes) !== 1) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => "invalid file ID"
			], 404);
		}

		if ($app_name === null) {
			$app_name = $this->getDefaultApp($nodes[0]->getMimetype());
			if ($app_name === null) {
				return new DataResponse([
					"code" => "INVALID_PARAMETER",
					"message" => "error: no default app defined"
				], 404);
			}
		}
		$app_info = self::$apps[$app_name] ?? null;
		if ($app_info === null || !$this->appManager->isEnabledForUser($app_info['oc_app_name'])) {
			return new DataResponse([
				"code" => "RESOURCE_NOT_FOUND",
				"message" => "error: not found: app '$app_name' not found"
			], 404);
		}

		$uri = $this->buildWebUri($app_info, $fileId);
		if ($uri === null) {
			return new DataResponse([
				"code" => "RESOURCE_NOT_FOUND",
				"message" => "error: cannot build uri"
			], 404);
		}

		return new DataResponse([
			'uri' => $uri]);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @CORS
	 */
	public function new(?string $parent_container_id, ?string $filename): DataResponse {
		$userAgent = $this->request->getHeader('User-Agent') ?? '-';
		$this->logger->info("new($parent_container_id, $filename) - $userAgent");

		if ($parent_container_id === null) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => "missing parent container ID"
			], 400);
		}
		if ($filename === null) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => "missing filename"
			], 400);
		}

		$extracted_parent_container_id = $this->extractFileId($parent_container_id);
		$nodes = $this->rootFolder->getById($extracted_parent_container_id, true);
		if (\count($nodes) !== 1) {
			return new DataResponse([
				"code" => "RESOURCE_NOT_FOUND",
				"message" => "missing parent container ID"
			], 404);
		}
		$node = $nodes[0];
		if (!$node instanceof Folder) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => "the parent container id does not point to a container"
			], 400);
		}
		if ($node->nodeExists($filename)) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => "the file already exists"
			], 403);
		}

		# finally create the file
		try {
			$newFile = $node->newFile($filename);
		} catch (NotPermittedException $e) {
			return new DataResponse([
				"code" => "INVALID_PARAMETER",
				"message" => $e->getMessage()
			], 400);
		}

		return new DataResponse([
			'file_id' => (string)$newFile->getId()]);
	}

	private function buildAppIconURL(string $app_name): string {
		$path = $this->generator->imagePath('core', "app-registry/$app_name.png");
		return $this->generator->getAbsoluteURL($path);
	}

	private function buildWebUri(array $app_info, string $fileId): ?string {
		$uri = null;
		$app_name = $app_info['oc_app_name'];
		# https://github.com/ONLYOFFICE/onlyoffice-owncloud/blob/2afca075249f24d857f0b3097d565f5129e88d17/appinfo/routes.php#LL27C47-L27C53
		if ($app_name === 'onlyoffice') {
			$uri = $this->generator->linkToRouteAbsolute('onlyoffice.editor.index', [
				'fileId' => $fileId
			]);
		}
		# https://github.com/owncloud/richdocuments/blob/5adc1dd3a0ab39918b2c3f7a3c62f3231f216cb6/appinfo/routes.php#L26
		if ($app_name === 'richdocuments') {
			# this is required in order to keep compatibility with richdocuments < 4.1.0 where the old richdocuments.document.index route is present
			$link = $this->generator->linkToRoute('richdocuments.Document.index', ['fileId' => $fileId]);
			if ($link !== '') {
				$uri = $this->generator->getAbsoluteUrl($link);
			} else {
				$uri = $this->generator->linkToRouteAbsolute('richdocuments.document.index', ['fileId' => $fileId]);
			}
		}
		# https://github.com/owncloud/wopi/blob/f24b081d8bc1ac89b73ae211636cb4194d0cf0a8/appinfo/routes.php#LL22C15-L22C26
		if ($app_name === 'wopi') {
			$uri = $this->generator->linkToRouteAbsolute('wopi.page.Office', [
				'_action' => 'edit',
				'fileId' => $fileId
			]);
		}
		# https://github.com/owncloud/drawio/blob/b460be2e6606c4222db415aa1c750ae10ea8e74c/appinfo/routes.php#L31
		if ($app_name === 'drawio') {
			$uri = $this->generator->linkToRouteAbsolute('drawio.page.editor', [
				'fileid' => $fileId
			]);
		}
		if ($uri === null) {
			return null;
		}

		$userAgent = $this->request->getHeader('User-Agent') ?? '-';
		$clientRules = $this->config->getSystemValue('client.detection', [
			'ios' => 'ownCloudApp/'
		]);
		$schema = $this->config->getSystemValue('app-registry.uri-schema', [
			'ios' => 'https://'
		]);
		foreach ($clientRules as $client => $rule) {
			if (strpos($userAgent, $rule) !== false) {
				return str_replace('https://', $schema[$client], $uri);
			}
		}

		return $uri;
	}

	private function getDefaultApp(string $mimeType): ?string {
		# get mime from file and see which of the enabled apps matches
		foreach (self::$apps as $app_name => $app_info) {
			$oc_app_name = $app_info['oc_app_name'];
			if ($this->appManager->isEnabledForUser($oc_app_name)) {
				if (\in_array($mimeType, $app_info['mime-types'], true)) {
					return $app_name;
				}
			}
		}

		return null;
	}

	private function extractFileId(?string $file_id): ?int {
		if ($file_id === null) {
			return null;
		}
		# a simple case to int will cut off the instance id which is used by Android
		return (int)$file_id;
	}
}
