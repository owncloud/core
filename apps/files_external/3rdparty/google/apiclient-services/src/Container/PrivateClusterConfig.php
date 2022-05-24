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

namespace Google\Service\Container;

class PrivateClusterConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $enablePrivateEndpoint;
  /**
   * @var bool
   */
  public $enablePrivateNodes;
  protected $masterGlobalAccessConfigType = PrivateClusterMasterGlobalAccessConfig::class;
  protected $masterGlobalAccessConfigDataType = '';
  /**
   * @var string
   */
  public $masterIpv4CidrBlock;
  /**
   * @var string
   */
  public $peeringName;
  /**
   * @var string
   */
  public $privateEndpoint;
  /**
   * @var string
   */
  public $publicEndpoint;

  /**
   * @param bool
   */
  public function setEnablePrivateEndpoint($enablePrivateEndpoint)
  {
    $this->enablePrivateEndpoint = $enablePrivateEndpoint;
  }
  /**
   * @return bool
   */
  public function getEnablePrivateEndpoint()
  {
    return $this->enablePrivateEndpoint;
  }
  /**
   * @param bool
   */
  public function setEnablePrivateNodes($enablePrivateNodes)
  {
    $this->enablePrivateNodes = $enablePrivateNodes;
  }
  /**
   * @return bool
   */
  public function getEnablePrivateNodes()
  {
    return $this->enablePrivateNodes;
  }
  /**
   * @param PrivateClusterMasterGlobalAccessConfig
   */
  public function setMasterGlobalAccessConfig(PrivateClusterMasterGlobalAccessConfig $masterGlobalAccessConfig)
  {
    $this->masterGlobalAccessConfig = $masterGlobalAccessConfig;
  }
  /**
   * @return PrivateClusterMasterGlobalAccessConfig
   */
  public function getMasterGlobalAccessConfig()
  {
    return $this->masterGlobalAccessConfig;
  }
  /**
   * @param string
   */
  public function setMasterIpv4CidrBlock($masterIpv4CidrBlock)
  {
    $this->masterIpv4CidrBlock = $masterIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getMasterIpv4CidrBlock()
  {
    return $this->masterIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setPeeringName($peeringName)
  {
    $this->peeringName = $peeringName;
  }
  /**
   * @return string
   */
  public function getPeeringName()
  {
    return $this->peeringName;
  }
  /**
   * @param string
   */
  public function setPrivateEndpoint($privateEndpoint)
  {
    $this->privateEndpoint = $privateEndpoint;
  }
  /**
   * @return string
   */
  public function getPrivateEndpoint()
  {
    return $this->privateEndpoint;
  }
  /**
   * @param string
   */
  public function setPublicEndpoint($publicEndpoint)
  {
    $this->publicEndpoint = $publicEndpoint;
  }
  /**
   * @return string
   */
  public function getPublicEndpoint()
  {
    return $this->publicEndpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrivateClusterConfig::class, 'Google_Service_Container_PrivateClusterConfig');
