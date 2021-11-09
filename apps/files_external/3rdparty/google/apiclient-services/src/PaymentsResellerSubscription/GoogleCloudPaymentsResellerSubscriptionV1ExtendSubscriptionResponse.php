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

namespace Google\Service\PaymentsResellerSubscription;

class GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionResponse extends \Google\Model
{
  public $cycleEndTime;
  public $freeTrialEndTime;
  public $renewalTime;

  public function setCycleEndTime($cycleEndTime)
  {
    $this->cycleEndTime = $cycleEndTime;
  }
  public function getCycleEndTime()
  {
    return $this->cycleEndTime;
  }
  public function setFreeTrialEndTime($freeTrialEndTime)
  {
    $this->freeTrialEndTime = $freeTrialEndTime;
  }
  public function getFreeTrialEndTime()
  {
    return $this->freeTrialEndTime;
  }
  public function setRenewalTime($renewalTime)
  {
    $this->renewalTime = $renewalTime;
  }
  public function getRenewalTime()
  {
    return $this->renewalTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionResponse::class, 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionResponse');
