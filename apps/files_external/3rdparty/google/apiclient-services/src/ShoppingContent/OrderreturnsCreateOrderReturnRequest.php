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

class OrderreturnsCreateOrderReturnRequest extends \Google\Collection
{
  protected $collection_key = 'lineItems';
  protected $lineItemsType = OrderreturnsLineItem::class;
  protected $lineItemsDataType = 'array';
  public $operationId;
  public $orderId;
  public $returnMethodType;

  /**
   * @param OrderreturnsLineItem[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return OrderreturnsLineItem[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setReturnMethodType($returnMethodType)
  {
    $this->returnMethodType = $returnMethodType;
  }
  public function getReturnMethodType()
  {
    return $this->returnMethodType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderreturnsCreateOrderReturnRequest::class, 'Google_Service_ShoppingContent_OrderreturnsCreateOrderReturnRequest');
