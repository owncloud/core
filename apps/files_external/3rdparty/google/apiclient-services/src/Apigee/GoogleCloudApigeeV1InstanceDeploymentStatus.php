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

class GoogleCloudApigeeV1InstanceDeploymentStatus extends \Google\Collection
{
  protected $collection_key = 'deployedRoutes';
  protected $deployedRevisionsType = GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision::class;
  protected $deployedRevisionsDataType = 'array';
  protected $deployedRoutesType = GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute::class;
  protected $deployedRoutesDataType = 'array';
  /**
   * @var string
   */
  public $instance;

  /**
   * @param GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision[]
   */
  public function setDeployedRevisions($deployedRevisions)
  {
    $this->deployedRevisions = $deployedRevisions;
  }
  /**
   * @return GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRevision[]
   */
  public function getDeployedRevisions()
  {
    return $this->deployedRevisions;
  }
  /**
   * @param GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute[]
   */
  public function setDeployedRoutes($deployedRoutes)
  {
    $this->deployedRoutes = $deployedRoutes;
  }
  /**
   * @return GoogleCloudApigeeV1InstanceDeploymentStatusDeployedRoute[]
   */
  public function getDeployedRoutes()
  {
    return $this->deployedRoutes;
  }
  /**
   * @param string
   */
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return string
   */
  public function getInstance()
  {
    return $this->instance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1InstanceDeploymentStatus::class, 'Google_Service_Apigee_GoogleCloudApigeeV1InstanceDeploymentStatus');
