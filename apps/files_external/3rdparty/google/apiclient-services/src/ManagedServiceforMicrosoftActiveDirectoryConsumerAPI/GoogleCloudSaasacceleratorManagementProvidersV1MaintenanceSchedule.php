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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI;

class GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule extends \Google\Model
{
  /**
   * @var bool
   */
  public $canReschedule;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $rolloutManagementPolicy;
  /**
   * @var string
   */
  public $scheduleDeadlineTime;
  /**
   * @var string
   */
  public $startTime;

  /**
   * @param bool
   */
  public function setCanReschedule($canReschedule)
  {
    $this->canReschedule = $canReschedule;
  }
  /**
   * @return bool
   */
  public function getCanReschedule()
  {
    return $this->canReschedule;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setRolloutManagementPolicy($rolloutManagementPolicy)
  {
    $this->rolloutManagementPolicy = $rolloutManagementPolicy;
  }
  /**
   * @return string
   */
  public function getRolloutManagementPolicy()
  {
    return $this->rolloutManagementPolicy;
  }
  /**
   * @param string
   */
  public function setScheduleDeadlineTime($scheduleDeadlineTime)
  {
    $this->scheduleDeadlineTime = $scheduleDeadlineTime;
  }
  /**
   * @return string
   */
  public function getScheduleDeadlineTime()
  {
    return $this->scheduleDeadlineTime;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule');
