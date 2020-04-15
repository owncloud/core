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

class Google_Service_Compute_InstanceGroupManagerStatus extends Google_Model
{
  public $autoscaler;
  public $isStable;
  protected $versionTargetType = 'Google_Service_Compute_InstanceGroupManagerStatusVersionTarget';
  protected $versionTargetDataType = '';

  public function setAutoscaler($autoscaler)
  {
    $this->autoscaler = $autoscaler;
  }
  public function getAutoscaler()
  {
    return $this->autoscaler;
  }
  public function setIsStable($isStable)
  {
    $this->isStable = $isStable;
  }
  public function getIsStable()
  {
    return $this->isStable;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagerStatusVersionTarget
   */
  public function setVersionTarget(Google_Service_Compute_InstanceGroupManagerStatusVersionTarget $versionTarget)
  {
    $this->versionTarget = $versionTarget;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerStatusVersionTarget
   */
  public function getVersionTarget()
  {
    return $this->versionTarget;
  }
}
