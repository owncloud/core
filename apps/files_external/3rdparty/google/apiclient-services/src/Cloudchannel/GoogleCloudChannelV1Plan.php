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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1Plan extends \Google\Model
{
  public $billingAccount;
  protected $paymentCycleType = GoogleCloudChannelV1Period::class;
  protected $paymentCycleDataType = '';
  public $paymentPlan;
  public $paymentType;
  protected $trialPeriodType = GoogleCloudChannelV1Period::class;
  protected $trialPeriodDataType = '';

  public function setBillingAccount($billingAccount)
  {
    $this->billingAccount = $billingAccount;
  }
  public function getBillingAccount()
  {
    return $this->billingAccount;
  }
  /**
   * @param GoogleCloudChannelV1Period
   */
  public function setPaymentCycle(GoogleCloudChannelV1Period $paymentCycle)
  {
    $this->paymentCycle = $paymentCycle;
  }
  /**
   * @return GoogleCloudChannelV1Period
   */
  public function getPaymentCycle()
  {
    return $this->paymentCycle;
  }
  public function setPaymentPlan($paymentPlan)
  {
    $this->paymentPlan = $paymentPlan;
  }
  public function getPaymentPlan()
  {
    return $this->paymentPlan;
  }
  public function setPaymentType($paymentType)
  {
    $this->paymentType = $paymentType;
  }
  public function getPaymentType()
  {
    return $this->paymentType;
  }
  /**
   * @param GoogleCloudChannelV1Period
   */
  public function setTrialPeriod(GoogleCloudChannelV1Period $trialPeriod)
  {
    $this->trialPeriod = $trialPeriod;
  }
  /**
   * @return GoogleCloudChannelV1Period
   */
  public function getTrialPeriod()
  {
    return $this->trialPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1Plan::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1Plan');
