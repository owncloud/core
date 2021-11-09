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

namespace Google\Service\Dataproc;

class SparkStandaloneAutoscalingConfig extends \Google\Model
{
  public $gracefulDecommissionTimeout;
  public $scaleDownFactor;
  public $scaleDownMinWorkerFraction;
  public $scaleUpFactor;
  public $scaleUpMinWorkerFraction;

  public function setGracefulDecommissionTimeout($gracefulDecommissionTimeout)
  {
    $this->gracefulDecommissionTimeout = $gracefulDecommissionTimeout;
  }
  public function getGracefulDecommissionTimeout()
  {
    return $this->gracefulDecommissionTimeout;
  }
  public function setScaleDownFactor($scaleDownFactor)
  {
    $this->scaleDownFactor = $scaleDownFactor;
  }
  public function getScaleDownFactor()
  {
    return $this->scaleDownFactor;
  }
  public function setScaleDownMinWorkerFraction($scaleDownMinWorkerFraction)
  {
    $this->scaleDownMinWorkerFraction = $scaleDownMinWorkerFraction;
  }
  public function getScaleDownMinWorkerFraction()
  {
    return $this->scaleDownMinWorkerFraction;
  }
  public function setScaleUpFactor($scaleUpFactor)
  {
    $this->scaleUpFactor = $scaleUpFactor;
  }
  public function getScaleUpFactor()
  {
    return $this->scaleUpFactor;
  }
  public function setScaleUpMinWorkerFraction($scaleUpMinWorkerFraction)
  {
    $this->scaleUpMinWorkerFraction = $scaleUpMinWorkerFraction;
  }
  public function getScaleUpMinWorkerFraction()
  {
    return $this->scaleUpMinWorkerFraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SparkStandaloneAutoscalingConfig::class, 'Google_Service_Dataproc_SparkStandaloneAutoscalingConfig');
