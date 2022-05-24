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

namespace Google\Service\Reseller;

class SubscriptionPlan extends \Google\Model
{
  protected $commitmentIntervalType = SubscriptionPlanCommitmentInterval::class;
  protected $commitmentIntervalDataType = '';
  /**
   * @var bool
   */
  public $isCommitmentPlan;
  /**
   * @var string
   */
  public $planName;

  /**
   * @param SubscriptionPlanCommitmentInterval
   */
  public function setCommitmentInterval(SubscriptionPlanCommitmentInterval $commitmentInterval)
  {
    $this->commitmentInterval = $commitmentInterval;
  }
  /**
   * @return SubscriptionPlanCommitmentInterval
   */
  public function getCommitmentInterval()
  {
    return $this->commitmentInterval;
  }
  /**
   * @param bool
   */
  public function setIsCommitmentPlan($isCommitmentPlan)
  {
    $this->isCommitmentPlan = $isCommitmentPlan;
  }
  /**
   * @return bool
   */
  public function getIsCommitmentPlan()
  {
    return $this->isCommitmentPlan;
  }
  /**
   * @param string
   */
  public function setPlanName($planName)
  {
    $this->planName = $planName;
  }
  /**
   * @return string
   */
  public function getPlanName()
  {
    return $this->planName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionPlan::class, 'Google_Service_Reseller_SubscriptionPlan');
