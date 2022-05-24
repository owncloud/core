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

namespace Google\Service\Localservices;

class GoogleAdsHomeservicesLocalservicesV1PhoneLead extends \Google\Model
{
  /**
   * @var string
   */
  public $chargedCallTimestamp;
  /**
   * @var string
   */
  public $chargedConnectedCallDurationSeconds;
  /**
   * @var string
   */
  public $consumerPhoneNumber;

  /**
   * @param string
   */
  public function setChargedCallTimestamp($chargedCallTimestamp)
  {
    $this->chargedCallTimestamp = $chargedCallTimestamp;
  }
  /**
   * @return string
   */
  public function getChargedCallTimestamp()
  {
    return $this->chargedCallTimestamp;
  }
  /**
   * @param string
   */
  public function setChargedConnectedCallDurationSeconds($chargedConnectedCallDurationSeconds)
  {
    $this->chargedConnectedCallDurationSeconds = $chargedConnectedCallDurationSeconds;
  }
  /**
   * @return string
   */
  public function getChargedConnectedCallDurationSeconds()
  {
    return $this->chargedConnectedCallDurationSeconds;
  }
  /**
   * @param string
   */
  public function setConsumerPhoneNumber($consumerPhoneNumber)
  {
    $this->consumerPhoneNumber = $consumerPhoneNumber;
  }
  /**
   * @return string
   */
  public function getConsumerPhoneNumber()
  {
    return $this->consumerPhoneNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAdsHomeservicesLocalservicesV1PhoneLead::class, 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead');
