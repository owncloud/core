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

class HealthCheckService extends \Google\Collection
{
  protected $collection_key = 'notificationEndpoints';
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
   * @var string[]
   */
  public $healthChecks;
  /**
   * @var string
   */
  public $healthStatusAggregationPolicy;
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
  public $name;
  /**
   * @var string[]
   */
  public $networkEndpointGroups;
  /**
   * @var string[]
   */
  public $notificationEndpoints;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;

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
   * @param string
   */
  public function setHealthStatusAggregationPolicy($healthStatusAggregationPolicy)
  {
    $this->healthStatusAggregationPolicy = $healthStatusAggregationPolicy;
  }
  /**
   * @return string
   */
  public function getHealthStatusAggregationPolicy()
  {
    return $this->healthStatusAggregationPolicy;
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
   * @param string[]
   */
  public function setNetworkEndpointGroups($networkEndpointGroups)
  {
    $this->networkEndpointGroups = $networkEndpointGroups;
  }
  /**
   * @return string[]
   */
  public function getNetworkEndpointGroups()
  {
    return $this->networkEndpointGroups;
  }
  /**
   * @param string[]
   */
  public function setNotificationEndpoints($notificationEndpoints)
  {
    $this->notificationEndpoints = $notificationEndpoints;
  }
  /**
   * @return string[]
   */
  public function getNotificationEndpoints()
  {
    return $this->notificationEndpoints;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HealthCheckService::class, 'Google_Service_Compute_HealthCheckService');
