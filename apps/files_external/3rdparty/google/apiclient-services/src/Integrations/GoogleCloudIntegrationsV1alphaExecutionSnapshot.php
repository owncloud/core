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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaExecutionSnapshot extends \Google\Collection
{
  protected $collection_key = 'taskExecutionDetails';
  /**
   * @var string
   */
  public $checkpointTaskNumber;
  protected $executionSnapshotMetadataType = GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata::class;
  protected $executionSnapshotMetadataDataType = '';
  protected $paramsType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $paramsDataType = 'map';
  protected $taskExecutionDetailsType = GoogleCloudIntegrationsV1alphaTaskExecutionDetails::class;
  protected $taskExecutionDetailsDataType = 'array';

  /**
   * @param string
   */
  public function setCheckpointTaskNumber($checkpointTaskNumber)
  {
    $this->checkpointTaskNumber = $checkpointTaskNumber;
  }
  /**
   * @return string
   */
  public function getCheckpointTaskNumber()
  {
    return $this->checkpointTaskNumber;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata
   */
  public function setExecutionSnapshotMetadata(GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata $executionSnapshotMetadata)
  {
    $this->executionSnapshotMetadata = $executionSnapshotMetadata;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata
   */
  public function getExecutionSnapshotMetadata()
  {
    return $this->executionSnapshotMetadata;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaTaskExecutionDetails[]
   */
  public function setTaskExecutionDetails($taskExecutionDetails)
  {
    $this->taskExecutionDetails = $taskExecutionDetails;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaTaskExecutionDetails[]
   */
  public function getTaskExecutionDetails()
  {
    return $this->taskExecutionDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaExecutionSnapshot::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaExecutionSnapshot');
