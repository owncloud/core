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

class Google_Service_ShoppingContent_MerchantOrderReturnItem extends Google_Collection
{
  protected $collection_key = 'returnShipmentIds';
  protected $customerReturnReasonType = 'Google_Service_ShoppingContent_CustomerReturnReason';
  protected $customerReturnReasonDataType = '';
  public $itemId;
  protected $merchantReturnReasonType = 'Google_Service_ShoppingContent_RefundReason';
  protected $merchantReturnReasonDataType = '';
  protected $productType = 'Google_Service_ShoppingContent_OrderLineItemProduct';
  protected $productDataType = '';
  public $returnShipmentIds;
  public $state;

  /**
   * @param Google_Service_ShoppingContent_CustomerReturnReason
   */
  public function setCustomerReturnReason(Google_Service_ShoppingContent_CustomerReturnReason $customerReturnReason)
  {
    $this->customerReturnReason = $customerReturnReason;
  }
  /**
   * @return Google_Service_ShoppingContent_CustomerReturnReason
   */
  public function getCustomerReturnReason()
  {
    return $this->customerReturnReason;
  }
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  public function getItemId()
  {
    return $this->itemId;
  }
  /**
   * @param Google_Service_ShoppingContent_RefundReason
   */
  public function setMerchantReturnReason(Google_Service_ShoppingContent_RefundReason $merchantReturnReason)
  {
    $this->merchantReturnReason = $merchantReturnReason;
  }
  /**
   * @return Google_Service_ShoppingContent_RefundReason
   */
  public function getMerchantReturnReason()
  {
    return $this->merchantReturnReason;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderLineItemProduct
   */
  public function setProduct(Google_Service_ShoppingContent_OrderLineItemProduct $product)
  {
    $this->product = $product;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderLineItemProduct
   */
  public function getProduct()
  {
    return $this->product;
  }
  public function setReturnShipmentIds($returnShipmentIds)
  {
    $this->returnShipmentIds = $returnShipmentIds;
  }
  public function getReturnShipmentIds()
  {
    return $this->returnShipmentIds;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
