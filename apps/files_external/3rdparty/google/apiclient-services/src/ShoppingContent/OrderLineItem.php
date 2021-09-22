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

class OrderLineItem extends \Google\Collection
{
  protected $collection_key = 'returns';
  protected $adjustmentsType = OrderLineItemAdjustment::class;
  protected $adjustmentsDataType = 'array';
  protected $annotationsType = OrderMerchantProvidedAnnotation::class;
  protected $annotationsDataType = 'array';
  protected $cancellationsType = OrderCancellation::class;
  protected $cancellationsDataType = 'array';
  public $id;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  protected $productType = OrderLineItemProduct::class;
  protected $productDataType = '';
  public $quantityCanceled;
  public $quantityDelivered;
  public $quantityOrdered;
  public $quantityPending;
  public $quantityReadyForPickup;
  public $quantityReturned;
  public $quantityShipped;
  public $quantityUndeliverable;
  protected $returnInfoType = OrderLineItemReturnInfo::class;
  protected $returnInfoDataType = '';
  protected $returnsType = OrderReturn::class;
  protected $returnsDataType = 'array';
  protected $shippingDetailsType = OrderLineItemShippingDetails::class;
  protected $shippingDetailsDataType = '';
  protected $taxType = Price::class;
  protected $taxDataType = '';

  /**
   * @param OrderLineItemAdjustment[]
   */
  public function setAdjustments($adjustments)
  {
    $this->adjustments = $adjustments;
  }
  /**
   * @return OrderLineItemAdjustment[]
   */
  public function getAdjustments()
  {
    return $this->adjustments;
  }
  /**
   * @param OrderMerchantProvidedAnnotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return OrderMerchantProvidedAnnotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param OrderCancellation[]
   */
  public function setCancellations($cancellations)
  {
    $this->cancellations = $cancellations;
  }
  /**
   * @return OrderCancellation[]
   */
  public function getCancellations()
  {
    return $this->cancellations;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Price
   */
  public function setPrice(Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Price
   */
  public function getPrice()
  {
    return $this->price;
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
  public function setQuantityCanceled($quantityCanceled)
  {
    $this->quantityCanceled = $quantityCanceled;
  }
  public function getQuantityCanceled()
  {
    return $this->quantityCanceled;
  }
  public function setQuantityDelivered($quantityDelivered)
  {
    $this->quantityDelivered = $quantityDelivered;
  }
  public function getQuantityDelivered()
  {
    return $this->quantityDelivered;
  }
  public function setQuantityOrdered($quantityOrdered)
  {
    $this->quantityOrdered = $quantityOrdered;
  }
  public function getQuantityOrdered()
  {
    return $this->quantityOrdered;
  }
  public function setQuantityPending($quantityPending)
  {
    $this->quantityPending = $quantityPending;
  }
  public function getQuantityPending()
  {
    return $this->quantityPending;
  }
  public function setQuantityReadyForPickup($quantityReadyForPickup)
  {
    $this->quantityReadyForPickup = $quantityReadyForPickup;
  }
  public function getQuantityReadyForPickup()
  {
    return $this->quantityReadyForPickup;
  }
  public function setQuantityReturned($quantityReturned)
  {
    $this->quantityReturned = $quantityReturned;
  }
  public function getQuantityReturned()
  {
    return $this->quantityReturned;
  }
  public function setQuantityShipped($quantityShipped)
  {
    $this->quantityShipped = $quantityShipped;
  }
  public function getQuantityShipped()
  {
    return $this->quantityShipped;
  }
  public function setQuantityUndeliverable($quantityUndeliverable)
  {
    $this->quantityUndeliverable = $quantityUndeliverable;
  }
  public function getQuantityUndeliverable()
  {
    return $this->quantityUndeliverable;
  }
  /**
   * @param OrderLineItemReturnInfo
   */
  public function setReturnInfo(OrderLineItemReturnInfo $returnInfo)
  {
    $this->returnInfo = $returnInfo;
  }
  /**
   * @return OrderLineItemReturnInfo
   */
  public function getReturnInfo()
  {
    return $this->returnInfo;
  }
  /**
   * @param OrderReturn[]
   */
  public function setReturns($returns)
  {
    $this->returns = $returns;
  }
  /**
   * @return OrderReturn[]
   */
  public function getReturns()
  {
    return $this->returns;
  }
  /**
   * @param OrderLineItemShippingDetails
   */
  public function setShippingDetails(OrderLineItemShippingDetails $shippingDetails)
  {
    $this->shippingDetails = $shippingDetails;
  }
  /**
   * @return OrderLineItemShippingDetails
   */
  public function getShippingDetails()
  {
    return $this->shippingDetails;
  }
  /**
   * @param Price
   */
  public function setTax(Price $tax)
  {
    $this->tax = $tax;
  }
  /**
   * @return Price
   */
  public function getTax()
  {
    return $this->tax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderLineItem::class, 'Google_Service_ShoppingContent_OrderLineItem');
