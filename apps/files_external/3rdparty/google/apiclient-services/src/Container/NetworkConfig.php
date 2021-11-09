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
  public $datapathProvider;
  protected $defaultSnatStatusType = DefaultSnatStatus::class;
  protected $defaultSnatStatusDataType = '';
  protected $dnsConfigType = DNSConfig::class;
  protected $dnsConfigDataType = '';
  public $enableIntraNodeVisibility;
  public $enableL4ilbSubsetting;
  public $network;
  public $privateIpv6GoogleAccess;
  public $subnetwork;

  public function setDatapathProvider($datapathProvider)
  {
    $this->datapathProvider = $datapathProvider;
  }
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
  public function setEnableIntraNodeVisibility($enableIntraNodeVisibility)
  {
    $this->enableIntraNodeVisibility = $enableIntraNodeVisibility;
  }
  public function getEnableIntraNodeVisibility()
  {
    return $this->enableIntraNodeVisibility;
  }
  public function setEnableL4ilbSubsetting($enableL4ilbSubsetting)
  {
    $this->enableL4ilbSubsetting = $enableL4ilbSubsetting;
  }
  public function getEnableL4ilbSubsetting()
  {
    return $this->enableL4ilbSubsetting;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkConfig::class, 'Google_Service_Container_NetworkConfig');
