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
  public $buildVersion;
  public $clientFeatures;
  public $cluster;
  protected $extensionsType = Extension::class;
  protected $extensionsDataType = 'array';
  public $id;
  protected $listeningAddressesType = Address::class;
  protected $listeningAddressesDataType = 'array';
  protected $localityType = Locality::class;
  protected $localityDataType = '';
  public $metadata;
  protected $userAgentBuildVersionType = BuildVersion::class;
  protected $userAgentBuildVersionDataType = '';
  public $userAgentName;
  public $userAgentVersion;

  public function setBuildVersion($buildVersion)
  {
    $this->buildVersion = $buildVersion;
  }
  public function getBuildVersion()
  {
    return $this->buildVersion;
  }
  public function setClientFeatures($clientFeatures)
  {
    $this->clientFeatures = $clientFeatures;
  }
  public function getClientFeatures()
  {
    return $this->clientFeatures;
  }
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
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
  public function setUserAgentName($userAgentName)
  {
    $this->userAgentName = $userAgentName;
  }
  public function getUserAgentName()
  {
    return $this->userAgentName;
  }
  public function setUserAgentVersion($userAgentVersion)
  {
    $this->userAgentVersion = $userAgentVersion;
  }
  public function getUserAgentVersion()
  {
    return $this->userAgentVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Node::class, 'Google_Service_TrafficDirectorService_Node');
