<?php

namespace OCA\FederatedFileSharing;

use OCP\Settings\ISettings;
use OCP\Template;

class AdminPanel implements ISettings {

	/** @var FederatedShareProvider  */
	protected $shareProvider;

	/**
	 * AdminPanel constructor.
	 *
	 * @param FederatedShareProvider $shareProvider
	 */
	public function __construct(FederatedShareProvider $shareProvider) {
		$this->shareProvider = $shareProvider;
	}

	public function getPriority() {
        return 95;
    }

    public function getSectionID() {
        return 'sharing';
    }

    public function getPanel() {
        $tmpl = new Template('federatedfilesharing', 'settings-admin');
        $tmpl->assign('outgoingServer2serverShareEnabled', $this->shareProvider->isOutgoingServer2serverShareEnabled());
        $tmpl->assign('incomingServer2serverShareEnabled', $this->shareProvider->isIncomingServer2serverShareEnabled());
        return $tmpl;
    }

}
