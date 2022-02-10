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

class AutomaticScaling extends \Google\Model
{
  /**
   * @var string
   */
  public $coolDownPeriod;
  protected $cpuUtilizationType = CpuUtilization::class;
  protected $cpuUtilizationDataType = '';
  protected $diskUtilizationType = DiskUtilization::class;
  protected $diskUtilizationDataType = '';
  /**
   * @var int
   */
  public $maxConcurrentRequests;
  /**
   * @var int
   */
  public $maxIdleInstances;
  /**
   * @var string
   */
  public $maxPendingLatency;
  /**
   * @var int
   */
  public $maxTotalInstances;
  /**
   * @var int
   */
  public $minIdleInstances;
  /**
   * @var string
   */
  public $minPendingLatency;
  /**
   * @var int
   */
  public $minTotalInstances;
  protected $networkUtilizationType = NetworkUtilization::class;
  protected $networkUtilizationDataType = '';
  protected $requestUtilizationType = RequestUtilization::class;
  protected $requestUtilizationDataType = '';
  protected $standardSchedulerSettingsType = StandardSchedulerSettings::class;
  protected $standardSchedulerSettingsDataType = '';

  /**
   * @param string
   */
  public function setCoolDownPeriod($coolDownPeriod)
  {
    $this->coolDownPeriod = $coolDownPeriod;
  }
  /**
   * @return string
   */
  public function getCoolDownPeriod()
  {
    return $this->coolDownPeriod;
  }
  /**
   * @param CpuUtilization
   */
  public function setCpuUtilization(CpuUtilization $cpuUtilization)
  {
    $this->cpuUtilization = $cpuUtilization;
  }
  /**
   * @return CpuUtilization
   */
  public function getCpuUtilization()
  {
    return $this->cpuUtilization;
  }
  /**
   * @param DiskUtilization
   */
  public function setDiskUtilization(DiskUtilization $diskUtilization)
  {
    $this->diskUtilization = $diskUtilization;
  }
  /**
   * @return DiskUtilization
   */
  public function getDiskUtilization()
  {
    return $this->diskUtilization;
  }
  /**
   * @param int
   */
  public function setMaxConcurrentRequests($maxConcurrentRequests)
  {
    $this->maxConcurrentRequests = $maxConcurrentRequests;
  }
  /**
   * @return int
   */
  public function getMaxConcurrentRequests()
  {
    return $this->maxConcurrentRequests;
  }
  /**
   * @param int
   */
  public function setMaxIdleInstances($maxIdleInstances)
  {
    $this->maxIdleInstances = $maxIdleInstances;
  }
  /**
   * @return int
   */
  public function getMaxIdleInstances()
  {
    return $this->maxIdleInstances;
  }
  /**
   * @param string
   */
  public function setMaxPendingLatency($maxPendingLatency)
  {
    $this->maxPendingLatency = $maxPendingLatency;
  }
  /**
   * @return string
   */
  public function getMaxPendingLatency()
  {
    return $this->maxPendingLatency;
  }
  /**
   * @param int
   */
  public function setMaxTotalInstances($maxTotalInstances)
  {
    $this->maxTotalInstances = $maxTotalInstances;
  }
  /**
   * @return int
   */
  public function getMaxTotalInstances()
  {
    return $this->maxTotalInstances;
  }
  /**
   * @param int
   */
  public function setMinIdleInstances($minIdleInstances)
  {
    $this->minIdleInstances = $minIdleInstances;
  }
  /**
   * @return int
   */
  public function getMinIdleInstances()
  {
    return $this->minIdleInstances;
  }
  /**
   * @param string
   */
  public function setMinPendingLatency($minPendingLatency)
  {
    $this->minPendingLatency = $minPendingLatency;
  }
  /**
   * @return string
   */
  public function getMinPendingLatency()
  {
    return $this->minPendingLatency;
  }
  /**
   * @param int
   */
  public function setMinTotalInstances($minTotalInstances)
  {
    $this->minTotalInstances = $minTotalInstances;
  }
  /**
   * @return int
   */
  public function getMinTotalInstances()
  {
    return $this->minTotalInstances;
  }
  /**
   * @param NetworkUtilization
   */
  public function setNetworkUtilization(NetworkUtilization $networkUtilization)
  {
    $this->networkUtilization = $networkUtilization;
  }
  /**
   * @return NetworkUtilization
   */
  public function getNetworkUtilization()
  {
    return $this->networkUtilization;
  }
  /**
   * @param RequestUtilization
   */
  public function setRequestUtilization(RequestUtilization $requestUtilization)
  {
    $this->requestUtilization = $requestUtilization;
  }
  /**
   * @return RequestUtilization
   */
  public function getRequestUtilization()
  {
    return $this->requestUtilization;
  }
  /**
   * @param StandardSchedulerSettings
   */
  public function setStandardSchedulerSettings(StandardSchedulerSettings $standardSchedulerSettings)
  {
    $this->standardSchedulerSettings = $standardSchedulerSettings;
  }
  /**
   * @return StandardSchedulerSettings
   */
  public function getStandardSchedulerSettings()
  {
    return $this->standardSchedulerSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutomaticScaling::class, 'Google_Service_Appengine_AutomaticScaling');
