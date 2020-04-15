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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecuteOperationMetadata extends Google_Model
{
  protected $actionDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $actionDigestDataType = '';
  public $stage;
  public $stderrStreamName;
  public $stdoutStreamName;

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setActionDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $actionDigest)
  {
    $this->actionDigest = $actionDigest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getActionDigest()
  {
    return $this->actionDigest;
  }
  public function setStage($stage)
  {
    $this->stage = $stage;
  }
  public function getStage()
  {
    return $this->stage;
  }
  public function setStderrStreamName($stderrStreamName)
  {
    $this->stderrStreamName = $stderrStreamName;
  }
  public function getStderrStreamName()
  {
    return $this->stderrStreamName;
  }
  public function setStdoutStreamName($stdoutStreamName)
  {
    $this->stdoutStreamName = $stdoutStreamName;
  }
  public function getStdoutStreamName()
  {
    return $this->stdoutStreamName;
  }
}
