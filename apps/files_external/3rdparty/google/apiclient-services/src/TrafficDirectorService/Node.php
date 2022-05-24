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

namespace Google\Service\TrafficDirectorService;

class Node extends \Google\Collection
{
  protected $collection_key = 'listeningAddresses';
  /**
   * @var string
   */
  public $buildVersion;
  /**
   * @var string[]
   */
  public $clientFeatures;
  /**
   * @var string
   */
  public $cluster;
  protected $extensionsType = Extension::class;
  protected $extensionsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  protected $listeningAddressesType = Address::class;
  protected $listeningAddressesDataType = 'array';
  protected $localityType = Locality::class;
  protected $localityDataType = '';
  /**
   * @var array[]
   */
  public $metadata;
  protected $userAgentBuildVersionType = BuildVersion::class;
  protected $userAgentBuildVersionDataType = '';
  /**
   * @var string
   */
  public $userAgentName;
  /**
   * @var string
   */
  public $userAgentVersion;

  /**
   * @param string
   */
  public function setBuildVersion($buildVersion)
  {
    $this->buildVersion = $buildVersion;
  }
  /**
   * @return string
   */
  public function getBuildVersion()
  {
    return $this->buildVersion;
  }
  /**
   * @param string[]
   */
  public function setClientFeatures($clientFeatures)
  {
    $this->clientFeatures = $clientFeatures;
  }
  /**
   * @return string[]
   */
  public function getClientFeatures()
  {
    return $this->clientFeatures;
  }
  /**
   * @param string
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return string
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param Extension[]
   */
  public function setExtensions($extensions)
  {
    $this->extensions = $extensions;
  }
  /**
   * @return Extension[]
   */
  public function getExtensions()
  {
    return $this->extensions;
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
   * @param Address[]
   */
  public function setListeningAddresses($listeningAddresses)
  {
    $this->listeningAddresses = $listeningAddresses;
  }
  /**
   * @return Address[]
   */
  public function getListeningAddresses()
  {
    return $this->listeningAddresses;
  }
  /**
   * @param Locality
   */
  public function setLocality(Locality $locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return Locality
   */
  public function getLocality()
  {
    return $this->locality;
  }
  /**
   * @param array[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return array[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param BuildVersion
   */
  public function setUserAgentBuildVersion(BuildVersion $userAgentBuildVersion)
  {
    $this->userAgentBuildVersion = $userAgentBuildVersion;
  }
  /**
   * @return BuildVersion
   */
  public function getUserAgentBuildVersion()
  {
    return $this->userAgentBuildVersion;
  }
  /**
   * @param string
   */
  public function setUserAgentName($userAgentName)
  {
    $this->userAgentName = $userAgentName;
  }
  /**
   * @return string
   */
  public function getUserAgentName()
  {
    return $this->userAgentName;
  }
  /**
   * @param string
   */
  public function setUserAgentVersion($userAgentVersion)
  {
    $this->userAgentVersion = $userAgentVersion;
  }
  /**
   * @return string
   */
  public function getUserAgentVersion()
  {
    return $this->userAgentVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Node::class, 'Google_Service_TrafficDirectorService_Node');
