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

namespace Google\Service\TPU;

class Node extends \Google\Collection
{
  protected $collection_key = 'symptoms';
  public $acceleratorType;
  public $apiVersion;
  public $cidrBlock;
  public $createTime;
  public $description;
  public $health;
  public $healthDescription;
  public $ipAddress;
  public $labels;
  public $name;
  public $network;
  protected $networkEndpointsType = NetworkEndpoint::class;
  protected $networkEndpointsDataType = 'array';
  public $port;
  protected $schedulingConfigType = SchedulingConfig::class;
  protected $schedulingConfigDataType = '';
  public $serviceAccount;
  public $state;
  protected $symptomsType = Symptom::class;
  protected $symptomsDataType = 'array';
  public $tensorflowVersion;
  public $useServiceNetworking;

  public function setAcceleratorType($acceleratorType)
  {
    $this->acceleratorType = $acceleratorType;
  }
  public function getAcceleratorType()
  {
    return $this->acceleratorType;
  }
  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  public function setCidrBlock($cidrBlock)
  {
    $this->cidrBlock = $cidrBlock;
  }
  public function getCidrBlock()
  {
    return $this->cidrBlock;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHealth($health)
  {
    $this->health = $health;
  }
  public function getHealth()
  {
    return $this->health;
  }
  public function setHealthDescription($healthDescription)
  {
    $this->healthDescription = $healthDescription;
  }
  public function getHealthDescription()
  {
    return $this->healthDescription;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param NetworkEndpoint[]
   */
  public function setNetworkEndpoints($networkEndpoints)
  {
    $this->networkEndpoints = $networkEndpoints;
  }
  /**
   * @return NetworkEndpoint[]
   */
  public function getNetworkEndpoints()
  {
    return $this->networkEndpoints;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param SchedulingConfig
   */
  public function setSchedulingConfig(SchedulingConfig $schedulingConfig)
  {
    $this->schedulingConfig = $schedulingConfig;
  }
  /**
   * @return SchedulingConfig
   */
  public function getSchedulingConfig()
  {
    return $this->schedulingConfig;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Symptom[]
   */
  public function setSymptoms($symptoms)
  {
    $this->symptoms = $symptoms;
  }
  /**
   * @return Symptom[]
   */
  public function getSymptoms()
  {
    return $this->symptoms;
  }
  public function setTensorflowVersion($tensorflowVersion)
  {
    $this->tensorflowVersion = $tensorflowVersion;
  }
  public function getTensorflowVersion()
  {
    return $this->tensorflowVersion;
  }
  public function setUseServiceNetworking($useServiceNetworking)
  {
    $this->useServiceNetworking = $useServiceNetworking;
  }
  public function getUseServiceNetworking()
  {
    return $this->useServiceNetworking;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Node::class, 'Google_Service_TPU_Node');
