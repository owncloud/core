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

class GoogleCloudApigeeV1OperationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $operationType;
  protected $progressType = GoogleCloudApigeeV1OperationMetadataProgress::class;
  protected $progressDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $targetResourceName;

  /**
   * @param string
   */
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  /**
   * @return string
   */
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param GoogleCloudApigeeV1OperationMetadataProgress
   */
  public function setProgress(GoogleCloudApigeeV1OperationMetadataProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return GoogleCloudApigeeV1OperationMetadataProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTargetResourceName($targetResourceName)
  {
    $this->targetResourceName = $targetResourceName;
  }
  /**
   * @return string
   */
  public function getTargetResourceName()
  {
    return $this->targetResourceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1OperationMetadata::class, 'Google_Service_Apigee_GoogleCloudApigeeV1OperationMetadata');
