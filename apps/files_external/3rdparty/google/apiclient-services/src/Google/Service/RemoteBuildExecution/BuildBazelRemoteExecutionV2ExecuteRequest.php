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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecuteRequest extends Google_Model
{
  protected $actionDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $actionDigestDataType = '';
  protected $executionPolicyType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionPolicy';
  protected $executionPolicyDataType = '';
  protected $resultsCachePolicyType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ResultsCachePolicy';
  protected $resultsCachePolicyDataType = '';
  public $skipCacheLookup;

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
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionPolicy
   */
  public function setExecutionPolicy(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionPolicy $executionPolicy)
  {
    $this->executionPolicy = $executionPolicy;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionPolicy
   */
  public function getExecutionPolicy()
  {
    return $this->executionPolicy;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ResultsCachePolicy
   */
  public function setResultsCachePolicy(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ResultsCachePolicy $resultsCachePolicy)
  {
    $this->resultsCachePolicy = $resultsCachePolicy;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ResultsCachePolicy
   */
  public function getResultsCachePolicy()
  {
    return $this->resultsCachePolicy;
  }
  public function setSkipCacheLookup($skipCacheLookup)
  {
    $this->skipCacheLookup = $skipCacheLookup;
  }
  public function getSkipCacheLookup()
  {
    return $this->skipCacheLookup;
  }
}
