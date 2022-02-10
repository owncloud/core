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

namespace Google\Service\Fcmdata;

class GoogleFirebaseFcmDataV1beta1DeliveryPerformancePercents extends \Google\Model
{
  /**
   * @var float
   */
  public $delayedDeviceDoze;
  /**
   * @var float
   */
  public $delayedDeviceOffline;
  /**
   * @var float
   */
  public $delayedMessageThrottled;
  /**
   * @var float
   */
  public $delayedUserStopped;
  /**
   * @var float
   */
  public $deliveredNoDelay;

  /**
   * @param float
   */
  public function setDelayedDeviceDoze($delayedDeviceDoze)
  {
    $this->delayedDeviceDoze = $delayedDeviceDoze;
  }
  /**
   * @return float
   */
  public function getDelayedDeviceDoze()
  {
    return $this->delayedDeviceDoze;
  }
  /**
   * @param float
   */
  public function setDelayedDeviceOffline($delayedDeviceOffline)
  {
    $this->delayedDeviceOffline = $delayedDeviceOffline;
  }
  /**
   * @return float
   */
  public function getDelayedDeviceOffline()
  {
    return $this->delayedDeviceOffline;
  }
  /**
   * @param float
   */
  public function setDelayedMessageThrottled($delayedMessageThrottled)
  {
    $this->delayedMessageThrottled = $delayedMessageThrottled;
  }
  /**
   * @return float
   */
  public function getDelayedMessageThrottled()
  {
    return $this->delayedMessageThrottled;
  }
  /**
   * @param float
   */
  public function setDelayedUserStopped($delayedUserStopped)
  {
    $this->delayedUserStopped = $delayedUserStopped;
  }
  /**
   * @return float
   */
  public function getDelayedUserStopped()
  {
    return $this->delayedUserStopped;
  }
  /**
   * @param float
   */
  public function setDeliveredNoDelay($deliveredNoDelay)
  {
    $this->deliveredNoDelay = $deliveredNoDelay;
  }
  /**
   * @return float
   */
  public function getDeliveredNoDelay()
  {
    return $this->deliveredNoDelay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseFcmDataV1beta1DeliveryPerformancePercents::class, 'Google_Service_Fcmdata_GoogleFirebaseFcmDataV1beta1DeliveryPerformancePercents');
