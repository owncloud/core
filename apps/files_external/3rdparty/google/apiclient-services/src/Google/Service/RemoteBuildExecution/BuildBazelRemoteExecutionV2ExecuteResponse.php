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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecuteResponse extends Google_Model
{
  public $cachedResult;
  public $message;
  protected $resultType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult';
  protected $resultDataType = '';
  protected $serverLogsType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2LogFile';
  protected $serverLogsDataType = 'map';
  protected $statusType = 'Google_Service_RemoteBuildExecution_GoogleRpcStatus';
  protected $statusDataType = '';

  public function setCachedResult($cachedResult)
  {
    $this->cachedResult = $cachedResult;
  }
  public function getCachedResult()
  {
    return $this->cachedResult;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult
   */
  public function setResult(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2LogFile[]
   */
  public function setServerLogs($serverLogs)
  {
    $this->serverLogs = $serverLogs;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2LogFile[]
   */
  public function getServerLogs()
  {
    return $this->serverLogs;
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
