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

class Google_Service_ShoppingContent_TestOrder extends Google_Collection
{
  protected $collection_key = 'promotions';
  protected $deliveryDetailsType = 'Google_Service_ShoppingContent_TestOrderDeliveryDetails';
  protected $deliveryDetailsDataType = '';
  public $enableOrderinvoices;
  public $kind;
  protected $lineItemsType = 'Google_Service_ShoppingContent_TestOrderLineItem';
  protected $lineItemsDataType = 'array';
  public $notificationMode;
  protected $pickupDetailsType = 'Google_Service_ShoppingContent_TestOrderPickupDetails';
  protected $pickupDetailsDataType = '';
  public $predefinedBillingAddress;
  public $predefinedDeliveryAddress;
  public $predefinedEmail;
  public $predefinedPickupDetails;
  protected $promotionsType = 'Google_Service_ShoppingContent_OrderPromotion';
  protected $promotionsDataType = 'array';
  protected $shippingCostType = 'Google_Service_ShoppingContent_Price';
  protected $shippingCostDataType = '';
  public $shippingOption;

  /**
   * @param Google_Service_ShoppingContent_TestOrderDeliveryDetails
   */
  public function setDeliveryDetails(Google_Service_ShoppingContent_TestOrderDeliveryDetails $deliveryDetails)
  {
    $this->deliveryDetails = $deliveryDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderDeliveryDetails
   */
  public function getDeliveryDetails()
  {
    return $this->deliveryDetails;
  }
  public function setEnableOrderinvoices($enableOrderinvoices)
  {
    $this->enableOrderinvoices = $enableOrderinvoices;
  }
  public function getEnableOrderinvoices()
  {
    return $this->enableOrderinvoices;
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
   * @param Google_Service_ShoppingContent_TestOrderLineItem
   */
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderLineItem
   */
  public function getLineItems()
  {
    return $this->lineItems;
  }
  public function setNotificationMode($notificationMode)
  {
    $this->notificationMode = $notificationMode;
  }
  public function getNotificationMode()
  {
    return $this->notificationMode;
  }
  /**
   * @param Google_Service_ShoppingContent_TestOrderPickupDetails
   */
  public function setPickupDetails(Google_Service_ShoppingContent_TestOrderPickupDetails $pickupDetails)
  {
    $this->pickupDetails = $pickupDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderPickupDetails
   */
  public function getPickupDetails()
  {
    return $this->pickupDetails;
  }
  public function setPredefinedBillingAddress($predefinedBillingAddress)
  {
    $this->predefinedBillingAddress = $predefinedBillingAddress;
  }
  public function getPredefinedBillingAddress()
  {
    return $this->predefinedBillingAddress;
  }
  public function setPredefinedDeliveryAddress($predefinedDeliveryAddress)
  {
    $this->predefinedDeliveryAddress = $predefinedDeliveryAddress;
  }
  public function getPredefinedDeliveryAddress()
  {
    return $this->predefinedDeliveryAddress;
  }
  public function setPredefinedEmail($predefinedEmail)
  {
    $this->predefinedEmail = $predefinedEmail;
  }
  public function getPredefinedEmail()
  {
    return $this->predefinedEmail;
  }
  public function setPredefinedPickupDetails($predefinedPickupDetails)
  {
    $this->predefinedPickupDetails = $predefinedPickupDetails;
  }
  public function getPredefinedPickupDetails()
  {
    return $this->predefinedPickupDetails;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderPromotion
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotion
   */
  public function getPromotions()
  {
    return $this->promotions;
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
  public function setShippingOption($shippingOption)
  {
    $this->shippingOption = $shippingOption;
  }
  public function getShippingOption()
  {
    return $this->shippingOption;
  }
}
