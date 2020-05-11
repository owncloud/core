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

class Google_Service_WebSecurityScanner_ScanRun extends Google_Model
{
  public $endTime;
  public $executionState;
  public $hasVulnerabilities;
  public $name;
  public $progressPercent;
  public $resultState;
  public $startTime;
  public $urlsCrawledCount;
  public $urlsTestedCount;

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setExecutionState($executionState)
  {
    $this->executionState = $executionState;
  }
  public function getExecutionState()
  {
    return $this->executionState;
  }
  public function setHasVulnerabilities($hasVulnerabilities)
  {
    $this->hasVulnerabilities = $hasVulnerabilities;
  }
  public function getHasVulnerabilities()
  {
    return $this->hasVulnerabilities;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProgressPercent($progressPercent)
  {
    $this->progressPercent = $progressPercent;
  }
  public function getProgressPercent()
  {
    return $this->progressPercent;
  }
  public function setResultState($resultState)
  {
    $this->resultState = $resultState;
  }
  public function getResultState()
  {
    return $this->resultState;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setUrlsCrawledCount($urlsCrawledCount)
  {
    $this->urlsCrawledCount = $urlsCrawledCount;
  }
  public function getUrlsCrawledCount()
  {
    return $this->urlsCrawledCount;
  }
  public function setUrlsTestedCount($urlsTestedCount)
  {
    $this->urlsTestedCount = $urlsTestedCount;
  }
  public function getUrlsTestedCount()
  {
    return $this->urlsTestedCount;
  }
}
