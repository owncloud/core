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

class Value extends \Google\Model
{
  /**
   * @var string
   */
  public $carrierRateName;
  protected $flatRateType = Price::class;
  protected $flatRateDataType = '';
  /**
   * @var bool
   */
  public $noShipping;
  /**
   * @var string
   */
  public $pricePercentage;
  /**
   * @var string
   */
  public $subtableName;

  /**
   * @param string
   */
  public function setCarrierRateName($carrierRateName)
  {
    $this->carrierRateName = $carrierRateName;
  }
  /**
   * @return string
   */
  public function getCarrierRateName()
  {
    return $this->carrierRateName;
  }
  /**
   * @param Price
   */
  public function setFlatRate(Price $flatRate)
  {
    $this->flatRate = $flatRate;
  }
  /**
   * @return Price
   */
  public function getFlatRate()
  {
    return $this->flatRate;
  }
  /**
   * @param bool
   */
  public function setNoShipping($noShipping)
  {
    $this->noShipping = $noShipping;
  }
  /**
   * @return bool
   */
  public function getNoShipping()
  {
    return $this->noShipping;
  }
  /**
   * @param string
   */
  public function setPricePercentage($pricePercentage)
  {
    $this->pricePercentage = $pricePercentage;
  }
  /**
   * @return string
   */
  public function getPricePercentage()
  {
    return $this->pricePercentage;
  }
  /**
   * @param string
   */
  public function setSubtableName($subtableName)
  {
    $this->subtableName = $subtableName;
  }
  /**
   * @return string
   */
  public function getSubtableName()
  {
    return $this->subtableName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Value::class, 'Google_Service_ShoppingContent_Value');
