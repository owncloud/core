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

class NetworkPeering extends \Google\Model
{
  /**
   * @var bool
   */
  public $autoCreateRoutes;
  /**
   * @var bool
   */
  public $exchangeSubnetRoutes;
  /**
   * @var bool
   */
  public $exportCustomRoutes;
  /**
   * @var bool
   */
  public $exportSubnetRoutesWithPublicIp;
  /**
   * @var bool
   */
  public $importCustomRoutes;
  /**
   * @var bool
   */
  public $importSubnetRoutesWithPublicIp;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var int
   */
  public $peerMtu;
  /**
   * @var string
   */
  public $stackType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateDetails;

  /**
   * @param bool
   */
  public function setAutoCreateRoutes($autoCreateRoutes)
  {
    $this->autoCreateRoutes = $autoCreateRoutes;
  }
  /**
   * @return bool
   */
  public function getAutoCreateRoutes()
  {
    return $this->autoCreateRoutes;
  }
  /**
   * @param bool
   */
  public function setExchangeSubnetRoutes($exchangeSubnetRoutes)
  {
    $this->exchangeSubnetRoutes = $exchangeSubnetRoutes;
  }
  /**
   * @return bool
   */
  public function getExchangeSubnetRoutes()
  {
    return $this->exchangeSubnetRoutes;
  }
  /**
   * @param bool
   */
  public function setExportCustomRoutes($exportCustomRoutes)
  {
    $this->exportCustomRoutes = $exportCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getExportCustomRoutes()
  {
    return $this->exportCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setExportSubnetRoutesWithPublicIp($exportSubnetRoutesWithPublicIp)
  {
    $this->exportSubnetRoutesWithPublicIp = $exportSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getExportSubnetRoutesWithPublicIp()
  {
    return $this->exportSubnetRoutesWithPublicIp;
  }
  /**
   * @param bool
   */
  public function setImportCustomRoutes($importCustomRoutes)
  {
    $this->importCustomRoutes = $importCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getImportCustomRoutes()
  {
    return $this->importCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setImportSubnetRoutesWithPublicIp($importSubnetRoutesWithPublicIp)
  {
    $this->importSubnetRoutesWithPublicIp = $importSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getImportSubnetRoutesWithPublicIp()
  {
    return $this->importSubnetRoutesWithPublicIp;
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
   * @param int
   */
  public function setPeerMtu($peerMtu)
  {
    $this->peerMtu = $peerMtu;
  }
  /**
   * @return int
   */
  public function getPeerMtu()
  {
    return $this->peerMtu;
  }
  /**
   * @param string
   */
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  /**
   * @return string
   */
  public function getStackType()
  {
    return $this->stackType;
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
   * @param string
   */
  public function setStateDetails($stateDetails)
  {
    $this->stateDetails = $stateDetails;
  }
  /**
   * @return string
   */
  public function getStateDetails()
  {
    return $this->stateDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkPeering::class, 'Google_Service_Compute_NetworkPeering');
