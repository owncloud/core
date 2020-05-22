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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsResponseResponse extends Google_Model
{
  protected $digestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $digestDataType = '';
  protected $statusType = 'Google_Service_RemoteBuildExecution_GoogleRpcStatus';
  protected $statusDataType = '';

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $digest)
  {
    $this->digest = $digest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getDigest()
  {
    return $this->digest;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleRpcStatus
   */
  public function setStatus(Google_Service_RemoteBuildExecution_GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}
