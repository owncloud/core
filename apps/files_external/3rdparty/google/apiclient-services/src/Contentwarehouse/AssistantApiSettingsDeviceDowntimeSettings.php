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

class AssistantApiSettingsDeviceDowntimeSettings extends \Google\Collection
{
  protected $collection_key = 'targets';
  protected $schedulesType = AssistantApiSettingsLabeledDowntimeSchedule::class;
  protected $schedulesDataType = 'array';
  /**
   * @var string[]
   */
  public $targets;

  /**
   * @param AssistantApiSettingsLabeledDowntimeSchedule[]
   */
  public function setSchedules($schedules)
  {
    $this->schedules = $schedules;
  }
  /**
   * @return AssistantApiSettingsLabeledDowntimeSchedule[]
   */
  public function getSchedules()
  {
    return $this->schedules;
  }
  /**
   * @param string[]
   */
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  /**
   * @return string[]
   */
  public function getTargets()
  {
    return $this->targets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsDeviceDowntimeSettings::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsDeviceDowntimeSettings');
