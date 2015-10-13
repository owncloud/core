<?php

$factory = \OC::$server->getTwoFactorAuthenticationFactory();
$factory->registerProvider(new \OCA\providerexample\appinfo\StaticCodeProvider());
