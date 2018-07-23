<?php
/**
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

namespace OC\Settings;

use OC\Security\CertificateManager;
use OC\Settings\Panels\Admin\Apps;
use OC\Settings\Panels\Helper;
use OCP\App\IAppManager;
use OCP\IDBConnection;
use OCP\L10N\IFactory;
use OCP\Lock\ILockingProvider;
use OCP\Settings\ISettingsManager;
use OCP\Settings\ISection;
use OCP\Settings\ISettings;
use OCP\ILogger;
use OCP\IL10N;
use OCP\IUserSession;
use OCP\AppFramework\QueryException;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\Defaults;
use OCP\IURLGenerator;

use OC\Settings\Panels\Personal\Profile;
use OC\Settings\Panels\Personal\Legacy as LegacyPersonal;
use OC\Settings\Panels\Admin\Legacy as LegacyAdmin;
use OC\Settings\Panels\Personal\Clients;
use OC\Settings\Panels\Personal\Version;
use OC\Settings\Panels\Personal\Tokens;
use OC\Settings\Panels\Personal\Cors;
use OC\Settings\Panels\Personal\Quota;
use OC\Settings\Panels\Admin\BackgroundJobs;
use OC\Settings\Panels\Admin\Certificates;
use OC\Settings\Panels\Admin\Encryption;
use OC\Settings\Panels\Admin\FileSharing;
use OC\Settings\Panels\Admin\Legal;
use OC\Settings\Panels\Admin\Mail;
use OC\Settings\Panels\Admin\Logging;
use OC\Settings\Panels\Admin\SecurityWarning;
use OC\Settings\Panels\Admin\Tips;
use OC\Settings\Panels\Admin\Status;

/*
 * @since 10.0
 */
class SettingsManager implements ISettingsManager {

	/** @var IL10N */
	protected $l;
	/** @var IAppManager */
	protected $appManager;
	/** @var ILogger */
	protected $logger;
	/** @var IURLGenerator */
	protected $urlGenerator;
	/** @var Defaults  */
	protected $defaults;
	/** @var IUserSession  */
	protected $userSession;
	/** @var ILogger  */
	protected $log;
	/** @var IConfig  */
	protected $config;
	/** @var IGroupManager  */
	protected $groupManager;
	/** @var Helper */
	protected $helper;
	/** @var IFactory  */
	protected $lfactory;
	/** @var IDBConnection  */
	protected $dbconnection;
	/** @var ILockingProvider  */
	protected $lockingProvider;
	/** @var CertificateManager  */
	protected $certificateManager;

	/**
	 * Holds a cache of ISettings with keys for type
	 */
	protected $panels = [];

	/**
	 * Holds an array of sections
	 */
	protected $sections = [];

	/**
	 * @param IL10N $l
	 * @param IAppManager $appManager
	 * @param IUserSession $userSession
	 * @param ILogger $logger
	 * @param IGroupManager $groupManager
	 * @param IConfig $config
	 * @param Defaults $defaults
	 * @param IURLGenerator $urlGenerator
	 * @param Helper $helper
	 * @param ILockingProvider $lockingProvider
	 * @param IDBConnection $dbconnection
	 * @param CertificateManager $certificateManager
	 * @param IFactory $lfactory
	 */
	public function __construct(IL10N $l,
								IAppManager $appManager,
								IUserSession $userSession,
								ILogger $logger,
								IGroupManager $groupManager,
								IConfig $config,
								Defaults $defaults,
								IURLGenerator $urlGenerator,
								Helper $helper,
								ILockingProvider $lockingProvider,
								IDBConnection $dbconnection,
								$certificateManager,
								IFactory $lfactory) {
		$this->l = $l;
		$this->appManager = $appManager;
		$this->userSession = $userSession;
		$this->config = $config;
		$this->groupManager = $groupManager;
		$this->log = $logger;
		$this->defaults = $defaults;
		$this->urlGenerator = $urlGenerator;
		$this->helper = $helper;
		$this->lockingProvider = $lockingProvider;
		$this->dbconnection = $dbconnection;
		$this->certificateManager = $certificateManager;
		$this->lfactory = $lfactory;
	}

	public function getPersonalSections() {
		// Trigger a load of all personal panels to discover sections
		$this->loadPanels('personal');
		return $this->sections['personal'];
	}

	public function getAdminSections() {
		// Trigger a load of all admin panels to discover sections
		$this->loadPanels('admin');
		return $this->sections['admin'];
	}

