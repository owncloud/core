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

class Google_Service_ChromePolicy_GoogleChromePolicyV1InheritOrgUnitPolicyRequest extends Google_Model
{
  public $policySchema;
  protected $policyTargetKeyType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey';
  protected $policyTargetKeyDataType = '';

  public function setPolicySchema($policySchema)
  {
    $this->policySchema = $policySchema;
  }
  public function getPolicySchema()
  {
    return $this->policySchema;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function setPolicyTargetKey(Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey $policyTargetKey)
  {
    $this->policyTargetKey = $policyTargetKey;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyTargetKey
   */
  public function getPolicyTargetKey()
  {
    return $this->policyTargetKey;
  }
}
