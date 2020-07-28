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

class Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatus extends Google_Collection
{
  protected $collection_key = 'deployedRoutes';
  protected $deployedRevisionsType = 'Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision';
  protected $deployedRevisionsDataType = 'array';
  protected $deployedRoutesType = 'Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute';
  protected $deployedRoutesDataType = 'array';
  public $instance;

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision
   */
  public function setDeployedRevisions($deployedRevisions)
  {
    $this->deployedRevisions = $deployedRevisions;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision
   */
  public function getDeployedRevisions()
  {
    return $this->deployedRevisions;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute
   */
  public function setDeployedRoutes($deployedRoutes)
  {
    $this->deployedRoutes = $deployedRoutes;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute
   */
  public function getDeployedRoutes()
  {
    return $this->deployedRoutes;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
}
