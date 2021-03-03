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

class Google_Service_Compute_ForwardingRule extends Google_Collection
{
  protected $collection_key = 'serviceDirectoryRegistrations';
  protected $internal_gapi_mappings = array(
        "iPAddress" => "IPAddress",
        "iPProtocol" => "IPProtocol",
  );
  public $iPAddress;
  public $iPProtocol;
  public $allPorts;
  public $allowGlobalAccess;
  public $backendService;
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $id;
  public $ipVersion;
  public $isMirroringCollector;
  public $kind;
  public $labelFingerprint;
  public $labels;
  public $loadBalancingScheme;
  protected $metadataFiltersType = 'Google_Service_Compute_MetadataFilter';
  protected $metadataFiltersDataType = 'array';
  public $name;
  public $network;
  public $networkTier;
  public $portRange;
  public $ports;
  public $pscConnectionId;
  public $region;
  public $selfLink;
  protected $serviceDirectoryRegistrationsType = 'Google_Service_Compute_ForwardingRuleServiceDirectoryRegistration';
  protected $serviceDirectoryRegistrationsDataType = 'array';
  public $serviceLabel;
  public $serviceName;
  public $subnetwork;
  public $target;

  public function setIPAddress($iPAddress)
  {
    $this->iPAddress = $iPAddress;
  }
  public function getIPAddress()
  {
    return $this->iPAddress;
  }
  public function setIPProtocol($iPProtocol)
  {
    $this->iPProtocol = $iPProtocol;
  }
  public function getIPProtocol()
  {
    return $this->iPProtocol;
  }
  public function setAllPorts($allPorts)
  {
    $this->allPorts = $allPorts;
  }
  public function getAllPorts()
  {
    return $this->allPorts;
  }
  public function setAllowGlobalAccess($allowGlobalAccess)
  {
    $this->allowGlobalAccess = $allowGlobalAccess;
  }
  public function getAllowGlobalAccess()
  {
    return $this->allowGlobalAccess;
  }
  public function setBackendService($backendService)
  {
    $this->backendService = $backendService;
  }
  public function getBackendService()
  {
    return $this->backendService;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIpVersion($ipVersion)
  {
    $this->ipVersion = $ipVersion;
  }
  public function getIpVersion()
  {
    return $this->ipVersion;
  }
  public function setIsMirroringCollector($isMirroringCollector)
  {
    $this->isMirroringCollector = $isMirroringCollector;
  }
  public function getIsMirroringCollector()
  {
    return $this->isMirroringCollector;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLoadBalancingScheme($loadBalancingScheme)
  {
    $this->loadBalancingScheme = $loadBalancingScheme;
  }
  public function getLoadBalancingScheme()
  {
    return $this->loadBalancingScheme;
  }
  /**
   * @param Google_Service_Compute_MetadataFilter[]
   */
  public function setMetadataFilters($metadataFilters)
  {
    $this->metadataFilters = $metadataFilters;
  }
  /**
   * @return Google_Service_Compute_MetadataFilter[]
   */
  public function getMetadataFilters()
  {
    return $this->metadataFilters;
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
  public function setNetworkTier($networkTier)
  {
    $this->networkTier = $networkTier;
  }
  public function getNetworkTier()
  {
    return $this->networkTier;
  }
  public function setPortRange($portRange)
  {
    $this->portRange = $portRange;
  }
  public function getPortRange()
  {
    return $this->portRange;
  }
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  public function getPorts()
  {
    return $this->ports;
  }
  public function setPscConnectionId($pscConnectionId)
  {
    $this->pscConnectionId = $pscConnectionId;
  }
  public function getPscConnectionId()
  {
    return $this->pscConnectionId;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_ForwardingRuleServiceDirectoryRegistration[]
   */
  public function setServiceDirectoryRegistrations($serviceDirectoryRegistrations)
  {
    $this->serviceDirectoryRegistrations = $serviceDirectoryRegistrations;
  }
  /**
   * @return Google_Service_Compute_ForwardingRuleServiceDirectoryRegistration[]
   */
  public function getServiceDirectoryRegistrations()
  {
    return $this->serviceDirectoryRegistrations;
  }
  public function setServiceLabel($serviceLabel)
  {
    $this->serviceLabel = $serviceLabel;
  }
  public function getServiceLabel()
  {
    return $this->serviceLabel;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
}
