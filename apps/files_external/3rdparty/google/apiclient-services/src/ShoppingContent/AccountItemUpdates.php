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

class AccountItemUpdates extends \Google\Model
{
  protected $accountItemUpdatesSettingsType = AccountItemUpdatesSettings::class;
  protected $accountItemUpdatesSettingsDataType = '';
  /**
   * @var bool
   */
  public $effectiveAllowAvailabilityUpdates;
  /**
   * @var bool
   */
  public $effectiveAllowConditionUpdates;
  /**
   * @var bool
   */
  public $effectiveAllowPriceUpdates;
  /**
   * @var bool
   */
  public $effectiveAllowStrictAvailabilityUpdates;

  /**
   * @param AccountItemUpdatesSettings
   */
  public function setAccountItemUpdatesSettings(AccountItemUpdatesSettings $accountItemUpdatesSettings)
  {
    $this->accountItemUpdatesSettings = $accountItemUpdatesSettings;
  }
  /**
   * @return AccountItemUpdatesSettings
   */
  public function getAccountItemUpdatesSettings()
  {
    return $this->accountItemUpdatesSettings;
  }
  /**
   * @param bool
   */
  public function setEffectiveAllowAvailabilityUpdates($effectiveAllowAvailabilityUpdates)
  {
    $this->effectiveAllowAvailabilityUpdates = $effectiveAllowAvailabilityUpdates;
  }
  /**
   * @return bool
   */
  public function getEffectiveAllowAvailabilityUpdates()
  {
    return $this->effectiveAllowAvailabilityUpdates;
  }
  /**
   * @param bool
   */
  public function setEffectiveAllowConditionUpdates($effectiveAllowConditionUpdates)
  {
    $this->effectiveAllowConditionUpdates = $effectiveAllowConditionUpdates;
  }
  /**
   * @return bool
   */
  public function getEffectiveAllowConditionUpdates()
  {
    return $this->effectiveAllowConditionUpdates;
  }
  /**
   * @param bool
   */
  public function setEffectiveAllowPriceUpdates($effectiveAllowPriceUpdates)
  {
    $this->effectiveAllowPriceUpdates = $effectiveAllowPriceUpdates;
  }
  /**
   * @return bool
   */
  public function getEffectiveAllowPriceUpdates()
  {
    return $this->effectiveAllowPriceUpdates;
  }
  /**
   * @param bool
   */
  public function setEffectiveAllowStrictAvailabilityUpdates($effectiveAllowStrictAvailabilityUpdates)
  {
    $this->effectiveAllowStrictAvailabilityUpdates = $effectiveAllowStrictAvailabilityUpdates;
  }
  /**
   * @return bool
   */
  public function getEffectiveAllowStrictAvailabilityUpdates()
  {
    return $this->effectiveAllowStrictAvailabilityUpdates;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountItemUpdates::class, 'Google_Service_ShoppingContent_AccountItemUpdates');
