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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1OperationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var bool
   */
  public $isCancellationRequested;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $modelName;
  /**
   * @var string
   */
  public $operationType;
  /**
   * @var string
   */
  public $projectNumber;
  /**
   * @var string
   */
  public $startTime;
  protected $versionType = GoogleCloudMlV1Version::class;
  protected $versionDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param bool
   */
  public function setIsCancellationRequested($isCancellationRequested)
  {
    $this->isCancellationRequested = $isCancellationRequested;
  }
  /**
   * @return bool
   */
  public function getIsCancellationRequested()
  {
    return $this->isCancellationRequested;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setModelName($modelName)
  {
    $this->modelName = $modelName;
  }
  /**
   * @return string
   */
  public function getModelName()
  {
    return $this->modelName;
  }
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
   * @param string
   */
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  /**
   * @return string
   */
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param GoogleCloudMlV1Version
   */
  public function setVersion(GoogleCloudMlV1Version $version)
  {
    $this->version = $version;
  }
  /**
   * @return GoogleCloudMlV1Version
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1OperationMetadata::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1OperationMetadata');
