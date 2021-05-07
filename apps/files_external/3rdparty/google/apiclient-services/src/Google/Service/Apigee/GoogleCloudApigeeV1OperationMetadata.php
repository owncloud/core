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

class Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadata extends Google_Model
{
  public $operationType;
  protected $progressType = 'Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadataProgress';
  protected $progressDataType = '';
  public $state;
  public $targetResourceName;

  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadataProgress
   */
  public function setProgress(Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadataProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadataProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTargetResourceName($targetResourceName)
  {
    $this->targetResourceName = $targetResourceName;
  }
  public function getTargetResourceName()
  {
    return $this->targetResourceName;
  }
}
