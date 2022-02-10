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

namespace Google\Service\ToolResults;

class Environment extends \Google\Collection
{
  protected $collection_key = 'shardSummaries';
  protected $completionTimeType = Timestamp::class;
  protected $completionTimeDataType = '';
  protected $creationTimeType = Timestamp::class;
  protected $creationTimeDataType = '';
  protected $dimensionValueType = EnvironmentDimensionValueEntry::class;
  protected $dimensionValueDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $environmentId;
  protected $environmentResultType = MergedResult::class;
  protected $environmentResultDataType = '';
  /**
   * @var string
   */
  public $executionId;
  /**
   * @var string
   */
  public $historyId;
  /**
   * @var string
   */
  public $projectId;
  protected $resultsStorageType = ResultsStorage::class;
  protected $resultsStorageDataType = '';
  protected $shardSummariesType = ShardSummary::class;
  protected $shardSummariesDataType = 'array';

  /**
   * @param Timestamp
   */
  public function setCompletionTime(Timestamp $completionTime)
  {
    $this->completionTime = $completionTime;
  }
  /**
   * @return Timestamp
   */
  public function getCompletionTime()
  {
    return $this->completionTime;
  }
  /**
   * @param Timestamp
   */
  public function setCreationTime(Timestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return Timestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param EnvironmentDimensionValueEntry[]
   */
  public function setDimensionValue($dimensionValue)
  {
    $this->dimensionValue = $dimensionValue;
  }
  /**
   * @return EnvironmentDimensionValueEntry[]
   */
  public function getDimensionValue()
  {
    return $this->dimensionValue;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEnvironmentId($environmentId)
  {
    $this->environmentId = $environmentId;
  }
  /**
   * @return string
   */
  public function getEnvironmentId()
  {
    return $this->environmentId;
  }
  /**
   * @param MergedResult
   */
  public function setEnvironmentResult(MergedResult $environmentResult)
  {
    $this->environmentResult = $environmentResult;
  }
  /**
   * @return MergedResult
   */
  public function getEnvironmentResult()
  {
    return $this->environmentResult;
  }
  /**
   * @param string
   */
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  /**
   * @return string
   */
  public function getExecutionId()
  {
    return $this->executionId;
  }
  /**
   * @param string
   */
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  /**
   * @return string
   */
  public function getHistoryId()
  {
    return $this->historyId;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param ResultsStorage
   */
  public function setResultsStorage(ResultsStorage $resultsStorage)
  {
    $this->resultsStorage = $resultsStorage;
  }
  /**
   * @return ResultsStorage
   */
  public function getResultsStorage()
  {
    return $this->resultsStorage;
  }
  /**
   * @param ShardSummary[]
   */
  public function setShardSummaries($shardSummaries)
  {
    $this->shardSummaries = $shardSummaries;
  }
  /**
   * @return ShardSummary[]
   */
  public function getShardSummaries()
  {
    return $this->shardSummaries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_ToolResults_Environment');
