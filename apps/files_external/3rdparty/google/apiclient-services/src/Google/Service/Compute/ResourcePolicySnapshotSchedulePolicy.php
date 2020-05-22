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

class Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy extends Google_Model
{
  protected $retentionPolicyType = 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicyRetentionPolicy';
  protected $retentionPolicyDataType = '';
  protected $scheduleType = 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySchedule';
  protected $scheduleDataType = '';
  protected $snapshotPropertiesType = 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySnapshotProperties';
  protected $snapshotPropertiesDataType = '';

  /**
   * @param Google_Service_Compute_ResourcePolicySnapshotSchedulePolicyRetentionPolicy
   */
  public function setRetentionPolicy(Google_Service_Compute_ResourcePolicySnapshotSchedulePolicyRetentionPolicy $retentionPolicy)
  {
    $this->retentionPolicy = $retentionPolicy;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicySnapshotSchedulePolicyRetentionPolicy
   */
  public function getRetentionPolicy()
  {
    return $this->retentionPolicy;
  }
  /**
   * @param Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySchedule
   */
  public function setSchedule(Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySchedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySchedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySnapshotProperties
   */
  public function setSnapshotProperties(Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySnapshotProperties $snapshotProperties)
  {
    $this->snapshotProperties = $snapshotProperties;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicySnapshotSchedulePolicySnapshotProperties
   */
  public function getSnapshotProperties()
  {
    return $this->snapshotProperties;
  }
}
