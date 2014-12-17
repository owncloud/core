<?php
/**
 * ownCloud
 *
 * @author Joas Schilling
 * @copyright 2014 Joas Schilling nickvergessen@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;


use OCP\IConfig;
use OCP\IDateTimeZone;
use OCP\ISession;
use OCP\IUserSession;

class DateTimeZone implements IDateTimeZone {
	/** @var IConfig */
	protected $config;

	/** @var ISession */
	protected $session;

	/** @var IUserSession */
	protected $userSession;

	/**
	 * @param IConfig $config
	 * @param IUserSession $userSession
	 * @param ISession $session
	 */
	public function __construct(IConfig $config,
								IUserSession $userSession,
								ISession $session) {
		$this->config = $config;
		$this->userSession = $userSession;
		$this->session = $session;
	}

	/**
	 * Get the timezone of the current user, based on his session information and config data
	 *
	 * @return \DateTimeZone
	 */
	public function getTimeZone() {
		$timeZone = $this->config->getUserValue($this->userSession->getUser()->getUID(), 'core', 'timezone', null);
		if ($timeZone === null) {
			if ($this->session->exists('timezone')) {
				$offsetHours = $this->session->get('timezone');
				// Note: the timeZone name is the inverse to the offset,
				// so a positive offset means negative timeZone
				// and the other way around.
				if ($offsetHours > 0) {
					return new \DateTimeZone('Etc/GMT-' . $offsetHours);
				} else {
					return new \DateTimeZone('Etc/GMT+' . abs($offsetHours));
				}
			} else {
				return new \DateTimeZone('UTC');
			}
		}
		return new \DateTimeZone($timeZone);
	}
}
