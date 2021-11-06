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

namespace Google\Service\NetworkServices;

class EndpointPolicy extends \Google\Model
{
  public $authorizationPolicy;
  public $clientTlsPolicy;
  public $createTime;
  public $description;
  protected $endpointMatcherType = EndpointMatcher::class;
  protected $endpointMatcherDataType = '';
  public $labels;
  public $name;
  public $serverTlsPolicy;
  protected $trafficPortSelectorType = TrafficPortSelector::class;
  protected $trafficPortSelectorDataType = '';
  public $type;
  public $updateTime;

  public function setAuthorizationPolicy($authorizationPolicy)
  {
    $this->authorizationPolicy = $authorizationPolicy;
  }
  public function getAuthorizationPolicy()
  {
    return $this->authorizationPolicy;
  }
  public function setClientTlsPolicy($clientTlsPolicy)
  {
    $this->clientTlsPolicy = $clientTlsPolicy;
  }
  public function getClientTlsPolicy()
  {
    return $this->clientTlsPolicy;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param EndpointMatcher
   */
  public function setEndpointMatcher(EndpointMatcher $endpointMatcher)
  {
    $this->endpointMatcher = $endpointMatcher;
  }
  /**
   * @return EndpointMatcher
   */
  public function getEndpointMatcher()
  {
    return $this->endpointMatcher;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setServerTlsPolicy($serverTlsPolicy)
  {
    $this->serverTlsPolicy = $serverTlsPolicy;
  }
  public function getServerTlsPolicy()
  {
    return $this->serverTlsPolicy;
  }
  /**
   * @param TrafficPortSelector
   */
  public function setTrafficPortSelector(TrafficPortSelector $trafficPortSelector)
  {
    $this->trafficPortSelector = $trafficPortSelector;
  }
  /**
   * @return TrafficPortSelector
   */
  public function getTrafficPortSelector()
  {
    return $this->trafficPortSelector;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EndpointPolicy::class, 'Google_Service_NetworkServices_EndpointPolicy');
