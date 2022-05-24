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

namespace Google\Service\Dataflow;

class Job extends \Google\Collection
{
  protected $collection_key = 'tempFiles';
  /**
   * @var string
   */
  public $clientRequestId;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $createdFromSnapshotId;
  /**
   * @var string
   */
  public $currentState;
  /**
   * @var string
   */
  public $currentStateTime;
  protected $environmentType = Environment::class;
  protected $environmentDataType = '';
  protected $executionInfoType = JobExecutionInfo::class;
  protected $executionInfoDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $jobMetadataType = JobMetadata::class;
  protected $jobMetadataDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  protected $pipelineDescriptionType = PipelineDescription::class;
  protected $pipelineDescriptionDataType = '';
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $replaceJobId;
  /**
   * @var string
   */
  public $replacedByJobId;
  /**
   * @var string
   */
  public $requestedState;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  protected $stageStatesType = ExecutionStageState::class;
  protected $stageStatesDataType = 'array';
  /**
   * @var string
   */
  public $startTime;
  protected $stepsType = Step::class;
  protected $stepsDataType = 'array';
  /**
   * @var string
   */
  public $stepsLocation;
  /**
   * @var string[]
   */
  public $tempFiles;
  /**
   * @var string[]
   */
  public $transformNameMapping;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setClientRequestId($clientRequestId)
  {
    $this->clientRequestId = $clientRequestId;
  }
  /**
   * @return string
   */
  public function getClientRequestId()
  {
    return $this->clientRequestId;
  }
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
  public function setCreatedFromSnapshotId($createdFromSnapshotId)
  {
    $this->createdFromSnapshotId = $createdFromSnapshotId;
  }
  /**
   * @return string
   */
  public function getCreatedFromSnapshotId()
  {
    return $this->createdFromSnapshotId;
  }
  /**
   * @param string
   */
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  /**
   * @return string
   */
  public function getCurrentState()
  {
    return $this->currentState;
  }
  /**
   * @param string
   */
  public function setCurrentStateTime($currentStateTime)
  {
    $this->currentStateTime = $currentStateTime;
  }
  /**
   * @return string
   */
  public function getCurrentStateTime()
  {
    return $this->currentStateTime;
  }
  /**
   * @param Environment
   */
  public function setEnvironment(Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param JobExecutionInfo
   */
  public function setExecutionInfo(JobExecutionInfo $executionInfo)
  {
    $this->executionInfo = $executionInfo;
  }
  /**
   * @return JobExecutionInfo
   */
  public function getExecutionInfo()
  {
    return $this->executionInfo;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param JobMetadata
   */
  public function setJobMetadata(JobMetadata $jobMetadata)
  {
    $this->jobMetadata = $jobMetadata;
  }
  /**
   * @return JobMetadata
   */
  public function getJobMetadata()
  {
    return $this->jobMetadata;
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
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
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
   * @param PipelineDescription
   */
  public function setPipelineDescription(PipelineDescription $pipelineDescription)
  {
    $this->pipelineDescription = $pipelineDescription;
  }
  /**
   * @return PipelineDescription
   */
  public function getPipelineDescription()
  {
    return $this->pipelineDescription;
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
   * @param string
   */
  public function setReplaceJobId($replaceJobId)
  {
    $this->replaceJobId = $replaceJobId;
  }
  /**
   * @return string
   */
  public function getReplaceJobId()
  {
    return $this->replaceJobId;
  }
  /**
   * @param string
   */
  public function setReplacedByJobId($replacedByJobId)
  {
    $this->replacedByJobId = $replacedByJobId;
  }
  /**
   * @return string
   */
  public function getReplacedByJobId()
  {
    return $this->replacedByJobId;
  }
  /**
   * @param string
   */
  public function setRequestedState($requestedState)
  {
    $this->requestedState = $requestedState;
  }
  /**
   * @return string
   */
  public function getRequestedState()
  {
    return $this->requestedState;
  }
  /**
   * @param bool
   */
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param ExecutionStageState[]
   */
  public function setStageStates($stageStates)
  {
    $this->stageStates = $stageStates;
  }
  /**
   * @return ExecutionStageState[]
   */
  public function getStageStates()
  {
    return $this->stageStates;
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
   * @param Step[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return Step[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
  /**
   * @param string
   */
  public function setStepsLocation($stepsLocation)
  {
    $this->stepsLocation = $stepsLocation;
  }
  /**
   * @return string
   */
  public function getStepsLocation()
  {
    return $this->stepsLocation;
  }
  /**
   * @param string[]
   */
  public function setTempFiles($tempFiles)
  {
    $this->tempFiles = $tempFiles;
  }
  /**
   * @return string[]
   */
  public function getTempFiles()
  {
    return $this->tempFiles;
  }
  /**
   * @param string[]
   */
  public function setTransformNameMapping($transformNameMapping)
  {
    $this->transformNameMapping = $transformNameMapping;
  }
  /**
   * @return string[]
   */
  public function getTransformNameMapping()
  {
    return $this->transformNameMapping;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_Dataflow_Job');
