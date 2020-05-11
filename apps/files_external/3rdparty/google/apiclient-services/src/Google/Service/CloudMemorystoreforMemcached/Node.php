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

class Google_Service_CloudMemorystoreforMemcached_Node extends Google_Model
{
  public $host;
  public $nodeId;
  protected $parametersType = 'Google_Service_CloudMemorystoreforMemcached_MemcacheParameters';
  protected $parametersDataType = '';
  public $port;
  public $state;
  public $zone;

  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setNodeId($nodeId)
  {
    $this->nodeId = $nodeId;
  }
  public function getNodeId()
  {
    return $this->nodeId;
  }
  /**
   * @param Google_Service_CloudMemorystoreforMemcached_MemcacheParameters
   */
  public function setParameters(Google_Service_CloudMemorystoreforMemcached_MemcacheParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_CloudMemorystoreforMemcached_MemcacheParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
