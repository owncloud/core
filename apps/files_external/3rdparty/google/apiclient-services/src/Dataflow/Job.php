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
  public $clientRequestId;
  public $createTime;
  public $createdFromSnapshotId;
  public $currentState;
  public $currentStateTime;
  protected $environmentType = Environment::class;
  protected $environmentDataType = '';
  protected $executionInfoType = JobExecutionInfo::class;
  protected $executionInfoDataType = '';
  public $id;
  protected $jobMetadataType = JobMetadata::class;
  protected $jobMetadataDataType = '';
  public $labels;
  public $location;
  public $name;
  protected $pipelineDescriptionType = PipelineDescription::class;
  protected $pipelineDescriptionDataType = '';
  public $projectId;
  public $replaceJobId;
  public $replacedByJobId;
  public $requestedState;
  public $satisfiesPzs;
  protected $stageStatesType = ExecutionStageState::class;
  protected $stageStatesDataType = 'array';
  public $startTime;
  protected $stepsType = Step::class;
  protected $stepsDataType = 'array';
  public $stepsLocation;
  public $tempFiles;
  public $transformNameMapping;
  public $type;

  public function setClientRequestId($clientRequestId)
  {
    $this->clientRequestId = $clientRequestId;
  }
  public function getClientRequestId()
  {
    return $this->clientRequestId;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreatedFromSnapshotId($createdFromSnapshotId)
  {
    $this->createdFromSnapshotId = $createdFromSnapshotId;
  }
  public function getCreatedFromSnapshotId()
  {
    return $this->createdFromSnapshotId;
  }
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  public function getCurrentState()
  {
    return $this->currentState;
  }
  public function setCurrentStateTime($currentStateTime)
  {
    $this->currentStateTime = $currentStateTime;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
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
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setReplaceJobId($replaceJobId)
  {
    $this->replaceJobId = $replaceJobId;
  }
  public function getReplaceJobId()
  {
    return $this->replaceJobId;
  }
  public function setReplacedByJobId($replacedByJobId)
  {
    $this->replacedByJobId = $replacedByJobId;
  }
  public function getReplacedByJobId()
  {
    return $this->replacedByJobId;
  }
  public function setRequestedState($requestedState)
  {
    $this->requestedState = $requestedState;
  }
  public function getRequestedState()
  {
    return $this->requestedState;
  }
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
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
  public function setStepsLocation($stepsLocation)
  {
    $this->stepsLocation = $stepsLocation;
  }
  public function getStepsLocation()
  {
    return $this->stepsLocation;
  }
  public function setTempFiles($tempFiles)
  {
    $this->tempFiles = $tempFiles;
  }
  public function getTempFiles()
  {
    return $this->tempFiles;
  }
  public function setTransformNameMapping($transformNameMapping)
  {
    $this->transformNameMapping = $transformNameMapping;
  }
  public function getTransformNameMapping()
  {
    return $this->transformNameMapping;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_Dataflow_Job');
