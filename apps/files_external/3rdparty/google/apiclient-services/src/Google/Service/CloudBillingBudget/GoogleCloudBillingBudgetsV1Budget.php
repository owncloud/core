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

class Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Budget extends Google_Collection
{
  protected $collection_key = 'thresholdRules';
  protected $amountType = 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1BudgetAmount';
  protected $amountDataType = '';
  protected $budgetFilterType = 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Filter';
  protected $budgetFilterDataType = '';
  public $displayName;
  public $etag;
  public $name;
  protected $notificationsRuleType = 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1NotificationsRule';
  protected $notificationsRuleDataType = '';
  protected $thresholdRulesType = 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1ThresholdRule';
  protected $thresholdRulesDataType = 'array';

  /**
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1BudgetAmount
   */
  public function setAmount(Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1BudgetAmount $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1BudgetAmount
   */
  public function getAmount()
  {
    return $this->amount;
  }
  /**
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Filter
   */
  public function setBudgetFilter(Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Filter $budgetFilter)
  {
    $this->budgetFilter = $budgetFilter;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Filter
   */
  public function getBudgetFilter()
  {
    return $this->budgetFilter;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1NotificationsRule
   */
  public function setNotificationsRule(Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1NotificationsRule $notificationsRule)
  {
    $this->notificationsRule = $notificationsRule;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1NotificationsRule
   */
  public function getNotificationsRule()
  {
    return $this->notificationsRule;
  }
  /**
   * @param Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1ThresholdRule
   */
  public function setThresholdRules($thresholdRules)
  {
    $this->thresholdRules = $thresholdRules;
  }
  /**
   * @return Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1ThresholdRule
   */
  public function getThresholdRules()
  {
    return $this->thresholdRules;
  }
}
