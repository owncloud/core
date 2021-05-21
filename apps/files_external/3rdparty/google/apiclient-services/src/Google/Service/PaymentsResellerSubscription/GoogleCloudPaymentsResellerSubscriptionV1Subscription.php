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

class Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription extends Google_Collection
{
  protected $collection_key = 'promotions';
  protected $cancellationDetailsType = 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1SubscriptionCancellationDetails';
  protected $cancellationDetailsDataType = '';
  public $createTime;
  public $cycleEndTime;
  public $endUserEntitled;
  public $freeTrialEndTime;
  public $name;
  public $partnerUserToken;
  public $products;
  public $promotions;
  public $redirectUri;
  protected $serviceLocationType = 'Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Location';
  protected $serviceLocationDataType = '';
  public $state;
  public $updateTime;

  /**
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1SubscriptionCancellationDetails
   */
  public function setCancellationDetails(Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1SubscriptionCancellationDetails $cancellationDetails)
  {
    $this->cancellationDetails = $cancellationDetails;
  }
  /**
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1SubscriptionCancellationDetails
   */
  public function getCancellationDetails()
  {
    return $this->cancellationDetails;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCycleEndTime($cycleEndTime)
  {
    $this->cycleEndTime = $cycleEndTime;
  }
  public function getCycleEndTime()
  {
    return $this->cycleEndTime;
  }
  public function setEndUserEntitled($endUserEntitled)
  {
    $this->endUserEntitled = $endUserEntitled;
  }
  public function getEndUserEntitled()
  {
    return $this->endUserEntitled;
  }
  public function setFreeTrialEndTime($freeTrialEndTime)
  {
    $this->freeTrialEndTime = $freeTrialEndTime;
  }
  public function getFreeTrialEndTime()
  {
    return $this->freeTrialEndTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPartnerUserToken($partnerUserToken)
  {
    $this->partnerUserToken = $partnerUserToken;
  }
  public function getPartnerUserToken()
  {
    return $this->partnerUserToken;
  }
  public function setProducts($products)
  {
    $this->products = $products;
  }
  public function getProducts()
  {
    return $this->products;
  }
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  public function getPromotions()
  {
    return $this->promotions;
  }
  public function setRedirectUri($redirectUri)
  {
    $this->redirectUri = $redirectUri;
  }
  public function getRedirectUri()
  {
    return $this->redirectUri;
  }
  /**
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Location
   */
  public function setServiceLocation(Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Location $serviceLocation)
  {
    $this->serviceLocation = $serviceLocation;
  }
  /**
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Location
   */
  public function getServiceLocation()
  {
    return $this->serviceLocation;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
