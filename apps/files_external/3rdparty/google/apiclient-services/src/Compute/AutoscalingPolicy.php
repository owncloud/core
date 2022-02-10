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

class AutoscalingPolicy extends \Google\Collection
{
  protected $collection_key = 'customMetricUtilizations';
  /**
   * @var int
   */
  public $coolDownPeriodSec;
  protected $cpuUtilizationType = AutoscalingPolicyCpuUtilization::class;
  protected $cpuUtilizationDataType = '';
  protected $customMetricUtilizationsType = AutoscalingPolicyCustomMetricUtilization::class;
  protected $customMetricUtilizationsDataType = 'array';
  protected $loadBalancingUtilizationType = AutoscalingPolicyLoadBalancingUtilization::class;
  protected $loadBalancingUtilizationDataType = '';
  /**
   * @var int
   */
  public $maxNumReplicas;
  /**
   * @var int
   */
  public $minNumReplicas;
  /**
   * @var string
   */
  public $mode;
  protected $scaleInControlType = AutoscalingPolicyScaleInControl::class;
  protected $scaleInControlDataType = '';
  protected $scalingSchedulesType = AutoscalingPolicyScalingSchedule::class;
  protected $scalingSchedulesDataType = 'map';

  /**
   * @param int
   */
  public function setCoolDownPeriodSec($coolDownPeriodSec)
  {
    $this->coolDownPeriodSec = $coolDownPeriodSec;
  }
  /**
   * @return int
   */
  public function getCoolDownPeriodSec()
  {
    return $this->coolDownPeriodSec;
  }
  /**
   * @param AutoscalingPolicyCpuUtilization
   */
  public function setCpuUtilization(AutoscalingPolicyCpuUtilization $cpuUtilization)
  {
    $this->cpuUtilization = $cpuUtilization;
  }
  /**
   * @return AutoscalingPolicyCpuUtilization
   */
  public function getCpuUtilization()
  {
    return $this->cpuUtilization;
  }
  /**
   * @param AutoscalingPolicyCustomMetricUtilization[]
   */
  public function setCustomMetricUtilizations($customMetricUtilizations)
  {
    $this->customMetricUtilizations = $customMetricUtilizations;
  }
  /**
   * @return AutoscalingPolicyCustomMetricUtilization[]
   */
  public function getCustomMetricUtilizations()
  {
    return $this->customMetricUtilizations;
  }
  /**
   * @param AutoscalingPolicyLoadBalancingUtilization
   */
  public function setLoadBalancingUtilization(AutoscalingPolicyLoadBalancingUtilization $loadBalancingUtilization)
  {
    $this->loadBalancingUtilization = $loadBalancingUtilization;
  }
  /**
   * @return AutoscalingPolicyLoadBalancingUtilization
   */
  public function getLoadBalancingUtilization()
  {
    return $this->loadBalancingUtilization;
  }
  /**
   * @param int
   */
  public function setMaxNumReplicas($maxNumReplicas)
  {
    $this->maxNumReplicas = $maxNumReplicas;
  }
  /**
   * @return int
   */
  public function getMaxNumReplicas()
  {
    return $this->maxNumReplicas;
  }
  /**
   * @param int
   */
  public function setMinNumReplicas($minNumReplicas)
  {
    $this->minNumReplicas = $minNumReplicas;
  }
  /**
   * @return int
   */
  public function getMinNumReplicas()
  {
    return $this->minNumReplicas;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param AutoscalingPolicyScaleInControl
   */
  public function setScaleInControl(AutoscalingPolicyScaleInControl $scaleInControl)
  {
    $this->scaleInControl = $scaleInControl;
  }
  /**
   * @return AutoscalingPolicyScaleInControl
   */
  public function getScaleInControl()
  {
    return $this->scaleInControl;
  }
  /**
   * @param AutoscalingPolicyScalingSchedule[]
   */
  public function setScalingSchedules($scalingSchedules)
  {
    $this->scalingSchedules = $scalingSchedules;
  }
  /**
   * @return AutoscalingPolicyScalingSchedule[]
   */
  public function getScalingSchedules()
  {
    return $this->scalingSchedules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingPolicy::class, 'Google_Service_Compute_AutoscalingPolicy');
