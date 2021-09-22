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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3Experiment extends \Google\Collection
{
  protected $collection_key = 'variantsHistory';
  public $createTime;
  protected $definitionType = GoogleCloudDialogflowCxV3ExperimentDefinition::class;
  protected $definitionDataType = '';
  public $description;
  public $displayName;
  public $endTime;
  public $experimentLength;
  public $lastUpdateTime;
  public $name;
  protected $resultType = GoogleCloudDialogflowCxV3ExperimentResult::class;
  protected $resultDataType = '';
  protected $rolloutConfigType = GoogleCloudDialogflowCxV3RolloutConfig::class;
  protected $rolloutConfigDataType = '';
  public $rolloutFailureReason;
  protected $rolloutStateType = GoogleCloudDialogflowCxV3RolloutState::class;
  protected $rolloutStateDataType = '';
  public $startTime;
  public $state;
  protected $variantsHistoryType = GoogleCloudDialogflowCxV3VariantsHistory::class;
  protected $variantsHistoryDataType = 'array';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ExperimentDefinition
   */
  public function setDefinition(GoogleCloudDialogflowCxV3ExperimentDefinition $definition)
  {
    $this->definition = $definition;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ExperimentDefinition
   */
  public function getDefinition()
  {
    return $this->definition;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setExperimentLength($experimentLength)
  {
    $this->experimentLength = $experimentLength;
  }
  public function getExperimentLength()
  {
    return $this->experimentLength;
  }
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ExperimentResult
   */
  public function setResult(GoogleCloudDialogflowCxV3ExperimentResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ExperimentResult
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param GoogleCloudDialogflowCxV3RolloutConfig
   */
  public function setRolloutConfig(GoogleCloudDialogflowCxV3RolloutConfig $rolloutConfig)
  {
    $this->rolloutConfig = $rolloutConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3RolloutConfig
   */
  public function getRolloutConfig()
  {
    return $this->rolloutConfig;
  }
  public function setRolloutFailureReason($rolloutFailureReason)
  {
    $this->rolloutFailureReason = $rolloutFailureReason;
  }
  public function getRolloutFailureReason()
  {
    return $this->rolloutFailureReason;
  }
  /**
   * @param GoogleCloudDialogflowCxV3RolloutState
   */
  public function setRolloutState(GoogleCloudDialogflowCxV3RolloutState $rolloutState)
  {
    $this->rolloutState = $rolloutState;
  }
  /**
   * @return GoogleCloudDialogflowCxV3RolloutState
   */
  public function getRolloutState()
  {
    return $this->rolloutState;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleCloudDialogflowCxV3VariantsHistory[]
   */
  public function setVariantsHistory($variantsHistory)
  {
    $this->variantsHistory = $variantsHistory;
  }
  /**
   * @return GoogleCloudDialogflowCxV3VariantsHistory[]
   */
  public function getVariantsHistory()
  {
    return $this->variantsHistory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Experiment::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Experiment');
