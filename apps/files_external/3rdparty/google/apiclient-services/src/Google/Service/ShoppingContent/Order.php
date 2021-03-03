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

class Google_Service_ShoppingContent_Order extends Google_Collection
{
  protected $collection_key = 'shipments';
  public $acknowledged;
  protected $annotationsType = 'Google_Service_ShoppingContent_OrderOrderAnnotation';
  protected $annotationsDataType = 'array';
  protected $billingAddressType = 'Google_Service_ShoppingContent_OrderAddress';
  protected $billingAddressDataType = '';
  protected $customerType = 'Google_Service_ShoppingContent_OrderCustomer';
  protected $customerDataType = '';
  protected $deliveryDetailsType = 'Google_Service_ShoppingContent_OrderDeliveryDetails';
  protected $deliveryDetailsDataType = '';
  public $id;
  public $kind;
  protected $lineItemsType = 'Google_Service_ShoppingContent_OrderLineItem';
  protected $lineItemsDataType = 'array';
  public $merchantId;
  public $merchantOrderId;
  protected $netPriceAmountType = 'Google_Service_ShoppingContent_Price';
  protected $netPriceAmountDataType = '';
  protected $netTaxAmountType = 'Google_Service_ShoppingContent_Price';
  protected $netTaxAmountDataType = '';
  public $paymentStatus;
  protected $pickupDetailsType = 'Google_Service_ShoppingContent_OrderPickupDetails';
  protected $pickupDetailsDataType = '';
  public $placedDate;
  protected $promotionsType = 'Google_Service_ShoppingContent_OrderPromotion';
  protected $promotionsDataType = 'array';
  protected $refundsType = 'Google_Service_ShoppingContent_OrderRefund';
  protected $refundsDataType = 'array';
  protected $shipmentsType = 'Google_Service_ShoppingContent_OrderShipment';
  protected $shipmentsDataType = 'array';
  protected $shippingCostType = 'Google_Service_ShoppingContent_Price';
  protected $shippingCostDataType = '';
  protected $shippingCostTaxType = 'Google_Service_ShoppingContent_Price';
  protected $shippingCostTaxDataType = '';
  public $status;
  public $taxCollector;

  public function setAcknowledged($acknowledged)
  {
    $this->acknowledged = $acknowledged;
  }
  public function getAcknowledged()
  {
    return $this->acknowledged;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderOrderAnnotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderOrderAnnotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderAddress
   */
  public function setBillingAddress(Google_Service_ShoppingContent_OrderAddress $billingAddress)
  {
    $this->billingAddress = $billingAddress;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderAddress
   */
  public function getBillingAddress()
  {
    return $this->billingAddress;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderCustomer
   */
  public function setCustomer(Google_Service_ShoppingContent_OrderCustomer $customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderCustomer
   */
  public function getCustomer()
  {
    return $this->customer;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderDeliveryDetails
   */
  public function setDeliveryDetails(Google_Service_ShoppingContent_OrderDeliveryDetails $deliveryDetails)
  {
    $this->deliveryDetails = $deliveryDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderDeliveryDetails
   */
  public function getDeliveryDetails()
  {
    return $this->deliveryDetails;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderLineItem[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderLineItem[]
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
  public function setMerchantOrderId($merchantOrderId)
  {
    $this->merchantOrderId = $merchantOrderId;
  }
  public function getMerchantOrderId()
  {
    return $this->merchantOrderId;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setNetPriceAmount(Google_Service_ShoppingContent_Price $netPriceAmount)
  {
    $this->netPriceAmount = $netPriceAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getNetPriceAmount()
  {
    return $this->netPriceAmount;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setNetTaxAmount(Google_Service_ShoppingContent_Price $netTaxAmount)
  {
    $this->netTaxAmount = $netTaxAmount;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getNetTaxAmount()
  {
    return $this->netTaxAmount;
  }
  public function setPaymentStatus($paymentStatus)
  {
    $this->paymentStatus = $paymentStatus;
  }
  public function getPaymentStatus()
  {
    return $this->paymentStatus;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderPickupDetails
   */
  public function setPickupDetails(Google_Service_ShoppingContent_OrderPickupDetails $pickupDetails)
  {
    $this->pickupDetails = $pickupDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPickupDetails
   */
  public function getPickupDetails()
  {
    return $this->pickupDetails;
  }
  public function setPlacedDate($placedDate)
  {
    $this->placedDate = $placedDate;
  }
  public function getPlacedDate()
  {
    return $this->placedDate;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderPromotion[]
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotion[]
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderRefund[]
   */
  public function setRefunds($refunds)
  {
    $this->refunds = $refunds;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderRefund[]
   */
  public function getRefunds()
  {
    return $this->refunds;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderShipment[]
   */
  public function setShipments($shipments)
  {
    $this->shipments = $shipments;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderShipment[]
   */
  public function getShipments()
  {
    return $this->shipments;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setShippingCost(Google_Service_ShoppingContent_Price $shippingCost)
  {
    $this->shippingCost = $shippingCost;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getShippingCost()
  {
    return $this->shippingCost;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setShippingCostTax(Google_Service_ShoppingContent_Price $shippingCostTax)
  {
    $this->shippingCostTax = $shippingCostTax;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getShippingCostTax()
  {
    return $this->shippingCostTax;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTaxCollector($taxCollector)
  {
    $this->taxCollector = $taxCollector;
  }
  public function getTaxCollector()
  {
    return $this->taxCollector;
  }
}
