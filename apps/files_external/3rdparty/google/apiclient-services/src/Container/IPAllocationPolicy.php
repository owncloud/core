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

class IPAllocationPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterIpv4Cidr;
  /**
   * @var string
   */
  public $clusterIpv4CidrBlock;
  /**
   * @var string
   */
  public $clusterSecondaryRangeName;
  /**
   * @var bool
   */
  public $createSubnetwork;
  /**
   * @var string
   */
  public $nodeIpv4Cidr;
  /**
   * @var string
   */
  public $nodeIpv4CidrBlock;
  /**
   * @var string
   */
  public $servicesIpv4Cidr;
  /**
   * @var string
   */
  public $servicesIpv4CidrBlock;
  /**
   * @var string
   */
  public $servicesSecondaryRangeName;
  /**
   * @var string
   */
  public $subnetworkName;
  /**
   * @var string
   */
  public $tpuIpv4CidrBlock;
  /**
   * @var bool
   */
  public $useIpAliases;
  /**
   * @var bool
   */
  public $useRoutes;

  /**
   * @param string
   */
  public function setClusterIpv4Cidr($clusterIpv4Cidr)
  {
    $this->clusterIpv4Cidr = $clusterIpv4Cidr;
  }
  /**
   * @return string
   */
  public function getClusterIpv4Cidr()
  {
    return $this->clusterIpv4Cidr;
  }
  /**
   * @param string
   */
  public function setClusterIpv4CidrBlock($clusterIpv4CidrBlock)
  {
    $this->clusterIpv4CidrBlock = $clusterIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getClusterIpv4CidrBlock()
  {
    return $this->clusterIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setClusterSecondaryRangeName($clusterSecondaryRangeName)
  {
    $this->clusterSecondaryRangeName = $clusterSecondaryRangeName;
  }
  /**
   * @return string
   */
  public function getClusterSecondaryRangeName()
  {
    return $this->clusterSecondaryRangeName;
  }
  /**
   * @param bool
   */
  public function setCreateSubnetwork($createSubnetwork)
  {
    $this->createSubnetwork = $createSubnetwork;
  }
  /**
   * @return bool
   */
  public function getCreateSubnetwork()
  {
    return $this->createSubnetwork;
  }
  /**
   * @param string
   */
  public function setNodeIpv4Cidr($nodeIpv4Cidr)
  {
    $this->nodeIpv4Cidr = $nodeIpv4Cidr;
  }
  /**
   * @return string
   */
  public function getNodeIpv4Cidr()
  {
    return $this->nodeIpv4Cidr;
  }
  /**
   * @param string
   */
  public function setNodeIpv4CidrBlock($nodeIpv4CidrBlock)
  {
    $this->nodeIpv4CidrBlock = $nodeIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getNodeIpv4CidrBlock()
  {
    return $this->nodeIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setServicesIpv4Cidr($servicesIpv4Cidr)
  {
    $this->servicesIpv4Cidr = $servicesIpv4Cidr;
  }
  /**
   * @return string
   */
  public function getServicesIpv4Cidr()
  {
    return $this->servicesIpv4Cidr;
  }
  /**
   * @param string
   */
  public function setServicesIpv4CidrBlock($servicesIpv4CidrBlock)
  {
    $this->servicesIpv4CidrBlock = $servicesIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getServicesIpv4CidrBlock()
  {
    return $this->servicesIpv4CidrBlock;
  }
  /**
   * @param string
   */
  public function setServicesSecondaryRangeName($servicesSecondaryRangeName)
  {
    $this->servicesSecondaryRangeName = $servicesSecondaryRangeName;
  }
  /**
   * @return string
   */
  public function getServicesSecondaryRangeName()
  {
    return $this->servicesSecondaryRangeName;
  }
  /**
   * @param string
   */
  public function setSubnetworkName($subnetworkName)
  {
    $this->subnetworkName = $subnetworkName;
  }
  /**
   * @return string
   */
  public function getSubnetworkName()
  {
    return $this->subnetworkName;
  }
  /**
   * @param string
   */
  public function setTpuIpv4CidrBlock($tpuIpv4CidrBlock)
  {
    $this->tpuIpv4CidrBlock = $tpuIpv4CidrBlock;
  }
  /**
   * @return string
   */
  public function getTpuIpv4CidrBlock()
  {
    return $this->tpuIpv4CidrBlock;
  }
  /**
   * @param bool
   */
  public function setUseIpAliases($useIpAliases)
  {
    $this->useIpAliases = $useIpAliases;
  }
  /**
   * @return bool
   */
  public function getUseIpAliases()
  {
    return $this->useIpAliases;
  }
  /**
   * @param bool
   */
  public function setUseRoutes($useRoutes)
  {
    $this->useRoutes = $useRoutes;
  }
  /**
   * @return bool
   */
  public function getUseRoutes()
  {
    return $this->useRoutes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IPAllocationPolicy::class, 'Google_Service_Container_IPAllocationPolicy');
