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

class Google_Service_ShoppingContent_ReturnPolicy extends Google_Collection
{
  protected $collection_key = 'seasonalOverrides';
  public $country;
  public $kind;
  public $label;
  public $name;
  public $nonFreeReturnReasons;
  protected $policyType = 'Google_Service_ShoppingContent_ReturnPolicyPolicy';
  protected $policyDataType = '';
  public $returnPolicyId;
  protected $seasonalOverridesType = 'Google_Service_ShoppingContent_ReturnPolicySeasonalOverride';
  protected $seasonalOverridesDataType = 'array';

  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNonFreeReturnReasons($nonFreeReturnReasons)
  {
    $this->nonFreeReturnReasons = $nonFreeReturnReasons;
  }
  public function getNonFreeReturnReasons()
  {
    return $this->nonFreeReturnReasons;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyPolicy
   */
  public function setPolicy(Google_Service_ShoppingContent_ReturnPolicyPolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyPolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setReturnPolicyId($returnPolicyId)
  {
    $this->returnPolicyId = $returnPolicyId;
  }
  public function getReturnPolicyId()
  {
    return $this->returnPolicyId;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicySeasonalOverride
   */
  public function setSeasonalOverrides($seasonalOverrides)
  {
    $this->seasonalOverrides = $seasonalOverrides;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicySeasonalOverride
   */
  public function getSeasonalOverrides()
  {
    return $this->seasonalOverrides;
  }
}
