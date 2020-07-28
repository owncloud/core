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

class Google_Service_CloudAsset_Asset extends Google_Collection
{
  protected $collection_key = 'orgPolicy';
  protected $accessLevelType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessLevel';
  protected $accessLevelDataType = '';
  protected $accessPolicyType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessPolicy';
  protected $accessPolicyDataType = '';
  public $ancestors;
  public $assetType;
  protected $iamPolicyType = 'Google_Service_CloudAsset_Policy';
  protected $iamPolicyDataType = '';
  public $name;
  protected $orgPolicyType = 'Google_Service_CloudAsset_GoogleCloudOrgpolicyV1Policy';
  protected $orgPolicyDataType = 'array';
  protected $resourceType = 'Google_Service_CloudAsset_CloudassetResource';
  protected $resourceDataType = '';
  protected $servicePerimeterType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1ServicePerimeter';
  protected $servicePerimeterDataType = '';
  public $updateTime;

  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessLevel
   */
  public function setAccessLevel(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessLevel $accessLevel)
  {
    $this->accessLevel = $accessLevel;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessLevel
   */
  public function getAccessLevel()
  {
    return $this->accessLevel;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessPolicy
   */
  public function setAccessPolicy(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessPolicy $accessPolicy)
  {
    $this->accessPolicy = $accessPolicy;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1AccessPolicy
   */
  public function getAccessPolicy()
  {
    return $this->accessPolicy;
  }
  public function setAncestors($ancestors)
  {
    $this->ancestors = $ancestors;
  }
  public function getAncestors()
  {
    return $this->ancestors;
  }
  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
  public function getAssetType()
  {
    return $this->assetType;
  }
  /**
   * @param Google_Service_CloudAsset_Policy
   */
  public function setIamPolicy(Google_Service_CloudAsset_Policy $iamPolicy)
  {
    $this->iamPolicy = $iamPolicy;
  }
  /**
   * @return Google_Service_CloudAsset_Policy
   */
  public function getIamPolicy()
  {
    return $this->iamPolicy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudOrgpolicyV1Policy
   */
  public function setOrgPolicy($orgPolicy)
  {
    $this->orgPolicy = $orgPolicy;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudOrgpolicyV1Policy
   */
  public function getOrgPolicy()
  {
    return $this->orgPolicy;
  }
  /**
   * @param Google_Service_CloudAsset_CloudassetResource
   */
  public function setResource(Google_Service_CloudAsset_CloudassetResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_CloudAsset_CloudassetResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1ServicePerimeter
   */
  public function setServicePerimeter(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1ServicePerimeter $servicePerimeter)
  {
    $this->servicePerimeter = $servicePerimeter;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1ServicePerimeter
   */
  public function getServicePerimeter()
  {
    return $this->servicePerimeter;
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
