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

class IamPolicyAnalysisResult extends \Google\Collection
{
  protected $collection_key = 'accessControlLists';
  protected $accessControlListsType = GoogleCloudAssetV1AccessControlList::class;
  protected $accessControlListsDataType = 'array';
  public $attachedResourceFullName;
  public $fullyExplored;
  protected $iamBindingType = Binding::class;
  protected $iamBindingDataType = '';
  protected $identityListType = GoogleCloudAssetV1IdentityList::class;
  protected $identityListDataType = '';

  /**
   * @param GoogleCloudAssetV1AccessControlList[]
   */
  public function setAccessControlLists($accessControlLists)
  {
    $this->accessControlLists = $accessControlLists;
  }
  /**
   * @return GoogleCloudAssetV1AccessControlList[]
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
   * @param Binding
   */
  public function setIamBinding(Binding $iamBinding)
  {
    $this->iamBinding = $iamBinding;
  }
  /**
   * @return Binding
   */
  public function getIamBinding()
  {
    return $this->iamBinding;
  }
  /**
   * @param GoogleCloudAssetV1IdentityList
   */
  public function setIdentityList(GoogleCloudAssetV1IdentityList $identityList)
  {
    $this->identityList = $identityList;
  }
  /**
   * @return GoogleCloudAssetV1IdentityList
   */
  public function getIdentityList()
  {
    return $this->identityList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IamPolicyAnalysisResult::class, 'Google_Service_CloudAsset_IamPolicyAnalysisResult');
