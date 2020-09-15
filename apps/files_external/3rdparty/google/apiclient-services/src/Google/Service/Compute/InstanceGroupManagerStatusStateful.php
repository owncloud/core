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

class Google_Service_Compute_InstanceGroupManagerStatusStateful extends Google_Model
{
  public $hasStatefulConfig;
  protected $perInstanceConfigsType = 'Google_Service_Compute_InstanceGroupManagerStatusStatefulPerInstanceConfigs';
  protected $perInstanceConfigsDataType = '';

  public function setHasStatefulConfig($hasStatefulConfig)
  {
    $this->hasStatefulConfig = $hasStatefulConfig;
  }
  public function getHasStatefulConfig()
  {
    return $this->hasStatefulConfig;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagerStatusStatefulPerInstanceConfigs
   */
  public function setPerInstanceConfigs(Google_Service_Compute_InstanceGroupManagerStatusStatefulPerInstanceConfigs $perInstanceConfigs)
  {
    $this->perInstanceConfigs = $perInstanceConfigs;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerStatusStatefulPerInstanceConfigs
   */
  public function getPerInstanceConfigs()
  {
    return $this->perInstanceConfigs;
  }
}
