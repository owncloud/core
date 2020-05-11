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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Action extends Google_Collection
{
  protected $collection_key = 'outputNodeProperties';
  protected $commandDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $commandDigestDataType = '';
  public $doNotCache;
  protected $inputRootDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $inputRootDigestDataType = '';
  public $outputNodeProperties;
  public $timeout;

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setCommandDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $commandDigest)
  {
    $this->commandDigest = $commandDigest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getCommandDigest()
  {
    return $this->commandDigest;
  }
  public function setDoNotCache($doNotCache)
  {
    $this->doNotCache = $doNotCache;
  }
  public function getDoNotCache()
  {
    return $this->doNotCache;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setInputRootDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $inputRootDigest)
  {
    $this->inputRootDigest = $inputRootDigest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getInputRootDigest()
  {
    return $this->inputRootDigest;
  }
  public function setOutputNodeProperties($outputNodeProperties)
  {
    $this->outputNodeProperties = $outputNodeProperties;
  }
  public function getOutputNodeProperties()
  {
    return $this->outputNodeProperties;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
