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

class Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Product extends Google_Collection
{
  protected $collection_key = 'titles';
  public $name;
  public $regionCodes;
  protected $subscriptionBillingCycleDurationType = 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Duration';
  protected $subscriptionBillingCycleDurationDataType = '';
  protected $titlesType = 'Google_Service_PaymentsResellerSubscription_GoogleTypeLocalizedText';
  protected $titlesDataType = 'array';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRegionCodes($regionCodes)
  {
    $this->regionCodes = $regionCodes;
  }
  public function getRegionCodes()
  {
    return $this->regionCodes;
  }
  /**
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function setSubscriptionBillingCycleDuration(Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Duration $subscriptionBillingCycleDuration)
  {
    $this->subscriptionBillingCycleDuration = $subscriptionBillingCycleDuration;
  }
  /**
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Duration
   */
  public function getSubscriptionBillingCycleDuration()
  {
    return $this->subscriptionBillingCycleDuration;
  }
  /**
   * @param Google_Service_PaymentsResellerSubscription_GoogleTypeLocalizedText[]
   */
  public function setTitles($titles)
  {
    $this->titles = $titles;
  }
  /**
   * @return Google_Service_PaymentsResellerSubscription_GoogleTypeLocalizedText[]
   */
  public function getTitles()
  {
    return $this->titles;
  }
}
