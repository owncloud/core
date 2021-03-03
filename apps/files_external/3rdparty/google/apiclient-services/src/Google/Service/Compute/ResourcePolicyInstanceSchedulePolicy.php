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

class Google_Service_Compute_ResourcePolicyInstanceSchedulePolicy extends Google_Model
{
  public $expirationTime;
  public $startTime;
  public $timeZone;
  protected $vmStartScheduleType = 'Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule';
  protected $vmStartScheduleDataType = '';
  protected $vmStopScheduleType = 'Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule';
  protected $vmStopScheduleDataType = '';

  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule
   */
  public function setVmStartSchedule(Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule $vmStartSchedule)
  {
    $this->vmStartSchedule = $vmStartSchedule;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule
   */
  public function getVmStartSchedule()
  {
    return $this->vmStartSchedule;
  }
  /**
   * @param Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule
   */
  public function setVmStopSchedule(Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule $vmStopSchedule)
  {
    $this->vmStopSchedule = $vmStopSchedule;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicyInstanceSchedulePolicySchedule
   */
  public function getVmStopSchedule()
  {
    return $this->vmStopSchedule;
  }
}
