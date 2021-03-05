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

class Google_Service_ShoppingContent_OrderTrackingSignal extends Google_Collection
{
  protected $collection_key = 'shippingInfo';
  protected $customerShippingFeeType = 'Google_Service_ShoppingContent_PriceAmount';
  protected $customerShippingFeeDataType = '';
  public $deliveryPostalCode;
  public $deliveryRegionCode;
  protected $lineItemsType = 'Google_Service_ShoppingContent_OrderTrackingSignalLineItemDetails';
  protected $lineItemsDataType = 'array';
  public $merchantId;
  protected $orderCreatedTimeType = 'Google_Service_ShoppingContent_DateTime';
  protected $orderCreatedTimeDataType = '';
  public $orderId;
  public $orderTrackingSignalId;
  protected $shipmentLineItemMappingType = 'Google_Service_ShoppingContent_OrderTrackingSignalShipmentLineItemMapping';
  protected $shipmentLineItemMappingDataType = 'array';
  protected $shippingInfoType = 'Google_Service_ShoppingContent_OrderTrackingSignalShippingInfo';
  protected $shippingInfoDataType = 'array';

  /**
   * @param Google_Service_ShoppingContent_PriceAmount
   */
  public function setCustomerShippingFee(Google_Service_ShoppingContent_PriceAmount $customerShippingFee)
  {
    $this->customerShippingFee = $customerShippingFee;
  }
  /**
   * @return Google_Service_ShoppingContent_PriceAmount
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
   * @param Google_Service_ShoppingContent_OrderTrackingSignalLineItemDetails[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderTrackingSignalLineItemDetails[]
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
   * @param Google_Service_ShoppingContent_DateTime
   */
  public function setOrderCreatedTime(Google_Service_ShoppingContent_DateTime $orderCreatedTime)
  {
    $this->orderCreatedTime = $orderCreatedTime;
  }
  /**
   * @return Google_Service_ShoppingContent_DateTime
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
   * @param Google_Service_ShoppingContent_OrderTrackingSignalShipmentLineItemMapping[]
   */
  public function setShipmentLineItemMapping($shipmentLineItemMapping)
  {
    $this->shipmentLineItemMapping = $shipmentLineItemMapping;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderTrackingSignalShipmentLineItemMapping[]
   */
  public function getShipmentLineItemMapping()
  {
    return $this->shipmentLineItemMapping;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderTrackingSignalShippingInfo[]
   */
  public function setShippingInfo($shippingInfo)
  {
    $this->shippingInfo = $shippingInfo;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderTrackingSignalShippingInfo[]
   */
  public function getShippingInfo()
  {
    return $this->shippingInfo;
  }
}
