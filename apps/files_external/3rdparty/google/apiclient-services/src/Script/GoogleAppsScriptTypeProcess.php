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
  public $duration;
  public $functionName;
  public $processStatus;
  public $processType;
  public $projectName;
  public $startTime;
  public $userAccessLevel;

  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setFunctionName($functionName)
  {
    $this->functionName = $functionName;
  }
  public function getFunctionName()
  {
    return $this->functionName;
  }
  public function setProcessStatus($processStatus)
  {
    $this->processStatus = $processStatus;
  }
  public function getProcessStatus()
  {
    return $this->processStatus;
  }
  public function setProcessType($processType)
  {
    $this->processType = $processType;
  }
  public function getProcessType()
  {
    return $this->processType;
  }
  public function setProjectName($projectName)
  {
    $this->projectName = $projectName;
  }
  public function getProjectName()
  {
    return $this->projectName;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setUserAccessLevel($userAccessLevel)
  {
    $this->userAccessLevel = $userAccessLevel;
  }
  public function getUserAccessLevel()
  {
    return $this->userAccessLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsScriptTypeProcess::class, 'Google_Service_Script_GoogleAppsScriptTypeProcess');
