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

class GoogleCloudBillingBudgetsV1Filter extends \Google\Collection
{
  protected $collection_key = 'subaccounts';
  /**
   * @var string
   */
  public $calendarPeriod;
  /**
   * @var string[]
   */
  public $creditTypes;
  /**
   * @var string
   */
  public $creditTypesTreatment;
  protected $customPeriodType = GoogleCloudBillingBudgetsV1CustomPeriod::class;
  protected $customPeriodDataType = '';
  /**
   * @var array[]
   */
  public $labels;
  /**
   * @var string[]
   */
  public $projects;
  /**
   * @var string[]
   */
  public $services;
  /**
   * @var string[]
   */
  public $subaccounts;

  /**
   * @param string
   */
  public function setCalendarPeriod($calendarPeriod)
  {
    $this->calendarPeriod = $calendarPeriod;
  }
  /**
   * @return string
   */
  public function getCalendarPeriod()
  {
    return $this->calendarPeriod;
  }
  /**
   * @param string[]
   */
  public function setCreditTypes($creditTypes)
  {
    $this->creditTypes = $creditTypes;
  }
  /**
   * @return string[]
   */
  public function getCreditTypes()
  {
    return $this->creditTypes;
  }
  /**
   * @param string
   */
  public function setCreditTypesTreatment($creditTypesTreatment)
  {
    $this->creditTypesTreatment = $creditTypesTreatment;
  }
  /**
   * @return string
   */
  public function getCreditTypesTreatment()
  {
    return $this->creditTypesTreatment;
  }
  /**
   * @param GoogleCloudBillingBudgetsV1CustomPeriod
   */
  public function setCustomPeriod(GoogleCloudBillingBudgetsV1CustomPeriod $customPeriod)
  {
    $this->customPeriod = $customPeriod;
  }
  /**
   * @return GoogleCloudBillingBudgetsV1CustomPeriod
   */
  public function getCustomPeriod()
  {
    return $this->customPeriod;
  }
  /**
   * @param array[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return array[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string[]
   */
  public function setProjects($projects)
  {
    $this->projects = $projects;
  }
  /**
   * @return string[]
   */
  public function getProjects()
  {
    return $this->projects;
  }
  /**
   * @param string[]
   */
  public function setServices($services)
  {
    $this->services = $services;
  }
  /**
   * @return string[]
   */
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param string[]
   */
  public function setSubaccounts($subaccounts)
  {
    $this->subaccounts = $subaccounts;
  }
  /**
   * @return string[]
   */
  public function getSubaccounts()
  {
    return $this->subaccounts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBillingBudgetsV1Filter::class, 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1Filter');
