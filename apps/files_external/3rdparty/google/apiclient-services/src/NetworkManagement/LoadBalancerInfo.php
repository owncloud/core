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

namespace Google\Service\NetworkManagement;

class LoadBalancerInfo extends \Google\Collection
{
  protected $collection_key = 'backends';
  /**
   * @var string
   */
  public $backendType;
  /**
   * @var string
   */
  public $backendUri;
  protected $backendsType = LoadBalancerBackend::class;
  protected $backendsDataType = 'array';
  /**
   * @var string
   */
  public $healthCheckUri;
  /**
   * @var string
   */
  public $loadBalancerType;

  /**
   * @param string
   */
  public function setBackendType($backendType)
  {
    $this->backendType = $backendType;
  }
  /**
   * @return string
   */
  public function getBackendType()
  {
    return $this->backendType;
  }
  /**
   * @param string
   */
  public function setBackendUri($backendUri)
  {
    $this->backendUri = $backendUri;
  }
  /**
   * @return string
   */
  public function getBackendUri()
  {
    return $this->backendUri;
  }
  /**
   * @param LoadBalancerBackend[]
   */
  public function setBackends($backends)
  {
    $this->backends = $backends;
  }
  /**
   * @return LoadBalancerBackend[]
   */
  public function getBackends()
  {
    return $this->backends;
  }
  /**
   * @param string
   */
  public function setHealthCheckUri($healthCheckUri)
  {
    $this->healthCheckUri = $healthCheckUri;
  }
  /**
   * @return string
   */
  public function getHealthCheckUri()
  {
    return $this->healthCheckUri;
  }
  /**
   * @param string
   */
  public function setLoadBalancerType($loadBalancerType)
  {
    $this->loadBalancerType = $loadBalancerType;
  }
  /**
   * @return string
   */
  public function getLoadBalancerType()
  {
    return $this->loadBalancerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LoadBalancerInfo::class, 'Google_Service_NetworkManagement_LoadBalancerInfo');
