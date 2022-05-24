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

namespace Google\Service\CloudAsset;

class GoogleCloudAssetV1AccessControlList extends \Google\Collection
{
  protected $collection_key = 'resources';
  protected $accessesType = GoogleCloudAssetV1Access::class;
  protected $accessesDataType = 'array';
  protected $conditionEvaluationType = ConditionEvaluation::class;
  protected $conditionEvaluationDataType = '';
  protected $resourceEdgesType = GoogleCloudAssetV1Edge::class;
  protected $resourceEdgesDataType = 'array';
  protected $resourcesType = GoogleCloudAssetV1Resource::class;
  protected $resourcesDataType = 'array';

  /**
   * @param GoogleCloudAssetV1Access[]
   */
  public function setAccesses($accesses)
  {
    $this->accesses = $accesses;
  }
  /**
   * @return GoogleCloudAssetV1Access[]
   */
  public function getAccesses()
  {
    return $this->accesses;
  }
  /**
   * @param ConditionEvaluation
   */
  public function setConditionEvaluation(ConditionEvaluation $conditionEvaluation)
  {
    $this->conditionEvaluation = $conditionEvaluation;
  }
  /**
   * @return ConditionEvaluation
   */
  public function getConditionEvaluation()
  {
    return $this->conditionEvaluation;
  }
  /**
   * @param GoogleCloudAssetV1Edge[]
   */
  public function setResourceEdges($resourceEdges)
  {
    $this->resourceEdges = $resourceEdges;
  }
  /**
   * @return GoogleCloudAssetV1Edge[]
   */
  public function getResourceEdges()
  {
    return $this->resourceEdges;
  }
  /**
   * @param GoogleCloudAssetV1Resource[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudAssetV1Resource[]
   */
  public function getResources()
  {
    return $this->resources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssetV1AccessControlList::class, 'Google_Service_CloudAsset_GoogleCloudAssetV1AccessControlList');
