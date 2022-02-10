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

namespace Google\Service\GKEHub;

class KubernetesResource extends \Google\Collection
{
  protected $collection_key = 'membershipResources';
  protected $connectResourcesType = ResourceManifest::class;
  protected $connectResourcesDataType = 'array';
  /**
   * @var string
   */
  public $membershipCrManifest;
  protected $membershipResourcesType = ResourceManifest::class;
  protected $membershipResourcesDataType = 'array';
  protected $resourceOptionsType = ResourceOptions::class;
  protected $resourceOptionsDataType = '';

  /**
   * @param ResourceManifest[]
   */
  public function setConnectResources($connectResources)
  {
    $this->connectResources = $connectResources;
  }
  /**
   * @return ResourceManifest[]
   */
  public function getConnectResources()
  {
    return $this->connectResources;
  }
  /**
   * @param string
   */
  public function setMembershipCrManifest($membershipCrManifest)
  {
    $this->membershipCrManifest = $membershipCrManifest;
  }
  /**
   * @return string
   */
  public function getMembershipCrManifest()
  {
    return $this->membershipCrManifest;
  }
  /**
   * @param ResourceManifest[]
   */
  public function setMembershipResources($membershipResources)
  {
    $this->membershipResources = $membershipResources;
  }
  /**
   * @return ResourceManifest[]
   */
  public function getMembershipResources()
  {
    return $this->membershipResources;
  }
  /**
   * @param ResourceOptions
   */
  public function setResourceOptions(ResourceOptions $resourceOptions)
  {
    $this->resourceOptions = $resourceOptions;
  }
  /**
   * @return ResourceOptions
   */
  public function getResourceOptions()
  {
    return $this->resourceOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KubernetesResource::class, 'Google_Service_GKEHub_KubernetesResource');
