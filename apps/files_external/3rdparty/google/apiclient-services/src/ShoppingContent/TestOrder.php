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

class TestOrder extends \Google\Collection
{
  protected $collection_key = 'promotions';
  protected $deliveryDetailsType = TestOrderDeliveryDetails::class;
  protected $deliveryDetailsDataType = '';
  /**
   * @var bool
   */
  public $enableOrderinvoices;
  /**
   * @var string
   */
  public $kind;
  protected $lineItemsType = TestOrderLineItem::class;
  protected $lineItemsDataType = 'array';
  /**
   * @var string
   */
  public $notificationMode;
  protected $pickupDetailsType = TestOrderPickupDetails::class;
  protected $pickupDetailsDataType = '';
  /**
   * @var string
   */
  public $predefinedBillingAddress;
  /**
   * @var string
   */
  public $predefinedDeliveryAddress;
  /**
   * @var string
   */
  public $predefinedEmail;
  /**
   * @var string
   */
  public $predefinedPickupDetails;
  protected $promotionsType = OrderPromotion::class;
  protected $promotionsDataType = 'array';
  protected $shippingCostType = Price::class;
  protected $shippingCostDataType = '';
  /**
   * @var string
   */
  public $shippingOption;

  /**
   * @param TestOrderDeliveryDetails
   */
  public function setDeliveryDetails(TestOrderDeliveryDetails $deliveryDetails)
  {
    $this->deliveryDetails = $deliveryDetails;
  }
  /**
   * @return TestOrderDeliveryDetails
   */
  public function getDeliveryDetails()
  {
    return $this->deliveryDetails;
  }
  /**
   * @param bool
   */
  public function setEnableOrderinvoices($enableOrderinvoices)
  {
    $this->enableOrderinvoices = $enableOrderinvoices;
  }
  /**
   * @return bool
   */
  public function getEnableOrderinvoices()
  {
    return $this->enableOrderinvoices;
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
   * @param TestOrderLineItem[]
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return TestOrderLineItem[]
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  /**
   * @param string
   */
  public function setNotificationMode($notificationMode)
  {
    $this->notificationMode = $notificationMode;
  }
  /**
   * @return string
   */
  public function getNotificationMode()
  {
    return $this->notificationMode;
  }
  /**
   * @param TestOrderPickupDetails
   */
  public function setPickupDetails(TestOrderPickupDetails $pickupDetails)
  {
    $this->pickupDetails = $pickupDetails;
  }
  /**
   * @return TestOrderPickupDetails
   */
  public function getPickupDetails()
  {
    return $this->pickupDetails;
  }
  /**
   * @param string
   */
  public function setPredefinedBillingAddress($predefinedBillingAddress)
  {
    $this->predefinedBillingAddress = $predefinedBillingAddress;
  }
  /**
   * @return string
   */
  public function getPredefinedBillingAddress()
  {
    return $this->predefinedBillingAddress;
  }
  /**
   * @param string
   */
  public function setPredefinedDeliveryAddress($predefinedDeliveryAddress)
  {
    $this->predefinedDeliveryAddress = $predefinedDeliveryAddress;
  }
  /**
   * @return string
   */
  public function getPredefinedDeliveryAddress()
  {
    return $this->predefinedDeliveryAddress;
  }
  /**
   * @param string
   */
  public function setPredefinedEmail($predefinedEmail)
  {
    $this->predefinedEmail = $predefinedEmail;
  }
  /**
   * @return string
   */
  public function getPredefinedEmail()
  {
    return $this->predefinedEmail;
  }
  /**
   * @param string
   */
  public function setPredefinedPickupDetails($predefinedPickupDetails)
  {
    $this->predefinedPickupDetails = $predefinedPickupDetails;
  }
  /**
   * @return string
   */
  public function getPredefinedPickupDetails()
  {
    return $this->predefinedPickupDetails;
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
   * @param string
   */
  public function setShippingOption($shippingOption)
  {
    $this->shippingOption = $shippingOption;
  }
  /**
   * @return string
   */
  public function getShippingOption()
  {
    return $this->shippingOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestOrder::class, 'Google_Service_ShoppingContent_TestOrder');
