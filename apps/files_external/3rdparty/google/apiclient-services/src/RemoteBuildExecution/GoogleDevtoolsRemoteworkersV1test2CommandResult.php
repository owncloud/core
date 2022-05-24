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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemoteworkersV1test2CommandResult extends \Google\Collection
{
  protected $collection_key = 'metadata';
  public $duration;
  public $exitCode;
  public $metadata;
  protected $outputsType = GoogleDevtoolsRemoteworkersV1test2Digest::class;
  protected $outputsDataType = '';
  public $overhead;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';

  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setExitCode($exitCode)
  {
    $this->exitCode = $exitCode;
  }
  public function getExitCode()
  {
    return $this->exitCode;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2Digest
   */
  public function setOutputs(GoogleDevtoolsRemoteworkersV1test2Digest $outputs)
  {
    $this->outputs = $outputs;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2Digest
   */
  public function getOutputs()
  {
    return $this->outputs;
  }
  public function setOverhead($overhead)
  {
    $this->overhead = $overhead;
  }
  public function getOverhead()
  {
    return $this->overhead;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemoteworkersV1test2CommandResult::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandResult');
