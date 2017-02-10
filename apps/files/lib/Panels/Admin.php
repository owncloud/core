<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OCA\Files\Panels;

use OC\Settings\Panels\Helper;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IURLGenerator;

class Admin implements ISettings {

	/** @var IURLGenerator */
	protected $urlGenerator;
	/** @var Helper */
	protected $helper;

	public function __construct(IURLGenerator $urlGenerator,
								Helper $helper) {
		$this->urlGenerator = $urlGenerator;
		$this->helper = $helper;
	}

	public function getSectionID() {
		return 'storage';
	}

	public function getPriority() {
		return 0;
	}

	public function getPanel() {
		$htaccessWorking=(getenv('htaccessWorking')=='true');
		$upload_max_filesize = \OC::$server->getIniWrapper()->getBytes('upload_max_filesize');
		$post_max_size = \OC::$server->getIniWrapper()->getBytes('post_max_size');
		$maxUploadFilesize = \OCP\Util::humanFileSize(min($upload_max_filesize, $post_max_size));
		$htaccessWritable=is_writable(\OC::$SERVERROOT.'/.htaccess');
		$userIniWritable=is_writable(\OC::$SERVERROOT.'/.user.ini');
		$tmpl = new Template( 'files', 'admin' );
		$tmpl->assign('urlGenerator', $this->urlGenerator);
		$tmpl->assign( 'uploadChangeable', ($htaccessWorking and $htaccessWritable) or $userIniWritable );
		$tmpl->assign( 'uploadMaxFilesize', $maxUploadFilesize);
		// max possible makes only sense on a 32 bit system
		$tmpl->assign( 'displayMaxPossibleUploadSize', PHP_INT_SIZE===4);
		$tmpl->assign( 'maxPossibleUploadSize', \OCP\Util::humanFileSize(PHP_INT_MAX));
		return $tmpl;
		}

}
