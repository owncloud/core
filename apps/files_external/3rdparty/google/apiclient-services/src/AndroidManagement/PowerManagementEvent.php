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

class PowerManagementEvent extends \Google\Model
{
  /**
   * @var float
   */
  public $batteryLevel;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $eventType;

  /**
   * @param float
   */
  public function setBatteryLevel($batteryLevel)
  {
    $this->batteryLevel = $batteryLevel;
  }
  /**
   * @return float
   */
  public function getBatteryLevel()
  {
    return $this->batteryLevel;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PowerManagementEvent::class, 'Google_Service_AndroidManagement_PowerManagementEvent');
