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

namespace Google\Service\Cloudbilling;

class PricingExpression extends \Google\Collection
{
  protected $collection_key = 'tieredRates';
  /**
   * @var string
   */
  public $baseUnit;
  public $baseUnitConversionFactor;
  /**
   * @var string
   */
  public $baseUnitDescription;
  public $displayQuantity;
  protected $tieredRatesType = TierRate::class;
  protected $tieredRatesDataType = 'array';
  /**
   * @var string
   */
  public $usageUnit;
  /**
   * @var string
   */
  public $usageUnitDescription;

  /**
   * @param string
   */
  public function setBaseUnit($baseUnit)
  {
    $this->baseUnit = $baseUnit;
  }
  /**
   * @return string
   */
  public function getBaseUnit()
  {
    return $this->baseUnit;
  }
  public function setBaseUnitConversionFactor($baseUnitConversionFactor)
  {
    $this->baseUnitConversionFactor = $baseUnitConversionFactor;
  }
  public function getBaseUnitConversionFactor()
  {
    return $this->baseUnitConversionFactor;
  }
  /**
   * @param string
   */
  public function setBaseUnitDescription($baseUnitDescription)
  {
    $this->baseUnitDescription = $baseUnitDescription;
  }
  /**
   * @return string
   */
  public function getBaseUnitDescription()
  {
    return $this->baseUnitDescription;
  }
  public function setDisplayQuantity($displayQuantity)
  {
    $this->displayQuantity = $displayQuantity;
  }
  public function getDisplayQuantity()
  {
    return $this->displayQuantity;
  }
  /**
   * @param TierRate[]
   */
  public function setTieredRates($tieredRates)
  {
    $this->tieredRates = $tieredRates;
  }
  /**
   * @return TierRate[]
   */
  public function getTieredRates()
  {
    return $this->tieredRates;
  }
  /**
   * @param string
   */
  public function setUsageUnit($usageUnit)
  {
    $this->usageUnit = $usageUnit;
  }
  /**
   * @return string
   */
  public function getUsageUnit()
  {
    return $this->usageUnit;
  }
  /**
   * @param string
   */
  public function setUsageUnitDescription($usageUnitDescription)
  {
    $this->usageUnitDescription = $usageUnitDescription;
  }
  /**
   * @return string
   */
  public function getUsageUnitDescription()
  {
    return $this->usageUnitDescription;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PricingExpression::class, 'Google_Service_Cloudbilling_PricingExpression');
