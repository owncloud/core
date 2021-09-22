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

namespace Google\Service\NetworkManagement;

class Endpoint extends \Google\Model
{
  public $cloudSqlInstance;
  public $gkeMasterCluster;
  public $instance;
  public $ipAddress;
  public $network;
  public $networkType;
  public $port;
  public $projectId;

  public function setCloudSqlInstance($cloudSqlInstance)
  {
    $this->cloudSqlInstance = $cloudSqlInstance;
  }
  public function getCloudSqlInstance()
  {
    return $this->cloudSqlInstance;
  }
  public function setGkeMasterCluster($gkeMasterCluster)
  {
    $this->gkeMasterCluster = $gkeMasterCluster;
  }
  public function getGkeMasterCluster()
  {
    return $this->gkeMasterCluster;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNetworkType($networkType)
  {
    $this->networkType = $networkType;
  }
  public function getNetworkType()
  {
    return $this->networkType;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Endpoint::class, 'Google_Service_NetworkManagement_Endpoint');
