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
  /**
   * @var string
   */
  public $billingMethod;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $customerDomain;
  /**
   * @var string
   */
  public $customerId;
  /**
   * @var string
   */
  public $dealCode;
  /**
   * @var string
   */
  public $kind;
  protected $planType = SubscriptionPlan::class;
  protected $planDataType = '';
  /**
   * @var string
   */
  public $purchaseOrderId;
  protected $renewalSettingsType = RenewalSettings::class;
  protected $renewalSettingsDataType = '';
  /**
   * @var string
   */
  public $resourceUiUrl;
  protected $seatsType = Seats::class;
  protected $seatsDataType = '';
  /**
   * @var string
   */
  public $skuId;
  /**
   * @var string
   */
  public $skuName;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $subscriptionId;
  /**
   * @var string[]
   */
  public $suspensionReasons;
  protected $transferInfoType = SubscriptionTransferInfo::class;
  protected $transferInfoDataType = '';
  protected $trialSettingsType = SubscriptionTrialSettings::class;
  protected $trialSettingsDataType = '';

  /**
   * @param string
   */
  public function setBillingMethod($billingMethod)
  {
    $this->billingMethod = $billingMethod;
  }
  /**
   * @return string
   */
  public function getBillingMethod()
  {
    return $this->billingMethod;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setCustomerDomain($customerDomain)
  {
    $this->customerDomain = $customerDomain;
  }
  /**
   * @return string
   */
  public function getCustomerDomain()
  {
    return $this->customerDomain;
  }
  /**
   * @param string
   */
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  /**
   * @return string
   */
  public function getCustomerId()
  {
    return $this->customerId;
  }
  /**
   * @param string
   */
  public function setDealCode($dealCode)
  {
    $this->dealCode = $dealCode;
  }
  /**
   * @return string
   */
  public function getDealCode()
  {
    return $this->dealCode;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setResourceUiUrl($resourceUiUrl)
  {
    $this->resourceUiUrl = $resourceUiUrl;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSkuId($skuId)
  {
    $this->skuId = $skuId;
  }
  /**
   * @return string
   */
  public function getSkuId()
  {
    return $this->skuId;
  }
  /**
   * @param string
   */
  public function setSkuName($skuName)
  {
    $this->skuName = $skuName;
  }
  /**
   * @return string
   */
  public function getSkuName()
  {
    return $this->skuName;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setSubscriptionId($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }
  /**
   * @return string
   */
  public function getSubscriptionId()
  {
    return $this->subscriptionId;
  }
  /**
   * @param string[]
   */
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  /**
   * @return string[]
   */
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
