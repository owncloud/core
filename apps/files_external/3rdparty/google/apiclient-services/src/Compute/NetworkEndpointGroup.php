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
  public $annotations;
  protected $appEngineType = NetworkEndpointGroupAppEngine::class;
  protected $appEngineDataType = '';
  protected $cloudFunctionType = NetworkEndpointGroupCloudFunction::class;
  protected $cloudFunctionDataType = '';
  protected $cloudRunType = NetworkEndpointGroupCloudRun::class;
  protected $cloudRunDataType = '';
  public $creationTimestamp;
  public $defaultPort;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $network;
  public $networkEndpointType;
  public $region;
  public $selfLink;
  public $size;
  public $subnetwork;
  public $zone;

  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
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
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDefaultPort($defaultPort)
  {
    $this->defaultPort = $defaultPort;
  }
  public function getDefaultPort()
  {
    return $this->defaultPort;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
  public function setNetworkEndpointType($networkEndpointType)
  {
    $this->networkEndpointType = $networkEndpointType;
  }
  public function getNetworkEndpointType()
  {
    return $this->networkEndpointType;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkEndpointGroup::class, 'Google_Service_Compute_NetworkEndpointGroup');
