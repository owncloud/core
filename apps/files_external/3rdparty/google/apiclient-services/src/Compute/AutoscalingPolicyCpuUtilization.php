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

namespace Google\Service\Compute;

class AutoscalingPolicyCpuUtilization extends \Google\Model
{
  /**
   * @var string
   */
  public $predictiveMethod;
  public $utilizationTarget;

  /**
   * @param string
   */
  public function setPredictiveMethod($predictiveMethod)
  {
    $this->predictiveMethod = $predictiveMethod;
  }
  /**
   * @return string
   */
  public function getPredictiveMethod()
  {
    return $this->predictiveMethod;
  }
  public function setUtilizationTarget($utilizationTarget)
  {
    $this->utilizationTarget = $utilizationTarget;
  }
  public function getUtilizationTarget()
  {
    return $this->utilizationTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingPolicyCpuUtilization::class, 'Google_Service_Compute_AutoscalingPolicyCpuUtilization');
