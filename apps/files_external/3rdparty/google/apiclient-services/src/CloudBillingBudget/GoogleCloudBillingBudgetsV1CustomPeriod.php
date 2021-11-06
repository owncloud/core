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

class GoogleCloudBillingBudgetsV1CustomPeriod extends \Google\Model
{
  protected $endDateType = GoogleTypeDate::class;
  protected $endDateDataType = '';
  protected $startDateType = GoogleTypeDate::class;
  protected $startDateDataType = '';

  /**
   * @param GoogleTypeDate
   */
  public function setEndDate(GoogleTypeDate $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setStartDate(GoogleTypeDate $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBillingBudgetsV1CustomPeriod::class, 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1CustomPeriod');
