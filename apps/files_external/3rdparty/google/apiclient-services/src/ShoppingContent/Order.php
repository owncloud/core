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

class Order extends \Google\Collection
{
  protected $collection_key = 'shipments';
  /**
   * @var bool
   */
  public $acknowledged;
  protected $annotationsType = OrderOrderAnnotation::class;
  protected $annotationsDataType = 'array';
  protected $billingAddressType = OrderAddress::class;
  protected $billingAddressDataType = '';
  protected $customerType = OrderCustomer::class;
  protected $customerDataType = '';
  protected $deliveryDetailsType = OrderDeliveryDetails::class;
  protected $deliveryDetailsDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $lineItemsType = OrderLineItem::class;
  protected $lineItemsDataType = 'array';
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var string
   */
  public $merchantOrderId;
  protected $netPriceAmountType = Price::class;
  protected $netPriceAmountDataType = '';
  protected $netTaxAmountType = Price::class;
  protected $netTaxAmountDataType = '';
  /**
   * @var string
   */
  public $paymentStatus;
  protected $pickupDetailsType = OrderPickupDetails::class;
  protected $pickupDetailsDataType = '';
  /**
   * @var string
   */
  public $placedDate;
  protected $promotionsType = OrderPromotion::class;
  protected $promotionsDataType = 'array';
  protected $refundsType = OrderRefund::class;
  protected $refundsDataType = 'array';
  protected $shipmentsType = OrderShipment::class;
  protected $shipmentsDataType = 'array';
  protected $shippingCostType = Price::class;
  protected $shippingCostDataType = '';
  protected $shippingCostTaxType = Price::class;
  protected $shippingCostTaxDataType = '';
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $taxCollector;

  /**
   * @param bool
   */
  public function setAcknowledged($acknowledged)
  {
    $this->acknowledged = $acknowledged;
  }
  /**
   * @return bool
   */
  public function getAcknowledged()
  {
    return $this->acknowledged;
  }
  /**
   * @param OrderOrderAnnotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return OrderOrderAnnotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param OrderAddress
   */
  public function setBillingAddress(OrderAddress $billingAddress)
  {
    $this->billingAddress = $billingAddress;
  }
  /**
   * @return OrderAddress
   */
  public function getBillingAddress()
  {
    return $this->billingAddress;
  }
  /**
   * @param OrderCustomer
   */
  public function setCustomer(OrderCustomer $customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return OrderCustomer
   */
  public function getCustomer()
  {
    return $this->customer;
  }
  /**
   * @param OrderDeliveryDetails
   */
  public function setDeliveryDetails(OrderDeliveryDetails $deliveryDetails)
  {
    $this->deliveryDetails = $deliveryDetails;
  }
  /**
   * @return OrderDeliveryDetails
   */
  public function getDeliveryDetails()
  {
    return $this->deliveryDetails;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param OrderLineItem[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return OrderLineItem[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
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
   * @param Price
   */
  public function setNetPriceAmount(Price $netPriceAmount)
  {
    $this->netPriceAmount = $netPriceAmount;
  }
  /**
   * @return Price
   */
  public function getNetPriceAmount()
  {
    return $this->netPriceAmount;
  }
  /**
   * @param Price
   */
  public function setNetTaxAmount(Price $netTaxAmount)
  {
    $this->netTaxAmount = $netTaxAmount;
  }
  /**
   * @return Price
   */
  public function getNetTaxAmount()
  {
    return $this->netTaxAmount;
  }
  /**
   * @param string
   */
  public function setPaymentStatus($paymentStatus)
  {
    $this->paymentStatus = $paymentStatus;
  }
  /**
   * @return string
   */
  public function getPaymentStatus()
  {
    return $this->paymentStatus;
  }
  /**
   * @param OrderPickupDetails
   */
  public function setPickupDetails(OrderPickupDetails $pickupDetails)
  {
    $this->pickupDetails = $pickupDetails;
  }
  /**
   * @return OrderPickupDetails
   */
  public function getPickupDetails()
  {
    return $this->pickupDetails;
  }
  /**
   * @param string
   */
  public function setPlacedDate($placedDate)
  {
    $this->placedDate = $placedDate;
  }
  /**
   * @return string
   */
  public function getPlacedDate()
  {
    return $this->placedDate;
  }
  /**
   * @param OrderPromotion[]
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return OrderPromotion[]
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param OrderRefund[]
   */
  public function setRefunds($refunds)
  {
    $this->refunds = $refunds;
  }
  /**
   * @return OrderRefund[]
   */
  public function getRefunds()
  {
    return $this->refunds;
  }
  /**
   * @param OrderShipment[]
   */
  public function setShipments($shipments)
  {
    $this->shipments = $shipments;
  }
  /**
   * @return OrderShipment[]
   */
  public function getShipments()
  {
    return $this->shipments;
  }
  /**
   * @param Price
   */
  public function setShippingCost(Price $shippingCost)
  {
    $this->shippingCost = $shippingCost;
  }
  /**
   * @return Price
   */
  public function getShippingCost()
  {
    return $this->shippingCost;
  }
  /**
   * @param Price
   */
  public function setShippingCostTax(Price $shippingCostTax)
  {
    $this->shippingCostTax = $shippingCostTax;
  }
  /**
   * @return Price
   */
  public function getShippingCostTax()
  {
    return $this->shippingCostTax;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTaxCollector($taxCollector)
  {
    $this->taxCollector = $taxCollector;
  }
  /**
   * @return string
   */
  public function getTaxCollector()
  {
    return $this->taxCollector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Order::class, 'Google_Service_ShoppingContent_Order');
