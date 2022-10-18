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

namespace Google\Service\Contentwarehouse;

class AssistantDevicesPlatformProtoAlarmCapability extends \Google\Model
{
  /**
   * @var int
   */
  public $maxSupportedAlarms;
  /**
   * @var bool
   */
  public $restrictAlarmsToNextDay;
  /**
   * @var bool
   */
  public $supportsStopAction;

  /**
   * @param int
   */
  public function setMaxSupportedAlarms($maxSupportedAlarms)
  {
    $this->maxSupportedAlarms = $maxSupportedAlarms;
  }
  /**
   * @return int
   */
  public function getMaxSupportedAlarms()
  {
    return $this->maxSupportedAlarms;
  }
  /**
   * @param bool
   */
  public function setRestrictAlarmsToNextDay($restrictAlarmsToNextDay)
  {
    $this->restrictAlarmsToNextDay = $restrictAlarmsToNextDay;
  }
  /**
   * @return bool
   */
  public function getRestrictAlarmsToNextDay()
  {
    return $this->restrictAlarmsToNextDay;
  }
  /**
   * @param bool
   */
  public function setSupportsStopAction($supportsStopAction)
  {
    $this->supportsStopAction = $supportsStopAction;
  }
  /**
   * @return bool
   */
  public function getSupportsStopAction()
  {
    return $this->supportsStopAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoAlarmCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoAlarmCapability');
