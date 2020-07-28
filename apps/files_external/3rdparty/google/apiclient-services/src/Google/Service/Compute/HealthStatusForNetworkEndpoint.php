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

class Google_Service_Compute_HealthStatusForNetworkEndpoint extends Google_Model
{
  protected $backendServiceType = 'Google_Service_Compute_BackendServiceReference';
  protected $backendServiceDataType = '';
  protected $forwardingRuleType = 'Google_Service_Compute_ForwardingRuleReference';
  protected $forwardingRuleDataType = '';
  protected $healthCheckType = 'Google_Service_Compute_HealthCheckReference';
  protected $healthCheckDataType = '';
  protected $healthCheckServiceType = 'Google_Service_Compute_HealthCheckServiceReference';
  protected $healthCheckServiceDataType = '';
  public $healthState;

  /**
   * @param Google_Service_Compute_BackendServiceReference
   */
  public function setBackendService(Google_Service_Compute_BackendServiceReference $backendService)
  {
    $this->backendService = $backendService;
  }
  /**
   * @return Google_Service_Compute_BackendServiceReference
   */
  public function getBackendService()
  {
    return $this->backendService;
  }
  /**
   * @param Google_Service_Compute_ForwardingRuleReference
   */
  public function setForwardingRule(Google_Service_Compute_ForwardingRuleReference $forwardingRule)
  {
    $this->forwardingRule = $forwardingRule;
  }
  /**
   * @return Google_Service_Compute_ForwardingRuleReference
   */
  public function getForwardingRule()
  {
    return $this->forwardingRule;
  }
  /**
   * @param Google_Service_Compute_HealthCheckReference
   */
  public function setHealthCheck(Google_Service_Compute_HealthCheckReference $healthCheck)
  {
    $this->healthCheck = $healthCheck;
  }
  /**
   * @return Google_Service_Compute_HealthCheckReference
   */
  public function getHealthCheck()
  {
    return $this->healthCheck;
  }
  /**
   * @param Google_Service_Compute_HealthCheckServiceReference
   */
  public function setHealthCheckService(Google_Service_Compute_HealthCheckServiceReference $healthCheckService)
  {
    $this->healthCheckService = $healthCheckService;
  }
  /**
   * @return Google_Service_Compute_HealthCheckServiceReference
   */
  public function getHealthCheckService()
  {
    return $this->healthCheckService;
  }
  public function setHealthState($healthState)
  {
    $this->healthState = $healthState;
  }
  public function getHealthState()
  {
    return $this->healthState;
  }
}
