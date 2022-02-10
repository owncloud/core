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

namespace Google\Service\ShoppingContent;

class SettlementTransactionIdentifiers extends \Google\Collection
{
  protected $collection_key = 'shipmentIds';
  /**
   * @var string
   */
  public $adjustmentId;
  /**
   * @var string
   */
  public $merchantOrderId;
  /**
   * @var string
   */
  public $orderItemId;
  /**
   * @var string
   */
  public $settlementEntryId;
  /**
   * @var string[]
   */
  public $shipmentIds;
  /**
   * @var string
   */
  public $transactionId;

  /**
   * @param string
   */
  public function setAdjustmentId($adjustmentId)
  {
    $this->adjustmentId = $adjustmentId;
  }
  /**
   * @return string
   */
  public function getAdjustmentId()
  {
    return $this->adjustmentId;
  }
  /**
   * @param string
   */
  public function setMerchantOrderId($merchantOrderId)
  {
    $this->merchantOrderId = $merchantOrderId;
  }
  /**
   * @return string
   */
  public function getMerchantOrderId()
  {
    return $this->merchantOrderId;
  }
  /**
   * @param string
   */
  public function setOrderItemId($orderItemId)
  {
    $this->orderItemId = $orderItemId;
  }
  /**
   * @return string
   */
  public function getOrderItemId()
  {
    return $this->orderItemId;
  }
  /**
   * @param string
   */
  public function setSettlementEntryId($settlementEntryId)
  {
    $this->settlementEntryId = $settlementEntryId;
  }
  /**
   * @return string
   */
  public function getSettlementEntryId()
  {
    return $this->settlementEntryId;
  }
  /**
   * @param string[]
   */
  public function setShipmentIds($shipmentIds)
  {
    $this->shipmentIds = $shipmentIds;
  }
  /**
   * @return string[]
   */
  public function getShipmentIds()
  {
    return $this->shipmentIds;
  }
  /**
   * @param string
   */
  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  /**
   * @return string
   */
  public function getTransactionId()
  {
    return $this->transactionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettlementTransactionIdentifiers::class, 'Google_Service_ShoppingContent_SettlementTransactionIdentifiers');
