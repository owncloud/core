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

namespace Google\Service\CloudAsset;

class GoogleIdentityAccesscontextmanagerV1ServicePerimeterConfig extends \Google\Collection
{
  protected $collection_key = 'restrictedServices';
  public $accessLevels;
  protected $egressPoliciesType = GoogleIdentityAccesscontextmanagerV1EgressPolicy::class;
  protected $egressPoliciesDataType = 'array';
  protected $ingressPoliciesType = GoogleIdentityAccesscontextmanagerV1IngressPolicy::class;
  protected $ingressPoliciesDataType = 'array';
  public $resources;
  public $restrictedServices;
  protected $vpcAccessibleServicesType = GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices::class;
  protected $vpcAccessibleServicesDataType = '';

  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1EgressPolicy[]
   */
  public function setEgressPolicies($egressPolicies)
  {
    $this->egressPolicies = $egressPolicies;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1EgressPolicy[]
   */
  public function getEgressPolicies()
  {
    return $this->egressPolicies;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1IngressPolicy[]
   */
  public function setIngressPolicies($ingressPolicies)
  {
    $this->ingressPolicies = $ingressPolicies;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1IngressPolicy[]
   */
  public function getIngressPolicies()
  {
    return $this->ingressPolicies;
  }
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  public function getResources()
  {
    return $this->resources;
  }
  public function setRestrictedServices($restrictedServices)
  {
    $this->restrictedServices = $restrictedServices;
  }
  public function getRestrictedServices()
  {
    return $this->restrictedServices;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices
   */
  public function setVpcAccessibleServices(GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices $vpcAccessibleServices)
  {
    $this->vpcAccessibleServices = $vpcAccessibleServices;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices
   */
  public function getVpcAccessibleServices()
  {
    return $this->vpcAccessibleServices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1ServicePerimeterConfig::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1ServicePerimeterConfig');
