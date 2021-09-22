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

class VoidedPurchase extends \Google\Model
{
  public $kind;
  public $orderId;
  public $purchaseTimeMillis;
  public $purchaseToken;
  public $voidedReason;
  public $voidedSource;
  public $voidedTimeMillis;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
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
  public function setVoidedReason($voidedReason)
  {
    $this->voidedReason = $voidedReason;
  }
  public function getVoidedReason()
  {
    return $this->voidedReason;
  }
  public function setVoidedSource($voidedSource)
  {
    $this->voidedSource = $voidedSource;
  }
  public function getVoidedSource()
  {
    return $this->voidedSource;
  }
  public function setVoidedTimeMillis($voidedTimeMillis)
  {
    $this->voidedTimeMillis = $voidedTimeMillis;
  }
  public function getVoidedTimeMillis()
  {
    return $this->voidedTimeMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VoidedPurchase::class, 'Google_Service_AndroidPublisher_VoidedPurchase');
