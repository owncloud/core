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
  /**
   * @var string
   */
  public $authorizationPolicy;
  /**
   * @var string
   */
  public $clientTlsPolicy;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  protected $endpointMatcherType = EndpointMatcher::class;
  protected $endpointMatcherDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serverTlsPolicy;
  protected $trafficPortSelectorType = TrafficPortSelector::class;
  protected $trafficPortSelectorDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAuthorizationPolicy($authorizationPolicy)
  {
    $this->authorizationPolicy = $authorizationPolicy;
  }
  /**
   * @return string
   */
  public function getAuthorizationPolicy()
  {
    return $this->authorizationPolicy;
  }
  /**
   * @param string
   */
  public function setClientTlsPolicy($clientTlsPolicy)
  {
    $this->clientTlsPolicy = $clientTlsPolicy;
  }
  /**
   * @return string
   */
  public function getClientTlsPolicy()
  {
    return $this->clientTlsPolicy;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setServerTlsPolicy($serverTlsPolicy)
  {
    $this->serverTlsPolicy = $serverTlsPolicy;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EndpointPolicy::class, 'Google_Service_NetworkServices_EndpointPolicy');
