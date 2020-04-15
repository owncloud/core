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

class Google_Service_AndroidManagement_KioskCustomization extends Google_Model
{
  public $deviceSettings;
  public $powerButtonActions;
  public $statusBar;
  public $systemErrorWarnings;
  public $systemNavigation;

  public function setDeviceSettings($deviceSettings)
  {
    $this->deviceSettings = $deviceSettings;
  }
  public function getDeviceSettings()
  {
    return $this->deviceSettings;
  }
  public function setPowerButtonActions($powerButtonActions)
  {
    $this->powerButtonActions = $powerButtonActions;
  }
  public function getPowerButtonActions()
  {
    return $this->powerButtonActions;
  }
  public function setStatusBar($statusBar)
  {
    $this->statusBar = $statusBar;
  }
  public function getStatusBar()
  {
    return $this->statusBar;
  }
  public function setSystemErrorWarnings($systemErrorWarnings)
  {
    $this->systemErrorWarnings = $systemErrorWarnings;
  }
  public function getSystemErrorWarnings()
  {
    return $this->systemErrorWarnings;
  }
  public function setSystemNavigation($systemNavigation)
  {
    $this->systemNavigation = $systemNavigation;
  }
  public function getSystemNavigation()
  {
    return $this->systemNavigation;
  }
}
