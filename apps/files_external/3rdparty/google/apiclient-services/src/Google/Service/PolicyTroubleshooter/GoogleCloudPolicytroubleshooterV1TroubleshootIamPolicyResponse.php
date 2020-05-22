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

class Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse extends Google_Collection
{
  protected $collection_key = 'explainedPolicies';
  public $access;
  protected $explainedPoliciesType = 'Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1ExplainedPolicy';
  protected $explainedPoliciesDataType = 'array';

  public function setAccess($access)
  {
    $this->access = $access;
  }
  public function getAccess()
  {
    return $this->access;
  }
  /**
   * @param Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1ExplainedPolicy
   */
  public function setExplainedPolicies($explainedPolicies)
  {
    $this->explainedPolicies = $explainedPolicies;
  }
  /**
   * @return Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1ExplainedPolicy
   */
  public function getExplainedPolicies()
  {
    return $this->explainedPolicies;
  }
}
