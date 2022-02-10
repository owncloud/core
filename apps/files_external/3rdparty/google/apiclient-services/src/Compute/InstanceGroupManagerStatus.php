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

class InstanceGroupManagerStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $autoscaler;
  /**
   * @var bool
   */
  public $isStable;
  protected $statefulType = InstanceGroupManagerStatusStateful::class;
  protected $statefulDataType = '';
  protected $versionTargetType = InstanceGroupManagerStatusVersionTarget::class;
  protected $versionTargetDataType = '';

  /**
   * @param string
   */
  public function setAutoscaler($autoscaler)
  {
    $this->autoscaler = $autoscaler;
  }
  /**
   * @return string
   */
  public function getAutoscaler()
  {
    return $this->autoscaler;
  }
  /**
   * @param bool
   */
  public function setIsStable($isStable)
  {
    $this->isStable = $isStable;
  }
  /**
   * @return bool
   */
  public function getIsStable()
  {
    return $this->isStable;
  }
  /**
   * @param InstanceGroupManagerStatusStateful
   */
  public function setStateful(InstanceGroupManagerStatusStateful $stateful)
  {
    $this->stateful = $stateful;
  }
  /**
   * @return InstanceGroupManagerStatusStateful
   */
  public function getStateful()
  {
    return $this->stateful;
  }
  /**
   * @param InstanceGroupManagerStatusVersionTarget
   */
  public function setVersionTarget(InstanceGroupManagerStatusVersionTarget $versionTarget)
  {
    $this->versionTarget = $versionTarget;
  }
  /**
   * @return InstanceGroupManagerStatusVersionTarget
   */
  public function getVersionTarget()
  {
    return $this->versionTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManagerStatus::class, 'Google_Service_Compute_InstanceGroupManagerStatus');
