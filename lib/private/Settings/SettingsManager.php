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

use OCP\Settings\ISettingsManager;
use OCP\Settings\ISection;
use OC\App\AppManager;
use OCP\Settings\IPanel;
use OCP\ILogger;
use OCP\IL10N;
use OCP\IUserSession;
use OCP\AppFramework\QueryException;

/*
 * @since 9.2
 */
class SettingsManager implements ISettingsManager {

  /* @var IL10N */
	protected $l;

  /* @var AppManager */
	protected $appManager;

  /* @var ILogger */
  protected $logger;

  /* @var IUser */
  protected $user;

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
  public function __construct(IL10N $l, AppManager $appManager, IUserSession $userSession, ILogger $logger) {
    $this->l = $l;
    $this->appManager = $appManager;
    $this->user = $userSession->getUser();
    $this->log = $logger;
  }

  public function getPersonalSections() {
    // Trigger a load of all personal panels to discover sections
    $this->loadPanels('personal');
    return isset($this->sections['personal']) ? $this->sections['personal'] : [];
  }

  public function getAdminSections() {
    // Trigger a load of all admin panels to discover sections
    $this->loadPanels('admin');
    return isset($this->sections['admin']) ? $this->sections['admin'] : [];
  }

  /**
   * Returns IPanels for the personal settings in the given section
   * @param string $sectionID
   * @return array of ISection
   */
  public function getPersonalPanels($sectionID) {
    // Trigger a load of all personal panels to discover sections
    $this->loadPanels('personal');
    if(array_key_exists($sectionID, $this->panels['personal'])) {
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
    if(array_key_exists($this->panels['personal'][$sectionID])) {
      return $this->panels['personal'][$sectionID];
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
        new Section('security', $this->l->t('Security'), 0),
        new Section('sharing', $this->l->t('Sharing'), 0),
        new Section('general', $this->l->t('Updates'), 80),
        new Section('monitoring', $this->l->t('Monitoring'), 0),
        new Section('general', $this->l->t('Tips and tricks'), 100),
        new Section('general', $this->l->t('Email'), 0),
      ];
    } else if($type === 'personal') {
      return [
        new Section('profile', $this->l->t('Profile'), 0),
        new Section('security', $this->l->t('Security'), 0),
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
          'OC\Settings\Panels\Personal\Profile',
          'OC\Settings\Panels\Personal\SyncClients',
          'OC\Settings\Panels\Personal\Version',
        ],
        'admin' => [
          'OC\Settings\Panels\Admin\Tips',
          'OC\Settings\Panels\Admin\MailTempaltes',
          'OC\Settings\Panels\Admin\Cron',
          'OC\Settings\Panels\Admin\MailServer',
          'OC\Settings\Panels\Admin\Logs',
          'OC\Settings\Panels\Admin\SetupAndSecurityTips',
          'OC\Settings\Panels\Admin\Version',
        ]
      ];

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
      \OC_App::registerAutoloading($app, \OC_App::getAppPath($app));
      if(array_key_exists('settings', $this->appManager->getAppInfo($app))) {
        $panels[] = $this->appManager->getAppInfo($app)['settings'];
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
      $panel = \OC::$server->query($className);
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
        ['class' => $className]);
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
        $this->panels[$type][$section->getID()] = $panel;
        $this->sections[$type][$section->getID] = $section;
        // Now try and initialise the ISection from the panel
      } catch (QueryException $e) {
        // Just skip this panel, either its section of panel could not be loaded
      }
    }
    // Return the panel array sorted
    foreach($this->panels[$type] as $sectionID => $section) {
      $this->panels[$type][$sectionID] = $this->sortOrder($this->panels[$type][$sectionID]);
    }
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
  }

  /**
   * Sort the array of IPanels or ISections by their priority attribute
   * @param array $objects (ISections of IPanels)
   * @return array
   */
  protected function sortOrder($objects) {
    usort($objects, function($a, $b) {
      return $a->getPriority() > $b->getPriority();
    });
    return $objects;
  }

}
