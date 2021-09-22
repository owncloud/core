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

namespace Google\Service\ToolResults;

class ToolExecution extends \Google\Collection
{
  protected $collection_key = 'toolOutputs';
  public $commandLineArguments;
  protected $exitCodeType = ToolExitCode::class;
  protected $exitCodeDataType = '';
  protected $toolLogsType = FileReference::class;
  protected $toolLogsDataType = 'array';
  protected $toolOutputsType = ToolOutputReference::class;
  protected $toolOutputsDataType = 'array';

  public function setCommandLineArguments($commandLineArguments)
  {
    $this->commandLineArguments = $commandLineArguments;
  }
  public function getCommandLineArguments()
  {
    return $this->commandLineArguments;
  }
  /**
   * @param ToolExitCode
   */
  public function setExitCode(ToolExitCode $exitCode)
  {
    $this->exitCode = $exitCode;
  }
  /**
   * @return ToolExitCode
   */
  public function getExitCode()
  {
    return $this->exitCode;
  }
  /**
   * @param FileReference[]
   */
  public function setToolLogs($toolLogs)
  {
    $this->toolLogs = $toolLogs;
  }
  /**
   * @return FileReference[]
   */
  public function getToolLogs()
  {
    return $this->toolLogs;
  }
  /**
   * @param ToolOutputReference[]
   */
  public function setToolOutputs($toolOutputs)
  {
    $this->toolOutputs = $toolOutputs;
  }
  /**
   * @return ToolOutputReference[]
   */
  public function getToolOutputs()
  {
    return $this->toolOutputs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ToolExecution::class, 'Google_Service_ToolResults_ToolExecution');
