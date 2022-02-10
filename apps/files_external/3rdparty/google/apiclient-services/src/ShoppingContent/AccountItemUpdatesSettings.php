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

class AccountItemUpdatesSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowAvailabilityUpdates;
  /**
   * @var bool
   */
  public $allowPriceUpdates;
  /**
   * @var bool
   */
  public $allowStrictAvailabilityUpdates;

  /**
   * @param bool
   */
  public function setAllowAvailabilityUpdates($allowAvailabilityUpdates)
  {
    $this->allowAvailabilityUpdates = $allowAvailabilityUpdates;
  }
  /**
   * @return bool
   */
  public function getAllowAvailabilityUpdates()
  {
    return $this->allowAvailabilityUpdates;
  }
  /**
   * @param bool
   */
  public function setAllowPriceUpdates($allowPriceUpdates)
  {
    $this->allowPriceUpdates = $allowPriceUpdates;
  }
  /**
   * @return bool
   */
  public function getAllowPriceUpdates()
  {
    return $this->allowPriceUpdates;
  }
  /**
   * @param bool
   */
  public function setAllowStrictAvailabilityUpdates($allowStrictAvailabilityUpdates)
  {
    $this->allowStrictAvailabilityUpdates = $allowStrictAvailabilityUpdates;
  }
  /**
   * @return bool
   */
  public function getAllowStrictAvailabilityUpdates()
  {
    return $this->allowStrictAvailabilityUpdates;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountItemUpdatesSettings::class, 'Google_Service_ShoppingContent_AccountItemUpdatesSettings');
