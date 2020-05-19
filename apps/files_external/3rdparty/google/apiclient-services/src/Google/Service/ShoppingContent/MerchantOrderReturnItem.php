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
  protected $merchantRejectionReasonType = 'Google_Service_ShoppingContent_MerchantRejectionReason';
  protected $merchantRejectionReasonDataType = '';
  protected $merchantReturnReasonType = 'Google_Service_ShoppingContent_RefundReason';
  protected $merchantReturnReasonDataType = '';
  protected $productType = 'Google_Service_ShoppingContent_OrderLineItemProduct';
  protected $productDataType = '';
  protected $refundableAmountType = 'Google_Service_ShoppingContent_MonetaryAmount';
  protected $refundableAmountDataType = '';
  public $returnItemId;
  public $returnShipmentIds;
  public $shipmentGroupId;
  public $shipmentUnitId;
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
   * @param Google_Service_ShoppingContent_MerchantRejectionReason
   */
  public function setMerchantRejectionReason(Google_Service_ShoppingContent_MerchantRejectionReason $merchantRejectionReason)
  {
    $this->merchantRejectionReason = $merchantRejectionReason;
  }
  /**
   * @return Google_Service_ShoppingContent_MerchantRejectionReason
   */
  public function getMerchantRejectionReason()
  {
    return $this->merchantRejectionReason;
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
  /**
   * @param Google_Service_ShoppingContent_MonetaryAmount
   */
  public function setRefundableAmount(Google_Service_ShoppingContent_MonetaryAmount $refundableAmount)
  {
    $this->refundableAmount = $refundableAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_MonetaryAmount
   */
  public function getRefundableAmount()
  {
    return $this->refundableAmount;
  }
  public function setReturnItemId($returnItemId)
  {
    $this->returnItemId = $returnItemId;
  }
  public function getReturnItemId()
  {
    return $this->returnItemId;
  }
  public function setReturnShipmentIds($returnShipmentIds)
  {
    $this->returnShipmentIds = $returnShipmentIds;
  }
  public function getReturnShipmentIds()
  {
    return $this->returnShipmentIds;
  }
  public function setShipmentGroupId($shipmentGroupId)
  {
    $this->shipmentGroupId = $shipmentGroupId;
  }
  public function getShipmentGroupId()
  {
    return $this->shipmentGroupId;
  }
  public function setShipmentUnitId($shipmentUnitId)
  {
    $this->shipmentUnitId = $shipmentUnitId;
  }
  public function getShipmentUnitId()
  {
    return $this->shipmentUnitId;
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
