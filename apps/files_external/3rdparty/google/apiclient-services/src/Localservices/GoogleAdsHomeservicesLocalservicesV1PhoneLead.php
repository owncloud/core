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
  public $chargedCallTimestamp;
  public $chargedConnectedCallDurationSeconds;
  public $consumerPhoneNumber;

  public function setChargedCallTimestamp($chargedCallTimestamp)
  {
    $this->chargedCallTimestamp = $chargedCallTimestamp;
  }
  public function getChargedCallTimestamp()
  {
    return $this->chargedCallTimestamp;
  }
  public function setChargedConnectedCallDurationSeconds($chargedConnectedCallDurationSeconds)
  {
    $this->chargedConnectedCallDurationSeconds = $chargedConnectedCallDurationSeconds;
  }
  public function getChargedConnectedCallDurationSeconds()
  {
    return $this->chargedConnectedCallDurationSeconds;
  }
  public function setConsumerPhoneNumber($consumerPhoneNumber)
  {
    $this->consumerPhoneNumber = $consumerPhoneNumber;
  }
  public function getConsumerPhoneNumber()
  {
    return $this->consumerPhoneNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAdsHomeservicesLocalservicesV1PhoneLead::class, 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead');
