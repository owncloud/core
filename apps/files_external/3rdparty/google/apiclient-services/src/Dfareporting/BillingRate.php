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

namespace Google\Service\Dfareporting;

class BillingRate extends \Google\Collection
{
  protected $collection_key = 'tieredRates';
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $rateInMicros;
  /**
   * @var string
   */
  public $startDate;
  protected $tieredRatesType = BillingRateTieredRate::class;
  protected $tieredRatesDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $unitOfMeasure;

  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRateInMicros($rateInMicros)
  {
    $this->rateInMicros = $rateInMicros;
  }
  /**
   * @return string
   */
  public function getRateInMicros()
  {
    return $this->rateInMicros;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param BillingRateTieredRate[]
   */
  public function setTieredRates($tieredRates)
  {
    $this->tieredRates = $tieredRates;
  }
  /**
   * @return BillingRateTieredRate[]
   */
  public function getTieredRates()
  {
    return $this->tieredRates;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUnitOfMeasure($unitOfMeasure)
  {
    $this->unitOfMeasure = $unitOfMeasure;
  }
  /**
   * @return string
   */
  public function getUnitOfMeasure()
  {
    return $this->unitOfMeasure;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingRate::class, 'Google_Service_Dfareporting_BillingRate');
