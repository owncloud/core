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

class Google_Service_ShoppingContent_SettlementTransactionIdentifiers extends Google_Collection
{
  protected $collection_key = 'shipmentIds';
  public $adjustmentId;
  public $merchantOrderId;
  public $settlementEntryId;
  public $shipmentIds;
  public $transactionId;

  public function setAdjustmentId($adjustmentId)
  {
    $this->adjustmentId = $adjustmentId;
  }
  public function getAdjustmentId()
  {
    return $this->adjustmentId;
  }
  public function setMerchantOrderId($merchantOrderId)
  {
    $this->merchantOrderId = $merchantOrderId;
  }
  public function getMerchantOrderId()
  {
    return $this->merchantOrderId;
  }
  public function setSettlementEntryId($settlementEntryId)
  {
    $this->settlementEntryId = $settlementEntryId;
  }
  public function getSettlementEntryId()
  {
    return $this->settlementEntryId;
  }
  public function setShipmentIds($shipmentIds)
  {
    $this->shipmentIds = $shipmentIds;
  }
  public function getShipmentIds()
  {
    return $this->shipmentIds;
  }
  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  public function getTransactionId()
  {
    return $this->transactionId;
  }
}
