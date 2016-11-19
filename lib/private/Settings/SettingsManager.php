<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Settings;

use OC\Settings\Panels\Admin\Apps;
use OCP\IUser;
use OCP\Settings\ISettingsManager;
use OCP\Settings\ISection;
use OC\App\AppManager;
use OCP\Settings\IPanel;
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
use OC\Settings\Panels\Personal\AppPasswords;
use OC\Settings\Panels\Admin\BackgroundJobs;
use OC\Settings\Panels\Admin\Certificates;
use OC\Settings\Panels\Admin\Encryption;
use OC\Settings\Panels\Admin\FileSharing;
use OC\Settings\Panels\Admin\Mail;
use OC\Settings\Panels\Admin\Logging;
use OC\Settings\Panels\Admin\SecurityWarning;
use OC\Settings\Panels\Admin\Updater;
use OC\Settings\Panels\Admin\Tips;

/*
 * @since 9.2
 */
class SettingsManager implements ISettingsManager {

    /** @var IL10N */
    protected $l;

    /** @var AppManager */
    protected $appManager;

    /** @var ILogger */
    protected $logger;

    /** @var IUser */
    protected $user;

	/** @var IURLGenerator */
	protected $urlGenerator;

    /**
     * Holds a cache of IPanels with keys for type
     */
    protected $panels = [];

    /**
     * Holds an array of sections
     */
    protected $sections = [];

