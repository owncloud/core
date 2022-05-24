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
  /**
   * @var string
   */
  public $createTime;
  protected $definitionType = GoogleCloudDialogflowCxV3ExperimentDefinition::class;
  protected $definitionDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $experimentLength;
  /**
   * @var string
   */
  public $lastUpdateTime;
  /**
   * @var string
   */
  public $name;
  protected $resultType = GoogleCloudDialogflowCxV3ExperimentResult::class;
  protected $resultDataType = '';
  protected $rolloutConfigType = GoogleCloudDialogflowCxV3RolloutConfig::class;
  protected $rolloutConfigDataType = '';
  /**
   * @var string
   */
  public $rolloutFailureReason;
  protected $rolloutStateType = GoogleCloudDialogflowCxV3RolloutState::class;
  protected $rolloutStateDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  protected $variantsHistoryType = GoogleCloudDialogflowCxV3VariantsHistory::class;
  protected $variantsHistoryDataType = 'array';

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
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param string
   */
  public function setExperimentLength($experimentLength)
  {
    $this->experimentLength = $experimentLength;
  }
  /**
   * @return string
   */
  public function getExperimentLength()
  {
    return $this->experimentLength;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRolloutFailureReason($rolloutFailureReason)
  {
    $this->rolloutFailureReason = $rolloutFailureReason;
  }
  /**
   * @return string
   */
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
