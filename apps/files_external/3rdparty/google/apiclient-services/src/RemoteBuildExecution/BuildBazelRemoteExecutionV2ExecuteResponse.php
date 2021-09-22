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

class BuildBazelRemoteExecutionV2ExecuteResponse extends \Google\Model
{
  public $cachedResult;
  public $message;
  protected $resultType = BuildBazelRemoteExecutionV2ActionResult::class;
  protected $resultDataType = '';
  protected $serverLogsType = BuildBazelRemoteExecutionV2LogFile::class;
  protected $serverLogsDataType = 'map';
  protected $statusType = GoogleRpcStatus::class;
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
   * @param BuildBazelRemoteExecutionV2ActionResult
   */
  public function setResult(BuildBazelRemoteExecutionV2ActionResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return BuildBazelRemoteExecutionV2ActionResult
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param BuildBazelRemoteExecutionV2LogFile[]
   */
  public function setServerLogs($serverLogs)
  {
    $this->serverLogs = $serverLogs;
  }
  /**
   * @return BuildBazelRemoteExecutionV2LogFile[]
   */
  public function getServerLogs()
  {
    return $this->serverLogs;
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
class_alias(BuildBazelRemoteExecutionV2ExecuteResponse::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecuteResponse');
