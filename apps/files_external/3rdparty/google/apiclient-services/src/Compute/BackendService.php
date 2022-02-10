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

class BackendService extends \Google\Collection
{
  protected $collection_key = 'healthChecks';
  /**
   * @var int
   */
  public $affinityCookieTtlSec;
  protected $backendsType = Backend::class;
  protected $backendsDataType = 'array';
  protected $cdnPolicyType = BackendServiceCdnPolicy::class;
  protected $cdnPolicyDataType = '';
  protected $circuitBreakersType = CircuitBreakers::class;
  protected $circuitBreakersDataType = '';
  protected $connectionDrainingType = ConnectionDraining::class;
  protected $connectionDrainingDataType = '';
  protected $connectionTrackingPolicyType = BackendServiceConnectionTrackingPolicy::class;
  protected $connectionTrackingPolicyDataType = '';
  protected $consistentHashType = ConsistentHashLoadBalancerSettings::class;
  protected $consistentHashDataType = '';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string[]
   */
  public $customRequestHeaders;
  /**
   * @var string[]
   */
  public $customResponseHeaders;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $edgeSecurityPolicy;
  /**
   * @var bool
   */
  public $enableCDN;
  protected $failoverPolicyType = BackendServiceFailoverPolicy::class;
  protected $failoverPolicyDataType = '';
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string[]
   */
  public $healthChecks;
  protected $iapType = BackendServiceIAP::class;
  protected $iapDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $loadBalancingScheme;
  /**
   * @var string
   */
  public $localityLbPolicy;
  protected $logConfigType = BackendServiceLogConfig::class;
  protected $logConfigDataType = '';
  protected $maxStreamDurationType = Duration::class;
  protected $maxStreamDurationDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  protected $outlierDetectionType = OutlierDetection::class;
  protected $outlierDetectionDataType = '';
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $portName;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $securityPolicy;
  protected $securitySettingsType = SecuritySettings::class;
  protected $securitySettingsDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $sessionAffinity;
  protected $subsettingType = Subsetting::class;
  protected $subsettingDataType = '';
  /**
   * @var int
   */
  public $timeoutSec;

