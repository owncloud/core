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

namespace Google\Service\Appengine;

class StandardSchedulerSettings extends \Google\Model
{
  /**
   * @var int
   */
  public $maxInstances;
  /**
   * @var int
   */
  public $minInstances;
  public $targetCpuUtilization;
  public $targetThroughputUtilization;

  /**
   * @param int
   */
  public function setMaxInstances($maxInstances)
  {
    $this->maxInstances = $maxInstances;
  }
  /**
   * @return int
   */
  public function getMaxInstances()
  {
    return $this->maxInstances;
  }
  /**
   * @param int
   */
  public function setMinInstances($minInstances)
  {
    $this->minInstances = $minInstances;
  }
  /**
   * @return int
   */
  public function getMinInstances()
  {
    return $this->minInstances;
  }
  public function setTargetCpuUtilization($targetCpuUtilization)
  {
    $this->targetCpuUtilization = $targetCpuUtilization;
  }
  public function getTargetCpuUtilization()
  {
    return $this->targetCpuUtilization;
  }
  public function setTargetThroughputUtilization($targetThroughputUtilization)
  {
    $this->targetThroughputUtilization = $targetThroughputUtilization;
  }
  public function getTargetThroughputUtilization()
  {
    return $this->targetThroughputUtilization;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StandardSchedulerSettings::class, 'Google_Service_Appengine_StandardSchedulerSettings');
