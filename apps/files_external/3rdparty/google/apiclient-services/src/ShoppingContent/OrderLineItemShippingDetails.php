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

class OrderLineItemShippingDetails extends \Google\Model
{
  public $deliverByDate;
  protected $methodType = OrderLineItemShippingDetailsMethod::class;
  protected $methodDataType = '';
  public $pickupPromiseInMinutes;
  public $shipByDate;
  public $type;

  public function setDeliverByDate($deliverByDate)
  {
    $this->deliverByDate = $deliverByDate;
  }
  public function getDeliverByDate()
  {
    return $this->deliverByDate;
  }
  /**
   * @param OrderLineItemShippingDetailsMethod
   */
  public function setMethod(OrderLineItemShippingDetailsMethod $method)
  {
    $this->method = $method;
  }
  /**
   * @return OrderLineItemShippingDetailsMethod
   */
  public function getMethod()
  {
    return $this->method;
  }
  public function setPickupPromiseInMinutes($pickupPromiseInMinutes)
  {
    $this->pickupPromiseInMinutes = $pickupPromiseInMinutes;
  }
  public function getPickupPromiseInMinutes()
  {
    return $this->pickupPromiseInMinutes;
  }
  public function setShipByDate($shipByDate)
  {
    $this->shipByDate = $shipByDate;
  }
  public function getShipByDate()
  {
    return $this->shipByDate;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderLineItemShippingDetails::class, 'Google_Service_ShoppingContent_OrderLineItemShippingDetails');
