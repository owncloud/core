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

namespace Google\Service\PolicyTroubleshooter;

class GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse extends \Google\Collection
{
  protected $collection_key = 'explainedPolicies';
  public $access;
  protected $explainedPoliciesType = GoogleCloudPolicytroubleshooterV1ExplainedPolicy::class;
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
   * @param GoogleCloudPolicytroubleshooterV1ExplainedPolicy[]
   */
  public function setExplainedPolicies($explainedPolicies)
  {
    $this->explainedPolicies = $explainedPolicies;
  }
  /**
   * @return GoogleCloudPolicytroubleshooterV1ExplainedPolicy[]
   */
  public function getExplainedPolicies()
  {
    return $this->explainedPolicies;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse::class, 'Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse');
