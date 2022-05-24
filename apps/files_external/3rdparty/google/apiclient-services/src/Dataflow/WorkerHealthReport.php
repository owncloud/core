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
  /**
   * @var string
   */
  public $msg;
  /**
   * @var array[]
   */
  public $pods;
  /**
   * @var string
   */
  public $reportInterval;
  /**
   * @var string
   */
  public $vmBrokenCode;
  /**
   * @var bool
   */
  public $vmIsBroken;
  /**
   * @var bool
   */
  public $vmIsHealthy;
  /**
   * @var string
   */
  public $vmStartupTime;

  /**
   * @param string
   */
  public function setMsg($msg)
  {
    $this->msg = $msg;
  }
  /**
   * @return string
   */
  public function getMsg()
  {
    return $this->msg;
  }
  /**
   * @param array[]
   */
  public function setPods($pods)
  {
    $this->pods = $pods;
  }
  /**
   * @return array[]
   */
  public function getPods()
  {
    return $this->pods;
  }
  /**
   * @param string
   */
  public function setReportInterval($reportInterval)
  {
    $this->reportInterval = $reportInterval;
  }
  /**
   * @return string
   */
  public function getReportInterval()
  {
    return $this->reportInterval;
  }
  /**
   * @param string
   */
  public function setVmBrokenCode($vmBrokenCode)
  {
    $this->vmBrokenCode = $vmBrokenCode;
  }
  /**
   * @return string
   */
  public function getVmBrokenCode()
  {
    return $this->vmBrokenCode;
  }
  /**
   * @param bool
   */
  public function setVmIsBroken($vmIsBroken)
  {
    $this->vmIsBroken = $vmIsBroken;
  }
  /**
   * @return bool
   */
  public function getVmIsBroken()
  {
    return $this->vmIsBroken;
  }
  /**
   * @param bool
   */
  public function setVmIsHealthy($vmIsHealthy)
  {
    $this->vmIsHealthy = $vmIsHealthy;
  }
  /**
   * @return bool
   */
  public function getVmIsHealthy()
  {
    return $this->vmIsHealthy;
  }
  /**
   * @param string
   */
  public function setVmStartupTime($vmStartupTime)
  {
    $this->vmStartupTime = $vmStartupTime;
  }
  /**
   * @return string
   */
  public function getVmStartupTime()
  {
    return $this->vmStartupTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkerHealthReport::class, 'Google_Service_Dataflow_WorkerHealthReport');
