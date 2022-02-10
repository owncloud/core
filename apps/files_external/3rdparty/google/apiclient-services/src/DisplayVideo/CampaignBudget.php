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

class CampaignBudget extends \Google\Model
{
  /**
   * @var string
   */
  public $budgetAmountMicros;
  /**
   * @var string
   */
  public $budgetId;
  /**
   * @var string
   */
  public $budgetUnit;
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $externalBudgetId;
  /**
   * @var string
   */
  public $externalBudgetSource;
  /**
   * @var string
   */
  public $invoiceGroupingId;
  protected $prismaConfigType = PrismaConfig::class;
  protected $prismaConfigDataType = '';

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
  public function setBudgetId($budgetId)
  {
    $this->budgetId = $budgetId;
  }
  /**
   * @return string
   */
  public function getBudgetId()
  {
    return $this->budgetId;
  }
  /**
   * @param string
   */
  public function setBudgetUnit($budgetUnit)
  {
    $this->budgetUnit = $budgetUnit;
  }
  /**
   * @return string
   */
  public function getBudgetUnit()
  {
    return $this->budgetUnit;
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setExternalBudgetId($externalBudgetId)
  {
    $this->externalBudgetId = $externalBudgetId;
  }
  /**
   * @return string
   */
  public function getExternalBudgetId()
  {
    return $this->externalBudgetId;
  }
  /**
   * @param string
   */
  public function setExternalBudgetSource($externalBudgetSource)
  {
    $this->externalBudgetSource = $externalBudgetSource;
  }
  /**
   * @return string
   */
  public function getExternalBudgetSource()
  {
    return $this->externalBudgetSource;
  }
  /**
   * @param string
   */
  public function setInvoiceGroupingId($invoiceGroupingId)
  {
    $this->invoiceGroupingId = $invoiceGroupingId;
  }
  /**
   * @return string
   */
  public function getInvoiceGroupingId()
  {
    return $this->invoiceGroupingId;
  }
  /**
   * @param PrismaConfig
   */
  public function setPrismaConfig(PrismaConfig $prismaConfig)
  {
    $this->prismaConfig = $prismaConfig;
  }
  /**
   * @return PrismaConfig
   */
  public function getPrismaConfig()
  {
    return $this->prismaConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CampaignBudget::class, 'Google_Service_DisplayVideo_CampaignBudget');
