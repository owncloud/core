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

class MerchantOrderReturnItem extends \Google\Collection
{
  protected $collection_key = 'returnShipmentIds';
  protected $customerReturnReasonType = CustomerReturnReason::class;
  protected $customerReturnReasonDataType = '';
  /**
   * @var string
   */
  public $itemId;
  protected $merchantRejectionReasonType = MerchantRejectionReason::class;
  protected $merchantRejectionReasonDataType = '';
  protected $merchantReturnReasonType = RefundReason::class;
  protected $merchantReturnReasonDataType = '';
  protected $productType = OrderLineItemProduct::class;
  protected $productDataType = '';
  protected $refundableAmountType = MonetaryAmount::class;
  protected $refundableAmountDataType = '';
  /**
   * @var string
   */
  public $returnItemId;
  /**
   * @var string[]
   */
  public $returnShipmentIds;
  /**
   * @var string
   */
  public $shipmentGroupId;
  /**
   * @var string
   */
  public $shipmentUnitId;
  /**
   * @var string
   */
  public $state;

  /**
   * @param CustomerReturnReason
   */
  public function setCustomerReturnReason(CustomerReturnReason $customerReturnReason)
  {
    $this->customerReturnReason = $customerReturnReason;
  }
  /**
   * @return CustomerReturnReason
   */
  public function getCustomerReturnReason()
  {
    return $this->customerReturnReason;
  }
  /**
   * @param string
   */
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  /**
   * @return string
   */
  public function getItemId()
  {
    return $this->itemId;
  }
  /**
   * @param MerchantRejectionReason
   */
  public function setMerchantRejectionReason(MerchantRejectionReason $merchantRejectionReason)
  {
    $this->merchantRejectionReason = $merchantRejectionReason;
  }
  /**
   * @return MerchantRejectionReason
   */
  public function getMerchantRejectionReason()
  {
    return $this->merchantRejectionReason;
  }
  /**
   * @param RefundReason
   */
  public function setMerchantReturnReason(RefundReason $merchantReturnReason)
  {
    $this->merchantReturnReason = $merchantReturnReason;
  }
  /**
   * @return RefundReason
   */
  public function getMerchantReturnReason()
  {
    return $this->merchantReturnReason;
  }
  /**
   * @param OrderLineItemProduct
   */
  public function setProduct(OrderLineItemProduct $product)
  {
    $this->product = $product;
  }
  /**
   * @return OrderLineItemProduct
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param MonetaryAmount
   */
  public function setRefundableAmount(MonetaryAmount $refundableAmount)
  {
    $this->refundableAmount = $refundableAmount;
  }
  /**
   * @return MonetaryAmount
   */
  public function getRefundableAmount()
  {
    return $this->refundableAmount;
  }
  /**
   * @param string
   */
  public function setReturnItemId($returnItemId)
  {
    $this->returnItemId = $returnItemId;
  }
  /**
   * @return string
   */
  public function getReturnItemId()
  {
    return $this->returnItemId;
  }
  /**
   * @param string[]
   */
  public function setReturnShipmentIds($returnShipmentIds)
  {
    $this->returnShipmentIds = $returnShipmentIds;
  }
  /**
   * @return string[]
   */
  public function getReturnShipmentIds()
  {
    return $this->returnShipmentIds;
  }
  /**
   * @param string
   */
  public function setShipmentGroupId($shipmentGroupId)
  {
    $this->shipmentGroupId = $shipmentGroupId;
  }
  /**
   * @return string
   */
  public function getShipmentGroupId()
  {
    return $this->shipmentGroupId;
  }
  /**
   * @param string
   */
  public function setShipmentUnitId($shipmentUnitId)
  {
    $this->shipmentUnitId = $shipmentUnitId;
  }
  /**
   * @return string
   */
  public function getShipmentUnitId()
  {
    return $this->shipmentUnitId;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MerchantOrderReturnItem::class, 'Google_Service_ShoppingContent_MerchantOrderReturnItem');
