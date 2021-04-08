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

class Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpecPolicyRule extends Google_Model
{
  public $allowAll;
  protected $conditionType = 'Google_Service_OrgPolicyAPI_GoogleTypeExpr';
  protected $conditionDataType = '';
  public $denyAll;
  public $enforce;
  protected $valuesType = 'Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpecPolicyRuleStringValues';
  protected $valuesDataType = '';

  public function setAllowAll($allowAll)
  {
    $this->allowAll = $allowAll;
  }
  public function getAllowAll()
  {
    return $this->allowAll;
  }
  /**
   * @param Google_Service_OrgPolicyAPI_GoogleTypeExpr
   */
  public function setCondition(Google_Service_OrgPolicyAPI_GoogleTypeExpr $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_OrgPolicyAPI_GoogleTypeExpr
   */
  public function getCondition()
  {
    return $this->condition;
  }
  public function setDenyAll($denyAll)
  {
    $this->denyAll = $denyAll;
  }
  public function getDenyAll()
  {
    return $this->denyAll;
  }
  public function setEnforce($enforce)
  {
    $this->enforce = $enforce;
  }
  public function getEnforce()
  {
    return $this->enforce;
  }
  /**
   * @param Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpecPolicyRuleStringValues
   */
  public function setValues(Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpecPolicyRuleStringValues $values)
  {
    $this->values = $values;
  }
  /**
   * @return Google_Service_OrgPolicyAPI_GoogleCloudOrgpolicyV2PolicySpecPolicyRuleStringValues
   */
  public function getValues()
  {
    return $this->values;
  }
}
