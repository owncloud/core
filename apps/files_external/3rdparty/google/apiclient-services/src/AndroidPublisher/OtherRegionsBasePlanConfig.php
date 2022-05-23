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

class OtherRegionsBasePlanConfig extends \Google\Model
{
  protected $eurPriceType = Money::class;
  protected $eurPriceDataType = '';
  /**
   * @var bool
   */
  public $newSubscriberAvailability;
  protected $usdPriceType = Money::class;
  protected $usdPriceDataType = '';

  /**
   * @param Money
   */
  public function setEurPrice(Money $eurPrice)
  {
    $this->eurPrice = $eurPrice;
  }
  /**
   * @return Money
   */
  public function getEurPrice()
  {
    return $this->eurPrice;
  }
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
  public function setUsdPrice(Money $usdPrice)
  {
    $this->usdPrice = $usdPrice;
  }
  /**
   * @return Money
   */
  public function getUsdPrice()
  {
    return $this->usdPrice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OtherRegionsBasePlanConfig::class, 'Google_Service_AndroidPublisher_OtherRegionsBasePlanConfig');
