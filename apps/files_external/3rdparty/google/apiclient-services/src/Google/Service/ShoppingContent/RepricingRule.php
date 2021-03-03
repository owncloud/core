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

class Google_Service_ShoppingContent_RepricingRule extends Google_Model
{
  protected $cogsBasedRuleType = 'Google_Service_ShoppingContent_RepricingRuleCostOfGoodsSaleRule';
  protected $cogsBasedRuleDataType = '';
  public $countryCode;
  protected $effectiveTimePeriodType = 'Google_Service_ShoppingContent_RepricingRuleEffectiveTime';
  protected $effectiveTimePeriodDataType = '';
  protected $eligibleOfferMatcherType = 'Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher';
  protected $eligibleOfferMatcherDataType = '';
  public $languageCode;
  public $merchantId;
  public $paused;
  protected $restrictionType = 'Google_Service_ShoppingContent_RepricingRuleRestriction';
  protected $restrictionDataType = '';
  public $ruleId;
  protected $statsBasedRuleType = 'Google_Service_ShoppingContent_RepricingRuleStatsBasedRule';
  protected $statsBasedRuleDataType = '';
  public $title;
  public $type;

  /**
   * @param Google_Service_ShoppingContent_RepricingRuleCostOfGoodsSaleRule
   */
  public function setCogsBasedRule(Google_Service_ShoppingContent_RepricingRuleCostOfGoodsSaleRule $cogsBasedRule)
  {
    $this->cogsBasedRule = $cogsBasedRule;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleCostOfGoodsSaleRule
   */
  public function getCogsBasedRule()
  {
    return $this->cogsBasedRule;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleEffectiveTime
   */
  public function setEffectiveTimePeriod(Google_Service_ShoppingContent_RepricingRuleEffectiveTime $effectiveTimePeriod)
  {
    $this->effectiveTimePeriod = $effectiveTimePeriod;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleEffectiveTime
   */
  public function getEffectiveTimePeriod()
  {
    return $this->effectiveTimePeriod;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher
   */
  public function setEligibleOfferMatcher(Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher $eligibleOfferMatcher)
  {
    $this->eligibleOfferMatcher = $eligibleOfferMatcher;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleEligibleOfferMatcher
   */
  public function getEligibleOfferMatcher()
  {
    return $this->eligibleOfferMatcher;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setPaused($paused)
  {
    $this->paused = $paused;
  }
  public function getPaused()
  {
    return $this->paused;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleRestriction
   */
  public function setRestriction(Google_Service_ShoppingContent_RepricingRuleRestriction $restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleRestriction
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  public function setRuleId($ruleId)
  {
    $this->ruleId = $ruleId;
  }
  public function getRuleId()
  {
    return $this->ruleId;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingRuleStatsBasedRule
   */
  public function setStatsBasedRule(Google_Service_ShoppingContent_RepricingRuleStatsBasedRule $statsBasedRule)
  {
    $this->statsBasedRule = $statsBasedRule;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleStatsBasedRule
   */
  public function getStatsBasedRule()
  {
    return $this->statsBasedRule;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
