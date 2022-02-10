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

class GoogleCloudChannelV1RenewalSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableRenewal;
  protected $paymentCycleType = GoogleCloudChannelV1Period::class;
  protected $paymentCycleDataType = '';
  /**
   * @var string
   */
  public $paymentPlan;
  /**
   * @var bool
   */
  public $resizeUnitCount;

  /**
   * @param bool
   */
  public function setEnableRenewal($enableRenewal)
  {
    $this->enableRenewal = $enableRenewal;
  }
  /**
   * @return bool
   */
  public function getEnableRenewal()
  {
    return $this->enableRenewal;
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
  /**
   * @param string
   */
  public function setPaymentPlan($paymentPlan)
  {
    $this->paymentPlan = $paymentPlan;
  }
  /**
   * @return string
   */
  public function getPaymentPlan()
  {
    return $this->paymentPlan;
  }
  /**
   * @param bool
   */
  public function setResizeUnitCount($resizeUnitCount)
  {
    $this->resizeUnitCount = $resizeUnitCount;
  }
  /**
   * @return bool
   */
  public function getResizeUnitCount()
  {
    return $this->resizeUnitCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1RenewalSettings::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1RenewalSettings');
