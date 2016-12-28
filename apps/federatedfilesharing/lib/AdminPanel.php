<?php

namespace OCA\FederatedFileSharing;

use OCP\Settings\ISettings;
use OCP\Template;
use OCA\FederatedFileSharing\AppInfo\Application;

class AdminPanel implements ISettings {

    public function getPriority() {
        return 95;
    }

    public function getSectionID() {
        return 'sharing';
    }

    public function getPanel() {
        $app = new Application('federatedfilesharing');
        $federatedShareProvider = $app->getFederatedShareProvider();
        $tmpl = new Template('federatedfilesharing', 'settings-admin');
        $tmpl->assign('outgoingServer2serverShareEnabled', $federatedShareProvider->isOutgoingServer2serverShareEnabled());
        $tmpl->assign('incomingServer2serverShareEnabled', $federatedShareProvider->isIncomingServer2serverShareEnabled());

        return $tmpl;
    }

}