	/**
	 * Returns ISettings for the personal settings in the given section
	 * @param string $sectionID
	 * @return array of ISection
	 */
	public function getPersonalPanels($sectionID) {
		// Trigger a load of all personal panels to discover sections
		$this->loadPanels('personal');
		if (isset($this->panels['personal'][$sectionID])) {
			return $this->panels['personal'][$sectionID];
		} else {
			return [];
		}
	}

	/**
	 * Returns ISettings for the admin settings in the given section
	 * @param string $sectionID
	 * @return array of ISection
	 */
	public function getAdminPanels($sectionID) {
		// Trigger a load of all admin panels to discover sections
		$this->loadPanels('admin');
		if (isset($this->panels['admin'][$sectionID])) {
			return $this->panels['admin'][$sectionID];
		} else {
			return [];
		}
	}

	/**
	 * Returns the default set of ISections used in core
	 * @param string $type the type of sections to return
	 * @return array of ISection
	 */
	private function getBuiltInSections($type) {
		if ($type === 'admin') {
			return [
				new Section('apps', $this->l->t('Apps'), 105, 'list'),
				new Section('general', $this->l->t('General'), 100),
				new Section('storage', $this->l->t('Storage'), 95, 'folder'),
				new Section('security', $this->l->t('Security'), 90, 'shield'),
				new Section('authentication', $this->l->t('User Authentication'), 87, 'user'),
				new Section('encryption', $this->l->t('Encryption'), 85, 'password'),
				new Section('workflow', $this->l->t('Workflows & Tags'), 85, 'workflows'),
				new Section('sharing', $this->l->t('Sharing'), 80, 'share'),
				new Section('search', $this->l->t('Search'), 75, 'search'),
				new Section('help', $this->l->t('Help & Tips'), -5, 'info'),
				new Section('additional', $this->l->t('Additional'), -10, 'more'),
			];
		} elseif ($type === 'personal') {
			return [
				new Section('general', $this->l->t('General'), 100, 'user'),
				new Section('storage', $this->l->t('Storage'), 50, 'folder'),
				new Section('security', $this->l->t('Security'), 30, 'shield'),
				new Section('encryption', $this->l->t('Encryption'), 20),
				new Section('additional', $this->l->t('Additional'), -10, 'more'),
			];
		}
	}

	/**
	 * Returns an array of classnames for built in settings panels
	 * @param string $type the type of panels to load
	 * @return array of strings
	 */
	private function getBuiltInPanels($type) {
		if ($type === 'admin') {
			return [
				LegacyAdmin::class,
				BackgroundJobs::class,
				Logging::class,
				Tips::class,
				SecurityWarning::class,
				Mail::class,
				FileSharing::class,
				Encryption::class,
				Certificates::class,
				Apps::class,
				Legal::class,
				Status::class
			];
		} elseif ($type === 'personal') {
			return [
				Profile::class,
				Clients::class,
				LegacyPersonal::class,
				Version::class,
				Tokens::class,
				Cors::class,
				Quota::class
			];
		}
	}

	/**
	 * Gets panel objects with dependencies instantiated from the container
	 * @param string $className
	 * @return array|false
	 */
	public function getBuiltInPanel($className) {
		$panels = [
			// Personal
			Profile::class => new Profile(
				$this->config,
				$this->groupManager,
				$this->userSession,
				$this->lfactory,
				new \OC\Helper\LocaleHelper()
			),
			LegacyPersonal::class => new LegacyPersonal($this->helper),
			Clients::class => new Clients($this->config, $this->defaults),
			Version::class => new Version(),
			Tokens::class => new Tokens(),
			Cors::class => new Cors(
				$this->userSession,
				$this->urlGenerator,
				$this->config),
			Quota::class => new Quota($this->helper),
			// Admin
			BackgroundJobs::class => new BackgroundJobs($this->config),
			Certificates::class => new Certificates(
				$this->config,
				$this->urlGenerator,
				$this->certificateManager),
			Encryption::class => new Encryption(),
			FileSharing::class => new FileSharing($this->config, $this->helper, $this->l),
			Logging::class => new Logging($this->config, $this->urlGenerator, $this->helper),
			Mail::class => new Mail($this->config, $this->helper),
			SecurityWarning::class => new SecurityWarning(
				$this->l,
				$this->config,
				$this->dbconnection,
				$this->helper,
				$this->lockingProvider),
			Tips::class => new Tips(),
			LegacyAdmin::class => new LegacyAdmin($this->helper),
			Apps::class => new Apps($this->config),
			Legal::class => new Legal($this->config)
		];
		if (isset($panels[$className])) {
			return $panels[$className];
		} else {
			return false;
		}
	}

	/**
	 * Gets all the panels for ownCloud
	 * @param string $type the type of panels to return
	 * @return array of strings
	 */
	public function getPanelsList($type) {
		return \array_merge($this->findRegisteredPanels($type), $this->getBuiltInPanels($type));
	}

