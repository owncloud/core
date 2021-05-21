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

class Google_Service_CloudAsset_GoogleCloudAssetV1AccessControlList extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $accessesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1Access';
  protected $accessesDataType = 'array';
  protected $conditionEvaluationType = 'Google_Service_CloudAsset_ConditionEvaluation';
  protected $conditionEvaluationDataType = '';
  protected $resourceEdgesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1Edge';
  protected $resourceEdgesDataType = 'array';
  protected $resourcesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1Resource';
  protected $resourcesDataType = 'array';

  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1Access[]
   */
  public function setAccesses($accesses)
  {
    $this->accesses = $accesses;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1Access[]
   */
  public function getAccesses()
  {
    return $this->accesses;
  }
  /**
   * @param Google_Service_CloudAsset_ConditionEvaluation
   */
  public function setConditionEvaluation(Google_Service_CloudAsset_ConditionEvaluation $conditionEvaluation)
  {
    $this->conditionEvaluation = $conditionEvaluation;
  }
  /**
   * @return Google_Service_CloudAsset_ConditionEvaluation
   */
  public function getConditionEvaluation()
  {
    return $this->conditionEvaluation;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1Edge[]
   */
  public function setResourceEdges($resourceEdges)
  {
    $this->resourceEdges = $resourceEdges;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1Edge[]
   */
  public function getResourceEdges()
  {
    return $this->resourceEdges;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1Resource[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1Resource[]
   */
  public function getResources()
  {
    return $this->resources;
  }
}
