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

class Google_Service_AndroidPublisher_ProductPurchase extends Google_Model
{
  public $acknowledgementState;
  public $consumptionState;
  public $developerPayload;
  public $kind;
  public $obfuscatedExternalAccountId;
  public $obfuscatedExternalProfileId;
  public $orderId;
  public $productId;
  public $purchaseState;
  public $purchaseTimeMillis;
  public $purchaseToken;
  public $purchaseType;
  public $quantity;
  public $regionCode;

  public function setAcknowledgementState($acknowledgementState)
  {
    $this->acknowledgementState = $acknowledgementState;
  }
  public function getAcknowledgementState()
  {
    return $this->acknowledgementState;
  }
  public function setConsumptionState($consumptionState)
  {
    $this->consumptionState = $consumptionState;
  }
  public function getConsumptionState()
  {
    return $this->consumptionState;
  }
  public function setDeveloperPayload($developerPayload)
  {
    $this->developerPayload = $developerPayload;
  }
  public function getDeveloperPayload()
  {
    return $this->developerPayload;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setObfuscatedExternalAccountId($obfuscatedExternalAccountId)
  {
    $this->obfuscatedExternalAccountId = $obfuscatedExternalAccountId;
  }
  public function getObfuscatedExternalAccountId()
  {
    return $this->obfuscatedExternalAccountId;
  }
  public function setObfuscatedExternalProfileId($obfuscatedExternalProfileId)
  {
    $this->obfuscatedExternalProfileId = $obfuscatedExternalProfileId;
  }
  public function getObfuscatedExternalProfileId()
  {
    return $this->obfuscatedExternalProfileId;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setPurchaseState($purchaseState)
  {
    $this->purchaseState = $purchaseState;
  }
  public function getPurchaseState()
  {
    return $this->purchaseState;
  }
  public function setPurchaseTimeMillis($purchaseTimeMillis)
  {
    $this->purchaseTimeMillis = $purchaseTimeMillis;
  }
  public function getPurchaseTimeMillis()
  {
    return $this->purchaseTimeMillis;
  }
  public function setPurchaseToken($purchaseToken)
  {
    $this->purchaseToken = $purchaseToken;
  }
  public function getPurchaseToken()
  {
    return $this->purchaseToken;
  }
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}
