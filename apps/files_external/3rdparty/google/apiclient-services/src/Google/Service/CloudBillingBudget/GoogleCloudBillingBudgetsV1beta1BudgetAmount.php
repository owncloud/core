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

class Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1BudgetAmount extends Google_Model
{
  protected $lastPeriodAmountType = 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1LastPeriodAmount';
  protected $lastPeriodAmountDataType = '';
  protected $specifiedAmountType = 'Google_Service_CloudBillingBudget_GoogleTypeMoney';
  protected $specifiedAmountDataType = '';

  /**
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1LastPeriodAmount
   */
  public function setLastPeriodAmount(Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1LastPeriodAmount $lastPeriodAmount)
  {
    $this->lastPeriodAmount = $lastPeriodAmount;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1beta1LastPeriodAmount
   */
  public function getLastPeriodAmount()
  {
    return $this->lastPeriodAmount;
  }
  /**
   * @param Google_Service_CloudBillingBudget_GoogleTypeMoney
   */
  public function setSpecifiedAmount(Google_Service_CloudBillingBudget_GoogleTypeMoney $specifiedAmount)
  {
    $this->specifiedAmount = $specifiedAmount;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleTypeMoney
   */
  public function getSpecifiedAmount()
  {
    return $this->specifiedAmount;
  }
}
