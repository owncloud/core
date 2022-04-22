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

namespace Google\Service\CloudComposer;

class NodeConfig extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var int
   */
  public $diskSizeGb;
  /**
   * @var bool
   */
  public $enableIpMasqAgent;
  protected $ipAllocationPolicyType = IPAllocationPolicy::class;
  protected $ipAllocationPolicyDataType = '';
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string[]
   */
  public $oauthScopes;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string[]
   */
  public $tags;

  /**
   * @param int
   */
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return int
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param bool
   */
  public function setEnableIpMasqAgent($enableIpMasqAgent)
  {
    $this->enableIpMasqAgent = $enableIpMasqAgent;
  }
  /**
   * @return bool
   */
  public function getEnableIpMasqAgent()
  {
    return $this->enableIpMasqAgent;
  }
  /**
   * @param IPAllocationPolicy
   */
  public function setIpAllocationPolicy(IPAllocationPolicy $ipAllocationPolicy)
  {
    $this->ipAllocationPolicy = $ipAllocationPolicy;
  }
  /**
   * @return IPAllocationPolicy
   */
  public function getIpAllocationPolicy()
  {
    return $this->ipAllocationPolicy;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
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
   * @param string[]
   */
  public function setOauthScopes($oauthScopes)
  {
    $this->oauthScopes = $oauthScopes;
  }
  /**
   * @return string[]
   */
  public function getOauthScopes()
  {
    return $this->oauthScopes;
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
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeConfig::class, 'Google_Service_CloudComposer_NodeConfig');
