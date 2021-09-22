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

namespace Google\Service\Dataflow;

class WorkerHealthReport extends \Google\Collection
{
  protected $collection_key = 'pods';
  public $msg;
  public $pods;
  public $reportInterval;
  public $vmBrokenCode;
  public $vmIsBroken;
  public $vmIsHealthy;
  public $vmStartupTime;

  public function setMsg($msg)
  {
    $this->msg = $msg;
  }
  public function getMsg()
  {
    return $this->msg;
  }
  public function setPods($pods)
  {
    $this->pods = $pods;
  }
  public function getPods()
  {
    return $this->pods;
  }
  public function setReportInterval($reportInterval)
  {
    $this->reportInterval = $reportInterval;
  }
  public function getReportInterval()
  {
    return $this->reportInterval;
  }
  public function setVmBrokenCode($vmBrokenCode)
  {
    $this->vmBrokenCode = $vmBrokenCode;
  }
  public function getVmBrokenCode()
  {
    return $this->vmBrokenCode;
  }
  public function setVmIsBroken($vmIsBroken)
  {
    $this->vmIsBroken = $vmIsBroken;
  }
  public function getVmIsBroken()
  {
    return $this->vmIsBroken;
  }
  public function setVmIsHealthy($vmIsHealthy)
  {
    $this->vmIsHealthy = $vmIsHealthy;
  }
  public function getVmIsHealthy()
  {
    return $this->vmIsHealthy;
  }
  public function setVmStartupTime($vmStartupTime)
  {
    $this->vmStartupTime = $vmStartupTime;
  }
  public function getVmStartupTime()
  {
    return $this->vmStartupTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkerHealthReport::class, 'Google_Service_Dataflow_WorkerHealthReport');
