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

class Google_Service_CloudAsset_IamPolicySearchResult extends Google_Model
{
  protected $explanationType = 'Google_Service_CloudAsset_Explanation';
  protected $explanationDataType = '';
  protected $policyType = 'Google_Service_CloudAsset_Policy';
  protected $policyDataType = '';
  public $project;
  public $resource;

  /**
   * @param Google_Service_CloudAsset_Explanation
   */
  public function setExplanation(Google_Service_CloudAsset_Explanation $explanation)
  {
    $this->explanation = $explanation;
  }
  /**
   * @return Google_Service_CloudAsset_Explanation
   */
  public function getExplanation()
  {
    return $this->explanation;
  }
  /**
   * @param Google_Service_CloudAsset_Policy
   */
  public function setPolicy(Google_Service_CloudAsset_Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_CloudAsset_Policy
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
