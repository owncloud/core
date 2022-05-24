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
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $orderId;
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
  public $voidedReason;
  /**
   * @var int
   */
  public $voidedSource;
  /**
   * @var string
   */
  public $voidedTimeMillis;

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
  public function setVoidedReason($voidedReason)
  {
    $this->voidedReason = $voidedReason;
  }
  /**
   * @return int
   */
  public function getVoidedReason()
  {
    return $this->voidedReason;
  }
  /**
   * @param int
   */
  public function setVoidedSource($voidedSource)
  {
    $this->voidedSource = $voidedSource;
  }
  /**
   * @return int
   */
  public function getVoidedSource()
  {
    return $this->voidedSource;
  }
  /**
   * @param string
   */
  public function setVoidedTimeMillis($voidedTimeMillis)
  {
    $this->voidedTimeMillis = $voidedTimeMillis;
  }
  /**
   * @return string
   */
  public function getVoidedTimeMillis()
  {
    return $this->voidedTimeMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VoidedPurchase::class, 'Google_Service_AndroidPublisher_VoidedPurchase');
