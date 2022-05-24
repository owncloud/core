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

class NetworkConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $datapathProvider;
  protected $defaultSnatStatusType = DefaultSnatStatus::class;
  protected $defaultSnatStatusDataType = '';
  protected $dnsConfigType = DNSConfig::class;
  protected $dnsConfigDataType = '';
  /**
   * @var bool
   */
  public $enableIntraNodeVisibility;
  /**
   * @var bool
   */
  public $enableL4ilbSubsetting;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $privateIpv6GoogleAccess;
  protected $serviceExternalIpsConfigType = ServiceExternalIPsConfig::class;
  protected $serviceExternalIpsConfigDataType = '';
  /**
   * @var string
   */
  public $subnetwork;

  /**
   * @param string
   */
  public function setDatapathProvider($datapathProvider)
  {
    $this->datapathProvider = $datapathProvider;
  }
  /**
   * @return string
   */
  public function getDatapathProvider()
  {
    return $this->datapathProvider;
  }
  /**
   * @param DefaultSnatStatus
   */
  public function setDefaultSnatStatus(DefaultSnatStatus $defaultSnatStatus)
  {
    $this->defaultSnatStatus = $defaultSnatStatus;
  }
  /**
   * @return DefaultSnatStatus
   */
  public function getDefaultSnatStatus()
  {
    return $this->defaultSnatStatus;
  }
  /**
   * @param DNSConfig
   */
  public function setDnsConfig(DNSConfig $dnsConfig)
  {
    $this->dnsConfig = $dnsConfig;
  }
  /**
   * @return DNSConfig
   */
  public function getDnsConfig()
  {
    return $this->dnsConfig;
  }
  /**
   * @param bool
   */
  public function setEnableIntraNodeVisibility($enableIntraNodeVisibility)
  {
    $this->enableIntraNodeVisibility = $enableIntraNodeVisibility;
  }
  /**
   * @return bool
   */
  public function getEnableIntraNodeVisibility()
  {
    return $this->enableIntraNodeVisibility;
  }
  /**
   * @param bool
   */
  public function setEnableL4ilbSubsetting($enableL4ilbSubsetting)
  {
    $this->enableL4ilbSubsetting = $enableL4ilbSubsetting;
  }
  /**
   * @return bool
   */
  public function getEnableL4ilbSubsetting()
  {
    return $this->enableL4ilbSubsetting;
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
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  /**
   * @return string
   */
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  /**
   * @param ServiceExternalIPsConfig
   */
  public function setServiceExternalIpsConfig(ServiceExternalIPsConfig $serviceExternalIpsConfig)
  {
    $this->serviceExternalIpsConfig = $serviceExternalIpsConfig;
  }
  /**
   * @return ServiceExternalIPsConfig
   */
  public function getServiceExternalIpsConfig()
  {
    return $this->serviceExternalIpsConfig;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkConfig::class, 'Google_Service_Container_NetworkConfig');
