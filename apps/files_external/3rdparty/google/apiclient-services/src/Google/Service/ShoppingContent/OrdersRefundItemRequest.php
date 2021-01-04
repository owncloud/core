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

class Google_Service_ShoppingContent_OrdersRefundItemRequest extends Google_Collection
{
  protected $collection_key = 'items';
  protected $itemsType = 'Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemItem';
  protected $itemsDataType = 'array';
  public $operationId;
  public $reason;
  public $reasonText;
  protected $shippingType = 'Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemShipping';
  protected $shippingDataType = '';

  /**
   * @param Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  public function setReasonText($reasonText)
  {
    $this->reasonText = $reasonText;
  }
  public function getReasonText()
  {
    return $this->reasonText;
  }
  /**
   * @param Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemShipping
   */
  public function setShipping(Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemShipping $shipping)
  {
    $this->shipping = $shipping;
  }
  /**
   * @return Google_Service_ShoppingContent_OrdersCustomBatchRequestEntryRefundItemShipping
   */
  public function getShipping()
  {
    return $this->shipping;
  }
}
