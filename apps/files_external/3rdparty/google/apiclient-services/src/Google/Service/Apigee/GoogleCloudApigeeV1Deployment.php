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

class Google_Service_Apigee_GoogleCloudApigeeV1Deployment extends Google_Collection
{
  protected $collection_key = 'routeConflicts';
  public $apiProxy;
  public $deployStartTime;
  public $environment;
  protected $errorsType = 'Google_Service_Apigee_GoogleRpcStatus';
  protected $errorsDataType = 'array';
  protected $instancesType = 'Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatus';
  protected $instancesDataType = 'array';
  protected $podsType = 'Google_Service_Apigee_GoogleCloudApigeeV1PodStatus';
  protected $podsDataType = 'array';
  public $revision;
  protected $routeConflictsType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict';
  protected $routeConflictsDataType = 'array';
  public $state;

  public function setApiProxy($apiProxy)
  {
    $this->apiProxy = $apiProxy;
  }
  public function getApiProxy()
  {
    return $this->apiProxy;
  }
  public function setDeployStartTime($deployStartTime)
  {
    $this->deployStartTime = $deployStartTime;
  }
  public function getDeployStartTime()
  {
    return $this->deployStartTime;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param Google_Service_Apigee_GoogleRpcStatus
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_Apigee_GoogleRpcStatus
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatus
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatus
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PodStatus
   */
  public function setPods($pods)
  {
    $this->pods = $pods;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PodStatus
   */
  public function getPods()
  {
    return $this->pods;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict
   */
  public function setRouteConflicts($routeConflicts)
  {
    $this->routeConflicts = $routeConflicts;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict
   */
  public function getRouteConflicts()
  {
    return $this->routeConflicts;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
