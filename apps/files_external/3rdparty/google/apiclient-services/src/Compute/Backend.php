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

namespace Google\Service\Compute;

class Backend extends \Google\Model
{
  /**
   * @var string
   */
  public $balancingMode;
  /**
   * @var float
   */
  public $capacityScaler;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $failover;
  /**
   * @var string
   */
  public $group;
  /**
   * @var int
   */
  public $maxConnections;
  /**
   * @var int
   */
  public $maxConnectionsPerEndpoint;
  /**
   * @var int
   */
  public $maxConnectionsPerInstance;
  /**
   * @var int
   */
  public $maxRate;
  /**
   * @var float
   */
  public $maxRatePerEndpoint;
  /**
   * @var float
   */
  public $maxRatePerInstance;
  /**
   * @var float
   */
  public $maxUtilization;

  /**
   * @param string
   */
  public function setBalancingMode($balancingMode)
  {
    $this->balancingMode = $balancingMode;
  }
  /**
   * @return string
   */
  public function getBalancingMode()
  {
    return $this->balancingMode;
  }
  /**
   * @param float
   */
  public function setCapacityScaler($capacityScaler)
  {
    $this->capacityScaler = $capacityScaler;
  }
  /**
   * @return float
   */
  public function getCapacityScaler()
  {
    return $this->capacityScaler;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setFailover($failover)
  {
    $this->failover = $failover;
  }
  /**
   * @return bool
   */
  public function getFailover()
  {
    return $this->failover;
  }
  /**
   * @param string
   */
  public function setGroup($group)
  {
    $this->group = $group;
  }
  /**
   * @return string
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param int
   */
  public function setMaxConnections($maxConnections)
  {
    $this->maxConnections = $maxConnections;
  }
  /**
   * @return int
   */
  public function getMaxConnections()
  {
    return $this->maxConnections;
  }
  /**
   * @param int
   */
  public function setMaxConnectionsPerEndpoint($maxConnectionsPerEndpoint)
  {
    $this->maxConnectionsPerEndpoint = $maxConnectionsPerEndpoint;
  }
  /**
   * @return int
   */
  public function getMaxConnectionsPerEndpoint()
  {
    return $this->maxConnectionsPerEndpoint;
  }
  /**
   * @param int
   */
  public function setMaxConnectionsPerInstance($maxConnectionsPerInstance)
  {
    $this->maxConnectionsPerInstance = $maxConnectionsPerInstance;
  }
  /**
   * @return int
   */
  public function getMaxConnectionsPerInstance()
  {
    return $this->maxConnectionsPerInstance;
  }
  /**
   * @param int
   */
  public function setMaxRate($maxRate)
  {
    $this->maxRate = $maxRate;
  }
  /**
   * @return int
   */
  public function getMaxRate()
  {
    return $this->maxRate;
  }
  /**
   * @param float
   */
  public function setMaxRatePerEndpoint($maxRatePerEndpoint)
  {
    $this->maxRatePerEndpoint = $maxRatePerEndpoint;
  }
  /**
   * @return float
   */
  public function getMaxRatePerEndpoint()
  {
    return $this->maxRatePerEndpoint;
  }
  /**
   * @param float
   */
  public function setMaxRatePerInstance($maxRatePerInstance)
  {
    $this->maxRatePerInstance = $maxRatePerInstance;
  }
  /**
   * @return float
   */
  public function getMaxRatePerInstance()
  {
    return $this->maxRatePerInstance;
  }
  /**
   * @param float
   */
  public function setMaxUtilization($maxUtilization)
  {
    $this->maxUtilization = $maxUtilization;
  }
  /**
   * @return float
   */
  public function getMaxUtilization()
  {
    return $this->maxUtilization;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Backend::class, 'Google_Service_Compute_Backend');
