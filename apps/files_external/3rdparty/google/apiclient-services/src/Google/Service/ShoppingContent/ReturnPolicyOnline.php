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

class Google_Service_ShoppingContent_ReturnPolicyOnline extends Google_Collection
{
  protected $collection_key = 'returnReasonCategoryInfo';
  public $countries;
  public $itemConditions;
  public $label;
  public $name;
  protected $policyType = 'Google_Service_ShoppingContent_ReturnPolicyOnlinePolicy';
  protected $policyDataType = '';
  protected $restockingFeeType = 'Google_Service_ShoppingContent_ReturnPolicyOnlineRestockingFee';
  protected $restockingFeeDataType = '';
  public $returnMethods;
  public $returnPolicyId;
  public $returnPolicyUri;
  protected $returnReasonCategoryInfoType = 'Google_Service_ShoppingContent_ReturnPolicyOnlineReturnReasonCategoryInfo';
  protected $returnReasonCategoryInfoDataType = 'array';

  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  public function getCountries()
  {
    return $this->countries;
  }
  public function setItemConditions($itemConditions)
  {
    $this->itemConditions = $itemConditions;
  }
  public function getItemConditions()
  {
    return $this->itemConditions;
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
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyOnlinePolicy
   */
  public function setPolicy(Google_Service_ShoppingContent_ReturnPolicyOnlinePolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyOnlinePolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyOnlineRestockingFee
   */
  public function setRestockingFee(Google_Service_ShoppingContent_ReturnPolicyOnlineRestockingFee $restockingFee)
  {
    $this->restockingFee = $restockingFee;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyOnlineRestockingFee
   */
  public function getRestockingFee()
  {
    return $this->restockingFee;
  }
  public function setReturnMethods($returnMethods)
  {
    $this->returnMethods = $returnMethods;
  }
  public function getReturnMethods()
  {
    return $this->returnMethods;
  }
  public function setReturnPolicyId($returnPolicyId)
  {
    $this->returnPolicyId = $returnPolicyId;
  }
  public function getReturnPolicyId()
  {
    return $this->returnPolicyId;
  }
  public function setReturnPolicyUri($returnPolicyUri)
  {
    $this->returnPolicyUri = $returnPolicyUri;
  }
  public function getReturnPolicyUri()
  {
    return $this->returnPolicyUri;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyOnlineReturnReasonCategoryInfo[]
   */
  public function setReturnReasonCategoryInfo($returnReasonCategoryInfo)
  {
    $this->returnReasonCategoryInfo = $returnReasonCategoryInfo;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyOnlineReturnReasonCategoryInfo[]
   */
  public function getReturnReasonCategoryInfo()
  {
    return $this->returnReasonCategoryInfo;
  }
}
