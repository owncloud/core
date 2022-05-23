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

namespace Google\Service\AndroidPublisher;

class SubscriptionOfferTargeting extends \Google\Model
{
  protected $acquisitionRuleType = AcquisitionTargetingRule::class;
  protected $acquisitionRuleDataType = '';
  protected $upgradeRuleType = UpgradeTargetingRule::class;
  protected $upgradeRuleDataType = '';

  /**
   * @param AcquisitionTargetingRule
   */
  public function setAcquisitionRule(AcquisitionTargetingRule $acquisitionRule)
  {
    $this->acquisitionRule = $acquisitionRule;
  }
  /**
   * @return AcquisitionTargetingRule
   */
  public function getAcquisitionRule()
  {
    return $this->acquisitionRule;
  }
  /**
   * @param UpgradeTargetingRule
   */
  public function setUpgradeRule(UpgradeTargetingRule $upgradeRule)
  {
    $this->upgradeRule = $upgradeRule;
  }
  /**
   * @return UpgradeTargetingRule
   */
  public function getUpgradeRule()
  {
    return $this->upgradeRule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionOfferTargeting::class, 'Google_Service_AndroidPublisher_SubscriptionOfferTargeting');
