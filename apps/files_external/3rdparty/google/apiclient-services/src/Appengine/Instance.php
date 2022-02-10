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

namespace Google\Service\Appengine;

class Instance extends \Google\Model
{
  /**
   * @var string
   */
  public $appEngineRelease;
  /**
   * @var string
   */
  public $availability;
  /**
   * @var int
   */
  public $averageLatency;
  /**
   * @var int
   */
  public $errors;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $memoryUsage;
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $qps;
  /**
   * @var int
   */
  public $requests;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var bool
   */
  public $vmDebugEnabled;
  /**
   * @var string
   */
  public $vmId;
  /**
   * @var string
   */
  public $vmIp;
  /**
   * @var string
   */
  public $vmLiveness;
  /**
   * @var string
   */
  public $vmName;
  /**
   * @var string
   */
  public $vmStatus;
  /**
   * @var string
   */
  public $vmZoneName;

  /**
   * @param string
   */
  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  /**
   * @return string
   */
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  /**
   * @param string
   */
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return string
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param int
   */
  public function setAverageLatency($averageLatency)
  {
    $this->averageLatency = $averageLatency;
  }
  /**
   * @return int
   */
  public function getAverageLatency()
  {
    return $this->averageLatency;
  }
  /**
   * @param int
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return int
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setMemoryUsage($memoryUsage)
  {
    $this->memoryUsage = $memoryUsage;
  }
  /**
   * @return string
   */
  public function getMemoryUsage()
  {
    return $this->memoryUsage;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param float
   */
  public function setQps($qps)
  {
    $this->qps = $qps;
  }
  /**
   * @return float
   */
  public function getQps()
  {
    return $this->qps;
  }
  /**
   * @param int
   */
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  /**
   * @return int
   */
  public function getRequests()
  {
    return $this->requests;
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
   * @param bool
   */
  public function setVmDebugEnabled($vmDebugEnabled)
  {
    $this->vmDebugEnabled = $vmDebugEnabled;
  }
  /**
   * @return bool
   */
  public function getVmDebugEnabled()
  {
    return $this->vmDebugEnabled;
  }
  /**
   * @param string
   */
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  /**
   * @return string
   */
  public function getVmId()
  {
    return $this->vmId;
  }
  /**
   * @param string
   */
  public function setVmIp($vmIp)
  {
    $this->vmIp = $vmIp;
  }
  /**
   * @return string
   */
  public function getVmIp()
  {
    return $this->vmIp;
  }
  /**
   * @param string
   */
  public function setVmLiveness($vmLiveness)
  {
    $this->vmLiveness = $vmLiveness;
  }
  /**
   * @return string
   */
  public function getVmLiveness()
  {
    return $this->vmLiveness;
  }
  /**
   * @param string
   */
  public function setVmName($vmName)
  {
    $this->vmName = $vmName;
  }
  /**
   * @return string
   */
  public function getVmName()
  {
    return $this->vmName;
  }
  /**
   * @param string
   */
  public function setVmStatus($vmStatus)
  {
    $this->vmStatus = $vmStatus;
  }
  /**
   * @return string
   */
  public function getVmStatus()
  {
    return $this->vmStatus;
  }
  /**
   * @param string
   */
  public function setVmZoneName($vmZoneName)
  {
    $this->vmZoneName = $vmZoneName;
  }
  /**
   * @return string
   */
  public function getVmZoneName()
  {
    return $this->vmZoneName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_Appengine_Instance');
