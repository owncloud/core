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

class IamPolicySearchResult extends \Google\Collection
{
  protected $collection_key = 'folders';
  public $assetType;
  protected $explanationType = Explanation::class;
  protected $explanationDataType = '';
  public $folders;
  public $organization;
  protected $policyType = Policy::class;
  protected $policyDataType = '';
  public $project;
  public $resource;

  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
  public function getAssetType()
  {
    return $this->assetType;
  }
  /**
   * @param Explanation
   */
  public function setExplanation(Explanation $explanation)
  {
    $this->explanation = $explanation;
  }
  /**
   * @return Explanation
   */
  public function getExplanation()
  {
    return $this->explanation;
  }
  public function setFolders($folders)
  {
    $this->folders = $folders;
  }
  public function getFolders()
  {
    return $this->folders;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param Policy
   */
  public function setPolicy(Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IamPolicySearchResult::class, 'Google_Service_CloudAsset_IamPolicySearchResult');
