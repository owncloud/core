<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Core\Controller;

class Update {
	protected $updater;
	protected $eventSource;

	public function __construct($updater, $eventSource = null) {
		$this->updater = $updater;
		$this->eventSource = $eventSource;
	}

	public function doUpgrade($msg, $failure) {
		$this->updater->listen('\OC\Updater', 'maintenanceStart', function () use ($msg) {
			$msg('Turned on maintenance mode');
		});
		$this->updater->listen('\OC\Updater', 'maintenanceEnd', function () use ($msg) {
			$msg('Turned off maintenance mode');
		});
		$this->updater->listen('\OC\Updater', 'dbUpgrade', function () use ($msg) {
			$msg('Updated database');
		});
		$this->updater->listen('\OC\Updater', 'filecacheStart', function () use ($msg) {
			$msg('Updating filecache, this may take really long...');
		});
		$this->updater->listen('\OC\Updater', 'filecacheDone', function () use ($msg) {
			$msg('Updated filecache');
		});
		$this->updater->listen('\OC\Updater', 'filecacheProgress', function ($out) use ($msg) {
			$msg('... ' . $out . '% done ...');
		});
		$this->updater->listen('\OC\Updater', 'failure', function ($message) use ($failure) {
			\OC_Config::setValue('maintenance', false);
			$failure($message);
		});

		try {
			$this->updater->upgrade();
		} catch(Exception $e) {
			$failure($e->getMessage());
		}
	}
}
