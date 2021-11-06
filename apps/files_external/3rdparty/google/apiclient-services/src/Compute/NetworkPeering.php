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
  public $autoCreateRoutes;
  public $exchangeSubnetRoutes;
  public $exportCustomRoutes;
  public $exportSubnetRoutesWithPublicIp;
  public $importCustomRoutes;
  public $importSubnetRoutesWithPublicIp;
  public $name;
  public $network;
  public $peerMtu;
  public $state;
  public $stateDetails;

  public function setAutoCreateRoutes($autoCreateRoutes)
  {
    $this->autoCreateRoutes = $autoCreateRoutes;
  }
  public function getAutoCreateRoutes()
  {
    return $this->autoCreateRoutes;
  }
  public function setExchangeSubnetRoutes($exchangeSubnetRoutes)
  {
    $this->exchangeSubnetRoutes = $exchangeSubnetRoutes;
  }
  public function getExchangeSubnetRoutes()
  {
    return $this->exchangeSubnetRoutes;
  }
  public function setExportCustomRoutes($exportCustomRoutes)
  {
    $this->exportCustomRoutes = $exportCustomRoutes;
  }
  public function getExportCustomRoutes()
  {
    return $this->exportCustomRoutes;
  }
  public function setExportSubnetRoutesWithPublicIp($exportSubnetRoutesWithPublicIp)
  {
    $this->exportSubnetRoutesWithPublicIp = $exportSubnetRoutesWithPublicIp;
  }
  public function getExportSubnetRoutesWithPublicIp()
  {
    return $this->exportSubnetRoutesWithPublicIp;
  }
  public function setImportCustomRoutes($importCustomRoutes)
  {
    $this->importCustomRoutes = $importCustomRoutes;
  }
  public function getImportCustomRoutes()
  {
    return $this->importCustomRoutes;
  }
  public function setImportSubnetRoutesWithPublicIp($importSubnetRoutesWithPublicIp)
  {
    $this->importSubnetRoutesWithPublicIp = $importSubnetRoutesWithPublicIp;
  }
  public function getImportSubnetRoutesWithPublicIp()
  {
    return $this->importSubnetRoutesWithPublicIp;
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
  public function setPeerMtu($peerMtu)
  {
    $this->peerMtu = $peerMtu;
  }
  public function getPeerMtu()
  {
    return $this->peerMtu;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateDetails($stateDetails)
  {
    $this->stateDetails = $stateDetails;
  }
  public function getStateDetails()
  {
    return $this->stateDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkPeering::class, 'Google_Service_Compute_NetworkPeering');
