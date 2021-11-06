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

class OrderTrackingSignal extends \Google\Collection
{
  protected $collection_key = 'shippingInfo';
  protected $customerShippingFeeType = PriceAmount::class;
  protected $customerShippingFeeDataType = '';
  public $deliveryPostalCode;
  public $deliveryRegionCode;
  protected $lineItemsType = OrderTrackingSignalLineItemDetails::class;
  protected $lineItemsDataType = 'array';
  public $merchantId;
  protected $orderCreatedTimeType = DateTime::class;
  protected $orderCreatedTimeDataType = '';
  public $orderId;
  public $orderTrackingSignalId;
  protected $shipmentLineItemMappingType = OrderTrackingSignalShipmentLineItemMapping::class;
  protected $shipmentLineItemMappingDataType = 'array';
  protected $shippingInfoType = OrderTrackingSignalShippingInfo::class;
  protected $shippingInfoDataType = 'array';

  /**
   * @param PriceAmount
   */
  public function setCustomerShippingFee(PriceAmount $customerShippingFee)
  {
    $this->customerShippingFee = $customerShippingFee;
  }
  /**
   * @return PriceAmount
   */
  public function getCustomerShippingFee()
  {
    return $this->customerShippingFee;
  }
  public function setDeliveryPostalCode($deliveryPostalCode)
  {
    $this->deliveryPostalCode = $deliveryPostalCode;
  }
  public function getDeliveryPostalCode()
  {
    return $this->deliveryPostalCode;
  }
  public function setDeliveryRegionCode($deliveryRegionCode)
  {
    $this->deliveryRegionCode = $deliveryRegionCode;
  }
  public function getDeliveryRegionCode()
  {
    return $this->deliveryRegionCode;
  }
  /**
   * @param OrderTrackingSignalLineItemDetails[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return OrderTrackingSignalLineItemDetails[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param DateTime
   */
  public function setOrderCreatedTime(DateTime $orderCreatedTime)
  {
    $this->orderCreatedTime = $orderCreatedTime;
  }
  /**
   * @return DateTime
   */
  public function getOrderCreatedTime()
  {
    return $this->orderCreatedTime;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setOrderTrackingSignalId($orderTrackingSignalId)
  {
    $this->orderTrackingSignalId = $orderTrackingSignalId;
  }
  public function getOrderTrackingSignalId()
  {
    return $this->orderTrackingSignalId;
  }
  /**
   * @param OrderTrackingSignalShipmentLineItemMapping[]
   */
  public function setShipmentLineItemMapping($shipmentLineItemMapping)
  {
    $this->shipmentLineItemMapping = $shipmentLineItemMapping;
  }
  /**
   * @return OrderTrackingSignalShipmentLineItemMapping[]
   */
  public function getShipmentLineItemMapping()
  {
    return $this->shipmentLineItemMapping;
  }
  /**
   * @param OrderTrackingSignalShippingInfo[]
   */
  public function setShippingInfo($shippingInfo)
  {
    $this->shippingInfo = $shippingInfo;
  }
  /**
   * @return OrderTrackingSignalShippingInfo[]
   */
  public function getShippingInfo()
  {
    return $this->shippingInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderTrackingSignal::class, 'Google_Service_ShoppingContent_OrderTrackingSignal');
