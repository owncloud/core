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

class RouterNat extends \Google\Collection
{
  protected $collection_key = 'subnetworks';
  /**
   * @var string[]
   */
  public $drainNatIps;
  /**
   * @var bool
   */
  public $enableDynamicPortAllocation;
  /**
   * @var bool
   */
  public $enableEndpointIndependentMapping;
  /**
   * @var int
   */
  public $icmpIdleTimeoutSec;
  protected $logConfigType = RouterNatLogConfig::class;
  protected $logConfigDataType = '';
  /**
   * @var int
   */
  public $maxPortsPerVm;
  /**
   * @var int
   */
  public $minPortsPerVm;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $natIpAllocateOption;
  /**
   * @var string[]
   */
  public $natIps;
  protected $rulesType = RouterNatRule::class;
  protected $rulesDataType = 'array';
  /**
   * @var string
   */
  public $sourceSubnetworkIpRangesToNat;
  protected $subnetworksType = RouterNatSubnetworkToNat::class;
  protected $subnetworksDataType = 'array';
  /**
   * @var int
   */
  public $tcpEstablishedIdleTimeoutSec;
  /**
   * @var int
   */
  public $tcpTimeWaitTimeoutSec;
  /**
   * @var int
   */
  public $tcpTransitoryIdleTimeoutSec;
  /**
   * @var int
   */
  public $udpIdleTimeoutSec;

  /**
   * @param string[]
   */
  public function setDrainNatIps($drainNatIps)
  {
    $this->drainNatIps = $drainNatIps;
  }
  /**
   * @return string[]
   */
  public function getDrainNatIps()
  {
    return $this->drainNatIps;
  }
  /**
   * @param bool
   */
  public function setEnableDynamicPortAllocation($enableDynamicPortAllocation)
  {
    $this->enableDynamicPortAllocation = $enableDynamicPortAllocation;
  }
  /**
   * @return bool
   */
  public function getEnableDynamicPortAllocation()
  {
    return $this->enableDynamicPortAllocation;
  }
  /**
   * @param bool
   */
  public function setEnableEndpointIndependentMapping($enableEndpointIndependentMapping)
  {
    $this->enableEndpointIndependentMapping = $enableEndpointIndependentMapping;
  }
  /**
   * @return bool
   */
  public function getEnableEndpointIndependentMapping()
  {
    return $this->enableEndpointIndependentMapping;
  }
  /**
   * @param int
   */
  public function setIcmpIdleTimeoutSec($icmpIdleTimeoutSec)
  {
    $this->icmpIdleTimeoutSec = $icmpIdleTimeoutSec;
  }
  /**
   * @return int
   */
  public function getIcmpIdleTimeoutSec()
  {
    return $this->icmpIdleTimeoutSec;
  }
  /**
   * @param RouterNatLogConfig
   */
  public function setLogConfig(RouterNatLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return RouterNatLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
  }
  /**
   * @param int
   */
  public function setMaxPortsPerVm($maxPortsPerVm)
  {
    $this->maxPortsPerVm = $maxPortsPerVm;
  }
  /**
   * @return int
   */
  public function getMaxPortsPerVm()
  {
    return $this->maxPortsPerVm;
  }
  /**
   * @param int
   */
  public function setMinPortsPerVm($minPortsPerVm)
  {
    $this->minPortsPerVm = $minPortsPerVm;
  }
  /**
   * @return int
   */
  public function getMinPortsPerVm()
  {
    return $this->minPortsPerVm;
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
  public function setNatIpAllocateOption($natIpAllocateOption)
  {
    $this->natIpAllocateOption = $natIpAllocateOption;
  }
  /**
   * @return string
   */
  public function getNatIpAllocateOption()
  {
    return $this->natIpAllocateOption;
  }
  /**
   * @param string[]
   */
  public function setNatIps($natIps)
  {
    $this->natIps = $natIps;
  }
  /**
   * @return string[]
   */
  public function getNatIps()
  {
    return $this->natIps;
  }
  /**
   * @param RouterNatRule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return RouterNatRule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
  /**
   * @param string
   */
  public function setSourceSubnetworkIpRangesToNat($sourceSubnetworkIpRangesToNat)
  {
    $this->sourceSubnetworkIpRangesToNat = $sourceSubnetworkIpRangesToNat;
  }
  /**
   * @return string
   */
  public function getSourceSubnetworkIpRangesToNat()
  {
    return $this->sourceSubnetworkIpRangesToNat;
  }
  /**
   * @param RouterNatSubnetworkToNat[]
   */
  public function setSubnetworks($subnetworks)
  {
    $this->subnetworks = $subnetworks;
  }
  /**
   * @return RouterNatSubnetworkToNat[]
   */
  public function getSubnetworks()
  {
    return $this->subnetworks;
  }
  /**
   * @param int
   */
  public function setTcpEstablishedIdleTimeoutSec($tcpEstablishedIdleTimeoutSec)
  {
    $this->tcpEstablishedIdleTimeoutSec = $tcpEstablishedIdleTimeoutSec;
  }
  /**
   * @return int
   */
  public function getTcpEstablishedIdleTimeoutSec()
  {
    return $this->tcpEstablishedIdleTimeoutSec;
  }
  /**
   * @param int
   */
  public function setTcpTimeWaitTimeoutSec($tcpTimeWaitTimeoutSec)
  {
    $this->tcpTimeWaitTimeoutSec = $tcpTimeWaitTimeoutSec;
  }
  /**
   * @return int
   */
  public function getTcpTimeWaitTimeoutSec()
  {
    return $this->tcpTimeWaitTimeoutSec;
  }
  /**
   * @param int
   */
  public function setTcpTransitoryIdleTimeoutSec($tcpTransitoryIdleTimeoutSec)
  {
    $this->tcpTransitoryIdleTimeoutSec = $tcpTransitoryIdleTimeoutSec;
  }
  /**
   * @return int
   */
  public function getTcpTransitoryIdleTimeoutSec()
  {
    return $this->tcpTransitoryIdleTimeoutSec;
  }
  /**
   * @param int
   */
  public function setUdpIdleTimeoutSec($udpIdleTimeoutSec)
  {
    $this->udpIdleTimeoutSec = $udpIdleTimeoutSec;
  }
  /**
   * @return int
   */
  public function getUdpIdleTimeoutSec()
  {
    return $this->udpIdleTimeoutSec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterNat::class, 'Google_Service_Compute_RouterNat');