  /**
   * @param int
   */
  public function setAffinityCookieTtlSec($affinityCookieTtlSec)
  {
    $this->affinityCookieTtlSec = $affinityCookieTtlSec;
  }
  /**
   * @return int
   */
  public function getAffinityCookieTtlSec()
  {
    return $this->affinityCookieTtlSec;
  }
  /**
   * @param Backend[]
   */
  public function setBackends($backends)
  {
    $this->backends = $backends;
  }
  /**
   * @return Backend[]
   */
  public function getBackends()
  {
    return $this->backends;
  }
  /**
   * @param BackendServiceCdnPolicy
   */
  public function setCdnPolicy(BackendServiceCdnPolicy $cdnPolicy)
  {
    $this->cdnPolicy = $cdnPolicy;
  }
  /**
   * @return BackendServiceCdnPolicy
   */
  public function getCdnPolicy()
  {
    return $this->cdnPolicy;
  }
  /**
   * @param CircuitBreakers
   */
  public function setCircuitBreakers(CircuitBreakers $circuitBreakers)
  {
    $this->circuitBreakers = $circuitBreakers;
  }
  /**
   * @return CircuitBreakers
   */
  public function getCircuitBreakers()
  {
    return $this->circuitBreakers;
  }
  /**
   * @param ConnectionDraining
   */
  public function setConnectionDraining(ConnectionDraining $connectionDraining)
  {
    $this->connectionDraining = $connectionDraining;
  }
  /**
   * @return ConnectionDraining
   */
  public function getConnectionDraining()
  {
    return $this->connectionDraining;
  }
  /**
   * @param BackendServiceConnectionTrackingPolicy
   */
  public function setConnectionTrackingPolicy(BackendServiceConnectionTrackingPolicy $connectionTrackingPolicy)
  {
    $this->connectionTrackingPolicy = $connectionTrackingPolicy;
  }
  /**
   * @return BackendServiceConnectionTrackingPolicy
   */
  public function getConnectionTrackingPolicy()
  {
    return $this->connectionTrackingPolicy;
  }
  /**
   * @param ConsistentHashLoadBalancerSettings
   */
  public function setConsistentHash(ConsistentHashLoadBalancerSettings $consistentHash)
  {
    $this->consistentHash = $consistentHash;
  }
  /**
   * @return ConsistentHashLoadBalancerSettings
   */
  public function getConsistentHash()
  {
    return $this->consistentHash;
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
   * @param string[]
   */
  public function setCustomRequestHeaders($customRequestHeaders)
  {
    $this->customRequestHeaders = $customRequestHeaders;
  }
  /**
   * @return string[]
   */
  public function getCustomRequestHeaders()
  {
    return $this->customRequestHeaders;
  }
  /**
   * @param string[]
   */
  public function setCustomResponseHeaders($customResponseHeaders)
  {
    $this->customResponseHeaders = $customResponseHeaders;
  }
  /**
   * @return string[]
   */
  public function getCustomResponseHeaders()
  {
    return $this->customResponseHeaders;
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
  public function setEdgeSecurityPolicy($edgeSecurityPolicy)
  {
    $this->edgeSecurityPolicy = $edgeSecurityPolicy;
  }
  /**
   * @return string
   */
  public function getEdgeSecurityPolicy()
  {
    return $this->edgeSecurityPolicy;
  }
  /**
   * @param bool
   */
  public function setEnableCDN($enableCDN)
  {
    $this->enableCDN = $enableCDN;
  }
  /**
   * @return bool
   */
  public function getEnableCDN()
  {
    return $this->enableCDN;
  }
  /**
   * @param BackendServiceFailoverPolicy
   */
  public function setFailoverPolicy(BackendServiceFailoverPolicy $failoverPolicy)
  {
    $this->failoverPolicy = $failoverPolicy;
  }
  /**
   * @return BackendServiceFailoverPolicy
   */
  public function getFailoverPolicy()
  {
    return $this->failoverPolicy;
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
   * @param string[]
   */
  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }
  /**
   * @return string[]
   */
  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
  /**
   * @param BackendServiceIAP
   */
  public function setIap(BackendServiceIAP $iap)
  {
    $this->iap = $iap;
  }
  /**
   * @return BackendServiceIAP
   */
  public function getIap()
  {
    return $this->iap;
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
   * @param string
   */
  public function setLocalityLbPolicy($localityLbPolicy)
  {
    $this->localityLbPolicy = $localityLbPolicy;
  }
  /**
   * @return string
   */
  public function getLocalityLbPolicy()
  {
    return $this->localityLbPolicy;
  }
  /**
   * @param BackendServiceLogConfig
   */
  public function setLogConfig(BackendServiceLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return BackendServiceLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
  }
  /**
   * @param Duration
   */
  public function setMaxStreamDuration(Duration $maxStreamDuration)
  {
    $this->maxStreamDuration = $maxStreamDuration;
  }
  /**
   * @return Duration
   */
  public function getMaxStreamDuration()
  {
    return $this->maxStreamDuration;
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
   * @param OutlierDetection
   */
  public function setOutlierDetection(OutlierDetection $outlierDetection)
  {
    $this->outlierDetection = $outlierDetection;
  }
  /**
   * @return OutlierDetection
   */
  public function getOutlierDetection()
  {
    return $this->outlierDetection;
  }
  /**
   * @param int
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return int
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setPortName($portName)
  {
    $this->portName = $portName;
  }
  /**
   * @return string
   */
  public function getPortName()
  {
    return $this->portName;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
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
  public function setSecurityPolicy($securityPolicy)
  {
    $this->securityPolicy = $securityPolicy;
  }
  /**
   * @return string
   */
  public function getSecurityPolicy()
  {
    return $this->securityPolicy;
  }
  /**
   * @param SecuritySettings
   */
  public function setSecuritySettings(SecuritySettings $securitySettings)
  {
    $this->securitySettings = $securitySettings;
  }
  /**
   * @return SecuritySettings
   */
  public function getSecuritySettings()
  {
    return $this->securitySettings;
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
   * @param string
   */
  public function setSessionAffinity($sessionAffinity)
  {
    $this->sessionAffinity = $sessionAffinity;
  }
  /**
   * @return string
   */
  public function getSessionAffinity()
  {
    return $this->sessionAffinity;
  }
  /**
   * @param Subsetting
   */
  public function setSubsetting(Subsetting $subsetting)
  {
    $this->subsetting = $subsetting;
  }
  /**
   * @return Subsetting
   */
  public function getSubsetting()
  {
    return $this->subsetting;
  }
  /**
   * @param int
   */
  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }
  /**
   * @return int
   */
  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendService::class, 'Google_Service_Compute_BackendService');
