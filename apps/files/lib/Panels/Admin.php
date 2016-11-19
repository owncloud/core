<?php

namespace OCA\Files\Panels;

use OCP\Settings\IPanel;
use OCP\Template;
use OCP\IURLGenerator;

class Admin implements IPanel {

	public function __construct(IURLGenerator $urlGenerator) {
		$this->urlGenerator = $urlGenerator;
	}

	public function getSectionID() {
		return 'general';
	}

	public function getPriority() {
		return 0;
	}

	public function getPanel() {
		$htaccessWorking=(getenv('htaccessWorking')=='true');
		$upload_max_filesize = \OC::$server->getIniWrapper()->getBytes('upload_max_filesize');
		$post_max_size = \OC::$server->getIniWrapper()->getBytes('post_max_size');
		$maxUploadFilesize = \OCP\Util::humanFileSize(min($upload_max_filesize, $post_max_size));
		if($_POST && \OC::$server->getRequest()->passesCSRFCheck()) {
			if(isset($_POST['maxUploadSize'])) {
				if(($setMaxSize = \OC_Files::setUploadLimit(\OCP\Util::computerFileSize($_POST['maxUploadSize']))) !== false) {
					$maxUploadFilesize = \OCP\Util::humanFileSize($setMaxSize);
				}
			}
		}

		$htaccessWritable=is_writable(\OC::$SERVERROOT.'/.htaccess');
		$userIniWritable=is_writable(\OC::$SERVERROOT.'/.user.ini');

		$tmpl = new Template( 'files', 'admin' );
		$tmpl->assign('urlGenerator', $this->urlGenerator);
		$tmpl->assign( 'uploadChangable', ($htaccessWorking and $htaccessWritable) or $userIniWritable );
		$tmpl->assign( 'uploadMaxFilesize', $maxUploadFilesize);
		// max possible makes only sense on a 32 bit system
		$tmpl->assign( 'displayMaxPossibleUploadSize', PHP_INT_SIZE===4);
		$tmpl->assign( 'maxPossibleUploadSize', \OCP\Util::humanFileSize(PHP_INT_MAX));
		return $tmpl;
		}

}
