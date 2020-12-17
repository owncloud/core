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

class Google_Service_ServiceNetworking_ConsumerConfig extends Google_Collection
{
  protected $collection_key = 'reservedRanges';
  public $consumerExportCustomRoutes;
  public $consumerExportSubnetRoutesWithPublicIp;
  public $consumerImportCustomRoutes;
  public $consumerImportSubnetRoutesWithPublicIp;
  public $producerExportCustomRoutes;
  public $producerExportSubnetRoutesWithPublicIp;
  public $producerImportCustomRoutes;
  public $producerImportSubnetRoutesWithPublicIp;
  public $producerNetwork;
  protected $reservedRangesType = 'Google_Service_ServiceNetworking_GoogleCloudServicenetworkingV1ConsumerConfigReservedRange';
  protected $reservedRangesDataType = 'array';

  public function setConsumerExportCustomRoutes($consumerExportCustomRoutes)
  {
    $this->consumerExportCustomRoutes = $consumerExportCustomRoutes;
  }
  public function getConsumerExportCustomRoutes()
  {
    return $this->consumerExportCustomRoutes;
  }
  public function setConsumerExportSubnetRoutesWithPublicIp($consumerExportSubnetRoutesWithPublicIp)
  {
    $this->consumerExportSubnetRoutesWithPublicIp = $consumerExportSubnetRoutesWithPublicIp;
  }
  public function getConsumerExportSubnetRoutesWithPublicIp()
  {
    return $this->consumerExportSubnetRoutesWithPublicIp;
  }
  public function setConsumerImportCustomRoutes($consumerImportCustomRoutes)
  {
    $this->consumerImportCustomRoutes = $consumerImportCustomRoutes;
  }
  public function getConsumerImportCustomRoutes()
  {
    return $this->consumerImportCustomRoutes;
  }
  public function setConsumerImportSubnetRoutesWithPublicIp($consumerImportSubnetRoutesWithPublicIp)
  {
    $this->consumerImportSubnetRoutesWithPublicIp = $consumerImportSubnetRoutesWithPublicIp;
  }
  public function getConsumerImportSubnetRoutesWithPublicIp()
  {
    return $this->consumerImportSubnetRoutesWithPublicIp;
  }
  public function setProducerExportCustomRoutes($producerExportCustomRoutes)
  {
    $this->producerExportCustomRoutes = $producerExportCustomRoutes;
  }
  public function getProducerExportCustomRoutes()
  {
    return $this->producerExportCustomRoutes;
  }
  public function setProducerExportSubnetRoutesWithPublicIp($producerExportSubnetRoutesWithPublicIp)
  {
    $this->producerExportSubnetRoutesWithPublicIp = $producerExportSubnetRoutesWithPublicIp;
  }
  public function getProducerExportSubnetRoutesWithPublicIp()
  {
    return $this->producerExportSubnetRoutesWithPublicIp;
  }
  public function setProducerImportCustomRoutes($producerImportCustomRoutes)
  {
    $this->producerImportCustomRoutes = $producerImportCustomRoutes;
  }
  public function getProducerImportCustomRoutes()
  {
    return $this->producerImportCustomRoutes;
  }
  public function setProducerImportSubnetRoutesWithPublicIp($producerImportSubnetRoutesWithPublicIp)
  {
    $this->producerImportSubnetRoutesWithPublicIp = $producerImportSubnetRoutesWithPublicIp;
  }
  public function getProducerImportSubnetRoutesWithPublicIp()
  {
    return $this->producerImportSubnetRoutesWithPublicIp;
  }
  public function setProducerNetwork($producerNetwork)
  {
    $this->producerNetwork = $producerNetwork;
  }
  public function getProducerNetwork()
  {
    return $this->producerNetwork;
  }
  /**
   * @param Google_Service_ServiceNetworking_GoogleCloudServicenetworkingV1ConsumerConfigReservedRange[]
   */
  public function setReservedRanges($reservedRanges)
  {
    $this->reservedRanges = $reservedRanges;
  }
  /**
   * @return Google_Service_ServiceNetworking_GoogleCloudServicenetworkingV1ConsumerConfigReservedRange[]
   */
  public function getReservedRanges()
  {
    return $this->reservedRanges;
  }
}
