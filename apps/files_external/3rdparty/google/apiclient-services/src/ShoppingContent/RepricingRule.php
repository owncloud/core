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

class RepricingRule extends \Google\Model
{
  protected $cogsBasedRuleType = RepricingRuleCostOfGoodsSaleRule::class;
  protected $cogsBasedRuleDataType = '';
  /**
   * @var string
   */
  public $countryCode;
  protected $effectiveTimePeriodType = RepricingRuleEffectiveTime::class;
  protected $effectiveTimePeriodDataType = '';
  protected $eligibleOfferMatcherType = RepricingRuleEligibleOfferMatcher::class;
  protected $eligibleOfferMatcherDataType = '';
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var bool
   */
  public $paused;
  protected $restrictionType = RepricingRuleRestriction::class;
  protected $restrictionDataType = '';
  /**
   * @var string
   */
  public $ruleId;
  protected $statsBasedRuleType = RepricingRuleStatsBasedRule::class;
  protected $statsBasedRuleDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

  /**
   * @param RepricingRuleCostOfGoodsSaleRule
   */
  public function setCogsBasedRule(RepricingRuleCostOfGoodsSaleRule $cogsBasedRule)
  {
    $this->cogsBasedRule = $cogsBasedRule;
  }
  /**
   * @return RepricingRuleCostOfGoodsSaleRule
   */
  public function getCogsBasedRule()
  {
    return $this->cogsBasedRule;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param RepricingRuleEffectiveTime
   */
  public function setEffectiveTimePeriod(RepricingRuleEffectiveTime $effectiveTimePeriod)
  {
    $this->effectiveTimePeriod = $effectiveTimePeriod;
  }
  /**
   * @return RepricingRuleEffectiveTime
   */
  public function getEffectiveTimePeriod()
  {
    return $this->effectiveTimePeriod;
  }
  /**
   * @param RepricingRuleEligibleOfferMatcher
   */
  public function setEligibleOfferMatcher(RepricingRuleEligibleOfferMatcher $eligibleOfferMatcher)
  {
    $this->eligibleOfferMatcher = $eligibleOfferMatcher;
  }
  /**
   * @return RepricingRuleEligibleOfferMatcher
   */
  public function getEligibleOfferMatcher()
  {
    return $this->eligibleOfferMatcher;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param bool
   */
  public function setPaused($paused)
  {
    $this->paused = $paused;
  }
  /**
   * @return bool
   */
  public function getPaused()
  {
    return $this->paused;
  }
  /**
   * @param RepricingRuleRestriction
   */
  public function setRestriction(RepricingRuleRestriction $restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return RepricingRuleRestriction
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param string
   */
  public function setRuleId($ruleId)
  {
    $this->ruleId = $ruleId;
  }
  /**
   * @return string
   */
  public function getRuleId()
  {
    return $this->ruleId;
  }
  /**
   * @param RepricingRuleStatsBasedRule
   */
  public function setStatsBasedRule(RepricingRuleStatsBasedRule $statsBasedRule)
  {
    $this->statsBasedRule = $statsBasedRule;
  }
  /**
   * @return RepricingRuleStatsBasedRule
   */
  public function getStatsBasedRule()
  {
    return $this->statsBasedRule;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepricingRule::class, 'Google_Service_ShoppingContent_RepricingRule');
