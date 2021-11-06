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

namespace Google\Service\Compute;

class ResourcePolicySnapshotSchedulePolicy extends \Google\Model
{
  protected $retentionPolicyType = ResourcePolicySnapshotSchedulePolicyRetentionPolicy::class;
  protected $retentionPolicyDataType = '';
  protected $scheduleType = ResourcePolicySnapshotSchedulePolicySchedule::class;
  protected $scheduleDataType = '';
  protected $snapshotPropertiesType = ResourcePolicySnapshotSchedulePolicySnapshotProperties::class;
  protected $snapshotPropertiesDataType = '';

  /**
   * @param ResourcePolicySnapshotSchedulePolicyRetentionPolicy
   */
  public function setRetentionPolicy(ResourcePolicySnapshotSchedulePolicyRetentionPolicy $retentionPolicy)
  {
    $this->retentionPolicy = $retentionPolicy;
  }
  /**
   * @return ResourcePolicySnapshotSchedulePolicyRetentionPolicy
   */
  public function getRetentionPolicy()
  {
    return $this->retentionPolicy;
  }
  /**
   * @param ResourcePolicySnapshotSchedulePolicySchedule
   */
  public function setSchedule(ResourcePolicySnapshotSchedulePolicySchedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return ResourcePolicySnapshotSchedulePolicySchedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param ResourcePolicySnapshotSchedulePolicySnapshotProperties
   */
  public function setSnapshotProperties(ResourcePolicySnapshotSchedulePolicySnapshotProperties $snapshotProperties)
  {
    $this->snapshotProperties = $snapshotProperties;
  }
  /**
   * @return ResourcePolicySnapshotSchedulePolicySnapshotProperties
   */
  public function getSnapshotProperties()
  {
    return $this->snapshotProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcePolicySnapshotSchedulePolicy::class, 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy');
