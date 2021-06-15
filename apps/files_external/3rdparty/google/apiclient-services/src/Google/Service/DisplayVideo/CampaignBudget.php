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

class Google_Service_DisplayVideo_CampaignBudget extends Google_Model
{
  public $budgetAmountMicros;
  public $budgetId;
  public $budgetUnit;
  protected $dateRangeType = 'Google_Service_DisplayVideo_DateRange';
  protected $dateRangeDataType = '';
  public $displayName;
  public $externalBudgetId;
  public $externalBudgetSource;
  public $invoiceGroupingId;
  protected $prismaConfigType = 'Google_Service_DisplayVideo_PrismaConfig';
  protected $prismaConfigDataType = '';

  public function setBudgetAmountMicros($budgetAmountMicros)
  {
    $this->budgetAmountMicros = $budgetAmountMicros;
  }
  public function getBudgetAmountMicros()
  {
    return $this->budgetAmountMicros;
  }
  public function setBudgetId($budgetId)
  {
    $this->budgetId = $budgetId;
  }
  public function getBudgetId()
  {
    return $this->budgetId;
  }
  public function setBudgetUnit($budgetUnit)
  {
    $this->budgetUnit = $budgetUnit;
  }
  public function getBudgetUnit()
  {
    return $this->budgetUnit;
  }
  /**
   * @param Google_Service_DisplayVideo_DateRange
   */
  public function setDateRange(Google_Service_DisplayVideo_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_DisplayVideo_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExternalBudgetId($externalBudgetId)
  {
    $this->externalBudgetId = $externalBudgetId;
  }
  public function getExternalBudgetId()
  {
    return $this->externalBudgetId;
  }
  public function setExternalBudgetSource($externalBudgetSource)
  {
    $this->externalBudgetSource = $externalBudgetSource;
  }
  public function getExternalBudgetSource()
  {
    return $this->externalBudgetSource;
  }
  public function setInvoiceGroupingId($invoiceGroupingId)
  {
    $this->invoiceGroupingId = $invoiceGroupingId;
  }
  public function getInvoiceGroupingId()
  {
    return $this->invoiceGroupingId;
  }
  /**
   * @param Google_Service_DisplayVideo_PrismaConfig
   */
  public function setPrismaConfig(Google_Service_DisplayVideo_PrismaConfig $prismaConfig)
  {
    $this->prismaConfig = $prismaConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_PrismaConfig
   */
  public function getPrismaConfig()
  {
    return $this->prismaConfig;
  }
}
