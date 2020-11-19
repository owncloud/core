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

class Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher extends Google_Model
{
  protected $brandMatcherType = 'Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher';
  protected $brandMatcherDataType = '';
  protected $itemGroupIdMatcherType = 'Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher';
  protected $itemGroupIdMatcherDataType = '';
  public $matcherOption;
  protected $offerIdMatcherType = 'Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher';
  protected $offerIdMatcherDataType = '';

  /**
   * @param Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setBrandMatcher(Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher $brandMatcher)
  {
    $this->brandMatcher = $brandMatcher;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function getBrandMatcher()
  {
    return $this->brandMatcher;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setItemGroupIdMatcher(Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher $itemGroupIdMatcher)
  {
    $this->itemGroupIdMatcher = $itemGroupIdMatcher;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function getItemGroupIdMatcher()
  {
    return $this->itemGroupIdMatcher;
  }
  public function setMatcherOption($matcherOption)
  {
    $this->matcherOption = $matcherOption;
  }
  public function getMatcherOption()
  {
    return $this->matcherOption;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setOfferIdMatcher(Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher $offerIdMatcher)
  {
    $this->offerIdMatcher = $offerIdMatcher;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function getOfferIdMatcher()
  {
    return $this->offerIdMatcher;
  }
}
