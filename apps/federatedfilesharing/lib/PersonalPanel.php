<?php

namespace OCA\FederatedFileSharing;

use OCP\Settings\ISettings;
use OCP\Template;
use OCA\FederatedFileSharing\AppInfo\Application;

class PersonalPanel implements ISettings {

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'general';
    }

    public function getPanel() {
		$l = \OC::$server->getL10N('federatedfilesharing');
		$app = new Application('federatedfilesharing');
		$federatedShareProvider = $app->getFederatedShareProvider();
		$isIE8 = false;
		preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
		if (count($matches) > 0 && $matches[1] <= 9) {
			$isIE8 = true;
		}
		$cloudID = \OC::$server->getUserSession()->getUser()->getCloudId();
		$url = 'https://owncloud.org/federation#' . $cloudID;
		$ownCloudLogoPath = \OC::$server->getURLGenerator()->imagePath('core', 'logo-icon.svg');
		$tmpl = new Template('federatedfilesharing', 'settings-personal');
		$tmpl->assign('outgoingServer2serverShareEnabled', $federatedShareProvider->isOutgoingServer2serverShareEnabled());
		$tmpl->assign('message_with_URL', $l->t('Share with me through my #ownCloud Federated Cloud ID, see %s', [$url]));
		$tmpl->assign('message_without_URL', $l->t('Share with me through my #ownCloud Federated Cloud ID', [$cloudID]));
		$tmpl->assign('owncloud_logo_path', $ownCloudLogoPath);
		$tmpl->assign('reference', $url);
		$tmpl->assign('cloudId', $cloudID);
		$tmpl->assign('showShareIT', !$isIE8);
		return $tmpl;
    }

}
