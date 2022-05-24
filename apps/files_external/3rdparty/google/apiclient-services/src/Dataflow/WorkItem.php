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

class WorkItem extends \Google\Collection
{
  protected $collection_key = 'packages';
  /**
   * @var string
   */
  public $configuration;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $initialReportIndex;
  /**
   * @var string
   */
  public $jobId;
  /**
   * @var string
   */
  public $leaseExpireTime;
  protected $mapTaskType = MapTask::class;
  protected $mapTaskDataType = '';
  protected $packagesType = Package::class;
  protected $packagesDataType = 'array';
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $reportStatusInterval;
  protected $seqMapTaskType = SeqMapTask::class;
  protected $seqMapTaskDataType = '';
  protected $shellTaskType = ShellTask::class;
  protected $shellTaskDataType = '';
  protected $sourceOperationTaskType = SourceOperationRequest::class;
  protected $sourceOperationTaskDataType = '';
  protected $streamingComputationTaskType = StreamingComputationTask::class;
  protected $streamingComputationTaskDataType = '';
  protected $streamingConfigTaskType = StreamingConfigTask::class;
  protected $streamingConfigTaskDataType = '';
  protected $streamingSetupTaskType = StreamingSetupTask::class;
  protected $streamingSetupTaskDataType = '';

  /**
   * @param string
   */
  public function setConfiguration($configuration)
  {
    $this->configuration = $configuration;
  }
  /**
   * @return string
   */
  public function getConfiguration()
  {
    return $this->configuration;
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
   * @param string
   */
  public function setInitialReportIndex($initialReportIndex)
  {
    $this->initialReportIndex = $initialReportIndex;
  }
  /**
   * @return string
   */
  public function getInitialReportIndex()
  {
    return $this->initialReportIndex;
  }
  /**
   * @param string
   */
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  /**
   * @return string
   */
  public function getJobId()
  {
    return $this->jobId;
  }
  /**
   * @param string
   */
  public function setLeaseExpireTime($leaseExpireTime)
  {
    $this->leaseExpireTime = $leaseExpireTime;
  }
  /**
   * @return string
   */
  public function getLeaseExpireTime()
  {
    return $this->leaseExpireTime;
  }
  /**
   * @param MapTask
   */
  public function setMapTask(MapTask $mapTask)
  {
    $this->mapTask = $mapTask;
  }
  /**
   * @return MapTask
   */
  public function getMapTask()
  {
    return $this->mapTask;
  }
  /**
   * @param Package[]
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
  }
  /**
   * @return Package[]
   */
  public function getPackages()
  {
    return $this->packages;
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
  public function setReportStatusInterval($reportStatusInterval)
  {
    $this->reportStatusInterval = $reportStatusInterval;
  }
  /**
   * @return string
   */
  public function getReportStatusInterval()
  {
    return $this->reportStatusInterval;
  }
  /**
   * @param SeqMapTask
   */
  public function setSeqMapTask(SeqMapTask $seqMapTask)
  {
    $this->seqMapTask = $seqMapTask;
  }
  /**
   * @return SeqMapTask
   */
  public function getSeqMapTask()
  {
    return $this->seqMapTask;
  }
  /**
   * @param ShellTask
   */
  public function setShellTask(ShellTask $shellTask)
  {
    $this->shellTask = $shellTask;
  }
  /**
   * @return ShellTask
   */
  public function getShellTask()
  {
    return $this->shellTask;
  }
  /**
   * @param SourceOperationRequest
   */
  public function setSourceOperationTask(SourceOperationRequest $sourceOperationTask)
  {
    $this->sourceOperationTask = $sourceOperationTask;
  }
  /**
   * @return SourceOperationRequest
   */
  public function getSourceOperationTask()
  {
    return $this->sourceOperationTask;
  }
  /**
   * @param StreamingComputationTask
   */
  public function setStreamingComputationTask(StreamingComputationTask $streamingComputationTask)
  {
    $this->streamingComputationTask = $streamingComputationTask;
  }
  /**
   * @return StreamingComputationTask
   */
  public function getStreamingComputationTask()
  {
    return $this->streamingComputationTask;
  }
  /**
   * @param StreamingConfigTask
   */
  public function setStreamingConfigTask(StreamingConfigTask $streamingConfigTask)
  {
    $this->streamingConfigTask = $streamingConfigTask;
  }
  /**
   * @return StreamingConfigTask
   */
  public function getStreamingConfigTask()
  {
    return $this->streamingConfigTask;
  }
  /**
   * @param StreamingSetupTask
   */
  public function setStreamingSetupTask(StreamingSetupTask $streamingSetupTask)
  {
    $this->streamingSetupTask = $streamingSetupTask;
  }
  /**
   * @return StreamingSetupTask
   */
  public function getStreamingSetupTask()
  {
    return $this->streamingSetupTask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkItem::class, 'Google_Service_Dataflow_WorkItem');
