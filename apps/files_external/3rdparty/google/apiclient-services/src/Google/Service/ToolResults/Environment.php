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

class Google_Service_ToolResults_Environment extends Google_Collection
{
  protected $collection_key = 'shardSummaries';
  protected $completionTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $completionTimeDataType = '';
  protected $creationTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $creationTimeDataType = '';
  protected $dimensionValueType = 'Google_Service_ToolResults_EnvironmentDimensionValueEntry';
  protected $dimensionValueDataType = 'array';
  public $displayName;
  public $environmentId;
  protected $environmentResultType = 'Google_Service_ToolResults_MergedResult';
  protected $environmentResultDataType = '';
  public $executionId;
  public $historyId;
  public $projectId;
  protected $resultsStorageType = 'Google_Service_ToolResults_ResultsStorage';
  protected $resultsStorageDataType = '';
  protected $shardSummariesType = 'Google_Service_ToolResults_ShardSummary';
  protected $shardSummariesDataType = 'array';

  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setCompletionTime(Google_Service_ToolResults_Timestamp $completionTime)
  {
    $this->completionTime = $completionTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getCompletionTime()
  {
    return $this->completionTime;
  }
  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setCreationTime(Google_Service_ToolResults_Timestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param Google_Service_ToolResults_EnvironmentDimensionValueEntry
   */
  public function setDimensionValue($dimensionValue)
  {
    $this->dimensionValue = $dimensionValue;
  }
  /**
   * @return Google_Service_ToolResults_EnvironmentDimensionValueEntry
   */
  public function getDimensionValue()
  {
    return $this->dimensionValue;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnvironmentId($environmentId)
  {
    $this->environmentId = $environmentId;
  }
  public function getEnvironmentId()
  {
    return $this->environmentId;
  }
  /**
   * @param Google_Service_ToolResults_MergedResult
   */
  public function setEnvironmentResult(Google_Service_ToolResults_MergedResult $environmentResult)
  {
    $this->environmentResult = $environmentResult;
  }
  /**
   * @return Google_Service_ToolResults_MergedResult
   */
  public function getEnvironmentResult()
  {
    return $this->environmentResult;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_ToolResults_ResultsStorage
   */
  public function setResultsStorage(Google_Service_ToolResults_ResultsStorage $resultsStorage)
  {
    $this->resultsStorage = $resultsStorage;
  }
  /**
   * @return Google_Service_ToolResults_ResultsStorage
   */
  public function getResultsStorage()
  {
    return $this->resultsStorage;
  }
  /**
   * @param Google_Service_ToolResults_ShardSummary
   */
  public function setShardSummaries($shardSummaries)
  {
    $this->shardSummaries = $shardSummaries;
  }
  /**
   * @return Google_Service_ToolResults_ShardSummary
   */
  public function getShardSummaries()
  {
    return $this->shardSummaries;
  }
}
