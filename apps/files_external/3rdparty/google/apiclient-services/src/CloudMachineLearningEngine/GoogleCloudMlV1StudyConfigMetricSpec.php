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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1StudyConfigMetricSpec extends \Google\Model
{
  public $goal;
  public $metric;

  public function setGoal($goal)
  {
    $this->goal = $goal;
  }
  public function getGoal()
  {
    return $this->goal;
  }
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1StudyConfigMetricSpec::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigMetricSpec');
