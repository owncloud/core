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

namespace Google\Service\CloudBillingBudget;

class GoogleCloudBillingBudgetsV1BudgetAmount extends \Google\Model
{
  protected $lastPeriodAmountType = GoogleCloudBillingBudgetsV1LastPeriodAmount::class;
  protected $lastPeriodAmountDataType = '';
  protected $specifiedAmountType = GoogleTypeMoney::class;
  protected $specifiedAmountDataType = '';

  /**
   * @param GoogleCloudBillingBudgetsV1LastPeriodAmount
   */
  public function setLastPeriodAmount(GoogleCloudBillingBudgetsV1LastPeriodAmount $lastPeriodAmount)
  {
    $this->lastPeriodAmount = $lastPeriodAmount;
  }
  /**
   * @return GoogleCloudBillingBudgetsV1LastPeriodAmount
   */
  public function getLastPeriodAmount()
  {
    return $this->lastPeriodAmount;
  }
  /**
   * @param GoogleTypeMoney
   */
  public function setSpecifiedAmount(GoogleTypeMoney $specifiedAmount)
  {
    $this->specifiedAmount = $specifiedAmount;
  }
  /**
   * @return GoogleTypeMoney
   */
  public function getSpecifiedAmount()
  {
    return $this->specifiedAmount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBillingBudgetsV1BudgetAmount::class, 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1BudgetAmount');
