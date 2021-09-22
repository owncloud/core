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
  public $affinityCookieTtlSec;
  protected $backendsType = Backend::class;
  protected $backendsDataType = 'array';
  protected $cdnPolicyType = BackendServiceCdnPolicy::class;
  protected $cdnPolicyDataType = '';
  protected $circuitBreakersType = CircuitBreakers::class;
  protected $circuitBreakersDataType = '';
  protected $connectionDrainingType = ConnectionDraining::class;
  protected $connectionDrainingDataType = '';
  protected $consistentHashType = ConsistentHashLoadBalancerSettings::class;
  protected $consistentHashDataType = '';
  public $creationTimestamp;
  public $customRequestHeaders;
  public $customResponseHeaders;
  public $description;
  public $enableCDN;
  protected $failoverPolicyType = BackendServiceFailoverPolicy::class;
  protected $failoverPolicyDataType = '';
  public $fingerprint;
  public $healthChecks;
  protected $iapType = BackendServiceIAP::class;
  protected $iapDataType = '';
  public $id;
  public $kind;
  public $loadBalancingScheme;
  public $localityLbPolicy;
  protected $logConfigType = BackendServiceLogConfig::class;
  protected $logConfigDataType = '';
  protected $maxStreamDurationType = Duration::class;
  protected $maxStreamDurationDataType = '';
  public $name;
  public $network;
  protected $outlierDetectionType = OutlierDetection::class;
  protected $outlierDetectionDataType = '';
  public $port;
  public $portName;
  public $protocol;
  public $region;
  public $securityPolicy;
  protected $securitySettingsType = SecuritySettings::class;
  protected $securitySettingsDataType = '';
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
  public function setCustomResponseHeaders($customResponseHeaders)
  {
    $this->customResponseHeaders = $customResponseHeaders;
  }
  public function getCustomResponseHeaders()
  {
    return $this->customResponseHeaders;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendService::class, 'Google_Service_Compute_BackendService');
