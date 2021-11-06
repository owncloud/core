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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Deployment extends \Google\Collection
{
  protected $collection_key = 'routeConflicts';
  public $apiProxy;
  public $deployStartTime;
  public $environment;
  protected $errorsType = GoogleRpcStatus::class;
  protected $errorsDataType = 'array';
  protected $instancesType = GoogleCloudApigeeV1InstanceDeploymentStatus::class;
  protected $instancesDataType = 'array';
  protected $podsType = GoogleCloudApigeeV1PodStatus::class;
  protected $podsDataType = 'array';
  public $revision;
  protected $routeConflictsType = GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict::class;
  protected $routeConflictsDataType = 'array';
  public $serviceAccount;
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
   * @param GoogleRpcStatus[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return GoogleRpcStatus[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param GoogleCloudApigeeV1InstanceDeploymentStatus[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return GoogleCloudApigeeV1InstanceDeploymentStatus[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param GoogleCloudApigeeV1PodStatus[]
   */
  public function setPods($pods)
  {
    $this->pods = $pods;
  }
  /**
   * @return GoogleCloudApigeeV1PodStatus[]
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
   * @param GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict[]
   */
  public function setRouteConflicts($routeConflicts)
  {
    $this->routeConflicts = $routeConflicts;
  }
  /**
   * @return GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict[]
   */
  public function getRouteConflicts()
  {
    return $this->routeConflicts;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Deployment::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Deployment');
