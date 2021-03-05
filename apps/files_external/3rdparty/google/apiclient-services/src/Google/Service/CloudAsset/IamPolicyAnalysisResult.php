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

class Google_Service_CloudAsset_IamPolicyAnalysisResult extends Google_Collection
{
  protected $collection_key = 'accessControlLists';
  protected $accessControlListsType = 'Google_Service_CloudAsset_GoogleCloudAssetV1AccessControlList';
  protected $accessControlListsDataType = 'array';
  public $attachedResourceFullName;
  public $fullyExplored;
  protected $iamBindingType = 'Google_Service_CloudAsset_Binding';
  protected $iamBindingDataType = '';
  protected $identityListType = 'Google_Service_CloudAsset_GoogleCloudAssetV1IdentityList';
  protected $identityListDataType = '';

  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1AccessControlList[]
   */
  public function setAccessControlLists($accessControlLists)
  {
    $this->accessControlLists = $accessControlLists;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1AccessControlList[]
   */
  public function getAccessControlLists()
  {
    return $this->accessControlLists;
  }
  public function setAttachedResourceFullName($attachedResourceFullName)
  {
    $this->attachedResourceFullName = $attachedResourceFullName;
  }
  public function getAttachedResourceFullName()
  {
    return $this->attachedResourceFullName;
  }
  public function setFullyExplored($fullyExplored)
  {
    $this->fullyExplored = $fullyExplored;
  }
  public function getFullyExplored()
  {
    return $this->fullyExplored;
  }
  /**
   * @param Google_Service_CloudAsset_Binding
   */
  public function setIamBinding(Google_Service_CloudAsset_Binding $iamBinding)
  {
    $this->iamBinding = $iamBinding;
  }
  /**
   * @return Google_Service_CloudAsset_Binding
   */
  public function getIamBinding()
  {
    return $this->iamBinding;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1IdentityList
   */
  public function setIdentityList(Google_Service_CloudAsset_GoogleCloudAssetV1IdentityList $identityList)
  {
    $this->identityList = $identityList;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1IdentityList
   */
  public function getIdentityList()
  {
    return $this->identityList;
  }
}
