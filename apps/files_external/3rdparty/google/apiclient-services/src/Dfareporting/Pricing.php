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

class Pricing extends \Google\Collection
{
  protected $collection_key = 'flights';
  /**
   * @var string
   */
  public $capCostType;
  /**
   * @var string
   */
  public $endDate;
  protected $flightsType = Flight::class;
  protected $flightsDataType = 'array';
  /**
   * @var string
   */
  public $groupType;
  /**
   * @var string
   */
  public $pricingType;
  /**
   * @var string
   */
  public $startDate;

  /**
   * @param string
   */
  public function setCapCostType($capCostType)
  {
    $this->capCostType = $capCostType;
  }
  /**
   * @return string
   */
  public function getCapCostType()
  {
    return $this->capCostType;
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
   * @param Flight[]
   */
  public function setFlights($flights)
  {
    $this->flights = $flights;
  }
  /**
   * @return Flight[]
   */
  public function getFlights()
  {
    return $this->flights;
  }
  /**
   * @param string
   */
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  /**
   * @return string
   */
  public function getGroupType()
  {
    return $this->groupType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pricing::class, 'Google_Service_Dfareporting_Pricing');
