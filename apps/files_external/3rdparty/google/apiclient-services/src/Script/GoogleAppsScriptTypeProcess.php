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

namespace Google\Service\Script;

class GoogleAppsScriptTypeProcess extends \Google\Model
{
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $functionName;
  /**
   * @var string
   */
  public $processStatus;
  /**
   * @var string
   */
  public $processType;
  /**
   * @var string
   */
  public $projectName;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $userAccessLevel;

  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setFunctionName($functionName)
  {
    $this->functionName = $functionName;
  }
  /**
   * @return string
   */
  public function getFunctionName()
  {
    return $this->functionName;
  }
  /**
   * @param string
   */
  public function setProcessStatus($processStatus)
  {
    $this->processStatus = $processStatus;
  }
  /**
   * @return string
   */
  public function getProcessStatus()
  {
    return $this->processStatus;
  }
  /**
   * @param string
   */
  public function setProcessType($processType)
  {
    $this->processType = $processType;
  }
  /**
   * @return string
   */
  public function getProcessType()
  {
    return $this->processType;
  }
  /**
   * @param string
   */
  public function setProjectName($projectName)
  {
    $this->projectName = $projectName;
  }
  /**
   * @return string
   */
  public function getProjectName()
  {
    return $this->projectName;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setUserAccessLevel($userAccessLevel)
  {
    $this->userAccessLevel = $userAccessLevel;
  }
  /**
   * @return string
   */
  public function getUserAccessLevel()
  {
    return $this->userAccessLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsScriptTypeProcess::class, 'Google_Service_Script_GoogleAppsScriptTypeProcess');
