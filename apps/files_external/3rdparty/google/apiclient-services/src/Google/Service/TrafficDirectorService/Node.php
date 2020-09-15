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

class Google_Service_TrafficDirectorService_Node extends Google_Collection
{
  protected $collection_key = 'listeningAddresses';
  public $buildVersion;
  public $clientFeatures;
  public $cluster;
  protected $extensionsType = 'Google_Service_TrafficDirectorService_Extension';
  protected $extensionsDataType = 'array';
  public $id;
  protected $listeningAddressesType = 'Google_Service_TrafficDirectorService_Address';
  protected $listeningAddressesDataType = 'array';
  protected $localityType = 'Google_Service_TrafficDirectorService_Locality';
  protected $localityDataType = '';
  public $metadata;
  protected $userAgentBuildVersionType = 'Google_Service_TrafficDirectorService_BuildVersion';
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
   * @param Google_Service_TrafficDirectorService_Extension
   */
  public function setExtensions($extensions)
  {
    $this->extensions = $extensions;
  }
  /**
   * @return Google_Service_TrafficDirectorService_Extension
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
   * @param Google_Service_TrafficDirectorService_Address
   */
  public function setListeningAddresses($listeningAddresses)
  {
    $this->listeningAddresses = $listeningAddresses;
  }
  /**
   * @return Google_Service_TrafficDirectorService_Address
   */
  public function getListeningAddresses()
  {
    return $this->listeningAddresses;
  }
  /**
   * @param Google_Service_TrafficDirectorService_Locality
   */
  public function setLocality(Google_Service_TrafficDirectorService_Locality $locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return Google_Service_TrafficDirectorService_Locality
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
   * @param Google_Service_TrafficDirectorService_BuildVersion
   */
  public function setUserAgentBuildVersion(Google_Service_TrafficDirectorService_BuildVersion $userAgentBuildVersion)
  {
    $this->userAgentBuildVersion = $userAgentBuildVersion;
  }
  /**
   * @return Google_Service_TrafficDirectorService_BuildVersion
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
