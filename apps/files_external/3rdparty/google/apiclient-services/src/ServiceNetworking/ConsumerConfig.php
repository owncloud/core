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

namespace Google\Service\ServiceNetworking;

class ConsumerConfig extends \Google\Collection
{
  protected $collection_key = 'usedIpRanges';
  /**
   * @var bool
   */
  public $consumerExportCustomRoutes;
  /**
   * @var bool
   */
  public $consumerExportSubnetRoutesWithPublicIp;
  /**
   * @var bool
   */
  public $consumerImportCustomRoutes;
  /**
   * @var bool
   */
  public $consumerImportSubnetRoutesWithPublicIp;
  /**
   * @var bool
   */
  public $producerExportCustomRoutes;
  /**
   * @var bool
   */
  public $producerExportSubnetRoutesWithPublicIp;
  /**
   * @var bool
   */
  public $producerImportCustomRoutes;
  /**
   * @var bool
   */
  public $producerImportSubnetRoutesWithPublicIp;
  /**
   * @var string
   */
  public $producerNetwork;
  protected $reservedRangesType = GoogleCloudServicenetworkingV1ConsumerConfigReservedRange::class;
  protected $reservedRangesDataType = 'array';
  /**
   * @var string[]
   */
  public $usedIpRanges;
  /**
   * @var bool
   */
  public $vpcScReferenceArchitectureEnabled;

  /**
   * @param bool
   */
  public function setConsumerExportCustomRoutes($consumerExportCustomRoutes)
  {
    $this->consumerExportCustomRoutes = $consumerExportCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getConsumerExportCustomRoutes()
  {
    return $this->consumerExportCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setConsumerExportSubnetRoutesWithPublicIp($consumerExportSubnetRoutesWithPublicIp)
  {
    $this->consumerExportSubnetRoutesWithPublicIp = $consumerExportSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getConsumerExportSubnetRoutesWithPublicIp()
  {
    return $this->consumerExportSubnetRoutesWithPublicIp;
  }
  /**
   * @param bool
   */
  public function setConsumerImportCustomRoutes($consumerImportCustomRoutes)
  {
    $this->consumerImportCustomRoutes = $consumerImportCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getConsumerImportCustomRoutes()
  {
    return $this->consumerImportCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setConsumerImportSubnetRoutesWithPublicIp($consumerImportSubnetRoutesWithPublicIp)
  {
    $this->consumerImportSubnetRoutesWithPublicIp = $consumerImportSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getConsumerImportSubnetRoutesWithPublicIp()
  {
    return $this->consumerImportSubnetRoutesWithPublicIp;
  }
  /**
   * @param bool
   */
  public function setProducerExportCustomRoutes($producerExportCustomRoutes)
  {
    $this->producerExportCustomRoutes = $producerExportCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getProducerExportCustomRoutes()
  {
    return $this->producerExportCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setProducerExportSubnetRoutesWithPublicIp($producerExportSubnetRoutesWithPublicIp)
  {
    $this->producerExportSubnetRoutesWithPublicIp = $producerExportSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getProducerExportSubnetRoutesWithPublicIp()
  {
    return $this->producerExportSubnetRoutesWithPublicIp;
  }
  /**
   * @param bool
   */
  public function setProducerImportCustomRoutes($producerImportCustomRoutes)
  {
    $this->producerImportCustomRoutes = $producerImportCustomRoutes;
  }
  /**
   * @return bool
   */
  public function getProducerImportCustomRoutes()
  {
    return $this->producerImportCustomRoutes;
  }
  /**
   * @param bool
   */
  public function setProducerImportSubnetRoutesWithPublicIp($producerImportSubnetRoutesWithPublicIp)
  {
    $this->producerImportSubnetRoutesWithPublicIp = $producerImportSubnetRoutesWithPublicIp;
  }
  /**
   * @return bool
   */
  public function getProducerImportSubnetRoutesWithPublicIp()
  {
    return $this->producerImportSubnetRoutesWithPublicIp;
  }
  /**
   * @param string
   */
  public function setProducerNetwork($producerNetwork)
  {
    $this->producerNetwork = $producerNetwork;
  }
  /**
   * @return string
   */
  public function getProducerNetwork()
  {
    return $this->producerNetwork;
  }
  /**
   * @param GoogleCloudServicenetworkingV1ConsumerConfigReservedRange[]
   */
  public function setReservedRanges($reservedRanges)
  {
    $this->reservedRanges = $reservedRanges;
  }
  /**
   * @return GoogleCloudServicenetworkingV1ConsumerConfigReservedRange[]
   */
  public function getReservedRanges()
  {
    return $this->reservedRanges;
  }
  /**
   * @param string[]
   */
  public function setUsedIpRanges($usedIpRanges)
  {
    $this->usedIpRanges = $usedIpRanges;
  }
  /**
   * @return string[]
   */
  public function getUsedIpRanges()
  {
    return $this->usedIpRanges;
  }
  /**
   * @param bool
   */
  public function setVpcScReferenceArchitectureEnabled($vpcScReferenceArchitectureEnabled)
  {
    $this->vpcScReferenceArchitectureEnabled = $vpcScReferenceArchitectureEnabled;
  }
  /**
   * @return bool
   */
  public function getVpcScReferenceArchitectureEnabled()
  {
    return $this->vpcScReferenceArchitectureEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConsumerConfig::class, 'Google_Service_ServiceNetworking_ConsumerConfig');
