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

namespace Google\Service\AndroidPublisher;

class SubscriptionPurchaseV2 extends \Google\Collection
{
  protected $collection_key = 'lineItems';
  /**
   * @var string
   */
  public $acknowledgementState;
  protected $canceledStateContextType = CanceledStateContext::class;
  protected $canceledStateContextDataType = '';
  protected $externalAccountIdentifiersType = ExternalAccountIdentifiers::class;
  protected $externalAccountIdentifiersDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $latestOrderId;
  protected $lineItemsType = SubscriptionPurchaseLineItem::class;
  protected $lineItemsDataType = 'array';
  /**
   * @var string
   */
  public $linkedPurchaseToken;
  protected $pausedStateContextType = PausedStateContext::class;
  protected $pausedStateContextDataType = '';
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var string
   */
  public $startTime;
  protected $subscribeWithGoogleInfoType = SubscribeWithGoogleInfo::class;
  protected $subscribeWithGoogleInfoDataType = '';
  /**
   * @var string
   */
  public $subscriptionState;
  protected $testPurchaseType = TestPurchase::class;
  protected $testPurchaseDataType = '';

  /**
   * @param string
   */
  public function setAcknowledgementState($acknowledgementState)
  {
    $this->acknowledgementState = $acknowledgementState;
  }
  /**
   * @return string
   */
  public function getAcknowledgementState()
  {
    return $this->acknowledgementState;
  }
  /**
   * @param CanceledStateContext
   */
  public function setCanceledStateContext(CanceledStateContext $canceledStateContext)
  {
    $this->canceledStateContext = $canceledStateContext;
  }
  /**
   * @return CanceledStateContext
   */
  public function getCanceledStateContext()
  {
    return $this->canceledStateContext;
  }
  /**
   * @param ExternalAccountIdentifiers
   */
  public function setExternalAccountIdentifiers(ExternalAccountIdentifiers $externalAccountIdentifiers)
  {
    $this->externalAccountIdentifiers = $externalAccountIdentifiers;
  }
  /**
   * @return ExternalAccountIdentifiers
   */
  public function getExternalAccountIdentifiers()
  {
    return $this->externalAccountIdentifiers;
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
   * @param string
   */
  public function setLatestOrderId($latestOrderId)
  {
    $this->latestOrderId = $latestOrderId;
  }
  /**
   * @return string
   */
  public function getLatestOrderId()
  {
    return $this->latestOrderId;
  }
  /**
   * @param SubscriptionPurchaseLineItem[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return SubscriptionPurchaseLineItem[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  /**
   * @param string
   */
  public function setLinkedPurchaseToken($linkedPurchaseToken)
  {
    $this->linkedPurchaseToken = $linkedPurchaseToken;
  }
  /**
   * @return string
   */
  public function getLinkedPurchaseToken()
  {
    return $this->linkedPurchaseToken;
  }
  /**
   * @param PausedStateContext
   */
  public function setPausedStateContext(PausedStateContext $pausedStateContext)
  {
    $this->pausedStateContext = $pausedStateContext;
  }
  /**
   * @return PausedStateContext
   */
  public function getPausedStateContext()
  {
    return $this->pausedStateContext;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param SubscribeWithGoogleInfo
   */
  public function setSubscribeWithGoogleInfo(SubscribeWithGoogleInfo $subscribeWithGoogleInfo)
  {
    $this->subscribeWithGoogleInfo = $subscribeWithGoogleInfo;
  }
  /**
   * @return SubscribeWithGoogleInfo
   */
  public function getSubscribeWithGoogleInfo()
  {
    return $this->subscribeWithGoogleInfo;
  }
  /**
   * @param string
   */
  public function setSubscriptionState($subscriptionState)
  {
    $this->subscriptionState = $subscriptionState;
  }
  /**
   * @return string
   */
  public function getSubscriptionState()
  {
    return $this->subscriptionState;
  }
  /**
   * @param TestPurchase
   */
  public function setTestPurchase(TestPurchase $testPurchase)
  {
    $this->testPurchase = $testPurchase;
  }
  /**
   * @return TestPurchase
   */
  public function getTestPurchase()
  {
    return $this->testPurchase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionPurchaseV2::class, 'Google_Service_AndroidPublisher_SubscriptionPurchaseV2');
