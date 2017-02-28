<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\ConfigReport\Controller;

use OCA\ConfigReport\Http\ReportResponse;
use OCP\AppFramework\Controller;
use OCP\IConfig;
use OCP\IRequest;

/**
 * Class ReportController is used to handle report generation on the admin
 * settings page
 *
 * @package OCA\ConfigReport\Controller
 */
class ReportController extends Controller {

	/**
	 * @var IConfig
	 */
	private $config;

	public function __construct($AppName, IRequest $request, IConfig $config) {
		parent::__construct($AppName, $request);
		$this->config = $config;
	}

	/**
	 * AJAX handler for getting the config report
	 *
	 * @return ReportResponse with the report
	 */
	public function getReport() {
		$sensitiveServerConfigs = [
			'HTTP_COOKIE',
			'PATH',
			'Cookie',
			'include_path',
		];

		$l = \OC::$server->getL10N('config_report');

		$error = false;

		// Basic report data
		// TODO $homecount should be determined by \OC::$server->getUserManager()->search()
		// and then checking the lastLoginTime of each user object, leaving current impl intact
		$userids = \OC_User::getUsers();
		$homecount = 0;
		foreach($userids as $uid) {
			if(\OC::$server->getUserManager()->get($uid)) {
				$homecount++;
			}
		}
		$report = array(
			'basic' => array(
				'license key' => \OC::$server->getConfig()->getSystemValue('license-key'),
				'date' => date('r'),
				'ownCloud version' => implode('.', \OC_Util::getVersion()),
				'ownCloud version string' => \OC_Util::getVersionString(),
				'ownCloud edition' => \OC_Util::getEditionString(),
				'server OS' => PHP_OS,
				'server OS version' => php_uname(),
				'server SAPI' => php_sapi_name(),
				'webserver version' => $_SERVER['SERVER_SOFTWARE'],
				'hostname' => $_SERVER['HTTP_HOST'],
				'user count' => count($userids),
				'user directories' => $homecount,
				'logged-in user' => \OCP\User::getDisplayName(),
			),
			'integritychecker' => [
				'passing' => \OC::$server->getIntegrityCodeChecker()->hasPassedCheck(),
				'enabled' => \OC::$server->getIntegrityCodeChecker()->isCodeCheckEnforced(),
				'result' => \OC::$server->getIntegrityCodeChecker()->getResults(),
			],
		);

		// Get app data
		$apps = \OC_App::listAllApps(false, false, \OC::$server->getOcsClient());
		foreach($apps as &$app) {
			if($app['active']) {
				$appConfig = \OC::$server->getAppConfig()->getValues($app['id'], false);
				foreach($appConfig as $key => $value) {
					if (stripos($key, 'password') !== FALSE) {
						$appConfig[$key] = \OCP\IConfig::SENSITIVE_VALUE;
					}
				}
				$app['appconfig'] = $appConfig;
			}
		}
		$report['apps'] = $apps;

		// Get the OC config and filter out the sensitive bits
		$systemConfig = \OC::$server->getSystemConfig();
		$keys = $systemConfig->getKeys();
		foreach ($keys as $key) {
			$report['config'][$key] = $systemConfig->getFilteredValue($key);
		}

		// Get the phpinfo, parse it, and record it (parts from http://www.php.net/manual/en/function.phpinfo.php#87463)
		ob_start();
		phpinfo(-1);

		$phpinfo = preg_replace(
			array('#^.*<body>(.*)</body>.*$#ms', '#<h2>PHP License</h2>.*$#ms',
				'#<h1>Configuration</h1>#', "#\r?\n#", "#</(h1|h2|h3|tr)>#", '# +<#',
				"#[ \t]+#", '#&nbsp;#', '#  +#', '# class=".*?"#', '%&#039;%',
				'#<tr>(?:.*?)" src="(?:.*?)=(.*?)" alt="PHP Logo" /></a>'
				. '<h1>PHP Version (.*?)</h1>(?:\n+?)</td></tr>#',
				'#<h1><a href="(?:.*?)\?=(.*?)">PHP Credits</a></h1>#',
				'#<tr>(?:.*?)" src="(?:.*?)=(.*?)"(?:.*?)Zend Engine (.*?),(?:.*?)</tr>#',
				"# +#", '#<tr>#', '#</tr>#'),
			array('$1', '', '', '', '</$1>' . "\n", '<', ' ', ' ', ' ', '', ' ',
				'<h2>PHP Configuration</h2>' . "\n" . '<tr><td>PHP Version</td><td>$2</td></tr>' .
				"\n" . '<tr><td>PHP Egg</td><td>$1</td></tr>',
				'<tr><td>PHP Credits Egg</td><td>$1</td></tr>',
				'<tr><td>Zend Engine</td><td>$2</td></tr>' . "\n" .
				'<tr><td>Zend Egg</td><td>$1</td></tr>', ' ', '%S%', '%E%'),
		ob_get_clean());

		$sections = explode('<h2>', strip_tags($phpinfo, '<h2><th><td>'));
		unset($sections[0]);

		$report['phpinfo'] = array();
		$sensitiveServerConfigs = array_flip($sensitiveServerConfigs);
		foreach ($sections as $section) {
			$n = substr($section, 0, strpos($section, '</h2>'));
			if ($n === 'PHP Variables') {
				continue;
			}
			preg_match_all(
				'#%S%(?:<td>(.*?)</td>)?(?:<td>(.*?)</td>)?(?:<td>(.*?)</td>)?%E%#',
				$section, $matches, PREG_SET_ORDER);
			foreach ($matches as $match) {
				if (isset($sensitiveServerConfigs[$match[1]])) {
					continue;
					// filter all key which contain 'password'
				}
				if(!isset($match[3])) {
					$value = isset($match[2]) ? $match[2] : null;
				}
				elseif($match[2] == $match[3]) {
					$value = $match[2];
				}
				else {
					$value = array_slice($match, 2);
				}
				$report['phpinfo'][$n][$match[1]] = $value;
			}
		}

		return new ReportResponse($report);
	}

}
