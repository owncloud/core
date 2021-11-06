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

class RepricingRuleEligibleOfferMatcher extends \Google\Model
{
  protected $brandMatcherType = RepricingRuleEligibleOfferMatcherStringMatcher::class;
  protected $brandMatcherDataType = '';
  protected $itemGroupIdMatcherType = RepricingRuleEligibleOfferMatcherStringMatcher::class;
  protected $itemGroupIdMatcherDataType = '';
  public $matcherOption;
  protected $offerIdMatcherType = RepricingRuleEligibleOfferMatcherStringMatcher::class;
  protected $offerIdMatcherDataType = '';
  public $skipWhenOnPromotion;

  /**
   * @param RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setBrandMatcher(RepricingRuleEligibleOfferMatcherStringMatcher $brandMatcher)
  {
    $this->brandMatcher = $brandMatcher;
  }
  /**
   * @return RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function getBrandMatcher()
  {
    return $this->brandMatcher;
  }
  /**
   * @param RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setItemGroupIdMatcher(RepricingRuleEligibleOfferMatcherStringMatcher $itemGroupIdMatcher)
  {
    $this->itemGroupIdMatcher = $itemGroupIdMatcher;
  }
  /**
   * @return RepricingRuleEligibleOfferMatcherStringMatcher
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
   * @param RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function setOfferIdMatcher(RepricingRuleEligibleOfferMatcherStringMatcher $offerIdMatcher)
  {
    $this->offerIdMatcher = $offerIdMatcher;
  }
  /**
   * @return RepricingRuleEligibleOfferMatcherStringMatcher
   */
  public function getOfferIdMatcher()
  {
    return $this->offerIdMatcher;
  }
  public function setSkipWhenOnPromotion($skipWhenOnPromotion)
  {
    $this->skipWhenOnPromotion = $skipWhenOnPromotion;
  }
  public function getSkipWhenOnPromotion()
  {
    return $this->skipWhenOnPromotion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepricingRuleEligibleOfferMatcher::class, 'Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher');
