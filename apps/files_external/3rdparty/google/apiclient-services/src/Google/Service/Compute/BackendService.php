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

class Google_Service_Compute_BackendService extends Google_Collection
{
  protected $collection_key = 'healthChecks';
  public $affinityCookieTtlSec;
  protected $backendsType = 'Google_Service_Compute_Backend';
  protected $backendsDataType = 'array';
  protected $cdnPolicyType = 'Google_Service_Compute_BackendServiceCdnPolicy';
  protected $cdnPolicyDataType = '';
  protected $circuitBreakersType = 'Google_Service_Compute_CircuitBreakers';
  protected $circuitBreakersDataType = '';
  protected $connectionDrainingType = 'Google_Service_Compute_ConnectionDraining';
  protected $connectionDrainingDataType = '';
  protected $consistentHashType = 'Google_Service_Compute_ConsistentHashLoadBalancerSettings';
  protected $consistentHashDataType = '';
  public $creationTimestamp;
  public $customRequestHeaders;
  public $description;
  public $enableCDN;
  protected $failoverPolicyType = 'Google_Service_Compute_BackendServiceFailoverPolicy';
  protected $failoverPolicyDataType = '';
  public $fingerprint;
  public $healthChecks;
  protected $iapType = 'Google_Service_Compute_BackendServiceIAP';
  protected $iapDataType = '';
  public $id;
  public $kind;
  public $loadBalancingScheme;
  public $localityLbPolicy;
  protected $logConfigType = 'Google_Service_Compute_BackendServiceLogConfig';
  protected $logConfigDataType = '';
  public $name;
  public $network;
  protected $outlierDetectionType = 'Google_Service_Compute_OutlierDetection';
  protected $outlierDetectionDataType = '';
  public $port;
  public $portName;
  public $protocol;
  public $region;
  public $securityPolicy;
  public $selfLink;
  public $sessionAffinity;
  public $timeoutSec;

  public function setAffinityCookieTtlSec($affinityCookieTtlSec)
  {
    $this->affinityCookieTtlSec = $affinityCookieTtlSec;
  }
  public function getAffinityCookieTtlSec()
  {
    return $this->affinityCookieTtlSec;
  }
  /**
   * @param Google_Service_Compute_Backend
   */
  public function setBackends($backends)
  {
    $this->backends = $backends;
  }
  /**
   * @return Google_Service_Compute_Backend
   */
  public function getBackends()
  {
    return $this->backends;
  }
  /**
   * @param Google_Service_Compute_BackendServiceCdnPolicy
   */
  public function setCdnPolicy(Google_Service_Compute_BackendServiceCdnPolicy $cdnPolicy)
  {
    $this->cdnPolicy = $cdnPolicy;
  }
  /**
   * @return Google_Service_Compute_BackendServiceCdnPolicy
   */
  public function getCdnPolicy()
  {
    return $this->cdnPolicy;
  }
  /**
   * @param Google_Service_Compute_CircuitBreakers
   */
  public function setCircuitBreakers(Google_Service_Compute_CircuitBreakers $circuitBreakers)
  {
    $this->circuitBreakers = $circuitBreakers;
  }
  /**
   * @return Google_Service_Compute_CircuitBreakers
   */
  public function getCircuitBreakers()
  {
    return $this->circuitBreakers;
  }
  /**
   * @param Google_Service_Compute_ConnectionDraining
   */
  public function setConnectionDraining(Google_Service_Compute_ConnectionDraining $connectionDraining)
  {
    $this->connectionDraining = $connectionDraining;
  }
  /**
   * @return Google_Service_Compute_ConnectionDraining
   */
  public function getConnectionDraining()
  {
    return $this->connectionDraining;
  }
  /**
   * @param Google_Service_Compute_ConsistentHashLoadBalancerSettings
   */
  public function setConsistentHash(Google_Service_Compute_ConsistentHashLoadBalancerSettings $consistentHash)
  {
    $this->consistentHash = $consistentHash;
  }
  /**
   * @return Google_Service_Compute_ConsistentHashLoadBalancerSettings
   */
  public function getConsistentHash()
  {
    return $this->consistentHash;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setCustomRequestHeaders($customRequestHeaders)
  {
    $this->customRequestHeaders = $customRequestHeaders;
  }
  public function getCustomRequestHeaders()
  {
    return $this->customRequestHeaders;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnableCDN($enableCDN)
  {
    $this->enableCDN = $enableCDN;
  }
  public function getEnableCDN()
  {
    return $this->enableCDN;
  }
  /**
   * @param Google_Service_Compute_BackendServiceFailoverPolicy
   */
  public function setFailoverPolicy(Google_Service_Compute_BackendServiceFailoverPolicy $failoverPolicy)
  {
    $this->failoverPolicy = $failoverPolicy;
  }
  /**
   * @return Google_Service_Compute_BackendServiceFailoverPolicy
   */
  public function getFailoverPolicy()
  {
    return $this->failoverPolicy;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }
  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
  /**
   * @param Google_Service_Compute_BackendServiceIAP
   */
  public function setIap(Google_Service_Compute_BackendServiceIAP $iap)
  {
    $this->iap = $iap;
  }
  /**
   * @return Google_Service_Compute_BackendServiceIAP
   */
  public function getIap()
  {
    return $this->iap;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLoadBalancingScheme($loadBalancingScheme)
  {
    $this->loadBalancingScheme = $loadBalancingScheme;
  }
  public function getLoadBalancingScheme()
  {
    return $this->loadBalancingScheme;
  }
  public function setLocalityLbPolicy($localityLbPolicy)
  {
    $this->localityLbPolicy = $localityLbPolicy;
  }
  public function getLocalityLbPolicy()
  {
    return $this->localityLbPolicy;
  }
  /**
   * @param Google_Service_Compute_BackendServiceLogConfig
   */
  public function setLogConfig(Google_Service_Compute_BackendServiceLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return Google_Service_Compute_BackendServiceLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
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
  /**
   * @param Google_Service_Compute_OutlierDetection
   */
  public function setOutlierDetection(Google_Service_Compute_OutlierDetection $outlierDetection)
  {
    $this->outlierDetection = $outlierDetection;
  }
  /**
   * @return Google_Service_Compute_OutlierDetection
   */
  public function getOutlierDetection()
  {
    return $this->outlierDetection;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setPortName($portName)
  {
    $this->portName = $portName;
  }
  public function getPortName()
  {
    return $this->portName;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSecurityPolicy($securityPolicy)
  {
    $this->securityPolicy = $securityPolicy;
  }
  public function getSecurityPolicy()
  {
    return $this->securityPolicy;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSessionAffinity($sessionAffinity)
  {
    $this->sessionAffinity = $sessionAffinity;
  }
  public function getSessionAffinity()
  {
    return $this->sessionAffinity;
  }
  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }
  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }
}
