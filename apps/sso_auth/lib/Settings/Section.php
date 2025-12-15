<?php

namespace OCA\SsoAuth\Settings;

use OCP\Settings\ISection;

class Section implements ISection
{
    public function getID() {
        return 'sso_auth';
    }

    public function getName() {
        return 'SSO Authentication';
    }

    public function getPriority() {
        return 50;
    }

    public function getIconName() {
        return 'settings';
    }
}