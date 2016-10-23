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
use \OCP\ILogger;
use OCP\IL10N;
use OCP\IUserSession;

/*
 * @since 9.2
 */
class SettingsManager implements ISettingsManager {

  /** @var IL10N */
	private $l;

  /** @var AppManager */
	private $appManager;

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
   * Searches through the currently enabled apps and returns the panels registered
   * @return array
   */
  protected function findRegisteredPanels($apps) {
    $panels = [];
    foreach($apps as $app) {
      if(array_key_exists('settings', $this->appManager->getAppInfo($app))) {
        $panels[] = $this->appManager->getAppInfo($app)['settings'];
      }
    }
    return $panels;
  }

  /**
   * Attempts to load a IPanel using the class name
   * @param string $className
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
   * @param string $type
   * @return array of IPanels
   */
  public function loadPanels($type) {
    // If already loaded just return
    if(!empty($this->panels[$type])) {
      return $this->panels[$type];
    }
    // Find the panels from info xml
    $panels = $this->findRegisteredPanels($this->appManager->getEnabledAppsForUser($this->user));
    // Load the classes using the server container
    if(empty($panels[$type])) {
      return [];
    }
    foreach($panels[$type] as $panelClassName) {
      // Attempt to load the panel
      try {
        $panel = $this->loadPanel();
        $section = $this->loadSection($type, $panel->getSectionID());
        $this->panels[$type][$section->getID()] = $panel;
        $this->sections[$type] = $section;
        // Now try and initialise the ISection from the panel
      } catch (QueryException $e) {
        // Just skip this panel
      }
    }
    // Load built in sections
    foreach($this->getBuiltInSections() as $section) {
      $this->panels[$type][$section->getID()] = $section;
    }
    // Return the panel array sorted
    foreach($this->panels[$type] as $sectionID => $section) {
      $this->panels[$type][$sectionID] = $this->sortOrder($this->panels[$type][$sectionID]);
    }
    return $this->panels[$type];
  }

  /**
   * Sort the array of IPanels or ISections by their priority attribute
   * @param array of ISections of IPanels
   * @return array
   */
  protected function sortOrder($objects) {
    usort($objects, function($a, $b) {
      return $a->getPriority() > $b->getPriority();
    });
    return $objects;
  }

}