	/**
	 * Searches through the currently enabled apps and returns the panels registered
	 * @param string $type the type of panels to return
	 * @return array of strings with panel class names
	 */
	protected function findRegisteredPanels($type) {
		$panels = [];
		foreach ($this->appManager->getEnabledAppsForUser($this->userSession->getUser()) as $app) {
			if (isset($this->appManager->getAppInfo($app)['settings'])) {
				foreach ($this->appManager->getAppInfo($app)['settings'] as $t => $detected) {
					if ($t === $type) {
						// Allow app to register multiple panels of the same type
						$detected = \is_array($detected) ? $detected : [$detected];
						$panels = \array_merge($panels, $detected);
					}
				}
			}
		}
		return $panels;
	}

	/**
	 * Searches through the currently enabled apps and returns the sections registered
	 * @param string $type the type of sections to return
	 * @return ISection[]
	 */
	protected function findRegisteredSections($type) {
		$sections = [];
		foreach ($this->appManager->getEnabledAppsForUser($this->userSession->getUser()) as $app) {
			if (isset($this->appManager->getAppInfo($app)['settings-sections'])) {
				foreach ($this->appManager->getAppInfo($app)['settings-sections'] as $t => $section) {
					if ($t === $type) {
						try {
							$sections[] = \OC::$server->query($section);
						} catch (QueryException $e) {
							$this->logger->error('Settings section not found: '.$section);
						}
					}
				}
			}
		}
		return $sections;
	}

	/**
	 * Attempts to load a ISettings using the class name
	 * @param string $className
	 * @throws QueryException
	 * @return ISettings
	 */
	protected function loadPanel($className) {
		try {
			if (!$panel = $this->getBuiltInPanel($className)) {
				$panel = \OC::$server->query($className);
			}
			if (!$panel instanceof ISettings) {
				$this->log->error(
					'Class: {class} not an instance of OCP\Settings\ISettings',
					['class' => $className]);
			} else {
				return $panel;
			}
		} catch (QueryException $e) {
			$this->log->error(
				'Failed to load panel: {class} with error: {error}',
				[
					'class' => $className,
					'error' => $e->getMessage()
				]);
			throw $e;
		}
	}

	/**
	 * Find and return ISettings for the given type
	 * @param string $type of panels to load
	 * @return array of ISettings
	 */
	public function loadPanels($type) {
		// If already loaded just return
		if (!empty($this->panels[$type])) {
			return $this->panels[$type];
		}
		// Find the panels from info xml
		$panels = $this->getPanelsList($type);
		// Load the classes using the server container
		if (empty($panels)) {
			return [];
		}
		foreach ($panels as $panelClassName) {
			// Attempt to load the panel
			try {
				$panel = $this->loadPanel($panelClassName);
				$section = $this->loadSection($type, $panel->getSectionID());
				$this->panels[$type][$section->getID()][] = $panel;
				$this->sections[$type][$section->getID()] = $section;
				// Now try and initialise the ISection from the panel
			} catch (QueryException $e) {
				// Just skip this panel, either its section or panel could not be loaded
			}
		}
		// Return the panel array sorted
		foreach ($this->panels[$type] as $sectionID => $section) {
			$this->panels[$type][$sectionID] = $this->sortOrder($this->panels[$type][$sectionID]);
		}
		// sort section array
		$this->sections[$type] = $this->sortOrder($this->sections[$type]);
		return $this->panels[$type];
	}

	/**
	 * Return the section object for the corresponding type and sectionID
	 * @param string $type
	 * @param string $sectionID
	 * @throws QueryException
	 * @return ISection
	 */
	protected function loadSection($type, $sectionID) {
		// Load built in sections
		foreach ($this->getBuiltInSections($type) as $section) {
			if ($section->getID() === $sectionID) {
				return $section;
			}
		}

		// Load sections from registered list
		foreach ($this->findRegisteredSections($type) as $section) {
			if ($section->getID() === $sectionID) {
				return $section;
			}
		}

		$this->log->error('Section id not found: "'.$sectionID.'". Apps should register settings sections in info.xml');
		throw new QueryException();
	}

	/**
	 * Sort the array of ISettings or ISections by their priority attribute
	 * @param array $objects (ISections of ISettings)
	 * @return array
	 */
	protected function sortOrder($objects) {
		\usort($objects, function ($a, $b) {
			/** @var ISection | ISettings $a */
			/** @var ISection | ISettings $b */
			return $a->getPriority() < $b->getPriority();
		});
		return $objects;
	}
}
