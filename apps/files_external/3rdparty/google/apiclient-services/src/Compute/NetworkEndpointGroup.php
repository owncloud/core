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

class NetworkEndpointGroup extends \Google\Model
{
  /**
   * @var string[]
   */
  public $annotations;
  protected $appEngineType = NetworkEndpointGroupAppEngine::class;
  protected $appEngineDataType = '';
  protected $cloudFunctionType = NetworkEndpointGroupCloudFunction::class;
  protected $cloudFunctionDataType = '';
  protected $cloudRunType = NetworkEndpointGroupCloudRun::class;
  protected $cloudRunDataType = '';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var int
   */
  public $defaultPort;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $networkEndpointType;
  /**
   * @var string
   */
  public $pscTargetService;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var int
   */
  public $size;
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param NetworkEndpointGroupAppEngine
   */
  public function setAppEngine(NetworkEndpointGroupAppEngine $appEngine)
  {
    $this->appEngine = $appEngine;
  }
  /**
   * @return NetworkEndpointGroupAppEngine
   */
  public function getAppEngine()
  {
    return $this->appEngine;
  }
  /**
   * @param NetworkEndpointGroupCloudFunction
   */
  public function setCloudFunction(NetworkEndpointGroupCloudFunction $cloudFunction)
  {
    $this->cloudFunction = $cloudFunction;
  }
  /**
   * @return NetworkEndpointGroupCloudFunction
   */
  public function getCloudFunction()
  {
    return $this->cloudFunction;
  }
  /**
   * @param NetworkEndpointGroupCloudRun
   */
  public function setCloudRun(NetworkEndpointGroupCloudRun $cloudRun)
  {
    $this->cloudRun = $cloudRun;
  }
  /**
   * @return NetworkEndpointGroupCloudRun
   */
  public function getCloudRun()
  {
    return $this->cloudRun;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param int
   */
  public function setDefaultPort($defaultPort)
  {
    $this->defaultPort = $defaultPort;
  }
  /**
   * @return int
   */
  public function getDefaultPort()
  {
    return $this->defaultPort;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param string
   */
  public function setNetworkEndpointType($networkEndpointType)
  {
    $this->networkEndpointType = $networkEndpointType;
  }
  /**
   * @return string
   */
  public function getNetworkEndpointType()
  {
    return $this->networkEndpointType;
  }
  /**
   * @param string
   */
  public function setPscTargetService($pscTargetService)
  {
    $this->pscTargetService = $pscTargetService;
  }
  /**
   * @return string
   */
  public function getPscTargetService()
  {
    return $this->pscTargetService;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  /**
   * @return string
   */
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkEndpointGroup::class, 'Google_Service_Compute_NetworkEndpointGroup');
