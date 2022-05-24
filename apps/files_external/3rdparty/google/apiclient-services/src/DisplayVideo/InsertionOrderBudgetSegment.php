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

namespace Google\Service\DisplayVideo;

class InsertionOrderBudgetSegment extends \Google\Model
{
  /**
   * @var string
   */
  public $budgetAmountMicros;
  /**
   * @var string
   */
  public $campaignBudgetId;
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  /**
   * @var string
   */
  public $description;

  /**
   * @param string
   */
  public function setBudgetAmountMicros($budgetAmountMicros)
  {
    $this->budgetAmountMicros = $budgetAmountMicros;
  }
  /**
   * @return string
   */
  public function getBudgetAmountMicros()
  {
    return $this->budgetAmountMicros;
  }
  /**
   * @param string
   */
  public function setCampaignBudgetId($campaignBudgetId)
  {
    $this->campaignBudgetId = $campaignBudgetId;
  }
  /**
   * @return string
   */
  public function getCampaignBudgetId()
  {
    return $this->campaignBudgetId;
  }
  /**
   * @param DateRange
   */
  public function setDateRange(DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InsertionOrderBudgetSegment::class, 'Google_Service_DisplayVideo_InsertionOrderBudgetSegment');
