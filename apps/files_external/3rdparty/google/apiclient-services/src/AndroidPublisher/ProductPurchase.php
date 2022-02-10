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

class ProductPurchase extends \Google\Model
{
  /**
   * @var int
   */
  public $acknowledgementState;
  /**
   * @var int
   */
  public $consumptionState;
  /**
   * @var string
   */
  public $developerPayload;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $obfuscatedExternalAccountId;
  /**
   * @var string
   */
  public $obfuscatedExternalProfileId;
  /**
   * @var string
   */
  public $orderId;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var int
   */
  public $purchaseState;
  /**
   * @var string
   */
  public $purchaseTimeMillis;
  /**
   * @var string
   */
  public $purchaseToken;
  /**
   * @var int
   */
  public $purchaseType;
  /**
   * @var int
   */
  public $quantity;
  /**
   * @var string
   */
  public $regionCode;

  /**
   * @param int
   */
  public function setAcknowledgementState($acknowledgementState)
  {
    $this->acknowledgementState = $acknowledgementState;
  }
  /**
   * @return int
   */
  public function getAcknowledgementState()
  {
    return $this->acknowledgementState;
  }
  /**
   * @param int
   */
  public function setConsumptionState($consumptionState)
  {
    $this->consumptionState = $consumptionState;
  }
  /**
   * @return int
   */
  public function getConsumptionState()
  {
    return $this->consumptionState;
  }
  /**
   * @param string
   */
  public function setDeveloperPayload($developerPayload)
  {
    $this->developerPayload = $developerPayload;
  }
  /**
   * @return string
   */
  public function getDeveloperPayload()
  {
    return $this->developerPayload;
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
  public function setObfuscatedExternalAccountId($obfuscatedExternalAccountId)
  {
    $this->obfuscatedExternalAccountId = $obfuscatedExternalAccountId;
  }
  /**
   * @return string
   */
  public function getObfuscatedExternalAccountId()
  {
    return $this->obfuscatedExternalAccountId;
  }
  /**
   * @param string
   */
  public function setObfuscatedExternalProfileId($obfuscatedExternalProfileId)
  {
    $this->obfuscatedExternalProfileId = $obfuscatedExternalProfileId;
  }
  /**
   * @return string
   */
  public function getObfuscatedExternalProfileId()
  {
    return $this->obfuscatedExternalProfileId;
  }
  /**
   * @param string
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param int
   */
  public function setPurchaseState($purchaseState)
  {
    $this->purchaseState = $purchaseState;
  }
  /**
   * @return int
   */
  public function getPurchaseState()
  {
    return $this->purchaseState;
  }
  /**
   * @param string
   */
  public function setPurchaseTimeMillis($purchaseTimeMillis)
  {
    $this->purchaseTimeMillis = $purchaseTimeMillis;
  }
  /**
   * @return string
   */
  public function getPurchaseTimeMillis()
  {
    return $this->purchaseTimeMillis;
  }
  /**
   * @param string
   */
  public function setPurchaseToken($purchaseToken)
  {
    $this->purchaseToken = $purchaseToken;
  }
  /**
   * @return string
   */
  public function getPurchaseToken()
  {
    return $this->purchaseToken;
  }
  /**
   * @param int
   */
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  /**
   * @return int
   */
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  /**
   * @param int
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return int
   */
  public function getQuantity()
  {
    return $this->quantity;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductPurchase::class, 'Google_Service_AndroidPublisher_ProductPurchase');
