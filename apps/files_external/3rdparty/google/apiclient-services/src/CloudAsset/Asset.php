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

class Asset extends \Google\Collection
{
  protected $collection_key = 'orgPolicy';
  protected $accessLevelType = GoogleIdentityAccesscontextmanagerV1AccessLevel::class;
  protected $accessLevelDataType = '';
  protected $accessPolicyType = GoogleIdentityAccesscontextmanagerV1AccessPolicy::class;
  protected $accessPolicyDataType = '';
  /**
   * @var string[]
   */
  public $ancestors;
  /**
   * @var string
   */
  public $assetType;
  protected $iamPolicyType = Policy::class;
  protected $iamPolicyDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $orgPolicyType = GoogleCloudOrgpolicyV1Policy::class;
  protected $orgPolicyDataType = 'array';
  protected $osInventoryType = Inventory::class;
  protected $osInventoryDataType = '';
  protected $relatedAssetsType = RelatedAssets::class;
  protected $relatedAssetsDataType = '';
  protected $resourceType = CloudassetResource::class;
  protected $resourceDataType = '';
  protected $servicePerimeterType = GoogleIdentityAccesscontextmanagerV1ServicePerimeter::class;
  protected $servicePerimeterDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param GoogleIdentityAccesscontextmanagerV1AccessLevel
   */
  public function setAccessLevel(GoogleIdentityAccesscontextmanagerV1AccessLevel $accessLevel)
  {
    $this->accessLevel = $accessLevel;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1AccessLevel
   */
  public function getAccessLevel()
  {
    return $this->accessLevel;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1AccessPolicy
   */
  public function setAccessPolicy(GoogleIdentityAccesscontextmanagerV1AccessPolicy $accessPolicy)
  {
    $this->accessPolicy = $accessPolicy;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1AccessPolicy
   */
  public function getAccessPolicy()
  {
    return $this->accessPolicy;
  }
  /**
   * @param string[]
   */
  public function setAncestors($ancestors)
  {
    $this->ancestors = $ancestors;
  }
  /**
   * @return string[]
   */
  public function getAncestors()
  {
    return $this->ancestors;
  }
  /**
   * @param string
   */
  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
  /**
   * @return string
   */
  public function getAssetType()
  {
    return $this->assetType;
  }
  /**
   * @param Policy
   */
  public function setIamPolicy(Policy $iamPolicy)
  {
    $this->iamPolicy = $iamPolicy;
  }
  /**
   * @return Policy
   */
  public function getIamPolicy()
  {
    return $this->iamPolicy;
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
   * @param GoogleCloudOrgpolicyV1Policy[]
   */
  public function setOrgPolicy($orgPolicy)
  {
    $this->orgPolicy = $orgPolicy;
  }
  /**
   * @return GoogleCloudOrgpolicyV1Policy[]
   */
  public function getOrgPolicy()
  {
    return $this->orgPolicy;
  }
  /**
   * @param Inventory
   */
  public function setOsInventory(Inventory $osInventory)
  {
    $this->osInventory = $osInventory;
  }
  /**
   * @return Inventory
   */
  public function getOsInventory()
  {
    return $this->osInventory;
  }
  /**
   * @param RelatedAssets
   */
  public function setRelatedAssets(RelatedAssets $relatedAssets)
  {
    $this->relatedAssets = $relatedAssets;
  }
  /**
   * @return RelatedAssets
   */
  public function getRelatedAssets()
  {
    return $this->relatedAssets;
  }
  /**
   * @param CloudassetResource
   */
  public function setResource(CloudassetResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return CloudassetResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1ServicePerimeter
   */
  public function setServicePerimeter(GoogleIdentityAccesscontextmanagerV1ServicePerimeter $servicePerimeter)
  {
    $this->servicePerimeter = $servicePerimeter;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1ServicePerimeter
   */
  public function getServicePerimeter()
  {
    return $this->servicePerimeter;
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
class_alias(Asset::class, 'Google_Service_CloudAsset_Asset');
