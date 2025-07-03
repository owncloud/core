<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\UpdateNotification\Controller;

use OCA\UpdateNotification\UpdateChecker;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IDateTimeFormatter;
use OCP\IL10N;
use OCP\IRequest;
use OCP\Security\ISecureRandom;
use OCP\Settings\ISettings;

class AdminController extends Controller implements ISettings {
	/** @var IJobList */
	private $jobList;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var UpdateChecker */
	private $updateChecker;
	/** @var IL10N */
	private $l10n;
	/** @var IDateTimeFormatter */
	private $dateTimeFormatter;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IJobList $jobList
	 * @param ISecureRandom $secureRandom
	 * @param IConfig $config
	 * @param ITimeFactory $timeFactory
	 * @param IL10N $l10n
	 * @param UpdateChecker $updateChecker
	 * @param IDateTimeFormatter $dateTimeFormatter
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IJobList $jobList,
		ISecureRandom $secureRandom,
		IConfig $config,
		ITimeFactory $timeFactory,
		IL10N $l10n,
		UpdateChecker $updateChecker,
		IDateTimeFormatter $dateTimeFormatter
	) {
		parent::__construct($appName, $request);
		$this->jobList = $jobList;
		$this->secureRandom = $secureRandom;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
		$this->l10n = $l10n;
		$this->updateChecker = $updateChecker;
		$this->dateTimeFormatter = $dateTimeFormatter;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'general';
	}

	public function getPanel() {
		if (\OC_Util::getEditionString() === 'Enterprise') {
			return $this->displayEnterprisePanel();
		}

		return $this->displayPanel();
	}

	/**
	 * @return TemplateResponse
	 */
	public function displayEnterprisePanel() {
		return new TemplateResponse($this->appName, 'enterprise', [], '');
	}

	/**
	 * @return TemplateResponse
	 */
	public function displayPanel() {
		$lastUpdateCheck = $this->dateTimeFormatter->formatDateTime(
			$this->config->getAppValue('core', 'lastupdatedat')
		);

		$channels = [
			'daily',
			'beta',
			'stable',
			'production',
		];
		$currentChannel = \OCP\Util::getChannel();

		// Remove the currently used channel from the channels list
		if (($key = \array_search($currentChannel, $channels)) !== false) {
			unset($channels[$key]);
		}
		$updateState = $this->updateChecker->getUpdateState();

		$notifyGroups = \json_decode($this->config->getAppValue('updatenotification', 'notify_groups', '["admin"]'), true);
		
		$isNewVersionAvailable = ($updateState === []) ? false : true;
		$newVersionString = ($updateState === []) ? '' : $updateState['updateVersion'];
		
		$params = [
			'isNewVersionAvailable' => $isNewVersionAvailable,
			'lastChecked' => $lastUpdateCheck,
			'currentChannel' => $currentChannel,
			'channels' => $channels,
			'newVersionString' => $newVersionString,

			'notify_groups' => \implode('|', $notifyGroups),
		];

		return new TemplateResponse($this->appName, 'admin', $params, '');
	}

	/**
	 * @UseSession
	 *
	 * @param string $channel
	 * @return DataResponse
	 */
	public function setChannel($channel) {
		\OCP\Util::setChannel($channel);
		$this->config->setAppValue('core', 'lastupdatedat', 0);
		return new DataResponse(['status' => 'success', 'data' => ['message' => $this->l10n->t('Updated channel')]]);
	}
}
