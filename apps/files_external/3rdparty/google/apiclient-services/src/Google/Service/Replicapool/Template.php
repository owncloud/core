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

class Google_Service_Replicapool_Template extends Google_Collection
{
  protected $collection_key = 'healthChecks';
  protected $actionType = 'Google_Service_Replicapool_Action';
  protected $actionDataType = '';
  protected $healthChecksType = 'Google_Service_Replicapool_HealthCheck';
  protected $healthChecksDataType = 'array';
  public $version;
  protected $vmParamsType = 'Google_Service_Replicapool_VmParams';
  protected $vmParamsDataType = '';

  /**
   * @param Google_Service_Replicapool_Action
   */
  public function setAction(Google_Service_Replicapool_Action $action)
  {
    $this->action = $action;
  }
  /**
   * @return Google_Service_Replicapool_Action
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param Google_Service_Replicapool_HealthCheck
   */
  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }
  /**
   * @return Google_Service_Replicapool_HealthCheck
   */
  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param Google_Service_Replicapool_VmParams
   */
  public function setVmParams(Google_Service_Replicapool_VmParams $vmParams)
  {
    $this->vmParams = $vmParams;
  }
  /**
   * @return Google_Service_Replicapool_VmParams
   */
  public function getVmParams()
  {
    return $this->vmParams;
  }
}
