<?php
/**
 * @author Faruk Uzun <farukuzun@collabora.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Normal Ra <normalraw@gmail.com>
 * @author Olivier Paroz <github@oparoz.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Repair;

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

class RepairMimeTypes implements IRepairStep {
	/**
	 * @var \OCP\IConfig
	 */
	protected $config;

	/**
	 * @var int
	 */
	protected $folderMimeTypeId;

	/**
	 * @param \OCP\IConfig $config
	 */
	public function __construct($config) {
		$this->config = $config;
	}

	public function getName() {
		return 'Repair mime types';
	}

	private static function existsSql() {
		return '
			SELECT count(`mimetype`)
			FROM   `*PREFIX*mimetypes`
			WHERE  `mimetype` = ?
		';
	}

	private static function getIdSql() {
		return '
			SELECT `id`
			FROM   `*PREFIX*mimetypes`
			WHERE  `mimetype` = ?
		';
	}

	private static function insertSql() {
		return '
			INSERT INTO `*PREFIX*mimetypes` ( `mimetype` )
			VALUES ( ? )
		';
	}

	private static function updateWrongSql() {
		return '
			UPDATE `*PREFIX*filecache`
			SET `mimetype` = (
				SELECT `id`
				FROM `*PREFIX*mimetypes`
				WHERE `mimetype` = ?
			) WHERE `mimetype` = ?
		';
	}

	private static function deleteSql() {
		return '
			DELETE FROM `*PREFIX*mimetypes`
			WHERE `id` = ?
		';
	}

	private static function updateByNameSql() {
		return '
			UPDATE `*PREFIX*filecache`
			SET `mimetype` = ?
			WHERE `mimetype` <> ? AND `mimetype` <> ? AND `name` ILIKE ?
		';
	}

	private function repairMimetypes($wrongMimetypes) {
		$connection = \OC::$server->getDatabaseConnection();
		foreach ($wrongMimetypes as $wrong => $correct) {
			// do we need to remove a wrong mimetype?
			$result = $connection->executeQuery(self::getIdSql(), [$wrong]);
			$wrongId = $result->fetchColumn();

			if ($wrongId !== false) {
				// do we need to insert the correct mimetype?
				$result = $connection->executeQuery(self::existsSql(), [$correct]);
				$exists = $result->fetchColumn();

				if ($correct !== null) {
					if (!$exists) {
						// insert mimetype
						$connection->executeStatement(self::insertSql(), [$correct]);
					}

					// change wrong mimetype to correct mimetype in filecache
					$connection->executeStatement(self::updateWrongSql(), [$correct, $wrongId]);
				}

				// delete wrong mimetype
				$connection->executeStatement(self::deleteSql(), [$wrongId]);
			}
		}
	}

	private function updateMimetypes($updatedMimetypes) {
		$connection = \OC::$server->getDatabaseConnection();
		if (empty($this->folderMimeTypeId)) {
			$result = $connection->executeQuery(self::getIdSql(), ['httpd/unix-directory']);
			$this->folderMimeTypeId = (int)$result->fetchColumn();
		}

		foreach ($updatedMimetypes as $extension => $mimetype) {
			$result = $connection->executeQuery(self::existsSql(), [$mimetype]);
			$exists = $result->fetchColumn();

			if (!$exists) {
				// insert mimetype
				$connection->executeStatement(self::insertSql(), [$mimetype]);
			}

			// get target mimetype id
			$result = $connection->executeQuery(self::getIdSql(), [$mimetype]);
			$mimetypeId = $result->fetchColumn();

			// change mimetype for files with x extension
			$connection->executeStatement(self::updateByNameSql(), [$mimetypeId, $this->folderMimeTypeId, $mimetypeId, '%.' . $extension]);
		}
	}

	private function fixOfficeMimeTypes() {
		// update wrong mimetypes
		$wrongMimetypes = [
			'application/mspowerpoint' => 'application/vnd.ms-powerpoint',
			'application/msexcel' => 'application/vnd.ms-excel',
		];

		self::repairMimetypes($wrongMimetypes);

		$updatedMimetypes = [
			'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		];

		// separate doc from docx etc
		self::updateMimetypes($updatedMimetypes);
	}

	private function fixApkMimeType() {
		$updatedMimetypes = [
			'apk' => 'application/vnd.android.package-archive',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function fixFontsMimeTypes() {
		// update wrong mimetypes
		$wrongMimetypes = [
			'font' => null,
			'font/opentype' => 'application/font-sfnt',
			'application/x-font-ttf' => 'application/font-sfnt',
		];

		self::repairMimetypes($wrongMimetypes);

		$updatedMimetypes = [
			'ttf' => 'application/font-sfnt',
			'otf' => 'application/font-sfnt',
			'pfb' => 'application/x-font',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function fixPostscriptMimeType() {
		$updatedMimetypes = [
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceRawMimeType() {
		$updatedMimetypes = [
			'arw' => 'image/x-dcraw',
			'cr2' => 'image/x-dcraw',
			'dcr' => 'image/x-dcraw',
			'dng' => 'image/x-dcraw',
			'erf' => 'image/x-dcraw',
			'iiq' => 'image/x-dcraw',
			'k25' => 'image/x-dcraw',
			'kdc' => 'image/x-dcraw',
			'mef' => 'image/x-dcraw',
			'nef' => 'image/x-dcraw',
			'orf' => 'image/x-dcraw',
			'pef' => 'image/x-dcraw',
			'raf' => 'image/x-dcraw',
			'rw2' => 'image/x-dcraw',
			'srf' => 'image/x-dcraw',
			'sr2' => 'image/x-dcraw',
			'xrf' => 'image/x-dcraw',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduce3dImagesMimeType() {
		$updatedMimetypes = [
			'jps' => 'image/jpeg',
			'mpo' => 'image/jpeg',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceConfMimeType() {
		$updatedMimetypes = [
			'conf' => 'text/plain',
			'cnf' => 'text/plain',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceYamlMimeType() {
		$updatedMimetypes = [
			'yaml' => 'application/yaml',
			'yml' => 'application/yaml',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceJavaMimeType() {
		$updatedMimetypes = [
			'class' => 'application/java',
			'java' => 'text/x-java-source',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceHppMimeType() {
		$updatedMimetypes = [
			'hpp' => 'text/x-h',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceRssMimeType() {
		$updatedMimetypes = [
			'rss' => 'application/rss+xml',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceRtfMimeType() {
		$updatedMimetypes = [
			'rtf' => 'text/rtf',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	private function introduceRichDocumentsMimeTypes() {
		$updatedMimetypes = [
			'lwp' => 'application/vnd.lotus-wordpro',
			'one' => 'application/msonenote',
			'vsd' => 'application/vnd.visio',
			'wpd' => 'application/vnd.wordperfect',
		];

		self::updateMimetypes($updatedMimetypes);
	}

	/**
	 * Fix mime types
	 *
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$ocVersionFromBeforeUpdate = $this->config->getSystemValue('version', '0.0.0');

		// NOTE TO DEVELOPERS: when adding new mime types, please make sure to
		// add a version comparison to avoid doing it every time

		// only update mime types if necessary as it can be expensive
		if (\version_compare($ocVersionFromBeforeUpdate, '8.2.0', '<')) {
			$this->fixOfficeMimeTypes();
			$out->info('Fixed office mime types');

			$this->fixApkMimeType();
			$out->info('Fixed APK mime type');

			$this->fixFontsMimeTypes();
			$out->info('Fixed fonts mime types');

			$this->fixPostscriptMimeType();
			$out->info('Fixed Postscript mime types');

			$this->introduceRawMimeType();
			$out->info('Fixed Raw mime types');

			$this->introduce3dImagesMimeType();
			$out->info('Fixed 3D images mime types');

			$this->introduceConfMimeType();
			$out->info('Fixed Conf/cnf mime types');

			$this->introduceYamlMimeType();
			$out->info('Fixed Yaml/Yml mime types');
		}

		// Mimetype updates from #19272
		if (\version_compare($ocVersionFromBeforeUpdate, '8.2.0.8', '<')) {
			$this->introduceJavaMimeType();
			$out->info('Fixed java/class mime types');

			$this->introduceHppMimeType();
			$out->info('Fixed hpp mime type');

			$this->introduceRssMimeType();
			$out->info('Fixed rss mime type');

			$this->introduceRtfMimeType();
			$out->info('Fixed rtf mime type');
		}

		if (\version_compare($ocVersionFromBeforeUpdate, '9.0.0.10', '<')) {
			$this->introduceRichDocumentsMimeTypes();
			$out->info('Fixed richdocuments additional office mime types');
		}
	}
}
