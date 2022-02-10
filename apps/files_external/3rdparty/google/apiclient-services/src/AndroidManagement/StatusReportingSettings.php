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

class StatusReportingSettings extends \Google\Model
{
  protected $applicationReportingSettingsType = ApplicationReportingSettings::class;
  protected $applicationReportingSettingsDataType = '';
  /**
   * @var bool
   */
  public $applicationReportsEnabled;
  /**
   * @var bool
   */
  public $commonCriteriaModeEnabled;
  /**
   * @var bool
   */
  public $deviceSettingsEnabled;
  /**
   * @var bool
   */
  public $displayInfoEnabled;
  /**
   * @var bool
   */
  public $hardwareStatusEnabled;
  /**
   * @var bool
   */
  public $memoryInfoEnabled;
  /**
   * @var bool
   */
  public $networkInfoEnabled;
  /**
   * @var bool
   */
  public $powerManagementEventsEnabled;
  /**
   * @var bool
   */
  public $softwareInfoEnabled;
  /**
   * @var bool
   */
  public $systemPropertiesEnabled;

  /**
   * @param ApplicationReportingSettings
   */
  public function setApplicationReportingSettings(ApplicationReportingSettings $applicationReportingSettings)
  {
    $this->applicationReportingSettings = $applicationReportingSettings;
  }
  /**
   * @return ApplicationReportingSettings
   */
  public function getApplicationReportingSettings()
  {
    return $this->applicationReportingSettings;
  }
  /**
   * @param bool
   */
  public function setApplicationReportsEnabled($applicationReportsEnabled)
  {
    $this->applicationReportsEnabled = $applicationReportsEnabled;
  }
  /**
   * @return bool
   */
  public function getApplicationReportsEnabled()
  {
    return $this->applicationReportsEnabled;
  }
  /**
   * @param bool
   */
  public function setCommonCriteriaModeEnabled($commonCriteriaModeEnabled)
  {
    $this->commonCriteriaModeEnabled = $commonCriteriaModeEnabled;
  }
  /**
   * @return bool
   */
  public function getCommonCriteriaModeEnabled()
  {
    return $this->commonCriteriaModeEnabled;
  }
  /**
   * @param bool
   */
  public function setDeviceSettingsEnabled($deviceSettingsEnabled)
  {
    $this->deviceSettingsEnabled = $deviceSettingsEnabled;
  }
  /**
   * @return bool
   */
  public function getDeviceSettingsEnabled()
  {
    return $this->deviceSettingsEnabled;
  }
  /**
   * @param bool
   */
  public function setDisplayInfoEnabled($displayInfoEnabled)
  {
    $this->displayInfoEnabled = $displayInfoEnabled;
  }
  /**
   * @return bool
   */
  public function getDisplayInfoEnabled()
  {
    return $this->displayInfoEnabled;
  }
  /**
   * @param bool
   */
  public function setHardwareStatusEnabled($hardwareStatusEnabled)
  {
    $this->hardwareStatusEnabled = $hardwareStatusEnabled;
  }
  /**
   * @return bool
   */
  public function getHardwareStatusEnabled()
  {
    return $this->hardwareStatusEnabled;
  }
  /**
   * @param bool
   */
  public function setMemoryInfoEnabled($memoryInfoEnabled)
  {
    $this->memoryInfoEnabled = $memoryInfoEnabled;
  }
  /**
   * @return bool
   */
  public function getMemoryInfoEnabled()
  {
    return $this->memoryInfoEnabled;
  }
  /**
   * @param bool
   */
  public function setNetworkInfoEnabled($networkInfoEnabled)
  {
    $this->networkInfoEnabled = $networkInfoEnabled;
  }
  /**
   * @return bool
   */
  public function getNetworkInfoEnabled()
  {
    return $this->networkInfoEnabled;
  }
  /**
   * @param bool
   */
  public function setPowerManagementEventsEnabled($powerManagementEventsEnabled)
  {
    $this->powerManagementEventsEnabled = $powerManagementEventsEnabled;
  }
  /**
   * @return bool
   */
  public function getPowerManagementEventsEnabled()
  {
    return $this->powerManagementEventsEnabled;
  }
  /**
   * @param bool
   */
  public function setSoftwareInfoEnabled($softwareInfoEnabled)
  {
    $this->softwareInfoEnabled = $softwareInfoEnabled;
  }
  /**
   * @return bool
   */
  public function getSoftwareInfoEnabled()
  {
    return $this->softwareInfoEnabled;
  }
  /**
   * @param bool
   */
  public function setSystemPropertiesEnabled($systemPropertiesEnabled)
  {
    $this->systemPropertiesEnabled = $systemPropertiesEnabled;
  }
  /**
   * @return bool
   */
  public function getSystemPropertiesEnabled()
  {
    return $this->systemPropertiesEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StatusReportingSettings::class, 'Google_Service_AndroidManagement_StatusReportingSettings');
