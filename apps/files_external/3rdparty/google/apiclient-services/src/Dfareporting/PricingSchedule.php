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

class PricingSchedule extends \Google\Collection
{
  protected $collection_key = 'pricingPeriods';
  /**
   * @var string
   */
  public $capCostOption;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var bool
   */
  public $flighted;
  /**
   * @var string
   */
  public $floodlightActivityId;
  protected $pricingPeriodsType = PricingSchedulePricingPeriod::class;
  protected $pricingPeriodsDataType = 'array';
  /**
   * @var string
   */
  public $pricingType;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var string
   */
  public $testingStartDate;

  /**
   * @param string
   */
  public function setCapCostOption($capCostOption)
  {
    $this->capCostOption = $capCostOption;
  }
  /**
   * @return string
   */
  public function getCapCostOption()
  {
    return $this->capCostOption;
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
   * @param bool
   */
  public function setFlighted($flighted)
  {
    $this->flighted = $flighted;
  }
  /**
   * @return bool
   */
  public function getFlighted()
  {
    return $this->flighted;
  }
  /**
   * @param string
   */
  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  /**
   * @return string
   */
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
  }
  /**
   * @param PricingSchedulePricingPeriod[]
   */
  public function setPricingPeriods($pricingPeriods)
  {
    $this->pricingPeriods = $pricingPeriods;
  }
  /**
   * @return PricingSchedulePricingPeriod[]
   */
  public function getPricingPeriods()
  {
    return $this->pricingPeriods;
  }
  /**
   * @param string
   */
  public function setPricingType($pricingType)
  {
    $this->pricingType = $pricingType;
  }
  /**
   * @return string
   */
  public function getPricingType()
  {
    return $this->pricingType;
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
   * @param string
   */
  public function setTestingStartDate($testingStartDate)
  {
    $this->testingStartDate = $testingStartDate;
  }
  /**
   * @return string
   */
  public function getTestingStartDate()
  {
    return $this->testingStartDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PricingSchedule::class, 'Google_Service_Dfareporting_PricingSchedule');
