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

class Google_Service_Compute_Backend extends Google_Model
{
  public $balancingMode;
  public $capacityScaler;
  public $description;
  public $failover;
  public $group;
  public $maxConnections;
  public $maxConnectionsPerEndpoint;
  public $maxConnectionsPerInstance;
  public $maxRate;
  public $maxRatePerEndpoint;
  public $maxRatePerInstance;
  public $maxUtilization;

  public function setBalancingMode($balancingMode)
  {
    $this->balancingMode = $balancingMode;
  }
  public function getBalancingMode()
  {
    return $this->balancingMode;
  }
  public function setCapacityScaler($capacityScaler)
  {
    $this->capacityScaler = $capacityScaler;
  }
  public function getCapacityScaler()
  {
    return $this->capacityScaler;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFailover($failover)
  {
    $this->failover = $failover;
  }
  public function getFailover()
  {
    return $this->failover;
  }
  public function setGroup($group)
  {
    $this->group = $group;
  }
  public function getGroup()
  {
    return $this->group;
  }
  public function setMaxConnections($maxConnections)
  {
    $this->maxConnections = $maxConnections;
  }
  public function getMaxConnections()
  {
    return $this->maxConnections;
  }
  public function setMaxConnectionsPerEndpoint($maxConnectionsPerEndpoint)
  {
    $this->maxConnectionsPerEndpoint = $maxConnectionsPerEndpoint;
  }
  public function getMaxConnectionsPerEndpoint()
  {
    return $this->maxConnectionsPerEndpoint;
  }
  public function setMaxConnectionsPerInstance($maxConnectionsPerInstance)
  {
    $this->maxConnectionsPerInstance = $maxConnectionsPerInstance;
  }
  public function getMaxConnectionsPerInstance()
  {
    return $this->maxConnectionsPerInstance;
  }
  public function setMaxRate($maxRate)
  {
    $this->maxRate = $maxRate;
  }
  public function getMaxRate()
  {
    return $this->maxRate;
  }
  public function setMaxRatePerEndpoint($maxRatePerEndpoint)
  {
    $this->maxRatePerEndpoint = $maxRatePerEndpoint;
  }
  public function getMaxRatePerEndpoint()
  {
    return $this->maxRatePerEndpoint;
  }
  public function setMaxRatePerInstance($maxRatePerInstance)
  {
    $this->maxRatePerInstance = $maxRatePerInstance;
  }
  public function getMaxRatePerInstance()
  {
    return $this->maxRatePerInstance;
  }
  public function setMaxUtilization($maxUtilization)
  {
    $this->maxUtilization = $maxUtilization;
  }
  public function getMaxUtilization()
  {
    return $this->maxUtilization;
  }
}
