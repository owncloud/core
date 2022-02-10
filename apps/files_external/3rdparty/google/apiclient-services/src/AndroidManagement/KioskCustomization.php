<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AndroidManagement;

class KioskCustomization extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceSettings;
  /**
   * @var string
   */
  public $powerButtonActions;
  /**
   * @var string
   */
  public $statusBar;
  /**
   * @var string
   */
  public $systemErrorWarnings;
  /**
   * @var string
   */
  public $systemNavigation;

  /**
   * @param string
   */
  public function setDeviceSettings($deviceSettings)
  {
    $this->deviceSettings = $deviceSettings;
  }
  /**
   * @return string
   */
  public function getDeviceSettings()
  {
    return $this->deviceSettings;
  }
  /**
   * @param string
   */
  public function setPowerButtonActions($powerButtonActions)
  {
    $this->powerButtonActions = $powerButtonActions;
  }
  /**
   * @return string
   */
  public function getPowerButtonActions()
  {
    return $this->powerButtonActions;
  }
  /**
   * @param string
   */
  public function setStatusBar($statusBar)
  {
    $this->statusBar = $statusBar;
  }
  /**
   * @return string
   */
  public function getStatusBar()
  {
    return $this->statusBar;
  }
  /**
   * @param string
   */
  public function setSystemErrorWarnings($systemErrorWarnings)
  {
    $this->systemErrorWarnings = $systemErrorWarnings;
  }
  /**
   * @return string
   */
  public function getSystemErrorWarnings()
  {
    return $this->systemErrorWarnings;
  }
  /**
   * @param string
   */
  public function setSystemNavigation($systemNavigation)
  {
    $this->systemNavigation = $systemNavigation;
  }
  /**
   * @return string
   */
  public function getSystemNavigation()
  {
    return $this->systemNavigation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KioskCustomization::class, 'Google_Service_AndroidManagement_KioskCustomization');
