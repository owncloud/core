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

class GoogleDevtoolsRemoteworkersV1test2CommandTask extends \Google\Model
{
  protected $expectedOutputsType = GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs::class;
  protected $expectedOutputsDataType = '';
  protected $inputsType = GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs::class;
  protected $inputsDataType = '';
  protected $timeoutsType = GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts::class;
  protected $timeoutsDataType = '';

  /**
   * @param GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs
   */
  public function setExpectedOutputs(GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs $expectedOutputs)
  {
    $this->expectedOutputs = $expectedOutputs;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2CommandTaskOutputs
   */
  public function getExpectedOutputs()
  {
    return $this->expectedOutputs;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs
   */
  public function setInputs(GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs $inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts
   */
  public function setTimeouts(GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts $timeouts)
  {
    $this->timeouts = $timeouts;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2CommandTaskTimeouts
   */
  public function getTimeouts()
  {
    return $this->timeouts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemoteworkersV1test2CommandTask::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTask');
