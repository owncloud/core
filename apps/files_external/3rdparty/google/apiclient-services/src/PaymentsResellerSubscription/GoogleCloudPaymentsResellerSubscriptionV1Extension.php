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

class GoogleCloudPaymentsResellerSubscriptionV1Extension extends \Google\Model
{
  protected $durationType = GoogleCloudPaymentsResellerSubscriptionV1Duration::class;
  protected $durationDataType = '';
  public $partnerUserToken;

  /**
   * @param GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function setDuration(GoogleCloudPaymentsResellerSubscriptionV1Duration $duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function getDuration()
  {
    return $this->duration;
  }
  public function setPartnerUserToken($partnerUserToken)
  {
    $this->partnerUserToken = $partnerUserToken;
  }
  public function getPartnerUserToken()
  {
    return $this->partnerUserToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPaymentsResellerSubscriptionV1Extension::class, 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Extension');