    /**
     * @param IL10N $l
     * @param AppManager $appManager
     * @param IUserSession $userSession
     * @param ILogger $logger
     */
    public function __construct(IL10N $l,
								AppManager $appManager,
								IUserSession $userSession,
								ILogger $logger,
								IGroupManager $groupManager,
								IConfig $config,
								Defaults $defaults,
								IURLGenerator $urlGenerator) {
        $this->l = $l;
        $this->appManager = $appManager;
        $this->userSession = $userSession;
        $this->user = $this->userSession->getUser();
        $this->config = $config;
        $this->groupManager = $groupManager;
        $this->log = $logger;
        $this->defaults = $defaults;
		$this->urlGenerator = $urlGenerator;
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
     * Returns IPanels for the personal settings in the given section
     * @param string $sectionID
     * @return array of ISection
     */
    public function getPersonalPanels($sectionID) {
        // Trigger a load of all personal panels to discover sections
        $this->loadPanels('personal');
        if(isset($this->panels['personal'][$sectionID])) {
            return $this->panels['personal'][$sectionID];
        } else {
            return [];
        }
    }

    /**
     * Returns IPanels for the admin settings in the given section
     * @param string $sectionID
     * @return array of ISection
     */
    public function getAdminPanels($sectionID) {
        // Trigger a load of all admin panels to discover sections
        $this->loadPanels('admin');
        if(isset($this->panels['admin'][$sectionID])) {
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
        if($type === 'admin') {
            return [
				new Section('general', $this->l->t('General'), 100),
				new Section('sharing', $this->l->t('Sharing'), 99),
				new Section('security', $this->l->t('Security'), 98),
				new Section('monitoring', $this->l->t('Monitoring'), 30),
				new Section('updates', $this->l->t('Updates'), 20),
				new Section('apps', $this->l->t('Apps'), 10),
				new Section('additional', $this->l->t('Additional'), 5),
            ];
        } else if($type === 'personal') {
            return [
                new Section('general', $this->l->t('General'), 100),
                new Section('security', $this->l->t('Security'), 50),
                new Section('additional', $this->l->t('Additional'), 5),
            ];
        }
    }

    /**
     * Returns an array of classnames for built in settings panels
     * @return array of strings
     */
    private function getBuiltInPanels() {
        return [
            'personal' => [
                Profile::class,
                Clients::class,
                LegacyPersonal::class,
                Version::class,
                AppPasswords::class,
            ],
            'admin' => [
                LegacyAdmin::class,
                Updater::class,
                BackgroundJobs::class,
                Logging::class,
                Tips::class,
                SecurityWarning::class,
                Mail::class,
                FileSharing::class,
                Encryption::class,
                Certificates::class,
				Apps::class
            ]
        ];
    }

    /**
     * Gets panel objects with dependancies instantiated from the container
     * @param string $className
     */
    private function getBuiltInPanel($className) {
        $panels = [
            // Personal
            Profile::class => new Profile($this->config, $this->groupManager, $this->userSession),
            LegacyPersonal::class => new LegacyPersonal(),
            Clients::class => new Clients($this->config, $this->defaults),
            Version::class => new Version(),
            AppPasswords::class => new AppPasswords(),
            // Admin
            BackgroundJobs::class => new BackgroundJobs($this->config),
            Certificates::class => new Certificates($this->config, $this->urlGenerator),
            Encryption::class => new Encryption(),
            FileSharing::class => new FileSharing(),
            Logging::class => new Logging($this->config, $this->urlGenerator),
            Mail::class => new Mail($this->config),
            SecurityWarning::class => new SecurityWarning(),
            Tips::class => new Tips(),
            Updater::class => new Updater(),
            LegacyAdmin::class => new LegacyAdmin(),
        ];
        if(isset($panels[$className])) {
            return $panels[$className];
        } else {
            return false;
        }
    }

    /**
     * Gets all the panels for ownCloud
     * @param string $type the type of sections to return
     * @return array of strings
     */
    protected function getPanelsList($type) {
        $registered = isset($this->findRegisteredPanels()[$type]) ? $this->findRegisteredPanels()[$type] : [];
        $builtIn = isset($this->getBuiltInPanels()[$type]) ? $this->getBuiltInPanels()[$type] : [];
        return array_merge($registered, $builtIn);
    }


    /**
     * Searches through the currently enabled apps and returns the panels registered
     * @return array of strings
     */
    protected function findRegisteredPanels() {
        $panels = [];
        foreach($this->appManager->getEnabledAppsForUser($this->user) as $app) {
            if(isset($this->appManager->getAppInfo($app)['settings'])) {
                foreach($this->appManager->getAppInfo($app)['settings'] as $type => $panel) {
                    $panels[$type][] = $panel;
                }
            }
        }
        return $panels;
    }

    /**
     * Attempts to load a IPanel using the class name
     * @param string $className
     * @throws QueryException
     * @return IPanel
     */
    protected function loadPanel($className) {
        try {
            if(!$panel = $this->getBuiltInPanel($className)) {
                $panel = \OC::$server->query($className);
            }
            if(!$panel instanceof IPanel) {
                $this->log->error(
                    'Class: {class} not an instance of OCP\Settings\IPanel',
                    ['class' => $className]);
            } else {
                return $panel;
            }
        } catch (QueryException $e) {
            $this->log->error(
                'Failed to load panel with class name: {class}',
                ['class' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Find and return IPanels for the given type
     * @param string $type of panels to load
     * @return array of IPanels
     */
    public function loadPanels($type) {
        // If already loaded just return
        if(!empty($this->panels[$type])) {
            return $this->panels[$type];
        }
        // Find the panels from info xml
        $panels = $this->getPanelsList($type);
        // Load the classes using the server container
        if(empty($panels)) {
            return [];
        }
        foreach($panels as $panelClassName) {
            // Attempt to load the panel
            try {
                $panel = $this->loadPanel($panelClassName);
                $section = $this->loadSection($type, $panel->getSectionID());
                $this->panels[$type][$section->getID()][] = $panel;
                $this->sections[$type][$section->getID()] = $section;
                // Now try and initialise the ISection from the panel
            } catch (QueryException $e) {
                // Just skip this panel, either its section of panel could not be loaded
            }
        }
		// Return the panel array sorted
		foreach($this->panels[$type] as $sectionID => $section) {
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
     * @return ISection
     */
    protected function loadSection($type, $sectionID) {
        // Load sections from defalt list
        foreach($this->getBuiltInSections($type) as $section) {
            if($section->getID() === $sectionID) {
                return $section;
            }
        }
        $this->log->error(
            'Failed to load section with id: {id}',
            ['id' => $sectionID]);
        throw new QueryException('Panel could not be loaded');
    }

    /**
     * Sort the array of IPanels or ISections by their priority attribute
     * @param array $objects (ISections of IPanels)
     * @return array
     */
    protected function sortOrder($objects) {
        usort($objects, function($a, $b) {
			/** @var ISection | IPanel $a */
			/** @var ISection | IPanel $b */
            return $a->getPriority() < $b->getPriority();
        });
        return $objects;
    }

}
