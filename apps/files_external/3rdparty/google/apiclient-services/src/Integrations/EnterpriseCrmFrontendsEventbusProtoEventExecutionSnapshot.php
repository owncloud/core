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

class EnterpriseCrmFrontendsEventbusProtoEventExecutionSnapshot extends \Google\Collection
{
  protected $collection_key = 'taskExecutionDetails';
  /**
   * @var string
   */
  public $checkpointTaskNumber;
  protected $conditionResultsType = EnterpriseCrmEventbusProtoConditionResult::class;
  protected $conditionResultsDataType = 'array';
  protected $diffParamsType = EnterpriseCrmFrontendsEventbusProtoEventParameters::class;
  protected $diffParamsDataType = '';
  /**
   * @var string
   */
  public $eventExecutionInfoId;
  /**
   * @var string
   */
  public $eventExecutionSnapshotId;
  protected $eventExecutionSnapshotMetadataType = EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata::class;
  protected $eventExecutionSnapshotMetadataDataType = '';
  protected $eventParamsType = EnterpriseCrmFrontendsEventbusProtoEventParameters::class;
  protected $eventParamsDataType = '';
  /**
   * @var string
   */
  public $snapshotTime;
  protected $taskExecutionDetailsType = EnterpriseCrmEventbusProtoTaskExecutionDetails::class;
  protected $taskExecutionDetailsDataType = 'array';
  /**
   * @var string
   */
  public $taskName;

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
   * @param EnterpriseCrmEventbusProtoConditionResult[]
   */
  public function setConditionResults($conditionResults)
  {
    $this->conditionResults = $conditionResults;
  }
  /**
   * @return EnterpriseCrmEventbusProtoConditionResult[]
   */
  public function getConditionResults()
  {
    return $this->conditionResults;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function setDiffParams(EnterpriseCrmFrontendsEventbusProtoEventParameters $diffParams)
  {
    $this->diffParams = $diffParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function getDiffParams()
  {
    return $this->diffParams;
  }
  /**
   * @param string
   */
  public function setEventExecutionInfoId($eventExecutionInfoId)
  {
    $this->eventExecutionInfoId = $eventExecutionInfoId;
  }
  /**
   * @return string
   */
  public function getEventExecutionInfoId()
  {
    return $this->eventExecutionInfoId;
  }
  /**
   * @param string
   */
  public function setEventExecutionSnapshotId($eventExecutionSnapshotId)
  {
    $this->eventExecutionSnapshotId = $eventExecutionSnapshotId;
  }
  /**
   * @return string
   */
  public function getEventExecutionSnapshotId()
  {
    return $this->eventExecutionSnapshotId;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata
   */
  public function setEventExecutionSnapshotMetadata(EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata $eventExecutionSnapshotMetadata)
  {
    $this->eventExecutionSnapshotMetadata = $eventExecutionSnapshotMetadata;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata
   */
  public function getEventExecutionSnapshotMetadata()
  {
    return $this->eventExecutionSnapshotMetadata;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function setEventParams(EnterpriseCrmFrontendsEventbusProtoEventParameters $eventParams)
  {
    $this->eventParams = $eventParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function getEventParams()
  {
    return $this->eventParams;
  }
  /**
   * @param string
   */
  public function setSnapshotTime($snapshotTime)
  {
    $this->snapshotTime = $snapshotTime;
  }
  /**
   * @return string
   */
  public function getSnapshotTime()
  {
    return $this->snapshotTime;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTaskExecutionDetails[]
   */
  public function setTaskExecutionDetails($taskExecutionDetails)
  {
    $this->taskExecutionDetails = $taskExecutionDetails;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTaskExecutionDetails[]
   */
  public function getTaskExecutionDetails()
  {
    return $this->taskExecutionDetails;
  }
  /**
   * @param string
   */
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  /**
   * @return string
   */
  public function getTaskName()
  {
    return $this->taskName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoEventExecutionSnapshot::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoEventExecutionSnapshot');
