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

class PrivateEnvironmentConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $cloudComposerConnectionSubnetwork;
  /**
   * @var string
   */
  public $cloudComposerNetworkIpv4CidrBlock;
  /**
   * @var string
   */
  public $cloudComposerNetworkIpv4ReservedRange;
  /**
   * @var string
   */
  public $cloudSqlIpv4CidrBlock;
  /**
   * @var bool
   */
  public $enablePrivateEnvironment;
  /**
   * @var bool
   */
  public $enablePrivatelyUsedPublicIps;
  protected $privateClusterConfigType = PrivateClusterConfig::class;
  protected $privateClusterConfigDataType = '';
  /**
   * @var string
   */
  public $webServerIpv4CidrBlock;
  /**
   * @var string
   */
  public $webServerIpv4ReservedRange;

  /**
   * @param string
   */
  public function setCloudComposerConnectionSubnetwork($cloudComposerConnectionSubnetwork)
  {
    $this->cloudComposerConnectionSubnetwork = $cloudComposerConnectionSubnetwork;
  }
  /**
   * @return string
   */
  public function getCloudComposerConnectionSubnetwork()
  {
    return $this->cloudComposerConnectionSubnetwork;
  }
  /**
   * @param string
   */
  public function setCloudComposerNetworkIpv4CidrBlock($cloudComposerNetworkIpv4CidrBlock)
  {
    $this->cloudComposerNetworkIpv4CidrBlock = $cloudComposerNetworkIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getCloudComposerNetworkIpv4CidrBlock()
  {
    return $this->cloudComposerNetworkIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setCloudComposerNetworkIpv4ReservedRange($cloudComposerNetworkIpv4ReservedRange)
  {
    $this->cloudComposerNetworkIpv4ReservedRange = $cloudComposerNetworkIpv4ReservedRange;
  }
  /**
   * @return string
   */
  public function getCloudComposerNetworkIpv4ReservedRange()
  {
    return $this->cloudComposerNetworkIpv4ReservedRange;
  }
  /**
   * @param string
   */
  public function setCloudSqlIpv4CidrBlock($cloudSqlIpv4CidrBlock)
  {
    $this->cloudSqlIpv4CidrBlock = $cloudSqlIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getCloudSqlIpv4CidrBlock()
  {
    return $this->cloudSqlIpv4CidrBlock;
  }
  /**
   * @param bool
   */
  public function setEnablePrivateEnvironment($enablePrivateEnvironment)
  {
    $this->enablePrivateEnvironment = $enablePrivateEnvironment;
  }
  /**
   * @return bool
   */
  public function getEnablePrivateEnvironment()
  {
    return $this->enablePrivateEnvironment;
  }
  /**
   * @param bool
   */
  public function setEnablePrivatelyUsedPublicIps($enablePrivatelyUsedPublicIps)
  {
    $this->enablePrivatelyUsedPublicIps = $enablePrivatelyUsedPublicIps;
  }
  /**
   * @return bool
   */
  public function getEnablePrivatelyUsedPublicIps()
  {
    return $this->enablePrivatelyUsedPublicIps;
  }
  /**
   * @param PrivateClusterConfig
   */
  public function setPrivateClusterConfig(PrivateClusterConfig $privateClusterConfig)
  {
    $this->privateClusterConfig = $privateClusterConfig;
  }
  /**
   * @return PrivateClusterConfig
   */
  public function getPrivateClusterConfig()
  {
    return $this->privateClusterConfig;
  }
  /**
   * @param string
   */
  public function setWebServerIpv4CidrBlock($webServerIpv4CidrBlock)
  {
    $this->webServerIpv4CidrBlock = $webServerIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getWebServerIpv4CidrBlock()
  {
    return $this->webServerIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setWebServerIpv4ReservedRange($webServerIpv4ReservedRange)
  {
    $this->webServerIpv4ReservedRange = $webServerIpv4ReservedRange;
  }
  /**
   * @return string
   */
  public function getWebServerIpv4ReservedRange()
  {
    return $this->webServerIpv4ReservedRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrivateEnvironmentConfig::class, 'Google_Service_CloudComposer_PrivateEnvironmentConfig');
