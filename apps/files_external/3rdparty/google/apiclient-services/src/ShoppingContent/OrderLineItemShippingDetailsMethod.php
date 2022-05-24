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

class OrderLineItemShippingDetailsMethod extends \Google\Model
{
  /**
   * @var string
   */
  public $carrier;
  /**
   * @var string
   */
  public $maxDaysInTransit;
  /**
   * @var string
   */
  public $methodName;
  /**
   * @var string
   */
  public $minDaysInTransit;

  /**
   * @param string
   */
  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  /**
   * @return string
   */
  public function getCarrier()
  {
    return $this->carrier;
  }
  /**
   * @param string
   */
  public function setMaxDaysInTransit($maxDaysInTransit)
  {
    $this->maxDaysInTransit = $maxDaysInTransit;
  }
  /**
   * @return string
   */
  public function getMaxDaysInTransit()
  {
    return $this->maxDaysInTransit;
  }
  /**
   * @param string
   */
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }
  /**
   * @return string
   */
  public function getMethodName()
  {
    return $this->methodName;
  }
  /**
   * @param string
   */
  public function setMinDaysInTransit($minDaysInTransit)
  {
    $this->minDaysInTransit = $minDaysInTransit;
  }
  /**
   * @return string
   */
  public function getMinDaysInTransit()
  {
    return $this->minDaysInTransit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderLineItemShippingDetailsMethod::class, 'Google_Service_ShoppingContent_OrderLineItemShippingDetailsMethod');
