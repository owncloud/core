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

namespace Google\Service\ShoppingContent;

class ReturnPolicy extends \Google\Collection
{
  protected $collection_key = 'seasonalOverrides';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $nonFreeReturnReasons;
  protected $policyType = ReturnPolicyPolicy::class;
  protected $policyDataType = '';
  /**
   * @var string
   */
  public $returnPolicyId;
  protected $returnShippingFeeType = Price::class;
  protected $returnShippingFeeDataType = '';
  protected $seasonalOverridesType = ReturnPolicySeasonalOverride::class;
  protected $seasonalOverridesDataType = 'array';

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setNonFreeReturnReasons($nonFreeReturnReasons)
  {
    $this->nonFreeReturnReasons = $nonFreeReturnReasons;
  }
  /**
   * @return string[]
   */
  public function getNonFreeReturnReasons()
  {
    return $this->nonFreeReturnReasons;
  }
  /**
   * @param ReturnPolicyPolicy
   */
  public function setPolicy(ReturnPolicyPolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return ReturnPolicyPolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param string
   */
  public function setReturnPolicyId($returnPolicyId)
  {
    $this->returnPolicyId = $returnPolicyId;
  }
  /**
   * @return string
   */
  public function getReturnPolicyId()
  {
    return $this->returnPolicyId;
  }
  /**
   * @param Price
   */
  public function setReturnShippingFee(Price $returnShippingFee)
  {
    $this->returnShippingFee = $returnShippingFee;
  }
  /**
   * @return Price
   */
  public function getReturnShippingFee()
  {
    return $this->returnShippingFee;
  }
  /**
   * @param ReturnPolicySeasonalOverride[]
   */
  public function setSeasonalOverrides($seasonalOverrides)
  {
    $this->seasonalOverrides = $seasonalOverrides;
  }
  /**
   * @return ReturnPolicySeasonalOverride[]
   */
  public function getSeasonalOverrides()
  {
    return $this->seasonalOverrides;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReturnPolicy::class, 'Google_Service_ShoppingContent_ReturnPolicy');
