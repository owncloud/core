<?php
/**
 * Copyright (c) 2013 Tom Needham <tom@owncloud.com>
 * Copyright (c) 2015 Roeland Jago Douma <roeland@famdouma.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
 
namespace OCA\Files; 

class Capabilities {

	private $config;

	public function __construct($config) {
		$this->config = $config;
	}

	public static function getCapabilities() {
        $config = \OC::$server->getConfig();
	    $cap = new Capabilities($config);
	    return $cap->getCaps();
	}

	public function getCaps() {
		$res = array(
			'bigfilechunking' => true,
		);

		if ($this->config->getSystemValue('enable_previews', true) == true) {
			$res["thumbnails"] = true;
		}

		return new \OC_OCS_Result(array(
			'capabilities' => array(
				'files' => $res,
				),
			));
	}
	
}
