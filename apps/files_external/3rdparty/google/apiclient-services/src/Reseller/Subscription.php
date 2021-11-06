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

class Subscription extends \Google\Collection
{
  protected $collection_key = 'suspensionReasons';
  public $billingMethod;
  public $creationTime;
  public $customerDomain;
  public $customerId;
  public $dealCode;
  public $kind;
  protected $planType = SubscriptionPlan::class;
  protected $planDataType = '';
  public $purchaseOrderId;
  protected $renewalSettingsType = RenewalSettings::class;
  protected $renewalSettingsDataType = '';
  public $resourceUiUrl;
  protected $seatsType = Seats::class;
  protected $seatsDataType = '';
  public $skuId;
  public $skuName;
  public $status;
  public $subscriptionId;
  public $suspensionReasons;
  protected $transferInfoType = SubscriptionTransferInfo::class;
  protected $transferInfoDataType = '';
  protected $trialSettingsType = SubscriptionTrialSettings::class;
  protected $trialSettingsDataType = '';

  public function setBillingMethod($billingMethod)
  {
    $this->billingMethod = $billingMethod;
  }
  public function getBillingMethod()
  {
    return $this->billingMethod;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setCustomerDomain($customerDomain)
  {
    $this->customerDomain = $customerDomain;
  }
  public function getCustomerDomain()
  {
    return $this->customerDomain;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setDealCode($dealCode)
  {
    $this->dealCode = $dealCode;
  }
  public function getDealCode()
  {
    return $this->dealCode;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param SubscriptionPlan
   */
  public function setPlan(SubscriptionPlan $plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return SubscriptionPlan
   */
  public function getPlan()
  {
    return $this->plan;
  }
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  /**
   * @param RenewalSettings
   */
  public function setRenewalSettings(RenewalSettings $renewalSettings)
  {
    $this->renewalSettings = $renewalSettings;
  }
  /**
   * @return RenewalSettings
   */
  public function getRenewalSettings()
  {
    return $this->renewalSettings;
  }
  public function setResourceUiUrl($resourceUiUrl)
  {
    $this->resourceUiUrl = $resourceUiUrl;
  }
  public function getResourceUiUrl()
  {
    return $this->resourceUiUrl;
  }
  /**
   * @param Seats
   */
  public function setSeats(Seats $seats)
  {
    $this->seats = $seats;
  }
  /**
   * @return Seats
   */
  public function getSeats()
  {
    return $this->seats;
  }
  public function setSkuId($skuId)
  {
    $this->skuId = $skuId;
  }
  public function getSkuId()
  {
    return $this->skuId;
  }
  public function setSkuName($skuName)
  {
    $this->skuName = $skuName;
  }
  public function getSkuName()
  {
    return $this->skuName;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubscriptionId($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }
  public function getSubscriptionId()
  {
    return $this->subscriptionId;
  }
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param SubscriptionTransferInfo
   */
  public function setTransferInfo(SubscriptionTransferInfo $transferInfo)
  {
    $this->transferInfo = $transferInfo;
  }
  /**
   * @return SubscriptionTransferInfo
   */
  public function getTransferInfo()
  {
    return $this->transferInfo;
  }
  /**
   * @param SubscriptionTrialSettings
   */
  public function setTrialSettings(SubscriptionTrialSettings $trialSettings)
  {
    $this->trialSettings = $trialSettings;
  }
  /**
   * @return SubscriptionTrialSettings
   */
  public function getTrialSettings()
  {
    return $this->trialSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subscription::class, 'Google_Service_Reseller_Subscription');
