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

namespace Google\Service\PolicyAnalyzer;

class GoogleCloudPolicyanalyzerV1Activity extends \Google\Model
{
  public $activity;
  public $activityType;
  public $fullResourceName;
  protected $observationPeriodType = GoogleCloudPolicyanalyzerV1ObservationPeriod::class;
  protected $observationPeriodDataType = '';

  public function setActivity($activity)
  {
    $this->activity = $activity;
  }
  public function getActivity()
  {
    return $this->activity;
  }
  public function setActivityType($activityType)
  {
    $this->activityType = $activityType;
  }
  public function getActivityType()
  {
    return $this->activityType;
  }
  public function setFullResourceName($fullResourceName)
  {
    $this->fullResourceName = $fullResourceName;
  }
  public function getFullResourceName()
  {
    return $this->fullResourceName;
  }
  /**
   * @param GoogleCloudPolicyanalyzerV1ObservationPeriod
   */
  public function setObservationPeriod(GoogleCloudPolicyanalyzerV1ObservationPeriod $observationPeriod)
  {
    $this->observationPeriod = $observationPeriod;
  }
  /**
   * @return GoogleCloudPolicyanalyzerV1ObservationPeriod
   */
  public function getObservationPeriod()
  {
    return $this->observationPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicyanalyzerV1Activity::class, 'Google_Service_PolicyAnalyzer_GoogleCloudPolicyanalyzerV1Activity');
