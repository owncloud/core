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

class StreamingConfigTask extends \Google\Collection
{
  protected $collection_key = 'streamingComputationConfigs';
  public $commitStreamChunkSizeBytes;
  public $getDataStreamChunkSizeBytes;
  public $maxWorkItemCommitBytes;
  protected $streamingComputationConfigsType = StreamingComputationConfig::class;
  protected $streamingComputationConfigsDataType = 'array';
  public $userStepToStateFamilyNameMap;
  public $windmillServiceEndpoint;
  public $windmillServicePort;

  public function setCommitStreamChunkSizeBytes($commitStreamChunkSizeBytes)
  {
    $this->commitStreamChunkSizeBytes = $commitStreamChunkSizeBytes;
  }
  public function getCommitStreamChunkSizeBytes()
  {
    return $this->commitStreamChunkSizeBytes;
  }
  public function setGetDataStreamChunkSizeBytes($getDataStreamChunkSizeBytes)
  {
    $this->getDataStreamChunkSizeBytes = $getDataStreamChunkSizeBytes;
  }
  public function getGetDataStreamChunkSizeBytes()
  {
    return $this->getDataStreamChunkSizeBytes;
  }
  public function setMaxWorkItemCommitBytes($maxWorkItemCommitBytes)
  {
    $this->maxWorkItemCommitBytes = $maxWorkItemCommitBytes;
  }
  public function getMaxWorkItemCommitBytes()
  {
    return $this->maxWorkItemCommitBytes;
  }
  /**
   * @param StreamingComputationConfig[]
   */
  public function setStreamingComputationConfigs($streamingComputationConfigs)
  {
    $this->streamingComputationConfigs = $streamingComputationConfigs;
  }
  /**
   * @return StreamingComputationConfig[]
   */
  public function getStreamingComputationConfigs()
  {
    return $this->streamingComputationConfigs;
  }
  public function setUserStepToStateFamilyNameMap($userStepToStateFamilyNameMap)
  {
    $this->userStepToStateFamilyNameMap = $userStepToStateFamilyNameMap;
  }
  public function getUserStepToStateFamilyNameMap()
  {
    return $this->userStepToStateFamilyNameMap;
  }
  public function setWindmillServiceEndpoint($windmillServiceEndpoint)
  {
    $this->windmillServiceEndpoint = $windmillServiceEndpoint;
  }
  public function getWindmillServiceEndpoint()
  {
    return $this->windmillServiceEndpoint;
  }
  public function setWindmillServicePort($windmillServicePort)
  {
    $this->windmillServicePort = $windmillServicePort;
  }
  public function getWindmillServicePort()
  {
    return $this->windmillServicePort;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StreamingConfigTask::class, 'Google_Service_Dataflow_StreamingConfigTask');
