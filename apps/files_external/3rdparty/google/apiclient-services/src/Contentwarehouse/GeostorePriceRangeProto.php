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

namespace Google\Service\Contentwarehouse;

class GeostorePriceRangeProto extends \Google\Model
{
  /**
   * @var string
   */
  public $currency;
  public $lowerPrice;
  /**
   * @var string
   */
  public $units;
  public $upperPrice;

  /**
   * @param string
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  /**
   * @return string
   */
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setLowerPrice($lowerPrice)
  {
    $this->lowerPrice = $lowerPrice;
  }
  public function getLowerPrice()
  {
    return $this->lowerPrice;
  }
  /**
   * @param string
   */
  public function setUnits($units)
  {
    $this->units = $units;
  }
  /**
   * @return string
   */
  public function getUnits()
  {
    return $this->units;
  }
  public function setUpperPrice($upperPrice)
  {
    $this->upperPrice = $upperPrice;
  }
  public function getUpperPrice()
  {
    return $this->upperPrice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePriceRangeProto::class, 'Google_Service_Contentwarehouse_GeostorePriceRangeProto');
