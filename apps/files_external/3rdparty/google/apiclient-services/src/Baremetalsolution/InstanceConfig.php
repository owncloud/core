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

namespace Google\Service\Baremetalsolution;

class InstanceConfig extends \Google\Collection
{
  protected $collection_key = 'logicalInterfaces';
  /**
   * @var bool
   */
  public $accountNetworksEnabled;
  protected $clientNetworkType = NetworkAddress::class;
  protected $clientNetworkDataType = '';
  /**
   * @var bool
   */
  public $hyperthreading;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $instanceType;
  protected $logicalInterfacesType = GoogleCloudBaremetalsolutionV2LogicalInterface::class;
  protected $logicalInterfacesDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $networkConfig;
  /**
   * @var string
   */
  public $networkTemplate;
  /**
   * @var string
   */
  public $osImage;
  protected $privateNetworkType = NetworkAddress::class;
  protected $privateNetworkDataType = '';
  /**
   * @var string
   */
  public $userNote;

  /**
   * @param bool
   */
  public function setAccountNetworksEnabled($accountNetworksEnabled)
  {
    $this->accountNetworksEnabled = $accountNetworksEnabled;
  }
  /**
   * @return bool
   */
  public function getAccountNetworksEnabled()
  {
    return $this->accountNetworksEnabled;
  }
  /**
   * @param NetworkAddress
   */
  public function setClientNetwork(NetworkAddress $clientNetwork)
  {
    $this->clientNetwork = $clientNetwork;
  }
  /**
   * @return NetworkAddress
   */
  public function getClientNetwork()
  {
    return $this->clientNetwork;
  }
  /**
   * @param bool
   */
  public function setHyperthreading($hyperthreading)
  {
    $this->hyperthreading = $hyperthreading;
  }
  /**
   * @return bool
   */
  public function getHyperthreading()
  {
    return $this->hyperthreading;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInstanceType($instanceType)
  {
    $this->instanceType = $instanceType;
  }
  /**
   * @return string
   */
  public function getInstanceType()
  {
    return $this->instanceType;
  }
  /**
   * @param GoogleCloudBaremetalsolutionV2LogicalInterface[]
   */
  public function setLogicalInterfaces($logicalInterfaces)
  {
    $this->logicalInterfaces = $logicalInterfaces;
  }
  /**
   * @return GoogleCloudBaremetalsolutionV2LogicalInterface[]
   */
  public function getLogicalInterfaces()
  {
    return $this->logicalInterfaces;
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
  public function setNetworkConfig($networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return string
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  /**
   * @param string
   */
  public function setNetworkTemplate($networkTemplate)
  {
    $this->networkTemplate = $networkTemplate;
  }
  /**
   * @return string
   */
  public function getNetworkTemplate()
  {
    return $this->networkTemplate;
  }
  /**
   * @param string
   */
  public function setOsImage($osImage)
  {
    $this->osImage = $osImage;
  }
  /**
   * @return string
   */
  public function getOsImage()
  {
    return $this->osImage;
  }
  /**
   * @param NetworkAddress
   */
  public function setPrivateNetwork(NetworkAddress $privateNetwork)
  {
    $this->privateNetwork = $privateNetwork;
  }
  /**
   * @return NetworkAddress
   */
  public function getPrivateNetwork()
  {
    return $this->privateNetwork;
  }
  /**
   * @param string
   */
  public function setUserNote($userNote)
  {
    $this->userNote = $userNote;
  }
  /**
   * @return string
   */
  public function getUserNote()
  {
    return $this->userNote;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceConfig::class, 'Google_Service_Baremetalsolution_InstanceConfig');
