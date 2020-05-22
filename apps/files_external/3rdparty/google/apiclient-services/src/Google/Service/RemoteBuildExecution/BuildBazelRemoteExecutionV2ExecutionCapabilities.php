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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionCapabilities extends Google_Collection
{
  protected $collection_key = 'supportedNodeProperties';
  public $digestFunction;
  public $execEnabled;
  protected $executionPriorityCapabilitiesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2PriorityCapabilities';
  protected $executionPriorityCapabilitiesDataType = '';
  public $supportedNodeProperties;

  public function setDigestFunction($digestFunction)
  {
    $this->digestFunction = $digestFunction;
  }
  public function getDigestFunction()
  {
    return $this->digestFunction;
  }
  public function setExecEnabled($execEnabled)
  {
    $this->execEnabled = $execEnabled;
  }
  public function getExecEnabled()
  {
    return $this->execEnabled;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2PriorityCapabilities
   */
  public function setExecutionPriorityCapabilities(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2PriorityCapabilities $executionPriorityCapabilities)
  {
    $this->executionPriorityCapabilities = $executionPriorityCapabilities;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2PriorityCapabilities
   */
  public function getExecutionPriorityCapabilities()
  {
    return $this->executionPriorityCapabilities;
  }
  public function setSupportedNodeProperties($supportedNodeProperties)
  {
    $this->supportedNodeProperties = $supportedNodeProperties;
  }
  public function getSupportedNodeProperties()
  {
    return $this->supportedNodeProperties;
  }
}
