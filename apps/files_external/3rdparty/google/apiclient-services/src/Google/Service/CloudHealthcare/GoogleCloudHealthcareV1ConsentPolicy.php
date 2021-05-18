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

class Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentPolicy extends Google_Collection
{
  protected $collection_key = 'resourceAttributes';
  protected $authorizationRuleType = 'Google_Service_CloudHealthcare_Expr';
  protected $authorizationRuleDataType = '';
  protected $resourceAttributesType = 'Google_Service_CloudHealthcare_Attribute';
  protected $resourceAttributesDataType = 'array';

  /**
   * @param Google_Service_CloudHealthcare_Expr
   */
  public function setAuthorizationRule(Google_Service_CloudHealthcare_Expr $authorizationRule)
  {
    $this->authorizationRule = $authorizationRule;
  }
  /**
   * @return Google_Service_CloudHealthcare_Expr
   */
  public function getAuthorizationRule()
  {
    return $this->authorizationRule;
  }
  /**
   * @param Google_Service_CloudHealthcare_Attribute[]
   */
  public function setResourceAttributes($resourceAttributes)
  {
    $this->resourceAttributes = $resourceAttributes;
  }
  /**
   * @return Google_Service_CloudHealthcare_Attribute[]
   */
  public function getResourceAttributes()
  {
    return $this->resourceAttributes;
  }
}
