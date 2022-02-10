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

namespace Google\Service\AccessContextManager;

class ServicePerimeterConfig extends \Google\Collection
{
  protected $collection_key = 'restrictedServices';
  /**
   * @var string[]
   */
  public $accessLevels;
  protected $egressPoliciesType = EgressPolicy::class;
  protected $egressPoliciesDataType = 'array';
  protected $ingressPoliciesType = IngressPolicy::class;
  protected $ingressPoliciesDataType = 'array';
  /**
   * @var string[]
   */
  public $resources;
  /**
   * @var string[]
   */
  public $restrictedServices;
  protected $vpcAccessibleServicesType = VpcAccessibleServices::class;
  protected $vpcAccessibleServicesDataType = '';

  /**
   * @param string[]
   */
  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  /**
   * @return string[]
   */
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  /**
   * @param EgressPolicy[]
   */
  public function setEgressPolicies($egressPolicies)
  {
    $this->egressPolicies = $egressPolicies;
  }
  /**
   * @return EgressPolicy[]
   */
  public function getEgressPolicies()
  {
    return $this->egressPolicies;
  }
  /**
   * @param IngressPolicy[]
   */
  public function setIngressPolicies($ingressPolicies)
  {
    $this->ingressPolicies = $ingressPolicies;
  }
  /**
   * @return IngressPolicy[]
   */
  public function getIngressPolicies()
  {
    return $this->ingressPolicies;
  }
  /**
   * @param string[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return string[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param string[]
   */
  public function setRestrictedServices($restrictedServices)
  {
    $this->restrictedServices = $restrictedServices;
  }
  /**
   * @return string[]
   */
  public function getRestrictedServices()
  {
    return $this->restrictedServices;
  }
  /**
   * @param VpcAccessibleServices
   */
  public function setVpcAccessibleServices(VpcAccessibleServices $vpcAccessibleServices)
  {
    $this->vpcAccessibleServices = $vpcAccessibleServices;
  }
  /**
   * @return VpcAccessibleServices
   */
  public function getVpcAccessibleServices()
  {
    return $this->vpcAccessibleServices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicePerimeterConfig::class, 'Google_Service_AccessContextManager_ServicePerimeterConfig');
