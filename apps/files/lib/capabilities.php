<?php
/**
 * Copyright (c) 2013 Tom Needham <tom@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
 
namespace OCA\Files; 

class Capabilities {
	
	public static function getCapabilities() {
		$caps = array(
			'bigfilechunking' => true,
		);
	
		if (\OC_Config::getValue('dbtype', 'sqlite') === 'sqlite3') {
			$caps['maxparallels'] = 1;
		} else {
			$caps['maxparallels'] = 0;
		}

		return new \OC_OCS_Result(array(
			'capabilities' => array(
					'files' => $caps
				),
			)
		);
		return new \OC_OCS_Result($caps);
	}
	
}
