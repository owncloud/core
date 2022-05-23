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

class ForwardingRule extends \Google\Collection
{
  protected $collection_key = 'serviceDirectoryRegistrations';
  protected $internal_gapi_mappings = [
        "iPAddress" => "IPAddress",
        "iPProtocol" => "IPProtocol",
  ];
  /**
   * @var string
   */
  public $iPAddress;
  /**
   * @var string
   */
  public $iPProtocol;
  /**
   * @var bool
   */
  public $allPorts;
  /**
   * @var bool
   */
  public $allowGlobalAccess;
  /**
   * @var string
   */
  public $backendService;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $ipVersion;
  /**
   * @var bool
   */
  public $isMirroringCollector;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $labelFingerprint;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $loadBalancingScheme;
  protected $metadataFiltersType = MetadataFilter::class;
  protected $metadataFiltersDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $networkTier;
  /**
   * @var bool
   */
  public $noAutomateDnsZone;
  /**
   * @var string
   */
  public $portRange;
  /**
   * @var string[]
   */
  public $ports;
  /**
   * @var string
   */
  public $pscConnectionId;
  /**
   * @var string
   */
  public $pscConnectionStatus;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  protected $serviceDirectoryRegistrationsType = ForwardingRuleServiceDirectoryRegistration::class;
  protected $serviceDirectoryRegistrationsDataType = 'array';
  /**
   * @var string
   */
  public $serviceLabel;
  /**
   * @var string
   */
  public $serviceName;
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string
   */
  public $target;

  /**
   * @param string
   */
  public function setIPAddress($iPAddress)
  {
    $this->iPAddress = $iPAddress;
  }
  /**
   * @return string
   */
  public function getIPAddress()
  {
    return $this->iPAddress;
  }
  /**
   * @param string
   */
  public function setIPProtocol($iPProtocol)
  {
    $this->iPProtocol = $iPProtocol;
  }
  /**
   * @return string
   */
  public function getIPProtocol()
  {
    return $this->iPProtocol;
  }
  /**
   * @param bool
   */
  public function setAllPorts($allPorts)
  {
    $this->allPorts = $allPorts;
  }
  /**
   * @return bool
   */
  public function getAllPorts()
  {
    return $this->allPorts;
  }
  /**
   * @param bool
   */
  public function setAllowGlobalAccess($allowGlobalAccess)
  {
    $this->allowGlobalAccess = $allowGlobalAccess;
  }
  /**
   * @return bool
   */
  public function getAllowGlobalAccess()
  {
    return $this->allowGlobalAccess;
  }
  /**
   * @param string
   */
  public function setBackendService($backendService)
  {
    $this->backendService = $backendService;
  }
  /**
   * @return string
   */
  public function getBackendService()
  {
    return $this->backendService;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
  public function setIpVersion($ipVersion)
  {
    $this->ipVersion = $ipVersion;
  }
  /**
   * @return string
   */
  public function getIpVersion()
  {
    return $this->ipVersion;
  }
  /**
   * @param bool
   */
  public function setIsMirroringCollector($isMirroringCollector)
  {
    $this->isMirroringCollector = $isMirroringCollector;
  }
  /**
   * @return bool
   */
  public function getIsMirroringCollector()
  {
    return $this->isMirroringCollector;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  /**
   * @return string
   */
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLoadBalancingScheme($loadBalancingScheme)
  {
    $this->loadBalancingScheme = $loadBalancingScheme;
  }
  /**
   * @return string
   */
  public function getLoadBalancingScheme()
  {
    return $this->loadBalancingScheme;
  }
  /**
   * @param MetadataFilter[]
   */
  public function setMetadataFilters($metadataFilters)
  {
    $this->metadataFilters = $metadataFilters;
  }
  /**
   * @return MetadataFilter[]
   */
  public function getMetadataFilters()
  {
    return $this->metadataFilters;
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
   * @param string
   */
  public function setNetworkTier($networkTier)
  {
    $this->networkTier = $networkTier;
  }
  /**
   * @return string
   */
  public function getNetworkTier()
  {
    return $this->networkTier;
  }
  /**
   * @param bool
   */
  public function setNoAutomateDnsZone($noAutomateDnsZone)
  {
    $this->noAutomateDnsZone = $noAutomateDnsZone;
  }
  /**
   * @return bool
   */
  public function getNoAutomateDnsZone()
  {
    return $this->noAutomateDnsZone;
  }
  /**
   * @param string
   */
  public function setPortRange($portRange)
  {
    $this->portRange = $portRange;
  }
  /**
   * @return string
   */
  public function getPortRange()
  {
    return $this->portRange;
  }
  /**
   * @param string[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return string[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
  /**
   * @param string
   */
  public function setPscConnectionId($pscConnectionId)
  {
    $this->pscConnectionId = $pscConnectionId;
  }
  /**
   * @return string
   */
  public function getPscConnectionId()
  {
    return $this->pscConnectionId;
  }
  /**
   * @param string
   */
  public function setPscConnectionStatus($pscConnectionStatus)
  {
    $this->pscConnectionStatus = $pscConnectionStatus;
  }
  /**
   * @return string
   */
  public function getPscConnectionStatus()
  {
    return $this->pscConnectionStatus;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param ForwardingRuleServiceDirectoryRegistration[]
   */
  public function setServiceDirectoryRegistrations($serviceDirectoryRegistrations)
  {
    $this->serviceDirectoryRegistrations = $serviceDirectoryRegistrations;
  }
  /**
   * @return ForwardingRuleServiceDirectoryRegistration[]
   */
  public function getServiceDirectoryRegistrations()
  {
    return $this->serviceDirectoryRegistrations;
  }
  /**
   * @param string
   */
  public function setServiceLabel($serviceLabel)
  {
    $this->serviceLabel = $serviceLabel;
  }
  /**
   * @return string
   */
  public function getServiceLabel()
  {
    return $this->serviceLabel;
  }
  /**
   * @param string
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }
  /**
   * @param string
   */
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  /**
   * @return string
   */
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  /**
   * @param string
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ForwardingRule::class, 'Google_Service_Compute_ForwardingRule');
