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

namespace Google\Service\AndroidPublisher;

class RegionalBasePlanConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $newSubscriberAvailability;
  protected $priceType = Money::class;
  protected $priceDataType = '';
  /**
   * @var string
   */
  public $regionCode;

  /**
   * @param bool
   */
  public function setNewSubscriberAvailability($newSubscriberAvailability)
  {
    $this->newSubscriberAvailability = $newSubscriberAvailability;
  }
  /**
   * @return bool
   */
  public function getNewSubscriberAvailability()
  {
    return $this->newSubscriberAvailability;
  }
  /**
   * @param Money
   */
  public function setPrice(Money $price)
  {
    $this->price = $price;
  }
  /**
   * @return Money
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionalBasePlanConfig::class, 'Google_Service_AndroidPublisher_RegionalBasePlanConfig');
