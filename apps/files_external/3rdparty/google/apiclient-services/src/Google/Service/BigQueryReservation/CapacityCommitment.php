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

class Google_Service_BigQueryReservation_CapacityCommitment extends Google_Model
{
  public $commitmentEndTime;
  public $commitmentStartTime;
  protected $failureStatusType = 'Google_Service_BigQueryReservation_Status';
  protected $failureStatusDataType = '';
  public $name;
  public $plan;
  public $renewalPlan;
  public $slotCount;
  public $state;

  public function setCommitmentEndTime($commitmentEndTime)
  {
    $this->commitmentEndTime = $commitmentEndTime;
  }
  public function getCommitmentEndTime()
  {
    return $this->commitmentEndTime;
  }
  public function setCommitmentStartTime($commitmentStartTime)
  {
    $this->commitmentStartTime = $commitmentStartTime;
  }
  public function getCommitmentStartTime()
  {
    return $this->commitmentStartTime;
  }
  /**
   * @param Google_Service_BigQueryReservation_Status
   */
  public function setFailureStatus(Google_Service_BigQueryReservation_Status $failureStatus)
  {
    $this->failureStatus = $failureStatus;
  }
  /**
   * @return Google_Service_BigQueryReservation_Status
   */
  public function getFailureStatus()
  {
    return $this->failureStatus;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlan($plan)
  {
    $this->plan = $plan;
  }
  public function getPlan()
  {
    return $this->plan;
  }
  public function setRenewalPlan($renewalPlan)
  {
    $this->renewalPlan = $renewalPlan;
  }
  public function getRenewalPlan()
  {
    return $this->renewalPlan;
  }
  public function setSlotCount($slotCount)
  {
    $this->slotCount = $slotCount;
  }
  public function getSlotCount()
  {
    return $this->slotCount;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
