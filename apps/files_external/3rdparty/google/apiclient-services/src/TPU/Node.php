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
  /**
   * @var string
   */
  public $acceleratorType;
  /**
   * @var string
   */
  public $apiVersion;
  /**
   * @var string
   */
  public $cidrBlock;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $health;
  /**
   * @var string
   */
  public $healthDescription;
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  protected $networkEndpointsType = NetworkEndpoint::class;
  protected $networkEndpointsDataType = 'array';
  /**
   * @var string
   */
  public $port;
  protected $schedulingConfigType = SchedulingConfig::class;
  protected $schedulingConfigDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $state;
  protected $symptomsType = Symptom::class;
  protected $symptomsDataType = 'array';
  /**
   * @var string
   */
  public $tensorflowVersion;
  /**
   * @var bool
   */
  public $useServiceNetworking;

  /**
   * @param string
   */
  public function setAcceleratorType($acceleratorType)
  {
    $this->acceleratorType = $acceleratorType;
  }
  /**
   * @return string
   */
  public function getAcceleratorType()
  {
    return $this->acceleratorType;
  }
  /**
   * @param string
   */
  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  /**
   * @return string
   */
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  /**
   * @param string
   */
  public function setCidrBlock($cidrBlock)
  {
    $this->cidrBlock = $cidrBlock;
  }
  /**
   * @return string
   */
  public function getCidrBlock()
  {
    return $this->cidrBlock;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param string
   */
  public function setHealth($health)
  {
    $this->health = $health;
  }
  /**
   * @return string
   */
  public function getHealth()
  {
    return $this->health;
  }
  /**
   * @param string
   */
  public function setHealthDescription($healthDescription)
  {
    $this->healthDescription = $healthDescription;
  }
  /**
   * @return string
   */
  public function getHealthDescription()
  {
    return $this->healthDescription;
  }
  /**
   * @param string
   */
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  /**
   * @return string
   */
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setTensorflowVersion($tensorflowVersion)
  {
    $this->tensorflowVersion = $tensorflowVersion;
  }
  /**
   * @return string
   */
  public function getTensorflowVersion()
  {
    return $this->tensorflowVersion;
  }
  /**
   * @param bool
   */
  public function setUseServiceNetworking($useServiceNetworking)
  {
    $this->useServiceNetworking = $useServiceNetworking;
  }
  /**
   * @return bool
   */
  public function getUseServiceNetworking()
  {
    return $this->useServiceNetworking;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Node::class, 'Google_Service_TPU_Node');
