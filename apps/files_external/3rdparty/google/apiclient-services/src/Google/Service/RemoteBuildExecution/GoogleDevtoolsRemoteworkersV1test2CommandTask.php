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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTask extends Google_Model
{
  protected $expectedOutputsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs';
  protected $expectedOutputsDataType = '';
  protected $inputsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs';
  protected $inputsDataType = '';
  protected $timeoutsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts';
  protected $timeoutsDataType = '';

  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs
   */
  public function setExpectedOutputs(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs $expectedOutputs)
  {
    $this->expectedOutputs = $expectedOutputs;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs
   */
  public function getExpectedOutputs()
  {
    return $this->expectedOutputs;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs
   */
  public function setInputs(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs $inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts
   */
  public function setTimeouts(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts $timeouts)
  {
    $this->timeouts = $timeouts;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts
   */
  public function getTimeouts()
  {
    return $this->timeouts;
  }
}
