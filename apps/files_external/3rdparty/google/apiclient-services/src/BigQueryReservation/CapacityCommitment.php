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

namespace Google\Service\BigQueryReservation;

class CapacityCommitment extends \Google\Model
{
  /**
   * @var string
   */
  public $commitmentEndTime;
  /**
   * @var string
   */
  public $commitmentStartTime;
  protected $failureStatusType = Status::class;
  protected $failureStatusDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $plan;
  /**
   * @var string
   */
  public $renewalPlan;
  /**
   * @var string
   */
  public $slotCount;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setCommitmentEndTime($commitmentEndTime)
  {
    $this->commitmentEndTime = $commitmentEndTime;
  }
  /**
   * @return string
   */
  public function getCommitmentEndTime()
  {
    return $this->commitmentEndTime;
  }
  /**
   * @param string
   */
  public function setCommitmentStartTime($commitmentStartTime)
  {
    $this->commitmentStartTime = $commitmentStartTime;
  }
  /**
   * @return string
   */
  public function getCommitmentStartTime()
  {
    return $this->commitmentStartTime;
  }
  /**
   * @param Status
   */
  public function setFailureStatus(Status $failureStatus)
  {
    $this->failureStatus = $failureStatus;
  }
  /**
   * @return Status
   */
  public function getFailureStatus()
  {
    return $this->failureStatus;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPlan($plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return string
   */
  public function getPlan()
  {
    return $this->plan;
  }
  /**
   * @param string
   */
  public function setRenewalPlan($renewalPlan)
  {
    $this->renewalPlan = $renewalPlan;
  }
  /**
   * @return string
   */
  public function getRenewalPlan()
  {
    return $this->renewalPlan;
  }
  /**
   * @param string
   */
  public function setSlotCount($slotCount)
  {
    $this->slotCount = $slotCount;
  }
  /**
   * @return string
   */
  public function getSlotCount()
  {
    return $this->slotCount;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CapacityCommitment::class, 'Google_Service_BigQueryReservation_CapacityCommitment');
